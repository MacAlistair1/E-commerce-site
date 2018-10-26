@extends('layouts.admin')

@section('admin-title')
    E-Commerce | Edit Category
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
                        <li><a href="/admin/manage-category">Manage Catgeory</a></li>
                        <span class="sep">/</span>
                        <li><a class="active">Edit Category</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<div class="container">
        <div class="row">
                <div class="col-md-10">
                        <div class="card">
                                <div class="card-header lead">Add New Category</div>
                                <div class="card-content">
                                        {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                                        <div class="form-group">
                                            {{ Form::label('title', "Category Name", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                            {{ Form::text('name', $category->name, ['class' => 'form-control lead', 'placeholder' => 'Category Name', 'style' => 'color:black;']) }}
                                         </div>
                                         {{ Form::hidden('_method', 'PUT') }}
                                        {{ Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) }}   
                                        {!! Form::close() !!}
                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection