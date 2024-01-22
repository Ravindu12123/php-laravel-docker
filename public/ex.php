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
function postr($url,$data){   
$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);
    return $json_response;
}
if(isset($_GET['dw'])){
    $ff=file_get_contents_ssl($_GET['dw']);
    $n=$_GET['name'];
    $ffi=file_put_contents($n,$ff);
    echo '<video src="'._DIR_.'/'.$n.'" controls width="100%"></video>';
}else if(isset($_GET['file'])) {
    $ff=file_get_contents_ssl($_GET['file']);
    $n=$_GET['name'];
    $ffi=file_put_contents($n,$ff);
    echo 1;
}else if(isset($_GET['tgf'])){
    $n=$_GET['tgf'];
    $cap=null;
    if(isset($_GET['caption'])){
      $cap=$_GET['caption'];
    }
    $ret=postr('https://api.telegram.org/bot'.$_GET['token'].'/sendVideo',
               array(
                   'chat_id' => $_GET['chat_id'],
                   'parse_mode' => 'html',
                   'video' => 'https://phpttesrr.onrender.com/'.$n,
                   'caption' => $cap
                   ));
    echo $ret;
}else if(isset($_GET['del'])){
    $n=$_GET['del'];
    $dd=unlink($n);
    echo 200;
}else{
    echo 404;
}

?>
