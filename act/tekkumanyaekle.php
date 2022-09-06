<?php
if(!isset($_SESSION)){
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"kue")){

$pers_id=$param[2];
$vade=$_POST["vade"].'-01';
$gun=$_POST["gun"];
$tutar=$_POST["tutar"];
if($gun){
	$query = $db->prepare("insert into kumanya SET
 vade = ? ,gun = ? ,tutar = ?, pers_id=?,update_by=?,status=?");
$insert = $query->execute(array($vade,$gun,$tutar,$pers_id,$_SESSION["uname"],1));
if ( $insert ){
	 
	$query2 = $db->query("SELECT * FROM personel WHERE pers_id = '{$pers_id}'")->fetch(PDO::FETCH_ASSOC);
	if($query2){
	 echo "
	 <script>
		$.ajax({	
			url: url+'/view/kumanyalar.php',
			success:function(result){
				$('#maincont').html(result);
				modal('İşlem Başarılı','".$query2["ad"]." ".$query2["soyad"]." adlı personele ".$tutar." tutarındaki kumanya başarıyla eklendi.');
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
}else{
	echo "<script>
	modal('Hata','Kumanya eklememe işlemi başarısız');

	</script>";
}
}else{
	echo "<script>
		alert('Gün değeri boş olamaz');
	</script>";
}


}
?>
