<?php 

    include_once '../menu/faleconosco/config.inc.php';

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($resultado);

    if(mysqli_num_rows($resultado) > 0) {
        session_start();
        $_SESSION['user_id'] = $dados['id'];
        $_SESSION['usuario'] = $dados['usuario'];
        header('Location: index.php');
        exit();
    } else {
        session_start();
        session_unset();
        session_destroy();
        header('Location: form_login.php?erro=1');
        exit();
    }

?>