<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"admin")){

?>
<div class="container">
<form action="<?php echo $url.'/kullaniciekle'; ?>" method="post" id="kullaniciekleform" autocomplete="off">
	
	<div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Kullanıcı Adı</label>
      <input type="text" class="form-control" name="kul_nick" autocomplete="off" Placeholder="Kullanıcı Adı">
    </div>
    </div>
	
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Adı Soyadı</label>
      <input type="text" class="form-control" name="kul_adi" autocomplete="off" Placeholder="Adı Soyadı">
    </div>
  </div>
  
	<div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Şifre</label>
      <input type="password" class="form-control" id="sifre1" name="sifre1" Placeholder="Şifre" autocomplete="off"><br>

      <input type="password" class="form-control" id="sifre2" name="sifre2" Placeholder="Şifre Tekrar"autocomplete="off">
    </div>
    </div>
	<div class="col-md-6">
	<div class="form-row " style="background-color:white;border-radius:5px;margin-top:10px;padding:25px;">
	
	<div class="col-md-6">
	<span style="font-weight:bold;color:#04508c;margin-bottom:10px;">PERSONEL</span>
	   <div class="form-check" style="margin-top :10px;">
	  <input class="form-check-input" type="checkbox" name="plchx">
	  <label class="form-check-label" for="flexCheckDefault">
		Personel Listele
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="pechx" id="pechx">
	  <label class="form-check-label" for="pechx">
		Personel Ekle
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="pgchx" id="pgchx">
	  <label class="form-check-label" for="pgchx">
		Personel Güncelle
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="pschx" id="pschx">
	  <label class="form-check-label" for="pschx">
		Personel Sil
	  </label>
	</div>
	</div>
	
	
	
	<div class="col-md-6">
	<span style="font-weight:bold;color:#04508c;margin-bottom:10px;">KUMANYA</span>	
	   
	   <div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kulchx" id="kulchx">
	  <label class="form-check-label" for="kulchx">
		Kumanya Listele
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox"name="kuechx" id="kuechx">
	  <label class="form-check-label" for="kuechx">
		Kumanya Ekle
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox"name="kuvchx" id="kuvchx">
	  <label class="form-check-label" for="kuvchx">
		Kumanya Ver
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kugchx" id="kugchx">
	  <label class="form-check-label" for="kugchx">
		Kumanya Güncelle
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kurchx" id="kurchx">
	  <label class="form-check-label" for="kurchx">
		Kumanya Raporla
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kuhchx" id="kuhchx">
	  <label class="form-check-label" for="kuhchx">
		Tüm Kumanyaları Görüntüle
	  </label>
	</div>	
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kuochx" id="kuochx">
	  <label class="form-check-label" for="kuochx">
		Kumanya Sil
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kuschx" id="kuschx">
	  <label class="form-check-label" for="kuschx">
		Kumanya Sil
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kdschx" id="kdschx">
	  <label class="form-check-label" for="kdschx">
		Kumanya Dönemi Sil
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kugunchx" id="kugunchx">
	  <label class="form-check-label" for="kugunchx">
		Günlük Verilen Kumanya
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="adminchx" id="adminchx">
	  <label class="form-check-label" for="adminchx">
		Admin
	  </label>
	</div>
	</div>
	</div>
	</div>
	
	</div>
	</div>
	
 
  <a href="javascript:void(0)" onclick="kullaniciekle()" style="margin-top:10px;" id="kuleklebtn" class="btn btn-primary">Kaydet</a>
</form>
</div>

<script src="<?php echo $url; ?>/js/merih.js"></script>
<?php }
else
	echo " sen hayırdır ";
?>