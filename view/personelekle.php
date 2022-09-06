<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"pe")){
?>
<div class="container">
<form action="<?php echo $url; ?>/personelekle" method="post" id="personelekleform" autocomplete="off">
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label for="inputPassword4">Firma</label>
			<select name="fir_id" class="form-control">
			<?php
				$query = $db->query("SELECT * FROM firma", PDO::FETCH_ASSOC);
				if ( $query->rowCount() ){
				foreach( $query as $row ){
				 echo '<option value="'.$row["fir_id"].'">'.$row["firma_adi"].'</option>';
				} }
			?>
			</select>
		</div>
	</div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Kart ID</label>
      <input type="text" class="form-control" name="kart_id" >
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">TC</label>
      <input type="text" class="form-control" name="tc" maxlength="11">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputPassword4">Adı</label>
      <input type="text" class="form-control" name="ad">
    </div>
    </div>
  
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Soyadı</label>
       <input type="text" class="form-control" name="soyadi">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Baba Adı</label>
       <input type="text" class="form-control" name="babaadi">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Kumanya Tutarı</label>
       <input type="text" class="form-control" name="kumanya_tutari" id="kumanya_tutari" >
    </div>
  </div>
 
	<div class="form-row">
    <div class="form-group col-md-6">
      <a href="javascript:void(0)" style="margin-top:10px; float:right;" onclick="perskaydetbuton()" id="perskaydetbuton" class="btn btn-primary">Kaydet</a>
    </div>
  </div>
  
</form>
</div>

<?php
}
?>
<script src="<?php echo $url; ?>/js/merih.js"></script>