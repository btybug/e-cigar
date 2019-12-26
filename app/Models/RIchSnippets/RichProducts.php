<?php


namespace App\Models\RIchSnippets;


use App\Models\Stock;

class RichProducts
{
    protected $related = Stock::class;
    public $properties = [
        'name' => [
            'label' => 'Name',
            'db_column' => 'name'
        ],
        'image' => [
            'label' => 'Image',
            'db_column' => 'image'
        ],
        'url' => [
            'label' => 'Url',
            'db_column' => 'slug'
        ],
        'brand' => [
            'label' => 'Brand',
            'db_column' => 'brand.name'
        ],
        'category' => [
            'label' => 'Category',
            'db_column' => 'category.name'
        ],

    ];


}
