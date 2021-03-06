<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="author" content="GeniusOcean">
    <!-- Title -->
    <title><?php echo e($gs->title); ?></title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/front/images/favicon.png')); ?>" />
    <!-- Bootstrap -->
    <link href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/fontawesome.css')); ?>">
    <!-- icofont -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/icofont.min.css')); ?>">
    <!-- Sidemenu Css -->
    <link href="<?php echo e(asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/admin/plugins/fullside-menu/waves.min.css')); ?>" rel="stylesheet" />

    <link href="<?php echo e(asset('assets/admin/css/plugin.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/admin/css/jquery.tagit.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-coloroicker.css')); ?>">
    <!-- Main Css -->
    <link href="<?php echo e(asset('assets/admin/css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/admin/css/custom.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/admin/css/responsive.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/admin/css/component-custom-switch.min.css')); ?>" rel="stylesheet" /> <?php echo $__env->yieldContent('styles'); ?>
    <script src="<?php echo e(asset('assets/admin/js/vendors/jquery-1.12.4.min.js')); ?>"></script>
</head>

<body>
    <div class="page">
        <div class="page-main">
            <!-- Header Menu Area Start -->
            <div class="header">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="menu-toggle-button">
                            <a class="nav-link" href="javascript:;" id="sidebarCollapse">
                                <div class="my-toggl-icon">
                                    <span class="bar1"></span>
                                    <span class="bar2"></span>
                                    <span class="bar3"></span>
                                </div>
                            </a>
                        </div>

                        <div class="right-eliment">
                            <ul class="list">

                                <li class="login-profile-area">
                                    <a class="dropdown-toggle-1" href="javascript:;">
                                        <div class="user-img">
                                            <img src="<?php echo e(Auth::guard('admin')->user()->photo ? asset('assets/images/admins/'.Auth::guard('admin')->user()->photo ):asset('assets/images/noimage.png')); ?>" alt="">
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdownmenu-wrapper">
                                            <ul>
                                                <h5>Welcome!</h5>
                                                <li>
                                                    <a href="<?php echo e(route('admin.profile')); ?>"><i class="fas fa-user"></i> Edit Profile</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(route('admin.password')); ?>"><i class="fas fa-cog"></i> Change Password</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(route('admin.logout')); ?>"><i class="fas fa-power-off"></i> Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Menu Area End -->
            <div class="wrapper">
                <!-- Side Menu Area Start -->
                <nav id="sidebar" class="nav-sidebar">
                    <ul class="list-unstyled components" id="accordion">
                        <li>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="wave-effect active"><i class="fa fa-home mr-2"></i>Dashbord</a>
                        </li>

                        <li>
                            <a href="#specs" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-cogs"></i>Car Specifications
                            </a>
                            <ul class="collapse list-unstyled" id="specs" data-parent="#accordion">
                                <li>
                                    <a href="<?php echo e(route('admin-cat-index')); ?>"><span>Category Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-subcat-index')); ?>"><span>Sub Category Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-condtion-index')); ?>"><span>Condition Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-brand-index')); ?>"><span>Brand Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-model-index')); ?>"><span>Model Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-body-index')); ?>"><span>Body Type Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-fuel-index')); ?>"><span>Fuel Type Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-transmission-index')); ?>"><span>Transmission Type Management</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo e(route('admin-pricing-index')); ?>" class="wave-effect active"><i class="fas fa-tags"></i> Pricing Ranges</a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('admin-plan-index')); ?>" class="wave-effect active"><i class="fa fa-tasks" aria-hidden="true"></i>Plan Management</a>
                        </li>

                        <li>
                            <a href="#car" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-car"></i> Car Management
                            </a>
                            <ul class="collapse list-unstyled <?php if(request()->path() == 'admin/car'): ?> show  <?php endif; ?>" id="car" data-parent="#accordion">
                                <li class="<?php if(request()->input('type') == 'all'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.car.index') . '?type=all'); ?>"><span>All Cars</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'featured'): ?> active  <?php endif; ?>" class="<?php if(request()->input('type') == 'all'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.car.index') . '?type=featured'); ?>"><span>Featured Cars</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'pending'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.car.index') . '?type=pending'); ?>"><span>Pending Cars</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'published'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.car.index') . '?type=published'); ?>"><span>Published Cars</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'rejected'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.car.index') . '?type=rejected'); ?>"><span>Rejected Cars</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#seller_management" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-users"></i> Users Management
                            </a>
                            <ul class="collapse list-unstyled <?php if(request()->path() == 'admin/individual' || request()->path() == 'admin/company' || request()->path() == 'admin/inspect'): ?> show  <?php endif; ?>" id="seller_management" data-parent="#accordion">
                                <li class="<?php if(request()->input('type') == 'individual'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin-user-index') . '?type=individual'); ?>"><span>Individual</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'company'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin-company-index') . '?type=company'); ?>"><span>Companies</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'inspect'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin-inspect-index') . '?type=inspect'); ?>"><span>Inspectors</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#role" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-car"></i> Access
                            </a>
                            <ul class="collapse list-unstyled <?php if(request()->path() == 'manage/role' || request()->path() == 'roles' || request()->path() == 'permissions'): ?> show  <?php endif; ?>" id="role" data-parent="#accordion">
                                <li class="<?php if(request()->input('type') == 'managerole'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.manage.role') . '?type=managerole'); ?>"><span>Role Managemnet</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'role'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.roles') . '?type=role'); ?>"><span>Roles</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'permission'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.permissions') . '?type=permission'); ?>"><span>Permissions</span></a>
                                </li>
                            </ul>
                        </li>	
                        <li>
                            <a href="#international" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fa fa-globe"></i> International
                            </a>
                            <ul class="collapse list-unstyled <?php if(request()->path() == 'admin/countries' || request()->path() == 'admin/currencies'): ?> show  <?php endif; ?>" id="international" data-parent="#accordion">
                                <li class="<?php if(request()->input('type') == 'country'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.countries') . '?type=country'); ?>"><span>Countries</span></a>
                                </li>
                                <li class="<?php if(request()->input('type') == 'currency'): ?> active  <?php endif; ?>">
                                    <a href="<?php echo e(route('admin.currencies') . '?type=currency'); ?>"><span>Currencies</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-cogs"></i>General Settings
                            </a>
                            <ul class="collapse list-unstyled" id="general" data-parent="#accordion">
                                <li>
                                    <a href="<?php echo e(route('admin-gs-logo')); ?>"><span>Logo</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-gs-fav')); ?>"><span>Favicon</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-gs-load')); ?>"><span>Loader</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-gs-bread')); ?>"><span>Breadcrumb</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-gs-contents')); ?>"><span>Website Contents</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-gs-payment')); ?>"><span>Payment Informations</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-gs-footer')); ?>"><span>Footer</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-gs-socialsetting')); ?>"><span>Social Link Settings</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#homepage" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-home"></i>Home Page Settings
                            </a>
                            <ul class="collapse list-unstyled" id="homepage" data-parent="#accordion">
                                <li>
                                    <a href="<?php echo e(route('admin-ps-header')); ?>"><span>Header Banner</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-ps-featured_cars')); ?>"><span>Featured Cars Section</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-ps-latest_cars')); ?>"><span>Latest Cars Section</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-tstm-index')); ?>"><span>Testimonial Management</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-ps-blogsection')); ?>"><span>Blog Section</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#menu" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="far fa-file"></i>Menu Page Settings
                            </a>
                            <ul class="collapse list-unstyled" id="menu" data-parent="#accordion">
                                <li>
                                    <a href="<?php echo e(route('admin-hiw-index')); ?>"><span>How it Works Page</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-faq-index')); ?>"><span>FAQ Page</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-ps-contact')); ?>"><span>Contact Page</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-page-index')); ?>"><span>Other Pages</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#emails" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-at"></i>Email Settings
                            </a>
                            <ul class="collapse list-unstyled" id="emails" data-parent="#accordion">
                                <li><a href="<?php echo e(route('admin-mail-index')); ?>"><span>Email Template</span></a></li>
                                <li><a href="<?php echo e(route('admin-mail-config')); ?>"><span>Email Configurations</span></a></li>
                                <li><a href="<?php echo e(route('admin-group-show')); ?>"><span>Group Email</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin-lang-edit',1)); ?>"><i class="fas fa-language"></i>Language Settings</a>
                        </li>

                        <li>
                            <a href="#review" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-fw fa-newspaper"></i>Expert Review
                            </a>
                            <ul class="collapse list-unstyled" id="review" data-parent="#accordion">
                                <li>
                                    <a href="<?php echo e(route('admin-cblog-index')); ?>"><span>Categories</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-blog-index')); ?>"><span>Posts</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#seoTools" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-wrench"></i>SEO Tools
                            </a>
                            <ul class="collapse list-unstyled" id="seoTools" data-parent="#accordion">
                                <li>
                                    <a href="<?php echo e(route('admin-seotool-analytics')); ?>"><span>Google Analytics</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin-seotool-keywords')); ?>"><span>Website Meta Keywords</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo e(route('admin-payment-index')); ?>" class="wave-effect active"><i class="fas fa-money-check-alt"></i>Payment History</a>
                        </li>
                    </ul>
                </nav>
                <!-- Main Content Area Start -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- Main Content Area End -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var mainurl = "<?php echo e(url('/')); ?>";
    </script>

    <!-- Dashboard Core -->

    <script src="<?php echo e(asset('assets/admin/js/vendors/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/jqueryui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendors/vue.js')); ?>"></script>
    <!-- Fullside-menu Js-->
    <script src="<?php echo e(asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/plugins/fullside-menu/waves.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/admin/js/plugin.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/tag-it.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/nicEdit.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/notify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/load.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/select2.min.js')); ?>"></script>
    <!-- Custom Js-->
    <script src="<?php echo e(asset('assets/admin/js/custom.js')); ?>"></script>
    <!-- AJAX Js-->
    <script src="<?php echo e(asset('assets/admin/js/myscript.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>