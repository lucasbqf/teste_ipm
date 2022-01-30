<?php


#função que gera a tele de alteração de tarefas
function renderAlterTask($data){
    $checked = $data['completed']==1?'checked="true"':'';
    $html = '<div class="card mx-5 pl-3 pr-1" >
    <div class="card-body">
        <div class="container row">
            <div class="col-10">
                <form action="./handlers/altertaskaction.php" method="post">
                    <div class="col">
                        <div class="form-group">
                            <label for="id">Codigo da Tarefa</label>
                            <input class="form-control" name="id" readonly value ="'.$data['id'].'">
                        </div>
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input class="form-control" name="title"placeholder="Titulo" value ="'.$data['title'].'">
                        </div>
                        <div class="form-group">
                            <label for="title">Descrição</label>
                            <textarea class="form-control" name="description" placeholder="Escreva aqui a descrição" rows="3">'.$data['description'].'</textarea>
                        </div>
                        <div class="form-group my-1" >
                            <label class="form-check-label" for="end_date">Data Limite </label>
                            <input type="date" name="end_date" value="'.$data['end_date'].'">    
                        </div>
                        <div class="form-check ">
                            <input type="checkbox" class="form-check-input" name="completed" '.$checked.' >
                            <label class="form-check-label" for="completed">Tarefa Completa</label>
                        </div >
                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-primary">Finalizar Alteração</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2 align-self-end">
                <form action="./handlers/deletetaskaction.php" method="post">
                    <input type="hidden" id="id" name="id" value="'.$data['id'].'">
                    <button type="submit" class="btn btn-danger">Apagar Tarefa</button>
                </form>
            </div>
        </div>
    </div>
  </div>'; 

  return $html;
}
