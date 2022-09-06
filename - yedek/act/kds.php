<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
$fir_id=$_POST["fir_id"];
$yil=$_POST["yil"];
$ay=$_POST["ay"];
$vade=$yil.'-'.$ay.'-01';
$cnt=0;
$sql="select kum_id from personel,firma,kumanya where kumanya.pers_id=personel.pers_id and personel.fir_id=firma.fir_id and kumanya.status=1 and kumanya.vade={$vade} and personel.fir_id={$fir_id}";
$query = $db->query($sql, PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
	foreach($query as $row){
		$querydel = $db->prepare("delete from kumanya WHERE kum_id=? ");
		$delete = $querydel->execute(array($row["kum_id"]));
		$cnt++;
	}
	
}
if ( $cnt==$query->rowCount() ){
     /*echo "
	 <script>
		modal('Uyarı','Kumanya silme işlemi başarılı');
		$('#modalbutton').click(function(){
			//window.location.href(url+'/kumanyalar');
			$('#mymodal').hide();
		});
		
		
	 </script>
	 ";*/
	 echo $cnt;
}

?>