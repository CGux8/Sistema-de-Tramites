<div class="vertical-menu">
  <div data-simplebar="" class="h-100">

    <div id="sidebar-menu">

      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" data-key="t-menu">Menu</li>

        <?php
        if ($_SESSION["rol_id"] == 1) {
        ?>
          <li>
            <a href="../../index.php">
              <i data-feather="home"></i>
              <span data-key="t-dashboard">Inicio</span>
            </a>
          </li>

          <li>
            <a href="../NuevoTramite/inhumacion.php">
              <i data-feather="grid"></i>
              <span data-key="t-apps">Gestionar Trámites</span>
            </a>
          </li>

          <li>
            <a href="../ConsultarTramite/">
              <i data-feather="users"></i>
              <span data-key="t-authentication">Consultar Trámites</span>
            </a>
          </li>

        <?php
        } elseif ($_SESSION["rol_id"] == 2) {
        ?>
          <li>
            <a href="../homecolaborador/">
              <i data-feather="home"></i>
              <span data-key="t-dashboard">Inicio Colaborador</span>
            </a>
          </li>

          <li>
            <a href="../gestionartramite/">
              <i data-feather="grid"></i>
              <span data-key="t-apps">Gestionar Trámites</span>
            </a>
          </li>

          <li>
            <a href="../buscartramite/">
              <i data-feather="users"></i>
              <span data-key="t-authentication">Buscar Trámites</span>
            </a>
          </li>

        <?php
        } elseif ($_SESSION["rol_id"] == 3) {
        ?>
          
          <li>
            <a href="../mntusuario/">
              <i data-feather="users"></i>
              <span data-key="t-apps">Mantenimiento Usuario</span>
            </a>
          </li>

          <li>
            <a href="../mntarea/">
              <i data-feather="grid"></i>
              <span data-key="t-authentication">Mantenimiento Area</span>
            </a>
          </li>

        <?php
        }
        ?>


      </ul>
    </div>
  </div>
</div>