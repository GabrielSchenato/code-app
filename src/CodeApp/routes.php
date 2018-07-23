<?php

Route::name('admin.')
        ->prefix('admin/')
        ->middleware('web', 'auth', 'authorization:access_users')
        ->namespace('CodePress\CodeApp\Controllers')
        ->group(function () {
            Route::get('layouts/active/{layout}', 'LayoutsController@active')->name('layouts.active');
            Route::resource('layouts', 'LayoutsController')->only([
                'index', 'create', 'store'
            ]);                         
});
