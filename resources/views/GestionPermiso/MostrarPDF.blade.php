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


  	<tr>
	 <th id="gris" colspan="2" style="font-size:80%;" align="center">NOMBRE DEL SERVIDOR</th> 
	 <th colspan="3" style="font-size:80%;" align="center"><?php echo $persona->nombres.' '.$persona->apellidos ?></th>
	 <th id="gris" colspan="10" style="font-size:80%;" align="center">CEDULA DE CIUDADANÍA</th> 
	 <th colspan="10" style="font-size:80%;" align="center">{{$persona->cedula}}</th>
  	</tr>
  	

	<tr>
	 <th id="gris" colspan="5" style="font-size:80%;" align="center">TIMEPO</th> 
	
	 <th id="gris" colspan="5" style="font-size:80%;" align="center">RAZÓN</th> 
  	</tr>


  	<tr>
	 <th id="gris" colspan="2" style="font-size:80%;" align="center">Días</th> 
	 <th colspan="2" style="font-size:80%;" align="center">{{}}</th> 
	 <th id="gris" colspan="2" style="font-size:80%;" align="center">Horas</th> 
	 <th colspan="2" style="font-size:80%;" align="center"></th>
  	</tr>


</table>
</body>
</html>