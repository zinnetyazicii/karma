<?php
if(@$param[2]){
	switch($param[2]){
		case 'gunlukkumanya':
			$sql="SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status=0 and kumanya.tutar>0 order by personel.ad asc";
			$h1="Kart ID\t";
			$h2="AD\t";
			$h3="SOYAD\t";
			$h4="FİRMA\t";
			$h5="VADE\t";
			$h6="TUTAR\t";
			$h7="ÇALIŞTIĞI";
			$dosya="gunluk_kumanya_".date("d-m-Y").".xls";
		break;
		
	}
}

$yaz=@fopen($dosya,'w');
$query = $db->query($sql, PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
	fwrite($yaz,mb_convert_encoding($h1, "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding($h2, "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding($h3, "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding($h4, "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding($h5, "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding($h6, "iso-8859-9", "UTF-8"));
	fwrite($yaz,mb_convert_encoding($h7, "iso-8859-9", "UTF-8"));
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
		echo '<meta http-equiv="refresh"content="0; url='.$url.'/'.$dosya'">';
}
?>