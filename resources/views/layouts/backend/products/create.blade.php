@extends('layouts.admin')
@section('title', 'Danh sach brand')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Thêm sản phẩm</div>
					<div class="panel-body">

                    <form method="post" action="{{ route('products.index') }}" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control" value="1500000">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input required id="images" type="file" name="images" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="backend/img/ok.png">
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="baohanh" class="form-control" value="12 tháng">
									</div>
									<div class="form-group" >
										<label>Phụ kiện</label>
										<input required type="text" name="phukien" class="form-control" value="Cáp - Sạc -Tai nghe">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="khuyenmai" class="form-control" value="SP chưa có chương trình khuyến mãi">
									</div>
									<div class="form-group" >
										<label>Tình trạng</label>
										<input required type="text" name="tinhtrang" class="form-control" value="Nguyên Seal - Chính Hãng">
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor" required name="desc"></textarea>
										<script type="text/javascript">
										var editor = CKEDITOR.replace( 'description',{
											language:'vi',
											filebrowserBrowseUrl: '../../editor/ckfinder/ckfinder.html',
											filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
											filebrowserUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
											filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
										});
										</script>
									</div>
									<div class="form-group" >
                                        <label>Danh mục</label>
                                        
                                        <?php $brands = App\Models\Brand::all() ?>
                                        <select required name="brand_id" class="form-control"><br />
        @foreach($brands as $brand)
        <option value="{{$brand->id}}">{{ $brand->name }}</option>
        @endforeach
    </select>
										<!-- <select required name="brand" class="form-control">
											@foreach($errors as $brand)
										<option value="{{$brand->brand_id}}">{{$brand->brand_name}}										</option>
										@endforeach
					                    </select> -->
									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="#" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		</div>	<!--/.main-->
@stop