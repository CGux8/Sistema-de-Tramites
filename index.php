<?php
require_once("config/conexion.php");
if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
  require_once("models/Usuario.php");
  $usuario = new Usuario();
  $usuario->login();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="https://tramites.palmira.gov.co/info/palmira_se/web/portal/img/favicon.png" />
  <title>Trámites</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet"
    crossorigin="anonymous">
  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap.min-1.css" id="bootstrap-style" rel="stylesheet" type="text/css">
  <!-- Icons Css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <!-- App Css-->
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
  <link href="css/barras.css" rel="stylesheet" type="text/css">
  <link href="css/barra_accesibilidad.css" rel="stylesheet" type="text/css">
  <link href="css/menu_navegacion.css" rel="stylesheet" type="text/css">
  <link href="css/login.css" rel="stylesheet" type="text/css">
  <link href="css/boton_arriba.css" rel="stylesheet" type="text/css">
  <link href="css/entradas-de-texto.css" rel="stylesheet" type="text/css">
</head>

<body id="para-mirar">
  <!-- Barra Superior GOV.CO -->
  <nav class="navbar navbar-expand-lg barra-superior-govco" aria-label="Barra superior">
    <a href="https://www.gov.co/" target="_blank" aria-label="Portal del Estado Colombiano - GOV.CO"></a>
  </nav>
  <button class="idioma-icon-barra-superior-govco float-right" id="idioma" aria-label="Button to change the language of the page to English"></button>

  <div class="logo-aut-header-govco">
    <div class="container-logo-header-govco">
      <a href="https://palmira.gov.co/"><span class="logo-header-govco"></span></a>
      <div class="container-search-header-govco">
        <!-- Search -->
        <div class="search-govco">
          <div class="bar-search-govco">
            <input type="text" placeholder="Buscar por componente" class="input-search-govco" aria-label="Buscador" />
            <button class="icon-search-govco icon-close-search-govco" aria-label="Limpiar"></button>
            <div class="icon-search-govco search-icon-search-govco" aria-hidden="true"></div>
          </div>
          <div class="container-options-search-govco">
            <div class="options-search-govco">
              <ul>
                <li>
                  <a href="#" tabindex="-1">Sugerencia de búsqueda con la palabra <strong>Componente 1</strong></a>
                </li>
                <li>
                  <a href="#" tabindex="-1">Sugerencia de búsqueda con la palabra <strong>Componente 1</strong></a>
                </li>
                <li>
                  <a href="#" tabindex="-1">Sugerencia de búsqueda con la palabra <strong>Componente 1</strong></a>
                </li>
                <li>
                  <a href="#" tabindex="-1">Sugerencia de búsqueda con la palabra <strong>Componente 1</strong></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Search -->
      </div>
    </div>
  </div>
  <!-- Menu de Navegacion -->
  <div class="container-navbar-menu-govco blue-menu-govco">
    <nav class="navbar navbar-expand-lg navbar-menu-govco" role="navigation" aria-label="Menú ejemplo entidad">
      <div class="container-fluid container-second-navbar-menu-govco">
        <a class="navbar-brand navbar-toggler icon-entidad-menu-govco" href="#"></a>
        <button class="navbar-toggler button-responsive-menu-govco collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bars-menu-govco"></span>
        </button>
        <div class="collapse navbar-collapse navbar-collapse-menu-govco" id="navbarScroll">
          <ul class="navbar-nav navbar-nav-menu-govco ms-auto">
            <li class="nav-item">
              <a class="nav-link dir-menu-govco active" aria-current="page" href="https://tramites.palmira.gov.co/index.php">
                <span class="text-item-menu-govco">
                  Inicio
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link dir-menu-govco" aria-current="page" href="https://palmira.gov.co/transparencia/">
                <span class="text-item-menu-govco">
                  Transparencia y acceso información pública
                </span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="container-text-icon-menu-govco">
                  <span class="text-item-menu-govco">Atención y Servicios a la ciudadanía</span>
                  <span class="icon-caret-menu-govco"></span>
                </span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item dir-menu-govco" href="https://tramites.palmira.gov.co/tramites/">Trámites y Servicios</a></li>
                <li><a class="dropdown-item dir-menu-govco" href="https://tramites.palmira.gov.co/publicaciones/6">Acerca de la sede electrónica</a></li>
                <li><a class="dropdown-item dir-menu-govco" href="https://palmira.gov.co/servicios/peticiones-quejas-y-reclamos/">PQRSDF</a></li>
                <li><a class="dropdown-item dir-menu-govco" href="https://tramites.palmira.gov.co/publicaciones/9">Políticas de Sede Electrónica</a></li>
                <li><a class="dropdown-item dir-menu-govco" href="https://tramites.palmira.gov.co/publicaciones/11">Ayuda</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link dir-menu-govco" aria-current="page" href="https://palmira.gov.co/transparencia/participa/">
                <span class="text-item-menu-govco">
                  Participa
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- Menu de Navegacion -->
  <!-- Cabecera -->
  </div>

  <!-- Login -->
  <div class="card-body d-flex justify-content-center" id="para-mirar">
    <div class="inicio-sesion-govco" data-content="natural">
      <h2>Inicio de sesión</h2>

      <!-- Correo electronico -->
      <form class="custom-form mt-4 pt-2" action="" method="post">

        <?php
        if (isset($_GET["m"])) {
          switch ($_GET["m"]) {
            case "1":
        ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                Correo Electronico no encontrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
              break;

            case "2":
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                Campos Vacios.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
              break;

            case "3":
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                Contraseña Incorrecta.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php
              break;
          }
        }
        ?>

        <div class="mb-3">
          <label class="form-label">Correo Electronico</label>
          <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="Ingrese Correo Electronico" autocomplete="current-password" required>
        </div>
        <div class="mb-3">
          <div class="d-flex align-items-start">
            <div class="flex-grow-1">
              <label class="form-label">Contraseña</label>
            </div>
            <div class="flex-shrink-0">
            </div>
          </div>

          <div class="input-group auth-pass-inputgroup">
            <input type="password" class="form-control" id="usu_pass" name="usu_pass" placeholder="Ingrese Contraseña" aria-label="Password" aria-describedby="password-addon" autocomplete="current-password" required>
            <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
          </div>
        </div>

        
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-check">
              <label class="form-check-label" for="remember-check">
                Recuerdame
              </label>
            </div>
          </div>

        

        <div class="mb-3 mt-2">
          <input type="hidden" name="enviar" value="si">
          <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Acceder</button>
        </div>

        <div class="container-options-login-govco">
          <div class="mt-2">
            <a href="view/recuperar/index.php">Olvidé mi contraseña</a>
          </div>

          <div class="mt-1 pt-2 text-center">
            <!-- <div class="signin-other-title">
              <h6 class="font-size-14 mb-3 text-muted fw-medium">- Acceder con -</h6>
            </div> -->

            <ul class="list-inline mb-0">

              <li class="list-inline-item">

                <!--TODO: Botón "Iniciar sesión con Google" con atributos de datos HTML para la API -->
                <div id="g_id_onload"
                  data-client_id="554564814134-l9ps3t4up0n0p8u4ed99s4dtamp8celb.apps.googleusercontent.com"
                  data-context="signin"
                  data-ux_mode="popup"
                  data-callback="handleCredentialResponse"
                  data-auto_prompt="false">
                </div>

                <!--TODO: Configuración del botón de inicio de sesión con Google -->
                <div class="g_id_signin"
                  data-type="standard"
                  data-shape="rectangular"
                  data-theme="outline"
                  data-text="signin_with"
                  data-size="large"
                  data-logo_alignment="left"></div>
              </li>

            </ul>
          </div>

          <p class="mt-3">¿No tienes cuenta? &nbsp;
            <a class="mt-3" href="view/registro/index.php">Regístrate aquí</a>
          </p>
        </div>
      </form>
    </div>
  </div>

  <!-- Barra de accesibilidad -->
  <div class="content-example-barra">
    <div class="barra-accesibilidad-govco">
      <button id="botoncontraste" class="icon-contraste" onclick="cambiarContexto()">
        <span id="titlecontraste">Contraste</span>
      </button>
      <button id="botondisminuir" class="icon-reducir" onclick="disminuirTamanio('disminuir')">
        <span id="titledisminuir">Reducir letra</span>
      </button>
      <button id="botonaumentar" class="icon-aumentar" onclick="aumentarTamanio('aumentar')">
        <span id="titleaumentar">Aumentar letra</span>
      </button>
    </div>
  </div>
  <!-- Fin barra de accesibilidad -->

  <!-- Info -->
  <div class="govco-footer">
    <div class="govco-data-front">
      <div class="govco-footer-text">
        <div class="row govco-nombre-entidad">
          <div class="col-xs-12 col-lg-6">
            <p class="govco-text-header-1">Sede electrónica de Palmira</p>
          </div>
          <div class="col-xs-12 col-lg-5 govco-logo-div-a">
            <span class="govco-logo-entidad"></span>
          </div>
        </div>

        <div class="row col-xs-12 col-lg-7 govco-texto-sedes">
          <p class="govco-text-header-2">Sede principal</p>
          <p>NIT:&nbsp;891.380.007-3 <br>
            Direcci&oacute;n:&nbsp;Calle 30 con carrera 29, esquina. <br class="govco-mostrar">
            Valle del Cauca, Palmira. <br>
            C&oacute;digo Postal:&nbsp;763533 <br>
            Horario de atenci&oacute;n CIAC: <br> De lunes a viernes de 8:00 a.m. a 12:00 m. y de 2:00 a&nbsp;4:00 p.m. <br>
            l&iacute;nea de atenci&oacute;n al ciudadano y anticorrupci&oacute;n:&nbsp;+57 (602) 285 6121 <br>
            <br>Correo institucional: <br> <a href="mailto:atencionalciudadano@palmira.gov.co">atencionalciudadano@palmira.gov.co</a><br><a href="mailto:ventanillaunica@palmira.gov.co">ventanillaunica@palmira.gov.co</a>&nbsp; &nbsp;
          </p><br class="govco-mostrar">
          <p>Correo de notificaciones: <br> <a href="mailto:ventanillaunica@palmira.gov.co" target="_blank"></a><a href="mailto:notificaciones.judiciales@palmira.gov.co" target="_blank">notificaciones.judiciales@palmira.gov.co</a></p>
        </div>

        <div class="row col-xs-12 col-lg-7 govco-network">
          <div class="govco-iconContainer">
            <a href="https://www.facebook.com/alcaldiadepalmira/" target="_blank"><span class="icon govco-facebook-square"></span>
              <span class="govco-link-modal">@alcaldiapalmira</span></a>
          </div>
          <div class="govco-iconContainer">
            <a href="https://www.instagram.com/alcaldiapalmira/?hl=es-la" target="_blank"><span class="icon govco-instagram-square"></span>
              <span class="govco-link-modal">@alcaldiapalmira</span></a>
          </div>
          <div class="govco-iconContainer">
            <a href="https://wa.me/5728912312" target="_blank"><span class="icon govco-twitter-square"></span>
              <span class="govco-link-modal">@alcaldiapalmira</span></a>
          </div>
        </div>

        <div class="row govco-links-container">
          <div class="govco-link-container mt-2">
            <a class="govco-link-modal govco-link-modal-bold" href="https://palmira.gov.co/politicas-de-privacidad-y-condiciones-de-uso/" target="_blank">Políticas</a>
            <a class="govco-link-modal govco-link-modal-bold" href="https://tramites.palmira.gov.co/mapa-del-sitio" target="_blank">Mapa del sitio</a>
          </div>
          <div class="govco-link-container mt-2">
            <a class="govco-link-modal govco-link-modal-bold" href="https://palmira.gov.co/transparencia/" target="_blank">Transparencia a la informaci&oacute;n</a> <br>
          </div>
          <!-- <div class="govco-link-container mt-2">
            <a class="govco-link-modal govco-link-modal-bold" href="#">Accesibilidad</a>
          </div> -->
        </div>
      </div>
    </div>

    <div class="govco-footer-logo">
      <div class="govco-logo-container">
        <span class="govco-co"></span>
        <span class="govco-separator"></span>
        <span class="govco-logo"></span>
      </div>
    </div>
  </div>

  <!-- Volver arriba -->
  <!-- Usar Bootstrap 5 -->
  <div class="col-md-5"></div>
  <div class="col-md-2 mt-5">
    <button class="volver-arriba-govco ml-5" aria-describedby="descripcionId" aria-label="Botón volver arriba">
    </button>
    <span class="d-none" id="descripcionId"> Seleccione esta opción como atajo para volver al inicio de esta página. </span>
  </div>
  <div class="col-md-5"></div>

  <!-- Js traductor -->
  <script type="text/javascript">
    window.gtranslateSettings = window.gtranslateSettings || {};
    window.gtranslateSettings["43217984"] = {
      default_language: "e", // idioma por defecto
      languages: [
        "en",
        "ja",
        "fr",
        "de",
        "iw",
        "it",
        "sv",
        "es",
      ], // Selector de lenguaje
      wrapper_selector: "#idioma", // elemento seleccionado
      native_language_names: 1, // Establecer que todos los idiomas sean el idioma nativo desde el principio
      flag_style: "2d", // estilo de bandera
      flag_size: 24, // tamaño de la bandera
      horizontal_position: "inline", // posición horizontal
      flags_location: "flags\/", // Ubicación de la bandera
    };
  </script>

  <script src="js/gt.min.js" data-gt-widget-id="43217984"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/tramites.js"></script>
  <script src="js/login.js"></script>
  <script src="js/buscador.js"></script>
  <script src="js/entradas-de-texto.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- pace js -->
  <script src="assets/js/pace.min.js"></script>
  <!-- password addon init -->
  <script src="assets/js/pass-addon.init.js"></script>
  <!--TODO: Script para cargar la API de Google Sign-In de manera asíncrona -->
  <script src="https://accounts.google.com/gsi/client" async></script>

  <script type="text/javascript" src="acceso.js"></script>

</body>

</html>