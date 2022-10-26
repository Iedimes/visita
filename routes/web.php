<?php

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
    return view('brackets/admin-auth::admin.auth.login');
});



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('states')->name('states/')->group(static function() {
            Route::get('/',                                             'StateController@index')->name('index');
            Route::get('/create',                                       'StateController@create')->name('create');
            Route::post('/',                                            'StateController@store')->name('store');
            Route::get('/{state}/edit',                                 'StateController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StateController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{state}',                                     'StateController@update')->name('update');
            Route::delete('/{state}',                                   'StateController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('dependencies')->name('dependencies/')->group(static function() {
            Route::get('/',                                             'DependencyController@index')->name('index');
            Route::get('/create',                                       'DependencyController@create')->name('create');
            Route::post('/',                                            'DependencyController@store')->name('store');
            Route::get('/{dependency}/edit',                            'DependencyController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DependencyController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dependency}',                                'DependencyController@update')->name('update');
            Route::delete('/{dependency}',                              'DependencyController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('states')->name('states/')->group(static function() {
            Route::get('/',                                             'StatesController@index')->name('index');
            Route::get('/create',                                       'StatesController@create')->name('create');
            Route::post('/',                                            'StatesController@store')->name('store');
            Route::get('/{state}/edit',                                 'StatesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{state}',                                     'StatesController@update')->name('update');
            Route::delete('/{state}',                                   'StatesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('visits')->name('visits/')->group(static function() {
            Route::get('/',                                             'VisitsController@index')->name('index');
            Route::get('/create',                                       'VisitsController@create')->name('create');
            Route::get('/createsc',                                       'VisitsController@createsc')->name('createsc');
            Route::post('/',                                            'VisitsController@store')->name('store');
            Route::post('/',                                            'VisitsController@storesc')->name('storesc');
            Route::get('/{visit}/edit',                                 'VisitsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VisitsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{visit}',                                     'VisitsController@update')->name('update');
            Route::delete('/{visit}',                                   'VisitsController@destroy')->name('destroy');
            Route::get('/{id}/identificaciones',                        'VisitsController@getIdentificaciones')->name('identificaciones');
            Route::get('/{visit}/actualizar',                           'VisitsController@actualizar')->name('actualizar');
            Route::get('/inicio',                                       'VisitsController@inicio')->name('inicio');
            Route::get('/imprimir',                                      'VisitsController@pdf')->name('imprimir');

        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('dependencies')->name('dependencies/')->group(static function() {
            Route::get('/',                                             'DependenciesController@index')->name('index');
            Route::get('/create',                                       'DependenciesController@create')->name('create');
            Route::post('/',                                            'DependenciesController@store')->name('store');
            Route::get('/{dependency}/edit',                            'DependenciesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DependenciesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dependency}',                                'DependenciesController@update')->name('update');
            Route::delete('/{dependency}',                              'DependenciesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('meetings')->name('meetings/')->group(static function() {
            Route::get('/',                                             'MeetingsController@index')->name('index');
            Route::get('/create',                                       'MeetingsController@create')->name('create');
            Route::get('/createsc',                                       'MeetingsController@createsc')->name('createsc');
            Route::post('/',                                            'MeetingsController@store')->name('store');
            Route::post('/',                                            'MeetingsController@storesc')->name('storesc');
            Route::get('/{meeting}/edit',                               'MeetingsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MeetingsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{meeting}',                                   'MeetingsController@update')->name('update');
            Route::delete('/{meeting}',                                 'MeetingsController@destroy')->name('destroy');
            Route::get('/{id}/identificaciones',                        'MeetingsController@getIdentificaciones')->name('identificaciones');
            Route::get('/{meeting}/entrada',                            'MeetingsController@entrada')->name('entrada');
            Route::get('/{meeting}/salida',                             'MeetingsController@salida')->name('salida');
            Route::get('/{meeting}/reprogramar',                        'MeetingsController@reprogramar')->name('reprogramar');
            Route::get('/{meeting}/cancelar',                           'MeetingsController@cancelar')->name('cancelar');
            Route::get('/inicio',                                       'MeetingsController@inicio')->name('inicio');
            Route::get('/generar',                                      'MeetingsController@pdf')->name('generar');



        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('role-admin-users')->name('role-admin-users/')->group(static function() {
            Route::get('/',                                             'RoleAdminUsersController@index')->name('index');
            Route::get('/create',                                       'RoleAdminUsersController@create')->name('create');
            Route::post('/',                                            'RoleAdminUsersController@store')->name('store');
            Route::get('/{roleAdminUser}/edit',                         'RoleAdminUsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RoleAdminUsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{roleAdminUser}',                             'RoleAdminUsersController@update')->name('update');
            Route::delete('/{roleAdminUser}',                           'RoleAdminUsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});


