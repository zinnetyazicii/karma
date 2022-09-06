<?php
if(@$_SESSION["rol"]=="admin"){
$kul_id=$_POST["kul_id"];
$ku_nick=$_POST["kul_nick"];
$kul_adi=$_POST["kul_adi"];
$rol=$_POST["rol"];
$sifre=$_POST["sifre"];


$id=$param[2];

$query = $db->prepare("UPDATE personel SET
kul_nick=?, kul_adi=?, rol=?, sifre=?  WHERE kul_id = ?");
$update = $query->execute(array($kul_nick,$kul_adi,$rol,$sifre,$kul_id));
if ( $update ){
     print "güncelleme başarılı!";
	 echo '<meta http-equiv="refresh"content="1; url='.$url.'/ayarguncelle/'.$id.'">';
}
}

?>