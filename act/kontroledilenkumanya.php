<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}



if(@$_POST){
	$odenmiskumchx=$_POST["odenmiskumchx"];
}

$count=0;
$count2=0;
$query = $db->prepare("UPDATE kumanya SET
status = ?, update_date=now() WHERE kum_id= ?");
foreach($odenmiskumchx  as $row){

$update = $query->execute(array(-2,$row));
if($update){
$count++;
}

}
if(count($odenmiskumchx)==$count){
	
	$sql="SELECT kum_id,gun,ad,soyad,vade,tutar,kumanya.update_date as kupdate FROM kumanya,personel where  personel.pers_id=kumanya.pers_id and (";
	foreach($odenmiskumchx  as $row3){
		$count2++;
		
		if(count($odenmiskumchx)==$count2){
			$sql=$sql.' kumanya.kum_id='.$row3;
		}else{
			$sql=$sql.' kumanya.kum_id='.$row3.' or';
		}
		
		
	}
	$query2 = $db->query($sql.')', PDO::FETCH_ASSOC);
	
	
	?>
	<table class="table table-hover table-light" id="kumanyagetirtable" style="margin-top:20px;">
	<thead style="background-color:#fed136;">
    <tr>
      <th scope="col"><label id="ad_soyad"></label><br><a href="javascript:void(0)">AD SOYAD</a></th>
      <th scope="col"><label id="vade"></label><br><a href="javascript:void(0)">VADE</a></th>
	  <th scope="col"><label id="gun"></label><br><a href="javascript:void(0)">GUN</a></th>
      <th scope="col"><label id="tuta"></label><br><a href="javascript:void(0)">TUTAR</a></th>
      <th scope="col"><label id="odemetarihi"></label><br><a href="javascript:void(0)">ÖDEME TARİHİ</a></th>
    </tr>
  </thead>
  <tbody>
	<?php
	 $tutar=0;
	foreach($query2 as $row2){
		$tutar=$tutar+$row2["tutar"];
		$vade = $row2["vade"];
		$vade = date("Y", strtotime($vade)).' '.turkcetarih_formati(date("F", strtotime($vade)));
	?>
	<tr>
     <td><?php echo $row2["ad"].' '.$row2["soyad"]; ?></td>
	  <td><?php echo $vade; ?></td>
	  <td><?php echo $row2["gun"]; ?></td>
	  <td><?php echo $row2["tutar"]; ?></td>
	 <?php $toplam=$toplam+$row2["tutar"]; ?>	  
	  <td><?php echo $row2["kupdate"]; ?></td>
	 
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
		 
      <td><?php echo $tutar; ?></td>
	  <td></td>	
    </tr>
  </tfoot>
	</table>
	
	
	<?php
	echo '<a href="javascript:void(0)" onclick="window.print()" style="float:right;">Yazdır</a> </div>';
	
	
}
else{
	
echo '
	<script>
		alert("Kumanya ödeme işlemi başarısız");
	</script>
	';
	
}

?>