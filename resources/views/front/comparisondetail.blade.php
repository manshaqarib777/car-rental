@extends('layouts.front')

@section('content')
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
						{{ $langg->lang310 }}
					</h1>
					<ul class="pages">
						<li>
							<a href="{{ route('front.index') }}">
								{{ $langg->lang1 }}
							</a>
						</li>
						<li class="active">
							<a href="#">
									{{ $langg->lang310 }}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area End -->


	<!-- Contact Us Area Start -->
	<section class="contact-us">
		<div class="container">
			<div class="row justify-content-between">
					<div class="col-xl-12 col-lg-12">
							<div class="right-area">
								<div class="contact-info">
									<div class="left ">
											<div class="icon">
													<i class="fa fa-car"></i>
													<p class="lable">
														Cars
													</p>
											</div>
									</div>
									<div class="content d-flex align-self-center">
										<div class="content">
											<h3>Choose Cars for Comparison</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
				<div class="col-xl-12 col-lg-12">
					<div class="left-area">
						<div class="contact-form">
							<div class="gocover" style="background: url({{ asset('assets/front/images/loader.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
								<div class="row">
										<div class="col-lg-6">
												<div class="form-input">
														<select class="searchable-select input-field" id="car_name_1">
									                        <option value="Select a Car" disabled selected>Select a Car</option>
									                        @foreach ($cars as $key => $car)
									                          <option value="{{ $car->title }}" {{ request()->input('car_name_1') == $car->title ? 'selected' : '' }}>{{ $car->title }}</option>
									                        @endforeach
									                      </select>
									                      <i class="fas fa-envelope"></i>
													</div>
										</div>
										<div class="col-lg-6">
												<div class="form-input">
														<select class="searchable-select input-field" id="car_name_2" >
									                        <option value="Select a Car" disabled selected>Select a Car</option>
									                        @foreach ($cars as $key => $car)
									                          <option value="{{ $car->title }}" {{ request()->input('car_name_2') == $car->title ? 'selected' : '' }}>{{ $car->title }}</option>
									                        @endforeach
									                      </select>
									                      <i class="fas fa-envelope"></i>
													</div>
										</div>
										{{-- <div class="col-lg-6">
												<div class="form-input">
														<select class="searchable-select input-field" id="car_model_1" >
									                        <option value="Select Year" disabled selected>Select Model</option>
									                        @foreach ($models as $key => $model)
									                          <option value="{{ $model->id }}" {{ request()->input('car_model_1') == $model->name ? 'selected' : '' }}>{{ $model->name }}</option>
									                        @endforeach
									                      </select>
									                      <i class="fas fa-envelope"></i>
													</div>
										</div>
										<div class="col-lg-6">
												<div class="form-input">
														<select class="searchable-select input-field" id="car_model_2" >
									                        <option value="Select Year" disabled selected>Select Model</option>
									                        @foreach ($models as $key => $model)
									                          <option value="{{ $model->id }}" {{ request()->input('car_model_2') == $model->name ? 'selected' : '' }}>{{ $model->name }}</option>
									                        @endforeach
									                      </select>
									                      <i class="fas fa-envelope"></i>
													</div>
										</div> --}}
										<div class="col-lg-6 text-center">
											<a class="car-info-box">
												<div class="img-area">
														<img class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.@@$car1data->featured_image)}}" alt="">
												</div>
											</a>	
											<h3 class="mt-2">{{@@$car1data->title}}</h3>									
										</div>
										<div class="col-lg-6 text-center">
											<a class="car-info-box">
												<div class="img-area">
														<img class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.@@$car2data->featured_image)}}" alt="">
												</div>
											</a>	
											<h3 class="mt-2">{{@@$car2data->title}}</h3>									
										</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<section class="faq-section">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-12">
				<div id="accordion">
					<h3 class="heading">General</h3>
  					<div class="content">
  						<table class="table ">
  <tbody>
    <tr>
      <th scope="row">Category</th>
      <td>{{@$car1data->category->name}}</td>
      <td>{{@$car2data->category->name}}</td>
    </tr>
    <tr>
      <th scope="row">Currency Code</th>
      <td>{{@$car1data->currency_code}}</td>
      <td>{{@$car2data->currency_code}}</td>
      
    </tr>
    <tr>
      <th scope="row">Currency Symbol</th>
      <td>{{@$car1data->currency_symbol}}</td>
      <td>{{@$car2data->currency_symbol}}</td>
    </tr>
    <tr>
      <th scope="row">Regular Price</th>
      <td>{{@$car1data->regular_price}}</td>
      <td>{{@$car2data->regular_price}}</td>
    </tr>
    <tr>
      <th scope="row">Sale Price</th>
      <td>{{@$car1data->sale_price}}</td>
      <td>{{@$car2data->sale_price}}</td>
    </tr>
    <tr>
      <th scope="row">Negotiable</th>
      <td>{!!(@$car1data->negotiable==1)?"<i class='fa fa-check' style='color:green;'></i>":"<i class='fa fa-times' style='color:red;'></i>"!!}</td>
      <td>{!!(@$car2data->negotiable==1)?"<i class='fa fa-check' style='color:green;'></i>":"<i class='fa fa-times' style='color:red;'></i>"!!}</td>
    </tr>
    <tr>
      <th scope="row">Top Speed (KMH)</th>
      <td>{{@$car1data->top_speed}}</td>
      <td>{{@$car2data->top_speed}}</td>
    </tr>
    <tr></tr>
  </tbody>
</table>
  					</div>
  					<h3 class="heading">Specification</h3>
  					<div class="content">
  						<table class="table ">
  <tbody>
    <tr>
      <th scope="row">Year</th>
      <td>{{@$car1data->year}}</td>
      <td>{{@$car2data->year}}</td>
    </tr>
    <tr>
      <th scope="row">Mileage</th>
      <td>{{@$car1data->mileage}}</td>
      <td>{{@$car2data->mileage}}</td>
      
    </tr>
    <tr>
      <th scope="row">Brand</th>
      <td>{{@$car1data->brand->name}}</td>
      <td>{{@$car2data->brand->name}}</td>
    </tr>
    <tr>
      <th scope="row">Body Type</th>
      <td>{{@$car1data->body_type->name}}</td>
      <td>{{@$car2data->body_type->name}}</td>
    </tr>
    <tr></tr>
  </tbody>
</table>
  					</div>
  					<h3 class="heading">Comfort & Convenience</h3>
  					<div class="content">
  						<table class="table ">
  <tbody>
    <tr>
      <th scope="row">Fuel Type</th>
      <td>{{@$car1data->fuel_type->name}}</td>
      <td>{{@$car2data->fuel_type->name}}</td>
    </tr>
    <tr>
      <th scope="row">Transmission Type</th>
      <td>{{@$car1data->transmission_type->name}}</td>
      <td>{{@$car2data->transmission_type->name}}</td>
      
    </tr>
    <tr>
      <th scope="row">Condition</th>
      <td>{{@$car1data->condtion->name}}</td>
      <td>{{@$car2data->condtion->name}}</td>
    </tr>
  </tbody>
</table>
  					</div>

				</div>
			</div>
		</div>
		</div>
		<form id="searchForm" class="d-none" action="{{ route('front.comparison.details') }}" method="get">
		<input type="hidden" name="car_name_1" value="{{ !empty(request()->input('car_name_1')) ? request()->input('car_name_1') : null }}">
		<input type="hidden" name="car_name_2" value="{{ !empty(request()->input('car_name_2')) ? request()->input('car_name_2') : null }}">
		<input type="hidden" name="car_model_1" value="{{ !empty(request()->input('car_model_1')) ? request()->input('car_model_1') : null }}">
		<input type="hidden" name="car_model_2" value="{{ !empty(request()->input('car_model_2')) ? request()->input('car_model_2') : null }}">
		<button type="submit"></button>
	</form>
	</section>
	{{-- Populate search form with values --}}
	<script>
		$(document).ready(function() {
	        $('.searchable-select').select2();

			$("#car_name_1").on('change', function() {
				$("input[name='car_name_1']").val($(this).val());
				$("#searchForm").trigger('submit');
			});
			$("#car_name_2").on('change', function() {
				$("input[name='car_name_2']").val($(this).val());
				$("#searchForm").trigger('submit');
			});
			$("#car_model_1").on('change', function() {
				$("input[name='car_model_1']").val($(this).val());
				$("#searchForm").trigger('submit');
			});
			$("#car_model_2").on('change', function() {
				$("input[name='car_model_2']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			
		})
	</script>
	<!-- Contact Us Area End-->
@endsection
