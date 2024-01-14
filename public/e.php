<?php
$e1=$_ENV['MY_VAR'];
$e2=getenv('MY_VAR'); 
if($e1==null){
echo "1nulll";
}else if($e1=="fucc"){
echo "1not";
}else{
echo "1nooooo";
}
if($e2==null){
echo "2nulll";
}else if($e2=="fucc"){
echo "2not";
}else{
echo "2nooooo";
}
?>
