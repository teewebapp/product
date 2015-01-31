<?php

namespace Tee\Product\Forms;

use ModelForm\Form,
    ModelForm\Fields\CharField,
    ModelForm\Fields\IntegerField,
    ModelForm\Fields\FloatField,
    Tee\Product\Models\Product,
    Tee\Product\Models\ProductCategory;

class InformationForm extends Form
{
    public function makeFields()
    {
        $this->reference = new CharField(['label' => Product::getAttributeName('reference')]);
        $this->name = new CharField(['label' => Product::getAttributeName('name')]);
        $this->price = new FloatField(['label' => Product::getAttributeName('price')]);
        $this->weight = new FloatField(['label' => Product::getAttributeName('weight')]);
        $this->text = new CharField(['label' => Product::getAttributeName('text')]);
        $this->stock = new IntegerField(['label' => Product::getAttributeName('stock')]);
        $this->description = new CharField(['label' => Product::getAttributeName('description')]);
        $this->category_id = new IntegerField(['label' => Product::getAttributeName('category_id')]);
        $this->category_id->setOptions(function() {
            $result = array(''=>'');
            foreach(ProductCategory::get() as $category)
                $result[$category->id] = $category->fullName;
            return $result;
        });
    }

    public function makeModel()
    {
        return new Product();
    }

    public function makeValidator($data)
    {
        $validator = $this->_model->getValidator($data, null);
        $validator->setAttributeNames(Product::getAttributeNames());
        return $validator;
    }
}