<?php

    class Biblioteca {

        private $nombre;
        private $direccion;
        private $telefono;
        private $documentos;

        public static $numBibliotecas=0;

        public function __construct($nombre, $direccion, $telefono){
            $this->nombre=$nombre;
            $this->direccion=$direccion;
            $this->telefono=$telefono;

            self::$numBibliotecas++;
        }

        public function __destruct(){
            self::$numBibliotecas--;
        }

        //Registrar documentos
        public function registrarDocumento($documento){
            $this->documentos[] = $documento;
            echo "Documento registrado con exito!<br>";
        }

        //Listar documentos
        public function listarDocumentos(){
            foreach($this->documentos as $documento){
                $documento->mostrarDatos();
            }
        }

        //Listar documentos por formato
        public function listarDocumentosFormato($formato){
            foreach($this->documentos as $documento){
                if($documento->getFormato() == $formato){
                    $documento->mostrarDatos();
                }
            }
        }

        //Borrar documento ID
        public function borrarDocumentoId($id){
            $encontrado=false;
            foreach($this->documentos as $key=>$documento){
                if($documento->getId() == $id){
                    unset($this->documentos[$key]);
                    echo "Documento borrado con exito<br>";
                    $encontrado=true;
                    break;
                }
            }
            if(!$encontrado)
                echo "Documento no encontrado<br>";
        }

        //Mostrar info biblioteca
        public function mostrarInformacionBiblioteca() {
            echo "INFORMACION DE LA BIBLIOTECA <br>";
            echo "Nombre: $this->nombre <br>";
            echo "Dirección: $this->direccion <br>";
            echo "Número de teléfono: $this->telefono <br>";
        }
        
        //Listar numero de bibliotecas
        public function listarNumeroBibliotecas(){
            echo "El numero de bibliotecas  es ". self::$numBibliotecas."<br>";
        }
    }