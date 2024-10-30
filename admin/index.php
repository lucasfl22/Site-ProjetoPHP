<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corinthians - Página Principal</title>
    <link rel="stylesheet" href="../topo/topo.css">
    <link rel="stylesheet" href="../conteudo/conteudo.css">
    <link rel="stylesheet" href="../menu/menu.css">
    <link rel="stylesheet" href="../rodape/rodape.css">
    <link rel="stylesheet" href="../menu/historia/historia.css">
    <link rel="stylesheet" href="../menu/jogos/jogos.css">
    <link rel="stylesheet" href="../menu/redes/redes.css">
    <link rel="stylesheet" href="../menu/faleconosco/faleconosco.css">
    <link rel="stylesheet" href="../campeonatos/campeonatos.css">
    <link rel="stylesheet" href="../menu/faleconosco/agradecimento.css">
    <link rel="stylesheet" href="../index.css">
</head>
<body>
<?php 

    include_once("topo.php");
    include_once("menu.php");
    
    include_once("../menu/faleconosco/config.inc.php");
    
    if (empty($_SERVER["QUERY_STRING"])) {
        $var = "conteudo.php";
        include_once("$var");
    } else {
        $pg = $_GET['pg'];
        include_once("$pg.php");
    }

    include_once("../rodape/rodape.php");

?>