
<?php
include_once '../config/pathconfig.php';
include_once './templates/base_template.php';
include_once './templates/index_template.php';
include './handlers/requester.php';

$requester = new Requester($apiUrl."/Tasks.php");
$response = $requester->get_request();
$decodedData = json_decode($response,true);

echo renderBaseTemplate('Gerenciador de Tarefas',renderIndexPage($decodedData['data']));


?>




