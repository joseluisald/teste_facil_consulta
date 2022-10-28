<!-- SIDEBAR -->
<div class="sidebar" data-background-color="black" data-image="" data-color="rose">
  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="<?=BASE_URL?>medico/listagem" class="logo-mini">
        <img src="<?=BASE_URL?>assets/img/FC_logo_branco.png">
      </a>
      <a href="<?=BASE_URL?>medico/listagem" class="simple-text logo-normal">
        Fácil Consulta
      </a>
    </div>
    <ul class="nav">    
      <li class="nav-item ">
        <a class="nav-link collapsed" data-toggle="collapse" href="#lancamentosMenu" aria-expanded="false">
          <i class="material-icons">perm_contact_calendar</i>
          <p> Médicos
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="lancamentosMenu" style="">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="<?=BASE_URL?>medico/cadastro">
                <span class="sidebar-mini"> CA </span>
                <span class="sidebar-normal"> Cadastro </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?=BASE_URL?>medico/listagem">
                <span class="sidebar-mini"> Li </span>
                <span class="sidebar-normal"> Listagem </span>
              </a>
            </li>
          </ul>
        </div>
      </li>      
    </ul> 
  </div>
</div>
<!-- FIM SIDEBAR -->