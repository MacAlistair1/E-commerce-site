@extends('layouts.app')

@section('title')
    E-commerce | Login
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                    <div class="card-header text-center" data-background-color="rose">
                            <h4 class="card-title"></h4> 
                        </div>
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
                                @include('includes.message')
                                <a href="#">Forgot Your Password?</a>
                            </div>
                            <button type="submit" class="btn btn-filter">
                                Login
                            </button>
                            <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title"></h4> 
                                </div>
                        </form>
            </div>
        </div>
    </div>
</div>
@endsection
