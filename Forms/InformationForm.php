<?php

namespace Tee\Product\Forms;

use ModelForm\Form,
    ModelForm\Fields\CharField,
    Tee\Product\Models\Product;

class InformationForm extends Form
{
    public function makeFields()
    {
        $this->reference = new CharField(['label' => 'Referência']);
        $this->name = new CharField(['label' => 'Nome']);
        $this->price = new CharField(['label' => 'Preço']);
        $this->weight = new CharField(['label' => 'Peso']);
        $this->stock = new CharField(['label' => 'Estoque']);
        $this->description = new CharField(['label' => 'Descrição']);
    }

    public function makeModel()
    {
        return new Product();
    }
}