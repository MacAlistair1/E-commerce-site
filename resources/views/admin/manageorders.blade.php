@extends('layouts.admin')

@section('admin-title')
    E-commerce | Orders
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
                        <li><a class="active">Manage Orders</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-header lead">Manage All Orders</div>
                        <div class="card-body">
                            <?php $j=1; ?>
                                @if (count($orders) > 0)
                                
                                <?php 
                                while($j <= count($user) ){
                                    foreach($user as $item){
                                        if($user[$j-1] == $item){
                                          
                                    $i = 1;
                                   while($i <= count($unique) ){
                                        if($unique[$i-1] == $i){
                                           ?>
                                          
                                           <table class="table table-striped">
                                               
                                                <tr>
                                                    <th> Product Name </th>
                                                    <th> Quantity </th>
                                                    <th> Price </th>
                                                    <th> User </th>
                                                    <th> Delivery Details </th>
                                                    <th></th>
                                                </tr>

                                                <?php $qty = 0; $sub = 0;$tax = 0; $ship = 0; ?>
                                                @if (count($orders) > 0)
                                                @foreach ($orders as $order)
                                                    @if ($order->user_id == $item)
                                                        
                                                   
                                                    @if ($order->unique_id == $i)
                                                        
                                                    
                                                    <tr >
                                                        <td><a href="/{{ $order->product->category->slug }}/{{ $order->product->subcategory->slug }}/{{ $order->product->slug }}">{{ $order->product->name }}</a></td>
                                                        <td>{{ $order->quantity }}</td>
                                                        <td>{{ $order->product->price }}</td>
                                                        <td>{{ $order->user->fname }} {{ $order->user->lname }}</td>
                                                        <td>
                                                            Address: {{ $order->checkoutdetail->address }} <br>
                                                            City: {{ $order->checkoutdetail->city }} <br>
                                                            Contact: {{ $order->checkoutdetail->contact }}

                                                        </td>
                                                        <td>
                                                                <?php
                                                                date_default_timezone_set('Asia/Karachi');
                                                                
                                                                $ref = new DateTime($order->time);
                                                                $now = new DateTime(date("Y-m-d h:i:s"));
                                                                $diff = $now->diff($ref);
                                                                if($diff->d == 0 &&  $diff->h == 0 && $diff->i == 0){
                                                                    echo "Just now";
                                                                }elseif($diff->d != 0 && $diff->h != 0 && $diff->i != 0){
                                                                    echo $diff->d." Days ".$diff->h." Hours ".$diff->i." Minutes ago";
                                                                }elseif($diff->d == 0 &&  $diff->h == 0 && $diff->i != 0){
                                                                    echo $diff->i." Minutes ago";
                                                                }elseif($diff->d == 0 && $diff->h != 0 && $diff->i != 0){
                                                                    echo $diff->h." Hours ".$diff->i." Minutes ago";
                                                                }
                            
                                                               
                                                                
                                                            ?>
                                                        </td>
                                                        <?php $qty+= $order->quantity; ?>
                                                        <?php $sub+= $order->product->price;  ?>
                                                        <?php $sub*= $order->quantity;  ?>
                                                    </tr>

                                                    @endif
                                                    @endif
                                                @endforeach
                                                @if ((round($sub)) >= "10000")
                                                    <?php     $ship = 0; ?>
                                                @else
                                                <?php     $ship = 100; ?>
                                                @endif
                                                <?php    $tax = $sub * 0.13; ?>
                                                        <tr>
                                                            <td>Taxes (13%)</td>
                                                            <td>--------</td>
                                                            <td>Rs.{{ round($tax) }}</td>
                                                            <td>--------</td>
                                                            <td>--------</td>
                                                        </tr>

                                                        <tr>
                                                                <td>Shipping </td>
                                                                <td>--------</td>
                                                                <td>Rs.{{ $ship }}</td>
                                                                <td>--------</td>
                                                                <td>--------</td>
                                                            </tr>
                                                            <br>
                                                       
                                                            <tr style="font-weight:bold;font-size:15pt;">
                                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                                        </tr><br>

                                                    <tr class="alert" style="background:lightcyan;font-weight:bold;font-size:17pt;">
                                                        <td>Total:</td>
                                                        <td>{{ $qty }}</td>
                                                        <td style="color:red;"><?php $tot = round($sub+$tax+$ship); ?>Rs.{{ round($sub+$tax+$ship) }}</td>
                                                        <td>--------</td>
                                                        <td>--------</td>
                                                        
                                                      
                                                    </tr>

                                                    <tr>
                                                            <caption>
                                                                    {!! Form::open(['action' => ['CheckoutController@destroy', $user[$j-1].';'.$tot], 'method' => 'POST']) !!}
                                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                                    {{ Form::submit('Mark as Delivered', ['class' => 'btn btn-sm btn-filter']) }}
                                                                    {!! Form::close() !!}
                                                       </caption>
                                                    </tr>

                                                @endif
                                                
                                        </table>
                                           
                
                                           <?php
                                        }
                                        $i++;
                                     }
                                     
                                   
                                    }
                                }
                                $j++;
                            }
                            ?>
                               
                           
                            @else
                            <h3><center>{{ 'No Orders Available.' }}</center></h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
