<?php
if(yetki_kontrol(@$_SESSION["rol"],"kug")){

	$id = $param[2];

$personel = $db->query("SELECT * FROM personel,kumanya WHERE personel.pers_id=kumanya.pers_id and kumanya.kum_id = '{$id}'  ")->fetch(PDO::FETCH_ASSOC);
$vade = $personel["vade"];
$vade = date("Y-m", strtotime($vade));
if ( $personel){
?>
<div class="container">
<form action="<?php echo $url.'/kumanyaguncelle/'.$id; ?>" method="post" id="kumanyaguncelleform">

<div class="form-row">
<div class="col-md-6">
<div class="form-group col-md-12">
      <label for="inputPassword4">Kart ID</label>
      <input type="text" input disabled="disabled" class="form-control" name="kart_id" value="<?php echo $personel["kart_id"]; ?>">
    </div>
      
    <div class="form-group col-md-12">
      <label for="inputEmail4">TC</label>
      <input type="text" input disabled="disabled" class="form-control" name="tc" maxlength="11" value="<?php echo $personel["tc"]; ?>">
    </div>
  
  
  <div class="form-group col-md-12">
      <label for="inputPassword4">Adı</label>
      <input type="text" input disabled="disabled" class="form-control" name="ad" value="<?php echo $personel["ad"]; ?>">
    </div>
    
  
   
    <div class="form-group col-md-12">
      <label for="inputEmail4">Soyadı</label>
       <input type="text" input disabled="disabled" class="form-control" name="soyadi" value="<?php echo $personel["soyad"]; ?>">
    </div>
  
    
    <div class="form-group col-md-12">
      <label for="inputEmail4">Baba Adı</label>
       <input type="text" input disabled="disabled" class="form-control" name="babaadi" value="<?php echo $personel["baba_adi"]; ?>">
    </div>
  </div>
 
<div class="col-md-6">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Vade</label>
       <input type="month" class="form-control" name="vade" value="<?php echo $vade; ?>">
    </div>
  </div>

   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Kumanya Tutarı</label>
       <input type="text" class="form-control" name="tutar" id="kumanya_tutari" value="<?php echo $personel["tutar"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Çalışdığı Gün Sayısı</label>
       <input type="text" class="form-control" name="gun" id="gun" value="<?php echo $personel["gun"]; ?>">
    </div>
  </div>
  
   <div class="form-row">
    <div class="form-group col-md-12">
       <button type="submit" style="margin-top:10px; float: right;" class="btn btn-primary">Güncelle</button>
    </div>
  </div>
  

</div>
</div>

 

</form>
</div>
<script src="<?php echo $url; ?>/js/merih.js"></script>
<?php }else{
	echo 'Böyle bi kumanya yok';
}}
else
	echo " sen hayırdır ";
?>