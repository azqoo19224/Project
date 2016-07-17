<?php
// require ("config.php");
header("content-type text/html charset=utf-8");


// $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
// $result = mysql_query ( "set names utf8", $link );

// mysql_selectdb ( $dbname, $link );
$mysqli = new mysqli("localhost", "root", "", "data");
/* 檢查連接狀態 */
if (mysqli_connect_errno()) {
	printf("連接失敗： %s\n", mysqli_connect_error());
	exit();
}




// 寫入資料
$data = file_get_contents('Table.txt'); // 取得json字串
preg_replace('/,\s*([\]}])/m', '', $data);
$d = json_decode($data); // 將json字串轉成陣列
// echo $d->data[1]->park[5]->Entrancecoord->EntrancecoordInfo->Xcod;
echo $d->data->park[1]->Entrancecoord->EntrancecoordInfo[0]->Addresss;
$mysqli->query("SET NAMES 'utf8'");
//抓資料
for($i=0;$i <=1410;$i++){
$mysqli->query("REPLACE INSERT INTO `Park` (id, area, name, typ1, typ2, summary, address, tel, payex, servicetime, tw97x, tw97y, totalcar, totalmotor, totalbike, Pregnancy_First,Handicap_First) VALUES ('$i', '{$d->data->park[$i]->area}', '{$d->data->park[$i]->name}', '{$d->data->park[$i]->typ1}', '{$d->data->park[$i]->typ2}', '{$d->data->park[$i]->summary}', '{$d->data->park[$i]->address}', '{$d->data->park[$i]->tel}', '{$d->data->park[$i]->payex}', '{$d->data->park[$i]->servicetime}', '{$d->data->park[$i]->tw97x}', '{$d->data->park[0]->tw97y}', '{$d->data->park[$i]->totalcar}', '{$d->data->park[$i]->totalmotor}', '{$d->data->park[$i]->totalbike}', '{$d->data->park[$i]->Pregnancy_First}', '{$d->data->park[$i]->Handicap_First}')");
}

// //抓座標
for($i=0;$i <=1410;$i++){
$mysqli->query("REPLACE INSERT INTO `Lat` (id, Xcod, Ycod) VALUES ('$i', '{$d->data->park[$i]->Entrancecoord->EntrancecoordInfo[0]->Xcod}', '{$d->data->park[$i]->Entrancecoord->EntrancecoordInfo[0]->Ycod}')");


}



// $commandText = <<<SqlQuery
// select id, area, name, typ1, typ2, summary, address, tel, payex, servicetime, tw97x, tw97y, totalcar, totalmotor, totalbike, Pregnancy_First,Handicap_First 
// from Park
// SqlQuery;

// $result = mysql_query ( $commandText, $link );
// mysql_query("set character_set_results=utf8");
// mysql_query("set character_set_database=utf8");




// while ($row = mysql_fetch_array($result)){
    
    
//     echo $row["id"],$row["area"],"  ",$row["address"],"<br>";
// // echo urlencode($row["area"]),'<br>';
// //print_r($row);

//$d = mb_convert_encoding($f,"utf-8","auto");
// $d = iconv("BIG5","UTF-8",$f);
//echo $d,$f,"<br>";


    
    
// }




// $users = array("id"=>"001","name"=>"jimmy"); 
// $fields = implode(",",array_keys($users)); 
// $values = implode("','",$users); 
// $sql = "INSERT INTO `table` ({$fields}) VALUES ('{$values}')"; 
// $sql = mysql_query($sql); 



/*===========================[03]處理結果======================*/
// if ($resultset) {
// 	while($row = $resultset->fetch_assoc())
// 	{
// 		echo "ID：{$row['id']}<br>";
// 		echo "Name：{$row['name']}<br>";
// 		echo "<HR>";
// 	}
// 	/*=====================[04]關閉mysqli_result，清空所占記憶體=*/
// 	$resultset->close();
// }
/*===========================[05]關閉連接，清空所占記憶體===============*/
$mysqli->close();
?>
