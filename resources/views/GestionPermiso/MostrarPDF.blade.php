<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<table class="table table-bordered" style="margin: 0 auto;" border="2px"solid;>
	<tr>
	 <th colspan="5"><img src="municipio.jpg" width="400px" height="80px"/></th>
	 <th id="gris" colspan="20" style="font-size:160%;"align="center"><u>PERMISO DE SALIDA</u></th>
  	</tr>

  	<tr>
	 <th id="gris" colspan="5" style="font-size:80%;" align="center">SUB-DIRECCIÓN DE TECNOLOGIAS DE LA INFORMACIÓN</th> 
	 <th id="gris" colspan="20" style="font-size:80%;" align="center">DIRECCIÓN DE TELENTO HUMANO</th> 
  	</tr>	

    
    @foreach ($consultapermiso as $c)

  	<tr>
	 <th id="gris" colspan="3" style="font-size:80%;" align="center">NOMBRE DEL SERVIDOR</th> 
	 <td colspan="2" style="font-size:80%;" align="center"><?php echo $c->nombres.' '.$c->apellidos ?></td>
	 <th id="gris" colspan="5" style="font-size:80%;" align="center">C.C.</th> 
	 <td colspan="15" style="font-size:80%;" align="center">{{$c->cedula}}</td>
  	</tr>
  	

	<tr>
	 <th id="gris" colspan="5" style="font-size:80%;" align="center">TIEMPO</th> 
	
	 <th id="gris" colspan="5" style="font-size:80%;" align="center">RAZÓN:</th> 
	 <td colspan="15" style="font-size:80%;" align="center">{{$c->catalogo}}</td>
  	</tr>


  	<tr>
		 <th id="gris" colspan="3" style="font-size:80%;" align="center">DÍAS:</th> 
		 <td colspan="2" style="font-size:80%;" align="center">
		 	<?php
 			 $dias	= (strtotime($c->fechaInicio)-strtotime($c->fechaFin))/86400;
			 $dias 	= abs($dias); $dias = floor($dias);

			 echo $dias;
			?>
		 </td> 
		 <th id="gris" colspan="5" style="font-size:80%;" align="center">HORAS:</th> 
		 <td colspan="15" style="font-size:80%;" align="center">
		 <?php	

		 	 $c->horaInicio = new DateTime($c->horaInicio);
		 	 $c->horaFin = new DateTime($c->horaFin);
		     $horas = $c->horaInicio->diff($c->horaFin);
		     echo $horas->format('%H horas %i minutos'); 
		 ?>
		 </td>
		
  	</tr>

  	<tr>
		 <th id="gris" colspan="3" style="font-size:80%;" align="center">SALIDA:</th> 
		 <td colspan="2" style="font-size:80%;" align="center">{{$c->fechaInicio}}</td> 
		 <th id="gris" colspan="5" style="font-size:80%;" align="center">ENTRADA:</th> 
		 <td colspan="15" style="font-size:80%;" align="center">{{$c->fechaFin}}</td>
  	</tr>


  	<tr>
		<th id="gris" colspan="3" style="font-size:80%;" align="center">LUGAR:</th> 
	 	<td colspan="22" style="font-size:80%;" align="center">Chone</td>
  	</tr>


  	<tr>
		<th id="gris" colspan="3" style="font-size:80%;" align="center">FECHA:</th> 
	 	<td colspan="22" style="font-size:80%;" align="center"><?php echo $fecha_actual=date("Y/m/d"); ?> </td>
  	</tr>


   <tr>
	 <th id="gris" colspan="3" style="font-size:80%;" align="center">PETICIÓN</th> 
	
	 <th id="gris" colspan="7" style="font-size:80%;" align="center">AUTORIZADO</th> 

	  <th id="gris" colspan="15" style="font-size:80%;" align="center">VISTO BUENO</th> 
  	</tr>



 	<tr>
	 <th colspan="3" style="font-size:80%;" align="center" height="40px"></th> 
	
	 <th colspan="7" style="font-size:80%;" align="center" height="40px"></th> 

	 <th colspan="15" style="font-size:80%;" align="center" height="40px"></th> 
  	</tr>


  	<tr>
	 <td id="gris" colspan="3" style="font-size:80%;" align="center"><?php echo $c->nombres.' '.$c->apellidos ?></td> 
	
	 <td id="gris" colspan="7" style="font-size:80%;" align="center">{{$c->tipo}}</td> 

	 <td id="gris" colspan="15" style="font-size:80%;" align="center">{{$c->tipo}}</td> 
  	</tr>


  	<tr>
	 <th colspan="3" style="font-size:80%;" align="center" height="10px">SERVIDOR PÚBLICO MUNICIPAL</th> 
	
	 <th colspan="7" style="font-size:80%;" align="center" height="10px">SUB-DIRECTOR DE TECNOLOGÍA</th> 

	 <th colspan="15" style="font-size:80%;" align="center" height="10px">DIRECCIÓN DE TALENTO HUMANO</th> 
  	</tr>

  	@endforeach
</table>
</body>
</html>