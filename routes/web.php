<?php

use App\Http\Livewire\Admin\AddHomeSlider;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\Admin\EditHomeSlider;
use App\Http\Livewire\Admin\HomeCategory;
use App\Http\Livewire\Admin\HomeSlider;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Payment;
use App\Http\Livewire\RazorPayThankYou;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\UserDashboadComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserReviewComponent;
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

Route::get('/', HomeComponent::class)->name('home');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/category/{category_slug}', CategoryComponent::class)->name('category.details');

Route::get('/search', SearchComponent::class)->name('search');

Route::get('/payment', Payment::class)->name('payment');

Route::get('/razorpay-thank-you', RazorPayThankYou::class)->name('razorpay-thankyou');

Route::post('/razorpay-thank-you', RazorPayThankYou::class);

Route::get('/wishlist', WishlistComponent::class)->name('wishlist');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/contact-us',ContactComponent::class)->name('contact');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//for user
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboadComponent::class)->name('user.dashboard');

    Route::get('user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.order-details');

    Route::get('/user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');

    Route::get('user/changepassword',UserChangePasswordComponent::class)->name('user.changepassword');



});



//for Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/add-categories', AdminAddCategoryComponent::class)->name('admin.add-categories');
    Route::get('/admin/edit-category/{category_slug}/{scategory_slug?}', AdminEditCategoryComponent::class)->name('admin.edit-categories');

    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.add-product');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.edit-product');

    Route::get('/admin/sliders', HomeSlider::class)->name('admin.sliders');
    Route::get('/admin/slider/add', AddHomeSlider::class)->name('admin.add-slider');
    Route::get('/admin/slider/edit/{id}', EditHomeSlider::class)->name('admin.edit-slider');

    Route::get('/admin/home-categories', HomeCategory::class)->name('admin.home-categories');
    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupon',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/add-coupon',AdminAddCouponsComponent::class)->name('admin.add-coupon');
    Route::get('/admin/edit-coupon/{coupon_id}',AdminEditCouponsComponent::class)->name('admin.edit-coupon');

    Route::get('admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.order-details');

    Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/settings', AdminSettingComponent::class)->name('admin.settings');
});