<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model,
    Cviebrock\EloquentSluggable\SluggableInterface,
    URL,
    Validator,
    Cviebrock\EloquentSluggable\SluggableTrait;

class ProductCategory extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $fillable = [
        'name',
        'description',
        'category_id'
    ];

    public static function getAttributeNames()
    {
        return array(
            'name' => 'Nome',
            'fullName' => 'Nome',
            'description' => 'Descrição',
            'category_id' => 'Categoria Pai'
        );
    }

    public function products()
    {
        return $this->hasMany(__NAMESPACE__.'\\Product', 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(__NAMESPACE__.'\\ProductCategory', 'category_id');
    }

    public function getValidator($data, $scope)
    {
        return Validator::make($data, [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
    }

    public function getFullNameAttribute()
    {
        $name = $this->name;
        $aux = $this;
        while($aux->parent) {
            $name = $aux->parent->name . ' > ' . $name;
            $aux = $aux->parent;
        }
        return $name;
    }
}