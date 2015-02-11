<?php

namespace Tee\Product;

use Route;

Route::group(['prefix' => 'admin'], function() {
    Route::resource('product', __NAMESPACE__.'\Controllers\Admin\ProductController',
        ['except' => array('show')]
    );

    Route::resource('product_category', __NAMESPACE__.'\Controllers\Admin\ProductCategoryController',
        ['except' => array('show')]
    );
});

Route::any('/products', [
    'as' => 'product.index',
    'uses' => __NAMESPACE__.'\Controllers\ProductController@index'
]);

Route::any('/product/{slug}', [
    'as' => 'product.show',
    'uses' => __NAMESPACE__.'\Controllers\ProductController@show'
]);