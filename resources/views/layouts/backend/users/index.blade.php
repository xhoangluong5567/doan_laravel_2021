@extends('layouts.admin')
@section('title', 'Danh sach brand')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
                <div class="col-lg-12"> 
                    <div class="panel panel-primary">
					<div class="panel-heading">Danh sách User</div>
					<div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                                <div style="margin-top:30px; margin-bottom:10px">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm User</a>
                                </div>
                                <!-- add modal -->

                            </div>
                            <table class="table table-bordered" style="margin-top:25px;">
                                <thead>
                                <tr style="font-weight: bold">
                                <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Phân Quyền</td>


                                @foreach($users as $user)
            <tr>
                <td> {{$user->id}}</td>
                <td> {{$user->name}}</td>
                <td> {{$user->email}}</td>
                <td> {{$user->password}}</td>
                <td> {{$user->is_admin}}</td>
                <td> <a class="btn btn-success" href="{{ route('users.edit', $user->id) }}">Edit</a> </td>

                <td> 
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>

            </tr>
            @endforeach
        </tbody>
    </table>
@endsection