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

                  <!-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Pages</a>
                      </li>
                      <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                  </div> -->
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Ingrese toda la información requerida.</h3>
                      <p class="card-title-desc" style="color:red;">(*) Datos obligatorios.</p><br>
                      <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Documentos requeridos: <i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md p-2" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 40px);" data-popper-placement="bottom-start">
                          <p>
                            1- Fotocopia del documento de identidad del fallecido.<br>
                            2- Certificado de defunción expedido por el médico tratante.
                            3- Si el municipio de fallecimiento es diferente a Palmira, adjuntar traslado del municipio de fallecimiento. <br>
                            4- <strong>En caso de muerte FETAL:</strong> fotocopia del documento de identidad de los padres. <br>
                            5- <strong>En caso de muerte NO NATURAL: </strong>Oficio expedido por Fiscalía. <br>
                            6- <strong>Para CREMACIÓN: </strong>Autorización de cremación o manifestación escrita de la voluntad de la persona en vida o de sus familiares después de la muerte (adjuntar documento de identidad de cada uno) .
                          </p>

                        </div>
                      </div>

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
                      <h5>Datos del Fallecido</h5>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-text-input" class="form-label">Nombres*</label>
                              <input class="form-control" type="text" value="" id="example-text-input">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Primer Apellido*</label>
                            <input class="form-control" type="text" value="" id="example-text-input">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Segundo Apellido</label>
                            <input class="form-control" type="text" value="" id="example-text-input">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Sexo*</label>
                              <select class="form-select">
                                <option>Femenino</option>
                                <option>Masculino</option>
                                <option>Otro</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Tipo de documento*</label>
                              <select class="form-select">
                                <option>Registro Civil</option>
                                <option>Tarjeta de Identidad</option>
                                <option>Cédula de Ciudadanía</option>
                                <option>Cédula de Extranjería</option>
                                <option>Permiso Temporal</option>
                                <option>Permiso de Protección Temporal</option>
                                <option>Permiso Especial de Permanencia</option>
                                <option>Certificado de Nacido Vivo</option>
                                <option>Carné diplomático</option>
                                <option>Menor sin Identificar</option>
                                <option>Adulto sin Identificar</option>
                                <option>Documento Extranjero</option>
                                <option>Salvoconducto</option>
                                <option>Pasaporte</option>
                                <option>Sin información</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-number-input" class="form-label">Número de Documento*</label>
                              <input class="form-control" type="number" value="" id="example-number-input">
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-text-input" class="form-label">Municipio de fallecimiento*</label>
                              <input class="form-control" type="text" value="" id="example-text-input">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Manera de Muerte*</label>
                              <select class="form-select">
                                <option>Natural</option>
                                <option>No Natural</option>
                                <option>En Estudio</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-date-input" class="form-label">Fecha de Defunción*</label>
                              <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-number-input" class="form-label">Nro. Certificado de Defunción*</label>
                              <input class="form-control" type="number" value="" id="example-number-input">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-date-input" class="form-label">Fecha nacimiento* (Para muerte FETAL, registrar la misma fecha de fallecimiento)</label>
                              <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6"><br>
                          <h5>Destino Final</h5>
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Nombre del Cementerio o Crematorio*</label>
                              <select class="form-select">
                                <option></option>
                                <option></option>
                                <option></option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <h5>Datos Funeraria</h5>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Nombre de la Funeraria*</label>
                              <select class="form-select">
                                <option></option>
                                <option></option>
                                <option></option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Nombres y Apellidos de quien realiza el trámite*</label>
                            <input class="form-control" type="text" value="" id="example-text-input">
                          </div>
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