@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection




@section('shop-now')
<?php $ad1 = asset('assets/img/ads/'.$shop[0]); ?>

<hr>
<img src="{{ $ad1 }}" alt="" style="background:#fff;">
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="link-lister otherpage">
                    <li><a href="/">Home</a></li>
                    <span class="sep">/</span>
                    <li><a>{{ $category->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="content-inside in-prod-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="page-wrap">
                    <h3>Filter By Price</h3>
                </div>
                <div class="range-wrap">
                    <form>
                        <input type="hidden" id="slug" value="{{ $category->slug }}" />
                        <input type="text" id="range_28" name="ranger" value="1" />
                        <button type="button" onclick="filterPrice(this.form)" class="btn-filter">
                            <svg version="1.1" id="Layer_1" class="svgnfil" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="12px" height="12px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0{fill:#ffffff;}
                                    </style>
                                <g>
                                    <rect x="10" y="3" class="st0" width="6" height="2"/>
                                    <polygon class="st0" points="3,7 9,7 9,1 3,1 3,3 0,3 0,5 3,5 	"/>
                                    <rect y="11" class="st0" width="6" height="2"/>
                                    <polygon class="st0" points="13,9 7,9 7,15 13,15 13,13 16,13 16,11 13,11 	"/>
                                </g>
                                </svg>
                            Filter
                        </a>
                    </form>
                    <script>
                        function filterPrice(form){
                            var range = form.range_28.value;
                            var slug = form.slug.value;
                            window.location.href = 'products/'+slug+'/range/'+range;
                        }
                    </script>
                </div>
               
                <div class="page-wrap">
                        <h3>Top Product</h3>
                    </div>
                    
                    <div class="range-wrap">
                            <div class="owl-carousel owl-theme themer">
        
                                <div class="item">
                                    <ul class="feature-item side-nav-feature-item">
                                        @foreach ($populars as $popular)
                                        <?php $myimage = explode("|", $popular->image);
                                        $cat = $popular->category->id;
                                        $subcat = $popular->subcategory->id;
                                        ?>
                                        <li>
                                                <div class="img-prod-all" style="height: 50px; width:50px; background-size: cover; background-position: 50% 50%;">
                                                        <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $popular->name }}">          
                                                </div>
                                                <a href="/{{ $popular->category->slug }}/{{ $popular->subcategory->slug }}/{{ $popular->slug }}" class="desc-all-alert">
                                                    <p>{{ $popular->name }}</p>
                                                    <div class="col-md-6 col-xs-12 col-sm-12 no-padding">
                                                        <span>Rs.{{ $popular->price }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                       
                                    </ul>
                                </div>
        
                            </div>
                        </div>

                <div class="page-wrap">
                    <h3>Best sales</h3>
                </div>

                <div class="range-wrap">
                    <div class="owl-carousel owl-theme themer">

                        <div class="item">
                            <ul class="feature-item side-nav-feature-item">
                                @foreach ($bestproducts as $bestproduct)
                                <?php $myimage = explode("|", $bestproduct->image);
                                $cat = $bestproduct->category->id;
                                $subcat = $bestproduct->subcategory->id;
                                ?>
                                <li>
                                        <div class="img-prod-all" style="height: 50px; width:50px; background-size: cover; background-position: 50% 50%;">
                                        <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $bestproduct->name }}">                  
                                                                
                                            </div>
                                        <a href="/{{ $bestproduct->category->slug }}/{{ $bestproduct->subcategory->slug }}/{{ $bestproduct->slug }}" class="desc-all-alert">
                                            <p>{{ $bestproduct->name }}</p>
                                            <div class="col-md-6 col-xs-12 col-sm-12 no-padding">
                                                <span>Rs.{{ $bestproduct->price }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                               
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="page-wrap pad-gri">
                    <h3 style="border-bottom: none;">{{ $category->name }}</h3>
                </div>
                <div class="grid-list-product">
                    <div class="pad-taby">
                        <div class="wrap-taby-content">
                            <div class="col-md-2 col-sm-12 col-xs-12 p-l-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tobby" role="tablist">
                                        <li role="presentation" class="active"><a href="#grid" aria-controls="grid" role="tab" data-toggle="tab"><img src="{{ asset('assets/img/menu.png') }}"></a></li>
                                        <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab"><img src="{{ asset('assets/img/list.png') }}"></a></li>
                                </ul>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3 text-right">
                                <form class="all-select pull-right">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <select class="sort form-control" data-id="{{ $category->slug }}" >
                                                <option selected disabled class="form-control">Sort By Relevance</option>
                                                <option value="sort=nameA" class="form-control" >Name ( A - Z )</option>
                                                <option value="sort=nameD"  class="form-control">Name ( Z - A )</option>
                                                <option value="sort=priceA"  class="form-control">Price ( Low > High )</option>
                                                <option value="sort=priceD"  class="form-control">Price ( High > Low )</option>
                                            </select>

                                         
                                       
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active fade in" id="grid">
                            @foreach ($products as $product)
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
                                    @foreach ($products as $product)
                                    <?php $myimage = explode("|", $product->image);
                                    $cat = $product->category->id;
                                    $subcat = $product->subcategory->id;       
        
                                    ?>
                                <li>
                                    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                                        <div class="inner-prod">
                                            <div class="mid-inner">
                                                <div class="inner-mid">
                                            <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $product->name }}">                                         
                                                   
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
                <div class="pad-taby tab-pagination">
                    <div class="wrap-taby-content">
                        <div class="col-md-2 col-sm-12 col-xs-12 p-l-0">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tobby" role="tablist">
                                <li role="presentation" class="active"><a href="#grid" aria-controls="grid" role="tab" data-toggle="tab"><img src="{{ asset('assets/img/menu.png') }}"></a></li>
                                <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab"><img src="{{ asset('assets/img/list.png') }}"></a></li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12 text-right">
                                <nav aria-label="...">
                                    <ul class="pagination pull-right">
                                        <li>{{ $products->links() }}</li>
                                        </ul>
                                </nav>
                            </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.sort')

            Array.from(classname).forEach(function(element){
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-id')
                    element.setAttribute('value', this.value)
                    axios.get(`/products/${id}/${this.value}`, {
                    })
                    .then(function (response, id = element.getAttribute('data-id') ){
                        //console.log(response);
                        myval = element.getAttribute('value')
                        window.location.href = `/products/${id}/${myval}`
                    })
                    .catch(function(error){
                        console.log(error);
                    });
                })
            })
        })();
    </script>
@endsection

@endsection

