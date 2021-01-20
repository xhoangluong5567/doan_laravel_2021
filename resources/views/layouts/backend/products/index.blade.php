@extends('layouts.admin')
@section('title','Products')
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
                <div class="panel-heading">Danh sách sản phẩm</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <a href="{{asset('admin/products/create')}}" class="btn btn-primary">Thêm sản phẩm</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <td>ID</td>
                                        <td>Product Name</td>
                                        <td>Ảnh sản phẩm</td>
                                        <td>Price</td>
                                        <td>Description</td>
                                        <td>Brand</td>
                                        @foreach($products as $product)
                                    <tr>
                                        <td> {{$product->id}}</td>
                                        <td> {{$product->name}}</td>
                                        <td><img width="200px" src="{{url('upload')}}/{{$product->images}}" class="thumbnail"></td>
                                        <td> {{number_format($product->price)}} VND</td>
                                        <td> {{ $product->desc }} </td>
                                        <td><?php $brand = App\Models\Brand::find($product->brand_id) ?>
                                            {{ $brand->name }}</td>




                                        <td> <a class="btn btn-success" href="{{ route('products.edit', $product->id) }}">Edit</a> </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
@endsection