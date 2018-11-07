<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/18/2018
 * Time: 5:03 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'bty_settings';
    protected $fillable = ['section', 'key', 'val'];

    public function updateOrCreateSettings($section, array $data)
    {
        $result=[];
        foreach ($data as $key=>$val){
           if($this->where('section',$section)->where('key',$key)->exists()){
               $result[]=  $this->where('section',$section)->where('key',$key)->update(['val'=>$val]);
           }else{
               $result[]=  $this->create(['section'=>$section,'key'=>$key,'val'=>$val]);
           };
        }
        return collect($result);
    }

    public function getEditableData($section)
    {
        $_this = new self();
        $result=['attributes'];
        $settings=$_this->where('section',$section)->get();
        foreach ($settings as $setting){
            $_this->setAttribute($setting->key,$setting->val);
        }
        return $_this;
    }
}
