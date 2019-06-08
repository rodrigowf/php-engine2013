{extends file="htmlJewc.tpl"}

{block "css"}{css_autoload default="admUser.less"}{/block}

{block "body"}

    <div id="layoutUp">
        <h1 id="tituloAdmUser">Account Management</h1>
        {a class="logo" action="index" controller="index"}<span>JEWC 2012</span>{/a}
    </div>

    <div id="menuLeft">
        {a action="logoff" controller="usuarios" class="logoff"}Logoff{/a}
        {a action="editar" controller="usuarios"}Change personal data{/a}
        {a action="alterar_senha" controller="usuarios"}Change Password{/a}
        {if isset($dado['usuarios']['confederacao'])}
            {if $dado['usuarios']['pacote']<66}
                {if ((($dado['usuarios']['confederacao'] == "JADE")||($dado['usuarios']['confederacao'] == "Nao Confederada JADE"))||($dado['usuarios']['confederacao'] == "Pos Junior JADE"))}

                    {a action="paypal" controller="pagamentos"}Payment{/a}
                {/if}

                {if ((($dado['usuarios']['confederacao'] == "Brasil Junior")||($dado['usuarios']['confederacao'] == "Nao Confederada BJ"))||($dado['usuarios']['confederacao'] == "Pos Junior BJ"))}

                    {a action="pagamento" controller="pagamentos"}Payment{/a}
                {/if}
            {/if}
        {/if}
    </div>

    <div id="bodyContent">
        {block "content"}
        {/block}
    </div>

{/block}