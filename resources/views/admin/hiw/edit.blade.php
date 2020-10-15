@extends('layouts.load')
@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error') 
                      <form id="geniusformdata" action="{{route('admin-hiw-update',$id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Main Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="mainheading1" placeholder="Main Title First" value="{{$mainheading1 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading1" placeholder="Title First" value="{{$heading1 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description1" placeholder="Description">{{$description1 }}</textarea> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading2" placeholder="Title Second" value="{{$heading2 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description Second*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description2" placeholder="Description Second">{{$description2 }}</textarea> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title Third *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading3" placeholder="Title Third" value="{{$heading3 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description  Third*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description3" placeholder="Description Third">{{$description3 }}</textarea> 
                          </div>
                        </div>




                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Main Title Second *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="mainheading2" placeholder="Main Title First" value="{{$mainheading2 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading11" placeholder="Title First" value="{{$heading11 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description11" placeholder="Description">{{$description11 }}</textarea> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading12" placeholder="Title Second" value="{{$heading12 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description Second*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description12" placeholder="Description Second">{{$description12 }}</textarea> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title Third *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading13" placeholder="Title Third" value="{{$heading13 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description  Third*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description13" placeholder="Description Third">{{$description13 }}</textarea> 
                          </div>
                        </div>





                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Main Title Four *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="mainheading3" placeholder="Main Title Third" value="{{$mainheading3 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading31" placeholder="Title First" value="{{$heading31 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description31" placeholder="Description">{{$description31 }}</textarea> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading32" placeholder="Title Second" value="{{$heading32 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description Second*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description32" placeholder="Description Second">{{$description32 }}</textarea> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title Third *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading33" placeholder="Title Third" value="{{$heading33 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description  Third*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description33" placeholder="Description Third">{{$description33 }}</textarea> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Main Title Third *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="mainheading4" placeholder="Main Title Third" value="{{$mainheading4 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading41" placeholder="Title First" value="{{$heading41 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description41" placeholder="Description">{{$description41 }}</textarea> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title First *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading42" placeholder="Title Second" value="{{$heading42 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description Second*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description42" placeholder="Description Second">{{$description42 }}</textarea> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title Third *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="heading43" placeholder="Title Third" value="{{$heading43 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description  Third*
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" name="description43" placeholder="Description Third">{{$description43 }}</textarea> 
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