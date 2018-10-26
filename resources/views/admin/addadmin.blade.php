@extends('layouts.admin')

@section('admin-title')
    E-Commerce | Category
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
                                <li><a href="/admin/manage-admins">Manage Admins</a></li>
                                <span class="sep">/</span>
                                <li><a class="active">Add Admins</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
<div class="container">
        <div class="row">
                <div class="col-md-10">
                        <div class="card">
                                <div class="card-header lead">Add New Admin</div>
                                <div class="card-content">
                                        {!! Form::open(['action' => 'AdminController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                                        <div class="form-group">
                                            {{ Form::label('title', "Name", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                            {{ Form::text('name', '', ['class' => 'form-control lead', 'placeholder' => 'Name', 'style' => 'color:black;']) }}
                                         </div>
                                         <div class="form-group">
                                                {{ Form::label('title', "E-mail", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                {{ Form::text('email', '', ['class' => 'form-control lead', 'placeholder' => 'E-mail', 'style' => 'color:black;']) }}
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
                            <div class="card-header lead">Manage All Category</div>
                        <div class="card-body">
                                @if (count($categories) > 0)
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                   
                                        @foreach ($categories as $category)
                                        <tr>
                                        <td><b>{{ $category->name }}</b></td>
                                        <td><a href="/admin/category/{{ $category->slug }}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                                {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                {!! Form::close() !!}
                                        </td>
                                        </tr>
                                        @endforeach                               
                                       @else
                                           <h3>Category Not Found!</h3>
                                       @endif
                                       <tr>
                                            <td>{{ $categories->links() }}</td>
                                        </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection