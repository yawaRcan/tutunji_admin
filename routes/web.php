<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\front\PropertyController;
use App\Http\Controllers\front\DashboardController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AmenitiesController;
use App\Http\Controllers\admin\SalePropertyController;
use App\Http\Controllers\admin\PreconstructPropertyController;
use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\admin\PendingPropertyController;
use App\Http\Controllers\admin\WebsiteMemberController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\admin\AgentController;
use App\Http\Controllers\front\SocialShareController;
use App\Http\Controllers\admin\OffersController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('welcome');
//});

//ADMIN-USERS LOGIN ROUTES
Route::get('/login', [AdminAuthController::class, 'login']);
Route::post('/login', [AdminAuthController::class, 'loginPost']);

//GROUP MIDDLEWARE ROUTES
Route::group(['middleware' => 'isAdminUser'], function () {
    //ADMIN DASHBOARD PAGE ROUTE
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    //    Route::get('/admin/user-dashboard',[UserController::class,'userIndex']);
    //ADMIN-USERS REGISTER ROUTES
    Route::get('/register', [AdminAuthController::class, 'registration']);
    Route::post('/register', [AdminAuthController::class, 'registerPost']);
    //LIST PERMISSION PAGE ROUTE
    Route::get('/admin/list-permission', [RolePermissionController::class, 'allPermission']);
    //LIST ROLES PAGE ROUTE
    Route::get('/admin/list-roles', [RolePermissionController::class, 'allRoles']);
    //UPDATE ROLES PAGE ROUTE
    Route::get('/admin/edit-role/{roleId}', [RolePermissionController::class, 'editRole']);
    Route::post('/admin/edit-role/{roleId}', [RolePermissionController::class, 'editStoreRole']);
    //LIST DELETE ROUTE
    Route::get('/admin/delete-role/{roleId}', [RolePermissionController::class, 'destroyRole']);
    //LIST ADMIN-USERS ROUTE
    Route::get('/admin/list-admin-users', [UserController::class, 'listAdminUsers']);
    //ADD ROLE PAGE ROUTES
    Route::get('/admin/add-role', [RolePermissionController::class, 'addRole']);
    Route::post('/admin/add-role', [RolePermissionController::class, 'storeRole']);

    //PROPERTIES PAGE ALL ROUTES
    //LIST PRE-CONSTRUCT-PROPERTY PAGE ROUTE
    Route::get('/admin/list-pre-construct-property', [PreconstructPropertyController::class, 'list_pre_construct_property']);
    //EDIT PRE-CONSTRUCT-PROPERTY PAGE ROUTES
    Route::get('/admin/edit-pre-construct-property/{id}', [PreconstructPropertyController::class, 'edit_pre_construct_property']);
    Route::post('/admin/edit-pre-construct-property/{id}', [PreconstructPropertyController::class, 'update_pre_construct_property']);
    //get state by country
    Route::post('get-states-by-country', [PreconstructPropertyController::class, 'getState']);
    //delete pre-construct-property
    Route::get('/admin/delete-pre-construct-property/{id}', [PreconstructPropertyController::class, 'deletePreConstructProperty']);
    Route::get('/admin/delete-f-2d-plan-p-id', [PreconstructPropertyController::class, 'del_f_2d_plan_p_id']);
    Route::post('/admin/edit-f-2d-plan-with-p-id', [PreconstructPropertyController::class, 'edit_f_2d_plan_with_p_id']);
    Route::post('/admin/edit-f-3d-plan-with-p-id', [PreconstructPropertyController::class, 'edit_f_3d_plan_with_p_id']);
    Route::get('/admin/delete-f-3d-plan-p-id', [PreconstructPropertyController::class, 'del_f_3d_plan_with_p_id']);

    //UPDATE PRE-CONSTRUCT-PROPERTY MEDIA ROUTE
    Route::post('/admin/update-pre-construct-media', [PreconstructPropertyController::class, 'update_pre_construct_media_file']);
    //DELETE PRE-CONSTRUCT-PROPERTY MEDIA ROUTE
    Route::post('/admin/destroy-pre-construct-media', [PreconstructPropertyController::class, 'destroy_pre_construct_media_file']);
    //ADD PRE-CONSTRUCT-PROPERTY PAGE ROUTES
    Route::get('/admin/add-pre-construct-property', [PreconstructPropertyController::class, 'add_pre_construct_property']);
    Route::post('/admin/add-pre-construct-property', [PreconstructPropertyController::class, 'store_pre_construct_property']);
    //ADD PRE-CONSTRUCT-PROPERTY-MEDIA ROUTE
    Route::post('/admin/add-pre-construct-media', [PreconstructPropertyController::class, 'save_pre_construct_media_file']);
    //ADD 2D FLOOR PLAN PRE-CONSTRUCT-PROPERTY ROUTE
    Route::post('/admin/add-2d-file', [PreconstructPropertyController::class, 'save_2d_file']);
    Route::post('/admin/update-2d-section-on-session', [PreconstructPropertyController::class, 'update_2d_section_on_session']);
    Route::post('/admin/update-2d-floor-image', [PreconstructPropertyController::class, 'edit_2d_image']);
    //3D
    Route::post('admin/update-3d-section-on-session', [PreconstructPropertyController::class, 'update_3d_section_on_session']);
    Route::post('/admin/update-3d-floor-image', [PreconstructPropertyController::class, 'edit_3d_image']);


    //DELETE PRE-CONSTRUCT-PROPERTY-MEDIA ROUTE
    Route::post('/admin/destroy-pre-construct-media', [PreconstructPropertyController::class, 'destroy_pre_construct_media_file']);
    //List All Pre-construct property
    Route::get('/admin/all-pre-construct-property', [PreconstructPropertyController::class, 'all_property']);
    //List All Active Pre-construct property
    Route::get('/admin/active-pre-construct-property', [PreconstructPropertyController::class, 'all_active_property']);
    //List All Active Pre-construct property
    Route::get('/admin/deleted-pre-construct-property', [PreconstructPropertyController::class, 'all_deleted_property']);
    Route::post('admin/delete-2d-image', [PreconstructPropertyController::class, 'destroy_2d_floor_plan']);
    Route::post('admin/delete-3d-image', [PreconstructPropertyController::class, 'destroy_3d_floor_plan']);
    Route::post('admin/delete-sale-2d-image', [SalePropertyController::class, 'destroy_2d_sale_floor_plan']);
    Route::post('admin/delete-sale-3d-image', [SalePropertyController::class, 'destroy_3d_sale_floor_plan']);

    //update status
    Route::get('/admin/update-status/{id}', [PreconstructPropertyController::class, 'propertyStatus']);
    //update status
    Route::get('/admin/update-sale-property-status/{id}', [SalePropertyController::class, 'salepropertyStatus']);
    //ADD SALE-PROPERTY PAGE ROUTES
    Route::get('/admin/add-sale-property', [SalePropertyController::class, 'addSaleProperty']);
    Route::post('/admin/add-sale-property', [SalePropertyController::class, 'storeSaleProperty']);
    //all sale property route
    Route::get('/admin/all-sale-property', [SalePropertyController::class, 'all_sale']);
    //all approve sale property route
    Route::get('/admin/approve-sale-property', [SalePropertyController::class, 'all_approve_sale']);
    //all deleted sale property route
    Route::get('/admin/deleted-sale-property', [SalePropertyController::class, 'all_deleted_sale']);
    //ADD SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/add-media-file', [SalePropertyController::class, 'save_media_file']);
    Route::post('admin/update-2d-section-on-sale-session', [SalePropertyController::class, 'update_2d_section_on_sale_session']);
    Route::post('/admin/update-2d-floor-sale-image', [SalePropertyController::class, 'edit_2d_sale_image']);
    Route::post('/admin/update-3d-section-on-sale-session', [SalePropertyController::class, 'update_3d_section_on_sale_session']);
    Route::post('/admin/update-3d-floor-sale-image', [SalePropertyController::class, 'edit_3d_sale_image']);
    Route::get('/admin/delete-f-2d-sale-plan-p-id/{id}', [SalePropertyController::class, 'del_f_2d_sale_plan_p_id']);
    Route::post('/admin/edit-f-2d-sale-plan-with-p-id', [SalePropertyController::class, 'edit_f_2d_sale_plan_with_p_id']);
    Route::post('/admin/edit-f-3d-sale-plan-with-p-id', [SalePropertyController::class, 'edit_f_3d_sale_plan_with_p_id']);
    Route::get('/admin/delete-f-3d-sale-plan-p-id/{id}', [SalePropertyController::class, 'del_f_3d_sale_plan_with_p_id']);
    Route::get('/testing-image', [PreconstructPropertyController::class, 'testingImage']);


    //DELETE SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/delete-media-file', [SalePropertyController::class, 'delete_media_file']);
    //LIST SALE-PROPERTY PAGE ROUTE
    Route::get('/admin/list-sale-property', [SalePropertyController::class, 'listSaleProperty']);
    //EDIT SALE-PROPERTY PAGE ROUTES
    Route::get('/admin/edit-sale-property/{id}', [SalePropertyController::class, 'editSaleProperty']);
    Route::post('/admin/edit-sale-property/{id}', [SalePropertyController::class, 'updateSaleProperty']);
    //delete sale-property page route
    Route::get('/admin/delete-sale-property/{id}', [SalePropertyController::class, 'destroySaleProperty']);
    //get state by country
    Route::post('get-states-by-country', [SalePropertyController::class, 'getState']);
    //UPDATE SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/update-sale-media', [SalePropertyController::class, 'updateSaleMediaFile']);
    //DELETE SALE-PROPERTY-MEDIA ROUTE
    Route::post('/admin/destroy-sale-media', [SalePropertyController::class, 'destroySaleMediaFile']);
    //    //LIST PENDING PROPERTY PAGE ROUTE
//    Route::get('/admin/list-pending-property', [PendingPropertyController::class, 'pendingProperty']);
//    //LIST REJECTED PROPERTY PAGE ROUTE
//    Route::get('/admin/rejected-property', [PendingPropertyController::class, 'rejected_properties']);
//    //LIST ALL PENDING PROPERTY PAGE ROUTE
//    Route::get('/admin/all-pending-property', [PendingPropertyController::class, 'pending_properties']);
//    //VIEW PENDING PROPERTY PAGE ROUTE
//    Route::get('/admin/view-pending-property/{id}',[PendingPropertyController::class,'viewProperty']);
//    //REJECT PROPERTY WITH REASON USING AJAX ROUTE
//    Route::post('/admin/reject-property',[PendingPropertyController::class,'reject_reason']);
    //LIST WEBSITE MEMBER PAGE ROUTE
//    Route::get('/admin/list-website-member', [WebsiteMemberController::class, 'listWebsiteMember']);
//    //edit website member
//    Route::get('/admin/edit-website-member/{id}', [WebsiteMemberController::class, 'edit_website_member']);
//    Route::post('/admin/edit-website-member/{id}', [WebsiteMemberController::class, 'update_website_member']);
//   //delete-website member
//    Route::get('/admin/delete-website-member/{id}',[WebsiteMemberController::class, 'destroyWebsiteMember']);
//    //LIST NEW WEBSITE MEMBER ROUTE
//    Route::get('/admin/today-website-member', [WebsiteMemberController::class, 'todayWebsiteMember']);
    //LIST NEWSLETTER PAGE ROUTE
    Route::get('/admin/list-newsletter', [NewsletterController::class, 'listNewsletter']);
    //EDIT NEWSLETTER PAGE ROUTE
    Route::get('/admin/edit-newsletter/{id}', [NewsletterController::class, 'editNewsletter']);
    Route::post('/admin/edit-newsletter/{id}', [NewsletterController::class, 'updateNewsletter']);
    //destroy newsletter
    Route::get('/admin/delete-newsletter/{id}', [NewsletterController::class, 'destroyNewsletter']);
    //LIST TODAY NEWSLETTER MEMBER PAGE ROUTE
    Route::get('/admin/today-newsletter', [NewsletterController::class, 'todayNewsletter']);
    //LIST TODAY UNIQUE VISITORS PAGE ROUTE
    Route::get('/admin/list-unique-visitors-today', [VisitorController::class, 'listVisitorsToday']);
    //LIST TOTAL UNIQUE VISITORS PAGE ROUTE
    Route::get('/admin/total-unique-visitors', [VisitorController::class, 'listTotalVisitors']);
    Route::post('/admin/total-unique-visitors', [VisitorController::class, 'get_list_of_visitors']);
    //LIST All VISITORS
    Route::get('/admin/all-visitors', [VisitorController::class, 'allVisitors']);
    //List of today visitors
    Route::get('/admin/today-visitors', [VisitorController::class, 'get_list_of_today_visitors']);
    //UPDATE PROPERTY STATUS
    Route::post('/admin/propertyStatus', [PendingPropertyController::class, 'propertyStatus']);
    //LIST AMENITIES PAGE ROUTE
    Route::get('amenities_list', [AmenitiesController::class, 'index']);
    //ADD AMENITIES PAGE ROUTE
    Route::get('/admin/add-amenity', [AmenitiesController::class, 'add_amenity']);
    Route::post('/admin/add-amenity', [AmenitiesController::class, 'store_amenity']);
    //EDIT AMENITIES PAGE ROUTE
    Route::get('/admin/edit-amenity/{id}', [AmenitiesController::class, 'edit_amenity']);
    Route::post('/admin/edit-amenity/{id}', [AmenitiesController::class, 'update_amenity']);

    //DELETE AMENITIES ROUTE
    Route::get('/admin/del-amenity/{id}', [AmenitiesController::class, 'destroy_amenity']);
    //ADD AGENT ROUTE
    Route::get('/admin/add-agent', [AgentController::class, 'addAgent']);
    Route::post('/admin/add-agent', [AgentController::class, 'storeAgent']);
    //Show AGENT ROUTE
    Route::get('/admin/list-agent', [AgentController::class, 'show_agent']);
    //edit agent route
    Route::get('/admin/edit-agent/{id}', [AgentController::class, 'edit_agent']);
    Route::post('/admin/edit-agent/{id}', [AgentController::class, 'update_agent']);
    //delete agent route
    Route::get('/admin/delete-agent/{id}', [AgentController::class, 'destroy_agent']);
    //view-offers(for sale property)
    Route::get('/admin/view-offers/{id}', [OffersController::class, 'show_offer']);
    //edit-offers(for sale property)
    Route::get('/admin/edit-offers/{id}', [OffersController::class, 'edit_offer']);
    Route::post('/admin/edit-offers/{id}', [OffersController::class, 'update_offer']);
    //add-offers(for sale property)
    Route::get('/admin/add-offers/{id}', [OffersController::class, 'add_offer']);
    Route::post('/admin/add-offers/{id}', [OffersController::class, 'store_offer']);
    //delete offers(for sale property)
    Route::get('/admin/delete-offers/{id}', [OffersController::class, 'destroy_offer']);
    //view-inquiry(for pre-construct property)
    Route::get('/admin/view-inquiry/{id}', [InquiryController::class, 'show_inquiry']);
    //add-inquiry(for pre-construct property)
    Route::get('/admin/add-inquiry/{id}', [InquiryController::class, 'add_inquiry']);
    Route::post('/admin/add-inquiry/{id}', [InquiryController::class, 'store_inquiry']);
    //edit-inquiry(for pre-construct property)
    Route::get('/admin/edit-inquiry/{id}', [InquiryController::class, 'edit_inquiry']);
    Route::post('/admin/edit-inquiry/{id}', [InquiryController::class, 'update_inquiry']);
    //delete-inquiry(for pre-construct property)
    Route::get('/admin/delete-inquiry/{id}', [InquiryController::class, 'destroy_inquiry']);
    //add-blog route
    Route::get('/admin/add-blog', [BlogController::class, 'add_blog']);
    Route::post('/admin/add-blog', [BlogController::class, 'store_blog']);
    //view-blog route
    Route::get('/admin/view-blog', [BlogController::class, 'view_blog']);
    //edit-blog route
    Route::get('/admin/edit-blog/{id}', [BlogController::class, 'edit_blog']);
    Route::post('/admin/edit-blog/{id}', [BlogController::class, 'update_blog']);
    //delete-inquiry(for pre-construct property)
    Route::get('/admin/delete-blog/{id}', [BlogController::class, 'destroy_blog']);
    //all Active blog route
    Route::get('/admin/all-active-blog', [BlogController::class, 'all_active_blog']);
    //all blog route
    Route::get('/admin/all-blog', [BlogController::class, 'all_blog']);
    //all deleted blog route
    Route::get('/admin/all-deleted-blog', [BlogController::class, 'all_deleted_blog']);
    //add-blog-category
    Route::get('/admin/add-category', [BlogController::class, 'add_category']);
    Route::post('/admin/add-category', [BlogController::class, 'store_category']);
    //view-blog-category
    Route::get('/admin/view-category', [BlogController::class, 'show_category']);
    //Edit-status
    Route::get('/admin/update-category-status/{id}', [PreconstructPropertyController::class, 'cat_status']);
    //Add-2d-floor-plan
    Route::get('/admin/add-2d-floor-plan', [PreconstructPropertyController::class, 'add_2d_floor_plan']);
    //LOGOUT ROUTE
    Route::get('/auth/logout', [AdminAuthController::class, 'logout']);
});

//CLIENT-SIDE(CUSTOMER) ALL ROUTES
//HOME PAGE ROUTE
// Route::group(['middleware' => 'count_visitors'],function (){
//     //NEW-DESIGN FRONT PAGE ROUTES
//     Route::get('/',[FrontController::class,'home']);
//     Route::get('/home-new',[FrontController::class,'new_home']);

// });

