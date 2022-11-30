<?php

use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\InvoiceController;

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::get('/setting', [BaseController::class, 'setting'])->name('setting');
Route::post('/setting-update', [BaseController::class, 'update'])->name('setting.update');

//Invoice Routes

Route::get("/invoice", [InvoiceController::class, "index"])->name("invoice.index");
Route::get("/invoice/create", [InvoiceController::class, "create"])->name("invoice.create");
Route::get("/invoice-view/{id}", [InvoiceController::class, "view"])->name("invoice.view");
Route::post("/invoice", [InvoiceController::class, "store"])->name("invoice.store");
Route::post("/invoice/bulk-action", [InvoiceController::class, "bulk_action"])->name("invoice.bulk_action");

View::composer(['components.leftbar', 'components.meta'], function ($views) {
    $allSetting = Setting::first();
    $views->with('allSetting', $allSetting);
});

Route::get('/clear-log', function () {
    try {
        Artisan::call('log:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Toastr::success('Log Cleared Successfully', 'Success');
        return redirect()->back();
    } catch (\Throwable $th) {
        Toastr::error('Some Error Occcurs', 'Danger');
        return redirect()->back();
    }
})->name('clear_log');
