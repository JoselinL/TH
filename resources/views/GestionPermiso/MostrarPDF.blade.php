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
	 <td colspan="3" style="font-size:80%;" align="center"><?php echo $persona->nombres.' '.$persona->apellidos ?></td>
	 <th id="gris" colspan="10" style="font-size:80%;" align="center">CEDULA DE CIUDADANÍA</th> 
	 <td colspan="10" style="font-size:80%;" align="center">{{$persona->cedula}}</td>
  	</tr>
  	

	<tr>
	 <th id="gris" colspan="5" style="font-size:80%;" align="center">TIMEPO</th> 
	
	 <th id="gris" colspan="20" style="font-size:80%;" align="center">RAZÓN</th> 
  	</tr>


  	<tr>
		 <th id="gris" colspan="1" style="font-size:80%;" align="center">Días:</th> 
		 <td colspan="1" style="font-size:80%;" align="center">10</td> 
		 <th id="gris" colspan="1" style="font-size:80%;" align="center">Horas:</th> 
		 <td colspan="2" style="font-size:80%;" align="center">80</td>
		 <td colspan="5" ALIGN=center>  </td>
		 <td colspan="15">Particular</td>
  	</tr>

  	<tr>
		 <th id="gris" colspan="1" style="font-size:80%;" align="center">Salida:</th> 
		 <td colspan="1" style="font-size:80%;" align="center">18-02-2019</td> 
		 <th id="gris" colspan="1" style="font-size:80%;" align="center">Entrada:</th> 
		 <td colspan="2" style="font-size:80%;" align="center">4-03-2019</td>
		 <td colspan="5" ALIGN=center>  </td>
		 <td colspan="15">Calamidad Doméstica</td>
  	</tr>


  	<tr>
		<th id="gris" colspan="1" style="font-size:80%;" align="center">Lugar:</th> 
	 	<td colspan="4" style="font-size:80%;" align="center">Chone</td>
		 <td colspan="5" ALIGN=center>X</td>
		 <td colspan="15">Enfermedad</td>
  	</tr>


  	<tr>
		<th id="gris" colspan="1" style="font-size:80%;" align="center">Fecha:</th> 
	 	<td colspan="4" style="font-size:80%;" align="center">15-02-2019</td>
		<td colspan="5" ALIGN=center>  </td>
		<td colspan="15">Otro Explicar</td>
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
	 <td id="gris" colspan="3" style="font-size:80%;" align="center"><?php echo $persona->nombres.' '.$persona->apellidos ?></td> 
	
	 <td id="gris" colspan="7" style="font-size:80%;" align="center">Cinthya Pamela Álvarez Moreira</td> 

	 <td id="gris" colspan="15" style="font-size:80%;" align="center">Edson José Vidal Párraga</td> 
  	</tr>


  	<tr>
	 <th colspan="3" style="font-size:80%;" align="center" height="10px">SERVIDOR PÚBLICO MUNICIPAL</th> 
	
	 <th colspan="7" style="font-size:80%;" align="center" height="10px">SUB-DIRECTOR DE TECNOLOGÍA</th> 

	 <th colspan="15" style="font-size:80%;" align="center" height="10px">DIRECCIÓN DE TALENTO HUMANO</th> 
  	</tr>

</table>
</body>
</html>