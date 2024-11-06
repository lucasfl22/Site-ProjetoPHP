<?php

include_once("../menu/faleconosco/config.inc.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM cliente WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $cliente = mysqli_fetch_array($resultado);
}
?>

<div class="form-container">
    <div class="form-header">
        <h2><i class="fas fa-user-edit"></i> Alterar Cliente</h2>
        <a href="?pg=clientes/lista_clientes" class="btn-voltar">
            <i class="fas fa-arrow-left"></i> Voltar para Lista
        </a>
    </div>

    <form action="clientes/altera_cliente.php" method="POST" class="form-cliente">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        
        <div class="form-group">
            <label for="nome"><i class="fas fa-user"></i> Nome Completo</label>
            <input type="text" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> E-mail</label>
            <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="telefone"><i class="fas fa-phone"></i> Telefone</label>
            <input type="tel" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="cidade"><i class="fas fa-city"></i> Cidade</label>
                <input type="text" id="cidade" name="cidade" value="<?php echo $cliente['cidade']; ?>" required>
            </div>

            <div class="form-group">
                <label for="estado"><i class="fas fa-map-marker-alt"></i> Estado</label>
                <select id="estado" name="estado" required>
                    <?php
                    $estados = array(
                        'AC'=>'Acre', 'AL'=>'Alagoas', 'AP'=>'Amapá', 'AM'=>'Amazonas', 'BA'=>'Bahia',
                        'CE'=>'Ceará', 'DF'=>'Distrito Federal', 'ES'=>'Espírito Santo', 'GO'=>'Goiás',
                        'MA'=>'Maranhão', 'MT'=>'Mato Grosso', 'MS'=>'Mato Grosso do Sul', 'MG'=>'Minas Gerais',
                        'PA'=>'Pará', 'PB'=>'Paraíba', 'PR'=>'Paraná', 'PE'=>'Pernambuco', 'PI'=>'Piauí',
                        'RJ'=>'Rio de Janeiro', 'RN'=>'Rio Grande do Norte', 'RS'=>'Rio Grande do Sul',
                        'RO'=>'Rondônia', 'RR'=>'Roraima', 'SC'=>'Santa Catarina', 'SP'=>'São Paulo',
                        'SE'=>'Sergipe', 'TO'=>'Tocantins'
                    );
                    foreach($estados as $uf => $nome) {
                        $selected = ($cliente['estado'] == $uf) ? 'selected' : '';
                        echo "<option value='$uf' $selected>$nome</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-save"></i> Salvar Alterações
        </button>
    </form>
</div>

<style>
/* Mantém o mesmo estilo do form_cliente.php */
.form-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.form-header h2 {
    color: #8B0000;
    margin: 0;
}

.btn-voltar {
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

.btn-voltar:hover {
    background: #FF0000;
    transform: translateY(-2px);
}

.form-cliente {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: bold;
}

label i {
    color: #8B0000;
    margin-right: 8px;
}

input, select {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: all 0.3s ease;
}

input:focus, select:focus {
    border-color: #8B0000;
    outline: none;
    box-shadow: 0 0 5px rgba(139,0,0,0.2);
}

.btn-submit {
    width: 100%;
    padding: 15px;
    background: #8B0000;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-submit:hover {
    background: #FF0000;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }
}
</style>
