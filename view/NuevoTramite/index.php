<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <title>Nuevo Tramite</title>
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
                  <h1 class="mb-sm-0 font-size-18">Gestionar Tramite</h1>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Pages</a>
                      </li>
                      <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Ingrese toda la información requerida.</h3>
                      <p class="card-title-desc" style="color:red;">(*) Datos obligatorios.</p>
                    </div>

                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <label for="choices-single-default" class="form-label font-size-15 text-muted">Dependencia</label>
                            <h6>SECRETARIA DE SALUD</h6>
                            <!-- <select class="form-control" data-trigger="" name="choices-single-default" id="choices-single-default" placeholder="This is a search placeholder">
                              <option value="">This is a placeholder</option>
                              <option value="Choice 1">Choice 1</option>
                              <option value="Choice 2">Choice 2</option>
                              <option value="Choice 3">Choice 3</option>
                            </select> -->
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="choices-single-default" class="form-label font-size-15 text-muted">Tramite</label>
                            <h6>LICENCIA DE INHUMACIÓN DE CADAVERES</h6>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="choices-single-default" class="form-label font-size-15 text-muted">Descripción</label>
                            <h6>Autorización para enterrar o depositar cadáveres, restos óseos y partes humanas en los cementerios.</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-text-input" class="form-label">Nombres</label>
                              <input class="form-control" type="text" value="Digite su nombre" id="example-text-input">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Primer Apellido</label>
                              <input class="form-control" type="text" value="Digite su nombre" id="example-text-input">
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Segundo Apellido</label>
                              <input class="form-control" type="text" value="Digite su nombre" id="example-text-input">
                            </div>
                        </div>
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

  </body>

  </html>
<?php
} else {
  header("Location:" . conectar::ruta() . "index.php");
}
?>