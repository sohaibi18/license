<?php

use App\Http\Controllers\FinanceVerificationController;
use App\Http\Controllers\LicenseApplicationController;
use App\Http\Controllers\LicenseVerificationController;
use App\Http\Controllers\ProductApplicationController;
use App\Http\Controllers\ProductFinanceVerificationController;
use App\Http\Controllers\ProductVerificationController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/show/submitted/applications', 'show_applications')->name('show-submitted-applications');
    Route::get('/attach/licensee/documents/{id}', 'attach_documents')->name('attach-documents');
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
    Route::post('/check-cnic', 'check_cnic')->name('check-cnic');
    Route::post('/check-business','check_business')->name('check-business');
    Route::post('/check-product','check_product')->name('check-product');
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
    Route::post('/license/verified/{id}/{userid}', 'license_verified')->name('license_verified');
    Route::get('/show/applications/{userid}', 'show')->name('show');
    Route::get('/issue/license/{userid}/{id}', 'issue_License')->name('issue-License');
    Route::post('/issue/licensenumber/{userid}/{id}', 'issue_License_number')->name('issue_License_number');
    Route::get('/show/print_ready_applications/{userid}', 'show_ReadyforPrint')->name('show_ReadyforPrint');
    Route::get('/print/license/{userid}/{id}', 'print_license')->name('print_license');
});

require __DIR__ . '/auth.php';
