@extends('layouts.admin') @section('content')

<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">Geo Location Informations</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                    </li>
                    <li>
                        <a href="javascript:;">Generel Settings</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-gs-geolocation') }}">Geo Location Informations</a>
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
                        <form action="{{ route('admin-gs-geolocation') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} @include('includes.admin.form-both')

                            <div class="box-body row">
                                <!-- load the view from the application if it exists, otherwise load the one in the package -->

                                <!-- used for heading, separators, etc -->
                                <!-- checkbox field -->
                                <div class="form-group col-md-6" style="margin-top: 20px;">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="geolocation_activation" value="0">
                                            <input type="checkbox" value="1" name="geolocation_activation" {{($data->geolocation_activation==1)?'checked':''}} > Enable Geolocation
                                        </label>

                                        <p class="help-block">Before enabling this option you need to download the Maxmind database by following the documentation <a href="http://support.bedigit.com/help-center/articles/14/enable-the-geo-location" target="_blank">here</a>.</p>
                                    </div>
                                </div>
                                <!-- select2 -->

                                <div class="form-group col-md-6">
                                    <label>Default Country</label>
                                    <select name="default_country_code" style="width: 100%" class="form-control searchable-select">
                                        <option value="Select a Currency Code" disabled selected>Select a Country</option>
                                          @foreach ($countries as $key => $country)
                                            <option value="{{ $country->code }}" {{($data->default_country_code==$country->code)?'selected':'' }}>{{ $country->asciiname }}</option>
                                          @endforeach
                                    </select>

                                </div>

                                <!-- used for heading, separators, etc -->
                                <div class="form-group col-md-12">
                                    <div style="clear: both;"></div>
                                </div>
                                <!-- checkbox field -->
                                <div class="form-group col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="country_flag_activation" value="0">
                                            <input type="checkbox" value="1" name="country_flag_activation" {{($data->geolocation_activation==1)?'checked':''}}> Show country flag on top
                                        </label>

                                        <p class="help-block">
                                            <br>
                                        </p>
                                    </div>
                                </div>
                                <!-- checkbox field -->
                                <div class="form-group col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="local_currency_packages_activation" value="0">
                                            <input type="checkbox" value="1" name="local_currency_packages_activation" {{($data->geolocation_activation==1)?'checked':''}}> Allow users to pay the Packages in their country currency
                                        </label>

                                        <p class="help-block">You have to create a list of <a href="http://threeoption.com/directory/public/admin/package" target="_blank">Packages</a> per currency (using currencies of activated countries) to allow users to pay the Packages in their local currency.
                                            <br>NOTE: By unchecking this field all the lists of Packages (without currency matching) will be shown during the payment process.</p>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-6">
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
<script type="text/javascript">
  $(document).ready(function() {
    $('.searchable-select').select2();
  });
</script>
@endsection