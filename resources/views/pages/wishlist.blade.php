@if(Auth::user())
@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('shop-now')
@foreach ($subcategories as $subcategory)
<li><a href="products/{{ $subcategory->category->slug }}/all">{{ $subcategory->name }}</a></li>
@endforeach
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
    {{ 'No Items Found!' }}
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
<section class="list-contents">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="link-lister">
                    <li><a href="/">Home</a></li>
                    <span class="sep">/</span>
                    <li><a href="/wishlist" class="active">Wishlist</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="content-inside">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copup-top">
                    <div class="page-title inc-num">
                            @if (count($wishlists) > 0)
                        <span>Your Wishlist</span> <span>({{ count($wishlists) }} Products added)</span>
                        @endif

                    </div>
                </div>
                <div class="view-cart-all wisher">
                    <ul>
                            @if (count($wishlists) > 0)
                        <div class="wrapup-cart">
                            <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12 dtl-cart">
                                <p>Product Name And Details</p>
                            </div>
                        </div>
                        @endif
                        @if (count($wishlists) > 0)
                        @foreach ($wishlists as $wishlist)
                        <li>
                                <?php $myimage = explode("|", $wishlist->product->image);
                                $cat = $wishlist->product->category->id;
                                $subcat = $wishlist->product->subcategory->id;
                               
                                ?>
                                <div class="col-md-1 col-sm-12 col-xs-12">
                                    <div class="view-img">
                                            <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $wishlist->product->name }}">                                       
                                    </div>
                                </div>
                                <div class="col-md-11 col-sm-12 col-xs-12">
                                    <div class="col-wish">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="view-cart-desc">
                                                <a href="/{{ $wishlist->product->category->slug }}/{{ $wishlist->product->subcategory->slug }}/{{ $wishlist->product->slug }}"><p class="cart-hd">{{ $wishlist->product->name }}</p></a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <p><span class="view-price">Price:</span><span class="view-cost">Rs.{{ $wishlist->product->price }}</span></p>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12 text-right">

                                            <a href="/my-wishlist-del/{{ $wishlist->id }}"  class="btn btn-md btn-shop"><i class="fa fa-trash-o" aria-hidden="true"></i>Remove</a>
                                        </div>
                                        <div class="col-md-2 col-sm-12 col-xs-12 text-right">
                                                <form method="POST" action="{{ route('mycart.store') }}">
                                                        @csrf
                                                        <input type="hidden" name="product" value="{{ $wishlist->product->id }}"/>
                                                        <input type="hidden" name="wish" value="{{ $wishlist->id }}"/>
                                                        @if (Auth::user())
                                                        <button type="submit" style="border:0px;background:#fff;"><a href="#"  class="btn btn-md btn-shop btn-carter"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Add To Cart</a></button>
                                                        @endif
                                                    </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @if (count($wishlists) > 0)
                                <div class="col-md-2 col-sm-12 col-xs-12 pull-right">
                                <a href="/wishlist/clear"  class="btn btn-md btn-shop"><i class="fa fa-trash-o" aria-hidden="true"></i>Clear Wishlist</a>
                                </div>
                            @endif
                        @else
                            <h3><center> {{ 'No Items in Wishlist!' }}</center></h3>
                        @endif
                       

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@endif

