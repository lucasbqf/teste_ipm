<?php


#gera o template base para o Site
function renderBaseTemplate($title, $body)
{
  return '<!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <title>' . $title . '</title>
      </head>
      <body style= "background-color:grey;">
      <nav class="navbar navbar-dark bg-dark" style="z-index: 10000;width: 100%;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Gerenciador de Tarefas</a>
          <li class="nav-item">
          <a class="btn btn-outline-success" href="newtask.php">Nova Tarefa</a>
          </li>
        </div>
      </nav>
      <div class="mt-5" style=" height: 100%; display: flex; flex-direction: column;">
        ' . $body . '    
      </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </body>
    </html>
    ';
}


function renderPage(){
  $html = '';
  return $html;
}