<?php
if(yetki_kontrol(@$_SESSION["rol"],"admin")){
$kul_nick=$_POST["kul_nick"];
$kul_adi=$_POST["kul_adi"];
$sifre1=$_POST["sifre1"];
$yetki='';
if(@$_POST["plchx"])
	$yetki='pl,';//personel listele
if(@$_POST["pechx"])
	$yetki=$yetki.'pe,';//personel ekle
if(@$_POST["pgchx"])
	$yetki=$yetki.'pg,';//personel güncelle
if(@$_POST["pschx"])
	$yetki=$yetki.'ps,';//personel sil
if(@$_POST["kulchx"])
	$yetki=$yetki.'kul,';//kumanya listele
if(@$_POST["kuechx"])
	$yetki=$yetki.'kue,';//kumanya ekle
if(@$_POST["kuvchx"])
	$yetki=$yetki.'kuv,';//kumanya ver
if(@$_POST["kurchx"])
	$yetki=$yetki.'kur,';//kumanya raporla
if(@$_POST["kuhchx"])
	$yetki=$yetki.'kuh,';//tüm kumanya görüntüle
if(@$_POST["kugchx"])
	$yetki=$yetki.'kug,';//kumanya güncelle
if(@$_POST["kuschx"])
	$yetki=$yetki.'kus,';//kumanya sil
if(@$_POST["kugunchx"])
	$yetki=$yetki.'kugun,';//günlük verilen kumanya
if(@$_POST["kuochx"])
	$yetki=$yetki.'kuo,';//onaylanan kumanya
if(@$_POST["kdschx"])
	$yetki=$yetki.'kds,';//kumanya dönem sil
if(@$_POST["adminchx"])
	$yetki=$yetki.'admin,';//kullanici ekle,güncelle,sil

	$query = $db->prepare("insert into  kullanici set kul_nick=?, kul_adi=?, rol=?, sifre=?, aktif=?");
	$update = $query->execute(array($kul_nick,$kul_adi,$yetki,$sifre1,'1'));

if ( $update ){
     echo "
	 <script>
		$.ajax({
			//type: 'POST',
			//data: {'data' : id},	
			url: url+'/view/kullanicilar.php',
			success:function(result){
				$('#maincont').html(result);
				modal('Başarılı','Kullanıcı başarıyla eklendi.');
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
	echo 'Kullanıcı eklerken hata oluştu';
}

}else{
	echo 'Hani yetki?';
}


/*$query = $db->prepare("INSERT INTO personel SET ad = ?,soyad = ?,tc = ?,baba_adi = ?,fir_id =?, kart_id = ? , kumanya_tutari = ?");
$insert = $query->execute(array($ad,$soyad,$tc,$babaadi,$fir_id,$kart_id,$kumanya_tutari));*/
?>