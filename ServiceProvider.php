<?php

namespace Tee\Product;

use Event;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        Event::listen('admin::menu.load', function($menu) {
            $format = '<img src="%s" class="fa" />&nbsp;&nbsp;<span>%s</span>';

            $menu->add(
                sprintf($format, moduleAsset('product', 'images/icon_category.png'), 'Categorias'),
                route('admin.product_category.index')
            );

            $menu->add(
                sprintf($format, moduleAsset('product', 'images/icon_product.png'), 'Produtos'),
                route('admin.product.index')
            );
        });
    }   
}