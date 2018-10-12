<?php

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\CategoryTranslation;

class Category extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'categories';
    public $translationModel = CategoryTranslation::class;
    public $translatedAttributes = ['name', 'description'];
    /**
     * @var array
     */
    protected $guarded = ['id'];


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public static function recursiveItems($iems, $i = 0, $data = [])
    {
        if (count($iems)) {
            $item = $iems[$i];
            $data[$i] = [
               'id' => $item->id,
               'name' => $item->name,
               'parent_id' => $item->parent_id,
                'children' => []
            ];

            if (count($item->children)) {
                $data[$i]['children'] = self::recursiveItems($item->children, 0, $data[$i]['children']);
            }

            $i = $i + 1;
            if ($i != count($iems)) {
                $data = self::recursiveItems($iems, $i, $data);
            }

            return $data;
        }
    }
}