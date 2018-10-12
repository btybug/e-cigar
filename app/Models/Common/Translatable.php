<?php
namespace App\Models\Common;


use Illuminate\Database\Eloquent\Model;

class Translatable extends Model
{
    use \Dimsav\Translatable\Translatable;

    public static function callBoot()
    {


        self::updated(function ($model){

            $translatableData = \Request::get('translatable');
            if($translatableData && count($translatableData)){
                foreach ($translatableData as $locale => $translateData){
                    //here need check locales later
                    if(count($translateData)){
                        foreach ($translateData as $column => $translate){
                            if($translate){
                                $model->translateOrNew($locale)->{$column} = ($translate);
                            }
                        }
                    }
                }

                if(! is_enabled_model_boot()){
                    $model->save();
                    global $_MODEL_BOOTED;
                    $_MODEL_BOOTED = true;
                }
            }
        });

        self::created(function ($model) {
            $translatableData = \Request::get('translatable');
            if($translatableData && count($translatableData)){
                foreach ($translatableData as $locale => $translateData){
                    //here need check locales later
                    if(count($translateData)){
                        foreach ($translateData as $column => $translate){
                            if($translate){
                                $model->translateOrNew($locale)->{$column} = ($translate);
                            }
                        }

                    }
                }
            }
        });

    }
}