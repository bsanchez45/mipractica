<div class="container">
    <h2>Hover Rows</h2>
    <p>The .table-hover class enables a hover state on table rows:</p>
    <button type="button" class="btn btn-info btn-ms" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="perfil">Nombre del perfil:</label>
                        <input type="text" class="form-control" id="perfil" name="perfil">
                        <input type="hidden" class="form-control" id="id_perfil" name="id_perfil">
                    </div>
                    <button type="submit" class="btn btn-default" id="save">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#save').click(function(e){
            e.preventDefault()
            $.ajax({
                url: "<?php echo base_url('Perfiles/registrar')?>",
                method: "POST",
                data: $("form").serialize(),
                cache: false,
                dataType: 'json',
                success: function($data){
                    alert($data)
                    $("#myModal").modal("toggle")
                    $("form")[0].reset()
                }
            });
        });
    });

    $(document).ready( function () {
        $('#myTable').DataTable({
            ajax: {
                url: "<?php echo base_url('Perfiles/listar')?>",
                dataSrc: ''
            },
            columns: [
                { data: "id_rol" },
                { data: "nombre" },
                { 
                    data: "id_rol",
                    render: function(data){
                    //console.log(data)
                    return '<button type="button" class="btn btn-primary update" id="'+data+'"><span class="glyphicon glyphicon-pencil"></span> Editar</button> <button type="button" class="btn btn-danger delete" id="'+data+'"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>'
                }}
            ]
        });
    } );

    $(document).on('click', '.update',function(){
        //alert($(this).attr('id'))
        var idFront = $(this).attr('id')
        $.ajax({
            url: "<?php echo base_url('Perfiles/actualizar')?>",
            method: "POST",
            data: {idBack: idFront},
            cache: false,
            dataType: 'json',
            success: function(data){
                $("#myModal").modal("show")
                $('#perfil').val(data.nombre)
                $('#id_perfil').val(data.id_rol)
            }
        });
    })
</script>