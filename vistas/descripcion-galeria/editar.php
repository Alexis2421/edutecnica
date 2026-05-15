<div class="card">
     <div class="mb-3 py-2">
         <a
            name=""
            id=""
            class="btn btn-info"
            href="?controlador=galeria&accion=inicio"
            role="button"
            >Registros Galería</a
        >
    </div>
    <div class="card-header">Formulario de Editar Galeria</div>
    <div class="card-body">
       <form action="" method="post">
        <?php if (isset($_SESSION['mensaje'])) {
            ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <?php 
                    echo $_SESSION['mensaje'] ;
                    unset($_SESSION['mensaje']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php   } ?>
            <div class="mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="id"
                    id="id"
                    hidden
                    value="<?php echo $registroDescripcionGaleria->getId() ?>"
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Título</label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    value="<?php echo htmlspecialchars(isset($_POST['titulo']) ? $_POST['titulo']: $registroDescripcionGaleria->getTitulo() ) ?>"
                    aria-describedby="helpId"
                    placeholder=""
                />
                <?php if(isset($errores['titulo'])) { ?>
                    <p class="text-danger">
                         <?php echo $errores['titulo'] ?>
                    </p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo htmlspecialchars(isset($_POST['descripcion']) ? $_POST['descripcion'] : $registroDescripcionGaleria->getDescripcion())  ?></textarea>
                <?php if (isset($errores['descripcion'])) { ?>
                    <p class="text-danger">
                        <?php echo $errores['descripcion'] ?>
                    </p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <a
                    name=""
                    id=""
                    class="btn btn-secondary"
                    href="?controlador=paginas&accion=inicio"
                    role="button"
                    >Cancelar</a
                >
                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Actualizar Descripción Galeria
                </button>
            </div>
       </form>
    </div>
    <div class="card-footer text-muted">Footer</div>
</div>