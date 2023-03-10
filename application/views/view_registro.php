<div class="jumbotron text-center">
	<h1>Lista de registro</h1>
</div>
<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Correo</th>
        <th><center>Acciones</center></th>
      </tr>
    </thead>
    <tbody>
        <?php if($this->session->flashdata('success')){ ?>
          <div class="alert alert-success">
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
          </div>
        <?php } ?>
        <?php foreach($preregistros as $row) { ?>
            <tr>
                <td><?php echo $row['id_preregistro']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apaterno']; ?></td>
                <td><?php echo $row['amaterno']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Acciones
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('welcome/actualizar').'/'.$row['id_preregistro']; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                      <li><a href="<?php echo base_url('welcome/eliminar').'/'.$row['id_preregistro']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
                    </ul>
                  </div>
								</td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
