<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model;

use URL;

class ProductAttributeOption extends Model
{
    public static $rules = [
        'value' => 'required'
    ];

    protected $fillable = [
        'product_atribute_id',
        'value',
        'price_diff',
        'weight_diff',
        'stock',
    ];

    public static function getAttributeNames()
    {
        return array(
            'name' => 'Nome',
        );
    }

    public function attribute()
    {
        return $this->belongsTo(__NAMESPACE__.'\\ProductAttribute');
    }

}