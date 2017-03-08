<?php
include"dbNBA.php";
$nba= new dbNBA();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <h3>Ampliacion 3 input</h3>
  <form action="filtrado.php" method="post">
    <input type="hidden" value="input" name="tipo" />
    <label>Equipo Local</label><br>
    <input type="text" name="equipol" value=""><br>

    <label>Equipo Visitante</label><br>
    <input type="text" name="equipov" value=""><br>

    <label>Temporada</label><br>
    <input type="text" name="temporada1" value=""><br><br>
    <input type="submit" name="" value="Enviar">
    <!-- Boton de Enviar el Formulario -->
  </form>
  <br>
  <hr>

  <h3>Ampliacion</h3>



  <!-- Select Dinamico Equipo_Local -->
  <form action="filtrado.php" method="post">
    <input type="hidden" value="select" name="tipo" />
    Equipo Local<br>
    <select name="equipol">
      <option></option>
      <?php
      $resultado=$nba->SelectEquipoLocal();
      foreach ($resultado as $fila) {
        ?>
        <option value="<?php echo $fila['equipo_local']; ?>"><?php echo $fila['equipo_local']; ?></option>
        <?php } ?>
      </select><br>


      <!-- Select Dinamico Equipo_Visitante -->
      Equipo Visitante<br>
      <select name="equipov" >
        <option ></option>
        <?php
        $resultado=$nba->SelectEquipoVisitante();
        foreach ($resultado as $fila) {
          ?>
          <option value="<?php echo $fila['equipo_visitante']; ?>"><?php echo $fila['equipo_visitante']; ?></option>
          <?php } ?>
        </select><br>


        <!-- Select Dinamico Temporada -->
        Temporada<br>
        <select name="temporada1" >
          <option ></option>
          <?php
          $resultado=$nba->SelectTemporada();
          foreach ($resultado as $fila) {
            ?>
            <option value="<?php echo $fila['temporada']; ?>"><?php echo $fila['temporada']; ?></option>
            <?php } ?>
          </select><br>

          <input type="hidden" name="" value=""><br>
          <input type="submit" name="" value="Enviar">
        </form>
      </body>
      </html>
