<?php


if(isset($_POST)){
    include_once 'requester.php';
    include_once '../../config/pathconfig.php';


    $requester = new Requester($apiUrl.'/Tasks.php');
    isset($_POST['completed'])?$_POST['completed'] = true :$_POST['completed']=false;

    $result = $requester->put_request($_POST);
    header('Location: ../index.php#'.$_POST['id']);
    exit();


}






?>