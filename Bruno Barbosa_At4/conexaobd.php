<?php


$hostServer = "127.0.0.1";
$portaServidor = "3306";
$nomeBancoDados = "ProgWebBD";
$usuarioBanco = "root";
$senhaBanco = "";

    $conexaoBanco = new PDO("mysql:host={$hostServer};port={$portaServidor};dbname={$nomeBancoDados}",$usuarioBanco, $senhaBanco);
    
    $conexaoBanco ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>