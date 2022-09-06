$("#printable").find('.print').on('click', function() {
 
$("#printable").print({
 
// Genel ayarlar
globalStyles : false, 
 
// Geçerli URL bilgisini de yazdır
mediaPrint : false, 
 
//Font
stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata", 
 
//Gizli iframe yazdır
iframe : false, 
 
// Bu alanı yazdırmaz
noPrintSelector : ".avoid-this",
 
// Üste ekleme yapar
//append : "Fatih Soysal<br/>", 
 
// Alta ekleme yapar
//prepend : "<br/>fatihsoysal.com",
 
// Manuel olarak form verilerini yükler
manuallyCopyFormValues: true,
 
// Yazdırma sonrası kodu yeniden yapılandırır.
deferred: $.Deferred(),
 
// timeout
timeout: 250,
 
// Başlık
title: null,
 
// document tip
doctype: '<!doctype html>'
 
});
});