<?php
class dbNBA{
  //-- Variables de Identificacion --\\
  private $IP="localhost";
  private $USUARIO="root";
  private $CONTRAS="";
  private $DB="nba";
  private $conexion;
  private $error=false;
  function __construct(){
    $this->conexion = new mysqli($this->IP, $this->USUARIO, $this->CONTRAS, $this->DB);
    if ($this->conexion->connect_errno){
      $this->error=true;
    }
  }
  public function getErrorConexion(){
    return $this->error;
  }
  public function SelectEquipoLocal(){
    return $this->conexion->query("SELECT distinct(equipo_local) FROM partidos  GROUP BY equipo_local ASC");
  }
  public function SelectEquipoVisitante(){
    return $this->conexion->query("SELECT distinct(equipo_visitante) FROM partidos");
  }
  public function SelectTemporada(){
    return $this->conexion->query("SELECT distinct(temporada) FROM partidos");
  }
  //-- Esta es la funcion para los Select --\\
  public function mostrarPartidosDos($equipol_select,$equipov_select,$temporada1_select){
    $consulta="SELECT * FROM partidos";
    if (!empty($equipol_select)) {
      $consulta=$consulta." WHERE equipo_local='".$equipol_select."'";
      if (!empty($equipov_select)) {
        $consulta=$consulta." AND equipo_visitante='".$equipov_select."'";
      }
      if (!empty($temporada1_select)) {
        $consulta=$consulta." AND temporada='".$temporada1_select."'";
      }
      return $this->conexion->query($consulta);
    }
    elseif (!empty($equipov_select)) {
      $consulta=$consulta." WHERE equipo_visitante='".$equipov_select."'";
      if (!empty($temporada1_select)) {
        $consulta=$consulta." AND temporada='".$temporada1_select."'";
      }
      return $this->conexion->query($consulta);
    }
    elseif (!empty($temporada1_select)) {
      $consulta=$consulta." WHERE temporada='".$temporada1_select."'";
      return $this->conexion->query($consulta);
    }else {
      return $this->conexion->query($consulta);
    }
  }
}
?>
