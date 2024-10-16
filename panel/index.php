<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
require_once("includes/base.php");
require_once("controllers/validar.php");

if (isset($_GET["cat"])){
  $cat = $_GET["cat"];
  $sentencia = $conx->prepare("SELECT N.*, C.*, C.id AS categoria_id FROM noticias N LEFT JOIN categorias C ON N.id_categorias = C.id WHERE C.categoria  = ?");
  $sentencia->bind_param("s", $cat);
  $sentencia->execute();
  $resultado = $sentencia->get_result();
}else {
  $resultado = $conx->query("SELECT N.*, C.*, C.id AS categoria_id FROM noticias N LEFT JOIN categorias C ON N.id_categorias = C.id;");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menu Lateral</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
  </head>
  <style>
    nav,
    .offcanvas {
      background-color: #1e293b;
    }
    .navbar-toggler {
      border: none;
    }
    .navbar-toggler:focus {
      outline: none;
      box-shadow: none;
    }

    @media (max-width: 768px) {
      .navbar-nav > li:hover {
        background-color: #0dcaf0;
      }
    }
  </style>
  <body>
    <!-- MENU START  -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <!-- NAV CONTAINER START -->
      <div class="container-fluid">
        <a href="../localhost/detalles.php" class="navbar-brand text-info fw-semibold fs-4">WebNoticas</a>

        <!-- NAV BUTTON  -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#menuLateral"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- OFFCANVAS MAIN CONTAINER START -->
        <section
          class="offcanvas offcanvas-start"
          id="menuLateral"
          tabindex="-1"
        >
          <div class="offcanvas-header" data-bs-theme="dark">
            <h5 class="offcanvas-title text-info">EMPRINNOS</h5>
            <button
              class="btn-close"
              type="button"
              aria-label="Close"
              data-bs-dismiss="offcanvas"
            ></button>
          </div>
          <!-- OFF CANVAS MENU LINKS  START-->
          <div
            class="offcanvas-body d-flex flex-column justify-content-between px-0"
          >
            <ul class="navbar-nav fs-5 justify-content-evenly">
              <li class="nav-item p-3 py-md-1">
                <a href="views/usuarios/listado.php" class="nav-link">Usuario</a>
              </li>
              <li class="nav-item p-3 py-md-1">
                <a href="views/noticias/listado.php" class="nav-link">Noticias</a>
              </li>
              <li class="nav-item p-3 py-md-1">
                <a href="views/categorias/listado.php" class="nav-link">Categorias</a>
              </li>
              <li class="nav-item p-3 py-md-1">
                <a href="/index/panel/views/usuarios/login.php" class="nav-link">cerrar sesion</a>
              </li>
            </ul>
            <!-- enlaces redes sociales -->

            <div class="d-lg-none align-self-center py-3">
              <a href=""><i class="bi bi-twitter px-2 text-info fs-2"></i></a>
              <a href=""><i class="bi bi-facebook px-2 text-info fs-2"></i></a>
              <a href=""><i class="bi bi-github px-2 text-info fs-2"></i></a>
              <a href=""><i class="bi bi-whatsapp px-2 text-info fs-2"></i></a>
            </div>
          </div>
        </section>
        <!-- OFFCANVAS MAIN CONTAINER END  -->
      </div>
    </nav>

    <div clas="box">
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
    
       <?php while ($fila = $resultado->fetch_object()){?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?php echo $fila->titulos?></strong></h2>
                        <h6 class="card-text"><strong><?php echo $fila->descripcion?></strong></h2>
                        <h6 class="card-text"><strong><?php echo $fila->textos?></strong></h2>

                    </div>
                    <div class="d-flex justify-content-around mb-5">
                        <a href="views/noticias/noticia.php" class="btn btn-primary">Ver mas</a>
                        <a href="">eliminar</a>
                    </div>
                </div>
            </div>
          <?php }
    ?>
    </div>
    </div>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>