<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Topic extends Model
{
    //
    protected $table = 'topic';
    protected $primaryKey = 'id';
    public static function saveTopic($name){
	    try {
	    	$topic = new Topic();
	    	$topic->name = $name;
	    	$topic->save();
	    	return $topic;
	    }catch (ModelNotFoundException $e){
	            return $e;
	    } 
	}
	public static function getTopics(){
	    try {
	    	return Topic::get();
	    }catch (ModelNotFoundException $e){
	            return $e;
	    } 
	}
}
