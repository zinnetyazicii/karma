<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
if(@$_SESSION["rol"]=='admin'){
require_once __DIR__.'/../inc/SimpleXLSX.php';
 
 
   $yol = "doc";
   $yuklemeYeri = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . 'personel2.xlsx';
   
   
   if ( 0>3 ) {

      echo "Dosya daha önceden yüklenmiş";

  } else {

      if (100000  > 1000000) {

          echo "Dosya boyutu sınırı";

      } else {
          //$dosyaUzantisi = pathinfo($_FILES["dosya"]["name"], PATHINFO_EXTENSION);

          if (0) { # Dosya uzantı kontrolü

              echo "Sadece xlxs ve xls uzantılı dosyalar yüklenebilir.";

          } else {

              //$sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);

              if(1>0){
				if ( $xlsx = SimpleXLSX::parse($yuklemeYeri) ) {
									
					for($i=1;$i<count($xlsx->rows());$i++){
											
						/*$query = $db->query("SELECT * FROM personel,firma WHERE kart_id = {$xlsx->rows()[$i][0]}")->fetch(PDO::FETCH_ASSOC);
						if($query){
							$kuma=tutarhesapla($vade,$query["kumanya_tutari"],$xlsx->rows()[$i][3]);
							$query2 = $db->prepare("INSERT INTO kumanya SET gun = ?,vade = ?,pers_id = ?,status= ?,tutar=?,update_by=?");
							$insert = $query2->execute(array($xlsx->rows()[$i][3], $vade,$query["pers_id"],1,$kuma,$_SESSION["uname"]));
							//$insert = $query2->execute(array("2", "2022-06-02",9,1,100,"murtaza"));
							
							$ay=date("m", strtotime($vade));
							$yil=date("Y", strtotime($vade));
							$netgun = cal_days_in_month(CAL_GREGORIAN, $ay, $yil);
						
						}*/
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

 
echo "<script>
	tost('Personelin kaydı yoktur');

	</script>";
}
?>
