<?php

namespace Tee\Product\Forms;

use ModelForm\Form,
    ModelForm\Fields\CharField,
    Tee\Product\Models\Promotion;

class PromotionForm extends Form
{
    public function makeFields()
    {
        $this->date_begin = new CharField(['label' => 'Início']);
        $this->date_end = new CharField(['label' => 'Fim']);
        $this->discount = new CharField(['label' => 'discount']);
    }

    public function makeModel() 
    {
        return new Promotion();
    }
}