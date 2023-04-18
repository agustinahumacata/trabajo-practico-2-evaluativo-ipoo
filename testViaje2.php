<?php 
include_once "pasajero.php" ;
include_once "responsableV.php" ;
include_once "viaje.php" ;

 // PROGRAMA PRINCIPAL // 

$pasajeros = 0 ;

do{
        echo "-------Menu de opciones------- 
             Seleccione una opcion: 
            1) cargar informacion del viaje.  
            2) cargar informacion del responsable. 
            3) modificar informacion del viaje
            4) cargar el/los pasajeros.
            5) modificar datos de pasajero.
            6) Ver datos.  
            7) salir \n" ;    
           $opcion = trim(fgets(STDIN)) ;
   while ($opcion >= 1 && $opcion <= 5 && is_int($opcion)){
        echo "ERROR : seleccione una opcion valida. \n" ;
             echo "-------Menu de opciones------- 
                Seleccione una opcion: 
             1) cargar informacion del viaje.
             2) cargar informacion del responsable.   
             3) modificar informacion del viaje
             4) cargar el/los pasajeros.
             5) modificar datos de pasajero.
             6) Ver datos. 
             7) salir \n" ;
           
                $opcion = trim(fgets(STDIN)) ;
}
    $pasajeros = 0 ;
    
    switch ($opcion){
        case 1:            // case que carga la informacion del viaje 
    
         echo "ingrese codigo: \n" ;
             $codig = trim(fgets(STDIN)) ;
        while(is_int($codig)){
            echo "error : ingrese un codigo numerico: " ;
              $codig = trim(fgets(STDIN)) ;
     }
      
         echo "ingrese destino: \n" ;
             $dest = trim(fgets(STDIN)) ;
       while (!ctype_alpha($dest)){
             echo "error : ingrese destino en letras: " ;
             $dest = trim(fgets(STDIN)) ;
     } 
        echo "ingrese cantidad de pasajeros: \n" ;
         $cantPasaj = trim(fgets(STDIN)) ;
        while (is_int($cantPasaj)){
           echo "error : ingrese cantidad de pasajeros en forma numerica: \n" ;
           $cantPasaj = trim(fgets(STDIN)) ;
                
        }   
     
        break ;
        case 2: // cargar informacion del resposable 
            echo "ingrese numero de empleado: \n" ;
            $nroEmpleado = trim(fgets(STDIN));
            echo "ingrese numero de licencia: \n" ;
            $nroLicencia = trim(fgets(STDIN)) ;
            echo "ingrese nombre: \n" ;
            $nombreR = trim(fgets(STDIN));
            echo "ingrese apellido: \n" ;
            $apellidoR = trim(fgets(STDIN));
        $claseResponsable = new responsableV($nroEmpleado,$nroLicencia,$nombreR,$apellidoR) ;
        $viaje = new Viaje ($codig, $dest, $cantPasaj, $claseResponsable) ;
        
        break ;
        case 3:              // este case modifica viaje de datos
             echo "que datos desea modificar?: \n" ;
             echo "a) codigo: \n" ;
             echo "b) destino \n" ;
             echo "c) cantidad maxima de pasajeros: \n" ;
                $rta2 = trim(fgets(STDIN)) ;
        while(!ctype_alpha($rta2)){
            echo "error - ingrese una opcion valida: \n" ;
            $rta2 = trim(fgets(STDIN)) ;
    }
            
             if($rta2 == "a"){
                        echo "ingrese nuevo codigo: \n" ;
                       $nuevoCodig = trim(fgets(STDIN)) ;
                 while(is_int($nuevoCodig)){
                        echo "error: ingrese un codigo numerico: \n" ;
                        $nuevoCodig = trim(fgets(STDIN)) ;
            }
            $viaje -> set_codigoviaje($nuevoCodig) ;
        }elseif($rta2 == "b"){
            echo "ingrese destino nuevo: \n" ;
               $nuevoDesti = trim(fgets(STDIN)) ;
                    while (!ctype_alpha($nuevoDesti)){
                        echo "error : ingrese destino en letras: \n" ;
                        $nuevoDesti = trim(fgets(STDIN)) ;
                }
             $viaje -> set_destino($nuevoDesti) ;
            }elseif($rta2 == "c"){
                      echo "ingrese cantidad maxima de pasajeros nueva: \n" ;
                         $nuevoCantMax = trim(fgets(STDIN)) ;
                    while (is_int($nuevoCantMax)){
                         echo "error : ingrese cantidad de pasajeros en forma numerica/entero: \n" ;
                         $nuevoCantMax = trim(fgets(STDIN)) ;
                } 
                $viaje -> set_cantPasajeros($nuevoCantMax) ;
            
        }
break ;
      
          case 4 :          // este case ingresa datos del/los pasajeros

         echo "cuantos pasajeros desea ingresar: "; 
         $cantPasajeros = trim(fgets(STDIN)) ;
         while (is_int($cantPasajeros)){
            echo "error : ingrese nuevamente cantidad de pasajeros \n" ;
            $cantPasajeros = trim(fgets(STDIN)) ;
   } 

           while($pasajeros < $cantPasajeros){
                  echo "Ingrese nombre: \n" ;
                     $nombre = trim(fgets(STDIN)) ;
                     while (!ctype_alpha($nombre)){
                        echo "error : ingrese nombre en letras: \n" ;
                        $nombre = trim(fgets(STDIN)) ;
                        
                }
            
    
                     echo "Ingrese apellido: \n" ;
                     $apellido = trim(fgets(STDIN)) ;
                     while (!ctype_alpha($apellido)){
                        echo "error : ingrese apellido en letras: \n" ;
                        $apellido = trim(fgets(STDIN)) ;
                }
                
                     echo "ingrese dni: " ;
                     $dni = trim(fgets(STDIN)) ;
                     while (is_int($dni)){
                        echo "error : ingrese dni en forma numerica/entero: \n" ;
                        $dni = trim(fgets(STDIN)) ;
               } 
                    echo "ingrese telefono: "; 
                    $telefono = trim(fgets(STDIN));
                    while(is_int($telefono)){
                        echo "error : ingrese telefono: " ;
                        $telefono = trim(fgets(STDIN)) ;                    }
               $pasajeros++ ;
               $objPasajero = new Pasajero($nombre, $apellido, $dni, $telefono) ;
                $viaje -> cargarPasajeros($objPasajero) ; 
               
            }
                  
        
        break ;
        case 5 :            // este case modifica datos del/los pasajeros
            echo "que datos desea modificar?: \n" ;
            echo "a) Nombre. \n" ;
             echo "b) Apellido. \n" ;
             echo "c) DNI. \n" ;
             echo "d) telefono. \n" ;
                 $rta5 = trim(fgets(STDIN)) ;
                 while (!ctype_alpha($rta5)){
                    echo "error - ingrese una opcion valida \n" ;
                    $rta5 = trim(fgets(STDIN)) ;
           } 
            switch($rta5){
                case "a"  :
                    echo "ingrese dni de la persona que quiere modificar: ";
                        $dniX= trim(fgets(STDIN)) ;
                         $viaje -> buscarPasajero($dniX) ;
                    echo "Ingrese nuevo nombre: \n";
                    $datoNuevo = trim(fgets(STDIN)) ;
                    $viaje -> modificarNombrePasajeros($datoNuevo, $dniX) ;
                           
                     break ;         
                 case "b" :
                    echo "ingrese dni de la persona que quiere modificar: ";
                    $dniX= trim(fgets(STDIN)) ;
                        $viaje -> buscarPasajero($dniX) ;
                    echo "Ingrese nuevo apellido: \n";
                        $datoNuevo = trim(fgets(STDIN)) ;
                        $viaje -> modificarApellidoPasajeros( $dniX, $datoNuevo) ;
                     
                    break ;
               case"c" :
                    echo "ingrese dni de la persona que quiere modificar: ";
                    $dniX= trim(fgets(STDIN)) ;
                        $viaje -> buscarPasajero($dniX) ;
                    echo "Ingrese nuevo DNI: \n";
                        $datoNuevo = trim(fgets(STDIN)) ;
                        $viaje -> modificarDniPasajeros($dniX, $datoNuevo) ;
                    break ;
                case "d":
                    echo "ingrese dni de la persona que quiere modificar: ";
                    $dniX= trim(fgets(STDIN)) ;
                        $viaje -> buscarPasajero($dniX) ;
                    echo "Ingrese nuevo telefono: \n";
                        $datoNuevo = trim(fgets(STDIN)) ;
                        $viaje -> modificarTelefonoPasajeros($dniX, $datoNuevo) ;
                    break ;
                }
         
           
        
                 
            
        break ;
        case 6:         // este case muestra los datos 
            $viaje -> mostrarDatosPasajero() ;
            echo $viaje. "\n" ; 

            break ;
        
 
            }
  
   
}while($opcion != 7) ;



