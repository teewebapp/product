<?php

namespace Tee\Product\Widgets;

use Tee\Product\Models\Product;
use View;

class Carousel 
{
    public function register(array $options=array())
    {
        $perPage = !empty($optons['perPage']) ? $optons['perPage'] : 3;
        $pages = !empty($optons['pages']) ? $optons['pages'] : 3; 

        $products = Product::limit($perPage * $pages)
            ->with('images')
            ->get();
        $frames = array_chunk($products->all(), $perPage);
        
        return View::make(
            'product::widgets.carousel.carousel',
            compact('frames')
        );
    }
} 