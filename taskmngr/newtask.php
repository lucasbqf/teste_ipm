<?php
include_once '../config/pathconfig.php';
include_once './templates/base_template.php';
include_once './templates/newtask_template.php';
include './handlers/requester.php';


$requester = new Requester($apiUrl.'/Tasks.php/');

$response = $requester->get_request();
$decodedData = json_decode($response,true);

echo renderBaseTemplate('Nova Tarefa',renderNewTask());


?>