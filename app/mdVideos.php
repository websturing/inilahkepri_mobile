<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mdVideos extends Model
{
    protected $table        = "videos";
    protected $primaryKey   = "videos_id";

    protected $appends = [
        'config',
    ];

    function getconfigAttribute() {
        
        $sources = [array(
            "type"      => "video/youtube", 
            "src"       => $this->link,
            "youtube"   => array(
                "ytControls" => 2
            )
        )];
        $config = array(
            "techOrder" => ["youtube"],
            "sources" => $sources
        );

        return $config;

    }
}
