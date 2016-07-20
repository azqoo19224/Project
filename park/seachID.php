<?php
require ("config.php");
session_start();

// unset($_SESSION['result']);
$_SESSION["id"]=$_GET["ID"];
$abc=0;
$a ="select name from Message where id = '{$_SESSION['id']}' and name ='{$_SESSION['UserName']}'";
$searchMemberName=mysql_query ($a,$link);
$abc=mysql_fetch_array($searchMemberName);


$searchID ="select id,area, name, summary, address, tel, payex from Park where id = '{$_GET['ID']}'";
$resultID = mysql_query ( $searchID, $link );
$asdf = mysql_fetch_array($resultID);
$array=array("area"=>$asdf['area'],"name"=>$asdf['name'],"summary"=>$asdf['summary'],
"address"=>$asdf["address"],"tel"=>$asdf["tel"],"payex"=>$asdf['payex'],"id"=>$asdf["id"],"o"=>$abc);
// echo json_encode($asdf ,JSON_UNESCAPED_UNICODE);
echo json_encode($array,JSON_UNESCAPED_UNICODE);

?>

