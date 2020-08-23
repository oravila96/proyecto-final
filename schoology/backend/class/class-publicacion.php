<?php

class Publicacion{

    private $usuario;
    private $publicacion;

    public function __construct(

        $usuario,
        $publicacion
    ) {
        $this->usuario = $usuario;
        $this->publicacion = $publicacion;
    }

    public function guardarPublicacion(){
        $contenidoArchivoPublicaciones = file_get_contents('../data/publicaciones.json');
            $publicaciones = json_decode($contenidoArchivoPublicaciones, true);
            $publicaciones[] = array(
                    "usuario" =>$_COOKIE['firstName'],
                    "publicacion" =>$this->publicacion
            );

            $archivo = fopen('../data/publicaciones.json', 'w');
            fwrite($archivo, json_encode($publicaciones));
            fclose($archivo);
            echo '{"codigoResultado":1,"mensaje":"publicacion guardada con exito"}';
    }

    
    public function getUsuario()
    {
        return $this->usuario;
    }

    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    
    public function getPublicacion()
    {
        return $this->publicacion;
    }

   
    public function setPublicacion($publicacion)
    {
        $this->publicacion = $publicacion;

        return $this;
    }

    
}
