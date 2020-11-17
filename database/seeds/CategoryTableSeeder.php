<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CategoryType::create([
           'name'=>'Products/Items',
           'slug' => 'stocks',
           'is_core' => true
        ]);


        $locale='gb';

        $category = new \App\Models\Category(['slug' => 'vape','user_id' => 1,'type' => 'stocks','is_core' => 1]);
        $category->save();
        $category->translateOrNew($locale)->name = 'Vape';
        $category->translateOrNew($locale)->description = '';
        $category->save();

        $category = new \App\Models\Category(['slug' => 'parts','user_id' => 1,'type' => 'stocks','is_core' => 1]);
        $category->save();
        $category->translateOrNew($locale)->name = 'Parts';
        $category->translateOrNew($locale)->description = '';
        $category->save();

        $category = new \App\Models\Category(['slug' => 'juice','user_id' => 1,'type' => 'stocks','is_core' => 1]);
        $category->save();
        $category->translateOrNew($locale)->name = 'Juice';
        $category->translateOrNew($locale)->description = '';
        $category->save();

        $category = new \App\Models\Category(['slug' => 'newsletter','user_id' => 1,'type' => 'notifications','is_core' => 1]);
        $category->save();
        $category->translateOrNew($locale)->name = 'Newsletter';
        $category->translateOrNew($locale)->description = '';
        $category->save();

        $category = new \App\Models\Category(['slug' => 'special-offers','user_id' => 1,'type' => 'notifications','is_core' => 1]);
        $category->save();
        $category->translateOrNew($locale)->name = 'Special offer';
        $category->translateOrNew($locale)->description = '';
        $category->save();
    }
}
