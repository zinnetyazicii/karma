<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}


if(yetki_kontrol(@$_SESSION["rol"],"kul")){
$sql="SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and personel.aktif=1";
$query = $db->query($sql, PDO::FETCH_ASSOC);
if ( $query->rowCount() ){

?>
<div class="row">
<div class="col-md-3">
<select class="form-select" onchange="workonclick()" name="persfirmasec">
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

<div class="input-group">
  <input type="text" class="form-control"  id="personeller" name="sercher" autocomplete="off" aria-label="Dollar amount (with dot and two decimal places)">
  <span  onclick="searcher()" onmouseover="" class="input-group-text" style="background-color:#04508c;color:white;"><i class=" fa fa-search"></i></span>
</div>

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
      <th scope="col"><a href="javascript:void(0)">İŞLEM</a></th>
     
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
	   
      <td>
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"kug")){ ?>
	  <a href="<?php echo $url.'/kumanyaguncelle/'.$row["kum_id"]; ?>"><span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Personeli güncelle"><i class="fas fa-cog" style="margin-right : 15px; "></i></span></a>
	  <?php } ?>
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"kus")){ ?>	  
	  <a href="javascript:void(0)" onclick="kumanyasilbuton(<?php echo $row["kum_id"]; ?>)" id="kumanyasilbuton"><span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Kumanya sil"><i class="fas fa-trash-alt"></i></span></a>
	  <?php } ?>
	  </td>
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
	   <td><?php echo '<label id="totalsayac">'.$total.'</label>'; ?></td>
	   <td colspan="2">


	   </td>
	   </tr>
    </tfoot>
</table>
</div>
<script src="<?php echo $url; ?>/js/merih.js"></script>
<?php
}else{
	echo 'hani yetki';
}
?>