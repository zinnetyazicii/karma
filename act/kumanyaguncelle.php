<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}

if(yetki_kontrol(@$_SESSION["rol"],"kug")){

$kum_id=$param[2];
$vade=$_POST["vade"].'-01';
$gun=$_POST["gun"];
$tutar=$_POST["tutar"];

$query = $db->prepare("UPDATE kumanya SET
 vade = ? ,gun = ? ,tutar = ? WHERE kum_id=?");
$update = $query->execute(array($vade,$gun,$tutar,$kum_id));
if ( $update ){
	// echo '<meta http-equiv="refresh"content="1; url='.$url.'/kumanyaguncelle/'.$kum_id.'">';
	 echo "
	 <script>
		$.ajax({
			//type: 'POST',
			//data: {'data' : id},	
			url: url+'/view/kumanyalar.php',
			success:function(result){
				$('#maincont').html(result);
				modal('Uyarı','Kumanya güncelleme işlemi başarılı');
				$('#modalbutton').click(function(){
					$('.mymodal').hide();
				});
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		
		
	 </script>
	 ";
}else{
	echo 'Kumanya Güncelleme işlemi Başarısız';
	
	
}
}
?>