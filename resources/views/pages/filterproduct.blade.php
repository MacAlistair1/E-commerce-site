@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('shop-now')
<?php 
$ad = session('ad');
?>
<hr>
<img src="{{ asset('assets/img/ads/'.$ad) }}"  style="background:#fff;">
<center style="margin-top:-20%;margin-left:30%;" class="btn btn-lg btn-view"><a href="/{{ $brand->category->slug }}/{{ $brand->subcategory->slug }}/{{ $brand->slug }}" style="text-decoration:none;">Buy Now</a></center>
<hr>
@endsection

@section('count-cart')
@if (Auth::user())
@if (count($carts) > 0)
<span class="badge">{{ count($carts) }}</span>
@endif
@endif
@endsection

<?php  $null = false; ?>

@section('cart-list')
@if (Auth::user())
@forelse ($carts as $cart)
<?php $myimage = explode("|", $cart->product->image);
      $cat = $cart->product->category->id;
      $subcat = $cart->product->subcategory->id;
      ?>
      
<li>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $cart->product->name }}">   
        </div>

        <div class="col-md-8 col-sm-12 col-xs-12">
            <h4>
                {{ $cart->product->name }}
                <a href="/my-cart/{{ $cart->id }}" class="closer"><i class="fa fa-close"></i></a>
            </h4>
            <p class="price">{{ $cart->quantity }} pcs.</p>
            <p class="price">Rs.{{ $cart->product->price }}</p>
        </div>

    </li>
@empty
    {{ 'No Items in Cart!' }}
    <?php $null = true; ?>
@endforelse
<?php  $sub = 0; ?>
@foreach ($carts as $cart)
<?php
$sub +=  (($cart->quantity) * ($cart->product->price));
?>
@endforeach
<?php $tax = ($sub)*0.13; ?>
@if (!$null)
<div class="col-md-12">
        <div class="total">
            <p>Subtotal : <span>Rs.{{ $sub }}</span></p>
            <p>Shipping : <span>Rs.100</span></p>
            <p>Taxes (13%): <span>Rs.{{ $tax }}</span></p>
            <p>Total : <span>Rs.{{ $sub+100+$tax }}</span></p>
            <a href="/checkout" class="btn btn-md btn-view checkblack">Checkout</a>
        </div>
    </div>
@endif
   
@endif
@endsection

@section('content')
<section class="list-contents list-content-prod">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <ul class="link-lister otherpage">
                        <li><a href="/">Home</a></li>
                        <span class="sep">/</span>
                        <li><a href="/products/{{ $category->slug }}/all">{{ $category->name }}</a></li>
                        <span class="sep">/</span>
                        <li><a> <svg version="1.1" id="Layer_1" class="svgnfil" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="20px" height="16px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                               <style type="text/css">
                                   .st0{fill:#000;}
                               </style>
                           <g>
                               <rect x="10" y="3" class="st0" width="6" height="2"/>
                               <polygon class="st0" points="3,7 9,7 9,1 3,1 3,3 0,3 0,5 3,5 	"/>
                               <rect y="11" class="st0" width="6" height="2"/>
                               <polygon class="st0" points="13,9 7,9 7,15 13,15 13,13 16,13 16,11 13,11 	"/>
                           </g>
                           </svg>Filtered Product</a></li>
                        <li class="pull-right"><b style="font-size:15pt;">Range :::: </b>&nbsp;<b class="alert alert-success">{{ $frange }}<>{{ $lrange }}</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="content-inside in-prod-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade in" id="grid">
                                @foreach ($products as $product)
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="wrap-inner-prod text-center">
                                        <div class="inner-prod">
                                            <img src="{{ asset('assets/img/lis.png') }}">
                                            @if ($product->off != 0)
                                            <span class="disc-block">{{ $product->off }}% Off</span>
                                            @endif
                                        </div>
                                        <p>{{ $product->name }}</p>
                                        <div class="col-md-12 col-xs-12 col-sm-12 no-padding text-center">
                                            <span>Rs.{{ $product->price }}</span>
                                        </div>
                                        <form method="POST" action="{{ route('mycart.store') }}">
                                                @csrf
                                                <input type="hidden" name="product" value="{{ $product->id }}"/>
                                                @if (Auth::user())
                                                <button type="submit" class="btn btn-sm btn-cart">Add To Cart</button>
                                                @endif
                                                <a href="/{{ $product->category->slug }}/{{ $product->subcategory->slug }}/{{ $product->slug }}" class="btn btn-sm btn-cart"><i class="fa fa-eye"></i></a>
                                            </form>
                                    </div>
                                </div>
                                @endforeach
    
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection