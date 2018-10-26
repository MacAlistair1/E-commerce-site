@extends('layouts.admin')

@section('admin-title')
    E-Commerce | Feedback
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
                        <li><a class="active">Feedback</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                        <div class="card-header lead">Manage All Feedbacks</div>
                    <div class="card-body">
                            @if (count($messages) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>UserName of Sender</th>
                                    <th>E-mail</th>
                                    <th>Feedback</th>
                                </tr>
                               
                                  
                                    @foreach ($messages as $message)
                                    <tr>
                                    <td>{{ $message->username }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->feedback }}</td>
                                    <td>
                                            {!! Form::open(['action' => ['FeedbackController@destroy', $message], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {!! Form::close() !!}
                                    </td>
                                    </tr>
                                    @endforeach                               
                                   @else
                                       <h3><center>Feedback Not Found!</center></h3>
                                   @endif
                                   @if (count($messages) > 3)
                                   <tr>
                                        <td>{{ $messages->links() }}</td>
                                    </tr>
                                   @endif
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection