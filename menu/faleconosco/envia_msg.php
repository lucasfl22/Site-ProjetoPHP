<?php 
include_once("config.inc.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $telefone = $_REQUEST['telefone'];
    $mensagem = $_REQUEST['mensagem'];

    $tipo = $_REQUEST['tipo_mensagem'];
    $comentario = ($tipo == 'comentario');
    $denuncia = ($tipo == 'denuncia');
    $sugestao = ($tipo == 'sugestao');
    $avaliacao = ($tipo == 'avaliacao');

    $sql = "INSERT INTO contato (nome, email, telefone, mensagem, comentario, denuncia, sugestao, avaliacao) 
    VALUES ('$nome', '$email', '$telefone', '$mensagem', '$comentario', '$denuncia', '$sugestao', '$avaliacao')";

    $query = mysqli_query($conexao, $sql);

    if (!$query) {
        die("Erro ao enviar mensagem!");
    }

    mysqli_close($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem Enviada</title>
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
        <h1 class="header-title">Obrigado pela mensagem!</h1>
        <p class="message-text">Recebemos sua mensagem e ela será cuidadosamente avaliada pela nossa equipe. Em breve, entraremos em contato se necessário. Agradecemos por sua contribuição!</p>
        <a href="/projetophp/index.php" class="back-link">Voltar para a página inicial</a>
    </div>
</body>
</html