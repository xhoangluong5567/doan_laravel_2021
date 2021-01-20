@extends('layouts.frontend.master')
@section('title', 'Giỏ Hàng')

@section('content')



	<script type="text/javascript">
function updateCart(qty,rowId){
	$.get(
		'{{asset('cart/update')}}',
	{qty:qty,rowId:rowId},
	function(){
		location.reload();
	}
	);

	}
	</script>


					<div id="wrap-inner">
						<div id="list-cart">
							<h1>Giỏ hàng</h1>
							@if(Cart::count() >= 1)
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
										@foreach ($items as $item)
									<tr>
										<td><img class="img-responsive" style="width: 170px; height: 200px;" src="upload/{{$item->options->images}}"></td>
										<td>{{ $item->name }}</td>
										<td>
											<div class="form-group">
												<input name="qty" class="formcontrol" type="number" required pattern="[1-9]"
												value="{{$item->qty}}" onChange="updateCart(this.value,'{{$item->rowId}}')">
												
									</div>
									
										</td>
										<td><span class="price">{{number_format($item->price)}} VND</span></td>
										<td><span class="prices">{{number_format($item->price*$item->qty)}} VND</span></td>
										<td><a href="{{asset('cart/delete/'.$item->rowId)}}" class="">X</a></td>
									</tr>
									@endforeach
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{$total}}</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="#" class="my-btn btn">Mua tiếp</a>
										<a href="#" class="my-btn btn">Cập nhật</a>
										<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form>             	                	
						</div>
						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							 <form method="post" action="{{ route('show')}}">
								 <input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group">
									<label for="add">Ghi chú:</label>
									<input required type="text" class="form-control" id="note" name="note">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
								{{csrf_field()}}
							</form>
						</div>
						@else
						<script>alert("Giỏ Hàng Trống!!");</script>
						<h3>Giỏ Hàng Trống</h3>
						@endif
						
					</div>

						
					
					</div>
					

@endsection
