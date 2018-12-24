<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locale = 'gb';
        $status = new \App\Models\Statuses(['is_default' => true,'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Submitted';
        $status->translateOrNew($locale)->description = '';
        $status->save();

        $status = new \App\Models\Statuses(['is_default' => true,'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Caneclled';
        $status->translateOrNew($locale)->description = '';
        $status->save();

        $status = new \App\Models\Statuses(['is_default' => true,'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Completed';
        $status->translateOrNew($locale)->description = '';
        $status->save();

        $status = new \App\Models\Statuses(['is_default' => true,'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Collected';
        $status->translateOrNew($locale)->description = '';
        $status->save();


    }
}
