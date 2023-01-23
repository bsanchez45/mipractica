<!DOCTYPE html>
<html lang="en">

<head>
    <title>Iniciar Sesion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 15%;">
        <?php if($this->session->flashdata('warning')){ ?>
          <div class="alert alert-warning">
            <strong>Advertencia</strong><?php echo ' '.$this->session->flashdata('warning'); ?>
          </div>
        <?php }else if($this->session->flashdata('danger')){ ?>
            <div class="alert alert-danger">
                <strong>Advertencia</strong><?php echo ' '.$this->session->flashdata('danger'); ?>
            </div>
        <?php } ?>
        <h1>Inicio de sesión</h1>
        <form action="<?php echo base_url('Auth/iniciar');?>" method="POST">
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <div class="form-group">
                <a href="<?php echo base_url('Registro');?>"><span class="glyphicon glyphicon-user" style="color: black;">
                        Registrarse</span></a>
            </div>
            <button type="submit" class="btn btn-default">Entrar</button>
        </form>
    </div>
</body>
</html>