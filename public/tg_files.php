<?php
  $in=file_get_contents("php://input");
  $j=json_decode($in,true);
  $M=$j['message'];$Uid=$M['from']['id'];
  $Mid=$M['message_id'];
   $ret='https://api.telegram.org/bot6906959412:AAFd2yMD7h6kDIUDSy7JkFOqKCYPeYtruxU/sendMessage?chat_id=-1002063159191&parse_mode=html';
  if(isset($M['video']){
     $ret=$ret.'&text=video';
   }else{
     $ret=$ret.'&text=non v';
   }
 $nb= file_get_contents($ret);
?>
