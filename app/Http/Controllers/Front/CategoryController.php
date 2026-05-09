<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use DB;
class CategoryController extends Controller
{
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function detail(Request $request, $slug)
    {
        $data = $this->categoryRepository->getCategoryBySlug($slug);
        // If category not found → show 404
        if (!$data) {
            return response()->view('front.404', [], 404);
        }
        $sizes = $this->categoryRepository->getAllSizes();
        $colors = $this->categoryRepository->getAllColors();
		$range = Cache::remember("category:{$data->id}:range", 600, function () use ($data) {
            return Product::where('cat_id', $data->id)
                ->where('status', 1)
                ->selectRaw('MIN(offer_price) AS min, MAX(offer_price) AS max')
                ->first();
        });

        $sizeData = Cache::remember("category:{$data->id}:sizes", 600, function () use ($data) {
            return DB::table('sizes as s')
                ->join('product_color_sizes as pc', 'pc.size', '=', 's.id')
                ->join('products as p', 'p.id', '=', 'pc.product_id')
                ->where('p.cat_id', $data->id)
                ->where('p.status', 1)
                ->select('s.id', 's.name')
                ->groupBy('s.id', 's.name')
                ->orderBy('s.id')
                ->get();
        });

        $colorData = Cache::remember("category:{$data->id}:colors", 600, function () use ($data) {
            return DB::table('colors as co')
                ->join('product_color_sizes as pc', 'pc.color', '=', 'co.id')
                ->join('products as p', 'p.id', '=', 'pc.product_id')
                ->where('p.cat_id', $data->id)
                ->where('p.status', 1)
                ->select('co.id', 'co.name', 'co.code')
                ->groupBy('co.id', 'co.name', 'co.code')
                ->orderBy('co.id')
                ->get();
        });

        $styleNo = Cache::remember("category:{$data->id}:styles", 600, function () use ($data) {
            return Product::where('cat_id', $data->id)
                ->where('status', 1)
                ->whereNotNull('style_no')
                ->select('style_no')
                ->distinct()
                ->orderBy('style_no')
                ->get();
        });
        if ($data) {
            return view('front.category.detail', compact('data', 'sizes', 'colors','range','sizeData','colorData','styleNo'));
        } else {
            return view('front.404');
        }
    }

    public function filter(Request $request)
    {
        $data = $this->categoryRepository->productsByCategory($request->categoryId, $request->except('_token'));

        if ($data) {
            return response()->json(['status' => 200, 'message' => 'Products found', 'data' => $data], 200);
        } else {
            return response()->json(['status' => 400, 'message' => 'No products found'], 400);
        }
    }
}