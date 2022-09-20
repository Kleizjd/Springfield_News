<?php getModal('modalNoticia'); ?>

<div class="card">
    <div class="card-header">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Editar Noticia</h4>
                
            </div>
            
            <div class="col-md-7 text-right">
                <div class="d-flex justify-content-end">
                    
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item" id="verNoticia">Noticia</li>
                        <li class="breadcrumb-item active">Editar Noticia</li>
                    </ol>
            
                </div>
            </div>
            </div>
    </div>
    <div class="card-body">
        <form action="" id="form_EditProduct" method="POST" autocomplete="off" >
            <?php foreach($sqlProduct as $product){}?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="row pb-3">
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary" title="Modificar Noticia"><i class="fa fa-save"></i> </button>
                                
                            </div>
                            <div class="col-sm-1">
                            <button  type="button" class="btn btn-primary" data-toggle="modal"  title="Buscar" data-target="#modalNoticia"><i class="fa fa-search"></i></button>
                                
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-danger" id="deleteProduct" title="Eliminar Noticia"><i class="fas fa-trash-alt"></i> </button>
                                
                            </div>
                            <div class="col-sm-3 offset-1">
								<h4><span class="badge badge-success" id = "statProduct" ><?=$product["estado"];?></span></h4>
                            </div>
                            
                        </div>
                       
                        <div class="row pb-3">
                             <div class="col-sm-1">
                                <label for="code">Codigo</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="code_product" name = "code_product" value="<?=$product["codigo"];?>" readonly >
                            </div>
                            <div class="col-sm-1">
                                <label for="product">Noticia</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="product" name = "product" value="<?=$product["producto"];?>" >
                            </div>
                            <div class="col-sm-1">
                                <label for="price">Valor Unitario</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="price" value="<?=$product["precio"];?>">
                            </div>
                            <div class="col-sm-1">
                                <label for="amount">Cantidad</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="amount" name = "amount" value="<?=$product["cantidad"];?>" >
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <label for="description">Descripcion</label>
                            </div>
                            <div class="col-sm">
                                <textarea rows="4" cols="4" class="form-control" id="description" name="description" ><?=$product["descripcion"];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal BUSCAR -->
<div class="modal fade" id="modalSearchProduct">
	<div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
		<div class="modal-content">

			<div class="text-center modal-header">
				<h3 class="w-100 modal-title">Búsqueda de productos</h3>
				<button type="button" class="close" data-dismiss="modal" title="Cerrar">
					<i class="fa fa-window-close fa-2x text-danger"></i>
				</button>
			</div>

			<div class="modal-body">

			</div>

		</div>
	</div>
</div>
<!--  -->
<script>
$(document).ready( function(){
    $(function EditProduct() {
		$(document).on("submit", "#form_EditProduct", function (event) {
			event.preventDefault();
			
			var formData = new FormData(event.target);
			formData.append("modulo", "producto");
			formData.append("controlador", "producto");
			formData.append("funcion", "editarProducto");
			$.ajax({
				url: "../../app/lib/ajax.php",
				method: "post",
				dataType: "json",
				data: formData,
				cache: false, 
				processData: false,
				contentType: false
			}).done((res) => {
                // alertify.notify(res.mensaje, res.tipoRespuesta, 4);
                swal({ title: 'Noticia modificado exitosamente', type: 'success', });
			});
		});
    });
    $(function deleteProduct() {
        $(document).on("click", "#deleteProduct", function () {
            let status = $("#statProduct").text();
            // alert(status);
            
            // if(status = "Existente"){
                
                swal({
                    type: "warning",
                    title: "Esta seguro que desea eliminar el registro?",
                    showCancelButton: true,
                    confirmButtonColor: "#337ab7",
                    confirmButtonText: "Sí",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "No",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then((result) => {
                    if (result.value) {
                        var formData = new FormData($("#form_EditProduct")[0]);
                        formData.append("modulo", "producto");
                        formData.append("controlador", "producto");
                        formData.append("funcion", "borrarProducto");
                        formData.append("codigo", $("#code_product").val());
                        $.ajax({
                            url: "../../App/lib/ajax.php",
                            method: "POST",
                            dataType: "json",
                            data: formData,
                            cache: false, 
                            processData: false,
                            contentType: false
                        }).done((res) => {
                            if (res.tipoRespuesta == true) {
                                // alertify.notify(res.mensaje, res.tipoRespuesta, 4);
                                swal({ title: 'Noticia Eliminada exitosamente', type: 'success', });
                                var menu = "producto";
                                llamarVista(menu, menu, menu);;
                            } 
                        });
                    }
                });
                 
            // }
        });
    });
    
});

</script>
