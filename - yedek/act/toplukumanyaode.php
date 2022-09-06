<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}


if(yetki_kontrol(@$_SESSION["rol"],"kuv")){

if(@$_POST){
	$topluodechck=$_POST["topluodechck"];
	$pers_id=$param[2];
	
	
	
}
$count=0;
$count2=0;
$query = $db->prepare("UPDATE kumanya SET
status = ?,update_date=now() WHERE kum_id = ?");
foreach($topluodechck  as $row){

$update = $query->execute(array(0,$row));
if($update){
$count++;
}

}
if(count($topluodechck)==$count){
	
	$sql="SELECT * FROM kumanya,personel where  personel.pers_id=kumanya.pers_id and personel.pers_id={$pers_id} and (";
	foreach($topluodechck  as $row3){
		$count2++;
		
		if(count($topluodechck)==$count2){
			$sql=$sql.' kumanya.kum_id='.$row3;
		}else{
			$sql=$sql.' kumanya.kum_id='.$row3.' or';
		}
		
		
	}
	$query2 = $db->query($sql.')', PDO::FETCH_ASSOC);
	
	$tutar=0;
	foreach($query2 as $row2){
		if($tutar==0){
		echo 
	"<div style='background-color:white;width:400px;padding:40px;margin:0 auto;margin-top:80px;'>İşlem Tarihi:".date("Y/m/d - H:m:s")."<br>".
	"Ad Soyad: ".$row2["ad"]. " ".$row2["soyad"]."<br>";
		}
	
	$vade = date("Y", strtotime($row2["vade"])).' '.turkcetarih_formati(date("F", strtotime($row2["vade"])));
	echo "Kumanya tutarı: ".$row2["tutar"]. "(".$vade.")<br>";
	$tutar=$tutar+$row2["tutar"];
	
		
	}
	echo "Toplam: ".$tutar ."<br>";
	echo '<a href="javascript:void(0)" onclick="window.print()" style="float:right;">Yazdır</a> </div>';
	
	
}
else{
	
echo '
	<script>
		alert("Kumanya ödeme işlemi başarısız");
	</script>
	';
	
}
}
?>