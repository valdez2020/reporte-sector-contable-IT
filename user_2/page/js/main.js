//Implementación de Jquery para la obtención de datos entregados por el formulario
$(document).ready(function() {
    var valorCampoAnio;
    var valorCampoMes;

       
        $("#btnBuscar").click(function() {
            // Obtener valores de los campos del formulario
             valorCampoAnio = $("#input-anio").val();
             valorCampoMes = $("#input-mes").val();

            // Validar que los campos sean numéricos
            if ($.isNumeric(valorCampoAnio) && $.isNumeric(valorCampoMes)) {
                    if((valorCampoAnio > 0) && (valorCampoAnio <= 2024) && (valorCampoMes > 0) &&(valorCampoMes <= 12)){
                        console.log(valorCampoAnio + " año ")
                        console.log(valorCampoMes + " mes")
                        // Hacer la solicitud AJAX al backend (PHP)
                        $.ajax({
                            type:'POST',
                            url: "../page/controllers/usuariosController.php",
                            async:true,
                            data: {
                                anio: valorCampoAnio,
                                mes: valorCampoMes
                            },
                            success: function(data) {
                                console.log(data);
                            },
                            error: function(error) {
                                console.error("Error en la solicitud AJAX:", error.status);
                            }
                        });
                    } else { 
                        alert("Por favor, ingresa valores numéricos válidos en ambos campos.");
                    }
            $("#mensaje-csv").css({"visibility":"visible"});
            } else {
                alert("Por favor, ingresa valores numéricos válidos en ambos campos.");
            }
        
            //funcion para mostrar la tabla
        })


});