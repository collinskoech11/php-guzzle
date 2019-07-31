<?php
require_once('../config.php');

use Classes\BuscaCnpj;

$buscaCnpj = new BuscaCnpj();

if (isset($_POST['cnpj'])) {
    $cnpj = preg_replace("/[^0-9]/", "", $_POST['cnpj']);
    
    if ($buscaCnpj->busca($cnpj)) {
        $resultado = $buscaCnpj->busca($cnpj);
        $_SESSION['response'] = json_decode($resultado);
    }
    else {
        $_SESSION['erro'] = "Alguma coisa deu errado";
    }
        
}
elseif (isset($_POST['reset'])) {
    unset($_SESSION['response']);
}

header("Location:../index.php");

exit;