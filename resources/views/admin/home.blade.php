@extends('layouts.admin')
@section('admin-title')
    E-Commerce | C-Panel
@endsection

@section('content')
@include('includes.message')

<div class="container">
        <div class="row justify-content-center">
           <a href="/admin/manage-users">
            <div class="col-md-4">
                    <div class="card card-pricing card-raised ">
                        <div class="card-content">
                            <h6 class="category"> <img src="{{ asset('img/user.png') }}" alt="User" style="width:240px;"></h6>
                            <div class="icon icon-rose">
                                <i class="material-icons">user</i>
                            </div>
                            <h2 class="card-title">{{ $users }}</h2>
                            <b class="card-description">
                                + Users
                            </b>
                            <br>
                            <br>
                            <p class="card-description">
                                    Click to View
                            </p>
                            
                        </div>
                    </div>
                </div>
           </a>
           <a href="/admin/manage-product">
            <div class="col-md-4">
                    <div class="card card-pricing card-raised">
                        <div class="card-content">
                            <h6 class="category"> <img src="{{ asset('img/jacket.png') }}" alt="User" style="width:240px;"></h6>
                            <div class="icon icon-rose">
                                <i class="material-icons">product</i>
                            </div>
                            <h2 class="card-title">{{ $products }}</h2>
                            <b class="card-description">
                                + Products
                            </b>
                            <br>
                            <br>
                            <p class="card-description">
                                    Click to View
                            </p>
                            
                        </div>
                    </div>
                </div>
           </a>
           <a href="/admin/manage-orders">
            <div class="col-md-4">
                    <div class="card card-pricing card-raised">
                        <div class="card-content">
                            <h6 class="category"> <img src="{{ asset('img/placeholder.jpg') }}" alt="User" style="width:240px;"></h6>
                            <div class="icon icon-rose">
                                <i class="material-icons">order</i>
                            </div>
                            <h2 class="card-title">{{ $orders }}</h2>
                            <b class="card-description">
                                + Pending Orders
                            </b>
                            <br>
                            <br>
                            <p class="card-description">
                                    Click to View
                            </p>
                            
                        </div>
                    </div>
                </div>
           </a>

           <a href="/admin/manage-admins">
            <div class="col-md-2">
                    <div class="card card-pricing card-raised">
                        <div class="card-content">
                           
                            <h2 class="card-title">{{ $admin }}</h2>
                            <b class="card-description">
                                Admin(s)
                            </b>
                            <br>
                            <br>
                            <p class="card-description">
                                    Click to View
                            </p>
                            
                        </div>
                    </div>
                </div>
           </a>
        
           <a href="/admin/manage-category">
                <div class="col-md-2">
                        <div class="card card-pricing card-raised">
                            <div class="card-content">
                               
                                <h2 class="card-title">{{ $category }}</h2>
                                <b class="card-description">
                                    + Category
                                </b>
                                <br>
                                <br>
                                <p class="card-description">
                                        Click to View
                                </p>
                                
                            </div>
                        </div>
                    </div>
               </a>

               <a href="/admin/manage-sub-category">
                    <div class="col-md-2">
                            <div class="card card-pricing card-raised">
                                <div class="card-content">
                                   
                                    <h2 class="card-title">{{ $subcategory }}</h2>
                                    <b class="card-description">
                                        + Sub Category
                                    </b>
                                    <br>
                                    <br>
                                    <p class="card-description">
                                            Click to View
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                   </a>

                   <a href="/admin/manage-feedbacks">
                        <div class="col-md-2">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                       
                                        <h2 class="card-title">{{ $feedback }}</h2>
                                        <b class="card-description">
                                            + Feedbacks
                                        </b>
                                        <br>
                                        <br>
                                        <p class="card-description">
                                                Click to View
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                       </a>

               <a href="#">
                    <div class="col-md-2">
                            <div class="card card-pricing card-raised">
                                <div class="card-content">
                                   
                                    <h2 class="card-title">{{ $subscribers }}</h2>
                                    <b class="card-description">
                                        + Subscribers
                                    </b>
                                    <br>
                                    <br>
                                    <p class="card-description">
                                            Click to Notify
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                   </a>
        </div>
</div>

@endsection