<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model;

use URL;

class ProductAttribute extends Model
{
    public static $rules = [
        'name' => 'required'
    ];

    protected $fillable = [
        'product_id',
        'name',
        'value',
        'type',
    ];

    public static function getAttributeNames()
    {
        return array(
            'name' => 'Nome',
        );
    }

    public function options() {
        return $this->hasMany(__NAMESPACE__.'\\ProductAttributeOption');
    }

}