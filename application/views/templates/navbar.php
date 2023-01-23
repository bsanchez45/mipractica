<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <?php if($this->session->userdata('rol') == 1):?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuración
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url('Registro');?>">Registrar Usuario</a></li>
          <li><a href="<?php echo base_url('Welcome/listar');?>">Lista de usuarios</a></li>
          <li><a href="<?php echo base_url('Welcome/perfil');?>">Perfil</a></li>
        </ul>
      </li>
      <?php endif;?>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('nombre');?></a></li>
      <li><a href="<?php echo base_url('Auth/logout');?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
</nav>