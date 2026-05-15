<div class="card">
    <div class="card-header">Formulario de Galeria</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Seleccionar la Descripción de Galeria</label>
                <select
                    class="form-select form-select-lg"
                    name="descripcion_galeria_id"
                    id="descripcion-galeria-id">
                    <option value="" selected>Seleccionar ...</option>
                    <option value="<?php echo $registroDescripcionGaleria->getId() ?>"
                        <?php echo ($_POST['descripcion_galeria_id'] ?? '') == $registroDescripcionGaleria->getId() ? 'selected' : '' ?>
                    >
                        <?php echo $registroDescripcionGaleria->getTitulo()  ?>
                    </option>

                </select>
                <?php if (isset($errores['descripcion_galeria_id'])) { ?>
                    <p class="text-danger">
                        <?php echo $errores['descripcion_galeria_id']; ?>
                    </p>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Título</label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : '' ?>"
                    aria-describedby="helpId"
                    placeholder="" />
                <?php if (isset($errores['titulo'])) { ?>
                    <p class="text-danger">
                        <?php echo $errores['titulo']; ?>
                    </p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : '' ?></textarea>
                <?php if (isset($errores['descripcion'])) { ?>
                    <p class="text-danger">
                        <?php echo $errores['descripcion']; ?>
                    </p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cargar Imagen</label>
                <input
                    type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
                    placeholder=""
                    aria-describedby="fileHelpId" />
                <?php if (isset($errores['imagen'])) { ?>
                    <p class="text-danger">
                        <?php echo $errores['imagen']; ?>
                    </p>
                <?php } ?>
            </div>

            <div class="mb-3 py-2">
                <a
                    name=""
                    id=""
                    class="btn btn-secondary"
                    href="?controlador=galeria&accion=inicio"
                    role="button">Cancelar</a>

                    <button
                        type="submit"
                        class="btn btn-success">
                        Registrar Imagen de Galeria
                    </button>
            </div>
        </form>
    </div>
    <div class="card-footer text-muted">Footer</div>
</div>