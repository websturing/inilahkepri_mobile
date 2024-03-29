<?php

namespace App\Http\Controllers;

use App\mdUser;
use Illuminate\Http\Request;

class appControl extends Controller
{
    function index(){
        return view('panelmin.master');
    }

    function loginSubmit(Request $r){
        $username = $r->get("login")['username'];
        $password = md5($r->get("login")['password']);

        $user = mdUser::where("username", $username)  
                        ->get();
        if(count($user) > 0){
            $ur = mdUser::where("username", $username)
                        ->where("password", $password)
                        ->get();


            if(count($ur) > 0){

                if($ur[0]->is_active == 'false'){
                    return array(
                        "title"     => "Info",
                        "type"      => "error",
                        "message"   => "User Anda Sedang di nonaktifkan",
                        "code"      => "500"
                    ); 
                }
                else{
                    return array(
                        "title"     => "Info",
                        "type"      => "error",
                        "message"   => "Password Bener",
                        "code"      => "200"
                    ); 
                }

                
            }
            else{
                return array(
                    "title"     => "Info",
                    "type"      => "error",
                    "message"   => "password salah",
                    "code"      => "500"
                ); 
            }
        }
        else{

            return array(
                "title"     => "Info",
                "type"      => "error",
                "message"   => "Account Tidak di temukan",
                "code"      => "500"
            );
        }

    }
}
