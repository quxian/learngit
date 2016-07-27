<?php
/**
 * Created by PhpStorm.
 * User: v-haipa
 * Date: 2016/7/15
 * Time: 10:27
 */
require 'vendor/qiniu/autoload.php';

use Qiniu\Auth;

$accessKey = 'EQLbxzxPFu35jgJFJdphidafcMc-utjL_bvOZxts';
$secretKey = 'syHegrBzIYTSXvKdJpdE3ukKY8-_E8s4GQTnV1F1';
$auth = new Auth($accessKey, $secretKey);

function getToken(){

    global $auth;
    $pipeline = 'media';
    $bucket = 'jingyingzx';
    $fops = "watermark/2/text/57K-6Iux5Zyo57q_/fontsize/1000/fill/d2hpdGU=/dissolve/85/gravity/SouthEast/dx/20/dy/20";
    $savekey = Qiniu\base64_urlSafeEncode('jingyingzx');
    $fops = $fops.'|saveas/'.$savekey;

    $policy = array(
        'persistentOps' => $fops,
        'persistentPipeline' => $pipeline
    );

    $token = $auth->uploadToken($bucket,null,3600,$policy);
    return $token;
}
function getMediaToken(){
    global $auth;
    //转码时使用的队列名称
    $pipeline = 'media';

    //要进行转码的转码操作
    $fops = "avthumb/mp4/wmText/d2Vsb3ZlcWluaXU=/wmFontColor/cmVk/wmFontSize/60/wmGravityText/North;vframe/jpg/offset/90/w/480/h/360;";
    $bucket = 'jingyingzx';
    $savekey = Qiniu\base64_urlSafeEncode('jingyingzx');
    $fops = $fops.'|saveas/'.$savekey;


    $policy = array(
        'persistentOps' => $fops,
        'persistentPipeline' => $pipeline
    );
    $token = $auth->uploadToken($bucket,null,3600,$policy);
    return $token;
}
function getBase64($text){
    return  Qiniu\base64_urlSafeEncode($text);
}
