
$(document).ready(function () {
    /***************************/ //CREATE PRODUCT// /**************************/
    $(function RegistrarProducto() {
		$(document).on("submit", "#frm_Product", function (event) {
			event.preventDefault();
			// alert("sd")
			var formData = new FormData(event.target);
            
			formData.append("modulo", "producto");
			formData.append("controlador", "producto");
			formData.append("funcion", "crearProducto");
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