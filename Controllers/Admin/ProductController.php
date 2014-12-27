<?php

namespace Tee\Product\Controllers\Admin;

use Tee\Admin\Controllers\ResourceController,
    Tee\Product\Models\ProductCategory,
    Tee\Product\Models\Product,
    View;

class ProductController extends ResourceController
{
    public $resourceTitle = 'Produto';
    public $resourceName = 'product';
    public $modelClass = 'Tee\Product\Models\Product';
    public $moduleName = 'product'; 

    public function beforeRenderForm($view, $model)
    {
        return $view;
    }
}