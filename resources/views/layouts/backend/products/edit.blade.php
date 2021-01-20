@extends('layouts.admin')
@section('title', 'Edit Product')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Sửa sản phẩm</div>
                <div class="panel-body">
                    <form action="{{ route('products.update', $product->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input required id="images" type="file" name="images" class="form-control hidden" onchange="changeImg(this)">
                                    <script>
                                        // Chang Image add product
                                        function changeImg(input) {
                                            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                //Sự kiện file đã được load vào website
                                                reader.onload = function(e) {
                                                    //Thay đổi đường dẫn ảnh
                                                    $('#avatar').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $(document).ready(function() {
                                            $('#avatar').click(function() {
                                                $('#images').click();
                                            });
                                        });
                                    </script>
                                    <img id="avatar" class="thumbnail" width="300px" src="{{url('upload')}}/{{$product->images}}">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input required type="nuuber" name="price" value="{{ $product->price }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Desc</label>
                                    <input required type="desc" name="desc" value="{{ $product->desc }}" class="form-control">
                                </div>
                                <!-- <label>Desc</label><br>

                                    <textarea required name="desc" style="width: 700px; height: 200px" >{{ $product->desc}}</textarea> -->

                                <div class="form-group">
                                    <label>Brand</label><br>
                                    <?php $brands = App\Models\Brand::all() ?>
                                    <select name="brand_id"><br />

                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <!-- <textarea required name="desc" style="width: 700px; height: 200px"></textarea> -->
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                        <a href="{{ route('products.index')}}" class="btn btn-danger">Hủy bỏ</a>
                </div>
            </div>
            </>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->
</div>

<!-- <form action="{{ route('products.update', $product->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <h2>Edit Product</h2>

    Name Product: <input type="text" name="name" value="{{$product->name}}"><br><br>
    Price: <input type="number" name="price" id="" value="{{$product->price}}"><br><br>
    Description: <input type="text" name="description" value="{{ $product->desc }}"><br><br>
   
    Brand:
    <select name="brand_id"><br/>
        @foreach(App\Models\Brand::all() as $brand)
        <option value="{{$brand->id}}">{{ $brand->name }}</option>
        @endforeach
    </select>


    <input class="btn btn-info" type="submit" value="UPDATE">
</form> -->

@endsection