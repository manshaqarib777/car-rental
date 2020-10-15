@extends('layouts.load') @section('content')

<div class="content-area">

    <div class="add-product-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-description">
                    <div class="body-area">
                        @include('includes.admin.form-error')
                        <form id="geniusformdata" action="{{route('admin.division2.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body row">
                                <!-- load the view from the application if it exists, otherwise load the one in the package -->

                                <!-- text input -->
                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Local Name</label>
                                    <input type="hidden" name="subadmin1_code" class="form-control" value="{{$code}}">
                                    <input type="hidden" name="country_code" class="form-control" value="{{$code}}">
                                    <input type="text" name="name" value="" placeholder="Local Name" class="form-control">

                                </div>

                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Name</label>

                                    <input type="text" name="asciiname" value="" placeholder="Enter the country name (In English)" class="form-control">

                                </div>

                                <div class="form-group col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="active" value="0">
                                            <input type="checkbox" value="1" name="active"> Active
                                        </label>
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