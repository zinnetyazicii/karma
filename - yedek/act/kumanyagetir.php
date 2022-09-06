<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"kuv")){

$tc=trim($_POST["tc"]);

$sql="SELECT * FROM kumanya,personel where  personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status=1 and personel.tc='{$tc}'";
$query = $db->query($sql, PDO::FETCH_ASSOC);

$personel = $db->query("SELECT * FROM personel,firma WHERE personel.fir_id=firma.fir_id and personel.tc = '{$tc}'")->fetch(PDO::FETCH_ASSOC);

if($personel){
	?>
	<div class="row">
	<div class="col-md-12">
    <div style="width:100%;">
	<span class="badge text-wrap kumanyatitle"> TC</span>
	<span class="badge text-wrap kumanyatitle"> AD</span>
	<span class="badge text-wrap kumanyatitle"> SOYAD</span>
	<span class="badge text-wrap kumanyatitle"> BABA ADI</span>
	<span class="badge text-wrap kumanyatitle"> FİRMA ADI</span>	
	
	</div>
	
	<div style="width:100%;" style="background-color:white ">
	<span class="badge text-wrap  kumanyacontent"><?php echo $personel["tc"]; ?></span>
	<span class="badge text-wrap  kumanyacontent"><?php echo $personel["ad"]; ?></span>
	<span class="badge text-wrap  kumanyacontent"><?php echo $personel["soyad"]; ?></span>
	<span class="badge text-wrap kumanyacontent" ><?php echo $personel["baba_adi"]; ?></span>
	<span class="badge text-wrap kumanyacontent" ><?php echo $personel["firma_adi"]; ?></span>
	</div>
	
	</div>
	</div>
	<?php


if ($query->rowCount()){  
 ?>
	
	
	<div class="row">
	<div class="col">
	<form action="<?php echo $url; ?>/toplukumanyaode/<?PHP echo $personel["pers_id"]; ?>" method="post" id="topluodeform">
	<table class="table table-hover table-light" id="kumanyagetirtable" style="margin-top:20px;">
	<thead style="background-color:#fed136;">
    <tr>
      <th scope="col"><label id="vade"></label><br><a href="javascript:void(0)">SEÇ</a></th>
      <th scope="col"><label id="vade"></label><br><a href="javascript:void(0)">VADE</a></th>
	  <th scope="col"><label id="gun"></label><br><a href="javascript:void(0)">GUN</a></th>
      <th scope="col"><label id="tuta"></label><br><a href="javascript:void(0)">TUTAR</a></th>
      <th scope="col"><a href="javascript:void(0)">İŞLEM</a></th>
     
    </tr>
  </thead>
  <tbody>
  
  <?php
	foreach( $query as $row ){
	$vade = $row["vade"];
	$vade = date("Y", strtotime($vade)).' '.turkcetarih_formati(date("F", strtotime($vade)));
	?>
	<tr>
     
	  <td><input type="checkbox" name="topluodechck[]" value="<?php echo $row["kum_id"]; ?>"></td>
	  <td><?php echo $vade; ?></td>
	  <td><?php echo $row["gun"]; ?></td>
	  <td><?php echo $row["tutar"]; ?></td>
	  <td>
	
	 <a href="javascript:void(0)" onclick="odefunc(<?php echo $row["kum_id"]; ?>)"><i class="fas fa-shopping-cart"></i></a>
	 </td>
	 </tr>
      
	<?php
	}
	?>
	
	 </tbody>
	</table>

	<button type="submit" class="btn btn-primary" style="float:right;">Toplu Öde</button>
	</form>
	</div>
	</div>
	
	
<?php
     
}

else{
	
	echo "<script>

	tost('Personelin kumanyası yoktur');

</script>";}

}
else if(!$personel){
	echo "<script>

	tost('Personelin kaydı yoktur');

	</script>";
}


	
}

?>

