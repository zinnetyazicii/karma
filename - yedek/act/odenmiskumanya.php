<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"kur") || yetki_kontrol(@$_SESSION["rol"],"kuri")){
$odenmisbast=$_POST["odenmisbast"];
$odenmisbitt=$_POST["odenmisbitt"];
$sql="SELECT firma_adi,kum_id,gun,ad,soyad,vade,tutar,kumanya.update_date as kupdate FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status='0'";

if(@$_POST["vade"]){
	$vade=$_POST["vade"].'-01';
	$sql=$sql." and kumanya.vade='".$vade."'";
}

if(@$_POST["odenmisbast"]){
	$odenmisbast=$_POST["odenmisbast"];
	$sql=$sql." and kumanya.update_date>='".$odenmisbast." 00:00:00'";
		if(@$_POST["odenmisbitt"]){
	$odenmisbitt=$_POST["odenmisbitt"];
	$sql=$sql." and kumanya.update_date<='".$odenmisbitt." 23:59:59'";
}else{
	$odenmisbitt=date("Y-m-d");
	$sql=$sql." and kumanya.update_date<='".$odenmisbitt." 23:59:59'";
}

	}


$query = $db->query($sql, PDO::FETCH_ASSOC);


?>
	
	<input type="checkbox" id="odenmiskontrolselectall" style="display:none;">
	<div class="row">
	<div class="col">
	<form action="<?php echo $url; ?>/act/kontroledilenkumanya" method="post" id="kontrolodenmisform">
	<table class="table table-hover table-light" id="kumanyagetirtable" style="margin-top:20px;">
	<thead style="background-color:#fed136;">
    <tr>
    <?php if(yetki_kontrol(@$_SESSION["rol"],"kur")){ ?>
	<th scope="col"><a class="btn btn-primary" href="javascript:void(0)" onclick="odenmiskontrolselectall()" id="odenmiskontrol">Hiçbiri</a></th>  
	<?php } ?>
	<th scope="col"><label id="ad_soyad"></label><br><a href="javascript:void(0)">AD SOYAD</a></th>
	<th scope="col"><label id="vade"></label><br><a href="javascript:void(0)">VADE</a></th>
	<th scope="col"><label id="gun"></label><br><a href="javascript:void(0)">GUN</a></th>
	<th scope="col"><label id="tuta"></label><br><a href="javascript:void(0)">TUTAR</a></th>
	<th scope="col"><label id="tuta"></label><br><a href="javascript:void(0)">FİRMA</a></th>
	<th scope="col"><label id="odemetarihi"></label><br><a href="javascript:void(0)">ÖDEME TARİHİ</a></th>
    </tr>
  </thead>
  <tbody>
	
  <?php
    $toplam=0;
	foreach( $query as $row ){
	$vade = $row["vade"];
	$vade = date("Y", strtotime($vade)).' '.turkcetarih_formati(date("F", strtotime($vade)));
	?>
	<tr>
     <td><?php echo '<input type="checkbox" name="odenmiskumchx[]" class="checkall" value="'.$row["kum_id"].'" checked style="display:none;">'; ?></td>
     <td><?php echo $row["ad"].' '.$row["soyad"]; ?></td>
	  <td><?php echo $vade; ?></td>
	  <td><?php echo $row["gun"]; ?></td>
	  <td><?php echo $row["tutar"]; ?></td>
	  <td><?php echo $row["firma_adi"]; ?></td>
	 <?php $toplam=$toplam+$row["tutar"]; ?>	  
	  <td><?php echo $row["kupdate"]; ?></td>
	 
     </tr>
	<?php
	}
	?>
	
	 </tbody>
	 <tfoot>
    <tr>
	  <td></td>
      <td style="font-weight:bold;">Toplam: </td>
	   <td></td>
	    <td></td>
		 
      <td><?php echo $toplam; ?></td>
	  <td></td>	
    </tr>
  </tfoot>
	</table>
	<button type="submit" class="btn btn-primary">Öde</button>
		</form>
	</div>
	</div>
		
	
<?php

}

 ?>