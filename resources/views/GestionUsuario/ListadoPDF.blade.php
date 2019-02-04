<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<table class="table table-bordered" style="margin: 0 auto;" border="2px solid;">

  <tr>
	 <th colspan="9"><img src="municipio.jpg" width="px" height="100px"/></th>
	<!--  <th id="gris" colspan="8" style="font-size:160%;"><u>Usuarios del sistema</u></th> -->
  </tr>

 
  	<tr>
      <th colspan="3" align="center">CEDULA</th>
      <th colspan="3" align="center">NOMBRES</th>
      <th colspan="3" align="center">APELLIDOS</th>
    </tr>

  <tbody>
  	@foreach($usuario as $u)
    <tr>
      <td colspan="3" align="center">{{ $u->cedula }}</td>
      <td colspan="3" align="center">{{ $u->nombres }}</td>
      <td colspan="3" align="center">{{ $u->apellidos }}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>

</html>


