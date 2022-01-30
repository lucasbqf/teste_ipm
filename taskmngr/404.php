<?php
include_once '../config/pathconfig.php';
include_once './templates/base_template.php';
include_once './templates/404_template.php';
include './handlers/requester.php';


echo renderBaseTemplate('Pagina nao encontrada',render404());


?>