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
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="header">
                    <h1>Checkout</h1>
                    <p>Fill the labels to proceed for checkout.</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <ul class="link-lister otherpage pull-right" style="border:none;">
                    <li><a href="/">Home</a></li>
                    <span class="sep">/</span>
                    <li><a href="/checkout" class="active">Checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="content-inside">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form class="label-form" method="POST" action="/checkout-section">
                    @csrf
                    <div class="colm-reg">
                        <h2> Details</h2>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Contact Number</label>
                            <input type="tel" class="form-control" name="contact" value="{{ Auth::user()->contact }}" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}" required>
                        </div>
                        <div class="form-group col-md-12 checkman">
                            <button type="submit" class="btn btn-lg btn-view">
                               Complete Checkout
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@endif