<!-- MAIN PANEL -->
<div class="main-panel">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
            <div class="ripple-container"></div>
          </button>
        </div>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div id="navbar-collapse" class="collapse navbar-collapse justify-content-end">
          <form class="navbar-form" style="display: none;">
            <span class="bmd-form-group"><div class="input-group no-border">
              <input type="text" value="" class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div></span>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?=BASE_URL?>medico/listagem">
                <i class="material-icons">dashboard</i>
                <p class="d-lg-none d-md-block">
                  Listagem dos Médicos
                </p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- FIM NAVBAR -->