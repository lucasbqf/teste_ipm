<?php
include_once '../config/pathconfig.php';
include_once './templates/base_template.php';
include_once './templates/altertask_template.php';
include_once './templates/404_template.php';
include './handlers/requester.php';





if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $requester = new Requester($apiUrl.'/Tasks.php?id='.$id);
    $response = $requester->get_request();
    $decodedData = json_decode($response,true);
    if(isset($decodedData['data'][0])){
        echo renderBaseTemplate('Alterar Tarefa',renderAlterTask($decodedData['data'][0]));
    }
}else{
    header('X-PHP-Response-Code: 404', true, 404);
    echo renderBaseTemplate('404 Not Found',render404());
} 
    




?>