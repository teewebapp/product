<?php

namespace Tee\Product\Forms;

use ModelForm\FormSet;

class OptionFormSet extends FormSet
{
    public function makeForm()
    {
        return new OptionForm();
    }
}