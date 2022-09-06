<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}


if(yetki_kontrol(@$_SESSION["rol"],"kul")){
$sql="SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status=1 and kumanya.tutar>0";
$query = $db->query($sql, PDO::FETCH_ASSOC);
if ( $query->rowCount() ){

?>
<div class="row">
<div class="col-md-3">
<select class="form-select" name="persfirmasec">
<option value="all">HEPSİ</option>
<?php 
$sql="SELECT * FROM firma";
$query2 = $db->query($sql, PDO::FETCH_ASSOC);
if($query2){
	foreach($query2 as $row2){
		echo '<option value="'.$row2["fir_id"].'">'.$row2["firma_adi"].'</option>';
	}
}
?>
</select>
</div>
<div class="col-md-3">

<input type="month" name="donem" id="donem">

</div>
<div class="col-md-4">
<a href="javascript:void(0)" onclick="kdsfiltre()" class="btn btn-primary">Getir</a>
</div>

<div class="col-md-2">
<a href="<?php echo $url.'/excell'; ?>" target="_blank" class="btn btn-success" style="float:right;">Excell <i class="fas fa-file-excel"></i></a>
</div>
</div>
<div id="filtrelenenkumanya">
</div>
<?php
}else{
	echo 'hani yetki';
}
}
?>