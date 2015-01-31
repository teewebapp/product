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

    public function makeValidator($data)
    {
        $validator = $this->_model->getValidator($data, null);
        $validator->setAttributeNames(ProductImage::getAttributeNames());
        return $validator;
    }

    public function jsonSerialize()
    {
        $result = parent::jsonSerialize();
        $result['imageUrl'] = $this->getModel()->imageUrl;
        $aux = explode(DIRECTORY_SEPARATOR, $result['imageUrl']);
        $result['baseName'] = array_pop($aux);
        return $result;
    }
}