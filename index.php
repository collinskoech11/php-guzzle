<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Guzzle</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6181b6;">
        <div class="container">
            <a class="navbar-brand text-white">
                <img src="image/logo.jpg" width="120px" height="60px" alt=""> Busca de CNPJ
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0" action="controller/RecebeDados.php" method="post">
                    <input name="cnpj" type="text" class="form-control mr-sm-4" placeholder="Digite um CNPJ" autofocus>
                    <button class="btn btn-outline-light my-2 my-sm-0">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="fundo">
        <? if(isset($_SESSION['erro'])): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <? echo $_SESSION['erro']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <? unset($_SESSION['erro']); ?>
        <? endif; ?>
        <div class="container-fluid">
            <? if(isset($_SESSION['response'])): ?>
            
            <dl class="lista">
                <div class="row">
                    <dt class="col-sm-2">Empresa:</dt>
                    <dd class="col-sm-8"><? echo ($_SESSION['response']->nome); ?></dd>
                </div>
                <div class="row">
                    <dt class="col-sm-2">Telefone:</dt>
                    <dd class="col-sm-2"><? echo ($_SESSION['response']->telefone); ?></dd>
                </div>
                <div class="row">
                    <dt class="col-sm-2">E-mail:</dt>
                    <dd class="col-sm-8"><? echo ($_SESSION['response']->email); ?></dd>
                </div>
                <div class="row">
                    <dt class="col-sm-2">Endereço:</dt>
                    <dd class="col-sm-8"><? echo ($_SESSION['response']->logradouro . $_SESSION['response']->numero . $_SESSION['response']->bairro . $_SESSION['response']->municipio); ?></dd>
                </div>
                <? foreach($_SESSION['response']->atividade_principal as $atividade): ?>
                <div class="row">
                    <dt class="col-sm-2">Atividade Principal:</dt>
                    <dd class="col-sm-8"><? echo $atividade->text; ?></dd>
                </div>
                <? endforeach; ?>
                <dt>Sóicios-Administradores:</dt>
                <? foreach($_SESSION['response']->qsa as $socio): ?>
                <ul>
                    <li>Cargo: <? echo $socio->qual; ?></li>
                    <li>Nome: <? echo $socio->nome; ?></li>
                </ul>
                <? endforeach; ?>
            </dl>
            <footer>
                <form action="controller/RecebeDados.php" method="post">
                    <input type="submit" name="reset" class="btn btn-secondary" value="Limpar">
                </form>
            </footer>
            <? endif; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

