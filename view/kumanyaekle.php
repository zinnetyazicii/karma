<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"kue")){

?>
<div class="container">
<form action="<?php echo $url.'/kumanyaekle'; ?>" method="post" id="kumanyaekleform" autocomplete="off" enctype="multipart/form-data">
	
	<div class="form-row">
	  <div class="form-group col-md-6">
      <label for="inputPassword4">Kumanya tarihi</label>
      <input type="month" class="form-control" name="tarih" >
      </div>
    </div>
	<div class="form-group col-md-6">
		<div class="form-group">
			<label>Kumanya Listesini Yükleyin</label>
			<input type="file" name="dosya" style="border:1px solid black;background-color:#fff;color:black;"class="form-control">
		</div>
		</div>
		
		  <div class="form-row">
    <div class="form-group col-md-12">
		<button type="submit" name="Submit" style="margin-top:10px; float: left;" class="btn btn-primary">Yükle</button>
       
    </div>
  </div>
		
			
		
	
 
	
</form>
</div>
<script src="<?php echo $url; ?>/js/merih.js"></script>
<?php }
else
	echo " sen hayırdır ";
?>