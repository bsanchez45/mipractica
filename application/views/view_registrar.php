<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="jumbotron text-center">
		<h1>Registro de Participantes <?php echo $this->session->userdata('rol');?></h1>
	</div>
	<div class="container">
        <form action="<?php echo base_url('Registro/registrar') ?>" method="post">
		<div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre"  name="nombre">
            </div>
			<div class="form-group">
                <label for="apaterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apaterno"  name="apaterno">
            </div>
			<div class="form-group">
                <label for="amaterno">Apellido Materno:</label>
                <input type="text" class="form-control" id="amaterno"  name="amaterno">
            </div>
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" class="form-control" id="email"  name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <input type="password" class="form-control" id="pwd"  name="pwd">
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
    </body>
</html>
