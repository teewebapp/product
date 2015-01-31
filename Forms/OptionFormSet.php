<?php

namespace Tee\Product\Forms;

use ModelForm\FormSet;

class OptionFormSet extends FormSet
{
    public function makeForm($model=null)
    {
        return new OptionForm(['model'=>$model]);
    }
}