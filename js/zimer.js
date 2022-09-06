$(".filtertable").on("keyup", function() {
	
		var value = $(this).val().toLowerCase();
		var cntr=0;
		var total=0;
		var rowCount = $('#personeltable tbody tr td').length;

		$("#personeltable tbody tr ").filter(function() {
			if($(this).text().toLowerCase().indexOf(value) > -1){
				total=total+parseFloat($(this).find('td:eq(6)').text());
				cntr++;
			}
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		  $('#totalsayac').text(total);
		  $('#kumanyasayac').text(cntr);
		  });
		});