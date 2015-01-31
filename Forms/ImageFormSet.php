<?php

namespace Tee\Product\Forms;

use ModelForm\FormSet;

class ImageFormSet extends FormSet
{
    public function makeForm($model=null)
    {
        return new ImageForm(['model'=>$model]);
    }
}