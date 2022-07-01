<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: accept,x-requested-with,Content-Type");
header("Access-Control-Allow-Methods: POST");
header('Content-type: application/json');

/**
 * 发送post请求
 * @param string $url 请求地址
 * @param array $post_data post键值对数据
 * @return string
 */
function send_post($url, $post_data) {
 
  $postdata = http_build_query($post_data);
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-type:application/x-www-form-urlencoded',
      'content' => $postdata,
      'timeout' => 15 * 60 // 超时时间（单位:s）
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
 
  return $result;
}

$arr = json_decode(file_get_contents("php://input"), true);
if(isset($arr["content"]) && isset($arr["flomoapi"])){
    echo send_post($arr["flomoapi"],array(
        "content"=> $arr["content"]
    ));
}

?>