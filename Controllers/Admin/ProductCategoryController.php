<?php

namespace Tee\Product\Controllers\Admin;

use Tee\Admin\Controllers\ResourceController,
    Tee\Product\Models\ProductCategory,
    View;

class ProductCategoryController extends ResourceController
{
    public $resourceTitle = 'Categoria';
    public $resourceName = 'product_category';
    public $modelClass = 'Tee\Product\Models\ProductCategory';
    public $moduleName = 'product';

    public function getColumns()
    {
        return [
            'fullName'
        ];
    }

    public function beforeRenderForm($view, $model)
    {
        $selectOtherCategories = [0 => 'Nenhuma'];
        if($model->id)
            $categories = ProductCategory::where('id', '!=', $model->id)->get();
        else
            $categories = ProductCategory::get();
        foreach($categories as $category) {
            $selectOtherCategories[$category->id] = $category->fullName;
        }
        $view->with('selectOtherCategories', $selectOtherCategories);
        return $view;
    }

    public function beforeSave($model)
    {
        if(!$model->category_id)
            $model->category_id = null;
    }

    public function beforeList($query)
    {
        return $query->orderBy('category_id');
    }
}