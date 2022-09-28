<?php getModal('modalNoticia'); ?>

<div class="card">
    <div class="card-header">
        <h4>Noticia</h4>
    </div>
    <div class="card-body">
        <form action="" id="frm_Noticia" method="POST" autocomplete="off" >
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
                             <!-- <div class="col-sm-1">
                                <label for="validateKey">Id</label>
                            </div> -->
                            <!-- <div class="col-sm-2">
                                <input type="text" class="form-control" id="validateKey" name="id" required '>
                                <input type="text" class="form-control" id="validateKey" name="code" required 
                                data='<?=json_encode(array("typeNit" => "producto", "table" => "product", "field" => "Code_Product"));?>'>
                            </div> -->
                            <div class="col">
                                <label for="titulo">Noticia</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="titulo" required>
                            </div>
                            <div class="col">
                                <label for="categoria">Categoria</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="categoria" id="categoria" required>
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

<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>