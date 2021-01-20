@extends('layouts.frontend.master')
@section('title', 'Edit Product')

@section('content')
	<link rel="stylesheet" href="css2/category.css">
	
					<div id="wrap-inner">
						<div class="products">
							<h1 style="border: 2px solid orange; text-align:center; margin-top:20px; margin-bottom:20px;">{{ $brand->name}}</h1>
							<div class="product-list row">
							@foreach($brand->products as $product)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{url('upload')}}/{{$product->images}}" class="img-thumbnail"></a>
									<p><a href="#"></a>{{$product->name}}</p>
									<p class="price">{{number_format($product->price)}} VND</p>	  
									<div class="marsk">
									<a style="text-decoration: none;" href="{{url('product')}}/{{$product->id}}">Xem chi tiết</a>

									</div>   	

								</div>
								@endforeach  

  	                	

							</div>

						</div>

						<ul id="pagination-lg">
</ul>
					</div>

					
@endsection

