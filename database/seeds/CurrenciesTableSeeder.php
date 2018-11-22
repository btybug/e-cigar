<?php

/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/22/2018
 * Time: 5:38 PM
 */
use Illuminate\Database\Seeder;
class CurrenciesTableSeeder extends Seeder
{
    public function run(\App\Models\GetForexData $forexData)
    {
        $rates=$forexData->latest();
        $data=[];
        foreach ($rates['rates'] as $key=>$rate){
            if($key=='USDC'){
                $data[]=['currency'=>'USD','rate'=>1];
            }else{
                $data[]=['currency'=>$key,'rate'=>$rate];
            };
        }
        \DB::table('currencies')->insert($data);
    }
}