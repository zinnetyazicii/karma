<?php
/*
role="pe","ps","pg"
pe="personel ekle"
pg="personel güncelle"
*/
if(@$_SESSION["user"]){
	echo 'Zaten '.$_SESSION["uname"].' olarak giriş yaptın. Çıkış yapmak için <a href="'.$url.'/logout">tıkla</a>';
}else{
?>
<div class="container-fluid">
<div class="actionout loginout">
<div class="action login">
<form method="post" action="<?php echo $url.'/login'; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Kullanıcı</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="username" name="uname">
    <small id="username" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Şifre</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Beni hatırla</label><a href="signup" style="float:right;">Üye Ol</a>
  </div>
  <button type="submit" class="btn btn-primary loginbutton" style="background-color: #04508c;border:none;">Giriş</button>
</form>
</div>
</div>
</div>
<?php } ?>