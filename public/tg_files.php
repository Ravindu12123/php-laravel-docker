<?php
  $in=file_get_contents("php://input");
  $dataj='done_f.json';
  $dats=file_get_contents($dataj);
  $donefj=json_decode($dats,true);
  $j=json_decode($in,true);
  $cc='-1002063159191';
  $M=$j['message'];$Uid=$M['from']['id'];
  $Mid=$M['message_id'];
   $ret='https://api.telegram.org/bot6906959412:AAFd2yMD7h6kDIUDSy7JkFOqKCYPeYtruxU/sendMessage?chat_id='.$Uid.'&parse_mode=html';
  $rett='https://api.telegram.org/bot6906959412:AAFd2yMD7h6kDIUDSy7JkFOqKCYPeYtruxU/sendVideo?chat_id='.$cc.'&parse_mode=html';
if($M['video']==null){
       $ret=$ret.'&text=send me a video file';
   }else{
       $nfid=$M['video']['file_id'];$ffar=$donefj['file_ids'];
       if(in_array($nfid,$ffar,TRUE)){
           $ret=$ret.'&text=alredy done!&reply_to_message_id='.$Mid;
           $nb= file_get_contents($ret);
       }else{
       $ret=$ret.'&text=done!&reply_to_message_id='.$Mid;
       $rett=$rett.'&video='.$M['video']['file_id'];
       array_push($donefj['file_ids'],$M['video']['file_id']);
       $donejj=json_encode($donefj);
       file_put_contents($dataj,$donejj);
       $nb= file_get_contents($ret);
       $nbb= file_get_contents($rett);
   }
}
 
?>
