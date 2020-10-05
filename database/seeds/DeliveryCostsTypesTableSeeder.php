<?php

use Illuminate\Database\Seeder;

class DeliveryCostsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_cost_types')->insert([
            [
                'title' => 'Based on Order amount',
                'is_core' => 1,
                'is_enabled' => 1
            ], [
                    'title' => 'Based on weight',
                    'is_core' => 1,
                    'is_enabled' => 1
                ]]
        );
    }
}
