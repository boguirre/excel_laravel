<?php

use App\Http\Controllers\DeudaController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return redirect()->route('deudas.consulta');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//INVOICES
Route::get('/invoices/export', [InvoiceController::class, 'export'])->name('invoices.export');

Route::get('/invoices/import', [InvoiceController::class, 'import'])->name('invoices.import');

Route::post('/invoices/import', [InvoiceController::class, 'importStore'])->name('invoices.importStore');

//DEUDAS}
Route::get('/deudas/main', [DeudaController::class, 'index'])->name('deudas.index');

Route::get('/deudas/import', [DeudaController::class, 'import'])->name('deudas.import');

Route::get('/consulta/deudas', [DeudaController::class, 'consulta'])->name('deudas.consulta');

Route::post('/deudas/import', [DeudaController::class, 'importStore'])->name('deudas.importStore');
