<?php
if(!isset($_SESSION)){
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/inc/cfg.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');
}


if(yetki_kontrol(@$_SESSION["rol"],"admin")){
$sql="SELECT * FROM kullanici where kullanici.aktif=1 order by kul_nick asc" ;
$query = $db->query($sql, PDO::FETCH_ASSOC);
if ( $query->rowCount() ){

?>
<span>Filtrele </span><input type="text" id="personeller" autocomplete="off">
<table class="table table-hover table-light" id="personeltable">
  <thead style="background-color:#fed136;">
    <tr>
      <th scope="col"><label id="tc"></label><br><a href="javascript:void(0)">KULLANICI NİCK</a></th>
      <th scope="col"><label id="ad"></label><br><a href="javascript:void(0)">KULLANICI ADI</a></th>
	  <th scope="col"><label id="soyad"></label><br><a href="javascript:void(0)">YETKİ</a></th>
	  <th scope="col"><a href="javascript:void(0)">İŞLEM</a></th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  foreach( $query as $row ){
  ?>
    <tr>
      <td><?php echo $row["kul_nick"]; ?></td>
	  <td><?php echo $row["kul_adi"]; ?></td>
      <td><?php echo $row["rol"]; ?></td>
     
	   
      <td>
	  <a href="<?php echo $url.'/kullaniciguncelle/'.$row["kul_id"]; ?>"><i class="fas fa-cog" style="margin-right : 15px; "></i></a>  
	  <a href="javascript:void(0)" onclick="kulsilbuton(<?php echo $row["kul_id"]; ?>)" id="kulsilbuton"> <i class="fas fa-trash-alt"></i></a>
	  </td>
	  
	</tr>
	<?php
	} }
	?>
  </tbody>
</table>
<script src="<?php echo $url; ?>/js/merih.js"></script>
<?php
}
?>