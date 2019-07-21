$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // aqui no va nada xD
        },
        submitSuccess: function($form, event) {
            event.preventDefault();
            // Obtiene los valores enviados desde el formulario
            var idPermiso = $("input#idPermiso").val();
            var desPermiso = $("input#desPermiso").val();          
            var firstCharacter = desPermiso; 
            
            if (firstCharacter.indexOf(' ') >= 0) {
                firstCharacter = desPermiso.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "./bin/Permisos.php",
                type: "POST",
                data: {idPermiso: idPermiso,desPermiso: desPermiso   },
                cache: false,
                success: function() {
                    //alert(d); //Sirve para mostrar la devolución de los datos (ERRORES)
                    // Mensaje Satisfactorio
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
                    $('#success > .alert-success').append("<strong>Permiso Creado </strong>");
                    $('#success > .alert-success').append('</div>');

                    // Limpia todos los campos
                    $('#permisoForm').trigger("reset");
                },
                error: function() {
                    // Mensaje de Error
                    //alert(d);
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
                    $('#success > .alert-danger').append("<strong>Error.</strong> El Permiso <strong>" + firstCharacter + "</strong> no ha sido creado. Confirme los datos y vuelva a intentarlo.");
                    $('#success > .alert-danger').append('</div>');

                    // Limpia todos los campos
                    $('#permisoForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


// Cuando dan click en cualquier parte del formulario, desaparece el mensaje.
$('#idPermiso').focus(function() {
    $('#success').html('');
});
