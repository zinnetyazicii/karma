<?php
$dosya="kumanyalar.xls";
$yaz=@fopen($dosya,'w');
$query = $db->query("SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status=1 and kumanya.tutar>0 order by personel.ad asc", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
	fwrite($yaz,mb_convert_encoding("Kart ID\t", "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding("AD\t", "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding("SOYAD\t", "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding("FİRMA\t", "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding("VADE\t", "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding("TUTAR\t", "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding("ÇALIŞTIĞI", "iso-8859-9", "UTF-8"));
	fwrite($yaz,"\n");
	foreach($query as $row){
		$vade = $row["vade"];
		$vade = date("Y", strtotime($vade)).' '.turkcetarih_formati(date("F", strtotime($vade)));
		$s1=mb_convert_encoding($row['kart_id'], "iso-8859-9", "UTF-8");
		$s2=mb_convert_encoding($row['ad'], "iso-8859-9", "UTF-8");
		$s3=mb_convert_encoding($row['soyad'], "iso-8859-9", "UTF-8");
		$s4=mb_convert_encoding($row['firma_adi'], "iso-8859-9", "UTF-8");
		$s5=mb_convert_encoding($vade, "iso-8859-9", "UTF-8");
		$s6=mb_convert_encoding($row['tutar'], "iso-8859-9", "UTF-8");
		$s7=mb_convert_encoding($row['gun'], "iso-8859-9", "UTF-8");
		

		fwrite($yaz,"{$s1}\t {$s2}\t {$s3}\t {$s4}\t {$s5}\t {$s6}\t {$s7}");
		fwrite($yaz,"\n");
	}
	fclose($yaz);
	//exit;
		echo '<meta http-equiv="refresh"content="0; url='.$url.'/kumanyalar.xls">';
}
?>