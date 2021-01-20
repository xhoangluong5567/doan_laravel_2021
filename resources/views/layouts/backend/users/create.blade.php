@extends('layouts.admin')
@section('title', 'Danh sach brand')
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
                <div class="panel-heading">Thêm sản phẩm</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input required="abc" type="text" name="name" class="form-control">
                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong><br />
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="text" name="email" class="form-control">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong><br />
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label><br>

                                    <input required name="password" name="password" class="form-control">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong><br />
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Phân Quyền</label><br>

                                    <input required name="is_admin" name="is_admin" class="form-control">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_admin') }}</strong><br />
                                    </span>
                                </div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                <a href="{{ route('users.index')}}" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection