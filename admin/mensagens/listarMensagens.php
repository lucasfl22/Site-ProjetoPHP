<div class="mensagens-container">
    <h2><i class="fas fa-envelope"></i> Mensagens Recebidas</h2>
    
    <?php 
    $sql = mysqli_query($conexao, "SELECT * FROM contato ORDER BY id DESC");

    if (mysqli_num_rows($sql) == 0) {
        echo "<div class='mensagem-vazia'>Nenhuma mensagem encontrada.</div>";
    } else {
        while($tabela = mysqli_fetch_array($sql)) {
            echo "<div class='mensagem-card'>";
            echo "<div class='mensagem-header'>";
            echo "<h3>$tabela[nome]</h3>";
            
            // Lógica para mostrar o tipo de mensagem   
            $tipo_mensagem = "";
            if ($tabela['comentario'] == 1) {
                $tipo_mensagem = "<span class='badge comentario'>Comentário</span>";
            } elseif ($tabela['denuncia'] == 1) {
                $tipo_mensagem = "<span class='badge denuncia'>Denúncia</span>";
            } elseif ($tabela['sugestao'] == 1) {
                $tipo_mensagem = "<span class='badge sugestao'>Sugestão</span>";
            } elseif ($tabela['avaliacao'] == 1) {
                $tipo_mensagem = "<span class='badge avaliacao'>Avaliação</span>";
            }
            echo $tipo_mensagem;
            echo "</div>";
            
            echo "<div class='mensagem-content'>";
            echo "<p><i class='fas fa-envelope'></i> $tabela[email]</p>";
            echo "<p><i class='fas fa-phone'></i> $tabela[telefone]</p>";
            echo "<p class='mensagem-texto'><i class='fas fa-comment'></i> $tabela[mensagem]</p>";
            echo "</div>";
            
            echo "<div class='mensagem-actions'>";
            echo "<a href='mensagens/apaga.php?id=" . $tabela['id'] . "' class='btn-delete' onclick='return confirm(\"Tem certeza que deseja apagar esta mensagem?\")'>";
            echo "<i class='fas fa-trash'></i> Apagar Mensagem</a>";
            echo "</div>";
            echo "</div>";
        }
    }

    mysqli_close($conexao);
    ?>
</div>

<style>
.mensagens-container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.mensagens-container h2 {
    color: #8B0000;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #8B0000;
}

.mensagem-card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 1px solid rgba(139,0,0,0.1);
}

.mensagem-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.mensagem-header h3 {
    margin: 0;
    color: #8B0000;
}

.badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8em;
    font-weight: bold;
}

.comentario { background: #e3f2fd; color: #1565c0; }
.denuncia { background: #ffebee; color: #c62828; }
.sugestao { background: #e8f5e9; color: #2e7d32; }
.avaliacao { background: #fff3e0; color: #ef6c00; }

.mensagem-content {
    margin-bottom: 15px;
}

.mensagem-content p {
    margin: 8px 0;
    color: #555;
}

.mensagem-content i {
    color: #8B0000;
    width: 20px;
    margin-right: 8px;
}

.mensagem-texto {
    background: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
}

.btn-delete {
    background: #ff1744;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-delete:hover {
    background: #d50000;
    transform: translateY(-2px);
}

.mensagem-vazia {
    text-align: center;
    padding: 40px;
    background: #f5f5f5;
    border-radius: 8px;
    color: #666;
}
</style>