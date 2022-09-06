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


<div class="input-group">
  <input type="text" style="border:2px solid black;" id="personeller" name="uname" autocomplete="off">
  <span class="input-group-text" style="background-color:#04508c;color:white;"><i class=" fa fa-search"></i></span>
</div>

<table class="table table-striped table-bordered table-sm" id="personeltable">
  <thead style=" ">
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
  foreach( $query as $row ){
  ?>
    <tr>
      <td><?php echo $row["kart_id"]; ?></td>
	  <td><?php echo $row["tc"]; ?></td>
      <td><?php echo $row["ad"]; ?></td>
      <td><?php echo $row["soyad"]; ?></td>
      <td><?php echo $row["firma_adi"]; ?></td>
	  <td><?php echo $row["vade"]; ?></td>
	  <td><?php echo $row["tutar"]; ?></td>  
      <td><?php echo $row["gun"]; ?></td>
	   
      <td>
	 
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"pg") ){ ?>
	  <a href="<?php echo $url.'/personelguncelle/'.$row["pers_id"]; ?>" ><span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Personel güncelle"><i class="fas fa-cog" style="margin-right : 15px;"></i></span></a>
	  <?php } ?>
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"kue")){ ?>
	  <a href="<?php echo $url.'/tekkumanyaekle/'.$row["pers_id"]; ?>"><span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Kumanya ekle"><i class="fas fa-cart-plus" style="margin-right : 15px;"></i></span></a>
	  <?php } ?>
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"kul") ){ ?>	  
	  <a href="javascript:void(0)" onclick="kumanyagetirbutton(<?php echo "'".$row["ad"]."','".$row["soyad"]."','".$row["baba_adi"]."'"; ?>)"><span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Kumanyasını göster"><i class="far fa-eye" style="margin-right : 15px;"></i></span></a>
	  <?php } ?>
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"ps") ){ ?>	  
	  <a href="javascript:void(0)" onclick="perssilbuton(<?php echo $row["pers_id"]; ?>)" id="perssilbuton"><span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Personeli sil"><i class="fas fa-trash-alt"></i></span></a>
	  <?php } ?>
	  </td>
	</tr>
	<?php
	} }
	?>
  </tbody>
</table>
<script src="<?php echo $url; ?>/js/merih.js"></script>
<?php
}
?>