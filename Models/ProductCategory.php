<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use URL;

class ProductCategory extends Model implements SluggableInterface
{
    use SoftDeletingTrait;
    use SluggableTrait;

    public static $rules = [
        'name' => 'required'
    ];

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public static function getAttributeNames()
    {
        return array(
            'name' => 'Nome',
            'description' => 'Descrição',
        );
    }

    public function products()
    {
        return $this->belongsToMany(__NAMESPACE__.'\\Product');
    }
}