{extends file="admUser.tpl"}

{block "content"}

    {if $boletos != 0}
        {foreach $boletos as $boleto}

            {$nossoNumero=$boleto['pagamentos']['nossoNumero'] }
            {$vencimento=$boleto['pagamentos']['vencimento'] }
            {$vencimentoBD=$boleto['pagamentos']['vencimentoBD'] }
            {$valor=$boleto['pagamentos']['valor'] }
            {$parcelaNum=$boleto['pagamentos']['parcelaNum'] }
            {$numParcelas=$boleto['pagamentos']['numParcelas'] }

            {$nome=$dado['usuarios']['primeiro_nome']}
            {$sobrenome=$dado['usuarios']['sobrenome']}

            {$nome_cliente="$nome $sobrenome" }
            {$cidade_uf_clientes=$dado['usuarios']['cidade'] }


            <h3 class="boleto">{$boleto["pagamentos"]["parcelaNum"]}° parcela - vencimento: {$boleto["pagamentos"]["vencimento"]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{a action="boleto" params="$parcelaNum" class="emissao"}Emitir{/a}</h3>
        {/foreach}

    {/if}
    {if $parcelas == 0}
        {form}



            <fieldset>
                <legend>Em quantas parcelas você pagará?</legend>
                <div class="parcelado row">

                    {for $index=1 to $monthDif}

                        <input type="radio" name="data[usuarios][parcelas]" value={$index}  class="radio"/>

                        {if $index == 1}
                            <label for="parcelas" class="parcela">{$index} parcela</label>
                        {else}
                            <label for="parcelas" class="parcela">{$index} parcelas</label>

                        {/if}

                    {/for}
                </div>
            </fieldset>

            <div class="row">
                    <button type="submit" class="ok">Ok</button>
            </div>
        {/form}
    {/if}
{/block}