<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}

if(yetki_kontrol(@$_SESSION["rol"],"pe")){
	
$tc=$_POST["tc"];
$ad=$_POST["ad"];
$soyad=$_POST["soyadi"];
$babaadi=$_POST["babaadi"];
$fir_id=$_POST["fir_id"];
$kart_id=$_POST["kart_id"];
$kumanya_tutari=$_POST["kumanya_tutari"];


  $sql = "select count(*) from personel WHERE tc = '".$tc."' or kart_id = '".$kart_id."'"; 
         $result = $db->prepare($sql);
         $result->execute();
         $sayisatir = $result->fetchColumn();
/*
$kontrol = $db->query("SELECT * FROM personel WHERE tc = '{$tc}' or kart_id = '{$kart_id}'")->fetch(PDO::FETCH_ASSOC);
if ( $kontrol ){

}
*/
if($sayisatir){
	echo 'Bu kullanıcı zaten kayıtlı. Mevcut veya silinmiş bir kullanıcı olabilir.';
}
else{

$query = $db->prepare("INSERT INTO personel SET ad = ?,soyad = ?,tc = ?,baba_adi = ?,fir_id =?, kart_id = ? , kumanya_tutari = ?,update_by=?,aktif=?");
$insert = $query->execute(array($ad,$soyad,$tc,$babaadi,$fir_id,$kart_id,$kumanya_tutari,$_SESSION["uname"],1));
if ( $insert ){
    echo "
	<script>
	 $.ajax({
			//type: 'POST',
			//data: {'data' : id},
			url: url+'/view/personeller.php',
			success:function(result){
				$('#maincont').html(result);
				modal('Başarılı','Personel başarıyla eklendi.');
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
	echo 'kaydolmadı';
}
}
}
else
	echo " sen hayırdır ";
?>