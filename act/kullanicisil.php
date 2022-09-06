<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"ks")){
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
$kul_id = $_POST["data"];

$query = $db->prepare("UPDATE kullanici SET
aktif = ? WHERE kul_id = ?");
$update = $query->execute(array(0,$kul_id));
if ( $update ){
     echo "
	 <script>
		$.ajax({
			//type: 'POST',
			//data: {'data' : id},	
			url: url+'/view/ayarlar.php',
			success:function(result){
				$('#maincont').html(result);
				modal('Uyarı','Silme İşlemi Başarılı');
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
}
}
?>