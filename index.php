<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <header>
        <meta charset="utf-8">
        <title>Agenda de contatos</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB' crossorigin='anonymous' />
        <link href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' rel='stylesheet' integrity='sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt' crossorigin='anonymous' />
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js' integrity='sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T' crossorigin='anonymous'></script>
    </header>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Painel de Controle</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=ContatosController&method=listar">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=UsuariosController&method=listar">Usuários</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
        <?php
        if ($_GET) {
            $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
            $method     = isset($_GET['method']) ? $_GET['method'] : null;
            if ($controller && $method) {
                if (method_exists($controller, $method)) {
                    $parameters = $_GET;
                    unset($parameters['controller']);
                    unset($parameters['method']);
                    call_user_func(array($controller, $method), $parameters);
                } else {
                    echo "Método não encontrado!";
                }
            } else {
                echo "Controller não encontrado!";
            }
        } else {
            echo '<h1>Bem-vindo!</h1><hr>';
            echo 'Escolha uma das opções abaixo para começar a gerenciar o sistema: <br /><br />';
            echo '<div class="row">';
            echo '  <div class="col-sm-6 mb-3">';
            echo '    <div class="card">';
            echo '      <div class="card-body">';
            echo '        <h5 class="card-title"><i class="fas fa-address-book text-success"></i> Contatos</h5>';
            echo '        <p class="card-text">Gerencie a lista de contatos, telefones e emails cadastrados.</p>';
            echo '        <a href="?controller=ContatosController&method=listar" class="btn btn-success">Gerenciar Contatos</a>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '  <div class="col-sm-6 mb-3">';
            echo '    <div class="card">';
            echo '      <div class="card-body">';
            echo '        <h5 class="card-title"><i class="fas fa-users text-primary"></i> Usuários</h5>';
            echo '        <p class="card-text">Gerencie os usuários do sistema, senhas e status ativo.</p>';
            echo '        <a href="?controller=UsuariosController&method=listar" class="btn btn-primary">Gerenciar Usuários</a>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
        ?>
        </div>

    </body>
</html>