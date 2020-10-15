@extends('layouts.load') @section('content')

<div class="content-area">

    <div class="add-product-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-description">
                    <div class="body-area">
                        @include('includes.admin.form-error')
                        <form id="geniusformdata" action="{{route('admin.country.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body row">
                                <!-- load the view from the application if it exists, otherwise load the one in the package -->

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Code</label>

                                    <input type="text" name="code" value="" placeholder="Enter the country code (ISO Code)" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Local Name</label>

                                    <input type="text" name="name" value="" placeholder="Local Name" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Name</label>

                                    <input type="text" name="asciiname" value="" placeholder="Enter the country name (In English)" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Capital (Optional)</label>

                                    <input type="text" name="capital" value="" placeholder="Capital" class="form-control">

                                </div>

                                <!-- select2 -->

                                <div class="form-group col-md-6">
                                    <label>Continent</label>
                                    <select name="continent_code" style="width: 100%" class="form-control searchable-select">
                                        <option value="Select a Continent" disabled selected>Select a Continent</option>
                                          @foreach ($continents as $key => $continent)
                                            <option value="{{ $continent->id }}" {{-- {{($data->continent_id==$continent->id)?'selected':'' }} --}}>{{ $continent->name }}</option>
                                          @endforeach
                                    </select>
                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>TLD (Optional)</label>

                                    <input type="text" name="tld" value="" placeholder="Enter the country tld (E.g. .bj for Benin)" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Phone Ind. (Optional)</label>

                                    <input type="text" name="phone" value="" placeholder="Enter the country phone ind. (E.g. +229 for Benin)" class="form-control">

                                </div>

                                <!-- select2 -->

                                <div class="form-group col-md-6">
                                    <label>Currency Code</label>
                                    <select name="currency_code" style="width: 100%" class="form-control searchable-select">
                                        <option value="Select a Currency Code" disabled selected>Select a Currency Code</option>
                                          @foreach ($currencies as $key => $currency)
                                            <option value="{{ $currency->id }}" {{-- {{($data->currency_id==$currency->id)?'selected':'' }} --}}>{{ $currency->code }}</option>
                                          @endforeach
                                    </select>

                                    <p class="help-block">Default country currency</p>
                                </div>

                                <!-- Wrap the image or canvas element with a block element (container) -->
                                <div class="form-group col-md-12">
                                    <label>Background Image</label>
                                    <input type="file" accept="image/*" id="uploadImage" name="background_image">

                                    <p class="help-block">Choose a picture from your computer.
                                        <br>This picture will override the homepage header background image for this country.</p>
                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Languages</label>

                                    <input type="text" name="languages" value="" placeholder="eg. en,de,fr,it" class="form-control">

                                    <p class="help-block">Enter the <a href="http://threeoption.com/directory/public/admin/languages">languages codes</a> (ISO 639-1) separated by comma.</p>
                                </div>

                                <!-- enum -->
                                <div class="form-group col-md-6">
                                    <label>Administrative Division's Type</label>
                                    <select name="admin_type" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>

                                    <p class="help-block">eg. 0 =&gt; Default value, 1 =&gt; Admin. Division 1, 2 =&gt; Admin. Division 2</p>
                                </div>
                                <!-- checkbox field -->
                                <div class="form-group col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="admin_field_active" value="0">
                                            <input type="checkbox" value="1" name="admin_field_active"> Active Administrative Division's Field
                                        </label>

                                        <p class="help-block">Active the administrative division's field in the items form. You need to set the "Administrative Division's Type" to 1 or 2.</p>
                                    </div>
                                </div>
                            </div>
                            {{--
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">Code *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="input-field" name="name" placeholder="Enter Name" required="" value="">
                                </div>
                            </div>
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
                                        <h4 class="heading">Name *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="input-field" name="name" placeholder="Enter Name" required="" value="">
                                </div>
                            </div> --}}
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
<script>
        $(document).ready(function() {
            $('.searchable-select').select2(
                {
                    dropdownParent: $('#modal1')
                });

        });
</script>
@endsection