@extends('layouts.admin')

@section('admin-title')
    E-Commerce | Sub Category
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
                                <li><a href="/admin/manage-sub-category">Manage Sub Category</a></li>
                                <span class="sep">/</span>
                                <li><a class="active">Edit Sub Category</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
<div class="container">
        <div class="row">
                <div class="col-md-10">
                        <div class="card">
                                <div class="card-header lead">Edit Sub Category</div>
                                <div class="card-content">
                                        {!! Form::open(['action' => ['SubCategoryController@update', $subcategory->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                                        <div class="form-group">
                                            {{ Form::label('title', "Category", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                            <select class="form-control" name="category">
                                                    <option selected value="{{ $subcategory->category->id }}" class="form-control">{{ $subcategory->category->name }}</option>
                                                    @foreach ($categories as $category)
                                                    @if ($subcategory->category->name != $category->name)
                                                    <option value="{{ $category->id }}" class="form-control">{{ $category->name }}</option>
                                                    @endif
                                                    @endforeach
                                                    
                                                </select>
    
                                         </div>
                                         <div class="form-group">
                                                {{ Form::label('title', "Sub Category Name", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                {{ Form::text('name', $subcategory->name, ['class' => 'form-control lead', 'placeholder' => 'Sub Category Name', 'style' => 'color:black;']) }}
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