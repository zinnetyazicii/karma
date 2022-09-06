<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"ps")){

$pers_id = $_POST["data"];

$query = $db->prepare("UPDATE personel SET
aktif = ? ,update_date =now() , update_by=? WHERE pers_id = ?");
$update = $query->execute(array(0,$_SESSION["uname"],$pers_id));
if ( $update ){
     echo "
	 <script>
		$.ajax({
			//type: 'POST',
			//data: {'data' : id},	
			url: url+'/view/personeller.php',
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