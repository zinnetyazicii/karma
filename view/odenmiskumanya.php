<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}


if(yetki_kontrol(@$_SESSION["rol"],"kur") || yetki_kontrol(@$_SESSION["rol"],"kuri")){
?>
<div class="row">
    <div class="col-md-3">
      <label for="inputEmail4">Vade</label>
       <input type="month" class="form-control" id="odenmisvade" name="odenmisvade"/>
    </div>
 

    <div class="col-md-3">
      <label for="inputEmail4">Başlangıç tarihi</label>
       <input type="date" class="form-control" id="odenmisbast" name="odenmisbast" />
    </div>
 
    <div class="col-md-3">
      <label for="inputEmail4">Bitiş Tarihi</label>
      <input type="date" class="form-control" id="odenmisbitt" name="odenmisbitt"/>
    </div>
	
	 <div class="col-md-3">
   <a href="javascript:void(0)" onclick="ara()" id="odenmisaeabtn" class="btn btn-primary" style="height:60px;"><i class="fas fa-search"></i><br>Ara</a>
    </div>
  </div>
 
    <div id="odenmiskumanyagoster">
	</div>
 
<?php

}


?>