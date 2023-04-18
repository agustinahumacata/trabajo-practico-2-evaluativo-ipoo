<?php 
class responsableV{
    private $numEmpleado ;
    private $numLicencia ;
    private $nombre ;
    private $apellido ;


public function __construct($numEmpleado, $numLicencia, $nombre, $apellido){
        $this -> numEmpleado = $numEmpleado ;
        $this -> numLicencia = $numLicencia ;
        $this -> nombre = $nombre ;
        $this -> apellido = $apellido ;
}

// METODOS

public function get_numEmpleado(){
    return $this -> numEmpleado ;
}

public function get_numLicencia(){
    return $this -> numLicencia ;
}

public function get_nombre(){
    return $this -> nombre ;
}

public function get_apellido(){
    return $this -> apellido ;
}

public function set_numEmpleado($numEmpleado){
    $this -> numEmpleado = $numEmpleado ;
}

public function set_numLicencia($numLicencia){
    $this -> numLicencia = $numLicencia ;
}

public function set_nombre ($nombre){
    $this -> nombre = $nombre ;
}

public function set_apellido ($apellido){
    $this -> apellido = $apellido ;
}

public function __toString()
{
    return "\n Numero de responsable: ". $this-> get_numEmpleado().
    "\n licencia de responsable: ". $this -> get_numLicencia().
    "\n Nombre de responsable: ". $this -> get_nombre().
    "\n Apellido de responsable: ". $this -> get_apellido() ;
}

}