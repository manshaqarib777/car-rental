<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('assets/admin/css/jquery.Jcrop.css')); ?>" rel="stylesheet"/>
<link href="<?php echo e(asset('assets/admin/css/Jcrop-style.css')); ?>" rel="stylesheet"/>
<style media="screen">
  .heading {
    font-size: 16px;
  }
  .add-product-content .product-description .body-area .row {
      margin-bottom: 0px;
  }
  .input-field {
      padding-left: 0px;
  }
  select {
    padding-left: 0px;
  }
  .featured-image .span4.cropme {
      width: 300px;
      height: 164px;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading"><?php echo e($langg->lang96); ?> </h4>
                      <ul class="links">
                        <li>
                          <a href="<?php echo e(route('user-dashboard')); ?>"><?php echo e($langg->lang8); ?> </a>
                        </li>
                        <li>
                          <a href="<?php echo e(route('user.car.create')); ?>"><?php echo e($langg->lang96); ?> </a>
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
                        <?php if(empty(Auth::user()->current_plan)): ?>
                          <div class="row mb-4">
                            <div class="col-lg-7 offset-lg-3">
                              <div class="alert alert-warning" role="alert">
                                <p class="mb-0">You haven't bought any package yet. To publish your ad, please buy a package  <a href="<?php echo e(route('user-package')); ?>">. <strong>Click Here</strong></a> to buy a package.</p>
                              </div>
                            </div>
                          </div>
                        <?php else: ?>
                          <div class="row mb-4">
                            <div class="col-lg-7 offset-lg-3">
                              <div class="alert alert-warning" role="alert">
                                <p class="mb-0"><?php echo e($langg->lang97); ?> <strong><?php echo e($boughtPlan->title); ?></strong>.<?php echo e($langg->lang98); ?> <strong><?php echo e(Auth::user()->ads); ?></strong> <?php echo e($langg->lang99); ?>. <?php echo e($langg->lang100); ?> <strong><?php echo e(date('jS M, o', strtotime(Auth::user()->expired_date))); ?> </strong>.
                                </p>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>

                      <div class="gocover" style="background: url(<?php echo e(asset('assets/images/spinner.gif')); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                      <form class="add-form" id="geniusform" action="<?php echo e(route('user.car.store')); ?>" method="POST" enctype="multipart/form-data" novalidate>
                        <?php echo e(csrf_field()); ?>


                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <?php echo $__env->make('includes.admin.form-both', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="heading mb-0"><?php echo e($langg->lang102); ?> *</h4>
                                <input class="input-field" type="text" name="title" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang102); ?>" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                    <h4 class="heading mb-0"><?php echo e($langg->lang103); ?></h4>
                                <select class="searchable-select input-field" name="category_id" onchange="getsubcategories(this.value)">
                                  <option value="Select a brand" disabled selected><?php echo e($langg->lang104); ?></option>
                                  <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>    
                                  </div>
                                  <div class="col-lg-6">
                                    <h4 class="heading mb-0">Sub Category</h4>
                                <select class="searchable-select input-field" name="subcategory_id" id="selectSubCatogories">
                                  <option value="Select a Sub Category" disabled selected>Select a Sub Category</option>
                                  
                                </select>    
                                  </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang105); ?> *</h4>
                                <input class="input-field" type="text" name="currency_code" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang105); ?>" value="">
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang106); ?> *</h4>
                                <input class="input-field" type="text" name="currency_symbol" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang106); ?>" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-3">
                                <h4 class="heading mb-0"><?php echo e($langg->lang107); ?> *</h4>
                                <input class="input-field" type="text" name="regular_price" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang107); ?>" value="">
                              </div>
                              <div class="col-lg-3">
                                <h4 class="heading mb-0"><?php echo e($langg->lang108); ?> </h4>
                                <input class="input-field" type="text" name="sale_price" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang108); ?>" value="">
                              </div>
                              <div class="col-lg-3">
                                <h4 class="heading mb-0"><?php echo e($langg->lang109); ?> </h4>
                                <div class="form-check form-check-inline mt-4">
                                  <input class="form-check-input" type="radio" name="negotiable" id="inlineRadio1" value="1">
                                  <label class="form-check-label" for="inlineRadio1"><?php echo e($langg->lang88); ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="negotiable" id="inlineRadio2" value="0" checked>
                                  <label class="form-check-label" for="inlineRadio2"><?php echo e($langg->lang89); ?></label>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <h4 class="heading mb-0"><?php echo e($langg->lang110); ?> (<?php echo e($langg->lang111); ?>) *</h4>
                                <input class="input-field" type="text" name="top_speed" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang110); ?>" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang112); ?> *</h4>
                                <input class="input-field" type="text" name="year" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang112); ?>" value="">
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang113); ?> *</h4>
                                <input class="input-field" type="text" name="mileage" placeholder="<?php echo e($langg->lang101); ?> <?php echo e($langg->lang113); ?>" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang114); ?> *</h4>
                                <select class="searchable-select input-field" name="brand_id" onchange="getModels(this.value)">
                                  <option value="Select a brand" disabled selected><?php echo e($langg->lang115); ?></option>
                                  <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang116); ?> *</h4>
                                <select class="model searchable-select" name="brand_model_id" id="selectModels">
                                  <option value="Select a model" disabled selected><?php echo e($langg->lang117); ?></option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang118); ?> </h4>
                                <select class="searchable-select input-field" name="body_type_id">
                                  <option value="Select a brand" disabled selected><?php echo e($langg->lang119); ?></option>
                                  <?php $__currentLoopData = $btypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $btype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($btype->id); ?>"><?php echo e($btype->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang120); ?> </h4>
                                <select class="searchable-select input-field" name="fuel_type_id">
                                  <option value="Select a brand" disabled selected><?php echo e($langg->lang121); ?></option>
                                  <?php $__currentLoopData = $ftypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ftype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ftype->id); ?>"><?php echo e($ftype->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang122); ?> </h4>
                                <select class="searchable-select input-field" name="transmission_type_id">
                                  <option value="Select a brand" disabled selected><?php echo e($langg->lang123); ?></option>
                                  <?php $__currentLoopData = $ttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ttype->id); ?>"><?php echo e($ttype->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0"><?php echo e($langg->lang124); ?> *</h4>
                                <select class="searchable-select input-field" name="condtion_id">
                                  <option value="Select a brand" disabled selected><?php echo e($langg->lang125); ?></option>
                                  <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($condition->id); ?>"><?php echo e($condition->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="heading mb-4"><?php echo e($langg->lang126); ?> *</h4>
                                <textarea id="nicDesc" name="description" class="form-control nic-edit" rows="8" cols="80"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>



                          <div class="row images">
                            <div class="col-lg-7 offset-lg-3">
                               <h4 class="heading mb-4"><?php echo e($langg->lang127); ?> *</h4>

                               <div class="uploaded-images" id="uploadedImages" class="mb-4">

                               </div>

                                <div class="panel panel-body">
                                  <div class="span4 cropme text-center">
                                  </div>
                                </div>

                                <a href="javascript:;" class="d-inline-block mybtn1 crop-image mt-2">
                                  <i class="icofont-upload-alt"></i> <?php echo e($langg->lang128); ?>

                                </a>
                                <button id="saveBtn" class="d-none mybtn1 mt-2" type="button" name="button">SAVE TO GALLERY</button>

                            </div>
                          </div>


                          <input type="hidden" id="feature_photo" name="image" value="">


                          <div class="row mt-5 featured-image">
                            <input type="hidden" id="featuredImage" name="featured_image" value="">
                            <div class="col-lg-7 offset-lg-3">
                               <h4 class="heading mb-4"><?php echo e($langg->lang129); ?> *</h4>

                                <div class="panel panel-body">
                                  <div class="span4 cropme text-center">
                                  </div>
                                </div>

                                <a href="javascript:;" class="d-inline-block mybtn1 mt-2 crop-image">
                                  <i class="icofont-upload-alt"></i> <?php echo e($langg->lang128); ?>

                                </a>

                            </div>
                          </div>


                          <div class="row mt-5" id="app">
                            <div class="col-lg-8 offset-lg-3">
                              <h4 class="heading"><?php echo e($langg->lang130); ?> </h4>

                              <div :id="'spec'+n" class="row specs" v-for="n in count">
                                <div class="col-lg-5">
                                  <input type="text" class="input-field" name="label[]" placeholder="<?php echo e($langg->lang131); ?>" required="" value="">
                                </div>
                                <div class="col-lg-5">
                                  <input type="text" class="input-field" name="value[]" placeholder="<?php echo e($langg->lang132); ?>" required="" value="">
                                </div>
                                <div class="col-lg-2">
                                  <button type="button" class="btn btn-danger mt-3" @click="subspec(n)"><i class="fas fa-minus-square text-white"></i></button>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <button type="button" class="btn btn-success mt-4" @click="addspec()"><i class="fas fa-plus-square text-white"></i>&nbsp; <?php echo e($langg->lang133); ?></button>
                                </div>
                              </div>
                            </div>

                            </div>



                          <div class="row">
                            <div class="col-lg-3">
                              <div class="left-area">

                              </div>
                            </div>
                            <div class="col-lg-7 text-center">
                              <button class="addProductSubmit-btn mt-4" type="submit"><?php echo e($langg->lang134); ?></button>
                            </div>
                          </div>
                        </div>

                      </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

  
  <script src="<?php echo e(asset('assets/admin/js/jquery.Jcrop.js')); ?>"></script>
  <script>
    var v_aspX = 730;
    var v_aspY = 489;

    //
    $('.cropme').on('click', function() {
      if ($(this).parents().is('.images')) {
        v_aspX = 730;
        v_aspY = 489;
      }
      else if ($(this).parents().is('.featured-image')) {
        v_aspX = 350;
        v_aspY = 190;
      }
    });
  </script>
  <script src="<?php echo e(asset('assets/admin/js/jquery.SimpleCropper.js')); ?>"></script>

  <script type="text/javascript">
    $('.cropme').simpleCropper();
    $('.crop-image').on('click',function(){
      $(this).siblings('.panel').find('.cropme').click();
    });
  </script>


    <script type="text/javascript">

    function removeimg(e) {
      $( e.target ).parents('.image').remove();
    }

    $(document).ready(function() {

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#saveBtn').on('click', function () {

          $("#saveBtn").toggleClass('d-none');

        	var img = $('#feature_photo').val();
          $(".images .span4.cropme").html('');
          $("#uploadedImages").append(
            `<div class="image">
               <input type="hidden" name="images[]" value="${img}">
               <img src="${img}" alt="" width="200">
               <div class="image-overlay">
                 <i class="fas fa-times" onclick="removeimg(event)"></i>
               </div>
             </div>`
          );

      });

      $('.ok').on('click', function () {

        	var img = $('#feature_photo').val();
          // if featured image preview section contains the preview image then set the input field for featured image
          if ($(".featured-image .span4.cropme").children().is('img') > 0) {
            $("#featuredImage").val(img);
          }

          // if IMAGES preview section contains the preview image then show the SAVE TO GALLERY button
          if ($(".images .span4.cropme").children().is('img') > 0) {
            $("#saveBtn").toggleClass('d-none');
          }

      });

    });

    </script>


    
    <script>
      function getModels(brandid) {
        var url = '<?php echo e(url('/')); ?>' + '/car/'+brandid+'/models';
        // console.log(url);
        $.get(url, function(data) {
          // console.log(data);
          var opts = `<option value="Select a model" disabled="" selected="">Select a model</option>`;
          for (var i = 0; i < data.length; i++) {
            opts += `<option value="${data[i].id}">${data[i].name}</option>`;
          }
          $("#selectModels").html(opts);
        })
      }
      function getsubcategories(cat_id) {
        var url = '<?php echo e(url('/')); ?>' + '/car/'+cat_id+'/getsubcategories';
        // console.log(url);
        $.get(url, function(data) {
          // console.log(data);
          var opts = `<option value="Select a Sub Category" disabled="" selected="">Select a Sub Category</option>`;
          for (var i = 0; i < data.length; i++) {
            opts += `<option value="${data[i].id}">${data[i].name}</option>`;
          }
          $("#selectSubCatogories").html(opts);
        })
      }

    </script>

  <script type="text/javascript">
    $(document).ready(function() {
        $(".myTags").tagit();
    });

    $(document).ready(function() {
        $('.searchable-select').select2();
    });
  </script>

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        count: 0
      },
      methods: {
        addspec() {
          this.count++;
        },
        subspec(n) {
          $("#spec"+n).remove();
        },
        subexspec(n) {
          $("#exspec"+n).remove();
        }
      }
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>