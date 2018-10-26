@extends('layouts.admin')

@section('admin-title')
    E-Commerce | Admins
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
                        <li><a class="active">Manage Admins</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                        <div class="card-header lead">Manage All Admins</div>
                    <div class="card-body">
                           
                            @if (count($admins) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Action</th>
                                </tr>
                               
                                    @foreach ($admins as $admin)
                                    <tr>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>
                                            {!! Form::open(['action' => ['AdminController@destroy', $admin], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {!! Form::close() !!}
                                    </td>
                                   
                                </tr>
                                    @endforeach                               
                                   @else
                                       <h3><center>Admin Not Found!</center></h3>
                                   @endif
                                   <tr>
                                        <td>{{ $admins->links() }}</td>

                                    </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection