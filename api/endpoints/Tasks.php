<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../models/Task.php';
include_once '../controllers/TaskController.php';

#estancia o banco de dandos e realiza a conexão
$database = new DataBase();
$db = $database->connect();
#cria o objeto de tasks que faz a comunicação com o banco
$taskModel = new Task($db);
$taskController = new TaskController($taskModel);


# verifica as requisições e realiza o codigo conforme o metodo da request
if (isset($_SERVER['REQUEST_METHOD'])) {
    switch ($_SERVER['REQUEST_METHOD']) {
            #caso metodo get
        case 'GET':
            # se nao requisita nenhum id, mostra todas as tarefas
            if (!isset($_GET['id'])) {
                $res = $taskController->getTasks();
                #se requisita com um id procura apenas uma Task
            } else {
                $res = $taskController->getSingleTask($_GET['id']);
            }

            #verifica se o retorno existe e encoda e envia
            if (isset($res)) {
                echo json_encode($res);
            }
            #se nao ha tarefas ou a tarefa nao existe retorna msg
            else {
                header('X-PHP-Response-Code: 404', true, 404);
                echo json_encode(array('message' => 'no tasks found'));
            }
            break;

        case 'PUT':
            #captura as infos do body
            $body = json_decode(file_get_contents('php://input'), true);
            #se tem as infos necessarias para criar uma nova task
            if (isset($body['id'])) {

                #verificando se as informações estao nulas
                $title = isset($body['title']) ? $body['title'] : null;
                $description = isset($body['description']) ? $body['description'] : null;
                $completed = isset($body['completed']) ? $body['completed'] : null;
                $end_date = isset($body['end_date']) ? $body['end_date'] : null;


                $res = $taskController->editTask($body['id'], $title, $description, $completed, $end_date);
                if ($res) {
                    echo json_encode(array('message' => 'task edited successfully'));
                } else {
                    header('X-PHP-Response-Code: 500', true, 500);
                    echo json_encode(array('message' => 'there was a problem trying to edit the task'));
                }
            } else {
                header('X-PHP-Response-Code: 400', true, 400);
                echo json_encode(array('message' => ' a especific id is required to edit a task'));
            }
            break;

            #metodo para criar novas Tasks
        case 'POST':
            #captura as infos do body
            $body = json_decode(file_get_contents('php://input'), true);
            #se tem as infos necessarias para criar uma nova task
            if (isset($body['title'], $body['description'], $body['end_date'])) {

                $res = $taskController->createTask($body['title'], $body['description'], $body['end_date']);
                if ($res) {
                    echo json_encode(array('message' => 'task created successfully'));
                } else {
                    header('X-PHP-Response-Code: 500', true, 500);
                    echo json_encode(array('message' => 'there was a problem trying to create the task'));
                }
            } else {
                header('X-PHP-Response-Code: 400', true, 400);
                echo json_encode(array('message' => 'to create a task title,description and end_date is needed '));
            }
            break;

        case 'DELETE':
            $body = json_decode(file_get_contents('php://input'), true);
            if (isset($body['id'])) {
                $res = $taskController->deleteTask($body['id']);
                if ($res) {
                    echo json_encode(array('message' => 'task deleted successfully'));
                } else {
                    header('X-PHP-Response-Code: 500', true, 500);
                    echo json_encode(array('message' => 'there was a problem trying to delete the task'));
                }
            } else {
                header('X-PHP-Response-Code: 400', true, 400);
                echo json_encode(array('message' => 'to delete a task a "id" is needed '));
            }
            break;
    }
}
