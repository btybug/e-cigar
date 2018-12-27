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
        $settings = new \App\Models\Settings();
        $data = array();
        $locale = 'gb';
        $status = new \App\Models\Statuses(['is_default' => 1, 'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Submitted';
        $status->translateOrNew($locale)->description = '';
        $status->save();
        $data['submitted'] = $status->id;

        $status = new \App\Models\Statuses(['is_default' => 1, 'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Caneclled';
        $status->translateOrNew($locale)->description = '';
        $status->save();
        $data['canceled'] = $status->id;

        $status = new \App\Models\Statuses(['is_default' => 1, 'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Completed';
        $status->translateOrNew($locale)->description = '';
        $status->save();
        $data['completed'] = $status->id;

        $status = new \App\Models\Statuses(['is_default' => 1, 'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Collected';
        $status->translateOrNew($locale)->description = '';
        $status->save();
        $data['collected'] = $status->id;

        $status = new \App\Models\Statuses(['is_default' => 1, 'type' => 'order']);
        $status->save();
        $status->translateOrNew($locale)->name = 'Partially Collected';
        $status->translateOrNew($locale)->description = '';
        $status->save();
        $data['partially_collected'] = $status->id;

        $settings->updateOrCreateSettings('orders_statuses', $data);


    }
}
