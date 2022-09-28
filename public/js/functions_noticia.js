
$(document).ready(function () {
    /***************************/ //CREATE PRODUCT// /**************************/
    $(function RegistrarProducto() {
		$(document).on("submit", "#frm_Noticia", function (event) {
			event.preventDefault();
			// alert("sd")
			var formData = new FormData(event.target);
            
			formData.append("modulo", "noticia");
			formData.append("controlador", "noticia");
			formData.append("funcion", "crearNoticia");
			$.ajax({
				url: "../../App/lib/ajax.php",
				method: "POST",
				dataType: "json",
				data: formData,
				cache: false, 
				processData: false,
				contentType: false
			}).done((res) => {
                if (res.tipoRespuesta == true) {  swal({ title: 'Noticia Ingresado exitosamente', type: 'success' });} 
			});
		});
	});
      /*************************** END **************************/
});
function openModal()
{
    // rowTable = "";
    // document.querySelector('#idCategoria').value ="";
    // document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    // document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    // document.querySelector('#btnText').innerHTML ="Guardar";
    // document.querySelector('#titleModal').innerHTML = "Nueva Categoría";
    // document.querySelector("#formCategoria").reset();
    $('#modalFormProductos').modal('show');
}
// function removePhoto(){
//     document.querySelector('#foto').value ="";
//     document.querySelector('.delPhoto').classList.add("notBlock");
//     if(document.querySelector('#img')){
//         document.querySelector('#img').remove();
//     }
// }