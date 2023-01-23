    <div class="container">
        <?php #print_r($preregistro); ?>
        
        <h2>Actualizar Datos de Participante</h2>
        <form action="<?php echo base_url('Welcome/update') ?>" method="post">
		<div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre"  name="nombre" value="<?php echo $preregistro['nombre']; ?>">
            </div>
            <?php if($this->session->userdata('rol') == 1):?>
            <div class="form-group">
                <label for="rol">Role de usuario:</label>
                <select class="form-control" id="rol" name="rol">
                    <?php foreach($roles as $rol):?>
                    <option value="<?php echo $rol['id_rol'];?>"<?php echo ($preregistro['rol'] == $rol['id_rol'])?"selected":"";?>><?php echo $rol['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif;?>
			<div class="form-group">
                <label for="apaterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apaterno"  name="apaterno" value="<?php echo $preregistro['apaterno']; ?>">
            </div>
			<div class="form-group">
                <label for="amaterno">Apellido Materno:</label>
                <input type="text" class="form-control" id="amaterno"  name="amaterno" value="<?php echo $preregistro['amaterno']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email"  name="email" value="<?php echo $preregistro['email']; ?>">
            </div>
            <input type="hidden" name="id_preregistro" value="<?php echo $preregistro['id_preregistro']; ?>">
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>