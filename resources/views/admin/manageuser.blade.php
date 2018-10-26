@extends('layouts.admin')

@section('admin-title')
    E-Commerce | Users
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
                        <li><a class="active">Manage Users</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                        <div class="card-header lead">Manage All Users</div>
                    <div class="card-body">
                            @if (count($users) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                               
                                    @foreach ($users as $user)
                                    <tr>
                                    <td>{{ $user->fname }} {{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->contact }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                        <form action="/users/change-status" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="{{  $user->status }}">
                                            <input type="hidden" name="user" value="{{  $user->id }}">
                                         <button  type="submit"  style="border:none;background:none;"><i class="material-icons">edit</i></button>
                                        </form>
                                        </td>
                                       
                                       
                                    <td>
                                            {!! Form::open(['action' => ['UserController@destroy', $user], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {!! Form::close() !!}
                                    </td>
                                    </tr>
                                    @endforeach                               
                                   @else
                                       <h3><center>User Not Found!</center></h3>
                                   @endif
                                   <tr>
                                        <td>{{ $users->links() }}</td>

                                    </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection