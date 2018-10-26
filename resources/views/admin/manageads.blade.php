@extends('layouts.admin')

@section('admin-title')
    E-Commerce | Ads
@endsection

@section('content')
@include('includes.message')
<section class="list-contents list-content-prod">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="link-lister otherpage">
                                <li><a href="/admin/home">Dashboard</a></li>
                                <span class="sep">/</span>
                                <li><a class="active">Manage Ads</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
<div class="container">
        <div class="row">
                <div class="col-md-10">
                        <div class="card">
                                <div class="card-header lead">Add New Ads</div>
                                <div class="card-content">
                                        {!! Form::open(['action' => 'AdViewController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                                        
                                        <div class="form-group">
                                                {{ Form::label('title', "Ad Name", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                {{ Form::text('name', '', ['class' => 'form-control lead', 'placeholder' => 'Ad Name', 'style' => 'color:black;']) }}
                                        </div>

                                        <div class="form-group">
                                                {{ Form::label('title', "Choose a Page for current Ad", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                <select class="form-control" name="page">
                                                        <option selected disabled class="form-control">Select Page</option>
                                                        <option value="Landing Page 0" class="form-control">Landing Page &nbsp; [1131:570px]</option>
                                                        <option value="Landing Page 1" class="form-control">Landing Page &nbsp; [274:274px] 1</option>
                                                        <option value="Landing Page 2" class="form-control">Landing Page &nbsp; [274:274px] 2</option>
                                                        <option value="Register Page" class="form-control">Register Page &nbsp; [800:769px]</option>
                                                        <option value="Product Detail Page" class="form-control">Product Detail Page &nbsp; [800:769px]</option>
                                                        <option value="Shop Now" class="form-control">Shop Now Nav Item &nbsp; [345:770px]</option>
                                                    </select>
                                        </div>
                                        <br>
                                        
                                        <div class="form-horizontal">
                                                {{ Form::label('title', "Choose an Image", ['style' => 'color:black;font-weight:bold;']) }}
                                                <input type="file" class="btn btn-md btn-view" name="image"> 
                                         </div>
                                        {{ Form::submit('Add', ['class' => 'btn btn-primary btn-lg']) }}   
                                        {!! Form::close() !!}
                                </div>
                        </div>
                </div>
        </div>
        <div class="row justify-content-center">
                <div class="col-md-10">
                        <div class="card">
                            @if (count($ads) > 0)
                           
                            <div class="card-content">
                                @foreach($ads as $ad)
                                    <?php $img = asset('assets/img/ads/'.$ad->image); ?>
                                    <a href="{{ $img }}" class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="cover-about" style="background: url({{ $img }}); background-size: cover; background-position: 50% 50%; width: 100%; height: 190px;border:3px outset black">
                                            
                                            {!! Form::open(['action' => ['AdViewController@destroy', $ad->id], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-round btn-sm']) }}
                                            {!! Form::close() !!}
                                            <h4 class="carousel-caption lead" style="background:red; margin-top:30%;"><center>{{ $ad->page }}</center></h4>
                                        </div>
                                        <div class="spacer"></div><br>
                                    </a>
                                @endforeach
                            @else
                                <h2><center>No Ad Image Found!</center></h2>
                            @endif           
                            </div>
                        </div>
                        
                </div>

        </div>
        </div>

@endsection