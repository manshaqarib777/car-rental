@extends('layouts.front')

@section('content')
  <!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
								How It Works
						</h1>
						<ul class="pages">
							<li>
								<a href="{{ route('front.index') }}">
									{{ $langg->lang1 }}
								</a>
							</li>
							<li class="active">
								<a href="#">
									How It Works
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
	<!-- Breadcrumb Area End -->

	<section class="toggle2 cid-qv5AjKhpAC" id="toggle2-5e" data-rv-view="2088">
    
        

    
        <div class="container">
            <div class="media-container-row">
                    <div class="toggle-content">
                        <h5 class="mbr-section-title pb-3 align-left mbr-fonts-style display-2">
                            {{$mainheading1}}
                        </h5>
                        
                        <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content pt-5 mt-2">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#collapse1_419" aria-expanded="false" aria-controls="collapse1">
                                        <h4 class="mbr-fonts-style display-5">
                                            <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>  {{$heading1}}
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapse1_419" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body p-4">
                                        <p class="mbr-fonts-style panel-text display-7">
                                           {{$description1}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#collapse2_419" aria-expanded="false" aria-controls="collapse2">
                                        <h4 class="mbr-fonts-style display-5">
                                            <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> {{$heading2}}
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapse2_419" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body p-4">
                                        <p class="mbr-fonts-style panel-text display-7">
                                           {!!$description2!!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#collapse3_419" aria-expanded="true" aria-controls="collapse3">
                                        <h4 class="mbr-fonts-style display-5">
                                            <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>  {{$heading3}}
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapse3_419" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body p-4">
                                        <p class="mbr-fonts-style panel-text display-7">
                                           {!!$description3!!}</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                <div class="mbr-figure" style="width: 123%;">
                     <img src="{{url('/')}}/faq/assets/images/brooke-lark-207271-2000x1333.jpg" alt="Mobirise" title="" media-simple="true">
                </div>
            </div>
        </div>
</section>

<section class="toggle1 cid-qv5Aju6kt2" id="toggle1-5d" data-rv-view="2091">

    

    
        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="section-head text-center space30">
                       <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">
                             {{$mainheading2}}</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#collapse1_420" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>  {{$heading11}}
                                    </h4>
                                </a>
                            </div>
                            <div id="collapse1_420" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                      {!!$description11!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#collapse2_420" aria-expanded="false" aria-controls="collapse2">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> {{$heading12}}
                                    </h4>
                                </a>

                            </div>
                            <div id="collapse2_420" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                       {!!$description12!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#accordion" data-core="" href="#collapse3_420" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> {{$heading13}}
                                    </h4>
                                </a>
                            </div>
                            <div id="collapse3_420" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                       {!!$description13!!}</p>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="accordion2 cid-qv5AjcZSx1" id="accordion2-5c" data-rv-view="2094">

    


    
    <div class="container">
        <div class="media-container-row pt-5">
            <div class="accordion-content">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        {{$mainheading3}}
                </h2>
                
                <div id="bootstrap-accordion_421" class="panel-group accordionStyles accordion pt-5 mt-3" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#bootstrap-accordion_421" data-core="" href="#collapse1_421" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>{{$heading31}}
                                    </h4>
                                </a>
                            </div>
                            <div id="collapse1_421" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                       {!!$description31!!}</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#bootstrap-accordion_421" data-core="" href="#collapse2_421" aria-expanded="false" aria-controls="collapse2">
                                    <h4 class="mbr-fonts-style mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> {{$heading32}}
                                    </h4>
                                </a>
                                
                            </div>
                            <div id="collapse2_421" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                      {!!$description32!!}</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#bootstrap-accordion_421" data-core="" href="#collapse3_421" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> {{$heading33}}
                                    </h4>
                                </a>
                            </div>
                            <div id="collapse3_421" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                       {!!$description33!!}</p>
                                </div>
                            </div>
                        </div>
                
                        
                
                        
                
                        
                </div>
            </div>
            <div class="mbr-figure" style="width: 128%;">
                    <img src="{{url('/')}}/faq/assets/images/maranatha-pizarras-342562-2000x1333.jpg" alt="Mobirise" title="" media-simple="true">
            </div>
        </div>
    </div>
</section>

<section class="accordion1 cid-qv5AiTkod8" id="accordion1-5b" data-rv-view="2097">

    

    
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="section-head text-center space30">
                    <h2 class="mbr-section-title pb-5 mbr-fonts-style display-2">
                       {{$mainheading4}}
                    </h2>
                </div>
                <div class="clearfix"></div>
                <div id="bootstrap-accordion_422" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed text-black" data-toggle="collapse" data-parent="#bootstrap-accordion_422" data-core="" href="#collapse1_422" aria-expanded="false" aria-controls="collapse1">
                                <h4 class="mbr-fonts-style display-5">
                                    <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>
                                    {{$heading41}}
                                </h4>
                            </a>
                        </div>
                        <div id="collapse1_422" class="panel-collapse noScroll collapse " role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body p-4">
                                <p class="mbr-fonts-style panel-text display-7">
                                  {!!$description41!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-parent="#bootstrap-accordion_422" data-core="" href="#collapse2_422" aria-expanded="false" aria-controls="collapse2">
                                <h4 class="mbr-fonts-style display-5">
                                    <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> {{$heading42}}
                               </h4>
                            </a>
                            
                        </div>
                        <div id="collapse2_422" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body p-4">
                                <p class="mbr-fonts-style panel-text display-7">
                                  {!!$description42!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingThree">
                            <a role="button" class="collapsed text-black panel-title" data-toggle="collapse" data-parent="#bootstrap-accordion_422" data-core="" href="#collapse3_422" aria-expanded="false" aria-controls="collapse3">
                                <h4 class="mbr-fonts-style display-5">
                                    <span class="sign mbr-iconfont mbri-arrow-down inactive"></span> {{$heading43}}
                                </h4>
                            </a>
                        </div>
                        <div id="collapse3_422" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body p-4">
                                <p class="mbr-fonts-style panel-text display-7">
                                   {!!$description43!!}</p>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
