<?php
  $in=file_get_contents("php://input");
  $j=json_decode($in,true);
  $M=$j['message'];$Uid=$M['from']['id'];
  $Mid=$M['message_id'];
   $ret = new \stdClass;
   $ret->chat_id=$Uid;
   $ret->parse_mode="html";
   $ret->reply_to_message_id=$Mid;
  if(isset($M['video']){
     $ret->text="video";
   }else{
     $ret->text="non text";
   }
?>
