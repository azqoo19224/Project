<?php
require ("config.php");


$searchID ="select id,area, name, summary, address, tel, payex from Park where id = '{$_GET['ID']}'";
$resultID = mysql_query ( $searchID, $link );
$asdf = mysql_fetch_array($resultID);
$array=array("area"=>$asdf['area'],"name"=>$asdf['name'],"summary"=>$asdf['summary'],
"address"=>$asdf["address"],"tel"=>$asdf["tel"],"payex"=>$asdf['payex'],"id"=>$asdf["id"]);
// echo json_encode($asdf ,JSON_UNESCAPED_UNICODE);
echo json_encode($array,JSON_UNESCAPED_UNICODE);
?>

