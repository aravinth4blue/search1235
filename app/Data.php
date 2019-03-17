<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    //
    protected $table = 'data';
    protected $primaryKey = 'id';
    public static function getDomain(){
        try {
            return Data::select('articles_source_name')
            			->distinct()
                        ->get();

        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
    public static function getDatas(){
        try {
            return Data::get();

        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
}
