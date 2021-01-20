@extends('layouts.frontend.master')
@section('title', 'APPLE ISTORE')

@section('content')

					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3 style="color: black; margin-top: 50px; margin-bottom: 30px;">{{ $product->name }}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-5 col-sm-5 col-md-5 text-center">
									<img src="{{url('upload')}}/{{$product->images}}" style="width:400px; height:460px;" >
								</div>
								<div id="product-details" class="col-xs-5 col-sm-5 col-md-5" style="margin-left:130px; border:1px solid;">

									<strong style="font-size:25px;"><img src="">Giá chỉ còn: <span class="price">{{number_format($product->price)}} VND</span></strong>
									<img src="frontend/img/home/de.png">
									<p style="margin-top:20px;"><strong><img src="frontend/img/home/check.png">  Bảo hành: {{$product->baohanh}}</img></p>
									<p><img src="frontend/img/home/check.png">  Phụ kiện: {{$product->phukien}}</p>
									<p><img src="frontend/img/home/check.png">  Tình trạng: {{$product->tinhtrang}}</p>
									<p><img src="frontend/img/home/km.png">  Khuyến mại: {{$product->khuyenmai}}</p>			
									<p><img src="frontend/img/home/thay.png"> Tình trạng: Còn hàng <img src="frontend/img/home/check.png"> </p>
									<p class="add-cart text-center"><a href="{{asset('cart/add/'.$product->id)}}">Đặt hàng online</a></p>
								</div>
								
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<?php echo "
							<p>{$product->desc}</p>"
							?>
						</div>
						
					</div>
					</div>

					
						
					@endsection

					