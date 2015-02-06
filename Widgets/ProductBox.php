<?php

namespace Tee\Product\Widgets;

use Tee\Product\Models\Product;
use View;

class ProductBox
{
    public function register(array $options=array())
    {
        $product = $options['product'];
        $cssClass = !empty($options['cssClass']) ? $options['cssClass'] : 'col-md-4';
        
        return View::make(
            'product::widgets.productBox.productBox',
            compact('product', 'cssClass')
        );
    }
} 