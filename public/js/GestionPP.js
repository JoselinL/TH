$(document).ready(function()
{
          mostrarPP();
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarPP(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        cantidadDiasPeriodo: $('#cantDiasPeriPP').val(),
        periodo_id: $('#periodoIDPP').val(),
        persona_id: $('#personaIdPP').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'periodopersona', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            mostrarPP();      
            limpiarPP();
        },
        complete: function () {     
           
        }
    });  
}


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarPP(){
    $.get('listarPP', function (data) {   //Ruta de listar
        $("#tablaPP").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPP(item); // carga los datos en la tabla
        });      
    });
}

function eliminarPP(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'periodopersona/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarPP(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarPP(id){ 
    //alert(id);
    $.get('actualizarPP/'+id,function(data){
        
        $('#idPP1').val(data.id);
        $('#CDP_PP').val(data.cantidadDiasPeriodo);
        $('#Id_PeriodoPP').val(data.periodo.id);
        $('#Id_PersonaPP').val(data.persona.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updatePP(){ 
   var FrmData = {
        idPP: $('#idPP1').val(),
        cantidadDiasPeriodo: $('#CDP_PP').val(),
        periodo_id: $('#Id_PeriodoPP').val(),
        persona_id: $('#Id_PersonaPP').val(),

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'periodopersona/'+ $('#idPP').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarPP(); 
            limpiarPP();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarPP(){
    $('#cantDiasPeriPP').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarPP(data){
 
    $("#tablaPP").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.cantidadDiasPeriodo+"</td>\
         <td>"+ data.periodo.fechaInicio+" - "+ data.periodo.fechaFin+"</td>\
         <td>"+ data.persona.cedula+"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPP' onClick='actualizarPP("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPP("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}









