<?php
header("content-type: application/xml; charset=utf-8");
header("Access-Control-Allow-Origin: *");
$key = "changelog_cache";
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
//$redis->delete($key);
if($redis->ttl($key) < 1){
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, 'https://rsshub.170601.xyz/telegram/channel/xiaoshuc');
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    print_r($data);
    if($data!==""){
        $redis->set($key, $data);
        $redis->expire($key, 60*60*2);
    }
} else {
    echo $redis->get($key);
}

?>