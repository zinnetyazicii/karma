<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"admin")){
require_once __DIR__.'/../inc/SimpleXLSX.php';
 if ($_FILES["dosya"]) {
 
   $yol = "doc";
   $yuklemeYeri = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["dosya"]["name"];
   
   
   if ( file_exists($yuklemeYeri) ) {

      echo "Dosya daha önceden yüklenmiş";

  } else {

      if ($_FILES["dosya"]["size"]  > 1000000) {

          echo "Dosya boyutu sınırı";

      } else {
          $dosyaUzantisi = pathinfo($_FILES["dosya"]["name"], PATHINFO_EXTENSION);

          if ($dosyaUzantisi != "xlsx" && $dosyaUzantisi != "xls") { # Dosya uzantı kontrolü

              echo "Sadece xlxs ve xls uzantılı dosyalar yüklenebilir.";

          } else {

              $sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);

              if($sonuc){
				if ( $xlsx = SimpleXLSX::parse($yuklemeYeri) ) {
									
					for($i=1;$i<count($xlsx->rows());$i++){
											
						$kart_id=$xlsx->rows()[$i][0];
						$ad=$xlsx->rows()[$i][2];
						$soyad=$xlsx->rows()[$i][3];
						$tc=$xlsx->rows()[$i][4];
						$babaadi=$xlsx->rows()[$i][5];
						$fir_id=$xlsx->rows()[$i][1];
						$kumanya_tutari=$xlsx->rows()[$i][8];
						
						$query = $db->prepare("INSERT INTO personel SET ad = ?,soyad = ?,tc = ?,baba_adi = ?,fir_id =?, kart_id = ? , kumanya_tutari = ?,update_by=?,aktif=?");
						$insert = $query->execute(array($ad,$soyad,$tc,$babaadi,$fir_id,$kart_id,$kumanya_tutari,$_SESSION["uname"],1));
						
						}
		        }
					
					
				 
				else {
					echo SimpleXLSX::parse_error();
					echo 'error verdi';
				}	
					 
					 
				
				  
			  }else{
				  echo 'Dosya yüklenirken hata oluştu!';
			  }

          }

      }

  }

} else {

  echo "<div>Lütfen bir dosya seçin</div>";
   	
 

}
echo "<script>
	tost('Personelin kaydı yoktur');

	</script>";
}	
?>

