<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edutécnica</title>
  <link rel="stylesheet" href="vistas/institucion/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header class="header" style="background-color: <?php echo $registroConfiguracion->getColorEncabezado() ?>;">
    <input type="checkbox" name="" id="open-menu" class="header__open-menu" />
    <label for="open-menu" class="header__logo-open-menu">≡</label>
    <div class="header__image-container">
      <img src="<?php echo $registroConfiguracion->getLogo() ?>" alt="" width="" class="header__image" />
    </div>
    <nav class="header__navigation" style="background-color: <?php echo $registroConfiguracion->getColorEncabezado() ?>;">
      <ul class="header__list">
        <li class="header__item">
          <a href="#home" class="header__link">Inicio</a>
        </li>
        <li class="header__item">
          <a href="#institution" class="header__link">Nosotros</a>
        </li>
        <li class="header__item">
          <a href="#program" class="header__link">Programas</a>
        </li>
        <li class="header__item">
          <a href="#gallery" class="header__link">Galería</a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- Sección de INICIO -->
    <section class="home" id="home">
      <div class="home__container" style="background-image: url(<?php echo $registroInicio->getImagen() ?>);">
        <div class="home__description-container">
          <h1 class="home__title">
            <?php echo $registroInicio->getTitulo() ?>
          </h1>
          <p class="home__description">
            <?php echo $registroInicio->getDescripcion() ?>
          </p>
          <a href="" class="home__link">Ver Programas</a>
        </div>
      </div>
    </section>

    <!-- Sección de NOSOTROS -->
    <section class="institution" id="institution">
      <div class="institution__wrapper">
        <div class="institution__values">
          <div class="institution__header">
            <h2 class="institution__title"><?php echo $registroDescripcionValor->getTitulo() ?></h2>
            <p class="institution__description">
              <?php echo $registroDescripcionValor->getDescripcion(); ?>
            </p>
          </div>
          <div class="institution__cards">
            <?php foreach ($registroValores as $valor) { ?>
              <div class="institution__card">
                <h3 class="institution__card-title"><?php echo $valor->getTitulo(); ?></h3>
                <p class="institution__card-text">
                  <?php echo $valor->getDescripcion() ?>
                </p>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Sección de Programas o oferta educativa -->
    <section class="program" id="program" style="background-color: <?php echo $registroConfiguracion->getColorEncabezado() ?>;">
      <div class="program__wrapper">
        <div class="program__header">
          <h2 class="program__title"><?php echo $registroDescripcionPrograma->getTitulo(); ?></h2>
          <p class="program__description">
            <?php echo $registroDescripcionPrograma->getDescripcion(); ?>
          </p>
        </div>
        <div class="program__list">
          <?php foreach ($registroProgramas as $programa) { ?>
            <article class="program__item">
              <div class="program__image-container">
                <img
                  src="<?php echo $programa->getImagen(); ?>"
                  alt=""
                  class="program__item-image" />
              </div>

              <h3 class="program__item-title"><?php echo $programa->getTitulo() ?></h3>
              <p class="program__item-description">
                <?php echo $programa->getDescripcion() ?>
              </p>
            </article>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- Sección de galería de imágenes -->
    <section class="gallery" id="gallery">
      <div class="gallery__wrapper">
        <div class="gallery__header">
          <h2 class="gallery__title"><?php echo $registroDescripcionGaleria->getTitulo() ?></h2>
          <p class="gallery__description">
            <?php echo $registroDescripcionGaleria->getDescripcion() ?>
          </p>
        </div>
        <div class="gallery__list">
          <?php foreach ($registroGaleria as $galeria) { ?>
            <div class="gallery__item">
              <img src="<?php echo $galeria->getImagen() ?>" alt="" class="gallery__item-image" />
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </main>

  <!-- Pie de Página -->
  <footer class="footer" style="background-color: <?php echo $registroConfiguracion->getColorEncabezado() ?>;">
    <div class="footer__wrapper">
      <div class="footer__list">
        <!-- Columna para información de la institución -->
        <div class="footer__column">
          <div class="footer__image-container">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>
          <h3 class="footer__title"><?php echo $registroConfiguracion->getNombreInstitucion() ?></h3>
          <div class="footer__social">
            <a href="<?php echo $registroConfiguracion->getFacebook() ?>" class="footer__social-link">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="<?php echo $registroConfiguracion->getInstagram() ?>" class="footer__social-link">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="<?php echo $registroConfiguracion->getTiktok ?>" class="footer__social-link">
              <i class="fa-brands fa-tiktok"></i>
            </a>
          </div>
        </div>

        <!-- Columna para el contacto -->
        <div class="footer__column">
          <h3 class="footer__title"><?php echo $registroConfiguracion->getNombreContacto() ?></h3>
          <p class="footer__contact"><?php echo $registroConfiguracion->getDireccion() ?></p>
          <p class="footer__contact"><?php echo $registroConfiguracion->getTelefono() ?></p>
          <p class="footer__contact"><?php echo $registroConfiguracion->getCorreo() ?></p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>