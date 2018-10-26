@extends('layouts.admin')

@section('admin-title')
    E-commerce | Product
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
                        <li><a class="active">Manage Products</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                        <div class="card-header lead">Manage All Products</div>
                    <div class="card-body">
                            @if (count($products) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                               
                                
                                    @foreach ($products as $product)
                                    <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->subcategory->name }}</td>
                                    <td><a href="/admin/products/{{ $product->id }}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                            {!! Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {!! Form::close() !!}
                                    </td>
                                    </tr>
                                    @endforeach                               
                                   @else
                                       <h3><center>Products Not Found!</center></h3>
                                   @endif
                                   <tr>
                                       <td>{{ $products->links() }}</td>
                                   </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection