<?php
session_start();

require 'busca_cnpj.php';

$buscaCnpj = new BuscaCnpj();

if (isset($_POST['cnpj'])) {
    $cnpj = preg_replace("/[^0-9]/", "", $_POST['cnpj']);
    
    if ($buscaCnpj->busca($cnpj)) {
        $_SESSION['response'] = $buscaCnpj->busca($cnpj);
    }
    else {
        $_SESSION['erro'] = "Algo errado aconteceu";
    }
        
}
elseif (isset($_POST['reset'])) {
    unset($_SESSION['response']);
}

header("Location:index.php");

exit;