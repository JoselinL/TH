$(document).ready(function()
{
          mostrarCapacitacion($('#idusuarioC').val());
 });

/*FUNCION PARA INGRESAR LOS USUARIOS*/
$('#form_cap').on('submit',function(e){
 
    e.preventDefault();

    var FrmData = new FormData(this);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'capacitacion', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            
          
            mostrarCapacitacion();      
            limpiarCapacitacion();
        },
        complete: function () {     
           
        }
    });  
});


// function ingresarCapacitacion(){ 
//     //Datos que se envian a la ruta
//     var FrmData = {
//         descripcion: $('#descripcionCap').val(),
//         documento: $('#documentoCap').val(),
//         fechaInicio: $('#fechaIniCap').val(),
//         fechaFin: $('#fechaFiniCap').val(),
//         tipoCapacitacion_id: $('#tipcapId').val(),
//         user_id: $('#idusuarioC').val(),
//     }
    
//     


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarCapacitacion(id){
    $.get('listarCapacitacion/'+id, function (data) {   //Ruta de listar
        $("#tablaCapacitacion").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarCapacitacion(item); // carga los datos en la tabla
        });      
    });
}


function eliminarCapacitacion(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'capacitacion/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarCapacitacion($('#idusuarioH').val()); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarCapacitacion(id){ 
    //alert(id);
    $.get('actualizarCapacitacion/'+id,function(data){
        
        $('#idCapacitacion1').val(data.id);
        $('#descCapacitacion').val(data.descripcion);
        $('#docCapacitacion').val(data.documento);
        $('#fecIniCapacitacion').val(data.fechaInicio);
        $('#fechFinCapacitacion').val(data.fechaFin);
        $('#tipoCapa_id').val(data.tipocapacitacion.id);
        $('#idusuarioH').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateCapacitacion(){ 
   var FrmData = {
        idCapacitacion: $('#idCapacitacion1').val(),
        descripcion: $('#descCapacitacion').val(),
        documento: $('#docCapacitacion').val(),
        fechaInicio: $('#fecIniCapacitacion').val(),
        fechaFin: $('#fechFinCapacitacion').val(),
        tipoCapacitacion_id: $('#tipoCapa_id').val(),
        user_id: $('#idusuarioH').val(),

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'capacitacion/'+ $('#idCapacitacion').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarCapacitacion($('#idusuarioH').val()); 
            limpiarCapacitacion();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarCapacitacion(){
    $('#descripcionCap').val('');
    $('#documentoCap').val('');
    $('#fechaIniCap').val('');
    $('#fechaFiniCap').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarCapacitacion(data){
 
    $("#tablaCapacitacion").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.documento +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.tipocapacitacion.descripcion +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarCapacitacion' onClick='actualizarCapacitacion("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarCapacitacion("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}

$( "#B_Capacitacion" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarCapacitacion/'+$('#B_Capacitacion').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaCapacitacion').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaCapacitacion").append(
                      "<tr id='"+item.id+"'>"+
                      "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.documento+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.tipocapacitacion.descripcion+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarCapacitacion' onClick='actualizarCapacitacion("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarCapacitacion("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});







