<?php
include"dbNBA.php";
$nba= new dbNBA();
// isset() sirve para decir que si existe
// empty() sirve para decir que lo que alla dentro de la variable tenga que estar vacio
if ($nba->getErrorConexion()==true) {
  echo "No hay conexion";
}
else {
  //-- Falta los isset y los empty de los demas input --\\
  if (isset($_POST["equipol"]) && (!empty($_POST["equipol"])) || isset($_POST["equipov"]) && (!empty($_POST["equipov"])) || isset($_POST["temporada1"]) && (!empty($_POST["temporada1"])) ) {
    //-- Este es para los selects --\\
    $resultado=$nba->mostrarPartidosDos($_POST["equipol"],$_POST["equipov"],$_POST["temporada1"]);
    ?>
    <?php if($resultado->num_rows==0){
      echo "El Equipo o Temporada escritos no esta en la Base de Datos";}
      else{
        ?>
        <center>
          <table border="3">
            <tr>
              <th>Equipo Local</th>
              <th>Equipo Visitante</th>
              <th>Temporada</th>
            </tr>
            <?php } ?>

            <?php
            while ($fila=$resultado->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$fila["equipo_local"]."</td>";
              echo "<td>".$fila["equipo_visitante"]."</td>";
              echo "<td>".$fila["temporada"]."</td>";
              echo "</tr>";
            }
          }else {
            //-- Aqui nos enviara si hay error --\\
            echo "<a href="."index.php".">Volver para rellenar</a>";
          }
        }
        ?>
      </table>
    </center>
