<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<table class="table table-bordered" style="margin: 0 auto;" border="2px solid;">

  <tr>
	 <th colspan="12"><img src="municipio.jpg" width="px" height="100px"/></th>
	<!--  <th id="gris" colspan="8" style="font-size:160%;"><u>Usuarios del sistema</u></th> -->
  </tr>

 
    <tr>
      <th colspan="12" align="center" style="font-size: 18px" >USUARIOS REGISTRADOS EN EL SISTEMA</th>
    </tr>

  	<tr>
      <th colspan="3" align="center">CEDULA</th>
      <th colspan="3" align="center">NOMBRES</th>
      <th colspan="3" align="center">APELLIDOS</th>
      <th colspan="3" align="center">ÁREA</th>
    </tr>

  <tbody>
  	@foreach($usuario as $u)
    <tr>
      <td colspan="3" align="center">{{ $u->cedula }}</td>
      <td colspan="3" align="center">{{ $u->nombres }}</td>
      <td colspan="3" align="center">{{ $u->apellidos }}</td>
      <td colspan="3" align="center">{{ $u->area }}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>

</html>


