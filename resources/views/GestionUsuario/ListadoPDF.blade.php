<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style type="text/css">
  .titulo {
   text-align:center;
  
   }

   .titulo2 {
   text-align:center;
   font-weight:bold;
   font-size:22px;
   font-family: Times New Roman;
   }

   .subtitulo {
   text-align:center;
   font-weight:bold;
   font-size:20px;
   font-family: Times New Roman;
   }

   .subtitulo1 {
   text-align:center;
   font-weight:bold;
   font-size:20px;
   font-family: Times New Roman;
   }

   .subtitulo2 {
   text-align:center;
   font-weight:bold;
   font-size:20px;
   font-family: Times New Roman;
   }

   .datos {
    text-align:justify; 
    font-size:15px;
    font-family: Arial;

   }

</style>
  
</head>
<body>

<div class="container">            
  <table class="table table-bordered">
    <div >
       <tr >
        <td colspan="3" class="titulo"><img src="municipio.jpg" width="350px" height="50px"></td>
       </tr>
    </div>
    <div>
      <tr>
      <td class="subtitulo">C.I.</td>
      <td class="subtitulo1">NOMBRES</td>
      <td class="subtitulo2">APELLIDOS</td>
      </tr>
    </div>
      
    <div>
      <tbody>
      @foreach($usuario as $u)
      <tr class="datos">
       <td>{{ $u->cedula }}</td>
       <td>{{ $u->nombres }}</td>
       <td>{{ $u->apellidos }}</td> 
      </tr>   
       @endforeach
     </tbody>
    </div>
  
   
</table>
</div>

</body>
</html>





  