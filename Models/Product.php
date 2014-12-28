<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use URL;

class Product extends Model implements SluggableInterface
{
    use SoftDeletingTrait;
    use SluggableTrait;

    public static $rules = [
        'name' => 'required',
        'reference' => 'required',
        'price' => 'required',
    ];

    protected $fillable = [
        'name',
        'description',
        'reference',
        'text',
        'price',
        'weight',
        'slug',
        'stock'
    ];

    public static function getAttributeNames()
    {
        return array(
            'name' => 'Nome',
            'reference' => 'Referência',
            'description' => 'Descrição (Resumo)',
            'text' => 'Texto',
            'price' => 'Preço',
            'weight' => 'Peso (gramas)',
            'stock' => 'Estoque'
        );
    }

    public function images()
    {
        return $this->hasMany(__NAMESPACE__.'\\ProductImage', 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(__NAMESPACE__.'\\Product');
    }

    public function attributes()
    {
        return $this->hasMany(__NAMESPACE__.'\\ProductAttribute', 'product_id');
    }

    public function promotions()
    {
        return $this->belongsToMany(__NAMESPACE__.'\\Promotion');
    }
}