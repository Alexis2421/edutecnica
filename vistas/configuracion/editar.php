<div class="row">
    <?php if (isset($_SESSION['mensaje'])) { ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php   } ?>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Formulario de la Configuración General</div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="id"
                            id="id"
                            value="<?php echo $datosConfiguracion->getId() ?>"
                            hidden
                            aria-describedby="helpId"
                            placeholder="" />

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nombre de la Institución</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre_institucion"
                            id="nombre-institucion"
                            value="<?php echo   isset($_POST['nombre_institucion']) ? $_POST['nombre_institucion'] : $datosConfiguracion->getNombreInstitucion(); ?>"
                            aria-describedby="helpId"
                            placeholder="" />
                        <?php if (isset($errores['nombre_institucion'])) { ?>
                            <p class="text-danger">
                                <?php echo $errores['nombre_institucion'] ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Color encabezado</label>
                        <input
                            type="color"
                            class="form-control"
                            name="color_encabezado"
                            id="color-encabezado"
                            value="<?php echo isset($_POST['color_encabezado']) ? $_POST['color_encabezado'] : $datosConfiguracion->getColorEncabezado(); ?>"
                            aria-describedby="helpId"
                            placeholder="" />

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Dirección de Facebook</label>
                        <input
                            type="text"
                            class="form-control"
                            name="facebook"
                            id="facebook"
                            value="<?php echo isset($_POST['facebook']) ? $_POST['facebook'] : $datosConfiguracion->getFacebook() ?>"
                            aria-describedby="helpId"
                            placeholder="" />
                        <?php if (isset($errores['facebook'])) { ?>
                            <p class="text-danger">
                                <?php echo $errores['facebook'] ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Dirección de Instagram</label>
                        <input
                            type="text"
                            class="form-control"
                            name="instagram"
                            id="instagram"
                            value="<?php echo isset($_POST['instagram']) ? $_POST['instagram'] : $datosConfiguracion->getInstagram() ?>"
                            aria-describedby="helpId"
                            placeholder="" />

                        <?php if (isset($errores['instagram'])) { ?>
                            <p class="text-danger">
                                <?php echo $errores['instagram'] ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label"> Dirección de Tiktok</label>
                        <input
                            type="text"
                            class="form-control"
                            name="tiktok"
                            id="tiktok"
                            value="<?php echo isset($_POST['tiktok']) ? $_POST['tiktok'] : $datosConfiguracion->getTiktok() ?>"
                            aria-describedby="helpId"
                            placeholder="" />

                        <?php if (isset($errores['tiktok'])) { ?>
                            <p class="text-danger">
                                <?php echo $errores['tiktok'] ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <?php if (empty($datosConfiguracion->getLogo())) { ?>
                            <label for="" class="form-label">Cargar Imagen</label>
                            <input
                                type="file"
                                class="form-control"
                                name="logo"
                                id="logo"
                                placeholder=""
                                aria-describedby="fileHelpId" />
                            <?php if (isset($errores['logo'])) { ?>
                                <p class="text-danger">
                                    <?php echo $errores['logo'] ?>
                                </p>
                            <?php } ?>
                        <?php } else { ?>
                            <img src="<?php echo $datosConfiguracion->getLogo() ?>" alt="" srcset="" width="100px">

                            <div class="mb-3">
                                <label for="" class="form-label">Cambiar Imagen</label>
                                <input
                                    type="file"
                                    class="form-control"
                                    name="logo"
                                    id="logo"
                                    placeholder=""
                                    aria-describedby="fileHelpId" />
                                <?php if (isset($errores['logo'])) { ?>
                                    <p class="text-danger">
                                        <?php echo $errores['logo'] ?>
                                    </p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-3 py-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-secondary"
                            href="?controlador=paginas&accion=inicio"
                            role="button">Cancelar</a>
                        <button
                            type="submit"
                            name="formulario_general"
                            class="btn btn-success">
                            Editar la Configuración General
                        </button>

                    </div>
                </form>
            </div>
            <div class="card-footer text-body-secondary">Footer</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Formulario de Contacto</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="id"
                            id="id"
                            value="<?php echo $datosConfiguracion->getId() ?>"
                            hidden
                            aria-describedby="helpId"
                            placeholder="" />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre de Contacto</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre_contacto"
                            id="nombre-contacto"
                            value="<?php echo $datosConfiguracion->getNombreContacto() ?>"
                            aria-describedby="helpId"
                            placeholder="" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Direccion
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            name="direccion"
                            id="direccion"
                            value="<?php echo $datosConfiguracion->getDireccion() ?>"
                            aria-describedby="helpId"
                            placeholder="" />
                    </div>
                    <div class="mb-3">

                        <label for="" class="form-label">Telefono</label>

                        </label>
                        <input
                            type="text"
                            class="form-control"
                            name="telefono"
                            id="telefono"
                            value="<?php echo $datosConfiguracion->getTelefono() ?>"
                            aria-describedby="helpId"
                            placeholder="" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Correo</label>
                        <input
                            type="email"
                            class="form-control"
                            name="correo"
                            id="correo"
                            value="<?php echo $datosConfiguracion->getCorreo() ?>"
                            aria-describedby="emailHelpId"
                            placeholder="abc@mail.com" />
                    </div>
                    <div class="mb-3 py-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-secondary"
                            href="?controlador=paginas&accion=inicio"
                            role="button">Cancelar</a>
                        <button
                            type="submit"
                            name="formulario_contacto"
                            class="btn btn-success">
                            Editar Contacto
                        </button>
                    </div>

                </form>
            </div>
            <div class="card-footer text-body-secondary">Footer</div>
        </div>

    </div>
</div>