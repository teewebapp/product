<?php

namespace Tee\Product\Controllers\Admin;

use Tee\Admin\Controllers\AdminBaseController;
use Tee\System\Breadcrumbs;
use Tee\Product\Models\Product;
use Tee\Product\Models\ProductCategory;
use Tee\Product\Forms\InformationForm;
use Tee\Product\Forms\ImageFormSet;
use Tee\Product\Forms\OptionFormSet;
use Tee\Product\Forms\PromotionFormSet;
use ModelForm\Form;
use View;
use URL;
use Redirect;
use Input;

class ProductController extends AdminBaseController
{
    public $category = null;

    public function __construct()
    {
        parent::__construct();

        if(Input::get('category'))
            $this->category = ProductCategory::find((int)Input::get('category'));

        $title = 'Produtos'.($this->category ? ': '.$this->category->name : '');

        View::share('pageTitle', $title);
        Breadcrumbs::addCrumb($title, route("admin.product.index"));
    }

    /**
     * Display a listing of products
     *
     * @return Response
     */
    public function index()
    {
        if($this->category)
            $query = $this->category->products();
        else
            $query = Product::query();

        $models = $query->paginate(15);

        return View::make(
            'product::admin.product.index',
            compact('models')
        );
    }

    /**
     * Get forms
     * @param array $inputData data for fill forms
     * @param int $productId id of the product
     * @return array
     */
    public function getForms($inputData, $productId=null) {
        if($productId)
            $product = Product::find($productId);
        else
            $product = new Product();

        if($this->category && empty($product->category_id))
            $product->category_id = $this->category->id;

        $informationForm = new InformationForm(['model' => $product, 'data' => $inputData]);
        $imageFormSet = new ImageFormSet(['data' => $inputData, 'relation' => $product->images()]);
        //$optionFormSet = new OptionFormSet(['data' => $inputData, 'relation' => $product->attributes()]);
        //$promotionFormSet = new PromotionFormSet(['data' => $inputData, 'relation' => $product->promotions()]);

        return array(
            'informationForm' => $informationForm,
            'imageFormSet' => $imageFormSet,
            //'optionFormSet' => $optionFormSet,
            //'promotionFormSet' => $promotionFormSet,
        );
    }

    /**
     * Validate forms
     * @param array $forms array of forms
     * @return bool
     */
    public function validateForms($forms)
    {
        foreach($forms as $form) {
            if(!$form->isValid())
                return false;
        }
        return true;
    }

    /**
     * Save forms
     * @param array $forms array of forms
     * @return bool
     */
    public function saveForms($forms)
    {
        foreach($forms as $form)
            $form->save();
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create()
    {
        $forms = $this->getForms(Input::old() ?: null);
        return View::make(
            'product::admin.product.create',
            $forms + array(
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
        $forms = $this->getForms(Input::all());

        if(!$this->validateForms($forms)) {
            return Redirect::back()->withErrors(
                \ModelForm\Form::mergeErrors($forms)
            )->withInput();
        }
            
        $this->saveForms($forms);

        return Redirect::route("admin.product.index", ['category'=>Input::get('category')]);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $forms = $this->getForms(Input::old() ?: null, $id);

        return View::make(
            'product::admin.product.edit',
            $forms + array(
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
        $forms = $this->getForms(Input::all(), $id);

        if(!$this->validateForms($forms)) {
            return Redirect::back()->withErrors(
                \ModelForm\Form::mergeErrors($forms)
            )->withInput();
        }
            
        $this->saveForms($forms);

        return Redirect::route("admin.product.index", ['category'=>Input::get('category')]);
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

        return Redirect::route("admin.product.index", ['successMessage'=>'Produto removido com sucesso', 'category' => Input::get('category')]);
    }

}