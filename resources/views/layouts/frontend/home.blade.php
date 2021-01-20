@extends('layouts.frontend.master')
@section('title', 'APPLE ISTORE')

@section('content')

<div id="wrap-inner">
	<div class="products">
		<?php $brands = App\Models\Brand::all() ?>
		@foreach($brands as $brand)
		<a><h1 style="text-align:center; margin-top:30px; margin-bottom:30px; color:black; border:2px solid orange; " value="{{$brand->id}}">{{ $brand->name }}</h1></a>


		<div class="product-list row">
			@foreach($brand->products as $product)

			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="{{url('product')}}/{{$product->id}}"><img src="{{url('upload')}}/{{$product->images}}" class="img-thumbnail" style=" height:200px;"></a>
				<p><a href="{{url('product')}}/{{$product->id}}">{{$product->name}}</a></p>
				<p class="price">{{number_format($product->price)}} VND</p>
				<a style="color:white;" href="{{asset('cart/add/'.$product->id)}}" class="btn btn-warning">Mua Hàng</a>
				<a style="color:white;" href="{{url('product')}}/{{$product->id}}" class="btn btn-danger">Xem chi tiết</a>
				<!-- <div class="marsk">
										<a href="{{url('product')}}/{{$product->id}}">Xem chi tiết</a>
										
									</div> -->

		</div> 
			@endforeach


		</div>
		@endforeach
	</div>

</div>
<div class="container">
	<div class="row">
		<img src="frontend/img/home/pk.png" style="width:100%; height:170px; margin-top:10px;">
	</div>
</div>


<!-- endmain -->

<!-- footer -->
@endsection