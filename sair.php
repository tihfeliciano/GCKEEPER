<?php
date_default_timezone_set('America/Sao_Paulo');

session_start();

session_destroy();

header("Location:../../html/index.html");

?>