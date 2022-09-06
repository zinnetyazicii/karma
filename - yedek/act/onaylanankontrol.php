<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}

if(yetki_kontrol(@$_SESSION["rol"],"kuo")){
$vade=$_POST["vade"];

$sql="SELECT firma_adi,kum_id,gun,ad,soyad,vade,tutar,kumanya.update_date as kupdate FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and  personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status='-2'";


if(@$_POST["vade"]){
	$vade=$_POST["vade"].'-01';
	$sql=$sql." and kumanya.vade='".$vade."'";
}
$sql=$sql.' order by personel.ad asc';


$query = $db->query($sql, PDO::FETCH_ASSOC);
?>
<div class="row">
	<div class="col">

	<table class="table table-hover table-light" id="kumanyagetirtable" style="margin-top:20px;">
	<thead style="background-color:#fed136;">
    <tr>
      
      <th scope="col"><label id="ad_soyad"></label><br><a href="javascript:void(0)">AD SOYAD</a></th>
      <th scope="col"><label id="vade"></label><br><a href="javascript:void(0)">VADE</a></th>
	  <th scope="col"><label id="gun"></label><br><a href="javascript:void(0)">GÜN</a></th>
      <th scope="col"><label id="tuta"></label><br><a href="javascript:void(0)">TUTAR</a></th>
      <th scope="col"><label id="firma"></label><br><a href="javascript:void(0)">FİRMA</a></th>
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
     <td><?php echo $row["ad"].' '.$row["soyad"]; ?></td>
	  <td><?php echo $vade; ?></td>
	  <td><?php echo $row["gun"]; ?></td>
	  <td><?php echo $row["tutar"]; ?></td>
	 <?php $toplam=$toplam+$row["tutar"]; ?>	  
	  <td><?php echo $row["firma_adi"]; ?></td>
	  <td><?php echo $row["kupdate"]; ?></td>
	 
     </tr>
	<?php
	}
	?>
	
	 </tbody>
	 <tfoot>
    <tr>
	<td style="font-weight:bold;">Toplam: </td>
	  <td></td>
      
	   <td></td>
	    <td><?php echo $toplam; ?></td>
	    <td></td>
		 
      <td></td>
    </tr>
  </tfoot>
	</table>
	
		
	</div>
	</div>
<?php 
}
?>