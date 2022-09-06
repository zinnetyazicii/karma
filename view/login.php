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
  <div class="main">
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form method="post" action="<?php echo $url.'/login'; ?>">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input type="text"  name="uname" Placeholder="Kullanıcı Adı" required></p>
            <p><span class="fa fa-lock"></span><input type="password"  name="pass" Placeholder="Şifre" required></p>
            
             <div>
				<span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#"></a></span>
				<span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="GİRİŞ"></span>
             </div>

          </fieldset>
<div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">KARMA
          
          <div class="clearfix"></div>
      </div>
      
      </div>
</center>
    </div>

</div>
<?php } ?>