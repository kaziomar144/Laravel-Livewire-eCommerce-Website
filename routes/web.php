<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\WishlistComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class)->name('product.shop');

Route::get('/cart',CartComponent::class)->name('product.cart');

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');

Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



// ==========For User or Customer================

// Route::middleware(['auth:sanctum','verified'])->group(function (){
//     Route::get('user/deshboard',UserDashboardComponent::class)->name('user.dashborad');
// });

Route::group(['prefix' => 'user','middleware' => ['auth:sanctum','verified']], function(){
    Route::get('/deshboard',UserDashboardComponent::class)->name('user.dashborad');
});

//==========For Admin============

// Route::middleware(['auth:sanctum','verified','authadmin'])->group(function (){
//     Route::get('admin/deshboard',AdminDashboardComponent::class)->name('admin.dashboard');
// });

Route::group(['prefix' => 'admin','middleware' => ['auth:sanctum','verified','authadmin']], function() {
    Route::get('/deshboard',AdminDashboardComponent::class)->name('admin.dashboard');
    // for Category
    Route::get('/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    // for Product
    Route::get('/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');
    // for HomeSlider
    Route::get('/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
    // for Homepage category
    Route::get('/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    // for sale product date and time update
    Route::get('/sale',AdminSaleComponent::class)->name('admin.sale');

    // for coupons
    Route::get('/coupons',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/coupon/add',AdminAddCouponsComponent::class)->name('admin.addcoupon');
    Route::get('/coupon/edit/{coupon_id}',AdminEditCouponsComponent::class)->name('admin.editcoupon');


});