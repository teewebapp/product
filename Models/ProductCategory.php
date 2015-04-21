<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model,
    Cviebrock\EloquentSluggable\SluggableInterface,
    URL,
    Validator,
    Cviebrock\EloquentSluggable\SluggableTrait,
    Tee\System\Traits\CurrentSiteTrait;

class ProductCategory extends Model implements SluggableInterface
{
    use CurrentSiteTrait;
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
            'category_id' => 'Categoria Pai',
            'productCount' => 'Qtde. Produtos',
        );
    }

    public function products()
    {
        return $this->hasMany(__NAMESPACE__.'\\Product', 'category_id');
    }

    public function deepProducts()
    {
        $listIdCategory = $this->deepSubitems()->fetch('id');
        $listIdCategory->add($this->id);
        return Product::whereIn('category_id', $listIdCategory->toArray());
    }

    public function deepSubitems()
    {
        $subitems = $this->subitems;

        foreach($subitems as $subitem) {
            foreach($subitem->deepSubitems() as $subitem) {
                $subitems->add($subitem);
            }
        }

        return $subitems;
    }

    public function subitems()
    {
        return $this->hasMany(__NAMESPACE__.'\\ProductCategory', 'category_id');
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

    /**
     * Get product count
     *
     * @return int
     */
    public function getProductCountAttribute()
    {
        return $this->products()->count();
    }

    public function getUrlAttribute() 
    {
        return route('product.index', ['category'=>$this->slug]);
    }
}