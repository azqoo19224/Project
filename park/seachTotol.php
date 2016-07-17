<?php
require ("config.php");
$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
mysql_selectdb ( $dbname, $link );
 
$searchletter = <<<SqlQuery
  select * from Lat where id = '{$_GET["id"]}'
SqlQuery;


$resultID = mysql_query ( $searchletter, $link );
// $asdf = mysql_fetch_array($resultID);
// $array=array("area"=>$asdf['area'],"name"=>$asdf['name'],"summary"=>$asdf['summary'],
// "address"=>$asdf["address"],"tel"=>$asdf["tel"],"payex"=>$asdf['payex']);


while ($row = mysql_fetch_array($resultID)){
    $array=array("id"=>$row['id'],"Xcod"=>$row['Xcod'],"Ycod"=>$row['Ycod']);
   echo json_encode($array,JSON_UNESCAPED_UNICODE);

    
	

}


?>
