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
                        <li><a href="/admin/manage-product">Manage Products</a></li>
                        <span class="sep">/</span>
                        <li><a class="active">Edit Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
            <div class="row">
                    <div class="col-md-10">
                            <div class="card">
                                    <div class="card-header lead">Edit Product</div>
                                    <div class="card-content">
                                            {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                                            <div class="form-group">
                                                    {{ Form::label('title', "Choose", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    <select class="form-control" name="subcategory">
                                                            <option disabled class="form-control">Select Category - Sub Category</option>
                                                            <option selected value="{{ $product->subcategory->id }}" class="form-control">{{ $product->category->name }} - {{ $product->subcategory->name }}</option>
                                                            @foreach ($subcategories as $subcategory)
                                                            @if ($product->subcategory->id != $subcategory->id)
                                                            <option value="{{ $subcategory->id }}" class="form-control">{{ $subcategory->category->name }} - {{ $subcategory->name }}</option>
                                                            @endif
                                                            @endforeach
                                                            
                                                        </select>
                                                 </div>
                                               
                                    
                                             <div class="form-group">
                                                    {{ Form::label('title', "Product Name", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('name', $product->name, ['class' => 'form-control lead', 'placeholder' => 'Product Name', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('title', "Detail", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('detail', $product->detail, ['class' => 'form-control lead', 'placeholder' => 'Product Detail', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('title', "Price", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('price', $product->price, ['class' => 'form-control lead', 'placeholder' => 'Product Price', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('title', "Stock", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('stock', $product->stock, ['class' => 'form-control lead', 'placeholder' => 'Product Stock', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('title', "Discount (in %)", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('off', $product->off, ['class' => 'form-control lead', 'placeholder' => 'Product Discount', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('title', "Code", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('code', $product->code, ['class' => 'form-control lead', 'placeholder' => 'Product Code', 'style' => 'color:black;']) }}
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('title', "Description", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    <textarea class="form-control lead" placeholder="Product Description" name="desc" rows="3" cols="2" id="article-ckeditor">{{ $product->description }}</textarea>
                                             </div>
                                             <div class="form-group">
                                                    {{ Form::label('title', "Tags", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                    {{ Form::text('tags', $product->tags, ['class' => 'form-control lead', 'placeholder' => 'Product Tags Eg. tag1,tag2 ', 'style' => 'color:black;']) }}
                                             </div>

                                             <div class="form-group">
                                                 <table>
                                                     <tr>
                                                         <td>
                                                             {{ Form::label('title', "Select (can select multiple)", ['class' => 'lead', 'style' => 'color:black;font-weight:bold;']) }}
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                            <td>
                                                            <input type="checkbox" value="1" name="topsell" <?php if($product->topsell == 1) { echo 'checked'; } ?> >Top Selling
                                                            <input type="checkbox" value="1" name="popular" <?php if($product->popular == 1) { echo 'checked'; } ?> >Popular
                                                            <input type="checkbox" value="1" name="seasonal" <?php if($product->seasonal == 1) { echo 'checked'; } ?> >Seasonal
                                                            </td>
                                                     </tr>
                                                     <tr></tr>
                                                     <tr></tr>
                                                     <tr></tr>
                                                     <tr>
                                                                <td>
                                                                <input type="checkbox" value="1" name="bestseller" <?php if($product->bestseller == 1) { echo 'checked'; } ?> >Best Seller
                                                                <input type="checkbox" value="1" name="highprice" <?php if($product->highprice == 1) { echo 'checked'; } ?> >High Price
                                                                <input type="checkbox" value="1" name="featured" <?php if($product->featured == 1) { echo 'checked'; } ?> >Featured
                                                                <input type="checkbox" value="1" name="branding" <?php if($product->branding == 1) { echo 'checked'; } ?> >Branding
                                                                </td>
                                                     </tr>
                                                    </table>
                                                    
                                             </div>
                                             <div class="form-horizontal">
                                                    {{ Form::label('title', "Select Multiple Images", ['style' => 'color:black;font-weight:bold;']) }}
                                                    <input type="file" class="btn btn-md btn-view" name="img[]"  multiple> 
                                             </div>

                                             {{ Form::hidden('_method', 'PUT') }}
                                            {{ Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) }}   
                                            {!! Form::close() !!}
                                    </div>
                            </div>
                    </div>
            </div>
         
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection