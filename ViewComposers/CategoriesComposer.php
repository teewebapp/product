<?php

namespace Tee\Product\ViewComposers;

use Tee\Product\Models\ProductCategory;

class CategoriesComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose($view)
    {
        if(!isset($view['categories'])) {
            $categories = ProductCategory::whereNull('category_id')
                ->with('subitems')
                ->get();
            $view->with('categories', $categories);
            $view->with('parent', null);
        }
    }
}