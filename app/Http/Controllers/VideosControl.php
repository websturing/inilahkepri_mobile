<?php

namespace App\Http\Controllers;

use App\mdVideos;
use Illuminate\Http\Request;

class VideosControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");

        if($type == 'videos'){
            return self::Allvideos($r);
        }
    }

    function Allvideos(Request $r){
        return mdVideos::orderBy("publishedAt","DESC")->limit(10)->get();

    }
}
