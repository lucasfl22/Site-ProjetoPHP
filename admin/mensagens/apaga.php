<?php
include_once("../../menu/faleconosco/config.inc.php");

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
            background: linear-gradient(135deg, #8B0000, #CD5C5C);
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
            color: #ffffff;
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
            background-color: #ffffff;
            color: #8B0000;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        .back-link:hover {
            background-color: #B22222;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .icon {
            font-size: 3em;
            margin-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="body-section">
    <div class="container">
        <?php if($status == 'sucesso'): ?>
            <div class="icon"><i class="fas fa-check-circle"></i></div>
            <h1 class="header-title">Mensagem Apagada!</h1>
            <p class="message-text">A mensagem foi apagada com sucesso do sistema.</p>
        <?php elseif($status == 'erro'): ?>
            <div class="icon"><i class="fas fa-times-circle"></i></div>
            <h1 class="header-title">Erro!</h1>
            <p class="message-text">Ocorreu um erro ao tentar apagar a mensagem.</p>
        <?php else: ?>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <h1 class="header-title">Erro!</h1>
            <p class="message-text">ID não fornecido para exclusão.</p>
        <?php endif; ?>
        <a href="../index.php?pg=mensagens/listarMensagens" class="back-link">
            <i class="fas fa-arrow-left"></i> Voltar para lista de mensagens
        </a>
    </div>
</body>
</html> 