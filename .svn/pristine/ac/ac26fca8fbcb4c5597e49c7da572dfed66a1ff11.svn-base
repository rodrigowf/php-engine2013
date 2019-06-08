{extends file="adm.tpl"}

{block "head" append}
<script type='text/javascript' src='../../js/libs/confirm.js'></script>
{/block}

{block "content"}
<h2>Gerenciar Usuários</h2>
<h4>Número de inscritos: {$count['count']} - <a href="../excelExport/2" target='_blank'>Exportar para excel</a></h4>
<table cellpadding='0' cellspacing='0' width='100%' class='questions'>

    <thead>
    <tr>
        <th class="nome">Nome</th>
        <!-- <th>Email</th> -->
        <th>Pago?</th>
        <th>Editar?</th>
        <th>Excluir?</th>
        <!-- <th>País</th> -->
    </tr>
    </thead>
    <tbody>
        {$g=0}

        {foreach $dados as $dado }
        <tr>
            <td class="nome"><a href="../visualizar/{$dado['id']}" class="nome">{$dado['primeiro_nome']} {$dado['sobrenome']}</td>
            <!-- <td class="first"> {* {$dado['email']} *}</td>  -->
            <!-- <td>{*{$dado['pais']}*}</td> -->
            <td class='imagePay'>
                {$n=0}    <div class='loading_valor1'> <img src='../../images/loading.gif' width=16px height="16px" /> </div>
            {for $foo = 0 to {{$dado['numParcelas']-1}} }

               {if {$aboutAboleto[{$g}][{$n}]['pago']} eq 0}
                    <img id='{$dado['id']}' data-intPagou='0' class='pagamento{$foo+1}' data-NumeroParcela={$foo+1} src='{$_images}/pagamento/0.png' />

               {else}
                    <img id='{$dado['id']}' data-intPagou='1' class='pagamento{$foo+1}' data-NumeroParcela={$foo+1} src='{$_images}/pagamento/1.png' />

                {/if}

                {$n=$n+1}
            {/for}


            </td>
            <td><a href="./../editar/{$dado['id']}"><img src="{$_images}/edit.png" alt="editar"></a></td>
            <td><img id='{$dado['id']}' class="delete" src="{$_images}/delete.png" alt="deletar"></td>
        </tr>
            {$g=$g+1}
        {/foreach}
    </tbody>
</table>

{/block}