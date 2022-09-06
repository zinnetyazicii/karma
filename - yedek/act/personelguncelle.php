<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}

if(yetki_kontrol(@$_SESSION["rol"],"pg")){
$tc=$_POST["tc"];
$ad=$_POST["ad"];
$soyad=$_POST["soyadi"];
$babaadi=$_POST["babaadi"];
$fir_id=$_POST["fir_id"];
$kart_id=$_POST["kart_id"];
$kumanya_tutar=$_POST["kumanya_tutar"];

$id=$param[2];

$query = $db->prepare("UPDATE personel SET
ad=?, soyad=?, tc=?, baba_adi=?, fir_id=? , kart_id = ? ,kumanya_tutari	 = ? WHERE pers_id = ?");
$update = $query->execute(array($ad,$soyad,$tc,$babaadi,$fir_id,$kart_id,$kumanya_tutar,$id));
if ( $update ){
	 echo "
	 <script>
	 $.ajax({
			//type: 'POST',
			//data: {'data' : id},
			url: url+'/view/personeller.php',
			success:function(result){
				$('#maincont').html(result);
				modal('Başarılı','Personel başarıyla güncellendi.');
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
else echo "<script>
 alert('hatalı işlem yapıldı');</script>";
}

?>