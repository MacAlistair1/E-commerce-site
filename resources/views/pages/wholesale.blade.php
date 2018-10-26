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
<section class="list-contents list-content-prod">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <ul class="link-lister otherpage">
                        <li><a href="/">Home</a></li>
                        <span class="sep">/</span>
                        <li><a>WholeSale</a></li>
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
                                @foreach ($popularproducts as $product)
                                <?php $myimage = explode("|", $product->image);
                                    $cat = $product->category->id;
                                    $subcat = $product->subcategory->id;       
        
                                    ?>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="wrap-inner-prod text-center">
                                        <div class="inner-prod">
                                            <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $product->name }}">                                         
                                     
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
                            <div role="tabpanel" class="tab-pane fade" id="list">
                                <ul class="list-product">
                                        @foreach ($popularproducts as $product)
                                    <li>
                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                                            <div class="inner-prod">
                                                <div class="mid-inner">
                                                    <div class="inner-mid">
                                                        <img src="{{ asset('assets/img/lis.png') }}">
                                                    </div>
                                                </div>
                                                @if ($product->off != 0)
                                                <span class="disc-block">{{ $product->off }}% Off</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <div class="des-product">
                                                <div class="mid-inner">
                                                    <div class="inner-mid">
                                                        <h2>{{ $product->name }}</h2>
                                                        <p>{{ $product->detail }}</p>
                                                        <div class="price">
                                                            <span class="deal-testman">Rs.{{ $product->price }}</span>
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
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                            <nav aria-label="...">
                                <ul class="pagination pull-right">
                                    <li>{{ $popularproducts->links() }}</li>
                                    </ul>
                            </nav>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection