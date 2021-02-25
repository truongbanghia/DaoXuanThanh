@extends('frontend.master.master')
@section('title','Trang chủ')
@section('content')
		<!-- main -->
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="shop.html" class="f-product-1" style="background-image: url(backend/img/kk.jpg);">
							{{--  <div class="desc">
								<h2>Thương <br>Hiệu <br>Hàn Quốc</h2>
							</div>  --}}
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(backend/img/ll.jpg);">
									<div class="desc">

										<h2>MÁY <br>HÀN <br>QUỐC</h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(backend/img/bb.jpg);">
									<div class="desc">
										<h2>Sale <br>20% <br>off</h2>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="" class="f-product-2" style="background-image: url(backend/img/aa.jpg);">
									<div class="desc">
										<h2>MÁY <br>TRÊN <br>CHẬU</h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Nổi bật</span></h2>
						<p>Đây là những sản phẩm được ưa chuộng nhất năm 2020</p>
					</div>
				</div>
				<div class="row">
					@foreach ($product_fe as $product)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(backend/img/{{ $product->img }});">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="product/detail/{{ $product->id }}"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="product/detail/{{ $product->id }}"><i class="icon-eye"></i></a></span>


									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="product/detail/{{ $product->id }}">{{ $product->name }}</a></h3>
								<p class="price"><span>{{ number_format($product->price,0,'',',') }} VND</span></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm mới</span></h2>
						<p>Đây là những sản phẩm mới của năm năm 2020</p>
					</div>
				</div>
				<div class="row">
					@foreach ($product_new as $product)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(backend/img/{{ $product->img }});">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="product/detail/{{ $product->id }}"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="product/detail/{{ $product->id }}"><i class="icon-eye"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="product/detail/{{ $product->id }}">{{ $product->name }}</a></h3>
								<p class="price"><span>{{ number_format($product->price,0,'',',') }} VND</span></p>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
		<!-- end main -->
@endsection
