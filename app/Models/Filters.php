<?php

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\CategoryTranslation;

class Filters extends Translatable
{
    /**
     * @var string
     */

    protected $table = 'filters';

    public $translationModel = FiltersTranslation::class;

    public $translatedAttributes = ['name'];
    /**
     * @var array
     */
    protected $guarded = ['id'];

    public function items()
    {
        return $this->belongsToMany(Items::class, 'filter_items', 'filter_id', 'item_id');
    }

    public static function recursiveItems($iems, $i = 0, $data = [], $selected = [])
    {
        if (count($iems)) {
            $item = $iems[$i];
            $data[$i] = [
                'id' => $item->id,
                'name' => $item->name,
                'text' => $item->name,
                'parent_id' => null,
                "state"=> false,
                'children' => []
            ];

            if(count($selected) && in_array($item->id,$selected)){
                $data[$i]['state'] = ['selected' => true];
            }

            $i = $i + 1;
            if ($i != count($iems)) {
                $data = self::recursiveItems($iems, $i, $data,$selected);
            }

            return $data;
        }
    }
}
