{extends file="adm.tpl"}

{block "content"}

<h2>Gerenciar Usuários</h2>


<h3>{$dados['usuarios']['primeiro_nome']} {$dados['usuarios']['sobrenome']}</h3>

<div id="dados">
    <span><b>Primeiro Nome:</b> {$dados['usuarios']['primeiro_nome']}</span> <br>
    <span><b>Sobrenome:</b> {$dados['usuarios']['sobrenome']}</span> <br>
    <span><b>Email:</b> {$dados['usuarios']['email']}</span> <br>
    <span><b>Login:</b> {$dados['usuarios']['login']}</span> <br>
    <span><b>Estado:</b> {$dados['usuarios']['estado']}</span> <br>
    <span><b>Pais:</b> {$dados['usuarios']['pais']}</span> <br>
    <span><b>Cidade:</b> {$dados['usuarios']['cidade']}</span> <br>
    <span><b>Sexo:</b> {$dados['usuarios']['sexo']}</span> <br>
    <span><b>Passaporte/CPF:</b> {$dados['usuarios']['cpf_passaporte']}</span> <br>
    <span><b>Nascimento:</b> {$dados['usuarios']['nascimento']}</span> <br>
    <span><b>Nome EJ:</b> {$dados['usuarios']['nome_ej']}</span> <br>
    <span><b>Cargo:</b> {$dados['usuarios']['cargo']}</span> <br>
    <span><b>Instituição:</b> {$dados['usuarios']['instituicao']}</span> <br>
    <span><b>Federada (1=Federada / 0=Não federada):</b> {$dados['usuarios']['blFederada']}</span> <br>
    <span><b>Federação da EJ:</b> {$dados['usuarios']['federacao_ej']}</span> <br>
    <span><b>Outra:</b> (se não for federada) {$dados['usuarios']['outros_ej']}</span> <br>
    <span><b>Tempo MEJ:</b> {$dados['usuarios']['tempoMej']}</span> <br>
    <span><b>Idiomas:</b> {$dados['usuarios']['idioma']}</span> <br>
    <span><b>Tamanho da Camisa:</b> {$dados['usuarios']['tamanho']}</span> <br>
    <span><b>Nivel:</b> {$dados['usuarios']['nivel']}</span> <br>
    <span><b>Lote:</b> {$dados['usuarios']['lote']}</span> <br>
    <span><b>Data de Registro:</b> {$dados['usuarios']['registro']}</span> <br>
    <span><b>Pagou? <br />(1 - Sim / 0 - Não):</b> {$dados['usuarios']['intPagou']}</span> <br>
    <span><b>Parcelas:</b> {$dados['usuarios']['parcelas']}</span> <br>
    <span><b>Locomoção:</b> {$dados['usuarios']['locomocao']}</span> <br>
    <br><a class="button" href="../listar/"><< Voltar</a>
</div>



{/block}
