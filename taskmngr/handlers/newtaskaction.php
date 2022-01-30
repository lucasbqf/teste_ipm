<?php


if(isset($_POST)){
    include_once 'requester.php';
    include_once '../../config/pathconfig.php';

    $requester = new Requester($apiUrl.'/Tasks.php');
    isset($_POST['completed'])?$_POST['completed'] = true :$_POST['completed']=false;

    $result = $requester->post_request($_POST);
    header('Location: ../index.php');
    exit();
}






?>