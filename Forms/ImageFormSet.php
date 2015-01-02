<?php

namespace Tee\Product\Forms;

use ModelForm\FormSet;

class ImageFormSet extends FormSet
{
    public function makeForm()
    {
        return new ImageForm();
    }
}