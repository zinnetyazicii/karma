function AjaxGet(asd) {
	var jsdata;
	var ay=parseInt($("#cAy").val());
	var yil=parseInt($("#cYil").val());
		$.ajax({
        type: "POST",
        url: asd,
	    data:{'ay':ay,'yil':yil},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (response) {
            //console.log(response);
			jsdata=JSON.parse(response);
			console.log( jsdata );
      }
    }) .responseJSON; //.responseText
    return  jsdata;
};
function isittoday(a,b,c){
	var d = new Date();
	if(a==(d.getDate()) && b==(d.getMonth()+1) && c==d.getFullYear()){
		$("#sanodbuay").removeClass("btn-dark");
		$("#sanodbuay").addClass("btn-light");
		$("#sanodbuay").css("pointer-events","none");
	}else{
		$("#sanodbuay").css("pointer-events","auto");
		$("#sanodbuay").removeClass("btn-light");
		$("#sanodbuay").addClass("btn-dark");
	}
	createTable();
}
function action(){
	
}
$("#sanodonceki").click(function(){
	var gun=parseInt($("#cGun").val());
	var ay=parseInt($("#cAy").val());
	var yil=parseInt($("#cYil").val());
	if(ay<2){
		$("#cAy").val(12);
		$("#cYil").val(yil-1);
	}else{
		$("#cAy").val(ay-1);
	}
	isittoday($("#cGun").val(),$("#cAy").val(),$("#cYil").val());
});

$("#sanodsonraki").click(function(){
	var gun=parseInt($("#cGun").val());
	var ay=parseInt($("#cAy").val());
	var yil=parseInt($("#cYil").val());
	if(ay>11){
		$("#cAy").val(1);
		$("#cYil").val(yil+1);
	}else{
		$("#cAy").val(ay+1);
	}
	isittoday($("#cGun").val(),$("#cAy").val(),$("#cYil").val());
});

$("#sanodbuay").click(function(){
	var d = new Date();
	$("#cAy").val(d.getMonth()+1);
	$("#cYil").val(d.getFullYear());
	$("#cGun").val(d.getDate());
	isittoday($("#cGun").val(),$("#cAy").val(),$("#cYil").val());
});
function daysInMonth (month, year) {
    return new Date(year, month, 0).getDate();
}
function createTable(){
	var ay=parseInt($("#cAy").val());
	var yil=parseInt($("#cYil").val());
	var x=0;
	var i;
	dim = daysInMonth(ay,yil);
	const data = AjaxGet("http://" + location.hostname+'/calendarjson');
	//var data=AjaxGet("http://" + location.hostname+'/calendarjson');
	$('#createTable').html( '<table id="cTable"></table>' );
	//var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	//var a = new Date(ay+'/'+i+'/'+yil);
	//alert(weekday[a.getDay()]);
$('#createTable').html(data[0]["day"]);
	/*for(i=1;i<=dim;i++){
		//a=Date(ay+'/'+'1'+'/'+yil);
			if(i%7==1){
			x++;
			$('#cTable').append( '<tr id="cTableTr'+x+'">' );
			}
			$('#cTableTr' + x).append( '<td style="border:1px solid gray;text-align:right;vertical-align : top;">'+i+data[0]["id"]+'</td>' );
			if(i%7==0){
			$('#cTable').append( '</tr>' );
			}
	}
	if(dim%7!=0){
			$('#cTable').append( '</tr>' );
		}*/
	
}


createTable();