{extends file="adm.tpl"}

{block "head" append}
<script type='text/javascript' src='../../js/libs/confirm.js'></script>
{/block}

{block "content"}
<h2>Gerenciar Boletos</h2>
<br/>
<br/>
<table cellpadding='0' cellspacing='0' width='100%' class='questions'>

    <thead>
    <tr>
        <th class="nome">Nome</th>
        <th>Registro</th>
        <th>Vencimento</th>
        <th>Pago?</th>
    </tr>
    </thead>
    <tbody>
        {foreach $boletos as $boleto }
        <tr>
            <td class="nome">{$boleto['pagamentos']['primeiro_nome']} {$boleto['pagamentos']['sobrenome']}</td>
            <td class="registro">{$boleto['pagamentos']['nossoNumero']}</td>
            <td class="first"> {$boleto['pagamentos']['vencimento']}</td>
            <!-- <td>{*{$boleto['pagamentos']['pais']}*}</td> -->
            <td class='imagePay'>
                {if {$boleto['pagamentos']['pago']} eq 0} <img id='{$boleto['pagamentos']['nossoNumero']}' data-pago='0' class='pagamento' src='{$_images}/pagamento/0.png' />
                {else} <img id='{$boleto['pagamentos']['nossoNumero']}' data-pago='1' class='pagamento' src='{$_images}/pagamento/1.png' />  {/if}
                <div class='loading_valor'> <img src='../../images/loading.gif' width=16px height="16px" /> </div>

            </td>
        </tr>
        {/foreach}
    </tbody>
</table>

{/block}