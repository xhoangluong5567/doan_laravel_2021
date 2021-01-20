<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') Trang quản lí | Dashboard</title>
<base href="{{asset('public')}}"/>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/css/datepicker3.css" rel="stylesheet">
<link href="backend/css/styles.css" rel="stylesheet">
<script type="text/javascript" src="/../../editor/ckeditor/ckeditor.js"></script>
<script src="backend/js/lumino.glyphs.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('admin')}}">Dashboard Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>{{Auth::user()->name}}<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
		<img src="backend/img/logoad.jpg" style="height:160px; width:160px; border-radius:50%; margin-left:40px; margin-top:30px; -webkit-border-radius:50%;">
		<div style="text-align:center;">
		<br><br><a style="text-align:center;">{{Auth::user()->name}}</a>
		<a style="text-align:center;">{{Auth::user()->email}}</a>
		</div>
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="{{asset('admin/products')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a href="{{asset('admin/brands')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Danh mục</a></li>
			<li><a href="{{asset('admin/users')}}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lí User</a></li>
			<li><a href="{{asset('admin/bill')}}"><img src="backend/img/qldh.png"> Quản lí Đơn Hàng</a></li>

			<li role="presentation" class="divider"></li>

			<li><a style="margin-top:60px;" href="{{ url('http://127.0.0.1:8000/') }}"><img src="backend/img/backhome.png"> Back home</a></li>

		</ul>
		
	</div><!--/.sidebar-->

    <!--Main-->
    @yield('content')
    <base href="{{asset('public')}}"/>
    <script src="backend/js/jquery-1.11.1.min.js"></script>
	<script src="backend/js/bootstrap.min.js"></script>
	<script src="backend/js/chart.min.js"></script>
	<script src="backend/js/easypiechart.js"></script>
	<script src="backend/js/bootstrap-datepicker.js"></script>

	<script>

  // Chang Image add product
  function changeImg(input){
      //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
      if(input.files && input.files[0]){
          var reader = new FileReader();
          //Sự kiện file đã được load vào website
          reader.onload = function(e){
              //Thay đổi đường dẫn ảnh
              $('#avatar').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $(document).ready(function() {
      $('#avatar').click(function(){
          $('#images').click();
      });
  });
 </script>
</body>

</html>