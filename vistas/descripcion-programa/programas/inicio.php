<div class="card">
     <div class="mb-3 py-2">
            <a
                name=""
                id=""
                class="btn btn-primary"
                href="?controlador=paginas&accion=inicio"
                role="button"
                >Atrás</a
            >
    </div>
    <div class="card-header">Registro de Programas</div>
    <div class="card-body">
        <div class="mb-3 py-2">
            <a
                name=""
                id=""
                class="btn btn-info"
                href="?controlador=programa&accion=crear"
                role="button">Agregar Programa</a>
        </div>
        <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensaje']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th>Imagen</th>
                        <th>Descripcion Programa</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registrosDeProgramas as $programa) { ?>
                        
                    
                    <tr class="">
                        <td scope="row"><?php echo $programa->getId() ?></td>
                        <td><?php echo $programa->getTitulo() ?></td>
                        <td><?php echo $programa->getDescripcion() ?></td>
                        <td><img src="<?php echo $programa->getImagen() ?>" alt="" srcset="" width="100"></td>
                        <td><?php echo $programa->getDescripcionPrograma()->getTitulo() ?></td>
                        <td><a
                            name=""
                            id=""
                            class="btn btn-warning"
                            href="?controlador=programa&accion=editar&id=<?php echo $programa->getId() ?>"
                            role="button"
                            >Editar</a
                        >
                        |
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="?controlador=programa&accion=eliminar&id=<?php echo $programa->getId() ?>"
                            role="button"
                            >Eliminar</a
                        >
                        
                        </td>
                    </tr>
                  <?php  } ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted">Footer</div>
</div>
