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
    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-sm-4">
                <form>
                    <h1>Calculadora</h1>
                    <div id="result">
                    </div>
                    <form id="calc">
                        <div class="radio">
                            <label class="radio-inline"><input type="radio" id="suma" name="typeOp"
                                    value="suma">Suma</label>
                            <label class="radio-inline"><input type="radio" id="resta" name="typeOp"
                                    value="resta">Resta</label>
                            <label class="radio-inline"><input type="radio" id="multip" name="typeOp"
                                    value="multip">Multiplicacion</label>
                            <label class="radio-inline"><input type="radio" id="divic" name="typeOp"
                                    value="divic">Division</label>
                        </div>
                        <div class="form-group">
                            <label for="numero1">Numero 1:</label>
                            <input class="form-control" type="number" name="numero1" id="numero1">
                        </div>
                        <div class="form-group">
                            <label for="numero2">Numero 2:</label>
                            <input class="form-control" type="number" name="numero2" id="numero2">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="button" onclick="operaciones()">Calcular</button>
                        </div>
                    </form>
                </form>
            </div>
            <div class="col-sm-8">
                <h1>Registro</h1>
                <span class="msg-data"></span>
                <form id="form2" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">

                    </div>
                    <div class="form-group">
                        <label for="apaterno">Apellido Paterno:</label>
                        <input type="text" class="form-control" id="apaterno" name="apaterno">
                    </div>
                    <div class="form-group">
                        <label for="amaterno">Apellido Materno:</label>
                        <input type="text" class="form-control" id="amaterno" name="amaterno">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd2">Repetir contraseña:</label>
                        <input type="password" class="form-control" id="pwd2" name="pwd2">
                    </div>
                    <button type="submit" class="btn btn-default" id="save">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#save').click(function(e) {
        e.preventDefault()
        $.ajax({
            url: "<?php echo base_url('Practica/registrar')?>",
            method: "POST",
            data: $("#form2").serialize(),
            success: function(data) {
                var resp = JSON.parse(data)
                if (resp.success == false) {
                    $("#msg-data").html(resp.message)
                    limpiarFormAdd()
                } else {
                    console.log("entra")
                    $.cach(resp.message, function(key, value) {
                        var element = $('#' + key)
                        alert(element)
                        element.closest('div.form-group')
                            .removeClass('has-error')
                            .addClass(value.lengh > 0 ? 'has-error' : 'has-success')
                            .find('.text text-dager')
                            .remove()
                        element.after(value)
                    })
                }
            }
        });
    })
})

function limpiarFormAdd() {
    setTimeout(() => {
        $('#msg-date').hide('allow')
    }, 2000);
    $('#form2')[0].reset()
}

function operaciones() {
    var n1 = parseInt(document.getElementById('numero1').value)
    var n2 = parseInt(document.getElementById('numero2').value)
    var result = 0
    var mostrar = false

    if (document.getElementById('suma').checked) {
        result = n1 + n2
        mostrar = true
    } else if (document.getElementById('resta').checked) {
        result = n1 - n2
        mostrar = true
    } else if (document.getElementById('multip').checked) {
        result = n1 * n2
        mostrar = true
    } else if (document.getElementById('divic').checked) {
        result = n1 / n2
        mostrar = true
    } else {
        alert('Selecciona una opcion')
    }

    if (mostrar) {
        document.getElementById('result').innerHTML = '<div class="alert alert-success"><strong>Resultado</strong> ' +
            result + ' </div>'
        document.getElementById('calc').reset();
        setTimeout(() => {
            document.getElementById('result').innerHTML = ''
        }, 3000);
    }
}
</script>