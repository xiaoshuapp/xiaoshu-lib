<?php
$str = file_get_contents('https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&mkt=zh-CN');
$array = json_decode($str,true);
$imgurl = "http://cn.bing.com" . $array["images"][0]["url"];
header("Location: {$imgurl}",false,301);