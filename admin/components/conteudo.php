<?php
// Consultas para obter as contagens
$sql_clientes = mysqli_query($conexao, "SELECT COUNT(*) as total_clientes FROM cliente");
$total_clientes = mysqli_fetch_assoc($sql_clientes)['total_clientes'];

$sql_mensagens = mysqli_query($conexao, "SELECT COUNT(*) as total_mensagens FROM contato");
$total_mensagens = mysqli_fetch_assoc($sql_mensagens)['total_mensagens'];

$sql_cidades = mysqli_query($conexao, "SELECT COUNT(DISTINCT cidade) as total_cidades FROM cliente");
$total_cidades = mysqli_fetch_assoc($sql_cidades)['total_cidades'];

// Adicionar verificação de sessão se necessário
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<div class="admin-dashboard">
    <header class="dashboard-header">
        <div class="header-content">
            <div class="header-left">
                <h3 class="welcome-text">Olá, <?php echo $_SESSION['usuario']; ?> seja bem-vindo(a) à área administrativa, aqui você pode gerenciar da melhor forma o seu site.</h3>
            </div>
            <div class="header-right">
                <a href="logout.php" class="logout-btn">
                    <i class="fas fa-power-off"></i>
                    Sair do Sistema
                </a>
            </div>
        </div>
    </header>

    <div class="dashboard-stats">
        <div class="stat-card">
            <i class="fas fa-users"></i>
            <div class="stat-info">
                <h3>Total de Clientes</h3>
                <p><?php echo $total_clientes; ?></p>
            </div>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-envelope"></i>
            <div class="stat-info">
                <h3>Mensagens Recebidas</h3>
                <p><?php echo $total_mensagens; ?></p>
            </div>
        </div>

        <div class="stat-card">
            <i class="fas fa-city"></i>
            <div class="stat-info">
                <h3>Cidades Atendidas</h3>
                <p><?php echo $total_cidades; ?></p>
            </div>
        </div>
    </div>

    <div class="quick-actions">
        <h3>Menu Rápido</h3>
        <div class="action-buttons">
            <a href="?pg=mensagens/listarMensagens" class="action-btn">
                <i class="fas fa-envelope"></i>
                Listar Mensagens
            </a>
            <a href="?pg=clientes/lista_clientes" class="action-btn">
                <i class="fas fa-users"></i>
                Listar Clientes
            </a>
            <a href="?pg=clientes/form_cliente" class="action-btn">
                <i class="fas fa-user-plus"></i>
                Cadastrar Cliente
            </a>
            <a href="../index.php" class="action-btn">
                <i class="fas fa-home"></i>
                Voltar para o site
            </a>
        </div>
    </div>
</div>

<style>
.admin-dashboard {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.dashboard-header {
    margin-bottom: 20px;
    background: linear-gradient(135deg, #8B0000, #FF0000);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(139,0,0,0.1);
}

.dashboard-stats {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.stat-card {
    flex: 1;
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border: 1px solid rgba(139,0,0,0.1);
}

.stat-card i {
    font-size: 1.8em;
    color: #8B0000;
}

.stat-info h3 {
    color: #444;
    font-size: 0.9em;
    margin: 8px 0;
}

.stat-info p {
    color: #8B0000;
    font-size: 1.4em;
    font-weight: 600;
    margin: 0;
}

.quick-actions {
    margin-top: 20px;
}

.action-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.action-btn {
    background: #fff;
    color: #8B0000;
    border: 2px solid #8B0000;
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.action-btn:hover {
    background: #8B0000;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139,0,0,0.2);
}

.action-btn i {
    font-size: 1em;
}

.dashboard-header .header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-left {
    flex: 1;
}

.header-right {
    padding-left: 20px;
}

.logout-btn {
    background: #fff;
    color: #8B0000;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 0.9em;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border: 2px solid #fff;
}

.logout-btn:hover {
    background: #8B0000;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.logout-btn i {
    font-size: 1.2em;
}
</style>