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
                                <li><a class="active">Manage Sub Category</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
<div class="container">
        <div class="row">
                <div class="col-md-10">
                        <div class="card">
                                <div class="card-header lead">Add New Sub Category</div>
                                <div class="card-content">
                                        {!! Form::open(['action' => 'SubCategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                                        <div class="form-group">
                                            {{ Form::label('title', "Category", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                            <select class="form-control" name="category">
                                                    <option selected disabled class="form-control">Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" class="form-control">{{ $category->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
    
                                         </div>
                                         <div class="form-group">
                                                {{ Form::label('title', "Sub Category Name", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                {{ Form::text('name', '', ['class' => 'form-control lead', 'placeholder' => 'Sub Category Name', 'style' => 'color:black;']) }}
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
                            <div class="card-header lead">Manage All Sub Category</div>
                        <div class="card-body">
                                @if (count($subcategories) > 0)
                                <table class="table table-striped">
                                    <tr>
                                        <th>Sub Category Name</th>
                                        <th>Category</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                   
                                        @foreach ($subcategories as $subcategory)
                                        <tr>
                                        <td><b>{{ $subcategory->name }}</b></td>
                                        <td><b>{{ $subcategory->category->name }}</b></td>
                                        <td><a href="/admin/sub-category/{{ $subcategory->slug }}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                                {!! Form::open(['action' => ['SubCategoryController@destroy', $subcategory->id], 'method' => 'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                {!! Form::close() !!}
                                        </td>
                                        </tr>
                                        @endforeach                               
                                       @else
                                           <h3>Sub Category Not Found!</h3>
                                       @endif
                                      <tr>
                                          <td>{{ $subcategories->links() }}</td>
                                      </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection