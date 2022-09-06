<?php

if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"kus")){
$kum_id = $_POST["data"];
$filtre = $_POST["filtre"];


$query = $db->prepare("UPDATE kumanya SET
status = ?,update_date =now() , update_by=? WHERE kum_id = ?");
$update = $query->execute(array(-1,$_SESSION["uname"],$kum_id,));
if ( $update ){
     echo "
	 <script>
		$.ajax({
			type: 'POST',
			data: {'fir_id' : '".$filtre."'},	
			url: url+'/act/personelfiltrele.php',
			success:function(result){
				$('#filtrelenenkumanya').html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		
		modal('Uyarı','Kumanya silme işlemi başarılı');
		$('#modalbutton').click(function(){
			$('.mymodal').hide();
		});
		
		
	 </script>
	 ";
}
}
?>