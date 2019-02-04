$(document).ready(function()
{
          mostrarVacacion($('#idusuario1').val());
          //mostrarDisponibilidad($('#idusuario1').val());
          
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarVacacion(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        descripcion: $('#descripcionVac').val(),
        fechaInicio: $('#fechaIniVac').val(),
        fechaFin: $('#fechaFiniVac').val(),
        fechaAprobacionJefe: $('#fechaAproJefeVac').val(),
        fechaAprobacionTTHH: $('#fechaAproTTHHVac').val(),
        estado: $('#estadoVac').val(),
        persona_id: $('#persIdVac').val(),
        user_id: $('#idusuario1').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vacaciones', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            
          
            mostrarVacacion();      
            limpiarVacacion();
            mostrarVacacion($('#idusuario1').val());
        },
        complete: function () {     
           
        }
    });  
}


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarVacacion(id){
    $.get('listarVacacion/'+id, function (data) {   //Ruta de listar
        $("#tablaVacacion").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarVacacion(item); // carga los datos en la tabla
        });      
    });
}

function eliminarVacacion(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'vacaciones/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarVacacion($('#idusuario1').val()); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarVacacion(id){ 
    //alert(id);
    $.get('actualizarVacacion/'+id,function(data){
        
        $('#idVacacion1').val(data.id);
        $('#descVacacion').val(data.descripcion);
        $('#fecIniVacacion').val(data.fechaInicio);
        $('#fechFinVacacion').val(data.fechaFin);
        $('#fechAprobJefeVacacion').val(data.fechaAprobacionJefe);
        $('#fechAprobTTHHVacacion').val(data.fechaAprobacionTTHH);
        $('#estadoVacacion').val(data.estado);
        $('#idusuario1').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateVacacion(){ 
   var FrmData = {
        idVacacion: $('#idVacacion1').val(),
        descripcion: $('#descVacacion').val(),
        fechaInicio: $('#fecIniVacacion').val(),
        fechaFin: $('#fechFinVacacion').val(),
        fechaAprobacionJefe: $('#fechAprobJefeVacacion').val(),
        fechaAprobacionTTHH: $('#fechAprobTTHHVacacion').val(),
        estado: $('#estadoVacacion').val(),
        user_id: $('#idusuario1').val(),

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vacaciones/'+ $('#idVacacion').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarVacacion($('#idusuario1').val()); 
            limpiarVacacion();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarVacacion(){
    $('#descripcionVac').val('');
    $('#fechaIniVac').val('');
    $('#fechaFiniVac').val('');
    $('#fechaAproJefeVac').val('');
    $('#fechaAproTTHHVac').val('');
    $('#estadoVac').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarVacacion(data){
 
    $("#tablaVacacion").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVacacion' onClick='actualizarVacacion("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVacacion("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}

$( "#B_Vacacion" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarVacacion/'+$('#B_Vacacion').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaVacacion').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaVacacion").append(
                      "<tr id='"+item.id+"'>"+
                      "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVacacion' onClick='actualizarVacacion("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVacacion("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});




//---------------MODAL DISPONIBILIDAD

    function mostrarDisponibilidad(id){
        $('#agregardisponibilidad').modal('show');
        $('#idusuario1').val(id);
        cargarDisponibilidad(id);
    }
         

    function cargarDisponibilidad(id){
        
        $.get('listarVP/'+id, function (data) { 
             $('#tablaD').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaD').append(
                    '<tr>'+
                        '<td>'+item.vacacion.usuario.nombres+' '+item.vacacion.usuario.apellidos+'</td>'+
                        '<td >'+item.periodo.fechaInicio+"-"+ item.periodo.fechaFin +'</td>'+
                        '<td>'+item.cantidad+'</td>'
                );
         });
        }); 
    }

 