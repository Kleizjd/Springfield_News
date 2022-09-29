// INCLUIR SCRIPTS DE LAS VISTAS
// $.getScript("../public/js/OpenViews.js");
// INCLUIR SCRIPTS DE LAS VISTAS
$.getScript("routes/route.js");


// <<<<<<<<<<<<<<<<<<<<- GENERAL FUNCTIONS AND HELPERS ->>>>>>>>>>>>>>>>>>>>

// LLAMAR LA VISTA QUE SE CARGARA CON LOS DATOS
function llamarVista(modulo, controlador, funcion, parametros, blank){
	// alert(" "+modulo+" / "+controlador+" / "+funcion);
	// <form id="Datos${funcion}" action="./" method="post" ${blank ? `target="_blank"` : null}>//cambio para que no habra otra pestaña

	$("#cargarVista").append(`
		<form id="Datos${funcion}" action="./" method="post" >
			<input type="hidden" name="ruta" value="">
			<input type="hidden" name="modulo" value=${modulo}>
			<input type="hidden" name="controlador" value=${controlador}>
			<input type="hidden" name="funcion" value=${funcion}>
			${parametros ? Object.keys(parametros).map(llave => `<input type="hidden" name="${llave}" value="${parametros[llave]}">\n`).join("") : null}
		</form>
	`);
	// alert(`#Datos${funcion}`);

	$(`#Datos${funcion}`).submit();
	$(`#Datos${funcion}`).remove();
}

// TOGGLE O PALANCA PARA COLOCAR//QUITAR UN ATRIBUTO
$.fn.toggleAttr = function (attr, attr1, attr2) {
	return this.each(function () {
		var self = $(this);
		if (self.attr(attr) == attr1)
			self.attr(attr, attr2);
		else
			self.attr(attr, attr1);
	});
}

// VÁLIDA SI EL VALOR ES DE TIPO JSON
function isJSON(something) {
	var IS_JSON = true;
	try {
		var json = $.parseJSON(something);
	} catch (err) {
		IS_JSON = false;
	}
	return IS_JSON;
}

// AUMENTA LA PANTALLA COMPLETAMENTE PARA UN ELEMENTO
function openFullscreen(elem) {
	if (elem.requestFullscreen) {
		elem.requestFullscreen();
	} else if (elem.mozRequestFullScreen) {
		/* Firefox */
		elem.mozRequestFullScreen();
	} else if (elem.webkitRequestFullscreen) {
		/* Chrome, Safari and Opera */
		elem.webkitRequestFullscreen();
	} else if (elem.msRequestFullscreen) {
		/* IE/Edge */
		elem.msRequestFullscreen();
	}
}

// OBTENER LOS MESES ENTRE LAS DOS FECHAS SELECCIONADAS, NINGÚNA DEBE ESTAR VACÍA
function obtenerMesesEntreDosFechas(fecha_desde, fecha_hasta) {
    var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    var resultado = [];
    var fechaDesde = fecha_desde.split("-");
    var fechaHasta = fecha_hasta.split("-");
    var mesDesde = !isNaN(parseInt(fechaDesde[1] - 1)) ? parseInt(fechaDesde[1] - 1) : null;
    var mesHasta = !isNaN(parseInt(fechaHasta[1] - 1)) ? parseInt(fechaHasta[1] - 1) : null;

    if (mesDesde != null && mesHasta != null) {
        for (let index = mesDesde; index <= mesHasta; index++) {
            resultado[index] = meses[index];
        }
    }

    return resultado;
}

// ENCRIPTAR Y DECRIPTAR DATOS
function encriptar(dato){
	let encrypted = CryptoJS.AES.encrypt(JSON.stringify(dato), "", {format: CryptoJSAesJson}).toString();
	return encrypted;
}

function decriptar(dato){
	let decrypted = JSON.parse(CryptoJS.AES.decrypt(dato, "", {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));
	return decrypted;
}

// VALIDAR SI UN OBJETO ESTA VACIO
function isEmpty(obj) {
	for(var key in obj) {
		if(obj.hasOwnProperty(key))
			return false;
	}
	return true;
}

// OBTENER PARÁMETRO DE LA URL
function getQueryVariable(variable) {
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0; i < vars.length; i++) {
		var pair = vars[i].split("=");
		if(pair[0] == variable) {
			return pair[1];
		}
	}
	return false;
 }

// // EVITAR QUE SE ENVIE EL FORMULARIO CON ENTER
$("form").keypress(function (e) {
	if (e.which == 13) {
		return false;
	}
});

// SCRIPT SELECT 2
// $(".select2").select2({
// 	language: "es",
// 	width: "100%",
// 	theme: "bootstrap"
// });

// <---------- SCRIPT CLEAVE JS ---------->

// FORMATEAR NÚMEROS
$(".format").each(function () {
	new Cleave(this, {
		numeral: true,
		numeralThousandsGroupStyle: "thousand"
	});
});
$(".format").on({
	"input": function (event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	},
	"keyup": function (event) {
		new Cleave(event.target, {
			numeral: true,
			numeralThousandsGroupStyle: "thousand"
		});
	}
});

// SOLO NÚMEROS
$(".number").on({
	"input": function (event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	}
});

// FORMATO DE HORA HH:MM
$(".input-time").each(function () {
	new Cleave(this, {
		time: true,
		timePattern: ["h", "m"]
	});
});

// SCRIPT PARA CONVERTIR CHECKBOX A RADIO
$(".checkboxRadio").on("change", function() {
	if (!$(this).is(":checked")) {
		$(this).prop("checked", true);
	}
   $('input[name="' + this.name + '"]').not(this).prop("checked", false);
});

// SCRIPT PARA SELECCIONAR UNA SOLA OPCIÓN DE VARIOS INPUTS CHECKBOX CON DIFERENTES NAME
$(".marcarSoloUnCheckbox").each(function () {
   var _this = this;
   $(this).find("input[type=checkbox]").change(function (){
	   $(_this).find("input[type=checkbox]:checked").not(this).prop("checked", false);
   });
});

// SCRIPT PARA SELECCIONAR UNA SOLA OPCIÓN DE VARIOS INPUTS RADIOS CON DIFERENTES NAME
$(".marcarSoloUnRadio").each(function () {
   var _this = this;
   $(this).find("input[type=radio]").change(function (){
	   $(_this).find("input[type=radio]:checked").not(this).prop("checked", false);
   });
});
///=============================[VALIDAR LLAVE PRIMARIA]=============================///
// $(function validateKey(){
// 	$(document).on("keyup", "#validateKey", function () {
// 		let data = JSON.parse($(this).attr("data"));
// 		// alert("entra");
// 		if($("#validateKey").val()!=""){
// 			$.ajax({
// 				url: "../../App/lib/ajax.php",
// 				method: "post",
// 				dataType: "json",
// 				data: {
// 					modulo: "Utilities",
// 					controlador: "Utilities",
// 					funcion: "validateKey",
// 					nit: $(this).val(),
// 					table: data.table,
// 					field: data.field,
// 				}
// 			}).done((res) => {
// 				if (res === true) {
					
// 					$(this)[0].setCustomValidity(`Ya existe este codigo de ${data.typeNit}`);
					
// 				} else {
// 					$(this)[0].setCustomValidity("");
// 				}
// 			});
// 		}
// 	});
// });


