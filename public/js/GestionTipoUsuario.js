$(document).ready(function()
{
          mostrarTU();
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarTU(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        tipo: $('#tipoTU').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'tipousuario', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            
          
            mostrarTU();      
            limpiarTU();
        },
        complete: function () {     
           
        }
    });  
}

/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarTU(){
    $.get('listarTU', function (data) {   //Ruta de listar
        $("#tablaTU").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarTU(item); // carga los datos en la tabla
        });      
    });
}

function eliminarTU(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'tipousuario/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarTU(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarTU(id){ 
    //alert(id);
    $.get('actualizarTU/'+id,function(data){
        
        $('#idtipoU1').val(data.id);
        $('#tipoTUsu').val(data.tipo);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateTU(){ 
   var FrmData = {
        idtipoU: $('#idtipoU1').val(),
        tipo: $('#tipoTUsu').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'tipousuario/'+ $('#idtipoU').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarTU(); 
            limpiarTU();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarTU(){
    $('#tipoTU').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarTU(data){
 
    $("#tablaTU").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.tipo +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarTU' onClick='actualizarTU("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarTU("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}








