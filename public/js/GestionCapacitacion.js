$(document).ready(function()
{
          mostrarCapacitacion($('#idusuarioC').val());
 });

/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarCapacitacion(documentof){ 
    //Datos que se envian a la ruta
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        descripcion: $('#descripcionCap').val(),
        documento: documentof,
        fechaInicio: $('#fechaIniCap').val(),
        fechaFin: $('#fechaFiniCap').val(),
        tipoCapacitacion_id: $('#tipcapId').val(),
        user_id: $('#idusuarioC').val(),
        
    }

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
} ;


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
        $('#fecIniCapacitacion').val(data.fechaInicio);
        $('#fechFinCapacitacion').val(data.fechaFin);
        $('#tipoCapa_id').val(data.tipocapacitacion.id);
        $('#idusuarioH').val(data.usuario.id);
        $('#docCapacitacion').val(data.documento);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateCapacitacion(){ 
   var FrmData = {
        idCapacitacion: $('#idCapacitacion1').val(),
        descripcion: $('#descCapacitacion').val(),
        fechaInicio: $('#fecIniCapacitacion').val(),
        fechaFin: $('#fechFinCapacitacion').val(),
        tipoCapacitacion_id: $('#tipoCapa_id').val(),
        user_id: $('#idusuarioH').val(),
        documento: $('#docCapacitacion').val(),

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
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.tipocapacitacion.descripcion+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarCapacitacion' onClick='actualizarCapacitacion("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarCapacitacion("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});


//Subida de archivos
$("#form_Documento").submit(function(e){ // este metodo es para el submit de un formulario donde tengas                                     // el input de tipo file # form_enviarFile es el nombre de eese formulario
    e.preventDefault();   // evitamos que se recargue la pagina al ejecutar el formulario
    
    $.ajaxSetup({
        headers: { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST", // la ruta tiene que ser port // define una ruta post
        url: 'guardarDocumento',  // en este caso la ruta es esta
        // data: e.serialize(),
        data: new FormData(this), // como dato enviamos el contenido del formulario creando un objeto del mismo
        contentType: false,  // no se pa q es esto xd
        cache: false, // tampoco se
        processData: false, // ni idea
        
        success: function (data) { // eso si quiers omitelo
           ingresarCapacitacion(data);
        },
            

    }); 
});






