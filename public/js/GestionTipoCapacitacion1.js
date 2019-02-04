$(document).ready(function()
{
          mostrarTC();
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarTC(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        descripcion: $('#descTC').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'tipocapacitacion', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            
          
            mostrarTC();      
            limpiarTC();
        },
        complete: function () {     
           
        }
    });  
}

/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarTC(){
    $.get('listarTC', function (data) {   //Ruta de listar
        $("#tablaTC").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarTC(item); // carga los datos en la tabla
        });      
    });
}

function eliminarTC(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'tipocapacitacion/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarTC(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarTC(id){ 
    //alert(id);
    $.get('actualizarTC/'+id,function(data){
        
        $('#idtipoC1').val(data.id);
        $('#descTCap').val(data.descripcion);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateTC(){ 
   var FrmData = {
        idtipoC: $('#idtipoC1').val(),
        descripcion: $('#descTCap').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'tipocapacitacion/'+ $('#idtipoC').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarTC(); 
            limpiarTC();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarTC(){
    $('#descTC').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarTC(data){
 
    $("#tablaTC").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcion +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarTC' onClick='actualizarTC("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarTC("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}

$( "#B_TC" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarTC/'+$('#B_TC').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaTC').html('');
              $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
              $("#tablaTC").append(
                      "<tr id='"+item.id+"'>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarTC' onClick='actualizarTC("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarTC("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});







