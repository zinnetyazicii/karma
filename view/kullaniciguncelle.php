<?php
if(yetki_kontrol(@$_SESSION["rol"],"admin")){

	$id = $param[2];

$kullanici = $db->query("SELECT * FROM kullanici WHERE kul_id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
if ( $kullanici ){
?>
<div class="container">
<form action="<?php echo $url.'/kullaniciguncelle/'.$id; ?>" method="post" id="kullaniciguncelleform" autocomplete="off">
	
	<div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Kullanıcı Adı</label>
      <input type="text" class="form-control" name="kul_nick" value="<?php echo $kullanici["kul_nick"]; ?>">
    </div>
    </div>
	
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Adı Soyadı</label>
      <input type="text" class="form-control" name="kul_adi" maxlength="11" value="<?php echo $kullanici["kul_adi"]; ?>">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Yetkiler</label>
      <input type="text" class="form-control" name="rol" value="<?php echo $kullanici["rol"]; ?>">
    </div>
    </div>
	
	<div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Şifre Sıfırla</label>
	  <div class="form-check form-switch">
	  <input class="form-check-input" type="checkbox" name="sifre_sifirla" id="sifre_sifirla" value="">
	  <label class="form-check-label" for="flexCheckDefault">
		Şifreyi Sıfırla
	  </label>
	</div>

      <input type="password" class="form-control" id="sifre1" name="sifre1" autocomplete="off" disabled>
      <input type="password" class="form-control" id="sifre2" style="margin-top:5px;" name="sifre2" autocomplete="off" disabled>
    </div>
    </div>
	
	<div class="col-md-6">
	<div class="row" style="background-color:white;border-radius:5px;padding:15px;margin-top:15px;">
	
	<div class="col-md-4">
	<span style="font-weight:bold;color:#04508c;margin-bottom:10px;">PERSONEL</span>
	   <div class="form-check" style="margin-top :10px;">
	  <input class="form-check-input" type="checkbox" name="plchx" <?php if(yetki_kontrol($kullanici["rol"],'pl')){echo 'checked';} ?> id="plchx" >
	  <label class="form-check-label" for="plchx">
		Personel Listele
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="pechx" value="pe" <?php if(yetki_kontrol($kullanici["rol"],'pe')){echo 'checked';} ?>  id="pechx">
	  <label class="form-check-label" for="pechx">
		Personel Ekle
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="pgchx"  <?php if(yetki_kontrol($kullanici["rol"],'pg')){echo 'checked';} ?>  id="pgchx">
	  <label class="form-check-label" for="pgchx">
		Personel Güncelle
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="pschx" <?php if(yetki_kontrol($kullanici["rol"],'ps')){echo 'checked';} ?> id="pschx">
	  <label class="form-check-label" for="pschx">
		Personel Sil
	  </label>
	</div>
	</div>
	
	
	
	<div class="col-md-4">
	<span style="font-weight:bold;color:#04508c;margin-bottom:10px;">KUMANYA</span>	
	   
	   <div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kulchx" <?php if(yetki_kontrol($kullanici["rol"],'kul')){echo 'checked';} ?> id="kulchx">
	  <label class="form-check-label" for="kulchx">
		Kumanya Listele
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox"name="kuechx"  <?php if(yetki_kontrol($kullanici["rol"],'kue')){echo 'checked';} ?> id="kuechx">
	  <label class="form-check-label" for="kuechx">
		Kumanya Ekle
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kuvchx" <?php if(yetki_kontrol($kullanici["rol"],'kuv')){echo 'checked';} ?> id="kuvchx">
	  <label class="form-check-label" for="kuvchx">
		Kumanya Ver
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kugchx" <?php if(yetki_kontrol($kullanici["rol"],'kug')){echo 'checked';} ?> id="kugchx">
	  <label class="form-check-label" for="kugchx">
		Kumanya Güncelle
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kurchx" <?php if(yetki_kontrol($kullanici["rol"],'kur')){echo 'checked';} ?> id="kurchx">
	  <label class="form-check-label" for="kurchx">
		Kumanya Raporla
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kuhchx" id="kuhchx" <?php if(yetki_kontrol($kullanici["rol"],'kuh')){echo 'checked';} ?> id="">
	  <label class="form-check-label" for="kuhchx">
		Tüm Kumanyaları Görüntüle
	  </label>
	</div>	
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kuschx" <?php if(yetki_kontrol($kullanici["rol"],'kus')){echo 'checked';} ?> id="kuschx">
	  <label class="form-check-label" for="kuschx">
		Kumanya Sil
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kuochx" <?php if(yetki_kontrol($kullanici["rol"],'kuo')){echo 'checked';} ?> id="kuochx">
	  <label class="form-check-label" for="kuochx">
		Onaylanan Kumanya
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kugunchx" <?php if(yetki_kontrol($kullanici["rol"],'kugun')){echo 'checked';} ?> id="kugunchx">
	  <label class="form-check-label" for="kugunchx">
		Günlük Verilen Kumanya
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="kdschx" <?php if(yetki_kontrol($kullanici["rol"],'kds')){echo 'checked';} ?> id="kdschx">
	  <label class="form-check-label" for="kdschx">
		Kumanya Dönemi Sil
	  </label>
	</div>
	
	<div class="form-check">
	  <input class="form-check-input" type="checkbox" name="adminchx" <?php if(yetki_kontrol($kullanici["rol"],'admin')){echo 'checked';} ?> id="adminchx">
	  <label class="form-check-label" for="adminchx">
		Admin
	  </label>
	</div>
	
	</div>
	</div>
	</div>
	
	
	
 
  <button type="submit" id="kulguncellebtn" style="margin-top:10px;" class="btn btn-primary">Güncelle</button>
</form>
</div>
<script src="<?php echo $url; ?>/js/merih.js"></script>
<?php }}
else
	echo " sen hayırdır ";
?>