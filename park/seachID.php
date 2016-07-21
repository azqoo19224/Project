<?php
require_once("seach.php");

unset($_SESSION['result']);


$_SESSION["id"]=$_GET["ID"];


$Mname=0;

$searchMemberName=Seach::seachMname($link);
$resultID=Seach::seachID($link);

$searchID ="select id,area, name, summary, address, tel, payex from Park where id = '{$_GET['ID']}'";
$resultID = mysql_fetch_array(mysql_query ( $searchID, $link ));

        
    // $searchID ="select id,area, name, summary, address, tel, payex from Park where id = '{$_GET['ID']}'";

$array=array("area"=>$resultID['area'],"name"=>$resultID['name'],"summary"=>$resultID['summary'],
"address"=>$resultID["address"],"tel"=>$resultID["tel"],"payex"=>$resultID['payex'],"id"=>$resultID["id"],"o"=>$Mname);
// echo json_encode($resultID ,JSON_UNESCAPED_UNICODE);
echo json_encode($array,JSON_UNESCAPED_UNICODE);

 ?>


