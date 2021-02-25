@extends('frontend.master.master')
@section('title','Sản phẩm')
@section('content')
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<div class="row row-pb-lg">
							@foreach ($search as $item)
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(backend/img/{{$item->img}});">

										<div class="cart">
											<p>
												<span class="addtocart"><a href="product/detail/{{$item->id}}"><i class="icon-shopping-cart"></i></a></span>
												<span><a href="product/detail/{{$item->id}}"><i class="icon-eye"></i></a></span>


											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product/detail/{{$item->id}}"> {{ $item->name }}</a></h3>
										<p class="price"><span>{{ number_format($item->price,0,'',',') }}VND</span>
									</div>
								</div>
							</div>
							@endforeach


						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main -->
@endsection
