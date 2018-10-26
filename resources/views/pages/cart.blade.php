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
                    <li><a href="/cart" class="active">Cart</a></li>
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
                        <span>Your Cart</span> <span>({{ count($carts) }} Product(s) )</span>
                    </div>
                </div>
                <div class="view-cart-all">
                    <ul>
                        <div class="wrapup-cart">
                            <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12 dtl-cart">
                                <p>Product Name And Details</p>
                            </div>
                        </div>
                        @forelse ($carts as $cart)
                        <?php $myimage = explode("|", $cart->product->image);
                              $cat = $cart->product->category->id;
                            $subcat = $cart->product->subcategory->id;
                        ?>
                        <li>
                                <div class="col-md-1 col-sm-12 col-xs-12">
                                    <div class="view-img">
                                        <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $cart->product->name }}"> 
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12 col-xs-12">
                                    <div class="view-cart-desc">
                                        <a href="/{{ $cart->product->category->slug }}/{{ $cart->product->subcategory->slug }}/{{ $cart->product->slug }}"><p class="cart-hd">{{ $cart->product->name }} <a href="/my-cart/{{ $cart->id }}"  class="btn btn-md btn-shop"><i class="fa fa-trash-o" aria-hidden="true"></i>Remove</a></p></a>
                                        <div class="col-quan">
                                            <p>
                                                <input type="hidden" value="{{ $cart->product->price }}" id="price"/>
                                                <span class="view-price">Price:</span><span class="view-cost">Rs.{{ $cart->product->price }}</span>
                                            </p>
                                            <div class="div-quan">
                                                <span class="quantity">
                                                    <span class="qty">QTY</span>
                                                    <select class="quantity-nav" data-id="{{ $cart->id }}">
                                                            <option selected>{{ $cart->quantity }}</option>
                                                            <?php 
                                                            for($i=1; $i<= $cart->product->stock; $i++){
                                                                ?>
                                                                @if ($cart->quantity != $i)
                                                                <option>{{ $i }}</option>
                                                                @endif
                                                            <?php } ?>
                                                        </select>
                                                       
                                                </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <p class="all-price">Total Product Price: <span>Rs.{{ (($cart->quantity) * ($cart->product->price)) }}</span></p>
                                </div>
                            </li>
                        @empty
                            {{ 'No Items in Cart!' }}
                            <div class="btn-view-cart">
                                    <span class="continue-shop"><a href="/" class="btn btn-md btn-shoper">Continue Shopping</a></span>
                            </div>
                        @endforelse
                            @if (count($carts) != 0)
                            <div class="col-md-12 col-sm-12">
                                    <div class="mdal-deal-cart">
                                        <span>Seller Subtotal : </span><span>Rs.{{ $sub }}</span>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                        <div class="mdal-deal-cart">
                                            <span>Shipping : </span><span>Rs.{{ $sub >= '10000' ? '0' : '100' }}</span>
                                        </div>
                                </div>


                                <div class="col-md-12 col-sm-12">
                                        <div class="mdal-deal-cart">
                                            <span>Taxes (13%) : </span><span>Rs.{{ $tax }}</span>
                                        </div>
                                </div>

                            @endif
                        
                        
                           
                    
                            </ul>
                    @if (count($carts) != 0)
                    <div class="col-md-4 col-sm-12 col-xs-12 pull-right">
                        <div class="right-flt">
                            <div class="span-all mdal-deal right-all-float">
                                <span class="ttl">TOTAL : </span><span class="deal-test">Rs.{{ $sub >= '10000' ? round($sub+$tax) : round($sub+100+$tax) }}</span>
                            </div>
                        </div>
                        <div class="fees">
                            <p>Shipping Above Rs.10,000 Are Free</p>
                        </div>
                        <div class="btn-view-cart">
                            <span class="continue-shop"><a href="/" class="btn btn-md btn-view checkblack">Continue Shopping</a></span>
                            <a href="/checkout" class="btn btn-md btn-view checkblack">Check Out</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity-nav')

            Array.from(classname).forEach(function(element){
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-id')
                    axios.patch(`/my-cart-update/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response){
                        //console.log(response);
                        window.location.href = '{{ route('mycart.list') }}'
                    })
                    .catch(function(error){
                        console.log(error);
                    });
                })
            })
        })();
    </script>
@endsection

@endif