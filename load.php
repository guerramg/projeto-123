<?php

$protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=="on") ? "https" : "http");
$urlBase = $protocolo.'://'.$_SERVER['HTTP_HOST'].'/projeto-123';

require ('classes/controllerConexao.php');
require ('classes/controllerSetores.php');
require ('classes/controllerAtendentes.php');
require ('classes/controllerUsuarios.php');
require ('classes/controllerDemandas.php');


?>