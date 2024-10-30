<main class="fale-conosco">
    <h1>Fale Conosco</h1>
    <p>Por favor, preencha o formulário abaixo para enviar seus comentários, denúncias, sugestões ou avaliações sobre o site. Sua opinião é muito importante para nós!</p>
    <div class="form-container">
        <form class="form-contato" action="menu/faleconosco/envia_msg.php" method="post">
            <fieldset class="fieldset-informacoes">
                <legend>Informações de Contato</legend>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required>
            </fieldset>

            <fieldset class="fieldset-opcao">
                <legend>Tipo de Mensagem</legend>
                <label><input type="radio" name="tipo_mensagem" value="comentario" required> Comentário</label>
                <label><input type="radio" name="tipo_mensagem" value="denuncia"> Denúncia</label>
                <label><input type="radio" name="tipo_mensagem" value="sugestao"> Sugestão</label>
                <label><input type="radio" name="tipo_mensagem" value="avaliacao"> Avaliação do Site</label>
            </fieldset>


            <fieldset class="fieldset-opiniao">
                <legend>Mensagem</legend>
                <label for="mensagem">Sua Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
            </fieldset>

            <button type="submit" class="btn-enviar">Enviar</button>
        </form>
    </div>
</main>