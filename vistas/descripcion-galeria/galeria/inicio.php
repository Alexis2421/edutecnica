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
    <div class="card-header">Registro de Galeria</div>
    
    <div class="card-body">
         <div class="mb-3 py-2">
            <a
                name=""
                id=""
                class="btn btn-info"
                href="?controlador=galeria&accion=crear"
                role="button"
                >Agregar Imagen</a
            >
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
                        <th>Descripcion Galeria</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registrosDeGaleria as $galeria) { ?>
                        
                    
                    <tr class="">
                        <td scope="row"><?php echo $galeria->getId() ?></td>
                        <td><?php echo $galeria->getTitulo() ?></td>
                        <td><?php echo $galeria->getDescripcion() ?></td>
                        <td><img src="<?php echo $galeria->getImagen() ?>" alt="" srcset="" width="100"></td>
                        <td><?php echo $galeria->getDescripcionGaleria()->getTitulo() ?></td>
                        <td><a
                            name=""
                            id=""
                            class="btn btn-warning"
                            href="?controlador=galeria&accion=editar&id=<?php echo $galeria->getId() ?>"
                            role="button"
                            >Editar</a
                        >
                        |
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="?controlador=galeria&accion=eliminar&id=<?php echo $galeria->getId() ?>"
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