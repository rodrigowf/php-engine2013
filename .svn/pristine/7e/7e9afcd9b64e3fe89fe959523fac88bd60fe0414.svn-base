{extends file="adm.tpl"}

{block "head" append}
<script type='text/javascript' src='../../js/libs/confirm.js'></script>
{/block}

{block "content"}
<h2>Gerenciar Usuários</h2>
<h4>Número de inscritos: {$count['count']} - <a href="../excelExport/1" target='_blank'>Exportar para excel</a></h4>
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
    {foreach $dados as $dado }
    <tr>
        <td class="nome"><a href="../visualizar/{$dado['usuarios']['id']}" class="nome">{$dado['usuarios']['primeiro_nome']} {$dado['usuarios']['sobrenome']}</td>
       <!-- <td class="first"> {* {$dado['usuarios']['email']} *}</td>  -->
        <!-- <td>{*{$dado['usuarios']['pais']}*}</td> -->
        <td class='imagePay'> 
        	{if {$dado['usuarios']['intPagou']} eq 0} <img id='{$dado['usuarios']['id']}' data-intPagou='0' class='pagamento' src='{$_images}/pagamento/0.png' />
            {elseif  {$dado['usuarios']['intPagou']} eq 0.5} <img data-intPagou='0.5' id='{$dado['usuarios']['id']}' class='pagamento' src='{$_images}/pagamento/0.5.png' />
            {else} <img id='{$dado['usuarios']['id']}' data-intPagou='1' class='pagamento' src='{$_images}/pagamento/1.png' />  {/if}
            <div class='loading_valor'> <img src='../../images/loading.gif' width=16px height="16px" /> </div>

        </td>
        <td><a href="./../editar/{$dado['usuarios']['id']}"><img src="{$_images}/edit.png" alt="editar"></a></td>
        <td><img id='{$dado['usuarios']['id']}' class="delete" src="{$_images}/delete.png" alt="deletar"></td>
    </tr>
    {/foreach}
    </tbody>
</table>

{/block}