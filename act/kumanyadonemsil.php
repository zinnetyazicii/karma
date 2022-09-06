<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}
if(yetki_kontrol(@$_SESSION["rol"],"kds")){
	
	if(@$_POST){
		$fir_id=$_POST["fir_id"];
		if($_POST["fir_id"]=="all"){
			$sql="SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status=1 and kumanya.tutar>0";
		}else{
			$sql="SELECT * FROM kumanya,personel,firma where firma.fir_id=personel.fir_id and personel.pers_id=kumanya.pers_id and personel.aktif=1 and kumanya.status=1 and kumanya.tutar>0 and personel.fir_id={$fir_id}";
		}
	if(@$_POST["donem"]){
		$donem=$_POST["donem"];
		$donemg=explode('-',$donem);
		$yil=$donemg[0];
		$ay=$donemg[1];
		$sql=$sql." and vade='".$donem."-01'";
	}


$query = $db->query($sql, PDO::FETCH_ASSOC);
if ( $query->rowCount() ){

?>
<table class="table table-striped table-bordered table-sm" id="personeltable" >
  <thead>
    <tr>
      <th scope="col"><label id="kartid"></label><br><a href="javascript:void(0)">KART ID</a></th>
      <th scope="col"><label id="tc"></label><br><a href="javascript:void(0)">TC</a></th>
      <th scope="col"><label id="ad"></label><br><a href="javascript:void(0)">AD</a></th>
      <th scope="col"><label id="soyad"></label><br><a href="javascript:void(0)">SOYAD</a></th>
	  <th scope="col"><label id="soyad"></label><br><a href="javascript:void(0)">FİRMA</a></th>
      <th scope="col"><a href="javascript:void(0)">VADE</a></th>
	  <th scope="col"><label id="kumanya_tutar"></label><br><a href="javascript:void(0)">KUMANYA TUTARI</a></th>
      <th scope="col"><a href="javascript:void(0)">ÇALIŞTIĞI GÜN</a></th>
      <th scope="col"><a href="javascript:void(0)">İŞLEM</a></th>
     
    </tr>
  </thead>
  <tbody>
  <?php
  $total=0;
  $count=0;
  foreach( $query as $row ){
	  $count++;
	  $total=$total+$row["tutar"];
	  $vade = $row["vade"];
	$vade = date("Y", strtotime($vade)).' '.turkcetarih_formati(date("F", strtotime($vade)));
  ?>
    <tr>
      <td><?php echo $row["kart_id"]; ?></td>
	  <td><?php echo $row["tc"]; ?></td>
      <td><?php echo $row["ad"]; ?></td>
      <td><?php echo $row["soyad"]; ?></td>
      <td><?php echo $row["firma_adi"]; ?></td>
	  <td><?php echo $vade; ?></td>
	  <td><?php echo $row["tutar"]; ?></td>  
      <td><?php echo $row["gun"]; ?></td>
	   
      <td>
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"kug")){ ?>
	  <a href="<?php echo $url.'/kumanyaguncelle/'.$row["kum_id"]; ?>"><i class="fas fa-cog" style="margin-right : 15px; "></i></a>
	  <?php } ?>
	  <?php if(yetki_kontrol(@$_SESSION["rol"],"kus")){ ?>	  
	  <a href="javascript:void(0)" onclick="kumanyasilbuton(<?php echo $row["kum_id"]; ?>)" id="kumanyasilbuton"> <i class="fas fa-trash-alt"></i></a>
	  <?php } ?>
	  </td>
	</tr>
	
	<?php
	} }else{
		echo 'kayıt yok';
	}
	?>
  </tbody>
  <tfoot style="width:100%;">
       <tr >
	   <td  colspan="2"><?php echo 'Toplam <label id="kumanyasayac">'.$count.'</label> kayıt'; ?></td>
	   <td colspan="3">
<?php echo '<label id="totalsayac2">'.$total.'</label>'; ?>

	   </td>
	    <td >Toplam:</td>
	   <td><?php echo '<label id="totalsayac">'.$total.'</label>'; ?></td>
	   <td colspan="2">


	   </td>
	   </tr>
    </tfoot>
</table>
<a href="javascript:void(0)" onclick="donemsilinsinmi(<?php echo $fir_id.",".$ay.",".$yil; ?>)" class="btn btn-warning"></a>
<?php
}}
?>