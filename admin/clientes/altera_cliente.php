<?php

include_once("../../menu/faleconosco/config.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($conexao) || !$conexao) {
        die("Erro na conexão com o banco de dados");
    }

    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    
    $sql = "UPDATE cliente SET 
            nome = '$nome',
            email = '$email',
            telefone = '$telefone',
            cidade = '$cidade',
            estado = '$estado'
            WHERE id = '$id'";
    
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Cliente atualizado com sucesso!'); window.location.href='../index.php?pg=clientes/lista_clientes';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar cliente: " . mysqli_error($conexao) . "'); window.location.href='../index.php?pg=clientes/lista_clientes';</script>";
    }
    
    mysqli_close($conexao);
}

else {
    echo "<script>alert('Método inválido!'); window.location.href='../index.php?pg=clientes/lista_clientes';</script>";
}

?>