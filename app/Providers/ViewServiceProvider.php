<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $menuCategories1 = Category::where('parent', 1)
                ->where('status', 1)
                ->orderBy('position', 'asc')
                ->get();

            $view->with('menuCategories1', $menuCategories1);

            $menuCategories2 = Category::where('parent', 2)
                ->where('status', 1)
                ->orderBy('position', 'asc')
                ->get();

            $view->with('menuCategories2', $menuCategories2);

            $menuCategories3 = Category::where('parent', 3)
                ->where('status', 1)
                ->orderBy('position', 'asc')
                ->get();

            $view->with('menuCategories3', $menuCategories3);

            $menuCategories4 = Category::where('parent', 4)
                ->where('status', 1)
                ->orderBy('position', 'asc')
                ->get();

            $view->with('menuCategories4', $menuCategories4);

            $menuCategories5 = Category::where('parent', 5)
                ->where('status', 1)
                ->orderBy('position', 'asc')
                ->get();

            $view->with('menuCategories5', $menuCategories5);

            $innerwearSlug = 'innerwear';
            $innerwearTrendingProducts = Product::where('is_trending', 1)
                ->where('status', 1)
                ->whereHas('category.parentCatDetails', function ($query) use ($innerwearSlug) {
                    $query->where('slug', $innerwearSlug);
                })
                ->orderByDesc('view_count')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $view->with('innerwearTrendingProducts', $innerwearTrendingProducts);

            $outerwearSlug = 'outerwear';
            $outerwearTrendingProducts = Product::where('is_trending', 1)
                ->where('status', 1)
                ->whereHas('category.parentCatDetails', function ($query) use ($outerwearSlug) {
                    $query->where('slug', $outerwearSlug);
                })
                ->orderByDesc('view_count')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $view->with('outerwearTrendingProducts', $outerwearTrendingProducts);

            $winterwearSlug = 'winter-wear';
            $winterwearTrendingProducts = Product::where('is_trending', 1)
                ->where('status', 1)
                ->whereHas('category.parentCatDetails', function ($query) use ($winterwearSlug) {
                    $query->where('slug', $winterwearSlug);
                })
                ->orderByDesc('view_count')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $view->with('winterwearTrendingProducts', $winterwearTrendingProducts);

            $footkinsSlug = 'footkins';
            $footkinsTrendingProducts = Product::where('is_trending', 1)
                ->where('status', 1)
                ->whereHas('category.parentCatDetails', function ($query) use ($footkinsSlug) {
                    $query->where('slug', $footkinsSlug);
                })
                ->orderByDesc('view_count')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            //dd($footkinsSlug === 'footkins');

            $view->with('footkinsTrendingProducts', $footkinsTrendingProducts);

            $accessoriesSlug = 'accessories';
            $accessoriesTrendingProducts = Product::where('is_trending', 1)
                ->where('status', 1)
                ->whereHas('category.parentCatDetails', function ($query) use ($accessoriesSlug) {
                    $query->where('slug', $accessoriesSlug);
                })
                ->orderByDesc('view_count')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $view->with('accessoriesTrendingProducts', $accessoriesTrendingProducts);

            
        });
    }
}
