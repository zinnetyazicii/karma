	//$(document).ready(function() {
	var url= "http://" + location.hostname;
	var path= window.location.pathname;
	if(path=='/adddevice'){
		RunAfterjQ();
	}
	/*$(document).on('keypress',function(e) {
		if(e.which == 13) {
			alert('You pressed enter!');
		}
	});*/
	
	function deneme(){
		var x=$('#personeltable tr');
		var rows = (x.prevAll().length)+1 ;
		var pointcount = (rows/10) ;
		var pc = pointcount.toFixed(0);
		alert(pc);
		       
 

	}
	function modal(durum,metin){
		$('.mymodal').show();
		$('.mymodelhead').html(durum);
		$('.mymodelcontent').html(metin);
		$('#modalevet').hide();
		$('#modalsil').hide();
		
		
	};
	$('#modalbutton').click(function(){
		$('.mymodal').hide();
	});
	

	
	function linkpersonel(x){
		var purl = url + "/view/" + x + ".php";
		
		$.ajax({
				
			url: purl,
			success:function(result){
				$("#maincont").html(result);
			},
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
		});
	};
	
	//filter
	/*$("#personeller").on("keyup", function() {
		var input, filter, table, tr, td, i, txtValue;
		  input = $(this).val();
		  filter = input.value.toUpperCase();
		  table = document.getElementById("personeltable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  txtValue = td.textContent || td.innerText;
			  if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}
		  }
	});*/
	$("#personeller").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		var cntr=0;
		var total=0;
		$("#personeltable tbody tr").filter(function() {
			if($(this).text().toLowerCase().indexOf(value) > -1){
				total=total+parseFloat($(this).find('td:eq(6)').text());
				cntr++;
			}
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		  $('#totalsayac').text(total);
		  $('#kumanyasayac').text(cntr);
		  });
		});
		
	function kdsfiltre(){
		var fir_id=$('select[name=persfirmasec]').val();
		var donem= $('#donem').val();
		$.ajax({
			type: "POST",
			data: {'fir_id' : fir_id,'donem' : donem},
			url: url+'/act/kumanyadonemsil.php',
			success:function(result){
				$("#filtrelenenkumanya").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		
	}	
	function donemsilinsinmi(id,ay,yil){
		modal('UYARI','Seçilen döneme ait tüm kumanyalar silinsin mi?');
		$('#modalsil').show();
		$('#modalsil').click(function(){
			$.ajax({
			type: "POST",
			data: {'fir_id' : id,'yil' : yil,'ay' : ay},
			url: url+'/act/kds.php',
			success:function(result){
				$("#filtrelenenkumanya").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		});
		
		
		
	}
	$(document).on("scroll", function(){
		if
      ($(document).scrollTop() > 86){
		  $("#banner").addClass("shrink");
		}
		else
		{
			$("#banner").removeClass("shrink");
		}
	});
		function topFunction() {
		  $('html, body').animate({scrollTop:0}, 'slow');
		}
		
	


		//Personelekle - personel guncelle
		/*$("#perskaydetbuton").click(function(){
			var name= document.getElementsByName("ad")[0].value;
			var surname= document.getElementsByName("soyadi")[0].value;
			var fathername= document.getElementsByName("babaadi")[0].value;
			var tc= document.getElementsByName("tc")[0].value;
			if(tc.length<11)
			{
				$('.mymodal').show();
				$('.mymodelhead').html('Hata!');
				$('.mymodelcontent').html('TC alanı 11 haneli olmalı.');
				$('#modalupdates').hide();
			}else if(isNaN(tc)){
				$('.mymodal').show();
				$('.mymodelhead').html('Hata!');
				$('.mymodelcontent').html('TC alanı harf veya karakter içeremez.');
				$('#modalupdates').hide();
			}else if(name.trim()=='' || surname.trim()=='' || fathername.trim()==''){
				$('.mymodal').show();
				$('.mymodelhead').html('Hata!');
				$('.mymodelcontent').html('Ad, soyad ve baba adı alanları boş olamaz.');
				$('#modalupdates').hide();
			}else{
				$("#personelekleform").submit();
			} 
		});*/
		
		function perskaydetbuton(){
			var name= document.getElementsByName("ad")[0].value;
			var surname= document.getElementsByName("soyadi")[0].value;
			var fathername= document.getElementsByName("babaadi")[0].value;
			var tc= document.getElementsByName("tc")[0].value;
			if(tc.length<11)
			{
				$('.mymodal').show();
				$('.mymodelhead').html('Hata!');
				$('.mymodelcontent').html('TC alanı 11 haneli olmalı.');
				$('#modalupdates').hide();
			}else if(isNaN(tc)){
				$('.mymodal').show();
				$('.mymodelhead').html('Hata!');
				$('.mymodelcontent').html('TC alanı harf veya karakter içeremez.');
				$('#modalupdates').hide();
			}else if(name.trim()=='' || surname.trim()=='' || fathername.trim()==''){
				$('.mymodal').show();
				$('.mymodelhead').html('Hata!');
				$('.mymodelcontent').html('Ad, soyad ve baba adı alanları boş olamaz.');
				$('#modalupdates').hide();
			}else{
				$("#personelekleform").submit();
			} 
		};
		
		//Personelsil
		function perssilbuton(id){	
			$('.mymodal').show();
			$('.mymodelhead').html('Uyarı!');
			$('.mymodelcontent').html('Personel silinsinmi ?');
			$('#modalsil').show();
			$('#modalsil').html('Sil');
			$("#modalsil").click(function(){				
				$.ajax({
			type: "POST",
			data: {'data' : id},
			url: url+'/act/personelsil.php',
			success:function(result){
				$(".action").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
				
			});
			
		};
		
		//kumanyasil
		function kumanyasilbuton(id){
			$('.mymodal').show();			
			$('#modalsil').show();			
			$('.mymodelhead').html('Uyarı!');
			$('.mymodelcontent').html('Kumanya silinsinmi ?');
			var filtvalue = $('select[name=persfirmasec] option').filter(':selected').val();
			$("#modalsil").click(function(){
				
				$.ajax({
			type: "POST",
			data: {'data' : id, 'filtre' : filtvalue},	
			url: url+'/act/kumanyasil.php',
			success:function(result){
				$(".action").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
				
			});
			
		};
		
		//kullanıcı sil
		function kulsilbuton(id){
			$('.mymodal').show();
			$('.mymodelhead').html('Uyarı!');
			$('.mymodelcontent').html('Kullanıcı silinsinmi ?');
			$('#modalsil').show();
			
			$("#modalsil").click(function(){
				
				$.ajax({
			type: "POST",
			data: {'data' : id},	
			url: url+'/act/kullanicisil.php',
			success:function(result){
				$(".action").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
				
			});
			
		};
		
		
		$("#modalbutton").click(function(){
			$(".mymodal").hide();
		});
	//kullanıcı ekle
	function kullaniciekle(){
		var kul_nick= document.getElementsByName("kul_nick")[0].value;
		var kul_adi= document.getElementsByName("kul_adi")[0].value;
		var sifre1= document.getElementsByName("sifre1")[0].value;
		var sifre2= document.getElementsByName("sifre2")[0].value;
		if(kul_nick.trim()=='' || kul_adi.trim()==''){
			modal('HATA!','Kullanıcı Adı ve Adı Soyadı alanlarını boş burakma');
		}else if(sifre1.trim()=='' && sifre2.trim()==''){
			modal('HATA!','Şifre alanları boş kalamaz!');
		}else if(sifre1.trim()!=sifre2.trim()){
			modal('HATA!','Girilen şifreler birbirinden farklı.');
		}else{
			$('#kullaniciekleform').submit();
		}
			
		
	};
	
	//Şifre güncelle
	function sifreguncelle(){
		var sifre1=document.getElementsByName("sifre1")[0].value;
		var sifre2=document.getElementsByName("sifre2")[0].value;
		if(sifre1.trim()!=sifre2.trim()){
			modal('HATA','Şifreler birbiriyle eşleşmiyor');
		}else{
			$.ajax({
			type: "POST",
			data: {'data' : sifre1.trim()},	
			url: url+'/act/sifreguncelle.php',
			success:function(result){
				$(".action").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		}
	};
	//kullanıcı şifre
	$('#sifre_sifirla').click(function(){
		if($('#sifre_sifirla').is(":checked")){
			$('#sifre1,#sifre2').prop( "disabled", false );
		}else{
			$('#sifre1,#sifre2').prop( "disabled", true );
		}
	});
	//kumanya getir ->kumanyalar
	function kumanyagetirbutton(ad,soyad,baba_adi){
	
			$.ajax({
			type: "POST",
			data: {'ad' : ad, 'soyad': soyad, 'baba_adi': baba_adi},	
			url: url+'/act/tekkumanyagetir.php',
			success:function(result){	
				$("#maincont").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
			
	};
	
	//Gün fiyat otomatik
	
	$('#gunotofiyat').keyup(function(){
		var gun=$('#gunotofiyat');
		var gunint=parseInt(gun.val());
		var vade=document.getElementsByName("vade")[0].value;
		var tutarotofiyat=$('#tutarotofiyat');
		if(vade){
			var kumanya_total=document.getElementsByName("tutar")[0].value;
			var vade=document.getElementsByName("vade")[0].value;
			var vadea=vade.split("-");
			var dayofmonth=new Date(vadea[0], vadea[1], 0).getDate();
		if($.isNumeric(gun.val())){
			if(gunint<=31 && gunint>=1){
			var total=(kumanya_total*gun.val())/dayofmonth;
			tutarotofiyat.val(total.toFixed(2));
		
			}else{
				tost('Gün değeri 1 ile 31 arasında olmalıdır.');
				gun.val(dayofmonth);
				tutarotofiyat.val(kumanya_total);
			}
		}else{
			tost('Gün değeri rakam olmalıdır');
			gun.val('');
			tutarotofiyat.val('');
		}
		}else{
			tost('Önce vade seçiniz.');
			gun.val('');
		}
	});
	//tutar sayı mı?
	$('#kumanya_tutari').keyup(function(){
		var tutar=$('#kumanya_tutari');
		if(!($.isNumeric(tutar.val()))){
			tost('Tutar değeri sayı olmalıdır');
			tutar.val('');
		}	
		
	});
	//gun sayı mı?
	$('#gun').keyup(function(){
		var gun=$('#gun');
		if(!($.isNumeric(gun.val()))){
			tost('Gün değeri sayı olmalıdır');
			gun.val('');
		}	
		
	});
		
	

	//Kumanya getir
	$('#kumgetirbuton').click(function(){
		var tc=document.getElementsByName("tc")[0].value;
		$.ajax({
			type: "POST",
			data: {'tc' : tc},	
			url: url+'/act/kumanyagetir.php',
			success:function(result){
				$("#kumanyagoster").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
	});
	//Ödenmiş kumanya ara
	function ara(){
		var vade=$('#odenmisvade').val();
		var odenmisbast=$('#odenmisbast').val();
		var odenmisbitt=$('#odenmisbitt').val();
		$.ajax({
			type: "POST",
			data: {'vade' : vade, 'odenmisbast' : odenmisbast, 'odenmisbitt' : odenmisbitt },	
			url: url+'/act/odenmiskumanya.php',
			success:function(result){
				$("#odenmiskumanyagoster").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		
	};
	
	function yolla(){
		var vade=$('#odenmisvade').val();
		$.ajax({
			type: "POST",
			data: {'vade' : vade},	
			url: url+'/act/onaylanankontrol.php',
			success:function(result){
				$("#odenmiskumanyagoster").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		
	};
	
	
	//kumanya öde
	function odefunc(id){
		$('.mymodal').fadeIn('slow');
		$('#modalsil').html('Öde');
		modal("Uyarı","Kumanya Ödensinmi");
		$('#modalsil').attr('href', url+'/yazdir/'+id);
		$('#modalsil').attr('target', '_blank');
		$('#modalsil').show();
		$('#modalsil').click(function(){
		$.ajax({
			type: "POST",
			data: {'data' : id},	
			url: url+'/act/kumanyaodendi.php',
			success:function(result){
				$("#kumanyagoster").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
		});
		
		
	};
	
	//Personel Firma Seç
	
	function workonclick(){
		var optvalue = $('select[name=persfirmasec] option').filter(':selected').val();
		$('#personeller').val('');
		$.ajax({
			type: "POST",
			data: {'fir_id' : optvalue},	
			url: url+'/act/personelfiltrele.php',
			success:function(result){
				$("#filtrelenenkumanya").html(result);
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
			});
	};
	
	//Ödenmiş kumanya kontrol select all
	function odenmiskontrolselectall(){
		if($("#odenmiskontrolselectall").prop('checked') == true){
			$(".checkall").prop('checked', true);
			$("#odenmiskontrolselectall").prop('checked', false);
			$('#odenmiskontrol').html('Hiçbiri');
		}else{
			$(".checkall").prop('checked', false);
			$("#odenmiskontrolselectall").prop('checked', true);
			$('#odenmiskontrol').html('Hepsi');
		}
	};
	// Tost
	function tost(metin){		
	var toastLiveExample = document.getElementById('liveToast')
	var toast = new bootstrap.Toast(toastLiveExample)
	    toast.show();
	$('.toast-body').html(metin);
	
}
	
	
				 

 //exporte les données sélectionnées
var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

		var trBoldBlue = $("table");

	$(trBoldBlue).on("click", "tr", function (){
			$(this).toggleClass("bold-blue");
	});