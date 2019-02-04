$(document).ready(function()
{
          mostrarPeriodo();
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarPeriodo(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        descripcion: $('#descPeri').val(),
        fechaInicio: $('#fechaInicioPeri').val(),
        fechaFin: $('#fechaFinPeri').val(),
        estado: $('#estadoPeri').val(),
        
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'periodo', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            
          
            mostrarPeriodo();      
            limpiarPeriodo();
        },
        complete: function () {     
           
        }
    });  
}

/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarPeriodo(){
    $.get('listarPeriodo', function (data) {   //Ruta de listar
        $("#tablaPeriodo").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPeriodo(item); // carga los datos en la tabla
        });      
    });
}

function eliminarPeriodo(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'periodo/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarPeriodo(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarPeriodo(id){ 
    //alert(id);
    $.get('actualizarPeriodo/'+id,function(data){
        
        $('#idPeriodo1').val(data.id);
        $('#descPeriodo').val(data.descripcion);
        $('#fechaInicioPeriodo').val(data.fechaInicio);
        $('#fechaFinPeriodo').val(data.fechaFin);
        $('#estadoPeriodo').val(data.estado);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updatePeriodo(){ 
   var FrmData = {
        idPeriodo: $('#idPeriodo1').val(),
        descripcion: $('#descPeriodo').val(),
        fechaInicio: $('#fechaInicioPeriodo').val(),
        fechaFin: $('#fechaFinPeriodo').val(),
        estado: $('#estadoPeriodo').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'periodo/'+ $('#idPeriodo').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarPeriodo(); 
            limpiarPeriodo();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarPeriodo(){
    $('#descPeri').val('');
    $('#fechaInicioPeri').val('');
    $('#fechaFinPeri').val('');
    $('#estadoPeri').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarPeriodo(data){
 
    $("#tablaPeriodo").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.estado +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPeriodo' onClick='actualizarPeriodo("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPeriodo("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}

$( "#B_Periodo" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarPeriodo/'+$('#B_Periodo').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaPeriodo').html('');
              $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
              $("#tablaPeriodo").append(
                      "<tr id='"+item.id+"'>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.estado+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPeriodo' onClick='actualizarPeriodo("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPeriodo("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});







