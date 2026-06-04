<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edutecnica | Quinchía</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <nav
        class="navbar navbar-dark navbar-expand-sm bg-primary">
        <a class="navbar-brand" href="#">Edutecnica Quinchía</a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=inicio&accion=editar">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=descripcion-valor&accion=editar">Valores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=descripcion-programa&accion=editar">Programas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=descripcion-galeria&accion=editar">Galeria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=configuracion&accion=editar">Configuración</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=paginas&accion=web">Página Web</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php include_once("config/ruteador.php") ?>
</body>

</html>