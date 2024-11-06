<?php

include_once("../../menu/faleconosco/config.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$conexao) {
        die("Erro na conexão com o banco de dados");
    }

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    
    $sql = "INSERT INTO cliente (nome, email, telefone, cidade, estado) 
            VALUES ('$nome', '$email', '$telefone', '$cidade', '$estado')";
    
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Cliente cadastrado com sucesso!'); window.location.href='../index.php?pg=clientes/lista_clientes';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar cliente: " . mysqli_error($conexao) . "'); window.location.href='../index.php?pg=clientes/lista_clientes';</script>";
    }
    
    mysqli_close($conexao);
}

?>