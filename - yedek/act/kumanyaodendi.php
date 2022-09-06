
<?php

if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"kuv")){
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
$kum_id = $_POST["data"];

$sql="SELECT * FROM kumanya,personel where  personel.pers_id=kumanya.pers_id and kumanya.kum_id='".$kum_id."'";
$query2 = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

$query = $db->prepare("UPDATE kumanya SET
status = ?, update_date =now()  WHERE kum_id = ?");
$update = $query->execute(array(0, $kum_id));
if ( $update ){
     echo "
	 <script>
		$('#mymodal').fadeIn('slow');
		$.ajax({
			type: 'POST',
			data: {'tc' : '".$query2['tc']."'},
			url: url+'/act/kumanyagetir.php',
			success:function(result){
				$('#kumanyagoster').html(result);
				modal('Uyarı','Ödeme İşlemi Başarılı');
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