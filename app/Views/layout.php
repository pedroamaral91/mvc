<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Saura Clientes</title>
    
    <link href="/assets/css/bootstrap/compiler/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/bootstrap/compiler/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">

  </head>
  <body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-black hover">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarCenter">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navBarCenter">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/clientes">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="/clientes/cadastro">Clientes Cadastro</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </header>
    <main>
    <?php $this->content(); ?>
    </main>

    <footer>
    
    </footer>
    <script src="/assets/node_modules/jquery/dist/jquery.js"></script>
    <script src="/assets/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="/assets/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>