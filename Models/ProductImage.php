<?php

namespace Tee\Product\Models;

use Tee\System\Models\Model;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Validator;
use URL;

class ProductImage extends Model implements StaplerableInterface
{
    use EloquentTrait;

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
            'image' => 'Imagem',
            'description' => 'Descrição'
        );
    }

    public function product()
    {
        return $this->belongsTo(__NAMESPACE__.'\\Product', 'product_id');
    }

    public function getImageUrlAttribute()
    {
        if($this->image_file_name)
            return URL::to($this->image->url());
        else
            return URL::to(moduleAsset('system', 'images/no-photo.jpg'));
    }

    public function getValidator($data, $scope)
    {
        $v = Validator::make($data, []);
        $v->sometimes('image', 'required', function() {
            return empty($this->image_file_name);
        });
        return $v;
    }
}