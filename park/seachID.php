<?php
require ("config.php");
$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
mysql_selectdb ( $dbname, $link );

$searchID = <<<SqlQuery
select id,area, name, summary, address, tel, payex from Park where id = '{$_GET['ID']}'
SqlQuery;

$resultID = mysql_query ( $searchID, $link );
$asdf = mysql_fetch_array($resultID);
$array=array("area"=>$asdf['area'],"name"=>$asdf['name'],"summary"=>$asdf['summary'],
"address"=>$asdf["address"],"tel"=>$asdf["tel"],"payex"=>$asdf['payex'],"id"=>$asdf["id"]);

echo json_encode($array,JSON_UNESCAPED_UNICODE);
?>

