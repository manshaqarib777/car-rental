@extends('layouts.load')

@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')
                      <form id="geniusformdata" action="{{route('admin.manage.role.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Name *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="name" placeholder="Enter Name" required="" value="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Permissions *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            @foreach($permissions as $key => $value)
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="custom-switch custom-switch-label-onoff custom-switch-sm">
                                         <input class="custom-switch-input {{ $errors->has('name') ? ' has-error' : '' }}" id="checkbox-{{$value->id}}" type="checkbox" value="{{$value->id}}" name="permissions[]">
                                        <label class="custom-switch-btn" for="checkbox-{{$value->id}}"></label><br>
                                        
                                    </div>
                                </div>
                                <div class="col-md-9" >
                                  
                                  <label for="checkbox-{{$value->id}}">{{$value->name}}</label>
                                </div>
                            </div>
                        @endforeach
                          </div>
                        </div>
                        <br>
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
