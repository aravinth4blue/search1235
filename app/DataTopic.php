<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DataTopic extends Model
{
    //
    protected $table = 'data_topic_rel';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public static function linkDataTopic($topicId,$dataId){
	    try {
	    	$datatopic = new DataTopic();
	    	$datatopic->data_id = $dataId;
	    	$datatopic->topic_id =$topicId;
	    	$datatopic->save();
	    	//return $topic;
	    }catch (ModelNotFoundException $e){
	            return $e;
	    } 
	}
	 public static function getMapData(){
    	 try {
    	 	return DataTopic::pluck('data_id')
                        	->toArray();
    	 }catch (ModelNotFoundException $e){
	            return $e;
	    } 
    }
    public static function getByTopicId($topicId){
    	try {

    	 	return DataTopic::where('topic_id',$topicId)
    	 					->pluck('data_id')
                        	->toArray();
    	 }catch (ModelNotFoundException $e){
	            return $e;
	    } 
    }
}
