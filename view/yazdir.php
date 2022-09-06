
<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}


if(yetki_kontrol(@$_SESSION["rol"],"kuv")){

date_default_timezone_set('Turkey');
$id = $param[2]; 
$sql="SELECT * FROM kumanya,personel where  personel.pers_id=kumanya.pers_id and kumanya.kum_id='".$id."'";
$query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
if($query){
	echo 
	"<div style='background-color:white;width:400px;padding:40px;margin:0 auto;margin-top:80px;'>İşlem Tarihi:".date("Y/m/d - H:m:s")."<br>".
	"Ad Soyad: ".$query["ad"]. " ".$query["soyad"]."<br>".
	"Kumanya tutarı: ".$query["tutar"]. "<br>".
	"Kumanya vadesi".$query["vade"]. "<br>";
}
echo '<a href="javascript:void(0)" class="btn btn-primary" onclick="window.print()" style="float:right;">Yazdır</a></div>';
}
?>
