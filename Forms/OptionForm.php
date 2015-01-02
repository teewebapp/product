<?php

namespace Tee\Product\Forms;

use ModelForm\Form,
    ModelForm\Fields\CharField,
    Tee\Product\Models\ProductAttribute;


class OptionForm extends Form
{
    public function makeFields()
    {
        $this->name = new CharField(['label' => 'Nome']);
        $this->value = new CharField(['label' => 'Valor']);
    }

    public function makeModel()
    {
        return new ProductAttribute();
    }
}