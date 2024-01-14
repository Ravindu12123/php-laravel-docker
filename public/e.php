<?php
$e1=$_ENV['MY_VAR'];
$e2=getenv('MY_VAR'); 
if($e1==null){
echo "1nulll";
}else{
echo "1not";
}
if($e2==null){
echo "2nulll";
}else{
echo "2not";
}
?>
