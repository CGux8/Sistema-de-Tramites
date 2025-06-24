<?php
require_once("../../config/conexion.php");
require_once("../../models/Rol.php");
$rol = new Rol();
$datos = $rol->validar_menu_x_rol($_SESSION["rol_id"], "home");
if (isset($_SESSION["usu_id"]) and count($datos) > 0) {
?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <title>Inicio Trámites</title>
    <?php require_once("../html/head.php"); ?>
  </head>

  <body>
    <div id="layout-wrapper">

      <?php require_once("../html/header.php"); ?>

      <?php require_once("../html/menu.php"); ?>

      <div class="main-content">
        <div class="page-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div
                  class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Trámites</h4>


                </div>
              </div>
            </div>
          </div>
        </div>

        <?php require_once("../html/footer.php"); ?>

      </div>
    </div>

    <?php require_once("../html/sidebar.php"); ?>

    <div class="rightbar-overlay"></div>

    <?php require_once("../html/js.php"); ?>

  </body>

  </html>
<?php
} else {
  header("Location:" . conectar::ruta() . "index.php");
}
?>