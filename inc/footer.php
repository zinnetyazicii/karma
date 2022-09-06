<?php
if(@$_SESSION["user"]){ ?>

 

</div> <!-- maincont-->
</div> <!-- Container-->
</div> <!-- Container-->
</div> <!-- Container-->
</div> <!-- Dashboard-->
<?php } ?>
	<div class="actionout">
		<div class="action">
		</div>
	</div>
	
	
	<div class="mymodal" style="z-index:999;">
		<div class="mymodalin">
		<div class="mymodelhead"></div><hr>
		<div class="mymodelcontent"></div><hr>
		
		<span>Ödendiği Tarih: </span><span id="odendigi_tarih"></span><br>
		<span>Tc:</span><span id="tcx"></span><br>
		<span>Ad:</span><span id="ad"></span><br>
		<span>Soyad:</span><span id="soyad"></span><br>
		<span>Kumanya Tutarı:</span><span id="kumanya_tutar"></span>
		
		<a id="modalevet" class="btn btn-warning" style="float:right; margin-left:10px;display:none;" href="javascript:void(0)">Evet</a>
		<a id="modalsil" class="btn btn-danger" style="float:right; margin-left:10px;display:none;" href="javascript:void(0)">Sil</a>
		<a id="modalbutton" class="btn btn-primary" href="javascript:void(0)" style="float:right;z-index:9999;">Kapat</a>
					
		</div>
	</div>
	
	
	


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 110">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">UYARI</strong>
      <small></small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      
    </div>
  </div>
</div>




<button onclick="topFunction()" id="toTopButton" title="Go to top"><i class="fas fa-angle-up"></i></button>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo $url; ?>/js/leftnav.js"></script>
<script src="<?php echo $url; ?>/js/print.js"></script>

</body>
</html>