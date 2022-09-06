<?php
if(yetki_kontrol(@$_SESSION["rol"],"kue")){

	$id = $param[2];

$personel = $db->query("SELECT * FROM personel where pers_id = '{$id}'  ")->fetch(PDO::FETCH_ASSOC);
$vade = $personel["kumanya_tutari"];
$vade = date("Y-m", strtotime($vade));
if ( $personel){
?>
<div class="container">
<form action="<?php echo $url.'/tekkumanyaekle/'.$id; ?>" method="post" id="kumanyaguncelleform">

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
  
  <div class="form-group col-md-12">
      <label for="inputEmail4">Kumanya Tutar</label>
       <input type="text" input disabled="disabled" class="form-control" name="tutar" value="<?php echo $personel["kumanya_tutari"]; ?>">
    </div>

 

</div>
<div class="col-md-6">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Vade</label>
       <input type="month" class="form-control" name="vade" >
    </div>
  </div>

  
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Çalışdığı Gün Sayısı</label>
       <input type="text" class="form-control" name="gun" id="gunotofiyat" >
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Kumanya Tutarı</label>
       <input type="text" class="form-control" name="tutar" id="tutarotofiyat">
    </div>
  </div>
  
   <div class="form-row">
    <div class="form-group col-md-12">
       <button type="submit" style="margin-top:10px; float: right;" class="btn btn-primary">Ekle</button>
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