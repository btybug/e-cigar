<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_permissions')->insert([
            [
                'slug' => 'finish_order',
                'type' => 'order',
                'description' => 'this allow to complete any order '
            ],
            [
                'slug' => 'edit_order',
                'type' => 'order',
                'description' => 'this allow to make changes in already completed orders'
            ]
        ]);
    }
}
