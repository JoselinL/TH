$(document).ready(function()
{
          mostrarVP($('#vacacionVP').val());
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarVP(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        cantidad: $('#cantidadVP').val(),
        vacacion_id: $('#vacacionVP').val(),
        periodo_id: $('#periodoVP').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vacacionperiodo', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            mostrarVP($('#vacacionVP').val());      
            limpiarVP();
        },
        complete: function () {     
           
        }
    });  
}


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarVP(id){
    console.log(id)
    $.get('listarVP/'+id, function (data) {   //Ruta de listar
        $("#tablaVP").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarVP(item); // carga los datos en la tabla
        });      
   });
}

function eliminarVP(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'vacacionperiodo/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarVP(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarVP(id){ 
    //alert(id);
    $.get('actualizarVP/'+id,function(data){
        
        $('#idVP1').val(data.id);
        $('#cantidada_idVP').val(data.cantidad);
        $('#Vacacion_idVP').val(data.vacacion.id);
        $('#Periodo_idVP').val(data.periodo.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateVP(){ 
   var FrmData = {
        idVP: $('#idVP1').val(),
        cantidad: $('#cantidada_idVP').val(),
        vacacion_id: $('#Vacacion_idVP').val(),
        periodo_id: $('#Periodo_idVP').val(),

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vacacionperiodo/'+ $('#idVP').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarVP(); 
            limpiarVP();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarVP(){
    $('#cantidadVP').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarVP(data){
 
    $("#tablaVP").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.cantidad+"</td>\
         <td>"+ data.vacacion.descripcion+"</td>\
         <td>"+ data.periodo.fechaInicio+" - "+ data.periodo.fechaFin+"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVP' onClick='actualizarVP("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVP("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}








