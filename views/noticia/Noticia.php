<?php getModal('modalNoticia'); ?>

<div class="card">
    <div class="card-header">
        <h4>Noticia</h4>
    </div>
    <div class="card-body">
        <form action="" id="frm_Product" method="POST" autocomplete="off" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="row pb-3">
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary" title="Crear Noticia" ><i class="fa fa-save"></i> </button>
                                
                            </div>
                            <div class="col-sm-1">
                                 <button  type="button" class="btn btn-primary" data-toggle="modal"  title="Buscar" data-target="#modalNoticia"><i class="fa fa-search"></i></button>

                                <!--  -->
                            </div>
                            <div class="col-sm-1">
                                <button type="reset" class="btn btn-primary" id="reset" title="Limpiar"><i class="fa fa-file"></i> </button> 
                            </div>
                        </div>
                       
                        <div class="row pb-3">
                             <div class="col-sm-1">
                                <label for="validateKey">Codigo</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="validateKey" name="codigo" required '>
                                <!-- <input type="text" class="form-control" id="validateKey" name="code" required 
                                data='<?=json_encode(array("typeNit" => "producto", "table" => "product", "field" => "Code_Product"));?>'> -->
                            </div>
                            <div class="col-sm-1">
                                <label for="producto">Noticia</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="producto" required>
                            </div>
                            <div class="col-sm-1">
                                <label for="valor">Valor Unitario</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="valor" required>
                            </div>
                            <div class="col-sm-1">
                                <label for="cantidad">Cantidad</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="cantidad" required >
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <label for="descripcion">Descripcion</label>
                            </div>
                            <div class="col-sm">
                                <textarea rows="4" cols="4" class="form-control" name="descripcion" id="descripcion"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

