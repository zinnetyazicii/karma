<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}

$todayfirst=date('Y-m-d').' 00:00:01';
$todaylast=date('Y-m-d')." 23:59:59";
if(yetki_kontrol(@$_SESSION["rol"],"kugun")){
//$sql="SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and kumanya.status<1 and kumanya.update_date between '".date('Y-m-d')." 23:59:59' and '".date('Y-m-d')." 00:00:01'";
$sql="SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and kumanya.status<1 and kumanya.update_date between '{$todayfirst}' and '{$todaylast}' order by personel.ad asc";
$query = $db->query($sql, PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
echo $query->rowCount;
?>
<div class="row">
<div class="col-md-5">

</div>

<div class="col-md-5">
</div>

<div class="col-md-2">
<a href="<?php echo $url.'/rapor/gunlukkumanya'; ?>" target="_blank" class="btn btn-success" style="float:right;">Excell <i class="fas fa-file-excel"></i></a>
</div>
</div>
<div id="filtrelenenkumanya">
<table class="table table-striped table-bordered table-sm" id="personeltable" >
  <thead>
    <tr>
      <th scope="col"><label id="kartid"></label><br><a href="javascript:void(0)">KART ID</a></th>
      <th scope="col"><label id="tc"></label><br><a href="javascript:void(0)">TC</a></th>
      <th scope="col"><label id="ad"></label><br><a href="javascript:void(0)">AD</a></th>
      <th scope="col"><label id="soyad"></label><br><a href="javascript:void(0)">SOYAD</a></th>
	  <th scope="col"><label id="soyad"></label><br><a href="javascript:void(0)">FİRMA</a></th>
      <th scope="col"><a href="javascript:void(0)">VADE</a></th>
	  <th scope="col"><label id="kumanya_tutar"></label><br><a href="javascript:void(0)">KUMANYA TUTARI</a></th>
      <th scope="col"><a href="javascript:void(0)">ÇALIŞTIĞI GÜN</a></th>
     
    </tr>
  </thead>
  <tbody>
  <?php
  $total=0;
  $count=0;
  foreach( $query as $row ){
	  $count++;
	  $total=$total+$row["tutar"];
	  $vade = $row["vade"];
	$vade = date("Y", strtotime($vade)).' '.turkcetarih_formati(date("F", strtotime($vade)));
  ?>
    <tr>
      <td><?php echo $row["kart_id"]; ?></td>
	  <td><?php echo $row["tc"]; ?></td>
      <td><?php echo $row["ad"]; ?></td>
      <td><?php echo $row["soyad"]; ?></td>
      <td><?php echo $row["firma_adi"]; ?></td>
	  <td><?php echo $vade; ?></td>
	  <td><?php echo $row["tutar"]; ?></td>  
      <td><?php echo $row["gun"]; ?></td>
	</tr>
	
	<?php
	} }else{
		echo 'kayıt yok';
	}
	?>
  </tbody>
  <tfoot style="width:100%;">
       <tr >
	   <td  colspan="2"><?php echo 'Toplam <label id="kumanyasayac">'.$count.'</label> kayıt'; ?></td>
	  
	   <td colspan="3">


	   </td>
	    <td >Toplam:</td>
	   <td><?php echo '<label id="totalsayac">'.number_format($total, 2, '.', '').'</label>'; ?></td>
	   <td colspan="2">


	   </td>
	   </tr>
    </tfoot>
</table>
</div>
<?php
}else{
	echo 'hani yetki';
}
?>