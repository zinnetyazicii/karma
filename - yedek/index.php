<?php
$ru=$_SERVER['REQUEST_URI'];
$param=explode('/',$ru);

include($_SERVER['DOCUMENT_ROOT'].'/inc/header.php');


/*$dirname=dirname($_SERVER['SCRIPT_NAME']);
$basename=basename($_SERVER['SCRIPT_NAME']);*/
//$ru=str_replace([$dirname,$basename],"",$_SERVER['REQUEST_URI']);
$ru=$_SERVER['REQUEST_URI'];
$param=explode('/',$ru);
if($param[1]){
	if($_POST){
		include($base.'/act/'.$param[1].'.php');
	}else{
		include($base.'/view/'.$param[1].'.php');
	}
}else{
	include('view/index.php');
}

 //echo preg_match("@^/ay/[0-9a-zA-Z]+@",$ru); ?


include($base.'/inc/footer.php');
?>


