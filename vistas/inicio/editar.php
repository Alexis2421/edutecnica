<div class="card">
    <div class="card-header">Formulario de editar un registro de inicio</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <?php 
                
                if (isset($_SESSION['mensaje'])) {?>
                    <div class="alert alert-primary  alert-dismissible fade show " role="alert">
                        <?php 
                            echo $_SESSION['mensaje'] ;
                            unset($_SESSION['mensaje']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
              <?php } ?>  
            
            <div class="mb-3">

                <input
                    type="text"
                    class="form-control"
                    name="id"
                    id="id"
                    value="<?php echo $registroInicio->getId() ?>"
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
                    value="<?php echo htmlspecialchars(isset($_POST['titulo']) ?  $_POST['titulo'] : $registroInicio->getTitulo()); ?>"
                    aria-describedby="helpId"
                    placeholder="Debe diligenciar el título" />

                <?php if (isset($errores['titulo'])){ ?>
                    <p class="text-danger"><?php echo $errores['titulo']; ?></p>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo htmlspecialchars(isset($_POST['descripcion']) ? $_POST['descripcion'] : $registroInicio->getDescripcion()); ?></textarea>
                
                <?php if (isset($errores['descripcion'])){ ?>
                    <p class="text-danger"><?php echo $errores['descripcion']; ?></p>
                <?php } ?>
            </div>
            <?php if (empty($registroInicio->getImagen())) { ?>
                <div class="mb-3">
                    <label for="" class="form-label">Cargar Imagen</label>
                    <input
                        type="file"
                        class="form-control"
                        name="imagen_inicio"
                        id="imagen"
                        placeholder=""
                        aria-describedby="fileHelpId" />

                    <?php if (isset($errores['imagen'])){ ?>
                        <p class="text-danger"><?php echo $errores['imagen']; ?></p>
                    <?php } ?>

                </div>
            <?php } else { ?>
                <div class="mb-3">
                    <img src="<?php echo $registroInicio->getImagen() ?>" alt="" srcset="" width="200px">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Cambiar Imagen</label>
                    <input
                        type="file"
                        class="form-control"
                        name="imagen_inicio"
                        id="imagen"
                        placeholder=""
                        aria-describedby="fileHelpId" />

                    <?php if (isset($errores['imagen'])){ ?>
                        <p class="text-danger"><?php echo $errores['imagen']; ?></p>
                    <?php } ?>
                </div>

            <?php } ?>
            <div class="mb-3 py-2">
                <a
                    name=""
                    id=""
                    class="btn btn-secondary"
                    href="?controlador=paginas&accion=inicio"
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