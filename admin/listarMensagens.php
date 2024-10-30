<?php 

$sql = mysqli_query($conexao, "SELECT * FROM contato");

if (mysqli_num_rows($sql) == 0) {
    echo "Nenhuma mensagem encontrada.";
} else {
    while($tabela = mysqli_fetch_array($sql)) {
        echo "Nome: $tabela[nome] <br>";
        echo "Email: $tabela[email] <br>";
        echo "Telefone: $tabela[telefone] <br>";
        echo "Mensagem: $tabela[mensagem] <br>";
        
        // Lógica para mostrar o tipo de mensagem   
        $tipo_mensagem = "";
        if ($tabela['comentario'] == 1) {
            $tipo_mensagem = "Comentário";
        } elseif ($tabela['denuncia'] == 1) {
            $tipo_mensagem = "Denúncia";
        } elseif ($tabela['sugestao'] == 1) {
            $tipo_mensagem = "Sugestão";
        } elseif ($tabela['avaliacao'] == 1) {
            $tipo_mensagem = "Avaliação";
        }
        echo "Tipo de Mensagem: $tipo_mensagem <br>";

        echo "<a href='apaga.php?id=" . $tabela['id'] . "' onclick='return confirm(\"Tem certeza que deseja apagar esta mensagem?\")' style='color: red;'>Apagar Mensagem</a><br>";
        echo "<hr>";
    }
}

mysqli_close($conexao);

?>