<?php
//Ss

include_once "Viaje.php";
include_once "Pasajero.php";
include_once "ResponsableV.php";

//FUNCIONES AUXILIARES IMPLEMENTADAS

/**FUNCION QUE SOLICITA UN NUMERO ENTRE UN RANGO DE VALORES Y VERIFICA QUE SE ENCUENTRE EN ESE RANGO
 * @param INT $min
 * @param INT $max
 * @return INT
 */
function solicitarNumeroEntre($min, $max){
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {   //is_int, evalua que el tipo de dato de la variable sea entero y devuelve true si es así, false caso contrario
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

//CREACIÓN DEL ARREGLO DE OBJETOS PASAJERO NECESARIO PARA CREAR EL VIAJE
$pasajeros=[];
$pasajeros[0]=new Pasajero("Ana", "Bolena", 22112211, 1231234);
$pasajeros[1]=new Pasajero("Alejandro", "Dumas", 22221111, 9879876);


//CREACIÓN DEL OBJETO RESPONSABLE NECESARIO PARA CREAR EL VIAJE
$responable=new ResponsableV(0245, 666999, "Raphael", "Mefistófeles");


//CREO EL OBJETO $UNVIAJE CON LOS OBJETOS PRECEDENTES
$unViaje=new Viaje(0001, "Samarcanda", 16, $pasajeros, $responable);


//PROGRAMA PRINCIPAL
do {
    //MENU DE OPCIONES
    echo "---------MENÚ DE OPCIONES---------\n";
    echo "1. CARGAR NUEVOS PASAJEROS AL VIAJE\n";       //Agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Debe verificar que el pasajero no esté cargado más de una vez en el viaje.
    echo "2. MODIFICAR INFORMACIÓN DEL VIAJE\n";        //Implementar métodos necesarios para modificar los atributos de dicha clase (VIAJE), modificar el nombre, apellido y teléfono de un pasajero. De la misma forma cargue la información del responsable del viaje.
    echo "3. VER LA INFORMACIÓN DEL VIAJE\n";           //echo
    echo "4. SALIR\n";
    echo "Elija su opción: ";
    $opcion=solicitarNumeroEntre(1, 4);
    
    //OPCIONES
    switch($opcion){
        case '1':
            //SOLICITUD DE DATOS DEL NUEVO PASAJERO
            echo "Ingrese el número de documento del nuevo pasajero: ";
            $dniNuevoPasajero=trim(fgets(STDIN));
            //VERIFICACIÓN DE DNI PARA EVITAR REDUNDANCIA
            $pasajeroEncotrado=$unViaje->verificarPasajero($dniNuevoPasajero);
            if ($pasajeroEncotrado) {
                echo "El número de documento ya esta registrado a un pasajero. Por favor, ingrese otro número de documento o verifique que lo ha escrito correctamente. ";
                $dniNuevoPasajero=trim(fgets(STDIN));
            }
            echo "Ingrese el nombre del nuevo pasajero: ";
            $nombreNuevoPasajero=trim(fgets(STDIN)); 
            echo "Ingrese el apellido del nuevo pasajero: ";
            $apellidoNuevoPasajero=trim(fgets(STDIN));
            echo "Ingrese el número de teléfono del nuevo pasajero: ";
            $telefonoNuevoPasajero=trim(fgets(STDIN));
            //ACTUALIZACIÓN DEL ARREGLO DE OBJETOS PASAJERO
            $unViaje->incorporarNuevoPasajero($nombreNuevoPasajero, $apellidoNuevoPasajero, $dniNuevoPasajero, $telefonoNuevoPasajero);
            break;
        
        case '2':
            //SUBMENUS MODIFICACIONES
            echo "------¿QUÉ DESEA MODIFICAR?------\n";
            echo "1. INFORMACIÓN DEL VIAJE\n";
            echo "2. INFORMACIÓN DE PASAJEROS\n";
            echo "3. INFORMACIÓN DEL RESPONSABLE\n";
            echo "4. VOLVER AL MENU ANTERIOR\n";
            echo "Elija su opción: ";
            $eleccion=solicitarNumeroEntre(1, 4);
            switch($eleccion){
                case '1':
                    //MODIFICACIÓN DE DATOS DEL OBJETO VIAJE
                    echo "------¿QUÉ DESEA MODIFICAR?------\n";
                    echo "1. CÓDIGO DEL VIAJE\n";
                    echo "2. DESTINO DEL VIAJE\n";
                    echo "3. CANTIDAD MÁXIMA DE PASAJEROS\n";
                    echo "4. VOLVER AL MENU ANTERIOR\n";
                    echo "Elija su opción: ";
                    $seleccion=solicitarNumeroEntre(1, 4);
                    switch ($seleccion) {
                        case '1':
                            echo "Ingrese el nuevo código de viaje: ";
                            $codigo=trim(fgets(STDIN));
                            $unViaje->setCodigo($codigo);
                            break;
                        
                        case '2':
                            echo "Ingrese el nuevo destino: ";
                            $destino=trim(fgets(STDIN));
                            $unViaje->setDestino($destino);
                            break;
                        
                        case '3':
                            echo "Ingrese la nueva cantidad máxima de pasajeros: ";
                            $cantMaxPasajeros=trim(fgets(STDIN));
                            $unViaje->setPasajeMaximo($cantMaxPasajeros);
                            break;
                    }
                    break;
                
                case '2':
                    //MODIFICACIÓN DE LOS OBJETOS PASAJERO
                    echo "------¿QUÉ DESEA MODIFICAR?------\n";
                    echo "1. NOMBRE DE UN PASAJERO\n";
                    echo "2. APELLIDO DE UN PASAJERO\n";
                    echo "3. NUMERO TELEFÓNICO DE UN PASAJERO\n";
                    echo "4. VOLVER AL MENU ANTERIOR\n";
                    echo "Elija su opción: ";
                    $seleccion=solicitarNumeroEntre(1, 4);
                    switch ($seleccion){
                        case '1':
                            echo "Lista de pasajeros: \n". $unViaje->listarPasaje();
                            echo "¿Qué pasajero desea modificar? ";
                            $pasajeroModificar=solicitarNumeroEntre(1, count($unViaje->getColeccionPasaje()));
                            echo "Ingrese el nuevo nombre del pasajero: ";
                            $nombre=trim(fgets(STDIN));
                            $unViaje->getColeccionPasaje()[$pasajeroModificar-1]->setNombre($nombre);
                            break;
                        
                        case '2':
                            echo "Lista de pasajeros: \n". $unViaje->listarPasaje();
                            echo "¿Qué pasajero desea modificar? ";
                            $pasajeroModificar=solicitarNumeroEntre(1, count($unViaje->getColeccionPasaje()));
                            echo "Ingrese el nuevo apellido del pasajero: ";
                            $apellido=trim(fgets(STDIN));
                            $unViaje->getColeccionPasaje()[$pasajeroModificar-1]->setApellido($apellido);
                            break;
                        
                        case '3':
                            echo "Lista de pasajeros: \n". $unViaje->listarPasaje();
                            echo "¿Qué pasajero desea modificar? ";
                            $pasajeroModificar=solicitarNumeroEntre(1, count($unViaje->getColeccionPasaje()));
                            echo "Ingrese el nuevo teléfono del pasajero: ";
                            $telefono=trim(fgets(STDIN));
                            $unViaje->getColeccionPasaje()[$pasajeroModificar-1]->setNroTelefono($telefono);
                            break;
                    }
                    break;
                
                case '3':
                    //MODIFICACIÓN DEL OBJETO RESPONSABLEV
                    echo "------¿QUÉ DESEA MODIFICAR?------\n";
                    echo "1. NÚMERO DE EMPLEADO DEL RESPONSABLE\n";
                    echo "2. NÚMERO DE LICENCIA DEL RESPONSABLE\n";
                    echo "3. NOMBRE DEL RESPONSABLE\n";
                    echo "4. APELLIDO DEL RESPONSABLE\n";
                    echo "5. VOLVER AL MENU ANTERIOR\n";
                    echo "Elija su opción: ";
                    $seleccion=solicitarNumeroEntre(1, 5);
                    switch ($seleccion){
                        case '1':
                            echo "Ingrese el nuevo número de empleado del responsable: ";
                            $nroResponsable=trim(fgets(STDIN));
                            $unViaje->getObjResponsable()->setNroEmpleado($nroResponsable);
                            break;
                        
                        case '2':
                            echo "Ingrese el nuevo número de licencia del responsable: ";
                            $nroLicencia=trim(fgets(STDIN));
                            $unViaje->getObjResponsable()->setNroLicencia($nroLicencia);
                            break;
                        
                        case '3':
                            echo "Ingrese el nuevo nombre del responsable: ";
                            $nombre=trim(fgets(STDIN));
                            $unViaje->getObjResponsable()->setNombre($nombre);
                            break;
                        
                        case '4':
                            echo "Ingrese el nuevo apellido del responsable: ";
                            $apellido=trim(fgets(STDIN));
                            $unViaje->getObjResponsable()->setApellido($apellido);
                            break;
                    }
                    break;
            }
            break;
        
        case '3':
            //EXHIBICIÓN DE LOS DATOS DEL VIAJE
            echo $unViaje;
            break;
        }
} while ($opcion!=4);


?>