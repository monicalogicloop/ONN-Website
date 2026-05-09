@extends('layouts.app')

@section('page', 'Home')

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
            {{-- <div class="home-banner__slider-single swiper-slide">
                <div class="video__wrapper">
                    <img src="img/banner3.jpg" />
                </div>
            </div>
            <div class="home-banner__slider-single swiper-slide">
                <div class="video__wrapper">
                    <video id="onn-video" width="320" height="240" muted loop playsinline>
                        <source src="video/banner.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="home-banner__slider-single swiper-slide">
                <div class="video__wrapper">
                    <img src="img/banner2.jpg" />
                </div>
            </div>
            <div class="home-banner__slider-single swiper-slide">
                <div class="video__wrapper">
                    <img src="img/banner1.jpg" />
                </div>
            </div> --}}
        </div>
    </div>
</section>

{{--<section id="sale" class="home-offers">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <h4>Become <span>franchise</span> of</h4>
                <h2><span>ONN</span> exclusive store</h2>
                <!-- <p>Offer valid upto 15th may</p> -->
            </div>
            <div class="col-sm-5 offset-sm-1 text-sm-right">
                <a href="{{route('front.franchise.index')}}" class="offer-button">Learn More</a>
            </div>
        </div>
    </div>
</section>--}}

<section id="statistics" class="home-statistics">
    <div class="container-fuild">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="statistics-wrapper d-flex items-center justify-center gap-3">
                    <img src="{{ asset('img/home/statistics_01.png') }}">
                    <p class="">Pan-India Delivery</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="statistics-wrapper d-flex items-center justify-center gap-3">
                    <img src="{{ asset('img/home/statistics_02.png') }}">
                    <p class="">Made with Imported Technology</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="statistics-wrapper d-flex items-center justify-center gap-3">
                    <img src="{{ asset('img/home/statistics_03.png') }}">
                    <p class="">Quality-Tested Fabric</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="statistics-wrapper d-flex items-center justify-center gap-3">
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
            <div class="col section-heading">
                <h2>Featured <span>Categories</span></h2>
            </div>
            <div class="col-auto">
                <button type="button" class="collection-btn collection-left">
                    <img src="img/home/collection-left.png" />
                </button>
                <button type="button" class="collection-btn collection-right">
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
</section>

<section class="shop-look" style="background-image: url({{ asset('img/home/shop-look_bg.png') }});">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-end" style="z-index: 15;">
                <ul class="nav custom-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#Gym">Gym</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Casuals">Outerwear</button>
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
        <div class="row">
            <div class="col">
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="Gym">
                        <div class="row">
                            <div class="col-xl-1 d-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-11">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Gym_v2.png') }}" class="img-fluid w-100 shop-main-image">
                                    <!-- Dot 1 -->
                                    <span class="hotspot"
                                            style="top:35%; left:35%;"
                                            data-link="https://onninternational.com/product/full-sleeves-rn-t-shirt"
                                            data-img="{{ asset('img/home/Gym-product_01.png') }}"
                                            data-name="FULL SLEEVES R/N T-SHIRT"
                                            data-price="₹499.00">
                                    </span>
                                    <!-- Dot 2 -->
                                    <span class="hotspot"
                                            style="top:55%; left:38%;"
                                            data-link="https://onninternational.com/product/winter-track-pant"
                                            data-img="{{ asset('img/home/Gym-product_02.png') }}"
                                            data-name="WINTER TRACK PANT"
                                            data-price="₹999.00">
                                    </span>
                                    <div class="shop-look-product-card shop-look-product-card1 home-product_wrapper">
                                        <a href="https://onninternational.com/product/full-sleeves-rn-t-shirt" id="productLink">
                                            <img id="productImage" src="{{ asset('img/home/Gym-product_01.png') }}" alt="">
                                            <h4 id="productName" class="mt-2 p-2">FULL SLEEVES R/N T-SHIRT</h4>
                                            <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                                <p class="mb-0 price" id="productPrice">₹499.00</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Casuals">
                       <div class="row">
                            <div class="col-xl-1 d-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-11">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Casuals.png') }}" class="img-fluid w-100 shop-main-image">
                                    <!-- Dot 1 -->
                                    <span class="hotspot hotspot2"
                                            style="top:25%; left:35%;"
                                            data-link="https://onninternational.com/product/structure-knitted-jumper-ow-1223-ow-1223"
                                            data-img="{{ asset('img/home/Casuals-product_01.png') }}"
                                            data-name="Structure Knitted Jumper OW 1223"
                                            data-price="₹749.00">
                                    </span>
                                    <!-- Dot 2 -->
                                    <span class="hotspot hotspot2"
                                            style="top:55%; left:32%;"
                                            data-link="https://onninternational.com/product/winter-track-pant"
                                            data-img="{{ asset('img/home/Casuals-product_02.png') }}"
                                            data-name="WINTER TRACK PANT"
                                            data-price="₹999.00">
                                    </span>
                                    <div class="shop-look-product-card shop-look-product-card2 home-product_wrapper">
                                        <a href="https://onninternational.com/product/structure-knitted-jumper-ow-1223-ow-1223" id="shopproductLink2">
                                            <img id="shopproductImage2" src="{{ asset('img/home/Casuals-product_01.png') }}" alt="">
                                            <h4 id="shopproductName2" class="mt-2 p-2">Structure Knitted Jumper OW 1223</h4>
                                            <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                                <p class="mb-0 price" id="shopproductPrice2">₹749.00</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Holiday">
                       <div class="row">
                            <div class="col-xl-1 d-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-11">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Holiday.png') }}" class="img-fluid w-100 shop-main-image">
                                    <!-- Dot 1 -->
                                    <span class="hotspot hotspot3"
                                            style="top:35%; left:37%;"
                                            data-link="https://onninternational.com/product/hoodie-jacket"
                                            data-img="{{ asset('img/home/Holiday-product_01.png') }}"
                                            data-name="HOODIE JACKET"
                                            data-price="₹1,299.00">
                                    </span>
                                    <!-- Dot 2 -->
                                    <span class="hotspot hotspot3"
                                            style="top:55%; left:38%;"
                                            data-link="https://onninternational.com/product/half-pant"
                                            data-img="{{ asset('img/home/Holiday-product_02.png') }}"
                                            data-name="HALF PANT"
                                            data-price="₹799.00">
                                    </span>
                                    <div class="shop-look-product-card shop-look-product-card3 home-product_wrapper">
                                        <a href="https://onninternational.com/product/hoodie-jacket" id="shopproductLink3">
                                            <img id="shopproductImage3" src="{{ asset('img/home/Holiday-product_01.png') }}" alt="">
                                            <h4 id="shopproductName3" class="mt-2 p-2">HOODIE JACKET</h4>
                                            <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                                <p class="mb-0 price" id="shopproductPrice3">₹1,299.00</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Lounge">
                       <div class="row">
                            <div class="col-xl-1 d-flex align-items-center">
                                <div class="shop-heading-wrapper">
                                    <div class="text-effect">
                                        <div class="text-background">SHOP THE LOOK</div>
                                        <div class="text-foreground">
                                            <span class="blue">SHOP THE</span> <span class="red">LOOK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-11">
                                <div class="shop-category-image">
                                    <img src="{{ asset('img/home/Lounge.png') }}" class="img-fluid w-100 shop-main-image">
                                    <!-- Dot 1 -->
                                    <span class="hotspot hotspot4"
                                            style="top:35%; left:25%;"
                                            data-link="https://onninternational.com/product/emboss-round-neck-t-shirt"
                                            data-img="{{ asset('img/home/Lounge-product_01.png') }}"
                                            data-name="EMBOSS ROUND NECK T-SHIRT"
                                            data-price="₹450.00">
                                    </span>
                                    <!-- Dot 2 -->
                                    <span class="hotspot hotspot4"
                                            style="top:55%; left:38%;"
                                            data-link="https://onninternational.com/product/printed-boxer"
                                            data-img="{{ asset('img/home/Lounge-product_02.png') }}"
                                            data-name="PRINTED BOXER"
                                            data-price="₹499.00">
                                    </span>
                                    <div class="shop-look-product-card shop-look-product-card4 home-product_wrapper">
                                        <a href="https://onninternational.com/product/emboss-round-neck-t-shirt" id="shopproductLink4">
                                            <img id="shopproductImage4" src="{{ asset('img/home/Lounge-product_01.png') }}" alt="">
                                            <h4 id="shopproductName4" class="mt-2 p-2">EMBOSS ROUND NECK T-SHIRT</h4>
                                            <div class="product-info p-2 d-flex align-items-center justify-content-between">
                                                <p class="mb-0 price" id="shopproductPrice4">₹450.00</p>
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
    </div>
</section>

<section id="collection" class="home-collection pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col section-heading">
                <h2>Shop By <span>Collection</span></h2>
            </div>
            <div class="col-auto">
                <button type="button" class="collection-btn collection-left">
                    <img src="img/home/collection-left.png" />
                </button>
                <button type="button" class="collection-btn collection-right">
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
</section>

<section class="outerwear-collection">
    <div class="container">
        <div class="row" style="background-color: #C10909;border-radius:20px;position:relative;">
            <div class="col">
                <div class="home-outerwear-collection__slider swiper-container">
                    <div class="slider swiper-wrapper">
                       <div class="home-outerwear-collection__single swiper-slide">
                            <div class="row">
                                <div class="col px-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="section-heading">
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
                                <div class="col pt-5">
                                    <img src="{{ asset('img/home/outerwear-slide-main-image_01.png') }}" class="w-100">
                                </div>
                                <div class="col d-flex align-items-center px-5">
                                    <div class="home-product_wrapper">
                                        <a href="https://onninternational.com/product/onn-mens-half-sleeve-polo-neck-fashion-t-shirt-with-pocket-oa-131" id="productLink1">
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
                                <div class="col px-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="section-heading">
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
                                                data-link="https://onninternational.com/product/textile-boxer"
                                                data-img="{{ asset('img/home/outerwear-slide2-product2.png') }}"
                                                data-name="TEXTILE BOXER"
                                                data-price="₹499.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide2-product2_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image2"
                                                data-link="https://onninternational.com/product/half-pant"
                                                data-img="{{ asset('img/home/outerwear-slide2-product3.png') }}"
                                                data-name="HALF PANT"
                                                data-price="₹799.00">
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
                                        </div>
                                </div>
                                <div class="col pt-5">
                                    <img src="{{ asset('img/home/outerwear-slide-main-image_02.png') }}" class="w-100">
                                </div>
                                <div class="col d-flex align-items-center px-5">
                                    <div class="home-product_wrapper">
                                        <a href="https://onninternational.com/product/hosiery-half-pant" id="productLink2">
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
                       <div class="home-outerwear-collection__single swiper-slide">
                            <div class="row">
                                <div class="col px-5 d-flex flex-column align-items-center justify-content-center">
                                        <div class="section-heading">
                                            <h2>Shop Outerwear</h2>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3  outerwear-image3-first"
                                                data-link="https://onninternational.com/product/track-pant-12"
                                                data-img="{{ asset('img/home/outerwear-slide3-product1.png') }}"
                                                data-name="TRACK PANT"
                                                data-price="₹899.00">
                                                <div class="grid-box grid-box1">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product1_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3"
                                                data-link="https://onninternational.com/product/track-pant"
                                                data-img="{{ asset('img/home/outerwear-slide3-product2.png') }}"
                                                data-name="TRACK PANT"
                                                data-price="₹999.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product2_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3"
                                                data-link="https://onninternational.com/product/winter-joggers"
                                                data-img="{{ asset('img/home/outerwear-slide3-product3.png') }}"
                                                data-name="WINTER JOGGERS"
                                                data-price="₹999.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product3_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3 outerwear-image outerwear-image3"
                                                data-link="https://onninternational.com/product/regular-track-pant"
                                                data-img="{{ asset('img/home/outerwear-slide3-product4.png') }}"
                                                data-name="REGULAR TRACK PANT"
                                                data-price="₹850.00">
                                                <div class="grid-box">
                                                    <img src="{{ asset('img/home/outerwear-slide3-product4_thumb.png') }}" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col pt-5">
                                    <img src="{{ asset('img/home/outerwear-slide-main-image_03.png') }}" class="w-100">
                                </div>
                                <div class="col d-flex align-items-center px-5">
                                    <div class="home-product_wrapper">
                                        <a href="https://onninternational.com/product/track-pant-12" id="productLink3">
                                            <img id="productImage3" src="{{ asset('img/home/outerwear-slide3-product1.png') }}" class="w-100" />
                                            <h4 id="productName3" class="mt-2 p-2">TRACK PANT</h4>
                                            <div class="p-2 d-flex align-items-center justify-content-between">
                                                <p id="productPrice3" class="mb-0 price">₹899</p>
                                                <p class="shop_cta">Shop Now</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                       </div>
                    </div>
                </div>
                <div class="navigation-wrapper px-5">
                    <button type="button" class="collection-btn collection-left">
                        <img src="img/home/collection-left-blue.png" />
                    </button>
                    <button type="button" class="collection-btn collection-right">
                        <img src="img/home/collection-right-blue.png" />
                    </button>
                </div>
            </div>
            <div class="outerwear-slide-numbers">
                <span data-slide="0" class="active">01</span>
                <span data-slide="1">02</span>
                <span data-slide="2">03</span>
            </div>
        </div>
    </div>
</section>

<section class="inner-outer-collection">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <div class="section-heading">
                    <h2 class="mb-0">Best <span>Seller</span></h2>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end mt-3 mt-md-0">
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
                                            <h4 class="mt-2 p-2">{{$productValue->name}}</h4>
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
                            <button type="button" class="collection-btn collection-left">
                                <img src="img/home/collection-left.png" />
                            </button>
                            <button type="button" class="collection-btn collection-right">
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
                                            <h4 class="mt-2 p-2">{{$productValue->name}}</h4>
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
                            <button type="button" class="collection-btn collection-left">
                                <img src="img/home/collection-left.png" />
                            </button>
                            <button type="button" class="collection-btn collection-right">
                                <img src="img/home/collection-right.png" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="winter-collection" style="background-image: url({{ asset('img/home/winter-collection_bg.png') }});">
    <div class="container-fuild">
        <div class="row">
            <div class="col-lg-6 col-md-12"></div>
            <div class="col-lg-6 col-md-12">
                <div>
                    <div class="section-heading">
                        <h2>Shop Winter Wear</h2>
                    </div>
                    <div class="home-winter-collection__slider swiper-container">
                        <div class="slider swiper-wrapper">
                            @foreach($winterproducts as $productKey => $productValue)
                                <div class="home-product_wrapper swiper-slide">
                                    <a href="{{ route('front.product.detail', $productValue->slug) }}">
                                        <img src="{{asset($productValue->image)}}" class="w-100" />
                                        <h4 class="mt-2 p-2">{{$productValue->name}}</h4>
                                        <div class="p-2 d-flex align-items-center justify-content-between">
                                            <p class="mb-0 price">{{$productValue->price}}</p>
                                            <p class="shop_cta">Shop Now</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-navigation mt-3">
                        <button type="button" class="collection-btn collection-left">
                            <img src="img/home/collection-left-blue.png" />
                        </button>
                        <button type="button" class="collection-btn collection-right">
                            <img src="img/home/collection-right-blue.png" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-exclusives" style="background-image: url({{ asset('img/home/our-exclusives_bg.png') }});">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-effect">
                    <div class="text-background">OUR EXCLUSIVES</div>
                    <div class="text-foreground">
                        <span class="blue">OUR</span> <span class="red">EXCLUSIVES</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="our-exclusives__single swiper-slide">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="grid-box text-center mb-5">
                                <img src="{{ asset('img/home/our-exclusives_product3_01.png') }}" alt="" id="our-exclusives_image1">
                            </div>
                            <div class="grid-box text-center">
                                <img src="{{ asset('img/home/our-exclusives_product3_03.png') }}" alt="" id="our-exclusives_image2">
                            </div>
                        </div>
                        <div class="col-xl-6 d-flex align-items-center justify-content-center">
                            <div class="grid-box text-center ">
                                <img src="{{ asset('img/home/our-exclusives_center_03.png') }}" alt="" id="our-exclusives_center">
                                <h4 class="mt-2 p-2 product-name" id="our-exclusives_center_name">Black Full Sleeve Sports T-Shirt</h4>
                                <a href="" id="our-exclusives_center_link"><span class="shop_cta">Shop Now</span></a>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="grid-box text-center mb-5">
                                <img src="{{ asset('img/home/our-exclusives_product3_02.png') }}" alt="" id="our-exclusives_image3">
                            </div>
                            <div class="grid-box text-center">
                                <img src="{{ asset('img/home/our-exclusives_product3_04.png') }}" alt="" id="our-exclusives_image4">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-6 mx-auto  ">
                            <div class="exclusives-bar-wrapper d-flex">
                                <p class="our-exclusives-color color-bar1"
                                    data-img1="{{ asset('img/home/our-exclusives_product3_01.png') }}"
                                    data-img2="{{ asset('img/home/our-exclusives_product3_03.png') }}"
                                    data-img3="{{ asset('img/home/our-exclusives_product3_02.png') }}"
                                    data-img4="{{ asset('img/home/our-exclusives_product3_04.png') }}"
                                    data-centerimg="{{ asset('img/home/our-exclusives_center_03.png') }}"
                                    data-centername="PRINTED SWEATSHIRT"
                                    data-centerlink="#">
                                </p>
                                <p class="our-exclusives-color color-bar2"
                                    data-img1="{{ asset('img/home/our-exclusives_product2_01.png') }}"
                                    data-img2="{{ asset('img/home/our-exclusives_product2_03.png') }}"
                                    data-img3="{{ asset('img/home/our-exclusives_product2_02.png') }}"
                                    data-img4="{{ asset('img/home/our-exclusives_product2_04.png') }}"
                                    data-centerimg="{{ asset('img/home/our-exclusives_center_02.png') }}"
                                    data-centername="Black Full Sleeve Sports T-Shirt"
                                    data-centerlink="#">
                                </p>
                                <p class="our-exclusives-color color-bar3"
                                    data-img1="{{ asset('img/home/our-exclusives_product1_01.png') }}"
                                    data-img2="{{ asset('img/home/our-exclusives_product1_03.png') }}"
                                    data-img3="{{ asset('img/home/our-exclusives_product1_02.png') }}"
                                    data-img4="{{ asset('img/home/our-exclusives_product1_04.png') }}"
                                    data-centerimg="{{ asset('img/home/our-exclusives_center_01.png') }}"
                                    data-centername="EMBOSS ROUND NECK T-SHIRT"
                                    data-centerlink="#">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="our-exclusives" style="background-image: url({{ asset('img/home/our-exclusives_bg.png') }});">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-effect">
                    <div class="text-background">OUR EXCLUSIVES</div>
                    <div class="text-foreground">
                        <span class="blue">OUR</span> <span class="red">EXCLUSIVES</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="home-outerwear-collection__slider swiper-container">
                    <div class="slider swiper-wrapper">
                        <div class="our-exclusives__single swiper-slide">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="grid-box text-center mb-5">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                    <div class="grid-box text-center">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6 d-flex align-items-center justify-content-center">
                                    <div class="grid-box text-center ">
                                        <img src="{{ asset('img/home/our-exclusives_center_01.png') }}" alt="">
                                        <h4 class="mt-2 p-2 product-name">Black Full Sleeve Sports T-Shirt</h4>
                                        <span class="shop_cta">Shop Now</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="grid-box text-center mb-5">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                    <div class="grid-box text-center">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="our-exclusives__single swiper-slide">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="grid-box text-center mb-5">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                    <div class="grid-box text-center">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6 d-flex align-items-center justify-content-center">
                                    <div class="grid-box text-center ">
                                        <img src="{{ asset('img/home/our-exclusives_center_01.png') }}" alt="">
                                        <h4 class="mt-2 p-2 product-name">Black Full Sleeve Sports T-Shirt</h4>
                                        <span class="shop_cta">Shop Now</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="grid-box text-center mb-5">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                    <div class="grid-box text-center">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="our-exclusives__single swiper-slide">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="grid-box text-center mb-5">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                    <div class="grid-box text-center">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6 d-flex align-items-center justify-content-center">
                                    <div class="grid-box text-center ">
                                        <img src="{{ asset('img/home/our-exclusives_center_01.png') }}" alt="">
                                        <h4 class="mt-2 p-2 product-name">Black Full Sleeve Sports T-Shirt</h4>
                                        <span class="shop_cta">Shop Now</span>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="grid-box text-center mb-5">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                    <div class="grid-box text-center">
                                        <img src="{{ asset('img/home/our-exclusives_product_01.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="swiper-pagination bullet"></div>

                <div class="text-center mt-3">
                    <button type="button" class="collection-btn collection-left">
                        <img src="img/home/collection-left.png" />
                    </button>
                    <button type="button" class="collection-btn collection-right">
                        <img src="img/home/collection-right.png" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section>
    <div class="container-fuild">
        <div class="row">
            <div class="col">
                <a href="/" target="_blank">
                    <img src="{{ asset('img/home/home-offer-banner.png') }}" class="img-fluid">
                </a>
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
                <div class="col-12 col-sm-6 col-md-3 mb-3 mb-sm-0">
                    <a href="{{ route('front.category.detail', $cat->slug) }}" class="home-accessories_thumb">
                        <figure>
                            <img src="{{ asset($cat->image_path) }}" alt="{{ $cat->home_image_alt }}" class="img-fluid">
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
$instagramPosts = [
  [
    'image' => 'img/home/instagram/post1.jpg',
    'url'   => 'https://www.instagram.com/p/DJGdoUHBqXr/',
    'type'  => 'video'
  ],
  [
    'image' => 'img/home/instagram/post2.jpg',
    'url'   => 'https://www.instagram.com/p/C_vNdlJSshh/',
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
    'image' => 'img/home/instagram/post5.jpg',
    'url'   => 'https://www.instagram.com/p/DTApFNajE8c/',
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
                        <img src="{{ asset($post['image']) }}" alt="Instagram Post">

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

{{-- <section class="instagram-section">
    <div class="container">
        <div class="row">
            <div class="col section-heading text-center">
                <h2>FOLLOW US <span>INSTAGRAM</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="">
                   <video
                    autoplay
                    muted
                    loop
                    playsinline
                    class="insta-video" style="w-100">
                    <source src="{{ asset('img/home/instagram/reel_01.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</section> --}}



{{-- <section>
    <div class="container">
        <div class="row">
            <div class="col">
                <blockquote class="instagram-media"
                data-instgrm-permalink="https://www.instagram.com/met.mumbai/"
                data-instgrm-version="14">
                </blockquote>

                <script async src="//www.instagram.com/embed.js"></script>
            </div>
        </div>
    </div>
</section> --}}



{{-- <section class="home-sale">
    <div class="home-sale__slider swiper-container">
        <div class="slider swiper-wrapper">
            @foreach ($galleries as $galleryKey => $galleryValue)
                <div class="home-sale__single swiper-slide">
                    <figure>
                        <img src="{{asset($galleryValue->image)}}" />
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}
@endsection

<!-- Popup Modal Start -->
{{-- <div class="modal fade" id="homepagePopup" tabindex="-1" aria-labelledby="homepagePopupLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="row g-0">
          <!-- Left Side Text -->
          <div class="col-md-6 d-flex flex-column justify-content-center p-4">
            <h3>Welcome to Our Website!</h3>
            <p>Get amazing offers and updates by subscribing to our newsletter. Don’t miss out!</p>
            <a href="#" class="btn btn-primary mt-2">Learn More</a>
          </div>
          <!-- Right Side Image -->
          <div class="col-md-6">
            <img src="https://via.placeholder.com/500x300" class="img-fluid w-100 h-100" alt="Popup Image" style="object-fit: cover;">
          </div>
        </div>
      </div>
      <!-- Optional Close Button -->
      <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var myModal = new bootstrap.Modal(document.getElementById('homepagePopup'));
        myModal.show();
    }, 3000); // 3000ms = 3 seconds
});
</script> --}}
<!-- Popup Modal End -->


{{-- Video Sticky Code Start --}}
{{-- <div id="shopify-section-video-box" class="shopify-section"><div class="video-box-wrapper" id="videoBoxWrapper">
  <!-- Close Button -->
  <button class="video-close-btn" onclick="document.getElementById('videoBoxWrapper').style.display='none'">×</button>

  <!-- Desktop Facade -->
  <div class="video-desktop">
    <div class="video-facade" onclick="loadYoutubeVideo(this, 'csRwan6yiCo')">
      <img src="https://img.youtube.com/vi/csRwan6yiCo/hqdefault.jpg" alt="YouTube Thumbnail">
      <div class="play-button">▶</div>
    </div>
  </div>

  <!-- Mobile Button -->
  <div class="video-mobile">
    <button class="video-button" onclick="window.open('https://www.youtube.com/watch?v=csRwan6yiCo', '_blank')">▶</button>
          <a href="https://order.pynkworld.com/login" class="login-mob-Btn">Distributor Login</a>

  </div>
</div>

<script>
    function loadYoutubeVideo(el, videoId) {
    const iframe = document.createElement('iframe');
    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&controls=1&rel=0&showinfo=0`;
    iframe.frameBorder = '0';
    iframe.allow = 'autoplay; encrypted-media';
    iframe.allowFullscreen = true;
    iframe.width = '100%';
    iframe.height = '100%';

    el.innerHTML = '';
    el.appendChild(iframe);
    }
</script> --}}
{{-- Video Sticky Code End --}}

{{-- <style>
.video-box-wrapper {
  position: fixed;
  bottom: 50px;
  left: 20px;
  z-index: 9999;
}

.video-close-btn {
  position: absolute;
  top: -7px;
  right: -7px;
  background: #ee0c6f;
  color: white;
  border: none;
  border-radius: 50%;
  font-size: 16px;
  width: 24px;
  height: 24px;
  cursor: pointer;
  z-index: 10000;
}

/* Facade Styles */
.video-facade {
  position: relative;
  width: 320px;
  height: 180px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  cursor: pointer;
}
.video-facade img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.video-facade .play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 48px;
  color: white;
  text-shadow: 0 0 10px rgba(0,0,0,0.7);
}

/* Mobile Styles */
.video-mobile {
  display: none;
  position: relative;
}
.video-button {
  width: 50px;
  height: 50px;
  background-color: #FF0000;
  color: white;
  border: none;
  border-radius: 50%;
  font-size: 24px;
  font-weight: bold;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  cursor: pointer;
  position: absolute;
  bottom: 64px;
}

@media (max-width: 767px) {
  .video-desktop {
    display: none;
  }
  .video-mobile {
    display: block;
  }
  .video-box-wrapper {
    bottom: 20px;
    left: 20px;
  }
  .video-close-btn {
    display: none;
  }
}
</style> --}}
</div>

