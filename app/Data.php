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
    public static function getDatas($mappedData){
        try {
            return Data::whereNotIn('id',$mappedData)
            			->get();

        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
    public static function getDataByTopic($topicIds){
        try {
            return Data::whereIn('id',$topicIds)
            			->get();

        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }
    public static function getDatabyFilter($strDate,$endDate,$domain){
    	try {
            return Data::where('articles_source_id', 'LIKE','%' .$domain. '%' )
            			//->whereBetween('articles_published_at',array($strDate,$endDate))
            			->get();

        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

}
