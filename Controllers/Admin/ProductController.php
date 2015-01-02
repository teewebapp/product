<?php

namespace Tee\Product\Controllers\Admin;

use Tee\Admin\Controllers\AdminBaseController,
    Tee\System\Breadcrumbs,
    Tee\Product\Models\ProductCategory,
    Tee\Product\Models\Product,
    Tee\Product\Models\ProductImage,
    Tee\Product\Models\Promotion,
    Tee\Product\Models\ProductAttribute,
    Tee\Product\Forms\InformationForm,
    Tee\Product\Forms\ImageFormSet,
    Tee\Product\Forms\OptionFormSet,
    Tee\Product\Forms\PromotionFormSet,
    View,
    URL,
    Redirect,
    Input,
    Validator;

class ProductController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();

        View::share('pageTitle', 'Produtos');

        Breadcrumbs::addCrumb(
            'Produtos',
            URL::route("admin.product.index")
        );
    }

    /**
     * Display a listing of products
     *
     * @return Response
     */
    public function index()
    {
        $models = Product::get();

        return View::make(
            'product::admin.product.index',
            compact('models')
        );
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create()
    {
        $informationForm = new InformationForm([
            'data' => Input::all()
        ]);

        $model = $informationForm->getModel();

        $imageFormSet = new ImageFormSet();
        $optionFormSet = new OptionFormSet();
        $promotionFormSet = new PromotionFormSet();

        return View::make(
            'product::admin.product.create',
            compact(
                'informationForm',
                'imageFormSet',
                'optionFormSet',
                'promotionFormSet'
            ) + array(
                'pageTitle' => 'Cadastrar Produto',
            )
        );

    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */
    public function store()
    {
        $model= new Product();

        $informationForm = new InformationForm([
            'instance' => $model
        ]);

        

        $validator = $model->getValidator(Input::all(), 'create');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->save();

        return Redirect::route("admin.product.index");
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $model = Product::find($id);

        return View::make(
            'product::admin.product.edit',
            compact('model')  + array(
                'pageTitle' => 'Editar Produto',
            )
        );
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $model = Product::findOrFail($id);
        $model->fill(Input::all());

        $validator = $model->getValidator(Input::all(), 'update');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->save();

        return Redirect::route("admin.product.index");
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return Redirect::route("admin.product.index");
    }
}