<?php
$uname = $_POST['uname']; 
$pass = $_POST['pass']; 
$query = $db->query("SELECT * FROM  kullanici WHERE kul_nick = '{$uname}' and sifre= '{$pass}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    $_SESSION["user"]=true;
    $_SESSION["kul_id"]=$query["kul_id"];
	$_SESSION["rol"]=$query["rol"];
	$_SESSION["uname"]=$query["kul_nick"];
	 echo '<meta http-equiv="refresh"content="1; url='.$url.'">';
}else{
	//echo 'Kullanıcı adı ya da şifre yanlış. <a href="'.$url.'/login">Geri dön</a>';
	echo '
	<script>
		alert("Kullanıcı adı veya şifre hatalı");
	</script>
	';
}
?>