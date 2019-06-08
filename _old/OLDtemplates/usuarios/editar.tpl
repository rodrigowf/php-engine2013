{extends file="admUser.tpl"}
{block "head" append}
    <script type='text/javascript' src='../../js/libs/jmask.js'></script>
{/block}

{block "content"}
<h2>Change of personal data</h2>
<h3>{$dad['usuarios']['primeiro_nome']} {$dad['usuarios']['sobrenome']}</h3>

<div id="dado">

    {form id="cadastro"}

        <fieldset id="userInfo">
            <legend>Who are you?</legend>

            <div class="row">
                <label for="nome">First Name</label>
                {input name='primeiro_nome' id="primeiro_nome" value="{if isset($dad['usuarios']['primeiro_nome'])}{$dad['usuarios']['primeiro_nome']}{/if}"}
                <span class="erro">{if isset($validacao['primeiro_nome'])}{$validacao['primeiro_nome']}{/if}</span>
            </div>

            <div class="row">
                <label for="sobrenome">Last Name</label>
                {input name='sobrenome' id='sobrenome' value="{if isset($dad['usuarios']['sobrenome'])}{$dad['usuarios']['sobrenome']}{/if}" }
                <span class="erro">{if isset($validacao['sobrenome'])}{$validacao['sobrenome']}{/if}</span>
            </div>

            <div class="row">
                <label for="cpf_passaporte">CPF / Passport</label>
                {input name='cpf_passaporte' id='cpf_passaporte' value="{if isset($dad['usuarios']['cpf_passaporte'])}{$dad['usuarios']['cpf_passaporte']}{/if}"}
                <span class="erro">{if isset($validacao['cpf_passaporte'])} {$validacao['cpf_passaporte']} {/if}</span>
            </div>

            <div class="row">
                <label for="niver_mes">Birth date dd/mm/yyyy</label>
                {input class='data' name='niver_dia' id='niver_dia' value=$dad['usuarios']['niver_dia']}
                <span class='barra'>/</span>
                {input class='data' name='niver_mes' id='niver_mes' value=$dad['usuarios']['niver_mes']}
                <span class='barra'>/</span>
                {input class='data ano' name='niver_ano' id='niver_ano' value=$dad['usuarios']['niver_ano']}
                {if isset($validacao['niver_mes']) || isset($validacao['niver_dia']) || isset($validacao['niver_ano'])}<span class="erro">Invalid Date</span>{/if} <span class="erro">{if isset($validacao['dataPadrao'])} {$validacao['dataPadrao']} {/if}</span>
            </div>

            <div class="row">
                <label for="idioma">Languages (CSV)</label>
                {input class='inputLanguage' name='idioma' id='idioma' value="{if isset($retorno['idioma'])}{$retorno['idioma']}{/if}{if isset($dad['usuarios']['idioma'])}{$dad['usuarios']['idioma']}{/if}"}
                <span class="erro">{if isset($validacao['idioma'])}  {$validacao['idioma']} {/if}</span>
            </div>

            <div class="row campo">
                <label for="sexo">Gender</label>
                <input type="radio" class='inputSex' name='data[usuarios][sexo]' id='sexoM'  value="M" {if $dad['usuarios']['sexo'] eq 'M'} checked='checked' {/if} /><label for="sexo" class="radio">M</label>
                <input type="radio" class='inputSex' name='data[usuarios][sexo]' id='sexoF'  value="F" {if $dad['usuarios']['sexo'] eq 'F'} checked='checked' {/if} /><label for="sexo" class="radio">F</label>
            </div>

            <br/>

            <div class="row campo">
                <label class="loco">Special needs for transportation?</label>
                <input type="radio" class='inputLoc' name='data[usuarios][locomocao]' id='locSim' value="1" {if $dad['usuarios']['locomocao'] eq '1'} checked='checked' {/if} /><label for="locSim" class="radio">Yes</label>
                <input type="radio" class='inputLoc' name='data[usuarios][locomocao]' id='locNao' value="0" {if $dad['usuarios']['locomocao'] eq '0'} checked='checked' {/if} /><label for="locNao" class="radio">No</label>
            </div>

            <div class="row size">
                <label for="tamanho">Size of T-shirt</label>
                <select class="tamanho" name="data[usuarios][tamanho]" >
                    <option value='' selected="selected" disabled="disabled">Choose One</option>
                    <option value="S" {if $dad['usuarios']['tamanho'] eq 'S'} selected="selected" {/if}>S</option>
                    <option value="M" {if $dad['usuarios']['tamanho'] eq 'M'} selected="selected" {/if}>M</option>
                    <option value="L" {if $dad['usuarios']['tamanho'] eq 'L'} selected="selected" {/if}>L</option>
                    <option value="XL" {if $dad['usuarios']['tamanho'] eq 'XL'} selected="selected" {/if} >XL</option>
                </select>
                <span class="erro">{if isset($validacao['tamanho'])}{$validacao['tamanho']}  {/if}</span>
            </div>

        </fieldset>

        <fieldset id="userPlace">
            <legend>Where are you from?</legend>

            <div class="row" id="estado">
                <label for="estado">State or Province</label>
                {input class='estado' id='estado' name='estado' value="{if isset($retorno['estado'])}{$retorno['estado']}{/if}{if isset($dad['usuarios']['estado'])}{$dad['usuarios']['estado']}{/if}"}
                <span class="erro">{if isset($validacao['estado'])} {$validacao['estado']} {/if}</span>
            </div>

            <div class="row" id="cidade">
                <label for="cidade">City</label>
                {input class='city' name='cidade' id='cidade' value="{if isset($retorno['cidade'])}{$retorno['cidade']}{/if}{if isset($dad['usuarios']['cidade'])}{$dad['usuarios']['cidade']}{/if}"}
                <span class="erro">{if isset($validacao['cidade'])} {$validacao['cidade']} {/if}</span>
            </div>

            <div class="row" id="telefone">
                <label for="telefone">Telephone</label>
                {input name='telefone' id='telefone' value="{if isset($retorno['telefone'])}{$retorno['telefone']}{/if}{if isset($dad['usuarios']['telefone'])}{$dad['usuarios']['telefone']}{/if}" }
                <span class="erro">{if isset($validacao['telefone'])}{$validacao['telefone']}   {/if}</span>
            </div>

        </fieldset>

        <fieldset id="userWork">
            <legend>Where do you work?</legend>

            <div class="row" id="nome_ej">
                <label for="nome_ej">JE's name</label>
                {input name='nome_ej' id='nome_ej' value="{if isset($retorno['nome_ej'])}{$retorno['nome_ej']}{/if}{if isset($dad['usuarios']['nome_ej'])}{$dad['usuarios']['nome_ej']}{/if}"}
                <span class="erro">{if isset($validacao['nome_ej'])}{$validacao['nome_ej']}  {/if}</span>
            </div>

            <div class="row" id="outros_ej">
                <label for="outros_ej">Other</label>
                {input name='outros_ej' id='outros_ej' value="{if isset($dad['usuarios']['outros_ej'])}{$dad['usuarios']['outros_ej']}{/if}" }
            </div>

            <div class="row" id="cargo">
                <label for="cargo">Position</label>
                {input name='cargo' id='cargo' value="{if isset($retorno['cargo'])}{$retorno['cargo']}{/if}{if isset($dad['usuarios']['cargo'])}{$dad['usuarios']['cargo']}{/if}"}
                <span class="erro">{if isset($validacao['cargo'])}  {$validacao['cargo']} {/if} </span>
            </div>

            <div class="row" id="tempo">
                <label for="tempo">How long in the JE?</label>
                {input name='tempoMej' id='tempo' value="{if isset($retorno['tempoMej'])}{$retorno['tempoMej']}{/if}{if isset($dad['usuarios']['tempoMej'])}{$dad['usuarios']['tempoMej']}{/if}"}
                <span class="erro">{if isset($validacao['tempoMej'])} {$validacao['tempoMej']} {/if}</span>
            </div>

            <div class="row" id="instituicao">
                <label for="instituicao">Where do you study?</label>
                {input name='instituicao' id='instituicao' value="{if isset($retorno['instituicao'])}{$retorno['instituicao']}{/if}{if isset($dad['usuarios']['instituicao'])}{$dad['usuarios']['instituicao']}{/if}"}
                <span class="erro">{if isset($validacao['instituicao'])} {$validacao['instituicao']}   {/if}</span>
            </div>
        </fieldset>

        <br/>
        <br/>
        <br/>

        <button type="submit">DONE!</button>

    {/form}
</div>







{/block}