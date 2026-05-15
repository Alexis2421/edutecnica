<div class="card">
    <div class="card-header">Formulario de editar un registro de Programa</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">

                <input
                    type="text"
                    class="form-control"
                    name="id"
                    id="id"
                    value="<?php echo $registroPrograma['id'] ?>"
                    readonly
                    hidden
                    aria-describedby="helpId"
                    placeholder="" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Título</label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    value="<?php echo $registroPrograma['titulo'] ?>"
                    aria-describedby="helpId"
                    placeholder="Debe diligenciar el título" />
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo $registroPrograma['descripcion'] ?></textarea>
            </div>
            <?php if (empty($registroPrograma['imagen'])) { ?>
                <div class="mb-3">
                    <label for="" class="form-label">Cargar Imagen</label>
                    <input
                        type="file"
                        class="form-control"
                        name="imagen"
                        id="imagen"
                        placeholder=""
                        aria-describedby="fileHelpId" />
                    <div id="fileHelpId" class="form-text">Help text</div>
                </div>
            <?php } else { ?>
                <div class="mb-3">
                    <img src="<?php echo $registroPrograma['imagen'] ?>" alt="" srcset="" width="200px">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Cambiar Imagen</label>
                    <input
                        type="file"
                        class="form-control"
                        name="imagen"
                        id="imagen"
                        placeholder=""
                        aria-describedby="fileHelpId" />
                    <div id="fileHelpId" class="form-text">Help text</div>
                </div>

            <?php } ?>
            <div class="mb-3 py-2">
                <a
                    name=""
                    id=""
                    class="btn btn-secondary"
                    href="?controlador=programa&accion=inicio"
                    role="button">Cancelar</a>
                <button
                    type="submit"
                    class="btn btn-success">
                    Actualizar Registro
                </button>
            </div>


        </form>
    </div>
    <div class="card-footer text-muted">Footer</div>
</div>