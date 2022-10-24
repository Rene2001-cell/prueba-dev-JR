<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba tecnica</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <button type="button" onclick="getContactos();">Contactos</button>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nº Contacto</th>
                    <th>Apellido</th>
                    <th>Fecha de creacion</th>
                </tr>
            </thead>
            <tbody id="contactosTabla">

            </tbody>
        </table>
    </div>
</body>
<script>
    function getContactos(){
        var ruta = 'ENRUTADOR/Rutas.php?ruta=contactos';
        $.ajax({
            url:ruta,
            type:'GET',
        }).done(function(response){
            var contacts=JSON.parse(response);

            if(!contacts.success)
            {
                alert(contacts.mensajeS);
            }else{
                var htmlTablaBody = '';
                var data = contacts.data;
                for (var index = 0; index < data.length; index++) {
                    htmlTablaBody += '<tr><th>'+data[index].id+'</th><th>'+data[index].contact_no+'</th><th>'+data[index].lastname+'</th><th>'+data[index].createdtime+'</th></tr>'
                }
                $('#contactosTabla').html(htmlTablaBody);
            }
        }).fail(function() {
            alert( "Ocurrio un error al consultar los contactos" );
        });

    }
</script>
</html>