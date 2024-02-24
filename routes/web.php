<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\User\AllUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndexController::class, 'Index'])->name('main.index');

Route::middleware('auth','verified')->group(function () {
        Route::get('/dashboard',[UserController::class, 'UserDashboard'])->name('dashboard');
        Route::post('/user/Profile/Update',[UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
        Route::post('/user/Profile/Update',[UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
        Route::post('/user/Password/Update',[UserController::class, 'UserPasswordUpdate'])->name('user.update.password');
        Route::get('/user/logout',[UserController::class, 'UserLogOut'])->name('user.logout');
});
//User Group Route

Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
   //Admin Route
Route::middleware(['auth','role:admin'])->group(function (){
        Route::get('/admin/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::get('/admin/logout',[AdminController::class, 'AdminDestroy'])->name('admin.logout');
        Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
        Route::post('/admin/update/profile', [AdminController::class, 'AdminUpdateProfile'])->name('admin.update.profile');
        Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
        Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});
   //Vendor Route
Route::middleware(['auth','role:vendor'])->group(function (){
    Route::controller(VendorController::class)->group(function(){
        Route::get('/vendor/dashboard','VendorDashboard')->name('vendor.dashboard');
        Route::get('/vendor/logout', 'VendorDestroy')->name('vendor.logout');
        Route::get('/vendor/profile','VendorProfile')->name('vendor.profile');
        Route::post('/vendor/update/profile','VendorUpdateProfile')->name('vendor.update.profile');
        Route::get('/vendor/change/password','VendorChangePassword')->name('vendor.change.password');
        Route::post('/vendor/update/password','VendorUpdatePassword')->name('vendor.update.password');
    });
//Add Product vendor Route
Route::controller(VendorProductController::class)->group(function(){
    Route::get('/all/Vendor/product','AllVendorProductView')->name('all.vendor.product.show');
    Route::get('/add/vendor/product' ,'AddVendorProduct')->name('add.vendor.product');
    Route::post('/store/vendor/product' ,'StoreVendorProduct')->name('store.vendor.product');
    Route::get('/edit/vendor/product{id}' ,'EditVendorProduct')->name('vendor.product.edit');
    Route::post('/vendor/update/product' ,'VendorUpdateProduct')->name('vendor.update.product');
    Route::post('/update/vendor/product/thumbnail' ,'UpdateVendorProductThumbnail')->name('update.vendor.product.thumbnail');
    Route::post('/update/vendor/edit/multiImage' ,'UpdateVendorMultiImageEditUpdate')->name('update.vendor.product.multiimage');
    Route::get('/vendor/product/multiImage/delete{id}' ,'VendorProductMultiImageDelete')->name('vendor.product.multiimage.delete');
    Route::get('/vendor/product/delete/{id}','VendorProducDeletes')->name('vendor.product.delete');
    Route::get('/vendor/product/active/{id}' ,'VendorProducActive')->name('vendor.product.active');
    Route::get('/vendor/product/inactive/{id}' ,'VendorProducInactive')->name('vendor.product.inactive');

});
Route::controller(OrderController::class)->group(function(){
    Route::get('/Vendor/pending/order','VendorPendingOrder')->name('vendor.pending.order');
   

});


});
//Admin And Vendor login Route
        Route::get('/admin/login',[AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);
        Route::get('/vendor/login',[VendorController::class, 'vendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);
        Route::get('/vendor/register',[VendorController::class, 'VendorRegister'])->name('vendor.apply.register');
        Route::post('/vendor/register/store', [VendorController::class, 'VendorRegisterStore'])->name('vendor.store.register');

//All Brand  Route
Route::middleware(['auth','role:admin'])->group(function(){
Route::controller(BrandController::class)->group(function(){
        Route::get('/all/brand','AllBrand')->name('all.brand');
        Route::get('/add/brand','AddBrand')->name('add.brand');
        Route::post('/store/brand','StoreBrand')->name('store.brand');
        Route::get('/edit/brand/{slug}','ViewEditBrand')->name('view.edit.brand');
        Route::post('/update/brand/{id}','UpdateBrand')->name('update.brand');
        Route::get('/delete/brand/{id}','DeleteeBrand')->name('delete.brand');

});
//Admin Add Product
Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product' ,'AllProductView')->name('all.product.show');
    Route::get('/add/product' ,'AddProduct')->name('add.product');
    Route::post('/store/product' ,'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}' ,'EditProduct')->name('product.edit');
    Route::post('/update/product' ,'UpdateProduct')->name('update.product');
    Route::post('/update/product/thumbnail' ,'UpdateProductThumbnail')->name('update.product.thumbnail');
    Route::post('/update/edit/multiImage' ,'UpdateMultiImageEditUpdate')->name('update.product.multiimage');
    Route::get('/product/multiImage/delete{id}' ,'ProductMultiImageDelete')->name('product.multiimage.delete');
    Route::get('/product/inactive/{id}' ,'ProducInactive')->name('product.inactive');
    Route::get('/product/active/{id}' ,'ProducActive')->name('product.active');
    Route::get('/product/delete/{id}','ProducDeletes')->name('product.delete');
});//
//Order Pending Route
Route::controller(OrderController::class)->group(function(){
    Route::get('/pending/order' ,'OrderPending')->name('pending.order');
    Route::get('/admin/details/order/{id}' ,'AdminDetailsOrder')->name('pending.order.edit');
    Route::get('/admin/confirmn/order' ,'AllConfirmOrder')->name('all.confirm.order');
    Route::get('/admin/processing/order' ,'AllProcessingOrder')->name('all.processing.order');
    Route::get('/admin/deleverd/order' ,'AllDeleveredOrder')->name('all.delevered.order');
    Route::get('/admin/confirm/order/active/{id}' ,'PendingToConfirm')->name('confirm.order.active');
    Route::get('/admin/processing/order/active/{id}' ,'ConfirmToProcessing')->name('processing.order.active');
    Route::get('/admin/delevered/order/active/{id}' ,'ProcessingToDelevered')->name('deleverd.order.active');
    Route::get('/admin/invoice/dawnload/{id}' ,'AdminInvoiceDawnload')->name('admin.invoicr.dawnload');
   
});//
});
//Categories Route
Route::middleware(['auth'])->group(function () {
        Route::controller(CategoryController::class)->group(function(){
        Route::get('/categories/View' ,'CategoriesView')->name('view.categories');
        Route::get('/add/categories' ,'AddCategories')->name('add.categories');
        Route::post('/store/categories' ,'StoreCategories')->name('store.category');
        Route::get('/edit/categories/{slug}' ,'EditCategories')->name('view.edit.category');
        Route::post('/update/categories/{slug}' ,'UpdateCategories')->name('category.update');
        Route::get('/delete/categories/{slug}' ,'DeleteCategories')->name('delete.categories');
    });
});
//Sub Categories Route
Route::middleware(['auth'])->group(function () {
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/subcategories/View' ,'SubCategoriesView')->name('view.subcategories');
        Route::get('/add/subcategories' ,'AddSubCategories')->name('add.subcategories');
        Route::post('/store/subcategories' ,'StoreSubCategories')->name('store.subcategory');
        Route::get('/edit/subcategories/{slug}' ,'EditSubCategories')->name('view.edit.subcategory');
        Route::post('/update/subcategories/{slug}' ,'UpdateSubCategories')->name('update.subcategory');
        Route::get('/delete/subcategories/{slug}' ,'DeleteSubCategories')->name('delete.subcategories');
        Route::get('/subcategory_id/ajax/{cat_Id}' ,'GetSubCategories');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('/vendor/inactive' ,'VendorInactive')->name('vendor.inactive');
        Route::get('/vendor/active' ,'VendorActive')->name('vendor.active');
        Route::get('/vendor/Details/inactive/{id}' ,'DetailsInactive')->name('details.inactive');
        Route::get('/vendor/Details/active/{id}' ,'DetailsActive')->name('details.active');
        Route::post('/vendor/Apply/inactive/{id}' ,'UpdateInactiveApply')->name('update.inactive.apply');
        Route::post('/vendor/Apply/active/{id}' ,'UpdateActiveApply')->name('update.active.apply');
    });//End Route



});//End Middleware;
Route::middleware(['auth','role:admin'])->group(function (){
    //Slider All Route
    Route::controller(SliderController::class)->group(function(){
        Route::get('/admin/slider/view' ,'AllSliderView')->name('show.all.slider');
        Route::get('/admin/add/slider' ,'AddSlider')->name('add.slider');
        Route::post('/admin/store/slider' ,'StoreSlider')->name('store.slider');
        Route::get('/admin/edit/slider/{slug}' ,'EditSlider')->name('view.edit.slide');
        Route::post('/admin/update/slider' ,'UpdateSlider')->name('update.slider');
        Route::get('/admin/delete/slider/{slug}' ,'DeleteSlider')->name('delete.slide');

    });
    //Banner All Route
    Route::controller(BannerController::class)->group(function(){
        Route::get('/admin/banner/view' ,'AllBannerView')->name('show.all.banner');
        Route::get('/admin/add/banner' ,'AddBanner')->name('add.banner');
        Route::post('/admin/store/banner' ,'StoreBanner')->name('store.banner');
        Route::get('/admin/edit/banner/{slug}' ,'EditBanner')->name('banner.edit');
        Route::post('/admin/update/banner' ,'UpdateBanner')->name('update.banner');
        Route::get('/admin/delete/banner/{slug}' ,'DeleteBanner')->name('banner.delete');

    });
    //All Coupon Route
    Route::controller(CouponController::class)->group(function(){
        Route::get('/admin/coupon/view' ,'AllCouponView')->name('all.coupon');
        Route::get('/admin/addcoupon' ,'AddCoupon')->name('add.coupon');
        Route::post('/admin/store/coupon' ,'StoreCoupon')->name('store.coupon');
        Route::get('/admin/edit/coupon/{id}' ,'EditCoupon')->name('edit.coupon');
        Route::post('/admin/update/coupon' ,'UpdateCoupon')->name('update.coupon');
        Route::get('/admin/delete/coupon/{id}' ,'DeleteCoupon')->name('delete.coupon');
    });
    //All Shipping Are Route
    Route::controller(ShippingAreaController::class)->group(function(){
        //Division Route
        Route::get('/admin/division/view' ,'AllDivisionView')->name('all.division');
        Route::get('/admin/add/division' ,'AddDivision')->name('add.division');
        Route::post('/admin/store/division' ,'StoreDivision')->name('store.division');
        Route::get('/admin/edit/division/{id}' ,'EditDivision')->name('edit.division');
        Route::post('/admin/update/division' ,'UpdateDivision')->name('update.division');
        Route::get('/admin/delete/division/{id}' ,'DeleteDivision')->name('delete.division');
        //Districts Route
        Route::get('/admin/districts/view' ,'AllDistrictsView')->name('all.districts');
        Route::get('/admin/add/districts' ,'AddDistricts')->name('add.districts');
        Route::post('/admin/store/districts' ,'StoreDistricts')->name('store.districts');
        Route::get('/admin/edit/district/{id}' ,'EditDistrict')->name('edit.district');
        Route::post('/admin/update/districts' ,'UpdateDistricts')->name('update.districts');
        Route::get('/admin/delete/districts/{id}' ,'DeleteDistricts')->name('delete.district');
       // State Route
       Route::get('/admin/state/view' ,'AllStateView')->name('all.state');
        Route::get('/admin/add/state' ,'AddState')->name('add.state');
        Route::get('/division_id/ajax/{division_id}' ,'DistrictsAjax');
        Route::post('/admin/store/state' ,'StoreState')->name('store.state');
        Route::get('/admin/edit/state/{id}' ,'EditState')->name('edit.state');
        Route::post('/admin/update/state' ,'UpdateState')->name('update.state');
        Route::get('/admin/delete/state/{id}' ,'DeleteState')->name('delete.state');
        
    });
});//End Middleware;
      
    //FrontEnd Route Product
        Route::get('/product/details/{id}/{slug}' ,[IndexController::class,'ProductDetails']);
        Route::get('/vendor/details/{id}' ,[IndexController::class,'VendorDetails'])->name('vendor.details');
        Route::get('/all/vendor/list' ,[IndexController::class,'AllVendorList'])->name('all.vendor.list');
        Route::get('/product/categories/{id}/{slug}' ,[IndexController::class,'ProductCategories']);
        Route::get('/product/subcategory/{id}/{slug}' ,[IndexController::class,'ProductSubCategories']);
     //Modal View All Route
    Route::get('/product/view/modal/{id}',[IndexController::class,'ProductViewModal']);
    //Add Too Cart All Route
    Route::post('/cart/data/store/{id}',[CartController::class,'AddToCart']);

    //Product Mini Cart
    Route::get('/product/mini/cart',[CartController::class,'ProductMiniCart']);
    //Removecart
    Route::get('/cart/mini/remove/{rowId}',[CartController::class,'MiniCartRemove']);
       //Details page Add Too Cart All Route
    Route::post('/dcart/data/store/{id}',[CartController::class,'AddToCartdetails']);
     //Wishlist Route
     Route::post('/add/to/wishlist/{product_id}',[WishListController::class,'AddToWishList']);
     //Add to Compare Route
     Route::post('/add-to-compare/{product_id}',[CompareController::class,'AddToCompare']);
     //wishlist route middleware
     Route::controller(CartController::class)->group(function(){
        Route::get('/mycart/','MyCart')->name('mycart');
        Route::get('/cart-page-data/','MyCartDataPass');
        Route::get('/cart-single-romove/{rowId}','RemoveSingleCart');
        Route::get('/cart-decrement/{rowId}','CartDecrement');
        Route::get('/cart-increment/{rowId}','CartIncrement');
    });
    //ApplyCoupon Route
     Route::controller(CartController::class)->group(function(){
        Route::post('/apply-coupon-ajax/','ApplyCoupon');  
        Route::get('/coupon-calculation/','CouponCalculation');  
        Route::get('/remove-coupon/','CouponRemove');  
    });
    Route::controller(CartController::class)->group(function(){
        Route::get('/checkout/','Checkout')->name('checkout');
       
    });
    //Start User Middleware
     Route::middleware(['auth','role:user'])->group(function (){
     Route::controller(WishListController::class)->group(function(){
        Route::get('/wishlist/','WishListView')->name('wishlist');
        Route::get('/wishlist-data-view/','WishDataView')->name('wishlist.data.view');
        Route::get('/wishlist-remove/{id}','WishlistRemove');
    });

     Route::controller(CompareController::class)->group(function(){
        Route::get('/Compare/','CompareViewPage')->name('compare');
        Route::get('/compare-data-view/','CompareDataLoad');
        Route::get('/compare-remove/{id}','Comparedelete');

    });
   //Shipping Ajax Route 
   Route::controller(CheckoutController::class)->group(function(){
    Route::get('/shipping-districts-ajax/{division_id}','Shippingdistricts');  
    Route::get('/shipping-state-ajax/{district_id}','ShippingState');  
    Route::post('/checkout/store','StoreCheckout')->name('store.checkout');  
    });
    //Stripe Controller
   Route::controller(StripeController::class)->group(function(){
    Route::post('/stripe/order','StripeOrder')->name('stripe.order');  
    Route::post('/cash/order','CashOrder')->name('cash.order');
    });
    //All User Controller
   Route::controller(AllUserController::class)->group(function(){
    Route::get('/user/account/details','UserDatails')->name('user.details.page');  
    Route::get('/user/account/password','UserPassword')->name('user.password.page');  
    Route::get('/user/account/address','UserAddress')->name('user.address.page');  
    Route::get('/user/track/order','UserTrackOrder')->name('user.track.order.page');  
    Route::get('/user/order','UserOrder')->name('user.order.page'); 
    Route::get('/user/order/details/{id}','OrderDetails')->name('user/order/details');  
    Route::get('user/invoice/pdf/{id}','OrderInvoice');  
    //Returbn Order
    Route::post('user/order/return/{return_order}','OrderReturn')->name('return.order.message.store');  
    });

    });//end middleware    
  //Search Route 
  Route::controller(IndexController::class)->group(function(){
    Route::post('/search','ProductSearch')->name('product.search');
    Route::post('/search-product','ProductSearchAjax')->name('product.search.ajax');
    
});
require __DIR__.'/auth.php';



