<?php
session_start();

spl_autoload_register(function($nomeClasse) {
    
    $nomeArquivo =  '..' . DIRECTORY_SEPARATOR . $nomeClasse . '.php';
    $nomeArquivo = str_replace( (DIRECTORY_SEPARATOR === '/' ? '\\' : '/'), DIRECTORY_SEPARATOR, $nomeArquivo);

    if (file_exists($nomeArquivo)) {
        require_once($nomeArquivo);
    }
});