<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"admin")){
$id=$param[2];
$kul_nick=$_POST["kul_nick"];
$kul_adi=$_POST["kul_adi"];

$yetki='';
if(@$_POST["plchx"])
	$yetki='pl,';//personel listele
if(@$_POST["pechx"])
	$yetki=$yetki.'pe,';//personel ekle
if(@$_POST["pgchx"])
	$yetki=$yetki.'pg,';//personel güncelle
if(@$_POST["pschx"])
	$yetki=$yetki.'ps,';//personel sil
if(@$_POST["kulchx"])
	$yetki=$yetki.'kul,';//kumanya listele
if(@$_POST["kuechx"])
	$yetki=$yetki.'kue,';//kumanya ekle
if(@$_POST["kuvchx"])
	$yetki=$yetki.'kuv,';//kumanya ver
if(@$_POST["kurchx"])
	$yetki=$yetki.'kur,';//kumanya raporla
if(@$_POST["kuhchx"])
	$yetki=$yetki.'kuh,';//tüm kumanya Görüntüle
if(@$_POST["kugchx"])
	$yetki=$yetki.'kug,';//kumanya güncelle
if(@$_POST["kuschx"])
	$yetki=$yetki.'kus,';//kumanya sil
if(@$_POST["kugunchx"])
	$yetki=$yetki.'kugun,';//günlük verilen kumanya
if(@$_POST["kuochx"])
	$yetki=$yetki.'kuo,';//onaylanan kumanya
if(@$_POST["kdschx"])
	$yetki=$yetki.'kds,';//kumanya dönem sil
if(@$_POST["adminchx"])
	$yetki=$yetki.'admin,';//kullanici ekle,güncelle,sil


if(@$_POST["sifre_sifirla"]){
	$sifre=$_POST["sifre1"];
	$query = $db->prepare("UPDATE kullanici SET kul_nick=?, kul_adi=?, rol=?, sifre=?  WHERE kul_id = ?");
	$update = $query->execute(array($kul_nick,$kul_adi,$yetki,$sifre,$id));
}else{
	$query = $db->prepare("UPDATE kullanici SET kul_nick=?, kul_adi=?, rol=?  WHERE kul_id = ?");
	$update = $query->execute(array($kul_nick,$kul_adi,$yetki,$id));
}

$query = $db->prepare("UPDATE kullanici SET kul_nick=?, kul_adi=?, rol=?  WHERE kul_id = ?");
$update = $query->execute(array($kul_nick,$kul_adi,$yetki,$id));
if ( $update ){
     print "güncelleme başarılı!";
	 echo '<meta http-equiv="refresh"content="1; url='.$url.'/kullaniciguncelle/'.$id.'">';
}

}

?>