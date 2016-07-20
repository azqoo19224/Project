<?php
require ("config.php");
session_start();


$searchletter ="select id, area, name, summary, address, tel, payex from Park where area like '%{$_GET['letter']}%' and name like '%{$_GET['txtUse']}%'";
$resultID = mysql_query ( $searchletter, $link );

while ($row = mysql_fetch_array($resultID)){
    
    $array=array("id"=>$row['id'],"area"=>$row['area'],$row['name']);
    $s .="<A id='".$row['id']." taregt='_self href='#Place' onclick='seachmsg(".$row['id'].");seachID(".$row['id'].")'> <h4> ".$row["area"]."___".$row['name']."</h4> </A>";
    
}
echo $s;

?>
