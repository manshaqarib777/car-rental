@extends('layouts.front')

@section('content')
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
								{{ $langg->lang7 }}
						</h1>
						<ul class="pages">
							<li>
								<a href="#">
									{{ $langg->lang1 }}
								</a>
							</li>
							<li class="active">
								<a href="#">
									{{ $langg->lang7 }}
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
	<!-- Breadcrumb Area End -->

	<!-- About Area Start -->
		<section class="login-signup">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="log-reg-tab-wrapper">
						<div class="log-reg-tab-menu">
							<ul class="nav" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="true">{{ $langg->lang401 }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" {{-- href="{{ route('login') }}"  --}} role="tab" aria-controls="pills-profile" aria-selected="false">
										{{ $langg->lang400 }}
									</a>
								</li>
							</ul>
						</div>
						<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
								<div class="login-area signup-area">
										<div class="login-form signup-form">
											@include('includes.admin.form-login')
											<form id="registerform" class="" action="{{ route('user.reg.submit') }}" method="post">
												{{ csrf_field() }}
												<div class="row mb-3">
													<div class="col-lg-12">
														<div class="form-input">
														<select class="js-example-basic-single" style="width: 100%" name="type" id="type">
															<option value="1">Individual</option>
															<option value="2">Company</option>
															<option value="3">Car Inspector</option>
														</select>
														<i class="fas fa-check"></i>
													</div>
													</div>
												</div>
												<div class="row" id='hideforcompany'>
													<div class="col-lg-6">
															<div class="form-input">
																	<input name="first_name" type="text" placeholder="{{ $langg->lang402 }}">
																	<i class="fas fa-user"></i>
																</div>
													</div>
													<div class="col-lg-6">
															<div class="form-input">
																	<input name="last_name" type="text" placeholder="{{ $langg->lang403 }}">
																	<i class="fas fa-user"></i>
																</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6">
															<div class="form-input">
																	<input name="username" type="text" placeholder="{{ $langg->lang404 }}">
																	<i class="fas fa-user"></i>
																</div>
													</div>
													<div class="col-lg-6">
															<div class="form-input">
																	<input name="email" type="email" placeholder="{{ $langg->lang405 }}">
																	<i class="fas fa-envelope"></i>
																</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12">
															<div class="form-input">
																	<input name="password" type="password" class="Password" placeholder="{{ $langg->lang406 }}">
																	<i class="fas fa-key"></i>
																</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12">
															<div class="form-input">
																	<input name="password_confirmation" type="password" class="Password" placeholder="{{ $langg->lang407 }} {{ $langg->lang406 }}">
																	<i class="fas fa-key"></i>
																</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12">
															<div class="form-input">
																	<input type="text" name="code" class="Password" placeholder="{{ $langg->lang408 }}" autocomplete="off">
																	<i class="fas fa-code"></i>
																</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12">
															<div class="captcha-area">
																<div class="img">
																	<img id="codeimg" src="{{asset('assets/images/capcha_code.png?time='.time())}}" alt="">
																</div>
																<div class="icon">
																		<i class="fas fa-sync refresh_code"></i>
																</div>
															</div>
													</div>
												</div>
												<button class="submit-btn">{{ $langg->lang401 }}</button>
											</form>
										</div>
									</div>
						</div>
						<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<div class="login-area signup-area">

										<div class="login-form signup-form">
											@include('includes.admin.form-login')
											<form id="loginform" action="{{ route('user.login.submit') }}" method="POST">
												{{ csrf_field() }}
												<div class="row">
													<div class="col-lg-12">
															<div class="form-input">
																	<input name="email" type="email" placeholder="{{ $langg->lang405 }}">
																	<i class="fas fa-envelope"></i>
																</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12">
															<div class="form-input">
																	<input name="password" type="password" class="Password" placeholder="{{ $langg->lang406 }}">
																	<i class="fas fa-key"></i>
																</div>
													</div>
												</div>
												<a href="{{ route('front-forgot') }}" class="forgot-pass">{{ $langg->lang409 }}? </a>
												<button class="submit-btn">{{ $langg->lang400 }}</button>
											</form>
										</div>
									</div>
						</div>
						</div>
						</div>
				</div>
			</div>
		</section>
	<!-- About Area End -->
@endsection

@section('scripts')
    <script>
    	$('#type').on( "change", function() {
            if($(this).val()=='Company')
            {
            	$('#hideforcompany').hide();
            	$("input[name=first_name]").val('company');
            	$("input[name=last_name]").val('company');
            	$("input[name=username]").attr('placeholder','Enter Company Name');
            }
            else
            {	
            	$('#hideforcompany').show();
            	$("input[name=first_name]").val('');
            	$("input[name=last_name]").val('');
            	$("input[name=username]").attr('placeholder','Enter Your Username');
            }
        })
        $('.refresh_code').on( "click", function() {
            $.get('{{url('refresh_code')}}', function(data, status){
                $('#codeimg').attr("src","{{url('assets/images')}}/capcha_code.png?time="+ Math.random());
            });
        })

    </script>
@stop
