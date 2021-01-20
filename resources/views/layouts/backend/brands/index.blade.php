@extends('layouts.admin')
@section('title', 'Danh sach brand')
@section('content')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
                <div class="col-lg-12"> 
                    <div class="panel panel-primary">
					<div class="panel-heading">Danh sách danh mục</div>
					<div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                                <div style="margin-top:30px; margin-bottom:10px">
                                    <a href="{{ route('brands.create') }}" class="btn btn-success">Thêm Brands</a>
                                </div>
                                <!-- add modal -->

                            </div>
                            <table class="table table-bordered" style="margin-top:25px;">
                                <thead>
                                <tr style="font-weight: bold">
            <td>ID</td>
            <td>Thương Hiệu</td>
            @foreach($brands as $brand)
            <tr>
                <td> {{$brand->id}}</td>
                <td> {{$brand->name}}</td>
                <td> <a class="btn btn-warning"  href="{{ route('brands.edit', $brand->id) }}">Edit</a> </td>
            <td>
                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
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





    <!-- <table border="1">
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td> {{$brand->id}}</td>
                <td> {{$brand->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection -->