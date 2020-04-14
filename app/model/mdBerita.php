<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\mdkategori;
use Illuminate\Support\Str;

class mdBerita extends Model
{
    protected $table        = "berita";
    protected $primaryKey   = "berita_id";

    protected $appends = [
        'Folder',
        'description'
    ];

    function getFolderAttribute() {
        $crypt = date("Ymd", strtotime($this->tgl_publish));
        return $crypt;
    }
    function getdescriptionAttribute() {
        $description = Str::words($this->isi_berita, '10');
        return $description;
    }

    
    function GetKategori(){
        return $this->belongsTo(mdkategori::class, "id_kategori");
    }
}
