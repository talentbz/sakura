<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//frontend
Route::get('/', [App\Http\Controllers\Frontend\FrontController::class, 'index'])->name('front.home');
Route::get('/light_gallery', [App\Http\Controllers\Frontend\FrontController::class, 'light_gallery'])->name('front.light_gallery');
Route::any('/stock', [App\Http\Controllers\Frontend\StockController::class, 'index'])->name('front.stock');
Route::get('/select_port', [App\Http\Controllers\Frontend\StockController::class, 'select_port'])->name('front.select_port');
Route::get('/details/{id}', [App\Http\Controllers\Frontend\StockController::class, 'details'])->name('front.details');
Route::get('/details/image_download/{id}', [App\Http\Controllers\Frontend\StockController::class, 'image_download'])->name('front.details.image_download');
Route::get('/contact_us', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('front.contact');
Route::post('/contact_us/email', [App\Http\Controllers\Frontend\ContactController::class, 'contactEmail'])->name('front.contact.email');
Route::post('/inquery/email', [App\Http\Controllers\Frontend\ContactController::class, 'inquiryEmail'])->name('front.inquiry.email');
Route::get('/company', [App\Http\Controllers\Frontend\ContactController::class, 'company'])->name('front.company');
Route::get('/agents', [App\Http\Controllers\Frontend\ContactController::class, 'agents'])->name('front.agents');
Route::get('/gallery/image', [App\Http\Controllers\Frontend\ContactController::class, 'gallery'])->name('front.gallery');
Route::get('/gallery/video', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('front.video.gallery');
Route::get('/gallery/video/fetch_data', [App\Http\Controllers\Frontend\GalleryController::class, 'fetch_data'])->name('front.video.fetch_data');
Route::get('/payment', [App\Http\Controllers\Frontend\ContactController::class, 'payment'])->name('front.payment');
Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('front.blog');
Route::get('/blog/{id}', [App\Http\Controllers\Frontend\BlogController::class, 'details'])->name('front.blog.detail');
Route::get('/customer_vocie', [App\Http\Controllers\Frontend\CustomerController::class, 'index'])->name('front.customer_vocie');

Route::group(['prefix' => 'user'], function(){
    Route::get('/login', [App\Http\Controllers\Frontend\UserController::class, 'login'])->name('front.user.login');
    Route::post('/login_post', [App\Http\Controllers\Frontend\UserController::class, 'login_post'])->name('front.user.login_post');
    Route::get('/signup', [App\Http\Controllers\Frontend\UserController::class, 'signup'])->name('front.user.signup');
    Route::post('/signup_post', [App\Http\Controllers\Frontend\UserController::class, 'signup_post'])->name('front.user.signup_post');
});
Route::prefix('/user')->middleware(['auth:web', 'CustomerRole'])->group(function () {
    Route::get('/mypage', [App\Http\Controllers\Frontend\UserController::class, 'myPage'])->name('front.user.mypage');
    Route::post('/mypage_post', [App\Http\Controllers\Frontend\UserController::class, 'mypage_post'])->name('front.user.mypage_post');
    Route::get('/chatroom', [App\Http\Controllers\Frontend\UserController::class, 'chatRoom'])->name('front.user.chatroom');
    Route::get('/chatroom/{id}', [App\Http\Controllers\Frontend\UserController::class, 'chatDetail'])->name('front.user.chatdetail');
    Route::get('/changepassword', [App\Http\Controllers\Frontend\UserController::class, 'changePassword'])->name('front.user.changepassword');
    Route::post('/comments/create', [App\Http\Controllers\Frontend\UserController::class, 'comments'])->name('front.user.comment_create');
});
Route::get('/clear', [App\Http\Controllers\Frontend\FrontController::class, 'clear'])->name('front.clear');

// admin dashboard
Route::prefix('/admin')->middleware(['auth:web', 'Admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
    Route::group(['prefix' => 'notification'], function(){
        Route::get('/', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('admin.notification');
        Route::get('/mark', [App\Http\Controllers\Admin\NotificationController::class, 'markNotification'])->name('admin.markNotification');
    });
    Route::group(['prefix' => 'user'], function(){
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
        Route::get('/{id}/change_passowrd', [App\Http\Controllers\Admin\UserController::class, 'change_password'])->name('admin.user.change_password');
        Route::post('/updatePassword', [App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->name('admin.user.updatePassword');
        Route::post('/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
    });
    Route::group(['prefix' => 'vehicle'], function(){
        Route::get('/', [App\Http\Controllers\Admin\VehicleController::class, 'index'])->name('admin.vehicle.index');
        Route::get('/get_data', [App\Http\Controllers\Admin\VehicleController::class, 'getData'])->name('admin.vehicle.get_data');
        Route::get('/rate', [App\Http\Controllers\Admin\VehicleController::class, 'rate'])->name('admin.vehicle.rate');
        Route::post('/rate_post', [App\Http\Controllers\Admin\VehicleController::class, 'rate_post'])->name('admin.vehicle.rate_post');
        Route::get('/create', [App\Http\Controllers\Admin\VehicleController::class, 'create'])->name('admin.vehicle.create');
        Route::post('/create_post', [App\Http\Controllers\Admin\VehicleController::class, 'create_post'])->name('admin.vehicle.create_post');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\VehicleController::class, 'edit'])->name('admin.vehicle.edit');
        Route::post('/edit_post/{id}', [App\Http\Controllers\Admin\VehicleController::class, 'edit_post'])->name('admin.vehicle.edit_post');
        Route::post('/imageDelete', [App\Http\Controllers\Admin\VehicleController::class, 'imageDelete'])->name('admin.vehicle.imageDelete');
        Route::post('/image_all_delete', [App\Http\Controllers\Admin\VehicleController::class, 'image_all_delete'])->name('admin.vehicle.image_all_delete');
        Route::post('/imageAdd', [App\Http\Controllers\Admin\VehicleController::class, 'imageAdd'])->name('admin.vehicle.imageAdd');
        Route::get('/delete', [App\Http\Controllers\Admin\VehicleController::class, 'delete'])->name('admin.vehicle.delete');
        Route::get('/change_status', [App\Http\Controllers\Admin\VehicleController::class, 'change_status'])->name('admin.vehicle.change_status');
    });

    Route::group(['prefix' => 'customer'], function(){
        Route::get('/', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customer.index');
        Route::get('/add', [App\Http\Controllers\Admin\CustomerController::class, 'add'])->name('admin.customer.add');
        Route::post('/add_post', [App\Http\Controllers\Admin\CustomerController::class, 'add_post'])->name('admin.customer.add_post');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('admin.customer.edit');
        Route::post('/edit_post', [App\Http\Controllers\Admin\CustomerController::class, 'edit_post'])->name('admin.customer.edit_post');
        Route::get('/delete', [App\Http\Controllers\Admin\CustomerController::class, 'delete'])->name('admin.customer.delete');
        Route::post('/imageAdd', [App\Http\Controllers\Admin\CustomerController::class, 'imageAdd'])->name('admin.customer.imageAdd');
        Route::post('/imageDelete', [App\Http\Controllers\Admin\CustomerController::class, 'imageDelete'])->name('admin.customer.imageDelete');
    });
    Route::group(['prefix' => 'port'], function(){
        Route::get('/', [App\Http\Controllers\Admin\PortController::class, 'index'])->name('admin.port.index');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\PortController::class, 'edit'])->name('admin.port.edit');
        Route::post('/edit_post', [App\Http\Controllers\Admin\PortController::class, 'edit_post'])->name('admin.port.edit_post');
    });
    Route::group(['prefix' => 'news'], function(){
        Route::get('/', [App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/add', [App\Http\Controllers\Admin\NewsController::class, 'add'])->name('admin.news.add');
        Route::post('/add_post', [App\Http\Controllers\Admin\NewsController::class, 'add_post'])->name('admin.news.add_post');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('admin.news.edit'); 
        Route::post('/edit_post', [App\Http\Controllers\Admin\NewsController::class, 'edit_post'])->name('admin.news.edit_post');
        Route::get('/delete', [App\Http\Controllers\Admin\NewsController::class, 'delete'])->name('admin.news.delete');
        Route::post('/imageAdd', [App\Http\Controllers\Admin\NewsController::class, 'imageAdd'])->name('admin.news.imageAdd');
        Route::post('/imageDelete', [App\Http\Controllers\Admin\NewsController::class, 'imageDelete'])->name('admin.news.imageDelete');
    });
    Route::group(['prefix' => 'video'], function(){
        Route::get('/', [App\Http\Controllers\Admin\VideoController::class, 'index'])->name('admin.video.index');
        Route::get('/add', [App\Http\Controllers\Admin\VideoController::class, 'add'])->name('admin.video.add');
        Route::get('/get_data', [App\Http\Controllers\Admin\VideoController::class, 'getData'])->name('admin.video.get_data');
        Route::post('/add_post', [App\Http\Controllers\Admin\VideoController::class, 'add_post'])->name('admin.video.add_post');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\VideoController::class, 'edit'])->name('admin.video.edit'); 
        Route::post('/edit_post', [App\Http\Controllers\Admin\VideoController::class, 'edit_post'])->name('admin.video.edit_post');
        Route::get('/delete', [App\Http\Controllers\Admin\VideoController::class, 'delete'])->name('admin.video.delete');
        Route::post('/videoAdd', [App\Http\Controllers\Admin\VideoController::class, 'videoAdd'])->name('admin.video.videoAdd');
        Route::post('/videoDelete', [App\Http\Controllers\Admin\VideoController::class, 'videoDelete'])->name('admin.video.videoDelete');
    });
    Route::group(['prefix' => 'inquiry'], function(){
        Route::get('/', [App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('admin.inquiry.index');
        Route::post('/detail', [App\Http\Controllers\Admin\InquiryController::class, 'detail'])->name('admin.inquiry.detail');
        Route::get('/delete', [App\Http\Controllers\Admin\InquiryController::class, 'delete'])->name('admin.inquiry.delete');
    });
    Route::group(['prefix' => 'shipping'], function(){
        Route::get('/', [App\Http\Controllers\Admin\ShippingController::class, 'index'])->name('admin.shipping.index');
        Route::get('/chat/{user_id}', [App\Http\Controllers\Admin\ShippingController::class, 'chat'])->name('admin.shipping.chat');
        Route::get('/chat/{user_id}/{vehicle_id}', [App\Http\Controllers\Admin\ShippingController::class, 'stockChat'])->name('admin.shipping.stockChat');
        Route::post('/reply/create', [App\Http\Controllers\Admin\ShippingController::class, 'reply'])->name('admin.shipping.reply');
        Route::get('/delete', [App\Http\Controllers\Admin\ShippingController::class, 'delete'])->name('admin.shipping.delete');
        Route::get('/change_status', [App\Http\Controllers\Admin\ShippingController::class, 'change_status'])->name('admin.shipping.change_status');
    });
    Route::get('/edit_profile', [App\Http\Controllers\Admin\AdminController::class, 'edit_profile'])->name('admin.edit_profile');
    Route::post('/update_profile', [App\Http\Controllers\Admin\AdminController::class, 'update_profile'])->name('admin.update_profile');
});


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
