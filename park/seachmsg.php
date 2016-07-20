<?php

require ("config.php");


$searchMsg ="select name,star,msg from Message where id = '{$_GET['ID']}'";


$resultMsg = mysql_query ( $searchMsg, $link );
$i =0;
while($msg = mysql_fetch_array($resultMsg)){
$array[$i]=array("name"=>$msg['name'],"star"=>$msg['star'],"msg"=>$msg['msg']);

json_encode($array,JSON_UNESCAPED_UNICODE);

$s =$array[$i]["name"].":".$msg['msg']."<div id ='".$i."'></div> <script> $('#".$i."').raty({ readOnly: true, score: ".$array[$i]["star"]." });</script>";
echo $s;
$i++;
}

?>

