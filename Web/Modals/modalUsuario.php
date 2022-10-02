<!-- 
<style>
    div.dataTables_wrapper {
        margin: 0 auto;
        width: 80%;
    }
</style> -->
<!-- Modal BUSCAR -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <!-- <div class="modal fade" id="modalSearchProduct"> -->
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
        <div class="modal-content">

            <div class="text-center modal-header">
                <h3 class="w-100 modal-title">Crear de Usuario</h3>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">
                    <i class="fa fa-window-close fa-2x text-danger"></i>
                </button>
            </div>

            <div class="card-body">
                <form method="POST" id="frm_SearchNoticia" action="" autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm col-lg">
                                <form action="" id="frm_Noticia" method="POST" autocomplete="off">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="row pb-3">

                                                    <div class="col-sm-1">


                                                    </div>

                                                    <div class="col-sm-3 offset-1">
                                                        <h4><span class="badge badge-success" id="statUsuario"></span></h4>
                                                    </div>
                                                </div>

                                                <div class="row pb-3">
                                                   
                                                    <div class="col-sm">
                                                        <label for="usuario">Usuario</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="email_usuario" value="" >
                                                    </div>
                                                    <div class="col-sm">
                                                        <label for="rol">Rol</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select name="rol" id="rol" class="form-control">
                                                            <option value="" >Seleccione...</option>
                                                            <option value="1">Administrador</option>
                                                            <option value="2">Lector</option>
                                                            <option value="3">Columnista</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <label for="nombre_completo">Nombre Completo</label>
                                                    </div>
                                                    <div class="col-sm">
                                                        <input type="text" class="form-control" id="nombre_completo"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!--  -->
<script>
   
</script>