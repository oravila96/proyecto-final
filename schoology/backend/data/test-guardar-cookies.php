<?php

setcookie("usuario","Juan",time()+(60*60*24*31),"/");  //60+60*24*31 un mes , la pleca se guarda en raiz
echo "Cookie enviada al cliente y guardada";  //la cookie se envia del servidor al cliente

?>