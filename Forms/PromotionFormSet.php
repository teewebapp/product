<?php

namespace Tee\Product\Forms;

use ModelForm\FormSet;

class PromotionFormSet extends FormSet
{
    public function makeForm($model=null)
    {
        return new PromotionForm(['model'=>$model]);
    }
}