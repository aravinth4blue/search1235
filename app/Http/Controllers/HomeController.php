<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Topic;
use App\Data;
use App\DataTopic;

class HomeController extends Controller
{
    public function welcome(){
        $domains = Data::getDomain();
        $mappedData = DataTopic::getMapData();
        //dd($mappedData);
        $datas = Data::getDatas($mappedData);
        $topics = Topic::getTopics();
        $data = array('domains'=>$domains, 'datas'=>$datas,'topics'=>$topics);
        return view('welcome')->with($data);
    }
    public function saveTopic(Request $request){
        //dd($request->topic);
        $topic = $request->topic;
        $dataId = $request->dataId;
        //dd($topic);
        $returnValue = Topic::saveTopic($topic);
        $lastInsertId = $returnValue->id;

        DataTopic::linkDataTopic($lastInsertId,$dataId);
        return response()->json(['status' => true]);
    }
    public function getTopic(Request $request){
        $topicId = $request->topicId;
        $topicIds = DataTopic::getByTopicId($topicId);
        $datas = Data::getDataByTopic($topicIds);
        $data = array('datas' => $datas);
        return view('data')->with($data);
    }
    public function getData(Request $request){
        $strDate = $request->strDate;
        $endDate  = $request->endDate;
        $domain = $request->domain;
        $filters =   Data::getDatabyFilter($strDate,$endDate,$domain);
        $data = array('filters' => $filters);
        return view('advanced')->with($data);
    }
     
}
