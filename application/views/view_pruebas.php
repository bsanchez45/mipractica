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
    <div class="container">
        <h1>practica</h1>
        <div id="result">

        </div>
        <form id="calc">
            <div class="radio">
                <label class="radio-inline"><input type="radio" id="suma" name="typeOp" value="suma">Suma</label>
                <label class="radio-inline"><input type="radio" id="resta" name="typeOp" value="resta">Resta</label>
                <label class="radio-inline"><input type="radio" id="multip" name="typeOp"
                        value="multip">Multiplicacion</label>
                <label class="radio-inline"><input type="radio" id="divic" name="typeOp" value="divic">Division</label>
            </div>
            <label for="numero1">Numero 1:</label>
            <input class="form-control" type="number" name="numero1" id="numero1">
            <label for="numero2">Numero 2:</label>
            <input class="form-control" type="number" name="numero2" id="numero2">
            <button class="btn btn-default" type="button" onclick="operaciones()">Calcular</button>
        </form>
    </div>
</body>

</html>
<script>
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
    }else{
        alert('Selecciona una opcion')
    }

    if(mostrar){
        document.getElementById('result').innerHTML = '<div class="alert alert-success"><strong>Resultado</strong> ' +
        result + ' </div>'
        document.getElementById('calc').reset();
        setTimeout(() => {
            document.getElementById('result').innerHTML = ''
        }, 3000);
    }
}
</script>