<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}


if(yetki_kontrol(@$_SESSION["rol"],"kuv")){
?>
<div class="container">
<form action="<?php echo $url; ?>/kumanyaver" method="post" id="personelekleform">
 
 <div class="container h-100">
     <div class="d-flex justify-content-center h-100">
         <div class="search"> <input class="search_input" type="text" name="tc" id="tc" placeholder="Tc"> <a href="javascript:void(0)" id="kumgetirbuton" class="search_icon"><i class="fa fa-search"></i></a> </div>
     </div>
 </div>
 
	
</form>
<div id="kumanyagoster">

</div>
</div>

<?php
}
?>
<script src="<?php echo $url; ?>/js/merih.js"></script>