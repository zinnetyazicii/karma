<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
$query = $db->prepare("UPDATE kullanici SET sifre=? WHERE kul_id = ?");
	$update = $query->execute(array($_POST["data"],$_SESSION["kul_id"]));
	if($update){
		echo "
	 <script>
		$.ajax({
			//type: 'POST',
			//data: {'data' : id},	
			url: url+'/view/sifreguncelle.php',
			success:function(result){
				$('#maincont').html(result);
				modal('Uyarı','Şifre güncelleme işlemi başarılı');
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
        
?>