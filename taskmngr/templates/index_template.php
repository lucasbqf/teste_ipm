<?php

#gera a pagina inicial com todas as tarefas
function renderIndexPage($data){
    $tasksData = renderAllTasks($data);
    $html = '
              <div>
                <div class="d-flex flex-column">'.$tasksData. '</div>
              </div>
            ';
    return $html;
  }
  
  #renderiza as tarefas em forma de Cards.
  function renderAllTasks($data)
  {
    $html = '';
    foreach ($data as $task) {
      $task['id'];
      $task['title'];
      $task['description'];
      $task['completed'];
      $task['creation_date'];
      $task['end_date'];
      
      $status = ($task['completed']==1)?'Completa':'Incompleta';
      $disabled = ($task['completed']==0)?'>finalizar</button>':'disabled>finalizado</button>';
      $html = $html . ' <div id="'.$task['id'].'" class="card mx-5 my-1 px-3" >
                          <div class="card-body col ml-0">
                            <div class="row justify-content-between">
                              <h3 class="card-title col-8">' . $task['title'] . '</h3>
                              <div class ="col-2">
                                <h5 style="text-align:end;color:gray">cod: '.$task['id'].'</h3>
                              </div>
                            </div>
                            
                            <h6 class="card-text row-4">' . $task['description'] . '</h6>
                            <p class="card-text">Status: ' . $status . '</p>
                            <p class=" col-7">Data de Criação: ' . $task['creation_date'] . ' | Data Limite: '.$task['end_date'].'</p>
                            <form action="./handlers/altertaskaction.php" method="post">
                              <div class="row justify-content-end" style="background-color">
                                <input type="hidden" id="id" name="id" value="'.$task['id'].'">
                                <input type="hidden" name="completed" value="true">
                                <a href="./altertask.php?id='.$task['id'].'" class="btn btn-primary col-2 mx-2">Alterar</a>
                                <button type="submit" class="btn btn-danger col-2"'.$disabled.'
                              </div>
                            </form>                    
                          </div>
                        </div>
              ';
    }
    return $html;
  }
  

?>