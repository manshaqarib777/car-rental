<?php $__env->startSection('content'); ?>
					<input type="hidden" id="headerdata" value="City">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">Cities</h4>
										<ul class="links">
											<li>
												<a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard </a>
											</li>
											<?php if(!empty($country_code)): ?>
												<li>
													<a href="<?php echo e(route('admin.countries')); ?>">Countries</a>
												</li>
											<?php endif; ?>
											<?php if(!empty($subadmin1_code)): ?>
											<li>
												<a href="<?php echo e(route('admin.division1',$code)); ?>">Division1</a>
											</li>
											<?php endif; ?>
											<?php if(!empty($subadmin2_code)): ?>
											<li>
												<a href="<?php echo e(route('admin.division2',$code)); ?>">Division2</a>
											</li>
											<?php endif; ?>
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
			                        						<th> Code </th>
			                        						<th> Name </th>
			                        						<th> Local Name </th>
			                        						<th>Subadmin1 Code</th>
			                        						<th>Subadmin2 Code</th>
			                        						<th> Status </th>
									                        <th>Action</th>
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
            <p class="text-center">You are about to delete this Country. Everything under this plan will be deleted.</p>
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


<?php $__env->startSection('scripts'); ?>



    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '<?php echo e(route('admin.city.fetch',$code)); ?>',
               columns: [
                  { data: 'country_code', name: 'country_code' },
                  { data: 'name', name: 'name' },
                  { data: 'asciiname', name: 'asciiname' },
                  { data: 'subadmin1_code', name: 'subadmin1_code' },
                  { data: 'subadmin2_code', name: 'subadmin2_code' },
                  { data: 'active', name: 'active' },
                  { data: 'action', name: 'action', searchable: false, orderable: false},
								],
                language : {
                	processing: '<img src="<?php echo e(asset('assets/images/spinner.gif')); ?>">'
                },
					drawCallback : function( settings ) {
		    				$('.select').niceSelect();
					}
      });

      	$(function() {
        $(".btn-area").append('<div class="col-sm-4 table-contents">'+
        	'<a class="add-btn" data-href="<?php echo e(route('admin.city.create',$code)); ?>" id="add-data" data-toggle="modal" data-target="#modal1">'+
          '<i class="fas fa-plus"></i> Add New City'+
          '</a>'+
          '</div>');
      });



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>