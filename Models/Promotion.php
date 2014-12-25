<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model;

use URL;

class Promotion extends Model
{
    public static $rules = [
        'discount' => 'required'
    ];

    protected $fillable = [
        'name',
        'global',
        'date_begin',
        'date_end',
        'discount',
        'discount_type',
    ];

    public static function getAttributeNames()
    {
        return array(
            'name' => 'Nome',
        );
    }

}