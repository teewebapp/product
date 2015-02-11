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

        if($this->category)
            Breadcrumbs::addCrumb('Produtos', route("product.index"));

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

    public function show($slug)
    {
        $product = Product::where('slug', '=', $slug)
            ->with('images')
            ->with('attributes')
            ->firstOrFail();

        View::share('pageTitle', $product->name);
        if($product->description)
            View::share('pageDescription', $product->description);

        Breadcrumbs::addCrumb($product->category->name, $product->category->url);
        Breadcrumbs::addCrumb($product->name, $product->url);

        $openGraphAttributes = [
            'og:type' => 'product',
            'og:image' => $product->mainImage->imageUrl,
            'og:url' => $product->url,
            'product:price:amount' => $product->price,
            'product:price:currency' => 'BRL',
            'product:category' => $product->category->name,
        ];

        return View::make(
            'product::product.show',
            compact('product', 'openGraphAttributes')
        );
    }
}