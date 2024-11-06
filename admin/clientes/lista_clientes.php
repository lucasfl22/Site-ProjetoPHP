<div class="clientes-container">
    <div class="header-actions">
        <h2><i class="fas fa-users"></i> Clientes Cadastrados</h2>
        <a href="?pg=clientes/form_cliente" class="btn-add">
            <i class="fas fa-user-plus"></i> Cadastrar Novo Cliente
        </a>
    </div>

    <div class="clientes-grid">
        <?php 
        $sql = mysqli_query($conexao, "SELECT * FROM cliente ORDER BY id DESC");

        if (mysqli_num_rows($sql) == 0) {
            echo "<div class='cliente-vazio'>
                    <i class='fas fa-users'></i>
                    <p>Nenhum cliente encontrado.</p>
                </div>";
        } else {
            while($tabela = mysqli_fetch_array($sql)) {
                echo "<div class='cliente-card'>";
                echo "<div class='cliente-info'>";
                echo "<h3><i class='fas fa-user'></i> $tabela[nome]</h3>";
                echo "<p><i class='fas fa-envelope'></i> $tabela[email]</p>";
                echo "<p><i class='fas fa-phone'></i> $tabela[telefone]</p>";
                echo "<p><i class='fas fa-map-marker-alt'></i> $tabela[cidade] - $tabela[estado]</p>";
                echo "</div>";
                
                echo "<div class='cliente-actions'>";
                echo "<a href='?pg=clientes/form_altera_cliente&id=" . $tabela['id'] . "' class='btn-edit'>";
                echo "<i class='fas fa-edit'></i> Editar</a>";
                
                echo "<a href='clientes/apaga_cliente.php?id=" . $tabela['id'] . "' class='btn-delete' 
                    onclick='return confirm(\"Tem certeza que deseja apagar este cliente?\")'>";
                echo "<i class='fas fa-trash'></i> Apagar</a>";
                echo "</div>";
                echo "</div>";
            }
        }

        mysqli_close($conexao);
        ?>
    </div>
</div>

<style>
.clientes-container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.header-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.header-actions h2 {
    color: #8B0000;
    margin: 0;
}

.btn-add {
    background: #8B0000;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-add:hover {
    background: #FF0000;
    transform: translateY(-2px);
}

.clientes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.cliente-card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 1px solid rgba(139,0,0,0.1);
    transition: transform 0.3s ease;
}

.cliente-card:hover {
    transform: translateY(-5px);
}

.cliente-info h3 {
    color: #8B0000;
    margin: 0 0 15px 0;
}

.cliente-info p {
    margin: 8px 0;
    color: #555;
}

.cliente-info i {
    width: 20px;
    color: #8B0000;
    margin-right: 8px;
}

.cliente-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.btn-edit, .btn-delete {
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    flex: 1;
    justify-content: center;
    transition: all 0.3s ease;
}

.btn-edit {
    background: #8B0000;
    color: white;
}

.btn-edit:hover {
    background: #FF0000;
}

.btn-delete {
    background: #ff1744;
    color: white;
}

.btn-delete:hover {
    background: #d50000;
}

.cliente-vazio {
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px;
    background: #f5f5f5;
    border-radius: 8px;
    color: #666;
}

.cliente-vazio i {
    font-size: 3em;
    color: #8B0000;
    margin-bottom: 10px;
}
</style>