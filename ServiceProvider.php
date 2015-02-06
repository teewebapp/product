<?php

namespace Tee\Product;

use Event;
use View;
use Tee\System\Widget;

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

        Event::listen('front::menu.load', function($menu) {
            $menu->add('Produtos', route('product.index'));
        });

        // registra os widgets
        Widget::register(
            'productCarousel',
            __NAMESPACE__.'\\Widgets\\Carousel'
        );

        Widget::register(
            'productBox',
            __NAMESPACE__.'\\Widgets\\ProductBox'
        );

        // Using class based composers...
        View::composer(
            'product::partials.categories',
            __NAMESPACE__.'\\ViewComposers\\CategoriesComposer'
        );
    }   
}