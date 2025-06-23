<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <title>Consultar Tramite</title>
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
                  <h4 class="mb-sm-0 font-size-18">Consultar Tramite</h4>

                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Listado de Tramites.</h4>
                      <p class="card-title-desc">(*) Datos obligatorios. </p>
                    </div>

                    <div class="card-body">

                      <table id="listado_table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                          <tr>
                            <th>Nro. Radicado</th>
                            <th>Fecha Creación</th>
                            <th>Area</th>
                            <th>Trámite</th>
                            <th>Nombre</th>
                            <!-- <th>Estado</th> -->
                            <th></th>
                          </tr>
                        </thead>

                        <tbody>

                        </tbody>
                      </table>

                    </div>

                  </div>
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

    <script type="text/javascript" src="consultartramite.js"></script>

  </body>

  </html>
<?php
} else {
  header("Location:" . conectar::ruta() . "index.php");
}
?>