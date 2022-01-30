<?php

class TaskController
{
    private $taskModel;

    public function __construct($taskModel)
    {
        $this->taskModel = $taskModel;
    }
    #função que requisita todas as task
    function getTasks()
    {
        $result = $this->taskModel->getAllTasks();
        $num = $result->rowCount();
        if ($num > 0) {
            $tasks_arr = array();
            $tasks_arr['data'] = array();

            while ($row = $result->fetch()) {
                $task_item = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'completed' => $row['completed'],
                    'creation_date' => $row['creation_date'],
                    'end_date' => $row['end_date'],

                );
                array_push($tasks_arr['data'], $task_item);
            }
            return $tasks_arr;
        } else {
            return null;
        }
    }

    #função que retorna apenas uma task passando o ID
    function getSingleTask($id)
    {
        $result = $this->taskModel->getTaskById($id);
        $num = $result->rowCount();
        if ($num > 0) {
            $tasks_arr = array();
            $tasks_arr['data'] = array();

            while ($row = $result->fetch()) {
                $task_item = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'completed' => $row['completed'],
                    'creation_date' => $row['creation_date'],
                    'end_date' => $row['end_date'],

                );
                array_push($tasks_arr['data'], $task_item);
            }

            return $tasks_arr;
        } else {
            return null;
        }
    }
    #função que cria uma nova Task
    function createTask(
        $title,
        $description,
        $end_date
    ) {
        try {
            $this->taskModel->createTask(
                $title,
                $description,
                false,
                date("Y-m-d"),
                $end_date
            );
            return true;
        } catch (Exception  $e) {
            return false;
        }
    }


    function editTask(
        $id,
        $title = null,
        $description = null,
        $completed = null,
        $end_date = null
    ) { 
        try {
            $this->taskModel->editTask(
                $id,
                $title,
                $description,
                $completed,
                $end_date
            );
            return true;
        } catch (Exception  $e) {
            return false;
        }
    }


    function deleteTask($id)
    {
        try {
            $res = $this->taskModel->deleteTask(
                $id
            );
            return $res;
        } catch (Exception  $e) {
            return false;
        }
    }
}
