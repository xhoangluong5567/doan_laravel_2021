<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPLE ISTORE</title>
    <base href="{{asset('public')}}" />
    <link rel="stylesheet" href="frontend/css/cart.css">
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/home.css">
    <link rel="stylesheet" href="frontend/css/details.css">
    <script type="text/javascript" src="frontend/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="frontend/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js" type="text/javascript"></script>
        <script src="frontend/js/demoValidation.js" type="text/javascript"></script>
        
	    <style>
		label.error{
			color: red;
		}
	    </style>
    <script type="text/javascript">
        $(function() {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });

        $(window).resize(function() {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>
</head>

<body>


    </header>
    <header id="header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-md-10 col-sm-12 col-xs-12">
                    <h1>
                        <a href="{{'http://127.0.0.1:8000/'}}"><img src="frontend/img/home/oklogo.png" style="width: 300px;margin-bottom: 20px;"></a>
                        <nav><a id="pull" class="btn btn-danger" href="#">
                                <i class="fa fa-bars"></i>
                            </a></nav>
                    </h1>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12" style="margin-top:10px;">
                    <a class="" href="{{url('cart/show')}}"><img src="frontend/img/home/carts.png"></a>
                    <a style="color:white; font-weight: bold;" href="{{url('cart/show')}}">{{Cart::count()}}</a>
                </div>
            </div>
        </div>
    </header>
        <!-- endheader -->

    <!-- main -->
    <section id="body">
        <div class="container">
            <div class="row">
                <div id="sidebar" class="col-md-3" style="
    font-family: arial;
    font-size: 14px;
    color: #666;
">
                    <nav id="menu">
                        
                        <ul>
                            <a>
                           <li class="menu-item">Danh mục sản phẩm</li>
                            <?php $brands = App\Models\Brand::all() ?>
                            @foreach($brands as $brand)
                            <li class="menu-item"><a href="{{url('brand')}}/{{$brand->id}}" style="text-decoration:none;" value="{{$brand->id}}">{{ $brand->name }}</a></li>
                            @endforeach

                           </ul>
                        </a>
                    </nav>
                </div>



                <div id="main" class="col-md-9">
                    <!-- main -->
                    <!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
                    <div id="slider">
                        <div id="demo" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img style="width:855px; height:258px;" src="frontend/img/home/ap5.png" alt="Los Angeles">
                                </div>
                                <div class="carousel-item">
                                    <img style="width:855px; height:258px;" src="frontend/img/home/ap3.png" alt="Chicago">
                                </div>
                                <div class="carousel-item">
                                    <img style="width:855px; height:258px;" src="frontend/img/home/ap4.png" alt="New York">
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner" style="margin-top: 10px;">
                <img src="frontend/img/home/sl2.png" style="width:100%">
            </div>


            @yield('content')
        </div>
        </div>
        </div>
        </div>
        


        <footer id="footer">
            <div id="footer-t">
                <div class="container">
                    <div class="row">
                        <div id="about" class="col-md-4 col-sm-12 col-xs-12">
                            <h3>About us</h3>
                            <p class="text-justify">Đồ án môn PHP nâng cao 2020 Hueic.</p>
                        </div>
                        <div id="hotline" class="col-md-4 col-sm-12 col-xs-12">
                            <h3>Hotline</h3>
                            <p>Phone: (+84) 0963600036</p>
                            <p>Email: xhoangluong@gmail.com</p>
                        </div>
                        <div id="contact" class="col-md-4 col-sm-12 col-xs-12">
                            <h3>Contact Us</h3>
                            <p>Address: Hueic - 70 Nguyễn Huệ - Thừa Thiên Huế</p>
                        </div>
                    </div>
                </div>
                <div id="footer-b">
                    <div class="container">
                        <div id="footer-b-r" class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <p style="text-align:center;">© 2020 Hueic</p>
                        </div>
                </div>
            </div>
        </footer>
        <!-- endfooter -->
</body>

</html>