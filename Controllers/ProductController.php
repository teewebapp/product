<?php

namespace Tee\Product\Controllers;

use Tee\System\Controllers\BaseController;
use Tee\Product\Models\Product;
use Tee\Product\Models\ProductCategory;
use View;
use Tee\System\Breadcrumbs;
use Input;

class ProductController extends BaseController
{
    public $category;

    public function __construct()
    {
        parent::__construct();

        if(Input::get('category'))
            $this->category = ProductCategory::where('slug', '=', Input::get('category'))->first();

        if($this->category)
            $title = $this->category->name;
        else
            $title = 'Produtos';

        View::share('pageTitle', $title);
        Breadcrumbs::addCrumb($title, route("product.index", ['category'=>Input::get('category')]));
    }

    public function index()
    {
        if($this->category)
            $query = $this->category->deepProducts();
        else
            $query = Product::query();

        $products = $query->with('images')->paginate(9);
        return View::make(
            'product::product.index',
            compact('products')
        );
    }

    public function show()
    {
        $slug = Input::get('product');
        $product = Product::where('slug', '=', $slug)
            ->with('images')
            ->findOrFail();

        View::share('pageTitle', $product->name);
        Breadcrumbs::addCrumb($product->name, $product->url);

        return View::make(
            'product::product.show',
            compact('product')
        );
    }
}