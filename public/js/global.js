// INCLUIR SCRIPTS DE LAS VISTAS
// $.getScript("../public/js/OpenViews.js");
// INCLUIR SCRIPTS DE LAS VISTAS
$.getScript("../../routes/route.js");


// <<<<<<<<<<<<<<<<<<<<- GENERAL FUNCTIONS AND HELPERS ->>>>>>>>>>>>>>>>>>>>

// LLAMAR LA VISTA QUE SE CARGARA CON LOS DATOS
function llamarVista(modulo, controlador, funcion, parametros, blank){
	// alert(" "+modulo+" / "+controlador+" / "+funcion);
	// <form id="Datos${funcion}" action="./" method="post" ${blank ? `target="_blank"` : null}>//cambio para que no habra otra pestaña

	$("#cargarVista").append(`
		<form id="Datos${funcion}" action="./" method="post" >
			<input type="hidden" name="ruta" value="../../">
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

// ENCRIPTAR Y DECRIPTAR DATOSs
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
//boton ver o ocultar
$(document).on("click", ".showPassword", function () {
	let inputpassword = $(this).parent().find("input");
	if ($(inputpassword).val() != "") {
		if ($(inputpassword).prop("type") == "password") {
			$(inputpassword).prop("type", "text");
			$(this).html('<i class="fas fa-eye-slash"></i>');
		} else if ($(inputpassword).prop("type") == "text") {
			$(inputpassword).prop("type", "password");
			$(this).html('<i class="fas fa-eye"></i>');
		}
	}
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


//subir foto de perfil
$(document).on("change", ".subirArchivo", function (e) {

	// // <---- OBTENER EL NOMBRE DEL ARCHIVO ---->
	let archivo = e.target.files[0];
	let extensionArchivo = archivo.name.toLowerCase().substring(archivo.name.toLowerCase().lastIndexOf("."));
	let archivoSinDistintivo = $(this).parent().parent().find(".nombreArchivo").text().replace(/\-[^-]+$/g,"") + extensionArchivo;
	// <---- PREVISUALIZAR ARCHIVO ---->

	// Creamos el objeto de la clase FileReader
	let reader = new FileReader();
	// Leemos el archivo subido y se lo pasamos a nuestro fileReader
	reader.readAsDataURL(archivo);
	// Se válida si el archivo a subir no es igual al archivo subido
	if (archivo.name.toLowerCase() != archivoSinDistintivo.toLowerCase()) {
		// Le decimos que cuando este listo ejecute el código interno
		reader.onload = () => {
			// Subir el archivo automáticamente cuando se esta en edición
			if ($(this).attr("data-file-upload")) {

				$(this).parent().find(".ContenedorPrevisualizarArchivo").html("");

				let dataFile = decriptar($(this).attr("data-file-upload")).split("|"),
					tabla = dataFile[0],
					campo = $(this).prop("name"),
					valores = dataFile[1],
					ruta = dataFile[2];
			
					

				var formData = new FormData();
				formData.append("modulo", "utilidades");
				formData.append("controlador", "utilidades");
				formData.append("funcion", "uploadFile");
				formData.append("Archivo", archivo);
				formData.append("Tabla", tabla);
				formData.append("Campo", campo);
				formData.append("Valores", valores);
				formData.append("Ruta", ruta);

				$.ajax({
					url: "../../app/lib/ajax.php",
					method: "post",
					data: formData,
					dataType: "json",
					processData: false,
					contentType: false
				}).done((res) => {
					if (res.typeAnswer == true) {
						let archivoSinExtension = res.archivo.substring(0, res.archivo.lastIndexOf("."));

						$(this).parent().parent().find(".nombreArchivo").text("Cargando..");
						$(this).parent().parent().find("label").find("img").prop({
							src: "../../public/img/gif/loader.gif",
							alt: "Cargando...",
							title: "Cargando..."
						});
						// $("#img_profile").attr("src", "../../views/perfil/Files/" + res.address);

						$("#img_profile_header").parent().parent().find("#image_user").find("img").prop({
							src: res.ruta,
							alt: archivoSinExtension,
							title: archivoSinExtension
						});
						$("#img_profile_herence_carga").parent().parent().find("#image_user_list").find("img").prop({
							src: res.ruta,
							alt: archivoSinExtension,
							title: archivoSinExtension
						});
						setTimeout(() => {
							$(this).parent().parent().find(".nombreArchivo").text(res.archivo);
							if ($(this).parent().parent().find(".borrarArchivo").length == 1) {
								let dataFileDelete = decriptar($(this).parent().parent().find(".borrarArchivo").attr("data-file-delete")).split("|");
								dataFileDelete = encriptar(`${res.archivo}|${dataFileDelete[1]}|${dataFileDelete[2]}|${dataFileDelete[3]}|${dataFileDelete[4]}`);
								$(this).parent().parent().find(".borrarArchivo").attr("data-file-delete", dataFileDelete);
							}
							$(this).parent().parent().find("label").find("img").prop({
								src: res.ruta,
								alt: archivoSinExtension,
								title: archivoSinExtension
							});
							

							// $(this).parent().find(".ContenedorPrevisualizarArchivo").html(
							// 	`<i class="text-primary fa fa-eye fa-2x previsualizarArchivo" style="cursor: pointer;" data-file=${encriptar(archivo.name + "|" + reader.result)} title="Ver archivo"></i>`
							// );
						}, 2000);

					}
				});
			} else {
				// Previsualizar nombre y archivo cuando se esta en inserción
				$(this).parent().parent().find(".nombreArchivo").text(archivo.name);
				$(this).parent().parent().find(".ContenedorPrevisualizarArchivo").html(
					`<i class="text-primary fa fa-eye fa-2x previsualizarArchivo" style="cursor: pointer;" data-file='${encriptar(archivo.name + "|" + reader.result)}' title="Ver archivo"></i>`
				);
			}
		};
	}
});
//subir foto de Producto

if(document.querySelector("#foto")){
	let foto = document.querySelector("#foto");
	foto.onchange = function(e) {
		let uploadFoto = document.querySelector("#foto").value;
		let fileimg = document.querySelector("#foto").files;
		let nav = window.URL || window.webkitURL;
		let contactAlert = document.querySelector('#form_alert');
		if(uploadFoto !=''){
			let type = fileimg[0].type;
			let name = fileimg[0].name;
			if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
				contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
				if(document.querySelector('#img')){
					document.querySelector('#img').remove();
				}
				document.querySelector('.delPhoto').classList.add("notBlock");
				foto.value="";
				return false;
			}else{  
					contactAlert.innerHTML='';
					if(document.querySelector('#img')){
						document.querySelector('#img').remove();
					}
					document.querySelector('.delPhoto').classList.remove("notBlock");
					let objeto_url = nav.createObjectURL(this.files[0]);
					document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
				}
		}else{
			alert("No selecciono foto");
			if(document.querySelector('#img')){
				document.querySelector('#img').remove();
			}
		}
	}
}
if(document.querySelector(".delPhoto")){
	let delPhoto = document.querySelector(".delPhoto");
	delPhoto.onclick = function(e) {
		document.querySelector("#foto_remove").value= 1;
		removePhoto();
	}
}
function removePhoto(){
    document.querySelector('#foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if(document.querySelector('#img')){
        document.querySelector('#img').remove();
    }
}
