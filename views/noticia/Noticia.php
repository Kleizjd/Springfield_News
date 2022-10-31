<?php getModal('modalNoticia'); ?>
<div class="card">
  <div class="card-header headerRegister">
    <h5 class="card-title" id="titleModal">Nueva Noticia</h5>
  </div>
  <div class="card-body">
    <form id="frm_Noticia" name="frm_Noticia" class="form-horizontal">
      <input type="hidden" id="idNoticia" name="idNoticia" value="">
      <input type="hidden" id="foto_actual" name="foto_actual" value="">
      <input type="hidden" id="foto_remove" name="foto_remove" value="0">
      <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
      <div class="row pb-3">
        <div class="col-sm-1">
          <button type="button" class="btn btn-primary" data-toggle="modal" title="Buscar" data-target="#modalNoticia"><i class="fa fa-search"></i></button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label" for="titulo">Noticia<span class="required">*</span></label>
            <input class="form-control" id="txtTitulo" name="txtTitulo" type="text" placeholder="Titulo" required="">
          </div>
          <div class="form-group">
            <label class="control-label">Descripción <span class="required">*</span></label>
            <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción de la Noticia" required=""></textarea>
          </div>
          <div class="form-group">
            <label for="categoria">Categoria<span class="required">*</span></label>
            <select class="form-control selectpicker" id="categoria" name="categoria" required="">
              <option value="">Seleccione...</option>
              <?php foreach ($sqlNoticia as $noticia) : ?>
                <option value="<?= $noticia["id"]; ?>"><?= $noticia["nombre"]; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
     
        </div>
        <div class="col-md-6">
          <div class="photo">
            <label for="foto">Foto (570x380)</label>
            <div class="prevPhoto">
              <span class="delPhoto notBlock">X</span>
              <label for="foto"></label>
              <div>
                <img id="img" src="<?= media(); ?>/img/uploads/portada_noticia.png">
              </div>
            </div>
            <div class="upimg">
              <input type="file" name="foto" id="foto">
            </div>
            <div id="form_alert"></div>
          </div>
        </div>
      </div>

      <div class="tile-footer">
        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText" title="Crear Noticia">Guardar</span></button>&nbsp;&nbsp;&nbsp;
      </div>
    </form>
  </div>
</div>



<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>