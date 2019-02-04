<!DOCTYPE html>
<html>
<table class="table table-bordered" style="margin: 0 auto;" border="2px solid;">

  <tr>
	 <th colspan="6"><img src="municipio.jpg" width="350px" height="50px"/></th>
	 <th id="gris" colspan="8" style="font-size:160%;"><u>Usuarios del sistema</u></th>
  </tr>

 
  	<tr>
      <th colspan="6" align="center">C.I.</th>
      <th colspan="6" align="center">Nombres</th>
      <th colspan="6" align="center">Apellidos</th>
    </tr>

  <tbody>
  	@foreach($usuario as $u)
    <tr>
      <td colspan="6" align="center">{{ $u->cedula }}</td>
      <td colspan="6" align="center">{{ $u->nombres }}</td>
      <td colspan="6" align="center">{{ $u->apellidos }}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>

</html>


