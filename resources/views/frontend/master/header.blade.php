 <!--header -->
<div class="colorlib-loader"></div>

<div id="page">

    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left menu-1">
                        <ul>
                            <li class="active"><a href="">Trang chủ</a></li>
                            <li class="has-dropdown">
                                <a href="product">Cửa hàng</a>
                                <ul class="dropdown">
                                    <li><a href="product/cart">Giỏ hàng</a></li>
                                    <li><a href="product/checkout">Thanh toán</a></li>

                                </ul>
                            </li>
                            <li><a href="about">Giới thiệu</a></li>
                            <li><a href="contact">Liên hệ</a></li>
                            <li><a href="product/cart"><i class="icon-shopping-cart"></i> Giỏ hàng [{{Cart::Content()->count()}}]</a></li>
                            <li style="padding-left:5px"><a href="{{ url('auth/google') }}">
                                @if (Auth::check())
                                {{Auth::user()->full}}
                                @else
                                Đăng nhập
                                @endif
                              </a>
                            </li>
                            @if (Auth::check())<li><a href="logout/google">Đăng xuất</a></li> @endif
                        </ul>
                    </div>
                     <div class="col-lg-4 text-right menu-1">

                        {{--  <div id="colorlib-logo"><a href=""><big>SƠN HÀ</big></a></div>                     --}}
                         <form action="search">
                            <input style="width: 200px;
                            border-radius: 5px;
                            height: 35px;" class="search-input"  placeholder="Search "  type="search" id="gsearch" name="search"  <i class="fa fa-search search-icon"></i>
                            <button type="submit" class="btn btn-primary ">Tìm kiếm</button>
                         </form>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(backend/img/bn1.jpg);">
                    <div class="overlay"></div>

                </li>
                <li style="background-image: url(backend/img/bn2.jpg);">
                    <div class="overlay"></div>

                </li>
                <li style="background-image: url(frontend/images/banner-web-xlnmn-2.jpg);">
                    <div class="overlay"></div>

                </li>
            </ul>
        </div>
    </aside>
    <!-- End header -->
