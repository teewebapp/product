<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

use URL;

class ProductImage extends Model implements StaplerableInterface
{
    use EloquentTrait;

    public static $rules = [
        
    ];

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'thumbnail' => 'x248',
            ]
        ]);

        parent::__construct($attributes);
    }

    public static function getAttributeNames()
    {
        return array(
            'name' => 'Nome',
            'description' => 'Descrição'
        );
    }

    public function product()
    {
        return $this->belongsTo(__NAMESPACE__.'\\Product', 'product_id');
    }
}