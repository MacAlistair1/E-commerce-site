@if (Auth::user())
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
<section class="list-contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="link-lister">
                        <li><a href="/">Home</a></li>
                        <span class="sep">/</span>
                        <li><a href="/my-history" class="active">History</a></li>
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
                        </div>
                        <div class="view-cart-all wisher">
                            <ul>
                                @if (count($histories) > 0)
                                <div class="wrapup-cart">
                                    <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12 dtl-cart">
                                        <p>Product Name And Details</p>
                                    </div>
                                </div>
                                @endif
                                @if (count($histories) > 0)
                                    @foreach ($histories as $history)
                                   
                                    <li>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-wish">
                                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                                        <div class="view-cart-desc">
                                                            <a href=""><p class="cart-hd">{{ $history->product_name }}</p></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                                        <p><span class="view-price">Quantity:</span><span class="view-cost">{{ $history->quantity }} pcs.</span></p>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                                            <p><span class="view-price">Total Price:</span><span class="view-cost">Rs.{{ $history->total }}</span></p>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                                            <p><span class="view-price">Delivered On:</span><span class="view-cost">{{ $history->created_at }}</span></p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-12 col-xs-12 pull-right">
            
                                                        <a href="/user-history/{{ $history->id }}"  class="btn btn-md btn-shop"><i class="fa fa-trash-o" aria-hidden="true"></i>Remove</a>
                                                    </div>
                                                 
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                    @endforeach
                                @else
                                    <h3><center>{{ 'No History Available!' }}</center></h3>
                                @endif
                                
                            </ul>
                            @if (count($histories) > 0)
                            <div class="col-md-2 col-sm-12 col-xs-12 pull-right">
                                    <a href="/history/clear"  class="btn btn-md btn-shop"><i class="fa fa-trash-o" aria-hidden="true"></i>Clear History</a>
                                </div>
                            @endif
                            
                        </div>
                        <div class="pad-taby tab-pagination">
                                <div class="wrap-taby-content">
                                    <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                                            <nav aria-label="...">
                                                <ul class="pagination pull-right">
                                                    <li>{{ $histories->links() }}</li>
                                                    </ul>
                                            </nav>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section> 
    
@endsection
@endif