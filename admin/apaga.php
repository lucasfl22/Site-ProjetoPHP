<?php
include_once("../menu/faleconosco/config.inc.php");

$status = 'erro';
$id = $_GET['id'];

if(isset($id)) {
    $sql = "DELETE FROM contato WHERE id = $id";
    $query = mysqli_query($conexao, $sql);
    $status = $query ? 'sucesso' : 'erro';
} else {
    $status = 'sem_id';
}

mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status da Operação</title>
    <style>
        .body-section {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #000000, #555555);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            text-align: center;
        }
        .header-title {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #ff3d00;
        }
        .message-text {
            font-size: 1.2em;
            line-height: 1.5;
            color: #ffffff;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff3d00;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-link:hover {
            background-color: #e63900;
        }
    </style>
</head>
<body class="body-section">
    <div class="container">
        <?php if($status == 'sucesso'): ?>
            <h1 class="header-title">Mensagem Apagada!</h1>
            <p class="message-text">A mensagem foi apagada com sucesso do sistema.</p>
        <?php elseif($status == 'erro'): ?>
            <h1 class="header-title">Erro!</h1>
            <p class="message-text">Ocorreu um erro ao tentar apagar a mensagem.</p>
        <?php else: ?>
            <h1 class="header-title">Erro!</h1>
            <p class="message-text">ID não fornecido para exclusão.</p>
        <?php endif; ?>
        <a href="index.php" class="back-link">Voltar para lista de mensagens</a>
    </div>
</body>
</html> 