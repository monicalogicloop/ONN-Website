<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubscriptionMail;
use App\Models\Category;
use App\Models\Collection;
use App\Models\CategoryParent;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Banner;
use App\Services\InstagramService;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index(Request $request, InstagramService $instagramService)
    {
        // $category = Category::latest('id')->get();
        // $collections = Collection::latest('id')->get();
        $products = Product::where('is_trending', 1)->latest('view_count', 'id')->where('status',1)->limit(14)->get();
        // $products = Product::latest('view_count', 'id')->limit(16)->get();
        $galleries = Gallery::latest('id')->get();
        $banner = Banner::where('status', 1)->orderBy('position')->get();
        // $accessoriesParent = DB::table('category_parents')
        //     ->where('slug', 'accessories')
        //     ->where('status', 1)
        //     ->first();
        $accessoriesParent = CategoryParent::where('slug', 'accessories')
            ->where('status', 1)
            ->first();
        $accessoriesCategories = Category::where('parent', $accessoriesParent->id)
            ->where('status', 1)
            ->orderBy('position', 'asc')
            ->get();
        $winterSlug = 'winter-wear'; 
        $winterproducts = Product::where('is_trending', 1)
            ->where('status', 1)
            ->whereHas('category.parentCatDetails', function ($query) use ($winterSlug) {
                $query->where('slug', $winterSlug);
            })
            ->orderByDesc('view_count')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $innerSlug = 'innerwear'; 
        $innerproducts = Product::where('is_trending', 1)
            ->where('status', 1)
            ->whereHas('category.parentCatDetails', function ($query) use ($innerSlug) {
                $query->where('slug', $innerSlug);
            })
            ->orderByDesc('view_count')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $outerSlug = 'outerwear'; 
        $outerproducts = Product::where('is_trending', 1)
            ->where('status', 1)
            ->whereHas('category.parentCatDetails', function ($query) use ($outerSlug) {
                $query->where('slug', $outerSlug);
            })
            ->orderByDesc('view_count')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $instagramPosts = $instagramService->latestPosts(6);
        return view('front.welcome', compact('products', 'winterproducts','innerproducts','outerproducts','galleries', 'banner','accessoriesCategories', 'instagramPosts'));
    }

    public function homenew(Request $request, InstagramService $instagramService)
    {
        // $category = Category::latest('id')->get();
        // $collections = Collection::latest('id')->get();
        $products = Product::where('is_trending', 1)->latest('view_count', 'id')->where('status',1)->limit(14)->get();
        // $products = Product::latest('view_count', 'id')->limit(16)->get();
        $galleries = Gallery::latest('id')->get();
        $banner = Banner::where('status', 1)->orderBy('position')->get();
        $accessoriesParent = DB::table('category_parents')
            ->where('slug', 'accessories')
            ->where('status', 1)
            ->first();
        $accessoriesCategories = Category::where('parent', $accessoriesParent->id)
            ->where('status', 1)
            ->orderBy('position', 'asc')
            ->get();
        $winterSlug = 'winter-wear'; 
        $winterproducts = Product::where('is_trending', 1)
            ->where('status', 1)
            ->whereHas('category.parentCatDetails', function ($query) use ($winterSlug) {
                $query->where('slug', $winterSlug);
            })
            ->orderByDesc('view_count')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $innerSlug = 'innerwear'; 
        $innerproducts = Product::where('is_trending', 1)
            ->where('status', 1)
            ->whereHas('category.parentCatDetails', function ($query) use ($innerSlug) {
                $query->where('slug', $innerSlug);
            })
            ->orderByDesc('view_count')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $outerSlug = 'outerwear'; 
        $outerproducts = Product::where('is_trending', 1)
            ->where('status', 1)
            ->whereHas('category.parentCatDetails', function ($query) use ($outerSlug) {
                $query->where('slug', $outerSlug);
            })
            ->orderByDesc('view_count')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $instagramPosts = $instagramService->latestPosts(6);
        return view('front.welcomenew', compact('products', 'winterproducts','innerproducts','outerproducts','galleries', 'banner','accessoriesCategories', 'instagramPosts'));
    }

    public function mailSubscribe(Request $request)
    {
        $rules = [
            'email' => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {
            $mailExists = SubscriptionMail::where('email', $request->email)->first();
            if (empty($mailExists)) {
                $mail = new SubscriptionMail();
                $mail->email = $request->email;
                $mail->save();

                return response()->json(['resp' => 200, 'message' => 'Mail subscribed successfully']);
            } else {
                $mailExists->count += 1;
                $mailExists->save();

                return response()->json(['resp' => 200, 'message' => 'Thank you for showing your interest']);
            }
        } else {
            return response()->json(['resp' => 400, 'message' => $validator->errors()->first()]);
        }
    }
	
	
    public function declare(Request $request)
    {
        return view('front.declaration');
    }
	
	
	public function one(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function two(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function three(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function four(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function five(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function six(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function seven(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function eight(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function nine(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function ten(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function eleven(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function twelve(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function thirteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function fourteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	
	public function fifteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function sixteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function seventeen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	public function eightteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function nineteen(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function twenty(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function twentyone(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	
	public function twentytwo(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function twentythree(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function twentyfour(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
	
	public function twentyfive(Request $request)
    {
        return redirect('https://www.luxinnerwear.com/men/lux-cozi');
    }
    
    
    
    public function catalogue(Request $request)
    {
        return view('front.catalogue');
    }
}
