<?php

// ************************************ CRON JOBS **********************************************
Route::get('/checkvalidity', 'Front\FrontendController@checkvalidity')->name('front.checkvalidity');
// ************************************ CRON JOBS **********************************************


// Route::get( '/login', 'Admin\Auth0IndexController@login')->name('login');
// Route::get( '/logout', 'Admin\Auth0IndexController@logout' )->name('user-logout');
// Route::get( '/check', 'Admin\Auth0IndexController@index');
// Route::get( '/admin/login', 'Admin\Auth0IndexController@login');
// Route::get( '/admin/logout', 'Admin\Auth0IndexController@logout' )->name('admin.logout');
// Route::get( '/admin/updatepassword', 'Admin\Auth0IndexController@updatepassword' )->name( 'updatepassword' )->middleware('auth');
// Route::get('/admin/callback', '\Auth0\Login\Auth0Controller@callback');


// ************************************ ADMIN SECTION **********************************************

Route::prefix('admin')->group(function() {

  //------------ ADMIN LOGIN SECTION ------------

   Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
   Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
   Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
   Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

  //------------ ADMIN LOGIN SECTION ENDS ------------


  //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
  Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
  Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
  Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::post('/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');
  Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');
  //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------



  //------------ ADMIN BLOG SECTION ------------

  Route::get('/blog/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
  Route::get('/blog', 'Admin\BlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'Admin\BlogController@create')->name('admin-blog-create');
  Route::get('/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/create', 'Admin\BlogController@store')->name('admin-blog-store');
  Route::post('/blog/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');
  Route::get('/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete');

  Route::get('/blog/category/datatables', 'Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
  Route::get('/blog/category', 'Admin\BlogCategoryController@index')->name('admin-cblog-index');
  Route::get('/blog/category/create', 'Admin\BlogCategoryController@create')->name('admin-cblog-create');
  Route::get('/blog/category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
  Route::post('/blog/category/create', 'Admin\BlogCategoryController@store')->name('admin-cblog-store');
  Route::post('/blog/category/edit/{id}', 'Admin\BlogCategoryController@update')->name('admin-cblog-update');
  Route::get('/blog/category/delete/{id}', 'Admin\BlogCategoryController@destroy')->name('admin-cblog-delete');


  //------------ ADMIN BLOG SECTION ENDS ------------



  //------------ ADMIN CATEGORY SECTION ------------

  Route::get('/category/datatables/{type}', 'Admin\CategoryController@datatables')->name('admin-cat-datatables'); //JSON REQUEST
  Route::get('/category', 'Admin\CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'Admin\CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'Admin\CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-cat-delete');
  Route::get('/category/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-cat-status');


  Route::get('/subcategory/datatables/{type}', 'Admin\SubcategoryController@datatables')->name('admin-subcat-datatables'); //JSON REQUEST
  Route::get('/subcategory', 'Admin\SubcategoryController@index')->name('admin-subcat-index');
  Route::get('/subcategory/create', 'Admin\SubcategoryController@create')->name('admin-subcat-create');
  Route::post('/subcategory/create', 'Admin\SubcategoryController@store')->name('admin-subcat-store');
  Route::get('/subcategory/edit/{id}', 'Admin\SubcategoryController@edit')->name('admin-subcat-edit');
  Route::post('/subcategory/edit/{id}', 'Admin\SubcategoryController@update')->name('admin-subcat-update');
  Route::get('/subcategory/delete/{id}', 'Admin\SubcategoryController@destroy')->name('admin-subcat-delete');
  Route::get('/subcategory/status/{id1}/{id2}', 'Admin\SubcategoryController@status')->name('admin-subcat-status');

  //------------ ADMIN CATEGORY SECTION ENDS------------


  //------------ ADMIN BRAND SECTION ------------

  Route::get('/brand/datatables', 'Admin\BrandController@datatables')->name('admin-brand-datatables'); //JSON REQUEST
  Route::get('/brand', 'Admin\BrandController@index')->name('admin-brand-index');
  Route::get('/brand/create', 'Admin\BrandController@create')->name('admin-brand-create');
  Route::post('/brand/create', 'Admin\BrandController@store')->name('admin-brand-store');
  Route::get('/brand/edit/{id}', 'Admin\BrandController@edit')->name('admin-brand-edit');
  Route::post('/brand/edit/{id}', 'Admin\BrandController@update')->name('admin-brand-update');
  Route::get('/brand/delete/{id}', 'Admin\BrandController@destroy')->name('admin-brand-delete');
  Route::get('/brand/status/{id1}/{id2}', 'Admin\BrandController@status')->name('admin-brand-status');

  //------------ ADMIN BRAND SECTION ENDS------------


  //------------ ADMIN MODEL SECTION ------------

  Route::get('/model/datatables', 'Admin\ModelController@datatables')->name('admin-model-datatables'); //JSON REQUEST
  Route::get('/model', 'Admin\ModelController@index')->name('admin-model-index');
  Route::get('/model/create', 'Admin\ModelController@create')->name('admin-model-create');
  Route::post('/model/create', 'Admin\ModelController@store')->name('admin-model-store');
  Route::get('/model/edit/{id}', 'Admin\ModelController@edit')->name('admin-model-edit');
  Route::post('/model/edit/{id}', 'Admin\ModelController@update')->name('admin-model-update');
  Route::get('/model/delete/{id}', 'Admin\ModelController@destroy')->name('admin-model-delete');
  Route::get('/model/status/{id1}/{id2}', 'Admin\ModelController@status')->name('admin-model-status');

  //------------ ADMIN MODEL SECTION ENDS------------


  //------------ ADMIN BODY TYPE SECTION ------------

  Route::get('/body/datatables', 'Admin\BodyController@datatables')->name('admin-body-datatables'); //JSON REQUEST
  Route::get('/body', 'Admin\BodyController@index')->name('admin-body-index');
  Route::get('/body/create', 'Admin\BodyController@create')->name('admin-body-create');
  Route::post('/body/create', 'Admin\BodyController@store')->name('admin-body-store');
  Route::get('/body/edit/{id}', 'Admin\BodyController@edit')->name('admin-body-edit');
  Route::post('/body/edit/{id}', 'Admin\BodyController@update')->name('admin-body-update');
  Route::get('/body/delete/{id}', 'Admin\BodyController@destroy')->name('admin-body-delete');
  Route::get('/body/status/{id1}/{id2}', 'Admin\BodyController@status')->name('admin-body-status');

  //------------ ADMIN BODY TYPE SECTION ENDS------------

  //------------ ADMIN FUEL TYPE SECTION ------------

  Route::get('/fuel/datatables', 'Admin\FuelController@datatables')->name('admin-fuel-datatables'); //JSON REQUEST
  Route::get('/fuel', 'Admin\FuelController@index')->name('admin-fuel-index');
  Route::get('/fuel/create', 'Admin\FuelController@create')->name('admin-fuel-create');
  Route::post('/fuel/create', 'Admin\FuelController@store')->name('admin-fuel-store');
  Route::get('/fuel/edit/{id}', 'Admin\FuelController@edit')->name('admin-fuel-edit');
  Route::post('/fuel/edit/{id}', 'Admin\FuelController@update')->name('admin-fuel-update');
  Route::get('/fuel/delete/{id}', 'Admin\FuelController@destroy')->name('admin-fuel-delete');
  Route::get('/fuel/status/{id1}/{id2}', 'Admin\FuelController@status')->name('admin-fuel-status');

  //------------ ADMIN FUEL TYPE SECTION ENDS------------


  //------------ ADMIN TRANSMISSION TYPE SECTION ------------

  Route::get('/transmission/datatables', 'Admin\TransmissionController@datatables')->name('admin-transmission-datatables'); //JSON REQUEST
  Route::get('/transmission', 'Admin\TransmissionController@index')->name('admin-transmission-index');
  Route::get('/transmission/create', 'Admin\TransmissionController@create')->name('admin-transmission-create');
  Route::post('/transmission/create', 'Admin\TransmissionController@store')->name('admin-transmission-store');
  Route::get('/transmission/edit/{id}', 'Admin\TransmissionController@edit')->name('admin-transmission-edit');
  Route::post('/transmission/edit/{id}', 'Admin\TransmissionController@update')->name('admin-transmission-update');
  Route::get('/transmission/delete/{id}', 'Admin\TransmissionController@destroy')->name('admin-transmission-delete');
  Route::get('/transmission/status/{id1}/{id2}', 'Admin\TransmissionController@status')->name('admin-transmission-status');

  //------------ ADMIN TRANSMISSION TYPE SECTION ENDS------------


  //------------ ADMIN CONDITION SECTION ------------

  Route::get('/condtion/datatables', 'Admin\ConditionController@datatables')->name('admin-condtion-datatables'); //JSON REQUEST
  Route::get('/condtion', 'Admin\ConditionController@index')->name('admin-condtion-index');
  Route::get('/condtion/create', 'Admin\ConditionController@create')->name('admin-condtion-create');
  Route::post('/condtion/create', 'Admin\ConditionController@store')->name('admin-condtion-store');
  Route::get('/condtion/edit/{id}', 'Admin\ConditionController@edit')->name('admin-condtion-edit');
  Route::post('/condtion/edit/{id}', 'Admin\ConditionController@update')->name('admin-condtion-update');
  Route::get('/condtion/delete/{id}', 'Admin\ConditionController@destroy')->name('admin-condtion-delete');
  Route::get('/condtion/status/{id1}/{id2}', 'Admin\ConditionController@status')->name('admin-condtion-status');

  //------------ ADMIN CONDITION SECTION ENDS------------


  //------------ ADMIN PRICING RANGE SECTION ------------

  Route::get('/pricing/datatables', 'Admin\PricingController@datatables')->name('admin-pricing-datatables'); //JSON REQUEST
  Route::get('/pricing', 'Admin\PricingController@index')->name('admin-pricing-index');
  Route::get('/pricing/create', 'Admin\PricingController@create')->name('admin-pricing-create');
  Route::post('/pricing/create', 'Admin\PricingController@store')->name('admin-pricing-store');
  Route::get('/pricing/edit/{id}', 'Admin\PricingController@edit')->name('admin-pricing-edit');
  Route::post('/pricing/edit/{id}', 'Admin\PricingController@update')->name('admin-pricing-update');
  Route::get('/pricing/delete/{id}', 'Admin\PricingController@destroy')->name('admin-pricing-delete');
  Route::get('/pricing/status/{id1}/{id2}', 'Admin\PricingController@status')->name('admin-pricing-status');

  //------------ ADMIN PRICING RANGE SECTION ENDS------------


  //------------ ADMIN SUBSCRIPTION PLAN SECTION ------------

  Route::get('/plan/datatables', 'Admin\PlanController@datatables')->name('admin-plan-datatables'); //JSON REQUEST
  Route::get('/plan', 'Admin\PlanController@index')->name('admin-plan-index');
  Route::get('/plan/create', 'Admin\PlanController@create')->name('admin-plan-create');
  Route::post('/plan/create', 'Admin\PlanController@store')->name('admin-plan-store');
  Route::get('/plan/edit/{id}', 'Admin\PlanController@edit')->name('admin-plan-edit');
  Route::post('/plan/edit/{id}', 'Admin\PlanController@update')->name('admin-plan-update');
  Route::get('/plan/delete/{id}', 'Admin\PlanController@destroy')->name('admin-plan-delete');
  Route::get('/plan/status/{id1}/{id2}', 'Admin\PlanController@status')->name('admin-plan-status');

  //------------ ADMIN SUBSCRIPTION PLAN SECTION ENDS------------


  //------------ ADMIN CAR MANAGEMENT SECTION ------------
  Route::get('/car/datatables/{type}', 'Admin\CarController@datatables')->name('admin.car.datatables'); //JSON REQUEST
  Route::get('/car', 'Admin\CarController@index')->name('admin.car.index');
  Route::get('/car/{brandid}/models', 'Admin\CarController@getmodels')->name('admin.car.getmodels');
  Route::post('/car/upload', 'Admin\CarController@upload')->name('admin.car.upload');
  Route::post('/car/store', 'Admin\CarController@store')->name('admin.car.store');
  Route::get('/car/{id}/edit', 'Admin\CarController@edit')->name('admin.car.edit');
  Route::post('/car/update', 'Admin\CarController@update')->name('admin.car.update');
  Route::get('/car/delete/{id}', 'Admin\CarController@destroy')->name('admin.car.delete');
  Route::get('/car/status/{id1}/{id2}', 'Admin\CarController@status')->name('admin.car.status');
  Route::get('/car/featured/{id1}/{id2}', 'Admin\CarController@featured')->name('admin.car.featured');
  //------------ ADMIN CAR MANAGEMENT SECTION ENDS ------------


  //------------ ADMIN USER MANAGEMENT SECTION ------------

  Route::get('/individual/datatables', 'Admin\UserController@datatables')->name('admin-user-datatables'); //JSON REQUEST
  Route::get('/individual', 'Admin\UserController@index')->name('admin-user-index');
  Route::get('/individual/edit/{id}', 'Admin\UserController@edit')->name('admin-user-edit');
  Route::post('/individual/update', 'Admin\UserController@update')->name('admin-user-update');
  Route::post('/individual/upload', 'Admin\UserController@uploadPropic')->name('admin-user-propic-upload');
  Route::get('/individual/status/{id1}/{id2}', 'Admin\UserController@status')->name('admin-user-status');

  Route::get('/company/datatables', 'Admin\CompanyController@datatables')->name('admin-company-datatables'); //JSON REQUEST
  Route::get('/company', 'Admin\CompanyController@index')->name('admin-company-index');
  Route::get('/company/edit/{id}', 'Admin\CompanyController@edit')->name('admin-company-edit');
  Route::post('/company/update', 'Admin\CompanyController@update')->name('admin-company-update');
  Route::post('/company/upload', 'Admin\CompanyController@uploadPropic')->name('admin-company-propic-upload');
  Route::get('/company/status/{id1}/{id2}', 'Admin\CompanyController@status')->name('admin-company-status');
  Route::get('/company/featured/{id1}/{id2}', 'Admin\CompanyController@featured')->name('admin.company.featured');

  Route::get('/inspect/datatables', 'Admin\InspectController@datatables')->name('admin-inspect-datatables'); //JSON REQUEST
  Route::get('/inspect', 'Admin\InspectController@index')->name('admin-inspect-index');
  Route::get('/inspect/edit/{id}', 'Admin\InspectController@edit')->name('admin-inspect-edit');
  Route::post('/inspect/update', 'Admin\InspectController@update')->name('admin-inspect-update');
  Route::post('/inspect/upload', 'Admin\InspectController@uploadPropic')->name('admin-inspect-propic-upload');
  Route::get('/inspect/status/{id1}/{id2}', 'Admin\InspectController@status')->name('admin-inspect-status');

  //------------ ADMIN USER MANAGEMENT ENDS------------


  //------------ ADMIN TRANSACTION LOG ------------

  Route::get('/payment/datatables', 'Admin\TransactionController@datatables')->name('admin-payment-datatables'); //JSON REQUEST
  Route::get('/payment', 'Admin\TransactionController@index')->name('admin-payment-index');

  //------------ ADMIN TRANSACTION LOG------------


  //------------ ADMIN GENERAL SETTINGS SECTION ------------

  Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
  Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
  Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');
  Route::get('/general-settings/breadcrumb', 'Admin\GeneralSettingController@bread')->name('admin-gs-bread');
  Route::get('/general-settings/contents', 'Admin\GeneralSettingController@contents')->name('admin-gs-contents');
  Route::get('/general-settings/payment', 'Admin\GeneralSettingController@payment')->name('admin-gs-payment');
  Route::get('/general-settings/geolocation', 'Admin\GeneralSettingController@geolocation')->name('admin-gs-geolocation');
  Route::post('/general-settings/geolocation', 'Admin\GeneralSettingController@updategeolocation')->name('admin-gs-geolocation');
  Route::get('/general-settings/socialsetting', 'Admin\GeneralSettingController@socialsetting')->name('admin-gs-socialsetting');
  Route::get('/footer', 'Admin\GeneralSettingController@footer')->name('admin-gs-footer');


  Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');


  Route::get('/general-settings/disqus/{status}', 'Admin\GeneralSettingController@isdisqus')->name('admin-gs-isdisqus');
  Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader');
  Route::get('/general-settings/aloader/{status}', 'Admin\GeneralSettingController@isaloader')->name('admin-gs-isaloader');
  Route::get('/general-settings/talkto/{status}', 'Admin\GeneralSettingController@talkto')->name('admin-gs-talkto');
  //------------ ADMIN GENERAL SETTINGS JSON SECTION ------------


  //------------ ADMIN TESTIMONIAL SECTION ------------

  Route::get('/testimonial/datatables', 'Admin\TestimonialController@datatables')->name('admin-tstm-datatables');
  Route::get('/testimonial', 'Admin\TestimonialController@index')->name('admin-tstm-index');
  Route::get('/testimonial/create', 'Admin\TestimonialController@create')->name('admin-tstm-create');
  Route::post('/testimonial/create', 'Admin\TestimonialController@store')->name('admin-tstm-store');
  Route::get('/testimonial/edit/{id}', 'Admin\TestimonialController@edit')->name('admin-tstm-edit');
  Route::post('/testimonial/edit/{id}', 'Admin\TestimonialController@update')->name('admin-tstm-update');
  Route::get('/testimonial/delete/{id}', 'Admin\TestimonialController@destroy')->name('admin-tstm-delete');
  Route::get('/testimonial/status/{id1}/{id2}', 'Admin\TestimonialController@status')->name('admin-tstm-status');

  //------------ ADMIN TESTIMONIAL SECTION ENDS------------

  //------------ ADMIN PAGE SETTINGS SECTION ------------

  Route::get('/header', 'Admin\PageSettingController@header_banner')->name('admin-ps-header');
  Route::get('/featured-cars', 'Admin\PageSettingController@featured_cars')->name('admin-ps-featured_cars');
  Route::get('/latest-cars', 'Admin\PageSettingController@latest_cars')->name('admin-ps-latest_cars');
  Route::get('/blog-section', 'Admin\PageSettingController@blogsection')->name('admin-ps-blogsection');
  Route::get('/contact', 'Admin\PageSettingController@contact')->name('admin-ps-contact');
  Route::get('/iscontact/{status}', 'Admin\PageSettingController@iscontact')->name('admin-ps-iscontact');
  Route::post('/page-settings/update/all', 'Admin\PageSettingController@update')->name('admin-ps-update');
  Route::post('/page-settings/update/contact', 'Admin\PageSettingController@upcontact')->name('admin-ps-upcontact');
  //------------ ADMIN PAGE SETTINGS SECTION ENDS ------------


  //------------ ADMIN EMAIL SETTINGS SECTION ------------

  Route::get('/email-templates/datatables', 'Admin\EmailController@datatables')->name('admin-mail-datatables');
  Route::get('/email-templates', 'Admin\EmailController@index')->name('admin-mail-index');
  Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
  Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
  Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
  Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
  Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
  Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');

  //------------ ADMIN EMAIL SETTINGS SECTION ENDS ------------


  //------------ ADMIN FAQ SECTION ------------

  Route::get('/faq/datatables', 'Admin\FaqController@datatables')->name('admin-faq-datatables'); //JSON REQUEST
  Route::get('/faq', 'Admin\FaqController@index')->name('admin-faq-index');
  Route::get('/faq/create', 'Admin\FaqController@create')->name('admin-faq-create');
  Route::post('/faq/create', 'Admin\FaqController@store')->name('admin-faq-store');
  Route::get('/faq/edit/{id}', 'Admin\FaqController@edit')->name('admin-faq-edit');
  Route::post('/faq/update/{id}', 'Admin\FaqController@update')->name('admin-faq-update');
  Route::get('/faq/delete/{id}', 'Admin\FaqController@destroy')->name('admin-faq-delete');
  Route::get('/general-settings/faq/{status}', 'Admin\FaqController@isfaq')->name('admin-isfaq');



  Route::get('/howitworks/datatables', 'Admin\HiwController@datatables')->name('admin-hiw-datatables'); //JSON REQUEST
  Route::get('/hiw', 'Admin\HiwController@index')->name('admin-hiw-index');
  Route::get('/howitworks/create', 'Admin\HiwController@create')->name('admin-hiw-create');
  Route::post('/howitworks/create', 'Admin\HiwController@store')->name('admin-hiw-store');
  Route::get('/howitworks/edit/{id}', 'Admin\HiwController@edit')->name('admin-hiw-edit');
  Route::post('/howitworks/update/{id}', 'Admin\HiwController@update')->name('admin-hiw-update');
  Route::get('/howitworks/delete/{id}', 'Admin\HiwController@destroy')->name('admin-hiw-delete');
  Route::get('/general-settings/howitworks/{status}', 'Admin\HiwController@ishiw')->name('admin-ishiw');

  //------------ ADMIN FAQ SECTION ENDS ------------


  //------------ ADMIN PAGE SECTION ------------

  Route::get('/page/datatables', 'Admin\PageController@datatables')->name('admin-page-datatables'); //JSON REQUEST
  Route::get('/page', 'Admin\PageController@index')->name('admin-page-index');
  Route::get('/page/create', 'Admin\PageController@create')->name('admin-page-create');
  Route::post('/page/create', 'Admin\PageController@store')->name('admin-page-store');
  Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('admin-page-edit');
  Route::post('/page/update/{id}', 'Admin\PageController@update')->name('admin-page-update');
  Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
  Route::get('/page/header/{id1}/{id2}', 'Admin\PageController@header')->name('admin-page-header');
  Route::get('/page/footer/{id1}/{id2}', 'Admin\PageController@footer')->name('admin-page-footer');

  //------------ ADMIN PAGE SECTION ENDS------------


  //------------ ADMIN SOCIAL SETTINGS SECTION ------------

  Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
  Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');

  //------------ ADMIN SOCIAL SETTINGS SECTION ENDS------------


  //------------ ADMIN LANGUAGE SETTINGS SECTION ------------

  Route::get('/languages/datatables', 'Admin\LanguageController@datatables')->name('admin-lang-datatables'); //JSON REQUEST
  Route::get('/languages', 'Admin\LanguageController@index')->name('admin-lang-index');
  Route::get('/languages/create', 'Admin\LanguageController@create')->name('admin-lang-create');
  Route::get('/languages/edit/{id}', 'Admin\LanguageController@edit')->name('admin-lang-edit');
  Route::post('/languages/create', 'Admin\LanguageController@store')->name('admin-lang-store');
  Route::get('/languages/status/{id1}/{id2}', 'Admin\LanguageController@status')->name('admin-lang-st');
  Route::get('/languages/delete/{id}', 'Admin\LanguageController@destroy')->name('admin-lang-delete');
  Route::post('/languages/edit/{id}', 'Admin\LanguageController@update')->name('admin-lang-update');

  //------------ ADMIN LANGUAGE SETTINGS SECTION ENDS ------------

  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  Route::get('/seotools/analytics', 'Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::get('/seotools/keywords', 'Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/analytics/update', 'Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::post('/seotools/keywords/update', 'Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------


});


// ************************************ ADMIN SECTION ENDS**********************************************




// ************************************ USER SECTION STARTS **********************************************
Route::group(['middleware' => 'auth'], function() {
  // User Dashboard
  Route::get('/dashboard', 'User\UserController@index')->name('user-dashboard');

  // User Logout
  Route::get('/logout', 'User\LoginController@logout')->name('user-logout');
  // User Logout Ends


  //------------ USER CAR MANAGEMENT SECTION ------------
  Route::get('/car/datatables', 'User\CarController@datatables')->name('user.car.datatables'); //JSON REQUEST
  Route::get('/car/index/{type?}', 'User\CarController@index')->name('user.car.index');
  Route::get('/car/create', 'User\CarController@create')->name('user.car.create');
  Route::get('/car/{brandid}/models', 'User\CarController@getmodels')->name('user.car.getmodels');
  Route::get('/car/{cat_id}/getsubcategories', 'User\CarController@getsubcategories')->name('user.car.getsubcategories');
  Route::post('/car/upload', 'User\CarController@upload')->name('user.car.upload');
  Route::post('/car/store', 'User\CarController@store')->name('user.car.store');
  Route::get('/car/{id}/edit', 'User\CarController@edit')->name('user.car.edit');
  Route::post('/car/update', 'User\CarController@update')->name('user.car.update');
  Route::get('/car/delete/{id}', 'User\CarController@destroy')->name('user.car.delete');
  Route::get('/car/status/{id1}/{id2}', 'User\CarController@status')->name('user.car.status');
  //------------ USER CAR MANAGEMENT SECTION ENDS ------------


  //------------ USER PROFILE SETTINGS SECTION ------------
  Route::get('/profile', 'User\ProfileController@edit')->name('user.profile');
  Route::post('/profile/update', 'User\ProfileController@update')->name('user.profile.update');
  Route::post('/upload/propic', 'User\ProfileController@uploadPropic')->name('user-propic-upload');
  //------------ USER PROFILE SETTINGS SECTION ENDS ------------


  //------------ USER PASSWORD SETTINGS SECTION ------------
  Route::get('/password', 'User\PasswordController@changepass')->name('user.password');
  Route::post('/password/update', 'User\PasswordController@uppass')->name('user.password.update');
  //------------ USER PASSWORD SETTINGS SECTION ENDS ------------


  //------------ USER GALLERY SETTINGS SECTION -----------
  Route::get('/gallery/datatables', 'User\GalleryController@datatables')->name('user-gal-datatables');
  Route::get('/gallery', 'User\GalleryController@index')->name('user-gal-index');
  Route::get('/gallery/create', 'User\GalleryController@create')->name('user-gal-create');
  Route::get('/gallery/edit/{id}', 'User\GalleryController@edit')->name('user-gal-edit');
  Route::post('/gallery/create', 'User\GalleryController@store')->name('user-gal-store');
  Route::post('/gallery/edit/{id}', 'User\GalleryController@update')->name('user-gal-update');
  Route::get('/gallery/delete/{id}', 'User\GalleryController@destroy')->name('user-gal-delete');
  //------------ USER GALLERY SETTINGS SECTION ENDS ------------


  //------------ USER SKILLS SECTION ------------
  Route::get('/skill/datatables', 'User\SkillController@datatables')->name('user-skill-datatables'); //JSON REQUEST
  Route::get('/skill', 'User\SkillController@index')->name('user-skill-index');
  Route::get('/skill/create', 'User\SkillController@create')->name('user-skill-create');
  Route::get('/skill/edit/{id}', 'User\SkillController@edit')->name('user-skill-edit');
  Route::post('/skill/create', 'User\SkillController@store')->name('user-skill-store');
  Route::post('/skill/edit/{id}', 'User\SkillController@update')->name('user-skill-update');
  Route::get('/skill/delete/{id}', 'User\SkillController@destroy')->name('user-skill-delete');
  //------------ USER SKILLS SECTION ENDS ------------


  //------------ USER SOCIAL SETTINGS SECTION ------------
  Route::get('/social', 'User\SocialSettingController@index')->name('user-social-index');
  Route::post('/social/update', 'User\SocialSettingController@socialupdate')->name('user-social-update');
  //------------ USER SOCIAL SETTINGS SECTION ENDS------------

  // User Subscription
  Route::get('/package', 'User\PackageController@package')->name('user-package');
  Route::get('/subscription/{id}', 'User\PackageController@selectPayment')->name('user-select-payment');
  Route::post('/vendor-request', 'User\PackageController@vendorrequestsub')->name('user-vendor-request-submit');
  Route::post('/paypal/submit', 'User\PaypalController@storetodb')->name('user.paypal.storetodb');
  Route::post('/stripe-submit', 'User\StripeController@payWithStripe')->name('stripe.submit');
  Route::post('/freepublish', 'User\PackageController@freePublish')->name('user.freepublish');
});

Route::group(['middleware' => 'guest'], function() {
  // USER REGISTRATION STARTS
  Route::get('/register', 'User\RegisterController@showform')->name('user.login-signup');
  Route::post('/register', 'User\RegisterController@register')->name('user.reg.submit');
  Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
  Route::get('/refresh_code','User\RegisterController@refresh_code');
  // USER REGISTRATION ENDS

  // Email Verification
  Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
});

// ************************************ USER SECTION ENDS **********************************************




// ************************************ FRONT SECTION **********************************************
Route::get('/', 'Front\FrontendController@home')->name('front.index');
Route::get('/prices/{id}', 'Front\FrontendController@prices')->name('front.prices');
Route::get('/cars', 'Front\FrontendController@cars')->name('front.cars');
Route::get('/details/{car}', 'Front\FrontendController@details')->name('front.details');

Route::post('/rating/{id}', 'Admin\CarController@postStar')->name('carReview');





Route::post('/model/sendmail', 'Front\FrontendController@modelsendmail')->name('front.model.sendmail');
Route::get('/contact', 'Front\FrontendController@contact')->name('front.contact');
Route::get('/inspect', 'Front\FrontendController@inspect')->name('front.inspect');
Route::get('front/car/{carid}', 'Front\FrontendController@getCar')->name('front.car');
Route::post('/sendmail', 'Front\FrontendController@sendmail')->name('front.sendmail');
Route::post('/sendmailtoinspector', 'Front\FrontendController@sendmailtoinspector')->name('front.sendmailtoinspector');
Route::get('/faq', 'Front\FrontendController@faq')->name('front.faq');
Route::get('/hiw', 'Front\FrontendController@hiw')->name('front.hiw');


// Dynamic Page
Route::get('/{slug}/pages', 'Front\FrontendController@dynamicPage')->name('front.dynamicPage');
// Dynamic Page


// User Forgot
Route::get('/forgot', 'Front\ForgotController@showforgotform')->name('front-forgot');
Route::post('/forgot', 'Front\ForgotController@forgot')->name('front-forgot-submit');
// User Forgot Ends

// BLOG SECTION
Route::get('/review','Front\FrontendController@blog')->name('front.blog');
Route::get('/comparison/cars','Front\FrontendController@comparison')->name('front.comparison');
Route::get('/comparison/details/cars','Front\FrontendController@comparisondetails')->name('front.comparison.details');
Route::get('/blog/{id}','Front\FrontendController@blogshow')->name('front.blogshow');
Route::get('/blog/category/{slug}','Front\FrontendController@blogcategory')->name('front.blogcategory');
Route::get('/blog/tag/{slug}','Front\FrontendController@blogtags')->name('front.blogtags');
Route::get('/blog-search','Front\FrontendController@blogsearch')->name('front.blogsearch');
Route::get('/blog/archive/{slug}','Front\FrontendController@blogarchive')->name('front.blogarchive');
Route::post('/subscribe','Front\FrontendController@subscribe')->name('front.subscribe');
// BLOG SECTION ENDS


// ************************************ FRONT SECTION ENDS**********************************************

Route::get('manage/role', 'Admin\UserController@indexRoleManagement')->name('admin.manage.role');
    Route::get('manage/role/fetch', 'Admin\UserController@rolemanagement')->name('admin.manage.role.fetch');
    Route::get('manage/role/create', 'Admin\UserController@createrole')->name('admin.manage.role.create');
    Route::post('manage/role/create', 'Admin\UserController@storerole')->name('admin.manage.role.store');
    Route::get('manage/role/edit/{id}', 'Admin\UserController@editrole')->name('admin.manage.role.edit');
    Route::post('manage/role/update/{id}', 'Admin\UserController@updaterole')->name('admin.manage.role.update');
    Route::get('manage/role/delete/{id}', 'Admin\UserController@deleterole')->name('admin.manage.role.delete');
    
    Route::get('roles', 'Admin\RoleController@indexRoleManagement')->name('admin.roles');
    Route::get('roles/fetch', 'Admin\RoleController@roles')->name('admin.role.fetch');
    Route::get('roles/create', 'Admin\RoleController@createrole')->name('admin.role.create');
    Route::post('roles/store', 'Admin\RoleController@storerole')->name('admin.role.store');
    Route::get('roles/edit/{id}', 'Admin\RoleController@editrole')->name('admin.role.edit');
    Route::post('roles/update/{id}', 'Admin\RoleController@updaterole')->name('admin.role.update');
    Route::get('roles/delete/{id}', 'Admin\RoleController@deleterole')->name('admin.role.delete');

    Route::get('permissions', 'Admin\PermissionController@indexPermissionManagement')->name('admin.permissions');
    Route::get('permissions/fetch', 'Admin\PermissionController@permissions')->name('admin.permission.fetch');
    Route::get('permissions/create', 'Admin\PermissionController@createpermission')->name('admin.permission.create');
    Route::post('permissions/store', 'Admin\PermissionController@storepermission')->name('admin.permission.store');
    Route::get('permissions/edit/{id}', 'Admin\PermissionController@editpermission')->name('admin.permission.edit');
    Route::post('permissions/update/{id}', 'Admin\PermissionController@updatepermission')->name('admin.permission.update');
    Route::get('permissions/delete/{id}', 'Admin\PermissionController@deletepermission')->name('admin.permission.delete');


    Route::get('/admin/countries', 'Admin\CountryController@indexCountryManagement')->name('admin.countries');
    Route::get('/admin/countries/fetch', 'Admin\CountryController@countries')->name('admin.country.fetch');
    Route::get('/admin/country/create', 'Admin\CountryController@createcountry')->name('admin.country.create');
    Route::post('country/store', 'Admin\CountryController@storecountry')->name('admin.country.store');
    Route::get('/admin/country/edit/{id}', 'Admin\CountryController@editcountry')->name('admin.country.edit');
    Route::post('country/update/{id}', 'Admin\CountryController@updatecountry')->name('admin.country.update');
    Route::get('/admin/country/delete/{id}', 'Admin\CountryController@deletecountry')->name('admin.country.delete');
    Route::get('/admin/country/status/{id1}/{id2}', 'Admin\CountryController@status')->name('admin.country.status');


    Route::get('/admin/division1/{id}', 'Admin\Division1Controller@indexDivision1Management')->name('admin.division1');
    Route::get('/admin/division1/fetch/{id}', 'Admin\Division1Controller@division1')->name('admin.division1.fetch');
    Route::get('/admin/division1/create/{id}', 'Admin\Division1Controller@createdivision1')->name('admin.division1.create');
    Route::post('/admindivision1/store', 'Admin\Division1Controller@storedivision1')->name('admin.division1.store');
    Route::get('/admin/division1/edit/{id}', 'Admin\Division1Controller@editdivision1')->name('admin.division1.edit');
    Route::post('/admindivision1/update/{id}', 'Admin\Division1Controller@updatedivision1')->name('admin.division1.update');
    Route::get('/admin/division1/delete/{id}', 'Admin\Division1Controller@deletedivision1')->name('admin.division1.delete');
    Route::get('/admin/division1/status/{id1}/{id2}', 'Admin\Division1Controller@status')->name('admin.division1.status');


    Route::get('/admin/division2/{code}', 'Admin\Division2Controller@indexDivision2Management')->name('admin.division2');
    Route::get('/admin/division2/fetch/{id}', 'Admin\Division2Controller@division2')->name('admin.division2.fetch');
    Route::get('/admin/division2/create/{id}', 'Admin\Division2Controller@createdivision2')->name('admin.division2.create');
    Route::post('/admindivision2/store', 'Admin\Division2Controller@storedivision2')->name('admin.division2.store');
    Route::get('/admin/division2/edit/{id}', 'Admin\Division2Controller@editdivision2')->name('admin.division2.edit');
    Route::post('/admindivision2/update/{id}', 'Admin\Division2Controller@updatedivision2')->name('admin.division2.update');
    Route::get('/admin/division2/delete/{id}', 'Admin\Division2Controller@deletedivision2')->name('admin.division2.delete');
    Route::get('/admin/division2/status/{id1}/{id2}', 'Admin\Division2Controller@status')->name('admin.division2.status');



    Route::get('/admin/city/{code}', 'Admin\CityController@indexCityManagement')->name('admin.city');
    Route::get('/admin/city/fetch/{id}', 'Admin\CityController@city')->name('admin.city.fetch');
    Route::get('/admin/city/create/{id}', 'Admin\CityController@createcity')->name('admin.city.create');
    Route::post('/admincity/store', 'Admin\CityController@storecity')->name('admin.city.store');
    Route::get('/admin/city/edit/{id}', 'Admin\CityController@editcity')->name('admin.city.edit');
    Route::post('/admincity/update/{id}', 'Admin\CityController@updatecity')->name('admin.city.update');
    Route::get('/admin/city/delete/{id}', 'Admin\CityController@deletecity')->name('admin.city.delete');
    Route::get('/admin/city/status/{id1}/{id2}', 'Admin\CityController@status')->name('admin.city.status');


        Route::get('/admin/currencies', 'Admin\CurrencyController@indexcurrencyManagement')->name('admin.currencies');
    Route::get('/admin/currencies/fetch', 'Admin\CurrencyController@currencies')->name('admin.currency.fetch');
    Route::get('/admin/currency/create', 'Admin\CurrencyController@createcurrency')->name('admin.currency.create');
    Route::post('/admincurrency/store', 'Admin\CurrencyController@storecurrency')->name('admin.currency.store');
    Route::get('/admin/currency/edit/{id}', 'Admin\CurrencyController@editcurrency')->name('admin.currency.edit');
    Route::post('/admincurrency/update/{id}', 'Admin\CurrencyController@updatecurrency')->name('admin.currency.update');
    Route::get('/admin/currency/delete/{id}', 'Admin\CurrencyController@deletecurrency')->name('admin.currency.delete');
    Route::get('/admin/currency/status/{id1}/{id2}', 'Admin\CurrencyController@status')->name('admin.currency.status');
Route::get('user/messages', 'User\UserController@message')->name('user.messages')->middleware('auth:web');
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');