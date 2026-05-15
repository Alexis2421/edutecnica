<div class="card">
    <div class="card-header">Formulario de Registrar Valor</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Seleccionar la Descripción de Valor</label>
                <select
                    class="form-select form-select-lg"
                    name="descripcion_valor_id"
                    id="descripcion-valor-id">
                    <option value="">Seleccionar ...</option>
                    <option value="<?php echo $registroDescripcionValor->getId() ?>"
                        <?php echo ($_POST['descripcion_valor_id'] ??'') == $registroDescripcionValor->getId() ? 'selected' : '' ?>> 
                        <?php echo $registroDescripcionValor->getTitulo() ?>
                    </option>

                </select>

                 <?php if (isset($errores['descripcion_valor_id'])) { ?>
                    <p class="text-danger">
                        <?php echo $errores['descripcion_valor_id']; ?>
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
                    value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : ''; ?>"
                    aria-describedby="helpId"
                    placeholder="" />
                <?php if (isset($errores['titulo'])) { ?>
                    <p class="text-danger"><?php echo $errores['titulo'] ?></p>
               <?php  } ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?></textarea>
                <?php if (isset($errores['descripcion'])) { ?>
                    <p class="text-danger"><?php echo $errores['descripcion'] ?></p>
                <?php } ?>
            </div>
            <div class="mb-3 py-2">
                <a
                    name=""
                    id=""
                    class="btn btn-secondary"
                    href="?controlador=valor&accion=inicio"
                    role="button">Cancelar</a>
                <button
                    type="submit"
                    class="btn btn-success">
                    Registrar Valor
                </button>
            </div>




        </form>
    </div>
    <div class="card-footer text-muted">Footer</div>
</div>