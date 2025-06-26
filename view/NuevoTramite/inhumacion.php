<?php
require_once("../../config/conexion.php");
require_once("../../models/Rol.php");
$rol = new Rol();
$datos = $rol->validar_menu_x_rol($_SESSION["rol_id"], "nuevotramite");
if (isset($_SESSION["usu_id"]) and count($datos) > 0) {
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
                  <h1 class="mb-sm-0 font-size-18">Registrar Trámite</h1>

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
                      <form method="post" id="inhumacion_form">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="mb-3">
                              <h3 class="font-size-15 text-muted">Dependencia</h3>
                              <h6>SECRETARIA DE SALUD</h6>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="mb-3">
                              <h3 class="font-size-15 text-muted">Tramite</h3>
                              <h6>LICENCIA DE INHUMACIÓN DE CADAVERES</h6>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="mb-3">
                              <h3 class="font-size-15 text-muted">Descripción</h3>
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
                              <input class="form-control" type="text" value="" name="inhum_nom" id="inhum_nom" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Primer Apellido*</label>
                            <input class="form-control" type="text" value="" name="inhum_papell" id="inhum_papell" required>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Segundo Apellido</label>
                            <input class="form-control" type="text" value="" name="inhum_sapell" id="inhum_sapell">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Sexo*</label>
                              <select class="form-select" name="inhum_sex" id="inhum_sex" required>
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
                              <select class="form-select" name="inhum_tip_doc" id="inhum_tip_doc" required>
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
                              <input class="form-control" type="number" value="" name="inhum_num_doc" id="inhum_num_doc" required>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-text-input" class="form-label">Municipio de fallecimiento*</label>
                              <input class="form-control" type="text" value="" name="inhum_mun_fall" id="inhum_mun_fall" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Manera de Muerte*</label>
                              <select class="form-select" name="inhum_man_muert" id="inhum_man_muert" required>
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
                              <input class="form-control" type="date" value="" name="inhum_fecha_defun" id="inhum_fecha_defun" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-number-input" class="form-label">Nro. Certificado de Defunción*</label>
                              <input class="form-control" type="number" value="" name="inhum_cert_defun" id="inhum_cert_defun" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-date-input" class="form-label">Fecha nacimiento* (Para muerte FETAL, registrar la misma fecha de fallecimiento)</label>
                              <input class="form-control" type="date" value="" name="inhum_fech_nac" id="inhum_fech_nac" required>
                            </div>
                          </div>
                        </div>

                        <h5>Destino Final</h5>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Nombre del Cementerio o Crematorio*</label>
                              <select class="form-select" name="inhum_cem_crem" id="inhum_cem_crem" required>
                                <option value="">Seleccionar</option>
                                <option>Jardines Del Palmar</option>
                                <option>Cementerio Católico Central</option>
                                <option>Unidad Crematoria Los Olivos</option>
                                <option>Cementerio Católico Rozo</option>
                                <option>Cementerio Católico La Buitrera</option>
                                <option>Cementerio de Potrerillo</option>
                                <option>Getsemaní Cristo Rey</option>
                                <option>Cementerio Libre</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!--    <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Otro:</label>
                            <input class="form-control" type="text" value="" name="inhum_cem_crem7" id="inhum_cem_crem7">
                          </div>
                        </div> -->

                        <h5>Datos Funeraria</h5>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Nombre de la Funeraria*</label>
                              <select class="form-select" name="inhum_nom_fun" id="inhum_nom_fun" required>
                                <option value="">Seleccionar</option>
                                <option>Apoyo Fúnebre Nacional S.A.S</option>
                                <option>Capillas de Velación Cristo Rey</option>
                                <option>Casa Funerales El Prado</option>
                                <option>Coorserpark S.A.S</option>
                                <option>El Paraíso Salas de Velación</option>
                                <option>Funerales Correa</option>
                                <option>Funerales La Esperanza Servicios Integrales S.A.S</option>
                                <option>Funerales La Maria S.A.S</option>
                                <option>Funerales La María de Candelaria S.A.S</option>
                                <option>Funerales San Martin Pradera SAS</option>
                                <option>Funerales Villa de Paz Palmira</option>
                                <option>Funerales y Preexequiales Santa Isabel</option>
                                <option>Funeraria Inversiones y Planes de la Paz</option>
                                <option>Funeraria La Piedad Capillas</option>
                                <option>Funeraria Metropolitana Campos de Paz</option>
                                <option>Funeraria Santa Cruz</option>
                                <option>Jardines del Renacer S.A.S</option>
                                <option>Parque Cementerio Jardines Del Palmar</option>
                                <option>Preexequiales Villa de las Palmas</option>
                                <option>SERCOFUN LTDA. Funerales Los Olivos</option>
                                <option>SERFUCOM S.A.S</option>
                                <option>Servicios Excequiales Palomino Velasco S.A.S</option>
                                <option>Servicios Funerarios Y Cremaciones San José Ltda.</option>
                                <option>Funeraria Capillas Manantial de Paz</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Nombres y Apellidos de quien realiza el trámite*</label>
                            <input class="form-control" type="text" value="" name="inhum_nom_real_tram" id="inhum_nom_real_tram" required>
                          </div>
                        </div>

                        <div class="col-lg-12">
                          <div class="dropzone" id="dropzone">
                            <div class="dz-default dz-message">
                              <button class="dz-button" type="button">
                                <img src="../../assets/img/upload.png" alt="">
                              </button>
                              <div class="dz-message" data-dz-message><span>Arrastra y suelta tu archivo aquí o haz click para seleccionar tu archivo <br> Maximo 1 archivo de tipo *.PDF, y solo de peso maximo de 10MB <br> Nombres de los archivos sin caracteres especiales</span></div>
                            </div>
                          </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                          <button type="button" id="btnlimpiar" class="btn btn-secondary waves-effect waves-light">Limpiar</button>
                          <button type="submit" id="btnguardar" class="btn btn-primary waves-effect waves-light">Guardar</button>
                        </div>


                      </div>
                      </form>
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

    <script type="text/javascript" src="inhumacion.js"></script>

  </body>

  </html>

<?php
} else {
  header("Location:" . conectar::ruta() . "index.php");
}
?>