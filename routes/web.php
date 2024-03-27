<?php

use App\Http\Controllers\FinanceVerificationController;
use App\Http\Controllers\LicenseApplicationController;
use App\Http\Controllers\LicenseModificationController;
use App\Http\Controllers\LicenseVerificationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductApplicationController;
use App\Http\Controllers\ProductFinanceVerificationController;
use App\Http\Controllers\ProductVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleAndPermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'controller' => LicenseApplicationController::class,
    'middleware' => 'auth',
], function () {

    Route::get('/show/application/form/{id}', 'show')->name('show-application-form');
    Route::post('/display/submitted/data/{id}', 'store')->name('display-submitted-data');
    Route::get('/show/submitted/applications/{id}', 'show_applications')->name('show-submitted-applications');
    Route::get('/attach/licensee/documents/{id}', 'attach_documents')->name('attach-documents');
    Route::get('/generate/challan/{id}', 'generate_challan')->name('generate-challan');
    Route::post('/licensee/payment/details/{id}', 'store_payment')->name('store-payment');
});

Route::group([
    'controller' => FinanceVerificationController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/application/finance/verification/{userid}', 'display_For_Verification')->name('display_For_Verification');
    Route::get('/show/verification/form/{userid}/license/{license_application_id}', 'show_finance_verification')->name('show_finance_verification');
    Route::post('/verified/{userid}/licenseapp/{licenseappid}', 'finance_verified')->name('finance-verified');
});

Route::group([
    'controller' => LicenseVerificationController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/application/license/verification/{userid}', 'display_For_Verification')->name('display_For_Verification');
    Route::get('/show/license/verification/form/{userid}/license/{id}', 'show_license_verification')
        ->name('show-license-verification');
    Route::post('/license/verified/{id}/{userid}', 'license_verified')->name('license_verified');
    Route::get('/show/applications/{userid}', 'show')->name('show');
    Route::get('/issue/license/{userid}/{id}', 'issue_License')->name('issue-License');
    Route::post('/issue/licensenumber/{userid}/{id}', 'issue_License_number')->name('issue_License_number');
    Route::get('/show/print_ready_applications/{userid}', 'show_ReadyforPrint')->name('show_ReadyforPrint');
    Route::get('/print/license/{userid}/{id}', 'print_license')->name('print_license');
});

Route::group([
    'controller' => ProductApplicationController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/show/product/application/form/{userid}', 'show')->name('show-product-application-form');
    Route::post('/check-license', 'check_license_no')->name('check-license');
    Route::post('/check-product', 'check_product')->name('check-product');
    Route::post('/store/product/data/{id}', 'store')->name('store-product-data');
    Route::get('/show/product/submitted/applications', 'show_applications')->name('show-submitted-applications');
    Route::get('/attach/product/documents/{id}', 'attach_documents')->name('attach-documents');
    Route::post('/product/payment/details/{id}', 'store_payment')->name('store-payment');
});

Route::group([
    'controller' => ProductFinanceVerificationController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/product/application/finance/verification/{userid}', 'display_For_Verification')->name('display_For_Verification');
    Route::get('/show/verification/form/{userid}/product/{product_application_id}', 'show_finance_verification')->name('show_finance_verification');
    Route::post('/verified/{userid}/productapp/{productappid}', 'finance_verified')->name('finance-verified');
});

Route::group([
    'controller' => ProductVerificationController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/application/product/verification/{userid}', 'display_For_Verification')->name('display_For_Verification');
    Route::get('/show/product/verification/form/{userid}/product/{id}', 'show_product_verification')
        ->name('show-license-verification');
    Route::post('/product/verified/{id}/{userid}', 'product_verified')->name('product_verified');
    Route::get('/show/product/applications/{userid}', 'show')->name('show');
    Route::get('/issue/product/{userid}/{id}', 'issue_Product')->name('issue-Product');
    Route::post('/issue/productnumber/{userid}/{id}', 'issue_Product_number')->name('issue_Product_number');
    Route::get('/show/product/print_ready_applications/{userid}', 'show_ReadyforPrint')->name('show_ReadyforPrint');
    Route::get('/print/product/{userid}/{id}', 'print_product')->name('print_product');
});

Route::group([
    'controller' => OwnerController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/show/licensee/details/{userid}', 'show')->name('check_cnic_no');
    Route::post('/show/licensee/information/form/{cnic}', 'licensee_information')->name('licensee_information');
    Route::post('/show/license/information/form/{licenseno}', 'license_information')->name('license_information');
    Route::post('/show/license/details/appid/{applicationno}', 'license_details')->name('license_details');
    Route::get('/show/license/details/appid/{applicationno}', 'license_details')->name('license_details');
    Route::get('/show/license/information/form/{licenseno}', 'license_information')->name('license_information');
    Route::get('/show/licensee/information/form/{cnic}', 'licensee_information')->name('licensee_information');
    Route::post('/check-cnic-no', 'check_cnic_no')->name('check-cnic-no');
    Route::post('/check-license-no', 'check_license_no')->name('check-license-no');
    Route::post('/check-application-no', 'check_application_no')->name('check-application-no');
});

Route::group([
    'controller' => UserController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/show/users/{id}', 'show_users')->name('show-users');
    Route::post('/show/users/{id}', 'show_users')->name('show-users');
    Route::get('/create/users/{id}', 'create_user')->name('create-user');
    Route::post('/add/user/{id}', 'store_user')->name('store-user');
});

Route::group([
    'controller' => RoleController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/show/roles/{id}', 'show_roles')->name('show-roles');
    Route::get('/create/roles/{id}', 'create_role')->name('create-role');
    Route::post('/add/role/{id}', 'store_role')->name('store-role');
});

Route::group([
    'controller' => PermissionController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/show/permissions/{id}', 'show_permissions')->name('show-permissions');
    Route::get('/create/permissions/{id}', 'create_permission')->name('create-permission');
    Route::post('/add/permission/{id}', 'store_permission')->name('store-permission');
});

Route::group([
    'controller' => RoleAndPermissionController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/show/roles/permissions/{id}', 'show_roles_permissions')->name('show-roles-permissions');
    Route::get('/assign/roles/permissions/{id}', 'assign_roles_permissions')->name('assign-roles-permissions');
    Route::post('/save/roles/permissions/{id}', 'save_roles_permissions')->name('save-roles-permissions');
});

Route::group([
    'controller' => LicenseModificationController::class,
    'middleware' => 'auth',
], function () {
    Route::get('/show/license/category/{userid}', 'show')->name('show');

});
require __DIR__ . '/auth.php';
