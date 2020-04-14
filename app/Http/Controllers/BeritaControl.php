<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\mdBerita;
use Illuminate\Support\Str;

class BeritaControl extends Controller
{
    function index(Request $r){
        $type = $r->get("type");
        if($type == 'berita'){
            return self::AllBerita($r);
        }
        else if($type == 'kategori'){  
            return self::getberitaBykategori($r);
        }
        else if($type == 'headline'){  
            return self::headline($r);
        }
        else if($type == 'id'){  
            return self::getberitaById($r);
        }

    }

    function AllBerita(Request $r){
        
        $skip = $r->get('skip');
        $take = $r->get('take');

        $berita = mdBerita::with(['getkategori'])
            ->skip($skip)
            ->take($take)
            ->orderBy("tgl_publish","DESC")    
            ->get();

       return $berita;
    }

    function headline(Request $r){
        $skip = $r->get('skip');
        $take = $r->get('take');

        $berita = mdBerita::with(['getkategori'])
            ->where("headline","true")
            ->skip($skip)
            ->take($take)
            ->orderBy("tgl_publish","DESC")    
            ->orderBy("jam","DESC")    
            ->get();

        return $berita;
    }
    function getberitaById(Request $r){

        $berita = mdBerita::where("id_berita", $r->get("id"))
                  ->get();

        return $berita;
    }

    function getberitaBykategori(Request $r){
        $skip = $r->get('skip');
        $take = $r->get('take');
        $kategori = $r->get('kategori');


        $berita = mdBerita::with(['getkategori'])
            ->skip($skip)
            ->take($take)
            ->where("id_kategori", $kategori)
            ->orderBy("tgl_publish","DESC")    
            ->get();

        return $berita;
    }

    function detail(Request $r, $id, $judul){

        $berita = mdBerita::where('id_berita', $id)->get();

        $urlLink = url()->full();
        $folder = date("Ymd", strtotime($berita[0]->tgl_publish));
        $description = Str::words($berita[0]->isi_berita, '30');
        $gambarLink = url('/storage/Artikel_Thumbnail/'.$folder.'/'.$berita[0]->gambar);

        return view('berita.detail', compact('id','berita','urlLink','description','gambarLink'));
    }
}
