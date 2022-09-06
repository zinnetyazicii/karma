<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}

require_once __DIR__.'/../inc/SimpleXLSX.php'; 
 $vade = '2021-10-01';	
 
   //echo $tarih ;
   $yol = "doc";
   $yuklemeYeri = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR .'ekim.xlsx';

   if ( $xlsx = SimpleXLSX::parse($yuklemeYeri) ) {
									
					for($i=2;$i<count($xlsx->rows());$i++){
												
						$query = $db->query("SELECT * FROM personel WHERE kart_id = {$xlsx->rows()[$i][3]}")->fetch(PDO::FETCH_ASSOC);
						
						
						if($query){
							
							
							$kuma=$xlsx->rows()[$i][2];
							echo $vade," ",$query["pers_id"]," ",1," ",$kuma," ",$_SESSION["uname"].' '. date("Y-m-d H:i:s");
							
							$query2 = $db->prepare("INSERT INTO kumanya SET gun = ?,vade = ?,pers_id = ?,status= ?,tutar=?,update_by=?,update_date =?");
							
							$insert = $query2->execute(array('-1', $vade,$query["pers_id"],1,$kuma,$_SESSION["uname"],date("Y-m-d H:i:s")));
							//$insert = $query2->execute(array("2", "2022-06-02",9,1,100,"murtaza"));
							
							if($insert){
								echo 'oldu',($i-1);
							}else echo 'olmadı';
								
						}
						
						}
		        }
	
?>

