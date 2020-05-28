<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\mdKategori;
use Illuminate\Support\Str;

class mdBerita extends Model
{
    protected $table        = "berita";
    protected $primaryKey   = "id_berita";

    public $timestamp = false;
    
    protected $appends = [
        'Folder',
        'description',
        'seo',
    ];

    function getFolderAttribute() {
        $crypt = date("Ymd", strtotime($this->tgl_publish));
        return $crypt;
    }
    function getseoAttribute() {
        $crypt = str_slug($this->judul,"-");
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
