<?php
    class Usuario{
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $gender;
        private $birthdate;
        private $cursos;

        public function __construct($firstName, $lastName, $email, $password, $gender, $birthdate, $cursos)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->gender = $gender;
            $this->birthdate = $birthdate;
            $this->cursos= $cursos;
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

        public function getLastName()
        {
                return $this->lastName;
        }
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getPassword()
        {
                return $this->password;
        }
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
 
        public function getGender()
        {
                return $this->gender;
        }
        public function setGender($gender)
        {
                $this->gender = $gender;

                return $this;
        }

        public function getBirthdate()
        {
                return $this->birthdate;
        }
        public function setBirthdate($birthdate)
        {
                $this->birthdate = $birthdate;

                return $this;
        }

        public function getCursos()
        {
                return $this->cursos;
        }

        public function setCursos($cursos)
        {
                $this->cursos = $cursos;

                return $this;
        }

                
        public static function verificarUsuario($email, $password){ //con $email y $password se verifica que lo que venga del login sea igual al usuarios.json
                $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
                $usuarios = json_decode($contenidoArchivoUsuarios, true);
                for ($i=0; $i<sizeof($usuarios); $i++) {
                        if($usuarios[$i]["email"]==$email && $usuarios[$i]["password"]==sha1($password)) {
                                return $usuarios[$i];
                        }
                }
                return null;  //si sale del ciclo for signifca que nunca hubo usuario (NO ENCONTRO NADA) y retorna null.
        }

         public function guardarUsuario(){
                $contenidoArchivo= file_get_contents("../data/usuarios.json");
                $usuarios = json_decode($contenidoArchivo, true);
                $password= sha1($this->password);
                $usuarios[]= array(
                        "firstName"=>$this->firstName,
                        "lastName"=>$this->lastName,
                        "email"=>$this->email,
                        "password"=>$password,
                        "gender"=>$this->gender,
                        "birthdate"=>$this->birthdate,
                        "cursos"=>$this->cursos
                );

                $archivo = fopen("../data/usuarios.json","w");
                fwrite($archivo, json_encode($usuarios));
                fclose($archivo);
                echo '{"codigoResultado":1,"mensaje":"usuario guardado con exito"}';
         }

        public static function obtenerUsuarios(){
                $dataUsuarios = file_get_contents("../data/usuarios.json");
                echo $dataUsuarios;
        }

        public static function obtenerUsuario($firstName){
                $dataUsuarios = file_get_contents("../data/usuarios.json");
                $dataUsuario = json_decode($dataUsuarios,true);
                echo json_encode($dataUsuario[$firstName-1]);
        }

        // public static function verCurso($firstName){ //Se declara estatica porque no creamos nada solo obtenemos
        //         $contenidoArchivo = file_get_contents('../data/usuarios.json');
        //         $usuarios = json_decode($contenidoArchivo, true);   //retorna el arreglo asociativo
        //         $usuario= null; //No tiene nada aqui guardamos el usuario cuando hicimos la comparacion
        //         for ($i=0; $i <sizeof($usuarios) ; $i++) {      //$usuarios nombre del json  //Recorrer de uno en uno los usuarios
        //             if($usuarios[$i]["firstName"]==$firstName){ //Verifico si el usuario seleccionado es el mismo del arreglo usuarios con su codigoUsuario
        //                 $usuario= $usuarios[$i];  //Aquì se llena el usuario seleccionado $usuario
        //                 break;  //Si encontro al usuario se sale del ciclo
        //             }
                    
        //         }

        //         echo json_encode($usuario);

        // }
   }
?>