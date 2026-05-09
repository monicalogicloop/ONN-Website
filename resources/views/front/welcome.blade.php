@extends('layouts.app')

@section('page', 'Home')

@section('meta')
    <title>Men's Clothing: Buy Men's Fashion wear online in India @ ONN</title>
    <meta name="description" content="ONN offers premium men's clothing in India. Buy collections of innerwear, winterwear, accessories & more. Shop the latest styles online at the best prices.">
@endsection

@section('content')
<style>
.color_holder {
    height: 20px;
    width: 20px;
    border-radius: 50%
}
.product__color {
	display: flex;
    flex-wrap: wrap;
	padding: 0 20px 20px;
    align-items: center;
    justify-content: center;
}
.color-holder {
	width: 20px;
    height: 20px;
    border-radius: 50%;
    flex: 0 0 20px;
	margin-right: 7px;
	box-shadow: 0px 5px 10px rgb(0 0 0 / 10%);
}
@media(max-width: 575px) {
    .color-holder {
        width: 15px;
        height: 15px;
        flex: 0 0 15px;
    }
    .product__color {
        justify-content: center;
    }
}
</style>


<section id="home" class="home-banner p-0">
    <div class="home-banner__slider swiper-container">
        <div class="slider swiper-wrapper">
			@foreach ($banner as $item)
                <div class="home-banner__slider-single swiper-slide">
                    <div class="video__wrapper">
                        @if ($item->type == 'video')
                            <video id="onn-video" width="320" height="240" autoplay muted loop playsinline>
                                <source src="{{ asset($item->file_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <a href="{{ asset($item->link) }}" target="blank">
                                <img src="{{ asset($item->file_path) }}" />
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="statistics" class="home-statistics">
    <div class="container-fuild">
        <div class="row align-items-center m-0 p-0">
            <div class="col-lg-3 col-md-6 col-12 p-0">
                <div class="statistics-wrapper d-flex items-center justify-center">
                    <img src="{{ asset('img/home/statistics_01.png') }}">
                    <p class="">Pan-India Delivery</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 p-0">
                <div class="statistics-wrapper d-flex items-center justify-center">
                    <img src="{{ asset('img/home/statistics_02.png') }}">
                    <p class="">Made with Imported Technology</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 p-0">
                <div class="statistics-wrapper d-flex items-center justify-center">
                    <img src="{{ asset('img/home/statistics_03.png') }}">
                    <p class="">Quality-Tested Fabric</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 p-0">
                <div class="statistics-wrapper d-flex items-center justify-center">
                    <img src="{{ asset('img/home/statistics_04.png') }}">
                    <p class="">Trusted by Thousands</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="category" class="home-category">
    <div class="container">
        <div class="row align-items-center">
            <div class="col section-heading text-center text-md-left">
                <h2>Featured <span>Categories</span></h2>
            </div>
            <div class="col-auto d-none d-md-block">
                <button type="button" class="collection-btn category-left">
                    <img src="img/home/collection-left.png" />
                </button>
                <button type="button" class="collection-btn category-right">
                    <img src="img/home/collection-right.png" />
                </button>
            </div>
        </div>
    </div>
    <div class="container pr-0">
        <div class="row mr-0 align-items-end">
            <div class="col-sm-12 col-md-12 pr-0">
                <div class="home-category__slider swiper-container">
                    <div class="slider swiper-wrapper">
                        @foreach ($categories as $categoryKey => $categoryValue)
                            <div class="home-category__single swiper-slide">
                                <a href="{{ route('front.category.detail', $categoryValue->slug) }}" class="category-card">
                                    <div class="content-wrapper">
                                        <h3>{{$categoryValue->name}}<span>.</span></h3>
                                        <p>SHOP COLLECTION <span>→</span></p>
                                    </div>
                                    <div class="image-wrapper">
                                        <img src="{{asset($categoryValue->home_image)}}" />
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-md-none">
        <div class="row align-items-center justify-content-center">
            <div class="col-auto">
                <button type="button" class="collection-btn category-left">
                    <img src="img/home/collection-left.png" />
                </button>
                <button type="button" class="collection-btn category-right">
                    <img src="img/home/collection-right.png" />
                </button>
            </div>
        </div>
    </div>
</section>

<section class="inner-outer-collection mb-5 mb-md-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="section-heading text-center text-md-left">
                    <h2 class="mb-0">Best <span>Seller</span></h2>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center justify-content-md-end mt-3 mt-md-0">
                <ul class="nav custom-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#innerwear">Innerwear</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#outerwear">Outerwear</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="innerwear">
                        <div class="home-inner-outer-collection__slider swiper-container">
                            <div class="slider swiper-wrapper">
                                @foreach($innerproducts as $productKey => $productValue)
                                    <div class="home-product_wrapper swiper-slide">
                                        <a href="{{ route('front.product.detail', $productValue->slug) }}">
                                            <img src="{{asset($productValue->image)}}" class="w-100" />
                                            <h4 class="mt-2 p-2 name">{{ Str::limit($productValue->name, 15) }}</h4>
                                            <div class="p-2 d-md-flex align-items-center justify-content-between">
                                                <p class="mb-2 mb-md-0 price">{{$productValue->price}}</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="slider-navigation mt-3 text-center">
                            <button type="button" class="collection-btn inner-outer-collection-left">
                                <img src="img/home/collection-left.png" />
                            </button>
                            <button type="button" class="collection-btn inner-outer-collection-right">
                                <img src="img/home/collection-right.png" />
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="outerwear">
                        <div class="home-inner-outer-collection__slider swiper-container">
                            <div class="slider swiper-wrapper">
                                @foreach($outerproducts as $productKey => $productValue)
                                    <div class="home-product_wrapper swiper-slide">
                                        <a href="{{ route('front.product.detail', $productValue->slug) }}">
                                            <img src="{{asset($productValue->image)}}" class="w-100" />
                                             <h4 class="mt-2 p-2 name">{{ Str::limit($productValue->name, 20) }}</h4>
                                            <div class="p-2 d-flex align-items-center justify-content-between">
                                                <p class="mb-0 price">{{$productValue->price}}</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="slider-navigation mt-3 text-center">
                            <button type="button" class="collection-btn inner-outer-collection-left">
                                <img src="img/home/collection-left.png" />
                            </button>
                            <button type="button" class="collection-btn inner-outer-collection-right">
                                <img src="img/home/collection-right.png" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop-look" style="background-image: url({{ asset('img/home/shop-look_bg.png') }});">
    <div class="container">
        <div class="row d-block d-md-none">
            <div class="col">
                <div class="text-effect">
                    <div class="text-foreground mb-3">
                        <span class="blue">SHOP THE  </span> <span class="red">LOOK</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mt-md-0">
            <div class="col d-flex justify-content-end" style="z-index: 15;">
                <ul class="nav custom-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#Gym">Gym</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Casuals">Casuals</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Holiday">Holiday</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Lounge">Lounge</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 mt-xl-0">
            <div class="col">
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="Gym">
                        <div class="row">
                            <div class="col-md-1 d-none d-md-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 shop-category-wrapper">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Gym_v3.png') }}" class="img-fluid w-100 shop-main-image d-none d-md-block">
                                    <img src="{{ asset('img/home/Gym_mb.png') }}" class="img-fluid w-100 shop-main-image d-block d-md-none">
                                    <!-- Dot 1 -->
                                    <span class="hotspot Gym_hotspot1"
                                            data-link="https://onninternational.com/product/tank-top"
                                            data-img="{{ asset('img/home/Gym-product_01.png') }}"
                                            data-name="TANK TOP"
                                            data-price="₹260.00">
                                    </span>
                                    <!-- Dot 2 -->
                                    <span class="hotspot Gym_hotspot2"
                                            data-link="https://onninternational.com/product/half-pant-sinker"
                                            data-img="{{ asset('img/home/Gym-product_02.png') }}"
                                            data-name="HALF PANT SINKER"
                                            data-price="₹530.00">
                                    </span>
                                </div>
                                <div class="shop-look-product-card shop-look-product-card1 home-product_wrapper">
                                    <a href="https://onninternational.com/product/tank-top" id="productLink">
                                        <img id="productImage" src="{{ asset('img/home/Gym-product_01.png') }}" alt="">
                                        <h4 id="productName" class="mt-2 p-2">TANK TOP</h4>
                                        <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                            <p class="mb-0 price" id="productPrice">₹260.00</p>
                                            <p class="shop_cta">Shop Now</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Casuals">
                       <div class="row">
                            <div class="col-md-1 d-none d-md-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 shop-category-wrapper">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Casuals_v2.png') }}" class="img-fluid w-100 shop-main-image d-none d-md-block">
                                    <img src="{{ asset('img/home/Casuals_mb.png') }}" class="img-fluid w-100 shop-main-image d-block d-md-none">
                                    <!-- Dot 1 -->
                                    <span class="hotspot hotspot2 Casuals_hotspot1"
                                            data-link="https://onninternational.com/product/hi-neck-jacket"
                                            data-img="{{ asset('img/home/Casuals-product_01.png') }}"
                                            data-name="HI-NECK JACKET"
                                            data-price="₹999.00">
                                    </span>
                                    <!-- Dot 2 -->
                                    <span class="hotspot hotspot2 Casuals_hotspot2"
                                            data-link="https://onninternational.com/product/hosiery-shorts"
                                            data-img="{{ asset('img/home/Casuals-product_02.png') }}"
                                            data-name="HOSIERY SHORTS"
                                            data-price="₹650.00">
                                    </span>
                                </div>
                                <div class="shop-look-product-card shop-look-product-card2 home-product_wrapper">
                                    <a href="https://onninternational.com/product/hi-neck-jacket" id="shopproductLink2">
                                        <img id="shopproductImage2" src="{{ asset('img/home/Casuals-product_01.png') }}" alt="">
                                        <h4 id="shopproductName2" class="mt-2 p-2">HI-NECK JACKET</h4>
                                        <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                            <p class="mb-0 price" id="shopproductPrice2">₹999.00</p>
                                            <p class="shop_cta">Shop Now</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Holiday">
                       <div class="row">
                            <div class="col-md-1 d-none d-md-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 shop-category-wrapper">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Holiday_v2.png') }}" class="img-fluid w-100 shop-main-image d-none d-md-block">
                                    <img src="{{ asset('img/home/Holiday_mb.png') }}" class="img-fluid w-100 shop-main-image d-block d-md-none">
                                    <!-- Dot 1 -->
                                    <span class="hotspot hotspot3 Holiday_hotspot1"
                                            data-link="https://onninternational.com/product/sinker-f-open-pocket-boxer"
                                            data-img="{{ asset('img/home/Holiday-product_01.png') }}"
                                            data-name="SINKER F/OPEN POCKET BOXERT"
                                            data-price="₹250.00">
                                    </span>
                                </div>
                                <div class="shop-look-product-card shop-look-product-card3 home-product_wrapper">
                                    <a href="https://onninternational.com/product/sinker-f-open-pocket-boxer" id="shopproductLink3">
                                        <img id="shopproductImage3" src="{{ asset('img/home/Holiday-product_01.png') }}" alt="">
                                        <h4 id="shopproductName3" class="mt-2 p-2">SINKER F/OPEN POCKET BOXER</h4>
                                        <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                            <p class="mb-0 price" id="shopproductPrice3">₹250.00</p>
                                            <p class="shop_cta">Shop Now</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Lounge">
                       <div class="row">
                            <div class="col-md-1 d-none d-md-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 shop-category-wrapper">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Lounge_v2.png') }}" class="img-fluid w-100 shop-main-image d-none d-md-block">
                                    <img src="{{ asset('img/home/Lounge_mb.png') }}" class="img-fluid w-100 shop-main-image d-block d-md-none">
                                    <!-- Dot 1 -->
                                    <span class="hotspot hotspot4 Lounge_hotspot1"
                                            data-link="https://onninternational.com/product/round-neck-t-shirt-nc-422"
                                            data-img="{{ asset('img/home/Lounge-product_01.png') }}"
                                            data-name="Round Neck T-Shirt"
                                            data-price="₹399.00">
                                    </span>
                                    <!-- Dot 2 -->
                                    <span class="hotspot hotspot4 Lounge_hotspot2"
                                            data-link="https://onninternational.com/product/textile-boxer"
                                            data-img="{{ asset('img/home/Lounge-product_02.png') }}"
                                            data-name="TEXTILE BOXER"
                                            data-price="₹499.00">
                                    </span>
                                </div>
                                <div class="shop-look-product-card shop-look-product-card4 home-product_wrapper">
                                    <a href="#" id="shopproductLink4">
                                        <img id="shopproductImage4" src="{{ asset('img/home/Lounge-product_01.png') }}" alt="">
                                        <h4 id="shopproductName4" class="mt-2 p-2"></h4>
                                        <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                            <p class="mb-0 price" id="shopproductPrice4">₹</p>
                                            <p class="shop_cta">Shop Now</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('.shop-look .shop-look-product-card1').css('display', 'none');
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
        $('.shop-look-product-card').hide();
    });
    $('.shop-look').on('mouseenter', '.hotspot', function () {
        const container = $(this).closest('.shop-category-wrapper');
        const card = container.find('.shop-look-product-card');

        card.hide();

        card.find('a').attr('href', '#');
        card.find('img').attr('src', '');
        card.find('h4').text('');
        card.find('.price').text('');

        const link  = $(this).data('link');
        const img   = $(this).data('img');
        const name  = $(this).data('name');
        const price = $(this).data('price');

        card.find('a').attr('href', link);
        card.find('img').attr('src', img);
        card.find('h4').text(name);
        card.find('.price').text(price);

        card.css('display', 'flex');
    });
</script>

<section id="collection" class="home-collection">
    <div class="container">
        <div class="row align-items-center">
            <div class="col section-heading text-center text-md-left">
                <h2>Shop By <span>Collection</span></h2>
            </div>
            <div class="col-auto d-none d-md-block">
                <button type="button" class="collection-btn home-collection-left">
                    <img src="img/home/collection-left.png" />
                </button>
                <button type="button" class="collection-btn home-collection-right">
                    <img src="img/home/collection-right.png" />
                </button>
            </div>
        </div>
    </div>
    <div class="container pr-0">
        <div class="row mr-0 align-items-end">
            <div class="col-sm-12 col-md-12 pr-0">
                <div class="home-collection__slider swiper-container">
                    <div class="slider swiper-wrapper">
                        @foreach($collections as $collectionKey => $collectionValue)
                            <div class="home-collection__single swiper-slide">
                                <figure class="{{$collectionValue->slug}}">
                                <a href="{{ route('front.collection.detail', $collectionValue->slug) }}">
                                    <img src="{{asset($collectionValue->image_path)}}" />
                                    <figcaption class="text-center">
                                        <h3>{{$collectionValue->name}} Collection</h3>
                                        <p>View All Products </p>
                                    </figcaption>
                                </a>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-md-none">
        <div class="row align-items-center justify-content-center">
            <div class="col-auto">
                <button type="button" class="collection-btn home-collection-left">
                    <img src="img/home/collection-left.png" />
                </button>
                <button type="button" class="collection-btn home-collection-right">
                    <img src="img/home/collection-right.png" />
                </button>
            </div>
        </div>
    </div>
</section>

<section class="outerwear-collection">
    <div class="container">
        <div class="row main-row">
            <div class="col">
                <div class="home-outerwear-collection__slider swiper-container">
                    <div class="slider swiper-wrapper">
                       <div class="home-outerwear-collection__single swiper-slide">
                            <div class="row">
                                <div class="col-12 col-xl-4 col-md-6 px-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="section-heading mb-3">
                                            <h2>Shop Outerwear</h2>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-6 mb-3 outerwear-image outerwear-image1 outerwear-image1-first"
                                                data-link="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-with-pocket-oa-131"
                                                data-img="{{ asset('img/home/outerwear-slide1-product1.png') }}"
                                                data-name="ONN Men's Half Sleeve Polo Neck Fashion T-Shirt with Pocket"
                                                data-price="₹649.00">
                                                <div class="grid-box grid-box1">
                                                    <img src="{{ asset('img/home/outerwear-slide1-product1_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image1"
                                                data-link="https://onninternational.com/product/round-neck-t-shirt-nc-422"
                                                data-img="{{ asset('img/home/outerwear-slide1-product2.png') }}"
                                                data-name="Round Neck T-Shirt"
                                                data-price="₹399.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide1-product2_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image1"
                                                data-link="https://onninternational.com/product/premium-combed-cotton-round-neck-t-shirt"
                                                data-img="{{ asset('img/home/outerwear-slide1-product3.png') }}"
                                                data-name="Premium Combed Cotton Round Neck T-Shirt"
                                                data-price="₹415.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide1-product3_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image1"
                                                data-link="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-oa-1123"
                                                data-img="{{ asset('img/home/outerwear-slide1-product4.png') }}"
                                                data-name="ONN Men's Half Sleeve Polo Neck Fashion T-Shirt"
                                                data-price="₹649.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide1-product4_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-6 col-md-6 col-xl-4 d-none d-xl-block pt-5">
                                    <img src="{{ asset('img/home/outerwear-slide-main-image_01.png') }}" class="w-100">
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 d-flex align-items-center px-5 pb-5 py-md-5">
                                    <div class="home-product_wrapper w-100">
                                        <a href="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-with-pocket-oa-131" id="productLink1" class="w-100">
                                            <img id="productImage1" src="{{ asset('img/home/outerwear-slide1-product1.png') }}" class="w-100" />
                                            <h4 id="productName1" class="mt-2 p-2">ONN Men's Half Sleeve Polo Neck Fashion T-Shirt with Pocket</h4>
                                            <div class="p-2 d-flex align-items-center justify-content-between">
                                                <p id="productPrice1" class="mb-0 price">₹649</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                       </div>
                       <div class="home-outerwear-collection__single swiper-slide">
                            <div class="row">
                                <div class="col-12 col-xl-4 col-md-6 px-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="section-heading mb-3">
                                            <h2>Shop Outerwear</h2>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-6 mb-3 outerwear-image outerwear-image2  outerwear-image2-first"
                                                data-link="https://onninternational.com/product/hosiery-half-pant"
                                                data-img="{{ asset('img/home/outerwear-slide2-product1.png') }}"
                                                data-name="HOSIERY HALF PANT"
                                                data-price="₹549.00">
                                                <div class="grid-box grid-box1">
                                                    <img src="{{ asset('img/home/outerwear-slide2-product1_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image2"
                                                data-link="https://onninternational.com/product/hosiery-shorts"
                                                data-img="{{ asset('img/home/outerwear-slide2-product3.png') }}"
                                                data-name="HOSIERY SHORTS"
                                                data-price="₹650.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide2-product3_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image2"
                                                data-link="https://onninternational.com/product/half-pant-sinker"
                                                data-img="{{ asset('img/home/outerwear-slide2-product4.png') }}"
                                                data-name="HALF PANT SINKER"
                                                data-price="₹530.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide2-product4_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                             <div class="col-6 mb-3 outerwear-image outerwear-image2"
                                                data-link="https://onninternational.com/product/textile-boxer"
                                                data-img="{{ asset('img/home/outerwear-slide2-product2.png') }}"
                                                data-name="TEXTILE BOXER"
                                                data-price="₹499.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide2-product2_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-6 col-md-6 col-xl-4 d-none d-xl-block pt-5">
                                    <img src="{{ asset('img/home/outerwear-slide-main-image_02.png') }}" class="w-100">
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 d-flex align-items-center px-5 pb-5 py-md-5">
                                    <div class="home-product_wrapper w-100">
                                        <a href="https://onninternational.com/product/hosiery-half-pant" id="productLink2" class="w-100">
                                            <img id="productImage2" src="{{ asset('img/home/outerwear-slide2-product1.png') }}" class="w-100" />
                                            <h4 id="productName2" class="mt-2 p-2">HOSIERY HALF PANT</h4>
                                            <div class="p-2 d-flex align-items-center justify-content-between">
                                                <p id="productPrice2" class="mb-0 price">₹549</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                       </div>
                       {{-- <div class="home-outerwear-collection__single swiper-slide">
                            <div class="row">
                                <div class="col-12 col-xl-4 col-md-6 px-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="section-heading mb-3">
                                            <h2>Shop Outerwear</h2>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3  outerwear-image3-first"
                                                data-link="#"
                                                data-img="{{ asset('img/home/outerwear-slide3-product1.png') }}"
                                                data-name=""
                                                data-price="₹">
                                                <div class="grid-box grid-box1">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product1_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3"
                                                data-link="#"
                                                data-img="{{ asset('img/home/outerwear-slide3-product2.png') }}"
                                                data-name=""
                                                data-price="₹">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product2_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3"
                                                data-link="https://onninternational.com/product/track-pant-12"
                                                data-img="{{ asset('img/home/outerwear-slide3-product3.png') }}"
                                                data-name="TRACK PANT"
                                                data-price="₹899.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product3_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3"
                                                data-link="#"
                                                data-img="{{ asset('img/home/outerwear-slide3-product4.png') }}"
                                                data-name=""
                                                data-price="₹">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product4_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-6 col-md-6 col-xl-4 d-none d-xl-block pt-5">
                                    <img src="{{ asset('img/home/outerwear-slide-main-image_03.png') }}" class="w-100">
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 d-flex align-items-center px-5 pb-5 py-md-5">
                                    <div class="home-product_wrapper w-100">
                                        <a href="#" id="productLink3" class="w-100">
                                            <img id="productImage3" src="{{ asset('img/home/outerwear-slide3-product1.png') }}" class="w-100" />
                                            <h4 id="productName3" class="mt-2 p-2">T</h4>
                                            <div class="p-2 d-flex align-items-center justify-content-between">
                                                <p id="productPrice3" class="mb-0 price">₹</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                       </div> --}}
                       <div class="home-outerwear-collection__single swiper-slide">
                            <div class="row">
                                <div class="col-12 col-xl-4 col-md-6 px-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="section-heading mb-3">
                                            <h2>Shop Innerwear</h2>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-6 mb-3 outerwear-image outerwear-image4  outerwear-image4-first"
                                                data-link="https://onninternational.com/product/mini-trunk-3"
                                                data-img="{{ asset('img/home/outerwear-slide4-product1.png') }}"
                                                data-name="Mini Trunk"
                                                data-price="₹275.00">
                                                <div class="grid-box grid-box1">
                                                    <img src="{{ asset('img/home/outerwear-slide4-product1_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image4"
                                                data-link="https://onninternational.com/product/printed-mini-trunk"
                                                data-img="{{ asset('img/home/outerwear-slide4-product2.png') }}"
                                                data-name="Printed Mini Trunk"
                                                data-price="₹299.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide4-product2_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image4"
                                                data-link="https://onninternational.com/product/long-boxer"
                                                data-img="{{ asset('img/home/outerwear-slide4-product3.png') }}"
                                                data-name="Long Boxer"
                                                data-price="₹285.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide4-product3_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image4"
                                                data-link="https://onninternational.com/product/mens-soft-combed-cotton-sinker-brief-with-ultrasoft-waistband-pack-of-2"
                                                data-img="{{ asset('img/home/outerwear-slide4-product4.png') }}"
                                                data-name="Men's Soft Combed Cotton Sinker Brief with Ultrasoft Waistband (Pack of 2)"
                                                data-price="₹350.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide4-product4_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-6 col-md-6 col-xl-4 d-none d-xl-block pt-5">
                                    <img src="{{ asset('img/home/outerwear-slide-main-image_04.png') }}" class="w-100">
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 d-flex align-items-center px-5 pb-5 py-md-5">
                                    <div class="home-product_wrapper w-100">
                                        <a href="#" id="productLink4" class="w-100">
                                            <img id="productImage4" src="{{ asset('img/home/outerwear-slide4-product1.png') }}" class="w-100" />
                                            <h4 id="productName4" class="mt-2 p-2">T</h4>
                                            <div class="p-2 d-flex align-items-center justify-content-between">
                                                <p id="productPrice4" class="mb-0 price">₹</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                       </div>
                    </div>
                </div>
                <div class="navigation-wrapper px-5 pt-3 pt-md-0">
                    <button type="button" class="collection-btn outerwear-left">
                        <img src="img/home/collection-left-blue.png" />
                    </button>
                    <button type="button" class="collection-btn outerwear-right">
                        <img src="img/home/collection-right-blue.png" />
                    </button>
                </div>
            </div>
            <div class="outerwear-slide-numbers">
                <span data-slide="0" class="active">01</span>
                <span data-slide="1">02</span>
                <span data-slide="2">03</span>
                {{-- <span data-slide="3">04</span> --}}
            </div>
        </div>
    </div>
</section>

<section class="our-exclusives" style="background-image: url({{ asset('img/home/our-exclusives_bg.png') }});">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-effect">
                    <div class="text-background">COMFORT IN EVERY COLOR</div>
                    <div class="text-foreground">
                        <span class="blue">COMFORT IN </span> <span class="red">EVERY COLOR</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="our-exclusives__single swiper-slide">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-6">
                            <a href="https://onninternational.com/product/full-sleeves-rneck" target="_blank" id="comfort_link1">
                                <div class="grid-box text-center">
                                    <img src="{{ asset('img/home/comfort_white_product01.png') }}" alt="" id="comfort_img1" class="w-100">
                                    <h4 id="comfort_name1" class="mt-2 comfort_name">Full Sleeves R/neck</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6">
                            <a href="https://onninternational.com/product/fine-vest" target="_blank" id="comfort_link2">
                                <div class="grid-box text-center">
                                    <img src="{{ asset('img/home/comfort_white_product02.png') }}" alt="" id="comfort_img2" class="w-100">
                                    <h4 id="comfort_name2" class="mt-2 comfort_name">Fine Vest</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6">
                            <a href="https://onninternational.com/product/trendy-polo-t-shirt" target="_blank" id="comfort_link3">
                                <div class="grid-box text-center">
                                    <img src="{{ asset('img/home/comfort_white_product03.png') }}" alt="" id="comfort_img3" class="w-100">
                                    <h4 id="comfort_name3" class="mt-2 comfort_name">Trendy Polo T-shirt</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-6">
                            <div class="grid-box text-center">
                                <a href="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-oa-1123" target="_blank" id="comfort_link4">
                                    <img src="{{ asset('img/home/comfort_white_product04.png') }}" alt="" id="comfort_img4" class="w-100">
                                    <h4 id="comfort_name4" class="mt-2 comfort_name">ONN Men's Half Sleeve Polo Neck Fashion T-Shirt</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-6 mx-auto  ">
                            <div class="exclusives-bar-wrapper d-flex">
                                <p class="our-exclusives-color color-bar1"
                                    data-img1="{{ asset('img/home/comfort_white_product01.png') }}"
                                    data-img2="{{ asset('img/home/comfort_white_product02.png') }}"
                                    data-img3="{{ asset('img/home/comfort_white_product03.png') }}"
                                    data-img4="{{ asset('img/home/comfort_white_product04.png') }}"
                                    data-name1="Full Sleeves R/neck"
                                    data-name2="Fine Vest"
                                    data-name3="Trendy Polo T-shirt"
                                    data-name4="ONN Men's Half Sleeve Polo Neck Fashion T-Shirt"
                                    data-link1="https://onninternational.com/product/full-sleeves-rneck"
                                    data-link2="https://onninternational.com/product/fine-vest"
                                    data-link3="https://onninternational.com/product/trendy-polo-t-shirt"
                                    data-link4="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-oa-1123">
                                </p>
                                <p class="our-exclusives-color color-bar2"
                                    data-img1="{{ asset('img/home/comfort_grey_product01.png') }}"
                                    data-img2="{{ asset('img/home/comfort_grey_product02.png') }}"
                                    data-img3="{{ asset('img/home/comfort_grey_product03.png') }}"
                                    data-img4="{{ asset('img/home/comfort_grey_product04.png') }}"
                                    data-name1="ONN Men's Half Sleeve Polo Neck Fashion T-Shirt with Pocket"
                                    data-name2="Hosiery Half Pant"
                                    data-name3="Round Neck T-Shirt"
                                    data-name4="Half Pant Sinker"
                                    data-link1="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-with-pocket-oa-1134"
                                    data-link2="https://onninternational.com/product/hosiery-half-pant"
                                    data-link3="https://onninternational.com/product/round-neck-t-shirt-nc-422"
                                    data-link4="https://onninternational.com/product/half-pant-sinker">
                                </p>
                                <p class="our-exclusives-color color-bar3"
                                    data-img1="{{ asset('img/home/comfort_black_product01.png') }}"
                                    data-img2="{{ asset('img/home/comfort_black_product02.png') }}"
                                    data-img3="{{ asset('img/home/comfort_black_product03.png') }}"
                                    data-img4="{{ asset('img/home/comfort_black_product04.png') }}"
                                    data-name1="ONN Men's Half Sleeve Polo Neck Fashion T-Shirt with Pocket"
                                    data-name2="Ribbed F/open Boxer"
                                    data-name3=""
                                    data-name4="Round Neck T-Shirt"
                                    data-link1="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-with-pocket-oa-131"
                                    data-link2="https://onninternational.com/product/ribbed-f-open-boxer"
                                    data-link3=""
                                    data-link4="https://onninternational.com/product/round-neck-t-shirt-nc-422">
                                </p>
                                <p class="our-exclusives-color color-bar4"
                                    data-img1="{{ asset('img/home/comfort_blue_product01.png') }}"
                                    data-img2="{{ asset('img/home/comfort_blue_product02.png') }}"
                                    data-img3="{{ asset('img/home/comfort_blue_product03.png') }}"
                                    data-img4="{{ asset('img/home/comfort_blue_product04.png') }}"
                                    data-name1="Round Neck T-Shir"
                                    data-name2="Mini Trunk"
                                    data-name3=""
                                    data-name4=""
                                    data-link1="https://onninternational.com/product/round-neck-t-shirt-nc-422"
                                    data-link2="https://onninternational.com/product/mini-trunk"
                                    data-link3="#"
                                    data-link4="#">
                                </p>
                                <p class="our-exclusives-color color-bar5"
                                    data-img1="{{ asset('img/home/comfort_green_product01.png') }}"
                                    data-img2="{{ asset('img/home/comfort_green_product02.png') }}"
                                    data-img3="{{ asset('img/home/comfort_green_product03.png') }}"
                                    data-img4="{{ asset('img/home/comfort_green_product04.png') }}"
                                    data-name1="Scuba Sweatshirt OW 1222"
                                    data-name2="Ribbed F/open Boxer"
                                    data-name3="Polo T-shirt"
                                    data-name4=""
                                    data-link1="https://onninternational.com/product/scuba-sweatshirt-ow-1222-ow1222"
                                    data-link2="https://onninternational.com/product/ribbed-f-open-boxer-2"
                                    data-link3="https://onninternational.com/product/polo-t-shirt"
                                    data-link4="#">
                                </p>
                                <p class="our-exclusives-color color-bar6"
                                    data-img1="{{ asset('img/home/comfort_red_product01.png') }}"
                                    data-img2="{{ asset('img/home/comfort_red_product02.png') }}"
                                    data-img3="{{ asset('img/home/comfort_red_product03.png') }}"
                                    data-img4="{{ asset('img/home/comfort_red_product04.png') }}"
                                    data-name1="Round Neck T-Shirt"
                                    data-name2=""
                                    data-name3="Polo T-shirt"
                                    data-name4="Padded Jacket Full Sleeves"
                                    data-link1="https://onninternational.com/product/round-neck-t-shirt-nc-422"
                                    data-link2="#"
                                    data-link3="https://onninternational.com/product/polo-t-shirt-2"
                                    data-link4="https://onninternational.com/product/padded-jacket-fulll-sleeves">
                                </p>
                                <p class="our-exclusives-color color-bar7"
                                    data-img1="{{ asset('img/home/comfort_marron_product01.png') }}"
                                    data-img2="{{ asset('img/home/comfort_marron_product02.png') }}"
                                    data-img3="{{ asset('img/home/comfort_marron_product03.png') }}"
                                    data-img4="{{ asset('img/home/comfort_marron_product04.png') }}"
                                    data-name1=""
                                    data-name2="Ribbed F/open Boxer Long"
                                    data-name3=""
                                    data-name4=""
                                    data-link1="#"
                                    data-link2="https://onninternational.com/product/ribbed-f-open-boxer-long"
                                    data-link3="#"
                                    data-link4="#">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($accessoriesCategories->count())
<section class="home-accessories">
    <div class="container">
        <div class="row">
            <div class="col section-heading text-center">
                <h2>Shop <span>Accessories</span></h2>
            </div>
        </div>
        <div class="row">
            @foreach($accessoriesCategories as $cat)
                <div class="col-6 col-sm-6 col-md-3 mb-3 mb-sm-0">
                    <a href="{{ route('front.category.detail', $cat->slug) }}" class="home-accessories_thumb">
                        <figure>
                            <img src="{{ asset($cat->image_path) }}" alt="{{ $cat->home_image_alt }}" class="img-fluid w-100">
                        </figure>
                        <h4>{{ $cat->name }}</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@php
$instagramPosts = !empty($instagramPosts) ? $instagramPosts : [
  [
    'image' => 'img/home/instagram/Hrithik-post1.jpg',
    'url'   => 'https://www.instagram.com/p/DXGvRsCDJ_b/',
    'type'  => 'video'
  ],
  [
    'image' => 'img/home/instagram/Hrithik-post2.jpg',
    'url'   => 'https://www.instagram.com/p/DWYKrwkjLJd/',
    'type'  => 'video'
  ],
  [
    'image' => 'img/home/instagram/post1.jpg',
    'url'   => 'https://www.instagram.com/p/DJGdoUHBqXr/',
    'type'  => 'video'
  ],
  [
    'image' => 'img/home/instagram/post3.png',
    'url'   => 'https://www.instagram.com/p/DF4qgMVPU1a/',
    'type'  => 'video'
  ],
  [
    'image' => 'img/home/instagram/post4.jpg',
    'url'   => 'https://www.instagram.com/p/DUI1fASk8wJ/',
    'type'  => 'video'
  ],
  [
    'image' => 'img/home/instagram/post2.jpg',
    'url'   => 'https://www.instagram.com/p/DSwSAO2klBs/',
    'type'  => 'video'
  ],
];
@endphp

<section class="instagram-section">
    <div class="container">
        <div class="row">
            <div class="col section-heading text-center">
                <h2>FOLLOW US <span>INSTAGRAM</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="instagram-grid">
                    @foreach($instagramPosts as $post)
                    <a href="{{ $post['url'] }}" target="_blank" class="insta-item">
                        <img src="{{ \Illuminate\Support\Str::startsWith($post['image'], ['http://', 'https://']) ? $post['image'] : asset($post['image']) }}" alt="Instagram Post">

                        @if($post['type'] === 'video')
                        <span class="video-icon">▶</span>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

</div>

