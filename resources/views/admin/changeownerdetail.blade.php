@extends('layouts.admin')

@section('admin-title')
    E-commerce | Owner Details
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
                        <li><a class="active">Change Owner Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
            <div class="row">
                    <div class="col-md-10">
                            <div class="card">
                                    <div class="card-header lead">Change Owner Details</div>
                                    <div class="card-content">
                                            {!! Form::open(['action' => ['OwnerDetailController@update', $detail->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                                             <div class="form-group">
                                                    {{ Form::label('title', "Name of Site", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('name', $detail->name, ['class' => 'form-control lead', 'placeholder' => 'Name of Site', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('email', "E-mail", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('email', $detail->email, ['class' => 'form-control lead', 'placeholder' => 'Email', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('contact', "Contact", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('contact', $detail->contact, ['class' => 'form-control lead', 'placeholder' => 'Contact', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('location', "Location", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('location', $detail->location, ['class' => 'form-control lead', 'placeholder' => 'Location', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('location_url', "Location URL", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    <textarea class="form-control lead" placeholder="Location URL" name="location_url" rows="2" cols="2">{{ $detail->location_url }}</textarea>
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('fb_url', "Facebook URL", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('fb_url', $detail->fb_url, ['class' => 'form-control lead', 'placeholder' => 'Facebook URL', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('twitter_url', "Twitter URL", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('twitter_url', $detail->twitter_url, ['class' => 'form-control lead', 'placeholder' => 'Twitter URL', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('insta_url', "Instagram URL", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('insta_url', $detail->insta_url, ['class' => 'form-control lead', 'placeholder' => 'Instagram URL', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('yt_url', "Youtube URL", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('yt_url', $detail->yt_url, ['class' => 'form-control lead', 'placeholder' => 'Youtube URL', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('gplus_url', "Google Plus URL", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('gplus_url', $detail->gplus_url, ['class' => 'form-control lead', 'placeholder' => 'Google Plus URL', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                        {{ Form::label('head_title', "Top Heading Title", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                        {{ Form::text('top_heading_title', $detail->top_heading_title, ['class' => 'form-control lead', 'placeholder' => 'Top Heading Title', 'style' => 'color:black;']) }}
                                                 </div>
                                             <div class="form-group">
                                                    {{ Form::label('opening', "Opening Closing Detail", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('opening_closing_day', $detail->opening_closing_day, ['class' => 'form-control lead', 'placeholder' => 'Opening Closing Detail', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('about', "About Us", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    <textarea class="form-control lead" placeholder="About Us" name="about_us" rows="3" cols="2" id="article-ckeditor">{{ $detail->about_us }}</textarea>
                                             </div><br>
                                             <div class="form-horizontal">
                                                    {{ Form::label('title', "Logo [1000x500]", ['style' => 'color:black;font-weight:bold;']) }}
                                                    <input type="file" class="btn btn-md btn-view" name="logo"> 
                                             </div>
                                             <div class="form-horizontal">
                                                    {{ Form::label('title', "Banner 1 Image [1920x700]", ['style' => 'color:black;font-weight:bold;']) }}
                                                    <input type="file" class="btn btn-md btn-view" name="banner1_img"> 
                                             </div>
                                             <div class="form-horizontal">
                                                    {{ Form::label('title', "Banner 2 Image [1920x700]", ['style' => 'color:black;font-weight:bold;']) }}
                                                    <input type="file" class="btn btn-md btn-view" name="banner2_img"> 
                                             </div>

                                             {{ Form::hidden('_method', 'PUT') }}
                                            {{ Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) }}   
                                            {!! Form::close() !!}
                                    </div>
                            </div>
                    </div>
            </div>
         
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection