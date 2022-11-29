$(document).ready(function() {

    // se utiliza para mensaje al presionar cerra sesion en menu lateral
    document.getElementById('cerrarSesion').addEventListener('click', function () {
        Swal.fire({
            title: 'Realmente quiere cerrar sesión?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si',
            denyButtonText: `No`,
            icon: 'question',
            
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Hasta luego', '', 'info')
                window.location.href = "index.php?cerrar_sesion=true";
                
           
            } else if (result.isDenied) {
              Swal.fire('Continua la sesión abierta', '', 'info')
            } })
          });

    //Extrae el formulario de crear administrador y evita que se abra el action
    $('#guardar-registro').on('submit', function(e) {

        e.preventDefault();


        //obtener datos, this se refiere a la ejecución del submit. SerializeArray itera todos los 
        //campos del formulario, luego crea un objeto.
        var datos = $(this).serializeArray();

        //Llamado a AJAX con JQUERY
        $.ajax({
            type: $(this).attr('method'), //Type: POST o GET. Extrae el método del form.
            data: datos, //datos de los campos del form
            url: $(this).attr('action'), //Los datos se envian al valor de action. Al archivo PHP
            dataType: 'json', //Tipo de datos
            success: function(data) { //Cuando la llamada sea exitoso.

                var respuesta = data;
                console.log(respuesta);
                if (respuesta['mensaje'] === 'correcto') {
                    Swal.fire("Correcto!", "Se guardó correctamente.", "success");
                    $('#guardar-registro')[0].reset(); //limpia los campos del formulario.
                } else {
                    Swal.fire("Error!", respuesta['mensaje'], "error");

                }


            }

        });
    });



    //Codido que se ejecuta cuando en el form tenemos un campo de archivo
    //Por ejemplo en el form de crear un invitado.
    $('#guardar-registro-archivo').on('submit', function(e) {
        e.preventDefault();

        //obtener datos, this se refiere a la ejecución del submit. 
        var datos = new FormData(this); //Creamos una instancia de FormData.

        //Llamado a AJAX con JQUERY
        $.ajax({
            type: $(this).attr('method'), //Type: POST o GET. Extrae el método del form.
            data: datos, //datos de los campos del form
            url: $(this).attr('action'), //Los datos se envian al valor de action. Al archivo PHP
            dataType: 'json', //Tipo de datos
            //campos extras siempre y cuando se use campos archivos en el FORM
            contentType: false,
            processData: false, //Imágenes procesadas
            async: true,
            cache: false, //para que no cacheé la URL al que se envia la img
            success: function(data) { //Cuando la llamada sea exitoso.

                var respuesta = data;

                console.log(respuesta);

                if (respuesta['mensaje'] === 'correcto') {
                    Swal.fire("Correcto!", "Se guardó correctamente.", "success");
                    //$('#guardar-registro')[0].reset(); //limpia los campos del formulario.
                } else {
                    Swal.fire("Error!", respuesta['mensaje'], "error");

                }


            }

        });
    });





    //Codigo para eliminar un administrador en la BD
    /*********************************************/
    $('.borrar_registro').on('click', function(e) {

        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        //Mandamos una alerta de confirmación  para ELIMINAR el registro.
        Swal.fire({
            title: 'Estás Seguro?',
            text: "Esto no se puede deshacer!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar',
            cancelButtonText: 'No, Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            //buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {

            if (result.value) {

                //Llamado a AJAX con JQUERY.
                $.ajax({
                    type: 'post',
                    data: { //Hacemo un objeto de todos los datos que deseamos enviar.
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'eliminar-admin.php', //Arma en 
                    success: function(data) {

                        var resultado = JSON.parse(data); //Convierte el String enviado por el modelo a JSON.
                        console.log(resultado);
                        if (resultado.mensaje === 'correcto') {

                            Swal.fire("Eliminado", "Registro eliminado", "success");
                            jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove(); //Seleciona el registro del data table luego va al padre y lo elimina del DOM

                        } else {

                            Swal.fire("Error", "NO se pudo eliminar", "error");

                        }
                    }

                }); //Fin AJAX
            } else if (result.dismiss === 'cancel') {
                Swal.fire(
                    'Cancelado',
                    'No se eliminó el registro',
                    'error'
                )
            }

        });


    });
});