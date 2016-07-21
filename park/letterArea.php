
<?php
require_once("seach.php");

$resultID = Seach::letterArea($link);


while ($row = mysql_fetch_array($resultID)){
    
    $array=array("id"=>$row['id'],"area"=>$row['area'],$row['name']);
    $s .="<A id='".$row['id']." taregt='_self href='#Place' onclick='seachmsg(".$row['id'].");seachID(".$row['id'].")'> <h4> ".$row["area"]."___".$row['name']."</h4> </A>";
    
}
echo $s;

?>