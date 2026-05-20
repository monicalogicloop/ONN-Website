@extends('layouts.app')
@section('page', 'Order Complete')

@section('content')

    @php
        $orderData = \App\Models\Order::where('order_no', $order_no)->first();
        $orderProductsData = \App\Models\OrderProduct::where('order_id', $orderData->id)->get();

        $couponData = [];
        if($orderData->coupon_code_id != 0) {
            $couponData = \App\Models\Coupon::where('id', $orderData->coupon_code_id)->first();
        }
    @endphp

{{-- @if(Session::get('success')) --}}
    <section class="cart-header mb-3 mb-sm-5"></section>
    <section class="cart-wrapper">
        <div class="container">
            <div class="complele-box">
                <figure>
                    <img src="{{asset('img/box.png')}}">
                </figure>
                <figcaption>
                    <h2>Your order is complete</h2>
                    <p>{{Session::get('success')}}</p>
                    <p>You will receive an email confirmation shortly.</p>

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderProductsData as $item)
                                <tr>
                                    <td>{{$item->sku_code}}</td>
                                    <td>{{$item->productDetails->category->name}}</td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->offer_price}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->qty * $item->offer_price}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Shipping charge</td>
								@if($orderData->address_type=='ho')
									<td>0</td>
								@elseif($orderData->address_type=='dankuni')
									<td>0</td>
								@else
                                	<td>{{(int) $orderData->shipping_charges}}</td>
								@endif
								
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Order value</td>
								@if($orderData->address_type=='ho')
									<td>{{(int) ($orderData->final_amount)-($orderData->shipping_charges)}}</td>
								@elseif($orderData->address_type=='dankuni')
									<td>{{(int) ($orderData->final_amount)-($orderData->shipping_charges)}}</td>
								@else
                                <td>{{(int) $orderData->final_amount}}</td>
								@endif
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{route('front.user.order')}}">View all orders</a>
                </figcaption>
            </div>
        </div>
    </section>
{{-- @else
    <script>window.location = "{{route('front.home')}}";</script>
@endif --}}

@endsection

@section('script')
<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ ecommerce: null });
    window.dataLayer.push({
        event: 'purchase',
        ecommerce: {
            transaction_id: {!! json_encode($orderData->order_no) !!},
            value: {{(int) $orderData->final_amount}},
            tax: {{(int) $orderData->tax_amount}},
            shipping: {{(int) $orderData->shipping_charges}},
            currency: 'INR',
            coupon: {!! json_encode((!empty($couponData)) ? $couponData->coupon_code : '') !!},
            items: [
                @foreach($orderProductsData as $item)
                {
                    item_id: {!! json_encode($item->sku_code) !!},
                    item_name: {!! json_encode($item->product_name) !!},
                    coupon: {!! json_encode((!empty($couponData)) ? $couponData->coupon_code : '') !!},
                    discount: {{$item->price - $item->offer_price}},
                    item_brand: 'ONN',
                    item_category: {!! json_encode($item->productDetails->category->name) !!},
                    item_variant: {!! json_encode($item->productVariationDetails->colorDetails->name) !!},
                    price: {{$item->offer_price}},
                    quantity: {{$item->qty}}
                }@if(!$loop->last),@endif
                @endforeach
            ]
        },
        enhanced_conversion_data: {
            email: {!! json_encode($orderData->email) !!},
            phone_number: {!! json_encode($orderData->mobile) !!},
            first_name: {!! json_encode($orderData->fname) !!},
            last_name: {!! json_encode($orderData->lname) !!},
            home_address: {
                street: {!! json_encode($orderData->shipping_address) !!},
                city: {!! json_encode($orderData->shipping_city) !!},
                region: {!! json_encode($orderData->shipping_city) !!},
                postal_code: {!! json_encode($orderData->shipping_pin) !!},
                country: {!! json_encode($orderData->shipping_country) !!}
            }
        }
    });
</script>
@endsection