<html>
<head>
  <title>Listado usuario</title>
</head>

<body>
<table border="1px">
  <thead>
  <tr>
    <th> Usuario </th>
    <th> Contraseña </th>
    <th> Nombre </th>
    <th> Apellidos </th>
   </tr>
  </thead>

<?php
   require_once "bda.php";
   
   try{
       $base=conectadb();
       $sql="select usuario, password, nombre, apellidos from usuarios";
       $resultado=$base->prepare($sql);
       $resultado->execute();
       while($registro=$resultado->fetch()){
           print "<tr><td>$registro[usuario]</td>
                     <td>$registro[password]</td>
                      <td>$registro[nombre]</td>
                     <td>$registro[apellidos]</td></tr> </table> <br>";
           
           
      
          
       }
       $resultado->closeCursor();
   }catch(exception $e){
       die('Error: ' .$e->GetMessage());
       
   }finally{
       $base=null;
   }
   
   
?>
<a href="menu.php">Volver al menú</a>
</body>
</html>
