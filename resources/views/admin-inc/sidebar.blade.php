<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('img/sidebar-1.jpg') }}">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="http://www.facebook.com/misview" class="simple-text logo-mini">
        MIS
        </a>
        <a href="http://www.facebook.com/misview" class="simple-text logo-normal">
            MIS Community
        </a>
    </div>
    <div class="sidebar-wrapper">
        @if(!Auth::guest())
        <div class="user">
            <div class="photo">
              
                <img src="{{ asset('img/default-avatar.png') }}"/>
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ auth()->user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="/user">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="/edituser">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="/userSetting">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                        <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="text-decoration:none;">
                                    <span class="sidebar-mini">L</span>
                                    <span class="sidebar-normal">Log out</span>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @if (!Auth::guest())
        <ul class="nav">
            <li class="active">
                <a href="/admin/home">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="">
                    <a href="/admin/manage-category">
                        <i class="material-icons">widgets</i>
                        <p>Manage Category</p>
                    </a>
                </li>
                <li class="">
                        <a href="/admin/manage-sub-category">
                            <i class="material-icons">apps</i>
                            <p>Manage Sub-Category</p>
                        </a>
                </li>
            <li>
                <a data-toggle="collapse" href="#company">
                    <i class="material-icons">image</i>
                    <p>Manage Products
                        <b class="caret"></b>
                    </p>
                </a>
              
                <div class="collapse" id="company">
                        <ul class="nav">
                            <li>
                                <a href="/admin/add-product">
                                    <span class="sidebar-mini">AP</span>
                                    <span class="sidebar-normal">Add Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/manage-product">
                                    <span class="sidebar-mini">P</span>
                                    <span class="sidebar-normal">All Products</span>
                                </a>
                            </li>
                        </ul>
                    </div>

            </li>

            <li class="">
                    <a href="/admin/manage-orders">
                        <i class="material-icons">widgets</i>
                        <p>Manage Orders</p>
                    </a>
                </li>

                <li>
                        <a data-toggle="collapse" href="#user">
                            <i class="material-icons">user</i>
                            <p>Manage User &amp; Admin
                                <b class="caret"></b>
                            </p>
                        </a>
                      
                        <div class="collapse" id="user">
                                <ul class="nav">
                                    <li>
                                        <a href="/admin/manage-users">
                                            <span class="sidebar-mini">MU</span>
                                            <span class="sidebar-normal">Manage Users</span>
                                        </a>
                                    </li>
                                    <li>
                                            <a href="/admin/manage-admins">
                                                <span class="sidebar-mini">MA</span>
                                                <span class="sidebar-normal">Manage Admins</span>
                                            </a>
                                        </li>
                                </ul>             
                            </div>
                </li>

                    <li>
                            <a data-toggle="collapse" href="#message">
                                <i class="material-icons">message</i>
                                <p>Manage Feedback
                                    <b class="caret"></b>
                                </p>
                            </a>
                          
                            <div class="collapse" id="message">
                                    <ul class="nav">
                                        <li>
                                            <a href="/admin/manage-feedbacks">
                                                <span class="sidebar-mini">Am</span>
                                                <span class="sidebar-normal">See All Feedbacks</span>
                                            </a>
                                        </li>
                                       
                                    </ul>             
                                </div>
                    </li>

                <li class="">
                        <a href="#">
                            <i class="material-icons">mail</i>
                            <p>Notify Subscribers</p>
                        </a>
                </li>
                    <li class="">
                            <a href="/admin/manage-owner">
                                <i class="material-icons">info</i>
                                <p>Change Owner Details</p>
                            </a>
                    </li>
                    <li class="">
                            <a href="/admin/manage-ads">
                                <i class="material-icons">ads</i>
                                <p>Manage Ads</p>
                            </a>
                        </li>
                
        </ul>
        @endif
    </div>
</div>