<?php

require ("config.php");


$searchMember ="select name,password from Member";
$resultMember = mysql_query ( $searchMember, $link );
$s="可以使用";

while($resultem= mysql_fetch_array($resultMember)){
     if($resultem['name'] == $_GET['txtmemberName']){
     $s = "帳號重複";
}
}

echo $s


?>

