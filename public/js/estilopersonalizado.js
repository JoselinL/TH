function mostrarcampostecnicos(val){  
   if(val=="4"){
    $('#idextratecnico').prop('hidden',false);
     $('#idarea').prop('hidden',false);
   }else{
   	$('#idextratecnico').prop('hidden',true);
   	$('#idarea').prop('hidden',true);
   }
}