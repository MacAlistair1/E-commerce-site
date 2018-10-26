@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('shop-now')
@foreach ($subcategories as $subcategory)
<li><a href="products/{{ $subcategory->category->slug }}/all">{{ $subcategory->name }}</a></li>
@endforeach
@endsection




@section('content')
<section class="list-contents">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="header">
                    <h1>Register</h1>
                    <p>If you already have an account with us, please login at the login page.</p>
                    @include('includes.message')
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <ul class="link-lister otherpage pull-right" style="border:none;">
                    <li><a href="/">Home</a></li>
                    <span class="sep">/</span>
                    <li><a href="/registerme" class="active">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="content-inside">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <form class="label-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="colm-reg">
                        <h2>Your Personal Details</h2>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Contact Number</label>
                            <input type="tel" name="contact" class="form-control" required>
                        </div>
                        <!--Address details-->
                        <h2 style="margin-top: 30px;">Your Address</h2>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Company Name</label>
                            <input type="text" name="company" class="form-control">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Post Code</label>
                            <input type="text" name="postal" class="form-control">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Country</label>
                            <select class="form-control" name="country">
                                <option value="0"> --- Please Select --- </option>
                                <option value="Nepal"> Nepal </option>
                                <option value="India"> India </option>
                                <option value="Australia"> Australia </option>
                                <option value="USA"> USA </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label>Province</label>
                            <select name="province" id="input-zone" class="form-control">
                                <option value="0"> --- Please Select --- </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                            </select>
                        </div>
                        <!--Password field-->
                        <h2 style="margin-top: 30px;">Your Password</h2>
                        <div class="form-group col-md-6 col-sm-12  col-xs-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12  col-xs-12">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12 checkman" id="agree">
                            <input type="checkbox" name="agree" id="agree" value="1" class="checker" onchange="showBtn(this.id)">
                            I have read and agree to the <a href="#" class="agree"><b>Terms And Conditions</b></a>
                        </div>
                        <script>
                            function showBtn(id){
                                    document.getElementById('submit').style.visibility = 'visible';
                                    document.getElementById('agree').style.visibility = 'hidden';
                                
                            }
                        </script>
                        <div class="form-group col-md-12 checkman">
                            <button type="submit" id="submit" class="btn btn-filter" style="visibility:hidden;">
                                Sign Up
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="wrap-contact adman">
                    <h4>Do You Have Any Questions?</h4>
                    <p>Maecenas fermentum conse quat onec fermentum. Pellentesque malesuada nulla a miduis sapien sem</p>
                    <a href="/contact"><i class="fa fa-phone"></i>Contact Us</a>
                </div>
                <a href="#">
                        <?php $ad1 = asset('assets/img/ads/'.$register[0]); ?>
                        <img src="{{ $ad1 }}" class="img-responsive">
                </a>
                <div class="group">
                    <h3>Are you a registered member?</h3>
                    <p>Registration is free and easy!</p>
                    <ul class="list-account">
                        <li>Faster checkout</li>
                        <li>Save multiple shipping addresses</li>
                        <li>View and track orders and more</li>
                    </ul>
                    <a href="#" class="btn btn-filter" data-toggle="modal" data-target="#modallog">Login</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection