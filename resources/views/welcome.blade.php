@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection



@section('shop-now')
@foreach ($subcategories as $subcategory)
    <li><a href="products/{{ $subcategory->category->slug }}/all" >{{ $subcategory->name }}</a></li>
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
<section class="carousel-all">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active" style="background: url('assets/img/site/{{ $owner->banner1_img }}'); background-size: cover; background-position: 50% 50%; height: 590px;">
                <div class="overlay-banner">
                    <div class="inner-center">
                        <div class="inner-center-all">
                            <div class="container">

                                <div class="carousel-caption">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <h2>Up To <span>{{ $brand->off }}% Off</span></h2>
                                        <h1>{{ $brand->name }}</h1>
                                        <a href="{{ $brand->category->slug }}/{{ $brand->subcategory->slug }}/{{ $brand->slug }}" class="btn btn-md btn-view">Buy Now</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url('assets/img/site/{{ $owner->banner2_img }}');; background-size: cover; background-position: 50% 50%; height: 590px;">
                <div class="overlay-banner">
                    <div class="inner-center">
                        <div class="inner-center-all">
                            <div class="container">

                                <div class="carousel-caption">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <h2>Up To <span>{{ $brand->off }}% Off</span></h2>
                                        <h1>{{ $brand->name }}</h1>
                                        <button type="button" class="btn btn-md btn-view">Buy Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            

        </div>
        <div class="cover-control">
            <div class="container">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control hidden-sm hidden-xs" href="#carousel-example-generic" role="button" data-slide="prev">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control hidden-sm hidden-xs" href="#carousel-example-generic" role="button" data-slide="next">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="contact-info">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12 coler">
                <div class="icon-all">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                </div>
                <div class="icon-desc">
                    <p>Order Online</p>
                    <p>(Call us at : {{ $owner->contact }})</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 coler">
                <div class="icon-all">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
                <div class="icon-desc">
                    <p>Safe & Secure Payment</p>
                    <p>A Secure Encryption</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 coler">
                <div class="icon-all">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                </div>
                <div class="icon-desc">
                    <p>Get 10% Off On Reorder</p>
                    <p>Money Saving Programs</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 coler">
                <div class="icon-all">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="icon-desc">
                    <p>Leave Us A Line</p>
                    <p><a href="#">{{ $owner->email }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="category">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <!-- visible for  desktop-->
                <div class="col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs no-padding right-padding">
                    <div class="wrap-category">
                        <div class="category-head">
                            <p><i class="fa fa-bars" aria-hidden="true"></i>Categories</p>
                        </div>
                        <div class="item-list-category">
                            <ul class="item-cate">

                                @foreach ($categories as $category)
                                <li>                                    
                                        <div class="dropdown droppr">
                                            <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="fa fa-chevron-right"></i>
                                               <a href="/products/{{ $category->slug }}/all">{{ $category->name }}</a>
                                            </a>
                                           
                                                
                                        </div>
                                            </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- visible for  desktop-->

                <!-- visible for responsive-->
                <div class="col-md-12 col-sm-12 col-xs-12 hidden-md hidden-lg no-padding right-padding">
                    <div class="wrap-category">
                        <div class="category-head">
                            <p><i class="fa fa-bars" aria-hidden="true"></i>Categories</p>
                        </div>
                        <div class="item-list-category">
                            <ul class="item-cate">
                                @foreach ($categories as $category)
                                <li>
                                    <div class="dropdown">
                                        <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="fa fa-chevron-right"></i>
                                                <a href="/products/{{ $category->slug }}">{{ $category->name }}</a>
                                        </a>
                                        
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="seller-slider">
                    <div class="page-header" style="margin-top: 10px;">
                        <h2>Best Seller</h2>
                    </div>
                    <div class="owl-carousel owl-theme themer">
                        <div class="item">
                            <ul class="feature-item side-nav-feature-item">
                                @foreach ($bestproducts as $bestproduct)
                                    <?php $myimage = explode("|", $bestproduct->image);?>
                                <li>
                                    <div class="img-prod-all" style="background: url('assets/img/products/{{ $bestproduct->category->id }}/{{ $bestproduct->subcategory->id }}/{{ $myimage[0] }}'); height: 60px; width:60px; background-size: cover; background-position: 50% 50%;">
                                    </div>
                                    <div class="desc-all-alert">
                                        <p>{{ $bestproduct->name }}</p>
                                       
                                        <div class="col-md-6 col-xs-12 col-sm-12 no-padding">
                                            <span>Rs.{{ $bestproduct->price }}</span>
                                        </div>
                                        <form method="POST" action="{{ route('mycart.store') }}">
                                            @csrf
                                            <input type="hidden" name="product" value="{{ $bestproduct->id }}"/>
                                            @if (Auth::user())
                                            <button type="submit" class="btn btn-sm btn-cart">Add To Cart</button>
                                            @endif
                                        </form>
                                        
                                        <a href="/{{ $bestproduct->category->slug }}/{{ $bestproduct->subcategory->slug }}/{{ $bestproduct->slug }}" class="btn btn-sm btn-cart"><i class="fa fa-eye"></i></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <?php 
                        $ad1 = asset('assets/img/ads/'.$land[0][0]); 
                        $ad2 = asset('assets/img/ads/'.$land[1][0]); 
                        $ad3 = asset('assets/img/ads/'.$land[2][0]); 
                        ?>
                    </div>
                </div>
                <div class="ad-section hidden-sm hidden-xs" style="background: url({{ $ad3 }}); background-size: cover; background-position: 50% 50%; height: 202px; width: 100%; float: left;">

                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 ">
                <!-- hidden for responsive-->
               
                <div class="col-md-8 col-sm-12 col-xs-12 res-no-padding hidden-xs hidden-sm">
                    <div class="ad-all-img" style="background: url({{ $ad1 }}); background-size: cover; background-position: 50% 50%; width: 100%; height: 200px;">
                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 res-no-padding text-center hidden-xs hidden-sm">
                    <div class="ad-all-img" style="background: url({{ $ad2 }}); background-size: cover; background-position: 50% 50%; width: 100%; height: 200px;">
                      
                    </div>
                </div>
                <!-- hidden for responsive-->
                <div class="col-md-12">
                    <div class="wrap-product-update">
                        <div class="page-header">
                            <h2>Popular Products</h2>
                        </div>
                        <div class="owl-carousel owl-theme themer-on">

                            @foreach ($popularproducts as $popularproduct)
                            <div class="item">
                                <div class="wrap-inner-prod text-center">
                                    <div class="inner-prod">
                                        <?php $image = explode("|", $popularproduct->image);?>
                                        <img src="assets/img/products/{{ $popularproduct->category->id }}/{{ $popularproduct->subcategory->id }}/{{ $image[0] }}" alt="{{ $popularproduct->name }}">
                                        @if ($popularproduct->off != 0)
                                        <span class="disc-block">{{ $popularproduct->off }}% Off</span>
                                        @endif
                                    </div>
                                    <p>{{ $popularproduct->name }}</p>

                                    
                                    <div class="col-md-12 col-xs-12 col-sm-12 no-padding text-center">
                                        <span>Rs.{{ $popularproduct->price }}</span>
                                    </div>
                                    <form method="POST" action="{{ route('mycart.store') }}">
                                            @csrf
                                            <input type="hidden" name="product" value="{{ $popularproduct->id }}"/>
                                            @if (Auth::user())
                                            <button type="submit" class="btn btn-sm btn-cart">Add To Cart</button>
                                            @endif
                                    <a href="/{{ $popularproduct->category->slug }}/{{ $popularproduct->subcategory->slug }}/{{ $popularproduct->slug }}" class="btn btn-sm btn-cart"><i class="fa fa-eye"></i></a>
                                    </form>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-sea-prods">
                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#season-pro" aria-controls="home" role="tab" data-toggle="tab">Seasonal Product</a></li>
                                <li role="presentation"><a href="#top-sell" aria-controls="profile" role="tab" data-toggle="tab">Top Selling Product</a></li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="season-pro">
                                    <div class="owl-carousel owl-theme themer-on-all">

                                            @foreach ($seasonalproducts as $seasonalproduct)
                                            <?php $myimage = explode("|", $seasonalproduct->image);?>

                                            <div class="item">
                                                <div class="wrap-inner-prod text-center">
                                                    <div class="inner-prod">
                                                        <img src="assets/img/products/{{ $seasonalproduct->category->id }}/{{ $seasonalproduct->subcategory->id }}/{{ $myimage[0] }}" alt="{{ $seasonalproduct->name }}">
                                                        @if ($seasonalproduct->off != 0)
                                                        <span class="disc-block">{{ $seasonalproduct->off }}% Off</span>
                                                        @endif
                                                    </div>
                                                    <p>{{ $seasonalproduct->name }}</p>
                                                    <div class="col-md-12 col-xs-12 col-sm-12 no-padding text-center">
                                                        <span>Rs.{{ $seasonalproduct->price }}</span>
                                                    </div>
                                                    <form method="POST" action="{{ route('mycart.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="product" value="{{ $seasonalproduct->id }}"/>
                                                            @if (Auth::user())
                                                            <button type="submit" class="btn btn-sm btn-cart">Add To Cart</button>
                                                            @endif
                                                    <a href="/{{ $seasonalproduct->category->slug }}/{{ $seasonalproduct->subcategory->slug }}/{{ $seasonalproduct->slug }}" class="btn btn-sm btn-cart"><i class="fa fa-eye"></i></a>
                                                    </form>
                                                </div>
                                            </div>
                                            @endforeach

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="top-sell">
                                    <div class="owl-carousel owl-theme themer-on-all-snd">

                                        @foreach ($topsellProducts as $topsellProduct)
                                        <?php $myimage = explode("|", $topsellProduct->image);?>

                                        <div class="item">
                                            <div class="wrap-inner-prod text-center">
                                                <div class="inner-prod">
                                                    <img src="assets/img/products/{{ $topsellProduct->category->id }}/{{ $topsellProduct->subcategory->id }}/{{ $myimage[0] }}" alt="{{ $topsellProduct->name }}">
                                                   
                                                </div>
                                                <p>{{ $topsellProduct->name }}</p>
                                                <div class="col-md-12 col-xs-12 col-sm-12 no-padding text-center">
                                                    <span>Rs.{{ $topsellProduct->price }}</span>
                                                </div>
                                                <form method="POST" action="{{ route('mycart.store') }}">
                                                        @csrf
                                                        <input type="hidden" name="product" value="{{ $topsellProduct->id }}"/>
                                                        @if (Auth::user())
                                                        <button type="submit" class="btn btn-sm btn-cart">Add To Cart</button>
                                                        @endif
                                                <a href="/{{ $topsellProduct->category->slug }}/{{ $topsellProduct->subcategory->slug }}/{{ $topsellProduct->slug }}" class="btn btn-sm btn-cart"><i class="fa fa-eye"></i></a>
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
        </div>
    </div>
</section>
 <section class="testimonial">
   <div class="container">
       <div class="row">
          <div class="col-md-12">

              @if (!Auth::user())
                <div class="col-md-4 col-sm-12 col-xs-12 no-padding text-center">
                 <div class="wrap-subs">
                    <h1>Subscribe</h1>
                    <p>Sign Up & Get Discounts</p>
                    <form class="subs-form" method="POST" action="/subscribers">
                        @csrf
                       <div class="form-group">
                           <input class="form-control" type="text" name="email" placeholder="Email Address" required>
                       </div>
                       <button type="submit" class="btn btn-md btn-send">Send</button>
                    </form>
                    <p>After launching new products We will notify you.....</p>
                 </div>
                 
                </div>
                @endif
                @if (Auth::user())
              <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="padding-right: 15px;">
                  <div class="wrap-testi text-center">
                      <div class="page-header">
                         <h2>Top Products</h2>
                      </div>
                      <div class="owl-carousel owl-theme themer-on-all-snd-testi">
                          @foreach ($highprices as $high)
                          <?php $myimage = explode("|", $high->image);?>                             
                          <div class="item text-center">
                                <img src="assets/img/products/{{ $high->category->id }}/{{ $high->subcategory->id }}/{{ $myimage[0] }}">
                              <a href="/{{ $high->category->slug }}/{{ $high->subcategory->slug }}/{{ $high->slug }}" style="text-decoration:none;">
                                <h3>{{ $high->name }}</h3></a>
                              <p>Rs.{{ $high->price }}</p>
                              <h4>{{ $high->detail }}</h4>
                          </div>
                          
                          @endforeach

                      </div>
                 </div>
             </div>
             @else
             <div class="col-md-8 col-sm-12 col-xs-12 no-padding" style="padding-right: 15px;">
                    <div class="wrap-testi text-center">
                        <div class="page-header">
                           <h2>Top Products</h2>
                        </div>
                        <div class="owl-carousel owl-theme themer-on-all-snd-testi">
                            @foreach ($highprices as $high)
                            <?php $myimage = explode("|", $high->image);?>      
                            <div class="item text-center">
                                    <img src="assets/img/products/{{ $high->category->id }}/{{ $high->subcategory->id }}/{{ $myimage[0] }}">
                                <a href="/{{ $high->category->slug }}/{{ $high->subcategory->slug }}/{{ $high->slug }}" style="text-decoration:none;">
                                  <h3>{{ $high->name }}</h3></a>
                                <p>Rs.{{ $high->price }}</p>
                                <h4>{{ $high->detail }}</h4>
                            </div>
                            
                            @endforeach
  
                        </div>
                   </div>
               </div>
             @endif
          </div>
       </div>
   </div>
</section> 

@endsection