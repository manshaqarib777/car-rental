<?php $__env->startSection('content'); ?>

    <div class="content-area">
      <div class="row">
        <div class="col-lg-12">
          <?php if(empty(Auth::user()->current_plan)): ?>
            <div class="alert alert-warning" role="alert">
              <p class="mb-0"><?php echo e($langg->lang135); ?>. <strong><?php echo e($langg->lang136); ?></strong> <?php echo e($langg->lang137); ?>. <a class="text-danger" href="<?php echo e(route('user-package')); ?>"><?php echo e($langg->lang138); ?></a>.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
        <div class="row row-cards-one">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mycard bg1">
                        <div class="left">
                            <h5 class="title"><?php echo e($langg->lang78); ?>! </h5>
                            <span class="number"><?php echo e(\App\Models\Car::where('user_id', Auth::user()->id)->count()); ?></span>
                            <a href="<?php echo e(route('user.car.index')); ?>" class="link"><?php echo e($langg->lang1000); ?></a>
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="fas fa-images"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mycard bg2">
                        <div class="left">
                            <h5 class="title"><?php echo e($langg->lang79); ?>!</h5>
                            <span class="number"><?php echo e(\App\Models\Car::where('user_id', Auth::user()->id)->where('featured', 1)->count()); ?></span>
                            <a href="<?php echo e(route('user.car.index', 'featured')); ?>" class="link"><?php echo e($langg->lang1000); ?></a>
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="fas fa-marker"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mycard bg4">
                        <div class="left">
                            <h5 class="title"><?php echo e($langg->lang80); ?>!</h5>
                            <span class="number"><?php echo e(!empty($user->socialsetting) ? ($user->socialsetting->f_status + $user->socialsetting->i_status + $user->socialsetting->g_status + $user->socialsetting->t_status + $user->socialsetting->l_status + $user->socialsetting->d_status) : 0); ?></span>
                            <a href="<?php echo e(route('user-social-index')); ?>" class="link"><?php echo e($langg->lang1000); ?></a>
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="fa fa-link" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                  <div class="row row-cards-one">
                     <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                           <h5 class="card-header"><?php echo e($langg->lang81); ?></h5>
                           <div class="card-body">
                              <div class="table-responsiv  dashboard-home-table">
                                 <div id="poproducts_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row btn-area">
                                       <div class="col-sm-4"></div>
                                       <div class="col-sm-4"></div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <table id="poproducts" class="table table-hover dt-responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid">
                                             <thead>
                                                <tr role="row">
                                                  <th><?php echo e($langg->lang82); ?></th>
                                                  <th><?php echo e($langg->lang83); ?></th>
                                                  <th><?php echo e($langg->lang84); ?></th>
                                                  <th><?php echo e($langg->lang85); ?></th>
                                                  <th><?php echo e($langg->lang86); ?></th>
                                                  <th><?php echo e($langg->lang87); ?></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                               <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <tr>
                                                   <td><?php echo e(strlen($car->title) > 20 ? substr($car->title, 0, 20) . '...' : $car->title); ?></td>
                                                   <td><?php echo e($car->brand->name); ?></td>
                                                   <td><?php echo e($car->brand_model->name); ?></td>
                                                   <td><?php echo e($car->year); ?></td>
                                                   <td>
                                                     <?php
                                                     if ($car->featured == 1) {
                                                       echo '<span class="badge badge-success">'.$langg->lang88 .'</span>';
                                                     } else {
                                                       echo '<span class="badge badge-danger">'.$langg->lang89 .'</span>';
                                                     }
                                                     ?>
                                                   </td>
                                                   <td>
                                                     <div class="action-list"><a href="<?php echo e(route('user.car.edit',$car->id)); ?>" class="edit"> <i class="fas fa-edit"></i><?php echo e($langg->lang90); ?></a></div>
                                                   </td>
                                                 </tr>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-5"></div>
                                       <div class="col-sm-12 col-md-7"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>

            </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>