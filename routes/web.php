<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\WebSettingController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizesController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Client\IndexClienController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\DanhMucSanPhamController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Client\Account\AccountController;
use App\Http\Controllers\Client\Cart\CartController;
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


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('login', [LoginController::class, 'signin'])->name('login');

Route::post('login/dangnhap', [LoginController::class, 'postLogin'])->name('login.postLogin');

Route::get('login/logout', [LoginController::class, 'logout'])->name('login.logout');


Route::prefix('/')->group(function () {
    Route::get('', [IndexClienController::class, 'index'])->name('index');

    Route::get('search', [SearchController::class, 'search'])->name('searchAllProduct');

    Route::get('danh-muc/{slug}', [DanhMucSanPhamController::class, 'getProductOfCate'])->name('tim_danh_muc');

    Route::get('sap-xep-danh-muc/{id}', [DanhMucSanPhamController::class, 'filterOfProductCate'])->name('sap_sep_yeu_cau');

    Route::get('all-san-pham', [DanhMucSanPhamController::class, 'getAllProduct'])->name("all_san_pham");

    Route::get('sap-xep-danh-muc-all-san-pham', [DanhMucSanPhamController::class, 'filterAllProduct'])->name('sap_sep_yeu_cau_all_product');

    Route::get('san-pham-chi-tiet/{slug}-{id}', [ProductDetailController::class, 'show'])->name('chi_tiet_san_pham');

    Route::get('get-attribute-product', [ProductDetailController::class, 'getAttributeProduct'])->name('getAttributeProduct');

    Route::get('valueDetailOfProduct', [ProductDetailController::class, 'valueDetailOfProduct'])->name('valueDetailOfProduct');

    Route::post('addCommentProduct/{id}', [CommentController::class, 'addComment'])->name('addComment');

    Route::get('singup', [AccountController::class, 'formDangKy'])->name('formDangKy');

    Route::post('Postsingup', [AccountController::class, 'Postsingup'])->name('Postsingup');

    Route::get('addCart',[CartController::class,'addInCart'])->name('addInCart');
});


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {

    Route::get('/', [AdminController::class, 'index'])->name('backend.admin');
    Route::resource('backend/category', CategoryController::class);
    Route::resource('backend/websetting', WebSettingController::class);
    Route::resource('backend/banner', BannerController::class);
    Route::resource('backend/sizes', SizesController::class);
    Route::resource('backend/post', PostController::class);
    Route::resource('backend/user', UserController::class);
    Route::resource('backend/product', ProductController::class);
    Route::resource('backend/colors', ColorController::class);
    Route::resource('backend/roles', RoleController::class);
    Route::resource('backend/permission', PermissionController::class);
    Route::delete('backend/ProductImage/delete/{id}', 'App\Http\Controllers\Backend\ProductImageController@delete')->name('admin.ProductImage.delete');

    Route::get('backend/list-comments', [CommentController::class, 'index'])->name('index.comments');

    Route::get('backend/comment/show/{id}', [CommentController::class, 'show'])->name('comments.show');

    Route::delete('backend/comment/delete/{id}', [CommentController::class, 'delete'])->name('comments.destroy');

    Route::post('backend/comments/update/{id}', [CommentController::class, 'updateStatus'])->name('comments.update');

});

