
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
    <div class="card-header">Registro de Valores</div>
    <div class="card-body">
        <div class="mb-3 py-2">
            <a
                name=""
                id=""
                class="btn btn-info"
                href="?controlador=valor&accion=crear"
                role="button"
                >Agregar Valor</a
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
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registrosDeValores as $valor) { ?>
                        <tr class="">
                            <td><?php echo $valor->getId() ?></td>
                            <td><?php echo $valor->getTitulo() ?></td>
                            <td><?php echo $valor->getDescripcion() ?></td>
                            <td><a
                                name=""
                                id=""
                                class="btn btn-warning"
                                href="?controlador=valor&accion=editar&id=<?php echo $valor->getId() ?>"
                                role="button"
                                > Editar</a
                            >
                             | <a
                                name=""
                                id=""
                                class="btn btn-danger"
                                href="?controlador=valor&accion=eliminar&id=<?php echo $valor->getId() ?>"
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
