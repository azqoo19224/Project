<?php

header("content-type text/html charset=utf-8");
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

$mysqli->close();
?>
