<?php $__env->startSection('content'); ?>
<input type="hidden" id="headerdata" value="CATGORY">
<div class="content-area">
   <div class="mr-breadcrumb">
      <div class="row">
         <div class="col-lg-12">
            <h4 class="heading"><?php echo e($langg->lang91); ?></h4>
            <ul class="links">
               <li>
                  <a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e($langg->lang8); ?> </a>
               </li>
               <li>
                  <a href="#"><?php echo e($langg->lang92); ?></a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <div class="product-area">
      <div class="row">
         <div class="col-lg-12">
            <div class="mr-table allproduct">
               <?php echo $__env->make('includes.admin.form-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
               <div class="table-responsiv">
                  <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th><?php echo e($langg->lang82); ?></th>
                           <th><?php echo e($langg->lang83); ?></th>
                           <th><?php echo e($langg->lang84); ?></th>
                           <th><?php echo e($langg->lang85); ?></th>
                           <th><?php echo e($langg->lang86); ?></th>
                           <th><?php echo e($langg->lang93); ?></th>
                           <th><?php echo e($langg->lang87); ?></th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="submit-loader">
            <img  src="<?php echo e(asset('assets/images/spinner.gif')); ?>" alt="">
         </div>
         <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header d-block text-center">
            <h4 class="modal-title d-inline-block">Confirm Delete</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <p class="text-center">You are about to delete this Category. Everything under this category will be deleted.</p>
            <p class="text-center">Do you want to proceed?</p>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger btn-ok">Delete</a>
         </div>
      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>

<?php
  $type = Request::route('type');
?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
  var table = $('#geniustable').DataTable({
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: '<?php echo e(route('user.car.datatables').'?type='.$type); ?>',
      columns: [{
              data: 'title',
              name: 'title'
          },
          {
              data: 'brand',
              name: 'brand'
          },
          {
              data: 'model',
              name: 'model'
          },
          {
              data: 'year',
              name: 'year'
          },
          {
              data: 'featured',
              searchable: false,
              orderable: false
          },
          {
              data: 'status',
              searchable: false,
              orderable: false
          },
          {
              data: 'action',
              searchable: false,
              orderable: false
          }

      ],
      language: {
          processing: '<img src="<?php echo e(asset('assets/images/spinner.gif')); ?>">'
      },
      drawCallback: function(settings) {
          $('.select').niceSelect();
      }
  });
   

   $(document).ready(function() {
      $("#geniustable_filter").parent().addClass("offset-md-4")
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>