$(document).ready(function()
{
          mostrarMarcacion($('#idusuarioM').val());
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarMarcacion(documentom){ 
    //Datos que se envian a la ruta
    var FrmData = {
        registro: documentom,
        user_id: $('#idusuarioM').val(),
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
function mostrarMarcacion(id){
    $.get('listarMarcacion/'+id, function (data) {   //Ruta de listar
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
           mostrarMarcacion($('#idusuarioM').val()); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarMarcacion(id){ 
    //alert(id);
    $.get('actualizarMarcacion/'+id,function(data){
        
        $('#idMarcacion1').val(data.id);
        $('#regisID').val(data.registro);
        $('#idusuarioM').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateMarcacion(){ 
   var FrmData = {
        idMarcacion: $('#idMarcacion1').val(),
        registro: $('#regisID').val(),
        user_id: $('#idusuarioM').val(),

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
            mostrarMarcacion($('#idusuarioM').val());
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
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td class='row'><button type='button' class='btn btn-info' id='btn-confirm' ><a href='"+data.registro+"'><i class='fa fa-download'></i></a></button></td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarMarcacion' onClick='actualizarMarcacion("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarMarcacion("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}



//Subida de archivos
$("#form_Marcacion").submit(function(e){ // este metodo es para el submit de un formulario donde tengas                                     // el input de tipo file # form_enviarFile es el nombre de eese formulario
    e.preventDefault();   // evitamos que se recargue la pagina al ejecutar el formulario
    
    $.ajaxSetup({
        headers: { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST", // la ruta tiene que ser port // define una ruta post
        url: 'guardarMarcacion',  // en este caso la ruta es esta
        // data: e.serialize(),
        data: new FormData(this), // como dato enviamos el contenido del formulario creando un objeto del mismo
        contentType: false,  // no se pa q es esto xd
        cache: false, // tampoco se
        processData: false, // ni idea
        
        success: function (data) { // eso si quiers omitelo
           ingresarMarcacion(data);
        },
            

    }); 
});





