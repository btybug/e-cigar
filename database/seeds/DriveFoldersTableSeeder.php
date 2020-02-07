<?php

use Illuminate\Database\Seeder;

class DriveFoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            DB::table('drive_folders')->insert(['name' => 'drive', 'parent_id' => 0,'id'=>1]);
            $drive_folder = \DB::table('drive_folders')->where('name', 'drive')->where('parent_id',0)->first();
            DB::table('drive_settings')->insert(['slug'=>'drive','folder_id'=>$drive_folder->id]);



            // all bad
            DB::table('drive_folders')->insert(['name' => 'trash', 'parent_id' => 0,'id'=>2]);
            $trash_folder = \DB::table('drive_folders')->where('name', 'trash')->where('parent_id',0)->first();
            DB::table('drive_settings')->insert(['slug'=>'trash','folder_id'=>$trash_folder->id]);

            DB::table('drive_folders')->insert(['name' => 'banners', 'parent_id' => $drive_folder->id,'id'=>3]);
            $banner_folder = \DB::table('drive_folders')->where('name', 'banners')->first();
            DB::table('drive_settings')->insert(['slug'=>'banners','folder_id'=>$banner_folder->id]);

            DB::table('drive_folders')->insert(['name' => 'html', 'parent_id' => 0]);
            $html_folder = \DB::table('drive_folders')->where('name', 'html')->where('parent_id',0)->first();
            DB::table('drive_settings')->insert(['slug'=>'html','folder_id'=>$html_folder->id]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }

    }
}
