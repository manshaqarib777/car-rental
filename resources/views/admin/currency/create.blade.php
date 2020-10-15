@extends('layouts.load') @section('content')

<div class="content-area">

    <div class="add-product-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-description">
                    <div class="body-area">
                        @include('includes.admin.form-error')
                        <form id="geniusformdata" action="{{route('admin.currency.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body row">
                                <!-- load the view from the application if it exists, otherwise load the one in the package -->

                                <!-- text input -->
                                <div class="form-group col-md-12">
                                    <label>Code (ISO 4217)</label>

                                    <input type="text" name="code" value="" placeholder="Enter the currency code (ISO Code)" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Name</label>

                                    <input type="text" name="name" value="" placeholder="Name" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Html Entity</label>

                                    <input type="text" name="html_entity" value="" placeholder="Enter the html entity code" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Font Arial</label>

                                    <input type="text" name="font_arial" value="" placeholder="Enter the font arial code" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Font Code2000</label>

                                    <input type="text" name="font_code2000" value="" placeholder="Enter the font code2000 code" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Unicode Decimal</label>

                                    <input type="text" name="unicode_decimal" value="" placeholder="Enter the unicode decimal code" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Unicode Hex</label>

                                    <input type="text" name="unicode_hex" value="" placeholder="Enter the unicode hex code" class="form-control">

                                </div>

                                <!-- checkbox field -->
                                <div class="form-group col-md-6" style="margin-top: 20px;">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="in_left" value="0">
                                            <input type="checkbox" value="1" name="in_left"> Symbol in left
                                        </label>

                                    </div>
                                </div>
                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Decimal Places</label>

                                    <input type="text" name="decimal_places" value="" placeholder="Enter the decimal places" class="form-control">

                                    <p class="help-block">Number after decimal. Ex: 2 =&gt; 150.00 [or] 3 =&gt; 150.000</p>
                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Decimal Separator</label>

                                    <input type="text" name="decimal_separator" value="" placeholder="Enter the decimal separator" maxlength="1" class="form-control">

                                    <p class="help-block">Ex: "." =&gt; 150.00 [or] "," =&gt; 150,00</p>
                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Thousand Separator</label>

                                    <input type="text" name="thousand_separator" value="" placeholder="Enter the thousand separator" maxlength="1" class="form-control">

                                    <p class="help-block">Ex: "," =&gt; 150,000.00 [or] whitespace =&gt; 150 000.000</p>
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
<script>
    $(document).ready(function() {
        $('.searchable-select').select2({
            dropdownParent: $('#modal1')
        });

    });
</script>
@endsection