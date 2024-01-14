<?php
  $in=file_get_contents("php://input");
  $dataj='done_f.json';
  sleep(3);
  $dats=file_get_contents($dataj);
  $donefj=json_decode($dats,true);
  $j=json_decode($in,true);
  $cc=$_ENV['cc'];
  $botToken= $_ENV['BotT'];
  $M=$j['message'];
  $Uid=$M['from']['id'];
  $Mid=$M['message_id'];
  $ret='https://api.telegram.org/bot'.$botToken.'/sendMessage?chat_id='.$Uid.'&parse_mode=html';
  $rett='https://api.telegram.org/bot'.$botToken.'/sendVideo?chat_id='.$cc.'&parse_mode=html';
  if($M['video']==null){
    $ret=$ret.'&text=send me a video file';
    $gh=file_get_contents($ret);
  }else{
    $nfid=$M['video']['file_id'];
    $ffar=$donefj['file_ids'];
    if(in_array($nfid,$ffar,true)===true){
        $ret=$ret.'&text=alredy done!&reply_to_message_id='.$Mid;
        $nb=file_get_contents($ret);
    }else{
        $rett=$rett.'&video='.$M['video']['file_id'];
        $nb= file_get_contents($rett);
        $nbr=json_decode($nb,true);
        if($nbr['ok']==true){
            array_push($donefj['file_ids'],$M['video']['file_id']);
            $donejj=json_encode($donefj);
            file_put_contents($dataj,$donejj);
            $ret=$ret.'&text=done!&reply_to_message_id='.$Mid;
            $gh=file_get_contents($ret);
        }else{
            $ret=$ret.'&text=err!'.$nbr['description'].'&reply_to_message_id='.$Mid;
            $gh=file_get_contents($ret);
        }
    }
  }
$sgsp="gg";
?>
