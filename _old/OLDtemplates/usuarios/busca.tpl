
{extends file="adm.tpl"}

{block "content"}
    <div id='busca' style='float: left'>
   {form method='post'}
    {input type='text' class='sussa' name='query' id='search' }
    <br><br>

    <ul>
    {foreach from=$campos item=item}
    <li>{input type='checkbox' class='item' name={$item} value={$item} label={$item}}</li>
    {/foreach} </ul>
    {input type='submit' }
    {/form}
    </div>
    {if isset($resultadoBusca)}
    <div id='resultado' style='float: left'>
        <ul>
        {foreach from=$resultadoBusca item=item2}
            <li><a href="../visualizar/{$item2['id']}">{$item2['primeiro_nome']} {$item2['sobrenome']}</a></li>
        {/foreach}
        </ul>
    {elseif isset($BuscaFail)}
    	<span id='buscaFail'>{$BuscaFail}</span>
    </div>
    {/if}
{/block}
