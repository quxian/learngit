<?php

namespace App\Http\Controllers;
require 'vendor/qiniu/autoload.php';
use Qiniu\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    //
    public function set(){
        $token = getMediaToken();
        echo ['uptoken'=>$token];
    }
    public function get(){
        echo getBase64('精英在线');
    }
    public function view(){
//        $arr = ['a'=>'A','b'=>'B','c'=>'C','d'=>'D'];
//        return view('upload',compact('arr'));
    }
    public function upload(){
        $token = getMediaToken();
        return view('upload',compact('token'));
    }
}
