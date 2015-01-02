<?php

namespace Tee\Product\Forms;

use ModelForm\Form,
    ModelForm\Fields\CharField,
    Tee\Product\Models\ProductImage;

class ImageForm extends Form 
{
    public function makeFields()
    {
        $this->image = new CharField(['label' => 'Imagem']);
    }

    public function makeModel()
    {
        return new ProductImage();
    }

    public function jsonSerialize()
    {
        $result = parent::jsonSerialize();
        $result['imageUrl'] = $this->getModel()->imageUrl;
        return $result;
    }
}