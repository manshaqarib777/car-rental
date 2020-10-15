@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
							Comparison
						</h1>
						<ul class="pages">
							{{-- Category Breadcumbs --}}

		          @if(isset($bcat))

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.comparison') }}">
		                  Comparison
		                </a>
		              </li>
		              <li>
		                <a href="{{ route('front.blogcategory',$bcat->slug) }}">
		                  {{ $bcat->name }}
		                </a>
		              </li>

		          @elseif(isset($slug))

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.comparison') }}">
		                  Comparison
		                </a>
		              </li>
		              <li>
		                <a href="{{ route('front.blogtags',$slug) }}">
		                  {{ $langg->lang308 }}: {{ $slug }}
		                </a>
		              </li>

		          @elseif(isset($search))

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.comparison') }}">
		                  Comparison
		                </a>
		              </li>
		              <li>
		                <a href="Javascript:;">
		                  {{ $langg->lang12 }}
		                </a>
		              </li>
		              <li>
		                <a href="Javascript:;">
		                  {{ $search }}
		                </a>
		              </li>

		          @else

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.comparison') }}">
		                  Comparison
		                </a>
		              </li>
		          @endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	<!-- Breadcrumb Area Start -->

	<!-- Blog Area Start -->
	<section class="blog blog-page" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
									@if (count($cars) == 0)
										<div class="col-lg-12 text-center">
											<h2>NO CAR FOUND</h2>
										</div>
									@else
										@foreach ($cars as $key => $car)
											<div class="col-lg-5 col-md-5 mb-4">
												<a class="car-info-box" href="{{ route('front.details', $car->id) }}">
														<div class="img-area">
																<img class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.$car->featured_image)}}" alt="">
														</div>
														<div class="content">
															<h4 class="title">
																{{ $car->title }}
															</h4>
															 <ul class="top-meta">
																<li>
																	<i class="far fa-eye"></i> {{ $car->views }} {{ $langg->lang66 }}
																</li>
																<li>
																	<i class="far fa-clock"></i> {{ time_elapsed_string($car->created_at) }}
																</li>
															</ul>
															{{--
															<ul class="short-info">
																<li class="north-west" title="Model Year">
																	<img src="{{asset('assets/front/images/calender-icon.png')}}" alt="">
																	<p>{{ $car->year }}</p>
																</li>
																<li class="north-west" title="Mileage">
																	<img src="{{asset('assets/front/images/road-icon.png')}}" alt="">
																	<p>{{ $car->mileage }}</p>
																</li>
																<li class="north-west" title="Top Speed (KMH)">
																	<img src="{{asset('assets/front/images/transformar.png')}}" alt="">
																	<p>{{ $car->top_speed }}</p>
																</li>
															</ul> --}}
															<div class="footer-area">
																<div class="left-area">
																	@if (empty($car->sale_price))
																		<p class="price">
																			{{ $car->currency_symbol }} {{ number_format($car->regular_price, 0, '', ',') }}
																		</p>
																	@else
																		<p class="price">
																			{{ $car->currency_symbol }} {{ number_format($car->sale_price, 0, '', ',') }} <del>{{ $car->currency_symbol }} {{ number_format($car->regular_price, 0, '', ',') }}</del>
																		</p>
																	@endif
																</div>
																<div class="right-area">
																	<p class="condition">
																		{{ $car->condtion->name }}
																	</p>
																</div>
															</div>
														</div>
												</a>
											</div>
											@if($loop->iteration%2!=0)
											<div class="col-lg-1 col-md-1">
												<div style="
    background: #919191 none repeat scroll 0 0;
    border-radius: 50%;
    color: #fff;
    height: 35px;
    left: 0;
    line-height: 35px;
    margin: 0 auto;
    position: absolute;
    right: 0;
    top: 36%;
    width: 35px;
    z-index: 5;
    text-align: center;">vs</div>
											</div>
											@endif
										@endforeach
									@endif

                  <div class="col-12 text-center">
                    {{ $cars->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'fuel_type_id' => request()->input('fuel_type_id'), 'transmission_type_id' => request()->input('transmission_type_id'), 'condition_id' => request()->input('condition_id'), 'brand_id' => request()->input('brand_id'), 'type' => request()->input('type'), 'sort' => request()->input('sort'), 'view' => request()->input('view')])->links() }}
                  </div>
								</div>
				</div>
				<div class="col-lg-4">
					<div class="blog-aside">
						<div class="serch-widget">
							<h4 class="title">
								{{ $langg->lang301 }}
							</h4>
							<form action="{{ route('front.blogsearch') }}">
								<input type="text" value="{{ request()->input('search') }}" name="search" placeholder="{{ $langg->lang302 }}" required="">
								<button class="submit" type="submit">{{ $langg->lang301 }}</button>
							</form>
						</div>
						<div class="recent-post-widget">
							<h4 class="title">Latest Reviews</h4>
							<ul class="post-list">
                @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get() as $blog)
                <li>
                  <div class="post">
                    <div class="post-img">
                      <img src="{{ asset('assets/images/blogs/'.$blog->photo) }}" alt="">
                    </div>
                    <div class="post-details">
                      <a href="{{ route('front.blogshow',$blog->id) }}">
                          <h4 class="post-title">
                              {{strlen($blog->title) > 45 ? substr($blog->title,0,45)." .." : $blog->title}}
                          </h4>
                      </a>
                      <p class="date">
                          {{ date('M d - Y',(strtotime($blog->created_at))) }}
                      </p>
                    </div>
                  </div>
                </li>
                @endforeach
							</ul>
						</div>
						<div class="categori">
							<h4 class="title">{{ $langg->lang303 }}</h4>
							<ul class="categori-list">
                @foreach($bcats as $cat)
                <li>
                  <a href="{{ route('front.blogcategory',$cat->slug) }}" @if(!empty($bcat) && $bcat->slug == $cat->slug) class="active"  @endif>
                    <span>{{ $cat->name }}</span>
                    <span>({{ $cat->blogs()->count() }})</span>
                  </a>
                </li>
                @endforeach
							</ul>
						</div>
						<div class="newsletter-widget">
							<h4 class="title">
									{{ $langg->lang305 }}
							</h4>
							<div class="gocover" style="background: url({{ asset('assets/front/images/loader.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<form id="geniusform" action="{{ route('front.subscribe') }}" method="POST">
								{{ csrf_field() }}
								@include('includes.admin.form-both')
								<input type="text" name="email" placeholder="{{ $langg->lang306 }}" required>
								<button class="submit" type="submit">{{ $langg->lang307 }}</button>
							</form>
						</div>
						<div class="tags">
							<h4 class="title">{{ $langg->lang308 }}</h4>
							<span class="separator"></span>
							<ul class="tags-list">
                @foreach($tags as $tag)
                  @if(!empty($tag))
                  <li>
                    <a href="{{ route('front.blogtags',$tag) }}">{{ $tag }} </a>
                  </li>
                  @endif
                @endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>


		</div>
	</section>
	<!-- Blog Area End-->




@endsection


@section('scripts')
<script>

setTimeout(function() {
	$(".commentCount").each(function(i) {
		// console.log($(this).html());
		if ($(this).html() == 'Comments') {
			$(this).html('0 Comments');
		}
	});
}, 2000);



</script>
@endsection
