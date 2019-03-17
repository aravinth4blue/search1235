<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Topic;
use App\Data;


class HomeController extends Controller
{
    public function welcome(){
        $domains = Data::getDomain();
        $datas = Data::getDatas();
        $data = array('domains'=>$domains, 'datas'=>$datas);
        return view('welcome')->with($data);
    }
    public function saveTopic(Request $request){
        $name = $request->name;
        Topic::saveTopic($name);
        return response()->json();
    }
     
}
