$('document').ready(function(){
    mostrarDatos();

    function mostrarDatos(){
        $.ajax({
            url:'muestrajson.php',
            type:'GET',
            success: function(respuesta){
                var datos=JSON.parse(respuesta);
                var mostrar="";
                datos.forEach(fila => {
                    mostrar=mostrar+`
                    <tr>
                        <th scope="row">${fila.dniusuario}</th>
                        <td>${fila.nombreusuario}</td>
                        <td>${fila.correousuario}</td>
                        <td>${fila.edad}</td>
                        <td>
                        <button id='${fila.dniusuario}' class='btn btn-warning btn-sm ml-3 mr-3 modificar'>📝</button>
                        <button id='${fila.dniusuario}' class='btn btn-danger btn-sm borrar'>🗑</button>
                        </td>
                    </tr>                   `
                });
                $('#contenido').html(mostrar);
            }
        });
    }
     
    $('#enviarDatos').submit(function(e){
        e.preventDefault();
        const DATOS={
            dniusuario:$('#dniusuario').val(),
            nombreusuario:$('#nombre').val(),
            correousuario:$('#correo').val(),
            edad:$('#edad').val()
        };
        $.post('guardarDatos.php',DATOS, function(respuesta){
            $('#mensajes').html(respuesta);
            mostrarDatos();
            $('#enviarDatos').trigger('reset');
            $('#btnGuardarModificar').html("Guardar datos");
            $('#dniusuario').val("");
        });
    });
    $(document).on('click','.modificar',function(){
        
       console.log("modificar");
        var dni= $(this)[0].id;
        const DATOS={
            dniusuario:dni
        };
        $.post('seleccionarRegistro.php',DATOS,function(respuesta){
           
            var datos=JSON.parse(respuesta);
            var mostrar="";
            datos.forEach(fila => {
                $('#nombre').val(fila.nombreusuario);
                $('#correo').val(fila.correousuario);
                $('#edad').val(fila.edad);
                $('#dniusuario').val(fila.dniusuario);

            });

        })
    })
$(document).on('click','.borrar', function(){
        
    Swal.fire({
        title: '¿Estás seguro de querer elimanar éste usuario?',
        text: "¡Una vez eliminado no podrás recuperarlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
// borrar registro
var dniusuario= $(this)[0].id;
        const DATOS={dniusuario
            };
            $.post('borrarDatos.php',DATOS,function(respuesta){
                $('#mensajes').html(respuesta);
                mostrarDatos();
            });
            // fin borrar
          Swal.fire(
            'Registro eliminado correctamente',
            'El registro ha sido eliminado',
            'success'
          )
        }
      }) 
    });

});
    
    
    
    
    
                