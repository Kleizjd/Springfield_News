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
        <form action="" id="form_Editnoticia" method="POST" autocomplete="off" >
            <?php foreach($sqlNoticia as $noticia){}?>
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
                                <button type="button" class="btn btn-danger" id="deletenoticia" title="Eliminar Noticia"><i class="fas fa-trash-alt"></i> </button>
                                
                            </div>
                            
                        </div>
                       
                        <div class="row pb-3">
                             <div class="col-sm-1">
                                <label for="code">Id</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="code_noticia" name = "code_noticia" value="<?=$noticia["id"];?>" readonly >
                            </div>
                            <div class="col-sm-1">
                                <label for="noticia">Noticia</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="noticia" name = "noticia" value="<?=$noticia["titulo"];?>" >
                            </div>
                           
                            <div class="col-sm-1">
                                <label for="estado">Estado</label>
                            </div>
                            <div class="col-sm-2">
                            <h4><span class="badge badge-success" id = "statnoticia" ><?=$noticia["estado"];?></span></h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <label for="description">Descripcion</label>
                            </div>
                            <div class="col-sm">
                                <textarea rows="4" cols="4" class="form-control" id="description" name="description" ><?=$noticia["descripcion"];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal BUSCAR -->
<div class="modal fade" id="modalSearchnoticia">
	<div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
		<div class="modal-content">

			<div class="text-center modal-header">
				<h3 class="w-100 modal-title">Búsqueda de noticiaos</h3>
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
    $(function Editnoticia() {
		$(document).on("submit", "#form_Editnoticia", function (event) {
			event.preventDefault();
			
			var formData = new FormData(event.target);
			formData.append("modulo", "noticiao");
			formData.append("controlador", "noticiao");
			formData.append("funcion", "editarnoticiao");
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
    $(function deletenoticia() {
        $(document).on("click", "#deletenoticia", function () {
            let status = $("#statnoticia").text();
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
                        var formData = new FormData($("#form_Editnoticia")[0]);
                        formData.append("modulo", "noticiao");
                        formData.append("controlador", "noticiao");
                        formData.append("funcion", "borrarnoticiao");
                        formData.append("Id", $("#code_noticia").val());
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
                                var menu = "noticiao";
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
