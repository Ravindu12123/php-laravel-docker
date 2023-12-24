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
}else {
   echo "404";
}
?>
