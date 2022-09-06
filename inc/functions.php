<?php
function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'BA74CDCC2BBRT935136HH7B63C27'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function secureLogin($thing){
	$thing=str_replace('"', '', $thing);
	$thing=str_replace('\'', '', $thing);
	$thing=str_replace('<', '', $thing);
	$thing=str_replace('>', '', $thing);
	$thing=str_replace(' ', '', $thing);
	$thing=str_replace('\\', '', $thing);
	return $thing;
}

function yetki_kontrol($yetki,$ozellik){
	$ozellikler = explode(',', $yetki);
	if (in_array($ozellik, $ozellikler)){
		return true;
	}else{
		return false;
	}
}

function turkcetarih_formati($format){
		$ay_dizi = array(
		'January'   => 'Ocak',
        'February'  => 'Şubat',
        'March'     => 'Mart',
        'April'     => 'Nisan',
        'May'       => 'Mayıs',
        'June'      => 'Haziran',
        'July'      => 'Temmuz',
        'August'    => 'Ağustos',
        'September' => 'Eylül',
        'October'   => 'Ekim',
        'November'  => 'Kasım',
        'December'  => 'Aralık'
		);
		return($ay_dizi[$format]);
		 
		
	
}



function tutarhesapla($vade,$tutar,$gun){
	 if($tutar){
	$ay=date("m", strtotime($vade));
	$yil=date("Y", strtotime($vade));
	$netgun = cal_days_in_month(CAL_GREGORIAN, $ay, $yil);
	
	if($gun>$netgun){
		return -1;
	}
	if($netgun==31 && $gun<31 && $gun>10){
		$gun=$gun-1;
	}
	$para=$gun*$tutar/30;

	return $para;
	 }
	 else return 0;
}
?>