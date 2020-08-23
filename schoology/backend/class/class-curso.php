<?php

   class Curso{
       private $firstName;
       private $codigo;

       public function __construct($firstName,$codigo)
       {
           $this->firstName = $firstName;
           $this->codigo = $codigo;
       }

       public static function obtenerCurso($firstName){
              $dataCursos = file_get_contents("../data/cursos.json");
              $dataCurso = json_decode($dataCursos,true);
              echo json_encode($dataCurso[$firstName-1]);
       }

       public static function obtenerCursos(){
              $dataCursos = file_get_contents("../data/cursos.json");
                echo $dataCursos;
       }

       public function guardarCurso(){
            $contenidoArchivoCursos = file_get_contents('../data/cursos.json');
            $cursos = json_decode($contenidoArchivoCursos, true); 
            $cursos[] = array(  //lo creo nuevo
                    "firstName" => $this->firstName,
                    "codigo" => $this->codigo
                    
            );

            $archivo = fopen('../data/cursos.json', 'w');  //sobreescribo el archivo
            fwrite($archivo, json_encode($cursos));  //escribo en el archivo
            fclose($archivo);  //cierro el archivo
            echo '{"codigoresultado":1,"mensaje":"Comentario guardado con exito"}';
       }

       public function getFirstName()
       {
              return $this->firstName;
       }

       public function setFirstName($firstName)
       {
              $this->firstName = $firstName;

              return $this;
       }

       public function getCodigo()
       {
              return $this->codigo;
       }

       public function setCodigo($codigo)
       {
              $this->codigo = $codigo;

              return $this;
       }
   } 
















?>