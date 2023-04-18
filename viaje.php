<?php
 class viaje {
    private $codigoViaje ;
    private $destino ;
    private $cantMaxPasajeros ;
    private $pasajeros ; // objeto
    private $responsable ; // objeto

public function __construct($codiViaje, $destinoX, $cantPasajerosMax, $responsable){
    
    $this -> codigoViaje = $codiViaje ;
    $this -> destino = $destinoX ;
    $this -> cantMaxPasajeros = $cantPasajerosMax ;
    $this -> pasajeros = Array() ; 
    $this -> responsable = $responsable ;
}

public function get_codigoviaje(){
    return $this -> codigoViaje ;
}

public function get_destino(){
    return $this -> destino  ;
}

public function get_cantPasajeros() {
    return $this -> cantMaxPasajeros ;
}

public function get_pasajeros() {
    return $this -> pasajeros  ;

}

public function get_responsable(){
    return $this -> responsable ;
}

public function set_codigoviaje($codiViaje) {
    $this -> codigoViaje = $codiViaje ;
}

public function set_destino($destinoX) {
    $this -> destino = $destinoX ;
}

public function set_cantPasajeros($cantPasajerosMax){
    $this -> cantMaxPasajeros = $cantPasajerosMax ;
}

public function set_pasajeros($pasajeros) {
    $this -> pasajeros = $pasajeros ;
}

public function set_responsable($responsable){
    $this -> responsable = $responsable ;
}

public function buscarPasajero($dniX){
$pasajerosS = $this -> get_pasajeros() ;   
$i = 0 ;
$bandera = false; 
while($i<count($pasajerosS) && !$bandera){
    $bandera = $pasajerosS[$i]-> get_nroDoc() == $dniX ;
    // poner if para que si no encuentra incremente el i y si encuentra, que salga 
    $i++ ;
} 
    return $i - 1 ;
}

public function modificarNombrePasajeros ($pDatoNuevo, $pDniBuscado){
    $indice = $this ->buscarPasajero($pDniBuscado) ;
            if($indice >= 0){ //entra si lo encuentra 
                $pasajeros= $this -> get_pasajeros() ;
                $pasajeros[$indice] -> set_nombre($pDatoNuevo) ;
                $this -> set_pasajeros($pasajeros) ;
            }
        }
public function modificarApellidoPasajeros ($pDatoNuevo, $pDniBuscado){
            $indice = $this ->buscarPasajero($pDniBuscado) ;
            if($indice >= 0){ //entra si lo encuentra 
                $pasajeros= $this -> get_pasajeros() ;
                $pasajeros[$indice]  -> set_apellido($pDatoNuevo) ;
                $this -> set_pasajeros($pasajeros) ; 
            }
        }
 public function modificarDniPasajeros ($pDatoNuevo, $pDniBuscado){
            $indice = $this ->buscarPasajero($pDniBuscado) ;
            if($indice >= 0){ //entra si lo encuentra 
                $pasajeros= $this -> get_pasajeros() ;
                $pasajeros[$indice] -> set_nroDoc($pDatoNuevo) ; 
                $this -> set_pasajeros($pasajeros) ; 
            }
        }
public function modificarTelefonoPasajeros ($pDatoNuevo, $pDniBuscado){
            $indice = $this ->buscarPasajero($pDniBuscado) ; 
            if($indice >= 0){ //entra si lo encuentra 
                $pasajeros= $this -> get_pasajeros() ;
                $pasajeros[$indice]  -> set_tel($pDatoNuevo); 
                $this -> set_pasajeros($pasajeros) ; 
            }
}

public function mostrarDatosPasajero(){
    $cadena = "" ;
    $colP = $this -> get_Pasajeros();
        for($i = 0 ; $i<count($colP); $i++){
        $nombre = $colP[$i] -> get_nombre() ;
        $apellido = $colP[$i] -> get_apellido()  ;
        $numeroDeDoc = $colP[$i] -> get_nroDoc();
        $telefono = $colP[$i] -> get_tel();
$cadena = $cadena ."\n --------------------- \n" . "pasajero: ". ($i + 1). "\n".  "nombre: " . $nombre. "\n". "apellido: ". $apellido. "\n". "documento: ".  $numeroDeDoc. "\n" . "telefono: ".  $telefono. "\n" ;
        } 
    return $cadena ;
}

public function cargarPasajeros($objPasajero){
    $colP = $this->get_pasajeros();
    $obj = $objPasajero ;
    array_push($colP, $obj); 
    $this->set_pasajeros($colP);  
    print_r($colP) ;
}
public function __toString()
{
   $cadena = $this -> mostrarDatosPasajero() ;
    return  "\n codigo: ". $this ->get_codigoviaje().
              "\n destino: ". $this -> get_destino(). 
              "\n cantMaxPasajeros: ". $this -> get_cantPasajeros().
            "\n datos del pasajero: " . $cadena .
        "\n ----------------------------------".
            "\n Responsable del viaje: \n". $this -> get_responsable()  ;
    
}

}