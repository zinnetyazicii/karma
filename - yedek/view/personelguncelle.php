<?php
if(yetki_kontrol(@$_SESSION["rol"],"pg")){

	$id = $param[2];

$personel = $db->query("SELECT * FROM personel WHERE pers_id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
if ( $personel ){
?>
<div class="container">
<form action="<?php echo $url.'/personelguncelle/'.$id; ?>" method="post" id="personelekleform">
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label for="inputPassword4">Firma</label>
			<select name="fir_id" class="form-control">
			<?php
				$query = $db->query("SELECT * FROM firma", PDO::FETCH_ASSOC);
				if ( $query->rowCount() ){
				foreach( $query as $row ){
					if($personel["fir_id"]==$row["fir_id"])
						echo '<option value="'.$row["fir_id"].'" selected>'.$row["firma_adi"].'</option>';
					else
						echo '<option value="'.$row["fir_id"].'">'.$row["firma_adi"].'</option>';
				} }
			?>
			</select>
		</div>
	</div>
	<div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Kart ID</label>
      <input type="text" class="form-control" name="kart_id" value="<?php echo $personel["kart_id"]; ?>">
    </div>
    </div>
	
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">TC</label>
      <input type="text" class="form-control" name="tc" maxlength="11" value="<?php echo $personel["tc"]; ?>">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Adı</label>
      <input type="text" class="form-control" name="ad" value="<?php echo $personel["ad"]; ?>">
    </div>
    </div>
  
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Soyadı</label>
       <input type="text" class="form-control" name="soyadi" value="<?php echo $personel["soyad"]; ?>">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Baba Adı</label>
       <input type="text" class="form-control" name="babaadi" value="<?php echo $personel["baba_adi"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Kumanya Tutari</label>
       <input type="text" class="form-control" name="kumanya_tutar" value="<?php echo $personel["kumanya_tutari"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <a href="javascript:void(0)" onclick="perskaydetbuton()" id="perskaydetbuton" style="margin-top:10px; float: right;"class="btn btn-primary">Güncelle</a>
    </div>
  </div>
  
</form>
</div>
<?php }}
else
	echo " sen hayırdır ";
?>