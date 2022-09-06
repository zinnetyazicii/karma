<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
$count=0;
$top=0;

if(yetki_kontrol(@$_SESSION["rol"],"kue")){

require_once __DIR__.'/../inc/SimpleXLSX.php';
 if ($_FILES["dosya"]) {
 
 $vade = $_POST["tarih"]; 
 $vade = date("Y-m", strtotime($vade)).'-01';
   //echo $tarih ;
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
									
					for($i=2;$i<count($xlsx->rows())-2;$i++){
												
						$query = $db->query("SELECT * FROM personel WHERE kart_id = {$xlsx->rows()[$i][0]}")->fetch(PDO::FETCH_ASSOC);
						
						
						if($query){
							$sql = "select count(*) from kumanya WHERE vade = '".$vade."' and pers_id = '".$query["pers_id"]."' and status>=0"; 
							$result = $db->prepare($sql);
							$result->execute();
							$sayisatir = $result->fetchColumn();
							
							$kuma=tutarhesapla($vade,$query["kumanya_tutari"],$xlsx->rows()[$i][3]);
							if($kuma==-1){
								echo '<script>
									alert("yanlış ay yüklemeye çalışıyor gibisin");
								</script>';
								break;
							}
							else if($sayisatir){
								echo '<script>
									alert("Yüklü zaten");
								</script>';
								break;
								
								
							}
							else{
							$query2 = $db->prepare("INSERT INTO kumanya SET gun = ?,vade = ?,pers_id = ?,status= ?,tutar=?,update_by=?");
							$insert = $query2->execute(array($xlsx->rows()[$i][3], $vade,$query["pers_id"],1,$kuma,$_SESSION["uname"]));
							if($insert){
								$count++;
								$top=$top+$kuma;
								
							}
							
							
							$ay=date("m", strtotime($vade));
							$yil=date("Y", strtotime($vade));
							$netgun = cal_days_in_month(CAL_GREGORIAN, $ay, $yil);
							}
						}
						
						}
						
						echo '<b>Toplam '.number_format($top, 2, '.', '').' tl değerinde<br>'.
						$count.' kayıt eklendi.</b>';
		        }
					
					
				 
				else {
					echo SimpleXLSX::parse_error();
					echo 'error verdi';
				}	
					 
					 
				
				  
			  }else{
				  echo 'Dosya yüklenirken hata oluştu!';
			  }

          }
		unlink($yuklemeYeri);
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

