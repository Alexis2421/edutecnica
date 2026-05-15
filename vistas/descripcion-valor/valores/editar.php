<div class="card">
    <div class="card-header">Formulario de Registrar Valor</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">

                <input
                    type="text"
                    class="form-control"
                    name="id"
                    id="id"
                    value="<?php echo $registroValor['id'] ?>"
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
                    value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : $registroValor['titulo'] ?>"
                    aria-describedby="helpId"
                    placeholder="" />
                <?php if (isset($_SESSION['titulo'])) { ?>
                    <p class="text-danger">
                        <?php echo $_SESSION['titulo'] ?>
                    </p> 
               <?php } ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo  isset($_POST['descripcion']) ? $_POST['descripcion'] : $registroValor['descripcion'] ?></textarea>
                <?php if (isset($_SESSION['descripcion'])) { ?>
                        <p class="text-danger">
                            <?php echo $_SESSION['descripcion'] ?>
                        </p>
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
                    Editar Valor
                </button>
            </div>

        </form>
    </div>
    <div class="card-footer text-muted">Footer</div>
</div>