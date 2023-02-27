<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $table = 'langs';

    public function get_lang_id_by_code($code){
        try {
           $id_lang = Lang::select('id')->where('code',$code)->first();
           return $id_lang;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function get_lang_code_by_id($id){
        try {
            $code = Lang::select('code')->where('id',$id)->first();
            return $code;
         } catch (\Throwable $th) {
             return 'en';
         }
    }
}
