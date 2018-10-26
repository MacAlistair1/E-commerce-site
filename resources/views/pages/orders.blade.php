@if (Auth::user())
@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('shop-now')
@foreach ($subcategories as $subcategory)
<li><a href="products/{{ $subcategory->category->slug }}/all">{{ $subcategory->name }}</a></li>
@endforeach
@endsection

@section('count-cart')
@if (Auth::user())
@if (count($carts) > 0)
<span class="badge">{{ count($carts) }}</span>
@endif
@endif
@endsection

<?php  $null = false; ?>

@section('cart-list')
@if (Auth::user())
@forelse ($carts as $cart)
<?php $myimage = explode("|", $cart->product->image);
      $cat = $cart->product->category->id;
      $subcat = $cart->product->subcategory->id;
      ?>
       
<li>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <img src="<?php echo asset('assets/img/products/'.$cat.'/'.$subcat.'/'.$myimage[0]);  ?>" alt="{{ $cart->product->name }}"> 
        </div>

        <div class="col-md-8 col-sm-12 col-xs-12">
            <h4>
                {{ $cart->product->name }}
                <a href="/my-cart/{{ $cart->id }}" class="closer"><i class="fa fa-close"></i></a>
            </h4>
            <p class="price">{{ $cart->quantity }} pcs.</p>
            <p class="price">Rs.{{ $cart->product->price }}</p>
        </div>

    </li>
@empty
    {{ 'No Items in Cart!' }}
    <?php $null = true; ?>
@endforelse
<?php  $sub = 0; ?>
@foreach ($carts as $cart)
<?php
$sub +=  (($cart->quantity) * ($cart->product->price));
?>
@endforeach
<?php $tax = ($sub)*0.13; ?>
@if (!$null)
<div class="col-md-12">
        <div class="total">
            <p>Subtotal : <span>Rs.{{ $sub }}</span></p>
            <p>Shipping : <span>Rs.100</span></p>
            <p>Taxes (13%): <span>Rs.{{ $tax }}</span></p>
            <p>Total : <span>Rs.{{ $sub+100+$tax }}</span></p>
            <a href="/checkout" class="btn btn-md btn-view checkblack">Checkout</a>
        </div>
    </div>
@endif
   
@endif
@endsection

@section('content')
<section class="list-contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="link-lister">
                        <li><a href="/">Home</a></li>
                        <span class="sep">/</span>
                        <li><a href="/my-orders" class="active">Orders</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<div class="row">
    <div class="col-sm-2 col-xs-2">
        <h1></h1>
    </div>
      
    <div class="col-md-8 col-sm-12 col-xs-12">
        
            @if (count($orders) > 0)

                <?php 
                    $i = 1;
                   while($i <= count($unique) ){
                        if($unique[$i-1] == $i){
                           ?>
                          
                           <table class="table table-striped">
                                <tr style="font-weight:bold;font-size:15pt;">
                                    <th> Product Name </th>
                                    <th> Quantity </th>
                                    <th> Price </th>
                                    <th></th>
                                </tr>
                                <?php $qty = 0; $sub = 0; $tot = 0; $tax = 0; $ship = 0; ?>
                                @if (count($orders) > 0)
                                @foreach ($orders as $order)
                                    @if ($order->unique_id == $i)
                                        
                                    
                                    <tr class="alert alert-success" style="font-weight:bold;font-size:13pt;">
                                        <td><a href="/{{ $order->product->category->slug }}/{{ $order->product->subcategory->slug }}/{{ $order->product->slug }}">{{ $order->product->name }}</a></td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->product->price }}</td>
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
                                @endforeach
                                @if ((round($sub)) >= "10000")
                                    <?php     $ship = 0; ?>
                                @else
                                <?php     $ship = 100; ?>
                                @endif
                                <?php    $tax = $sub * 0.13; ?>
                                        <tr class="alert alert-danger" style="font-weight:bold;font-size:11pt;">
                                            <td>Taxes (13%)</td>
                                            <td>--------</td>
                                            <td>Rs.{{ round($tax) }}</td>
                                            <td>--------</td>
                                        </tr>
                                        <tr class="alert alert-danger" style="font-weight:bold;font-size:11pt;">
                                                <td>Shipping </td>
                                                <td>--------</td>
                                                <td>Rs.{{ $ship }}</td>
                                                <td>--------</td>
                                            </tr><br>
                                        <tr style="font-weight:bold;font-size:15pt;">
                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                            <td><hr width="100%" style="height:5px; background:black;"></td>
                                        </tr><br>
                                    <tr class="alert" style="background:lightcyan;font-weight:bold;font-size:17pt;">
                                        <td>Total:</td>
                                        <td>{{ $qty }}</td>
                                        <td style="color:red;">Rs.{{ round($sub+$tax+$ship) }}</td>
                                        <td>--------</td>
                                    </tr>
                               
                                @endif
                                
                        </table>
                           

                           <?php
                        }
                        $i++;
                     }
                ?>
           
            @else
            <h3><center>{{ 'No Orders in your Orderlist.' }}</center></h3>
            @endif
    </div>
</div>
   
@endsection
@endif