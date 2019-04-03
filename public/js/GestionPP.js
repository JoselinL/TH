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
        user_id: $('#personaIdPP').val(),
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
        $('#Id_PersonaPP').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updatePP(){ 
   var FrmData = {
        idPP: $('#idPP1').val(),
        cantidadDiasPeriodo: $('#CDP_PP').val(),
        periodo_id: $('#Id_PeriodoPP').val(),
        user_id: $('#Id_PersonaPP').val(),

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
         <td>"+ data.cedula+"</td>\
         <td>"+ data.nombres+" "+ data.apellidos+"</td>\
         <td>"+ data.suma+"</td>"
    );
}

$( "#B_PP" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarPP/'+$('#B_PP').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaPP').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaPP").append(
                       "<tr id='"+item.id+"'>"+
                       "<td>"+ item.cedula+"</td>"+
                       "<td>"+ item.nombres+" "+ item.apellidos+"</td>"+
                       "<td>"+ item.suma+"</td>"
                );
                
         }); 
    });
});








