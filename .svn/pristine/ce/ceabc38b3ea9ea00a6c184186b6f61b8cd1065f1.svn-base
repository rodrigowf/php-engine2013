{extends file="htmlJewc.tpl"}

{block "css"}{css_autoload default="adm.less"}{/block}

{block "body"}

    <div id="layoutUp">
        <h1 id="tituloAdm">Área Administrativa</h1>
        {a class="logo" action="index" controller="index"}<span>JEWC 2012</span>{/a}
    </div>

    <div id="menuLeft">
        {a action="logoff" controller="usuarios" class="logoff"}Logoff{/a}
        <hr />
        {a action="listar" controller="usuarios"}Usuários - JADE{/a}
        {a action="listarBJ" controller="usuarios"}Usuários - BJ{/a}
        {a action="listarOutros" controller="usuarios"}Usuários - Outros{/a}
        {a action="busca" controller="usuarios"}Buscar Usuários{/a}
        {a action="listar" controller="pagamentos"}Gerenciar Boletos{/a}

        <hr />
        {a action="listar" controller="noticias"}Gerenciar Blog{/a}
    </div>

    <div id="bodyContent">
        {block "content"}
        {/block}
    </div>

{/block}
