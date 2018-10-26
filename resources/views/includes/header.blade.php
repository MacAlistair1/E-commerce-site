<!DOCTYPE html>
<html>
<head>

    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/range.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ionskin.css') }}">
</head>
<body>
<section class="scroll-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12 col-xs-12">

                    <?php 
                    $logo = session('logo');
                    ?>
                    <a class="navbar-brand" href="/"><img src="{{ asset('assets/img/site/'.$logo) }}" alt="{{ asset('assets/img/site/'.$logo) }}"></a>
               
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="search">
                    <form class="search-all" action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <input type="text"  name="search" class="form-control" placeholder="Search..." required>
                        <button  class="searcher" style="border:none;" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            @if (Auth::user())
            <div class="col-md-3 col-sm-12 col-xs-12">
                    <ul class="phone-wrap phone-wraper">
                        <li class="dropdown">
                            <div class="btn-group">
                                     
                                <a href="/cart" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false" >
                                    <span>{{ Auth::user()->fname }}<?php echo "'";?>s CART</span> <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                    @yield('count-cart')
                                </a>
                                <ul class="dropdown-menu menor">
                                    <form action="/checkout" method="POST">
                                            @yield('cart-list')
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

              

            @endif
           
        </div>
    </div>
</section>
<section class="show-hide-header-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                    @if (count($errors->all()) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
    
                    @elseif (session('success'))
                        <p class="alert alert-success">{{ session('success') }}</p>
                    @elseif (session('error'))
                        <p class="alert alert-danger">{{ session('error') }}</p>
                    @else
                    <p class="alert"><?php echo session('head_title'); ?></p>
                    @endif
            </div>
        </div>
    </div>
</section>
<section class="top-header hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                <ul class="phone-wrap">
                    <li>
                   </li>
                    <li><a href="#">Our Story</a></li>
                    <li class="social">
                            <a href="<?php echo session('fb_url'); ?>"><i class="fa fa-facebook"></i></a>
                            <a href="<?php echo session('twitter_url'); ?>"><i class="fa fa-twitter"></i></a>
                            <a href="<?php echo session('insta_url'); ?>"><i class="fa fa-instagram"></i></a>
                            <a href="<?php echo session('yt_url'); ?>"><i class="fa fa-youtube"></i></a>
                            <a href="<?php echo session('gplus_url'); ?>"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
                <ul class="phone-wrap" style="text-align: right;">
                                       <li><a href="#">Our Story</a></li>
                                        <li><a href="#">Social Involvement</a>
                    <li class="hidden-xs hidden-sm">
                        <div class="dropdown">
                            <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                               @if (!Auth::user())
                                   {{ 'My Account' }}
                               @else
                                   {{ Auth::user()->fname }}
                               @endif
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                @if (!Auth::user())
                                <li><a href="#" data-toggle="modal" data-target="#modallog">Login</a></li>
                                <li><a href="/register-me">Register</a></li>
                                @else
                                <li><a href="/wishlist">Wishlist</a></li>
                                <li><a href="/my-orders">Your Orders</a></li>
                                <li><a href="/my-history">History</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="text-decoration:none;">
                                    <span class="sidebar-normal">Log out</span>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                </a>
                                </li>
                                
                                @endif
                               
                            </ul>
                        </div>
                    </li>
                    @if (Auth::user())
                    <li class="dropdown">
                        <div class="btn-group">
                            <a href="/cart" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false" >
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                @yield('count-cart')
                            </a>
                            <ul class="dropdown-menu menor">
                                <form method="POST" action="">
                                    @csrf
                                    @yield('cart-list')
                                </form>
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
</section>
<nav class="navbar navbar-default navy">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      
            <?php 
            $logo = session('logo');
            ?>
            <a class="navbar-brand" href="/"><img src="{{ asset('assets/img/site/'.$logo) }}" alt="{{ asset('assets/img/site/'.$logo) }}"></a>
            
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right mednav">
                <li class="active"><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop Now <i class="fa fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        @yield('shop-now')
                    </ul>
                </li>
                <li><a href="/hot-sale">Sale <span class="badge animated pulse infinite badgy">HOT</span></a></li>
                <li><a href="/wholesale">Wholesale</a></li>
                <li><a href="/contact">Contact Us</a></li>
               
                <li>
                    <div class="search">
                        <form class="search-all" method="POST" action="{{ route('product.search') }}">
                            @csrf
                            <input type="text"  name="search" class="form-control" placeholder="Search..." required>
                            <button  class="searcher" style="border:none;" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- Modal -->
<div class="modal fade modal-man" id="modallog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><img src="{{ asset('assets/img/user.png') }}">Login</h4>
                </div>
    
                <div class="modal-body">
                    <div class="col-md-6 col-sm-12 col-xs-12 no-padding">
                        <form class="form-inline form-man" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Login with Social Media</h5>
                                <ul class="social-ftr">
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                @include('includes.message')
                                <a href="#">Forgot Your Password?</a>
                            </div>
                            <button type="submit" class="btn btn-filter">
                                Login
                            </button>
                        </form>
                        
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 no-padding">
                        <div class="group-createaccount">
                            <h3>Are you a registered member?</h3>
                            <p>Registration is free and easy!</p>
                            <ul class="list-account">
                                <li>Faster checkout</li>
                                <li>Save multiple shipping addresses</li>
                                <li>View and track orders and more</li>
                            </ul>
                            <a href="/register-me" class="btn btn-filter">
                                Create a new account
                            </a>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    
    </div>