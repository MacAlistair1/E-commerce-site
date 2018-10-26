@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('shop-now')
<hr>
<img src="{{ asset('assets/img/banner-vertical.png') }}" alt="" style="background:#fff;">

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
                <?php 
                $myimage = explode("|", $product->image);
                $cat = $product->category->id;
                $subcat = $product->subcategory->id;
                $total = count($myimage);
                ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="link-lister otherpage">
                    <li><a href="/">Home</a></li>
                    <span class="sep">/</span>
                    <li><a href="/products/{{ $product->category->slug }}/all">{{ $product->category->name }}</a></li>
                    <span class="sep">/</span>
                    <li><a href="/products/{{ $product->category->slug }}/all">{{ $product->subcategory->name }}</a></li>
                    <span class="sep">/</span>
                    <li><a class="active">{{ $product->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="content-inside in-prod-content">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div id="owl-1" class="owl-carousel owl-theme elemmodal">
                    <?php $i=1; ?>
                    @foreach ($myimage as $image)
                    <div class="item">
                            <div class="inner-proder">
                                <div class="mid-inner text-center">
                                    <div class="inner-mid">
                                       <span class='zoom' id='ex{{ $i }}'>
                                           <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$image);  ?>" alt="{{ $product->name }}" style="width: 180px;">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
                <!--thumbnail-->
                <div id="owl-2" class="owl-carousel owl-theme nail">
                       
                <?php
                    for($i=0; $i< $total; $i++ ){
                        ?>
                        <div class="item">
                                <div class="inner-proder">
                                    <div class="mid-inner">
                                        <div class="inner-mid">
                                                <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[$i]);  ?>" alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php    
                    }
                    ?>
                   
                  
                </div>


                <div class="all-class-dot">
                    <div class="btns">
                        <div class="customNextBtn owl-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                        <div class="customPreviousBtn owl-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="ader">
                    <a href="#">
                            <?php $ad1 = asset('assets/img/ads/'.$detail[0]); ?>
                        <img src="{{ $ad1 }}">
                    </a>
                </div>
            </div>

            
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="des-product proda">
                    <div class="mid-inner">
                        <div class="inner-mid">
                            <h2>{{ $product->name }}</h2>
                            <p>{{ $product->detail }}</p>
                            <div class="price">
                                <span class="deal-testman">Rs.{{ $product->price }}</span>
                            </div>
                            <ul class="code-list">
                                <li>Product Code : <span>{{ $product->code }}</span></li>
                                <li>Total Stock : <span>{{ $product->stock }} PCS</span></li>
                            </ul>
                            @if (Auth::user())
                          
                            <div class="col-md-6 col-sm-12 col-xs-12 no-padding pull-right">
                                <div class="carty">
                                        
                                        <!-- Nav tabs -->
                                <ul class="nav nav-tabs pull-right">
                                    <li>
                                            <form method="POST" action="{{ route('mycart.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="product" value="{{ $product->id }}"/>
                                                    <button type="submit" class="btn btn-sm btn-cart">Add To Cart</button>
                                                </form>
                                    </li>
                                    <li>
                                            <form method="POST" action="/my-wishlist">
                                                @csrf
                                            <input type="hidden" name="product" value="{{ $product->id }}"/>
                                            <button type="submit" class="btn btn-sm btn-cart comp"><i class="fa fa-heart-o"></i></button>
                                            </form>

                                    </li>
                                </ul>
                                       
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 no-padding tab-rev">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Description</a></li>
                                    <li role="presentation"><a href="#tag" aria-controls="tab" role="tab" data-toggle="tab">Tags</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active fade in" id="desc">
                                        {!! $product->description !!}
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tag">
                                        <?php
                                            $tags = explode(",", $product->tags);
                                        ?>
                                        @foreach ($tags as $tag)
                                        <form method="POST" action="{{ route('product.search') }}">
                                                @csrf
                                                <input type="hidden"  name="search" class="form-control" value="{{ $tag }}" required>
                                                <button  class="btn btn-primary btn-small" type="submit">{{ $tag }}</button>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="row">
            <div class="col-md-12" style="padding-top: 30px; padding-bottom: 10px;">
                <div class="wrap-product-update">
                    <div class="page-header">
                        <h2>Featured Products</h2>
                    </div>
                    <div class="owl-carousel owl-theme draggy">
                        @foreach ($featuredProducts as $product)
                        <?php $myimage = explode("|", $product->image);
                        $cat = $product->category->id;
                        $subcat = $product->subcategory->id;
                        ?>      

                        <div class="item">
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
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection