<?php


//ha um problema com o metodo de concatenar as string de sql, sendo possivel sofrer ataques de SQLinjection.
// porem realizado deste modo por conveniencia


#classe de modelo das Tarefas realiza o acesso e edita todas as informações necessarias sobre tarefas
class Task
{
    private $conn;
    private $table = 'tasks';

    public $id;
    public $title;
    public $description;
    public $completed;
    public $creation_date;
    public $end_date;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    #acessa o banco e retorna todos as tasks
    public function getAllTasks()
    {
        //query
        $query = 'SELECT * FROM ' . $this->table;
        //statement
        $statmt = $this->conn->prepare($query);
        //execution
        $statmt->execute();

        return $statmt;
    }
    #acessa o banco e retorna apenas a task com id referente
    public function getTaskById($id)
    {
        //query
        //SQL INJECTION: buscar outro meio de realizar a query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=' . $id;

        //statement
        $statmt = $this->conn->prepare($query);
        //execution
        $statmt->execute();

        return $statmt;
    }

    #cria uma nova task 
    public function createTask(
        $title,
        $description,
        $completed,
        $creation_date,
        $end_date
    ) {
        //query
        $query = 'INSERT INTO tasks (title,description,completed,creation_date,end_date)
        VALUES("' . $title . '","' . $description . '","' . $completed . '","' . $creation_date . '","' . $end_date . '");';

        //statement
        $statmt = $this->conn->prepare($query);
        //execution
        $statmt->execute();

        return $statmt;
    }




    public function editTask(
        $id,
        $title = null,
        $description = null,
        $completed = null,
        $end_date = null
    ) {

        $queryTitle = isset($title) ? ',title = "' . $title . '" ' : '';
        $queryDesc = isset($description) ? ',description = "' . $description . '" ' : '';
        $querycompleted = isset($completed) ? ',completed = "' . $completed . '" ' : '';
        $queryEnd_date = isset($end_date) ? ',end_date = "' . $end_date . '" ' : '';

        $query = 'UPDATE tasks SET id=' . $id . $queryTitle . $queryDesc . $querycompleted . $queryEnd_date . ' WHERE id=' . $id;

        //statement
        $statmt = $this->conn->prepare($query);
        //execution
        $statmt->execute();

        return $statmt;
    }

    public function deleteTask($id)
    {
        $query = 'DELETE FROM tasks WHERE id=' . $id;

        //statement
        $statmt = $this->conn->prepare($query);
        //execution
        $statmt->execute();

        return $statmt->rowCount() > 0 ? true : false;
    }
}
