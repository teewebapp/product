<?php

namespace Tee\Product\Forms;

use ModelForm\FormSet;

class PromotionFormSet extends FormSet
{
    public function makeForm()
    {
        return new PromotionForm();
    }
}