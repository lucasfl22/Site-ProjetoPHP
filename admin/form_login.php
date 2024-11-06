<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Área Administrativa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2><i class="fas fa-lock"></i> Login Administrativo</h2>

            <?php if(isset($_GET['erro'])): ?>
            <div class="erro-mensagem">
                <i class="fas fa-exclamation-circle"></i>
                Usuário ou senha incorretos!
            </div>
            <?php endif; ?>

            <form action="login.php" method="post">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="usuario" required placeholder="Usuário">
                </div>
                <div class="input-group">
                    <i class="fas fa-key"></i>
                    <input type="password" name="senha" required placeholder="Senha">
                </div>
                <button type="submit">Entrar <i class="fas fa-sign-in-alt"></i></button>
            </form>
            <a href="../index.php" class="voltar-site">
                <i class="fas fa-home"></i> Voltar ao Site
            </a>
        </div>
    </div>

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #800020, #FF0000);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
    }

    .login-box {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }

    h2 {
        color: #8B0000;
        text-align: center;
        margin-bottom: 30px;
    }

    .input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #8B0000;
    }

    input {
        width: 100%;
        padding: 12px 40px;
        border: 2px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    input:focus {
        border-color: #8B0000;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #8B0000;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    button:hover {
        background: #FF0000;
        transform: translateY(-2px);
    }

    .voltar-site {
        display: block;
        text-align: center;
        color: #8B0000;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .voltar-site:hover {
        color: #FF0000;
    }

    .erro-mensagem {
        background-color: #ffebee;
        color: #c62828;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
        border: 1px solid #ef9a9a;
    }

    .erro-mensagem i {
        margin-right: 5px;
    }
    </style>
</body>
</html>