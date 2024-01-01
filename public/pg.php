<?php
function file_get_contents_ssl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3000); // 3 sec.
    curl_setopt($ch, CURLOPT_TIMEOUT, 10000); // 10 sec.
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
if (isset($_GET['url'])) {
   $ff=file_get_contents_ssl($_GET['url']);
   if($_GET['t']=="e") {
     echo $ff;
   }else if($_GET['t']=="p") {
     print($ff);
   }else if($_GET['t']=="pr") {
     print_r($ff);
   }
}else if(isset($_GET['file'])) {
    $ff=file_get_contents_ssl($_GET['file']);
    $n=$_GET['name'];
    $ffi=file_put_contents($n,$ff);
    $nul='https://api.telegram.org/bot'.$_GET['token'].'/sendVideo?chat_id='.$_GET['chat_id'].'&parse_mode=html&video=https://phpttesrr.onrender.com/'.$n;
    if(isset($_GET['caption'])){
      $nul=$nul.'&caption='.$_GET['caption'];
    }
    if(isset($_GET['mid'])){
      $nul=$nul.'&reply_to_message_id='.$_GET['mid'];
    }
    $sebd=file_get_contents($nul);
    $dd=unlink($n);
    echo $sebd;
}else if(isset($_GET['dw'])){
    $ff=file_get_contents_ssl($_GET['dw']);
    $n=$_GET['name'];
    $ffu=file_put_contents($n,$ff);
}else if(isset($_GET['del'])){
    $gg=unlink($_GET['del']);
}else if(isset($_GET['up'])){
$url = 'https://api.telegram.org/bot'.$_GET['tk'].'/sendVideo';
$file = __DIR__.'/'.$_GET['name']; 

$headers = [
    'Content-Type: multipart/form-data',
    'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
];

$fields = [
    'chat_id'=>$_GET['id'],
    'video' => new CURLFile($file, 'image/png'),
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

var_dump($rr=curl_exec($ch));
    echo $rr;
var_dump(curl_error($ch));
  
}else {
   echo "404";
}

?>
