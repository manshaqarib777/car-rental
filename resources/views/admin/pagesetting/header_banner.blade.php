@extends('layouts.admin')
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Header Banner </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                          <a href="javascript:;">Home Page Settings </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-ps-header') }}">Header Banner </a>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">

                                <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                      <form id="geniusform" action="{{ route('admin-ps-update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @include('includes.admin.form-both')

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Background *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview" style="background: url('{{  asset('assets/front/images/'.$data->background) }}');">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>Upload Image</label>
                                                <input type="file" name="background" class="img-upload" id="image-upload">
                                              </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Testimonial Background *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview" style="background: url('{{  asset('assets/front/images/'.$data->testimonial_bg) }}');">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>Upload Image</label>
                                                <input type="file" name="testimonial_bg" class="img-upload" id="image-upload">
                                              </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Bottom Image </h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview" style="background: url('{{  asset('assets/front/images/'.$data->image) }}');">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>Upload Image</label>
                                                <input type="file" name="image" class="img-upload" id="image-upload">
                                              </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Top Banner Front Image *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview" style="background: url('{{  asset('assets/front/images/'.$data->topbanner_front_image) }}');">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>Upload Image</label>
                                                <input type="file" name="topbanner_front_image" class="img-upload" id="image-upload">
                                              </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Top Banner Background image *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview" style="background: url('{{  asset('assets/front/images/'.$data->topbanner_back_image) }}');">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>Upload Image</label>
                                                <input type="file" name="topbanner_back_image" class="img-upload" id="image-upload">
                                              </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Top Banner Heading *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="topbanner_heading" placeholder="Headind" required="" value="{{$data->topbanner_heading}}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Top Banner Small Description *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="topbanner_small_des" placeholder="Small Description" required="" value="{{$data->topbanner_small_des}}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Top Banner Long Description *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="topbanner_full_des" placeholder="Full Description" required="" value="{{$data->topbanner_full_des}}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Top Banner Video Link *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="top_banner_video_link" placeholder="Video Link" required="" value="{{$data->top_banner_video_link}}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Bold Text *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="header_btxt" placeholder="Bold Text" required="" value="{{$data->header_btxt}}">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Small Text *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="header_stxt" placeholder="Small Text" required="" value="{{$data->header_stxt}}">
                                      </div>
                                    </div>


                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">Submit</button>
                                      </div>
                                    </div>

                      </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
