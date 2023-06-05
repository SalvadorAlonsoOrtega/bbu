// // JavaScript Document
// var markersArray = [];
// var miFechaActual = new Date();
// var anoActual = miFechaActual.getFullYear();
// function Fecha() {
//     $(".Fecha").datepicker({
//         weekStart: 1,
//         todayBtn: "linked",
//         language: "es",
//         autoclose: true,
//     });
//     $(".Fecha").mask("99/99/9999");
// }
// function Letras() {
//     $(".Letras").keypress(function (e) {
//         if (e.which != 241 && e.which != 209 && e.which != 32 && e.which != 8 && e.which != 0 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)) {
//             console.log(e.which);
//             return false;
//         }
//     });
// }
// function Numeros() {
//     $('.Numeros').keypress(function (e) {
//         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//             return false;
//         }
//     });
// }
// function Entero() {
//     $('.Entero').keypress(function (e) {
//         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//             return false;
//         }
//     });
// }
// function Flotante(){
//     $('.Flotante').keypress(function (e){if( e.which!=8 && e.which!=0 && ((e.which<46 || e.which>57)||(e.which==47))){return false;}});
// }
// function NombreCampo(){
// 	$(".NombreCampo").keypress(function (e){ 
// 		if( e.which!=241 && e.which!=209 && e.which!=95 && e.which!=8 && e.which!=0 && (e.which<65 || e.which>90) && (e.which<97 || e.which>122) && (e.which<48 || e.which>57)){ 			
// 			return false;
// 		}
// 	});
// }

// function Load(Controlador, Metodo, Parametros, Div) {
//     if (Parametros == "undefined") {
//         Parametros = "";
//     }
//     $.ajax({
//         url: SiteUrl + "/" + Controlador + "/" + Metodo,
//         dataType: 'html',
//         data: Parametros
//     })
//     .error(function (jqXHR, textStatus, errorThrown) {
//         $(document).CPreload();
//         alert(errorThrown);
//     })
//     .done(function (html) {
//         $(Div).html(html);
//     });
// }
// function LoadModal(Controlador, Metodo, Parametros, Div) {
//     if (Parametros == "undefined") {
//         Parametros = "";
//     }
//     $.ajax({
//         url: SiteUrl + "/" + Controlador + "/" + Metodo,
//         dataType: 'html',
//         data: Parametros
//     })
//     .error(function (jqXHR, textStatus, errorThrown) {
//         $(document).CPreload();
//         alert(errorThrown);
//     })
//     .done(function (html) {
//         $(Div).html(html);
//         $(Div).modal({keyboard: false, backdrop: 'static'});
//     });
// }
// function Ajax(Type,Controlador, Metodo, Parametros,CallBack){
//     if(Parametros=="undefined"){ Parametros="";	}    
//     $.ajax({
//        url: SiteUrl+"/"+Controlador+"/"+Metodo,       
//        dataType: Type,
//        data: Parametros,       
//     })
//     .error(function (jqXHR, textStatus, errorThrown){ alert(errorThrown); })
//     .done(function (data) {        
//         if(CallBack) {
//             var Call=$.Callbacks();
//             Call.add(CallBack);
//             Call.fire(data);
//         }
//     });
//     return;
// }
// function AjaxSimple(Type,Controlador,Metodo,Parametros,CallBack){
//     if(Parametros=="undefined"){ Parametros="";	}
//     $.ajax({
//        url: SiteUrl+"/"+Controlador+"/"+Metodo,
//        dataType: Type,
//        data: Parametros,
//        beforeSend: function(){}       
//     })
//     .error(function (jqXHR, textStatus, errorThrown){ alert(errorThrown); })
//     .done(function (data) {        
//         if(CallBack) {
//             var Call=$.Callbacks();
//             Call.add(CallBack);
//             Call.fire(data);
//         }
//     });
//     return;
// }
// function AjaxLoad(Type,Controlador,Metodo,Parametros,Gif,CallBack){
// 	if(Parametros=="undefined"){ Parametros="";	}
//     $.ajax({
//        url: SiteUrl+"/"+Controlador+"/"+Metodo,
//        dataType: Type,
//        data: Parametros,
//        beforeSend: function(){
// 		   $(Gif).show();
// 	   }       
//     })
//     .error(function (jqXHR, textStatus, errorThrown){ $(Gif).hide(); alert(errorThrown); })
//     .done(function (data) {        
// 		$(Gif).hide();
//         if(CallBack) {
//             var Call=$.Callbacks();
//             Call.add(CallBack);
//             Call.fire(data);
//         }
//     });
//     return;
// }

// function CierraModal(Div){
// 	$(Div).html('');
// 	$(Div).modal('hide');
// }
// function startTime() {
//     var today = new Date();
//     var h = today.getHours();
//     var m = today.getMinutes();
//     var s = today.getSeconds();
//     m = checkTime(m);
//     s = checkTime(s);       
//     $("#Time").html(h + ":" + m + ":" + s);     
//     var t = setTimeout(startTime, 500);
// }
// function checkTime(i) {
//     if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
//     return i;
// }           
// function curpValida(curp){
//     var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
//         validado = curp.match(re);
    
//     if (!validado)  //Coincide con el formato general?
//         return false;
    
//     //Validar que coincida el dígito verificador
//     function digitoVerificador(curp17) {
//         //Fuente https://consultas.curp.gob.mx/CurpSP/
//         var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
//             lngSuma      = 0.0,
//             lngDigito    = 0.0;
//         for(var i=0; i<17; i++)
//             lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
//         lngDigito = 10 - lngSuma % 10;
//         if (lngDigito == 10) return 0;
//         return lngDigito;
//     }
  
//     if (validado[2] != digitoVerificador(validado[1])) 
//         return false;
        
//     return true; //Validado
// }
// /********************************************************************************/
// function uniqid(prefix, more_entropy) {
//   if (typeof prefix === 'undefined') {
//     prefix = '';
//   }

//   var retId;
//   var formatSeed = function(seed, reqWidth) {
//     seed = parseInt(seed, 10)
//       .toString(16); // to hex str
//     if (reqWidth < seed.length) { // so long we split
//       return seed.slice(seed.length - reqWidth);
//     }
//     if (reqWidth > seed.length) { // so short we pad
//       return Array(1 + (reqWidth - seed.length))
//         .join('0') + seed;
//     }
//     return seed;
//   };

//   // BEGIN REDUNDANT
//   if (!this.php_js) {
//     this.php_js = {};
//   }
//   // END REDUNDANT
//   if (!this.php_js.uniqidSeed) { // init seed with big random int
//     this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
//   }
//   this.php_js.uniqidSeed++;

//   retId = prefix; // start with prefix, add current milliseconds hex string
//   retId += formatSeed(parseInt(new Date()
//     .getTime() / 1000, 10), 8);
//   retId += formatSeed(this.php_js.uniqidSeed, 5); // add seed hex string
//   if (more_entropy) {
//     // for more entropy we add a float lower to 10
//     retId += (Math.random() * 10)
//       .toFixed(8)
//       .toString();
//   }

//   return retId;
// }
// var Base64 = {
// // private property
//     _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
// // public method for encoding
//     encode: function (input) {
//         var output = "";
//         var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
//         var i = 0;

//         input = Base64._utf8_encode(input);

//         while (i < input.length) {

//             chr1 = input.charCodeAt(i++);
//             chr2 = input.charCodeAt(i++);
//             chr3 = input.charCodeAt(i++);

//             enc1 = chr1 >> 2;
//             enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
//             enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
//             enc4 = chr3 & 63;

//             if (isNaN(chr2)) {
//                 enc3 = enc4 = 64;
//             } else if (isNaN(chr3)) {
//                 enc4 = 64;
//             }

//             output = output +
//                     this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
//                     this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

//         }

//         return output;
//     },
// // public method for decoding
//     decode: function (input) {
//         var output = "";
//         var chr1, chr2, chr3;
//         var enc1, enc2, enc3, enc4;
//         var i = 0;

//         input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

//         while (i < input.length) {

//             enc1 = this._keyStr.indexOf(input.charAt(i++));
//             enc2 = this._keyStr.indexOf(input.charAt(i++));
//             enc3 = this._keyStr.indexOf(input.charAt(i++));
//             enc4 = this._keyStr.indexOf(input.charAt(i++));

//             chr1 = (enc1 << 2) | (enc2 >> 4);
//             chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
//             chr3 = ((enc3 & 3) << 6) | enc4;

//             output = output + String.fromCharCode(chr1);

//             if (enc3 != 64) {
//                 output = output + String.fromCharCode(chr2);
//             }
//             if (enc4 != 64) {
//                 output = output + String.fromCharCode(chr3);
//             }

//         }

//         output = Base64._utf8_decode(output);

//         return output;

//     },
    
// // private method for UTF-8 encoding
//     _utf8_encode: function (string) {
//         string = string.replace(/\r\n/g, "\n");
//         var utftext = "";

//         for (var n = 0; n < string.length; n++) {

//             var c = string.charCodeAt(n);

//             if (c < 128) {
//                 utftext += String.fromCharCode(c);
//             } else if ((c > 127) && (c < 2048)) {
//                 utftext += String.fromCharCode((c >> 6) | 192);
//                 utftext += String.fromCharCode((c & 63) | 128);
//             } else {
//                 utftext += String.fromCharCode((c >> 12) | 224);
//                 utftext += String.fromCharCode(((c >> 6) & 63) | 128);
//                 utftext += String.fromCharCode((c & 63) | 128);
//             }

//         }

//         return utftext;
//     },
// // private method for UTF-8 decoding
//     _utf8_decode: function (utftext) {
//         var string = "";
//         var i = 0;
//         var c = c1 = c2 = 0;

//         while (i < utftext.length) {

//             c = utftext.charCodeAt(i);

//             if (c < 128) {
//                 string += String.fromCharCode(c);
//                 i++;
//             } else if ((c > 191) && (c < 224)) {
//                 c2 = utftext.charCodeAt(i + 1);
//                 string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
//                 i += 2;
//             } else {
//                 c2 = utftext.charCodeAt(i + 1);
//                 c3 = utftext.charCodeAt(i + 2);
//                 string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
//                 i += 3;
//             }

//         }

//         return string;
//     }

// }