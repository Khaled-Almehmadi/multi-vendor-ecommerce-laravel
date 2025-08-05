<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Response;
Route::get('/', function () {
    return view('welcome');
});


//centralized image size control through config/image_sizes on the fly 
Route::get('product-image/{size}/{filename}', function ($size, $filename) {
    $sizes = config('image_sizes.product');
    if (!isset($sizes[$size])) {
        abort(404, 'Invalid size.');
    }
    $width = $sizes[$size]['width'];
    $height = $sizes[$size]['height'];
    $path = public_path('front/images/products/' . $filename);
    
    if (!file_exists($path)) {
        abort(404, 'Image not found.');
    }

    $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
    $image = $manager->read($path)
        ->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    
    $binary = $image->toJpeg(85); // Compression with 85% quality
    return Response::make($binary)->header('Content-Type', 'image/jpeg');
});



//we are grouping all admin routes by specifying  "admin" as prefix 
Route::prefix('admin')->group(function(){

//show login form
route::get('login',[AdminController::class,'create'])-> name('admin.login');

route::post('login',[AdminController::class,'store'])-> name('admin.login.request');
route::get('logout',[AdminController::class,'destroy'])-> name('admin.logout');
Route::group(['middleware' => ['admin']],function(){

    //update password page route
Route::get('update-password',[AdminController::class,'edit'])->name('admin.update-password');
//verify password
Route::post('verify-password',[AdminController::class,'verifyPassword'])->name('admin.verify-password');

//update password
Route::post('update-password',[AdminController::class,'updatePasswordRequest'])->name('admin.update.password.request');
//dashboard route
Route::resource('dashboard',AdminController::class)->only(['index']);
//update admin details page 

Route::get('update-details', [AdminController::class, 'editDetails'])->name('admin.update_details');
//updating the admin details 
Route::post('update-details', [AdminController::class, 'updateDetails'])->name('admin.update-details.request');
//delete image
Route::post('delete-profile-image', [AdminController::class, 'deleteProfileImage']);


//subadmin
route::get('subadmins',[AdminController::class,'subadmins']);
Route::get('/update-role/{id}', [AdminController::class, 'updateRole']);
Route::post('/update-role/request', [AdminController::class, 'updateRoleRequest']);

//custom js
route::post('update-subadmin-status',[AdminController::class,'updateSubadminStatus']);
route::post('update-category-status',[CategoryController::class,'updateCategoryStatus']);
route::post('delete-category-image',[CategoryController::class,'deleteCategoryImage']);
route::post('delete-category-sizechart-image',[CategoryController::class,'deleteSizeChaImage']);
route::post('update-product-status',[ProductController::class,'updateProductStatus']);
route::post('update-attribute-status',[ProductController::class,'updateAttributeStatus']);
Route::post('/products/update-image-sorting', [ProductController::class,'updateImageSorting'])->name('admin.products.update-image-sorting');
Route::post('/products/delete-dropzone-image', [ProductController::class, 'deleteDropzoneImage'])->name('admin.products.delete-image');
Route::post('/products/delete-temp-image', [ProductController::class, 'deleteTempProductImage'])->name('product.delete.temp.altimage');
Route::post('/products/delete-temp-video', [ProductController::class, 'deleteTempProductVideo'])->name('product.delete.temp.video');



//




//delete subadmin
route::get('delete-subadmin/{id}',[AdminController::class,'deleteSubadmin']);
//  Add/Edit subadmin
route::get('add-edit-subadmin/{id?}',[AdminController::class,'addEditSubadmin']);
route::post('add-edit-subadmin/request',[AdminController::class,'addEditSubadminRequest']);


//category 
Route::resource('categories',CategoryController::class);

//products
Route::resource('products',ProductController::class);


Route::post('/product/upload-image', [ProductController::class, 'uploadImage'])
    ->name('product.upload.image');

Route::post('/product/upload-video', [ProductController::class, 'uploadVideo'])
    ->name('product.upload.video');

Route::get('delete-product-main-image/{id?}', [ProductController::class, 'deleteProductMainImage']);

Route::get('delete-product-video/{id}', [ProductController::class, 'deleteProductVideo']);
Route::get('delete-product-attribute/{id}', [ProductController::class, 'deleteProductAttribute']);

Route::post('/product/upload-images', [ProductController::class, 'uploadImages'])
    ->name('product.upload.images');

Route::post('/product/delete-temp-image', [ProductController::class, 'deleteTempImage'])
    ->name('product.delete.temp.image');

Route::get('delete-product-image/{id?}', [ProductController::class, 'deleteProductImage']);




});



});


