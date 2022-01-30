<?php


if(isset($_POST)){
    include_once 'requester.php';
    include_once '../../config/pathconfig.php';

    $requester = new Requester($apiUrl.'/Tasks.php');

    $result = $requester->delete_request($_POST);
    #var_dump($result);
    header('Location: ../index.php');
    exit();
}






?>