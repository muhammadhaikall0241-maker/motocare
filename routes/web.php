
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;

// Dashboard
Route::get('/', [PanelController::class, 'dashboard'])
    ->name('dashboard');

// Modul MotoCare
Route::prefix('panel')
    ->name('panel.')
    ->controller(PanelController::class)
    ->group(function () {

        Route::get('/{module}', 'index')
            ->where('module', 'customers|vehicles|service-registrations|service-details|service-payments')
            ->name('index');

        Route::get('/{module}/create', 'create')
            ->where('module', 'customers|vehicles|service-registrations|service-details|service-payments')
            ->name('create');

        Route::post('/{module}', 'store')
            ->where('module', 'customers|vehicles|service-registrations|service-details|service-payments')
            ->name('store');

        Route::get('/{module}/{id}/edit', 'edit')
            ->where('module', 'customers|vehicles|service-registrations|service-details|service-payments')
            ->name('edit');

        Route::put('/{module}/{id}', 'update')
            ->where('module', 'customers|vehicles|service-registrations|service-details|service-payments')
            ->name('update');

        Route::delete('/{module}/{id}', 'destroy')
            ->where('module', 'customers|vehicles|service-registrations|service-details|service-payments')
            ->name('destroy');
    });
