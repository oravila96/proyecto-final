<?php
    // //echo "Sha1: ".sha1("asd.456")."<br>";  //encriptado en el navegador, es decir guardar esto: bcdcb29ed2aab16d48c11485264df665e906bdd9
     echo "Sha1 ".sha1("Afrt$!kl")."<br>";  //encriptado en el navegador, es decir guardar esto: bcdcb29ed2aab16d48c11485264df665e906bdd9
     echo  "Unique: ".sha1(uniqid(rand(),true));  //true es mayor enropia , inuq sirve para que sea unico
    
    

?>