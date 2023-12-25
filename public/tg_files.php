<?php
  $in=file_get_contents("php://input");
  $j=json_decode($in,true);
  $cc='-1002063159191';
  $M=$j['message'];$Uid=$M['from']['id'];
  $Mid=$M['message_id'];
   $ret='https://api.telegram.org/bot6906959412:AAFd2yMD7h6kDIUDSy7JkFOqKCYPeYtruxU/sendMessage?chat_id='.$Uid.'&parse_mode=html';
  $rett='https://api.telegram.org/bot6906959412:AAFd2yMD7h6kDIUDSy7JkFOqKCYPeYtruxU/sendVideo?chat_id='.$cc.'&parse_mode=html';
if($M['video']==null){
       $ret=$ret.'&text=send me a video file';
   }else{
       $ret=$ret.'&text=done!&reply_to_message_id='.$Mid;
       $rett=$rett.'&video='.$M['video']['file_id'];
   }
 $nb= file_get_contents($ret);
 $nbb= file_get_contents($rett);
?>
