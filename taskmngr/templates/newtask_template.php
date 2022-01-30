<?php


#template para gerar a tela de criação de tarefas
function renderNewTask(){
    $html = '<div class="card mx-5 p-3" >
    <div class="card-body">
        <form class="col" action="./handlers/newtaskaction.php" method="post">
            <div class="form-group">
                <label for="title">Titulo:</label>
                <input class="form-control" name="title"placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea class="form-control" name="description" placeholder="Escreva aqui a descrição" rows="3"></textarea>
            </div>
            <div class="form-group my-1" >
                <label class="form-check-label" for="end_date">Data Limite: </label>
                <input type="date" name="end_date">    
            </div>
            <div class="row justify-content-between">
                <button type="submit" class="col-9 btn btn-primary">Criar Tarefa</button>
                <a href="./index.php" class="col-2 btn btn-danger">Cancelar</a>
            </div>
            
        </form>
    </div>
  </div>'; 
  return $html;
}

?>