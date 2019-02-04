$(document).ready(function()
{
          mostrarMarcacion();
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarMarcacion(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        persona_id: $('#personaIdMar').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'marcacion', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            mostrarMarcacion();      
            limpiarMarcacion();
        },
        complete: function () {     
           
        }
    });  
}


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarMarcacion(){
    $.get('listarMarcacion', function (data) {   //Ruta de listar
        $("#tablaMarcacion").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarMarcacion(item); // carga los datos en la tabla
        });      
    });
}

function eliminarMarcacion(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'marcacion/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarMarcacion(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarMarcacion(id){ 
    //alert(id);
    $.get('actualizarMarcacion/'+id,function(data){
        
        $('#idMarcacion1').val(data.id);
        $('#persona_idMarcacion').val(data.persona.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateMarcacion(){ 
   var FrmData = {
        idMarcacion: $('#idMarcacion1').val(),
        persona_id: $('#persona_idMarcacion').val(),

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'marcacion/'+ $('#idMarcacion').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarMarcacion(); 
            limpiarMarcacion();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarMarcacion(){

}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarMarcacion(data){
 
    $("#tablaMarcacion").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.persona.cedula+"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarMarcacion' onClick='actualizarMarcacion("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarMarcacion("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}









