{extends file="jewc.tpl"}
{block "head" append}
<script type='text/javascript' src='../../js/libs/jmask.js'></script>
{/block}
{block "content"}
    <h1>Registration</h1>
    {form id="cadastro"}
        {input type='hidden' name='id' value='DEFAULT' }
        {input type='hidden' name='registro' value='NOW()' }
        {input type='hidden' name='nivel' value='usuario' }
        <fieldset id="userInfo">
            <legend>Who are you?</legend>
                {input name='primeiro_nome' label='First Name' id="primeiro_nome" value="{if isset($retorno['primeiro_nome'])}{$retorno['primeiro_nome']}{/if}{if isset($dados['primeiro_nome'])}{$dados['primeiro_nome']}{/if}"}
                <span class="erro">{if isset($validacao['primeiro_nome'])}{$validacao['primeiro_nome']}{/if}</span>
                {input name='sobrenome' label='Last Name' id='sobrenome' value="{if isset($retorno['sobrenome'])}{$retorno['sobrenome']}{/if}{if isset($dados['sobrenome'])}{$dados['sobrenome']}{/if}" }
                <span class="erro">{if isset($validacao['sobrenome'])}{$validacao['sobrenome']}{/if}</span>
                {input name='login' id="login" label='Login' value="{if isset($retorno['login'])}{$retorno['login']}{/if}{if isset($dados['login'])}{$dados['login']}{/if}"}
                <span class="erro">{if isset($validacao['login'])}{$validacao['login']}{/if}</span> <span class="erro">{if isset($validacao['login_check'])}{$validacao['login_check']}{/if}</span>
                {input type="password" label='Password' name='password' id="senha" }
                <span class="erro">{if isset($validacao['password'])}{$validacao['password']}  {/if}</span>
                {input type="password" label='Retype password' class='passwordCheck' name='password_check' id='password_check'}
                <span class="erro">{if isset($validacao['password_check'])}{$validacao['password_check']}{/if}</span> <br />
                {input name='email' label='E-mail' id='email' value="{if isset($retorno['email'])}{$retorno['email']}{/if}{if isset($dados['email'])}{$dados['email']}{/if}"}
                <span class="erro">{if isset($validacao['email'])} {$validacao['email']} {/if} {if isset($validacao['email_check'])}{$validacao['email_check']}{/if}</span>
                {input name='cpf_passaporte' label='Passport/CPF' id='cpf_passaporte' value="{if isset($retorno['cpf_passaporte'])}{$retorno['cpf_passaporte']}{/if}{if isset($dados['cpf_passaporte'])}{$dados['cpf_passaporte']}{/if}"}
                <span class="erro">{if isset($validacao['cpf_passaporte'])} {$validacao['cpf_passaporte']} {/if}</span>
                {input class='data' label='Birth date (dd/mm/yyyy)' name='nascimento' id='nasc'}
                {if isset($validacao['nascimento']) || isset($validacao['nascimento']) || isset($validacao['nascimento'])}<span class="erro">Invalid Date</span>{/if} <span class="erro">{if isset($validacao['dataPadrao'])} {$validacao['dataPadrao']} {/if}</span>
                {input class='inputLanguage' label='Languages (CSV)' name='idioma' id='idioma' value="{if isset($retorno['idioma'])}{$retorno['idioma']}{/if}{if isset($dados['idioma'])}{$dados['idioma']}{/if}"}
                <span class="erro">{if isset($validacao['idioma'])} {$validacao['idioma']} {/if}</span>
            <div class="row">
                {input type="radio" label='Gender' class='inputSex' name='sexo' id='sexoM' checked='checked'  value="M" }<label for="sexo" class="radio">M</label>
                {input type="radio" class='inputSex' name='sexo' id='sexoF' checked='checked' value="F" }<label for="sexo" class="radio">F</label>
            </div>
            <div class="row">
                {input type="radio" label='Special needs?' class='inputLoc' name='locomocao' id='locSim' value="1"  }<label for="locSim" class="radio">Yes</label>
                {input type="radio" class='inputLoc' name='locomocao' id='locNao' value="0" checked="checked" }<label for="locNao" class="radio">No</label>
            </div>
            <div class="row">
                <label for="tamanho">Size of T-shirt</label>
                <select id='tamanho' class="tamanho" name="data[usuarios][tamanho]" >
                    <option value='' selected="selected" disabled="disabled">Choose One</option>
                    <option value="S" {if $retorno['tamanho'] eq 'S'} selected="selected" {/if}>S</option>
                    <option value="M" {if $retorno['tamanho'] eq 'M'} selected="selected" {/if}>M</option>
                    <option value="L" {if $retorno['tamanho'] eq 'L'} selected="selected" {/if}>L</option>
                    <option value="XL" {if $retorno['tamanho'] eq 'XL'} selected="selected" {/if} >XL</option>
                </select>
                <span class="erro">{if isset($validacao['tamanho'])}{$validacao['tamanho']}  {/if}</span>
            </div>

        </fieldset>
        
        <fieldset id="userPlace">
            <legend>Where are you from?</legend>

            <div class="row"> {include file="selectPais.tpl"} </div>
            <div class="row" id="estado">
                {input class='estado' label='State or Province' id='estado' name='estado' value="{if isset($retorno['estado'])}{$retorno['estado']}{/if}{if isset($dados['estado'])}{$dados['estado']}{/if}"}
                <span class="erro">{if isset($validacao['estado'])} {$validacao['estado']} {/if}</span>
            </div>
            <div class="row" id="cidade">
                {input class='city' label='City' name='cidade' id='cidade' value="{if isset($retorno['cidade'])}{$retorno['cidade']}{/if}{if isset($dados['cidade'])}{$dados['cidade']}{/if}"}
                <span class="erro">{if isset($validacao['cidade'])} {$validacao['cidade']} {/if}</span>
            </div>
            <div class="row" id="telefone">
                {input name='telefone' label='Telephone' id='telefone' value="{if isset($retorno['telefone'])}{$retorno['telefone']}{/if}{if isset($dados['telefone'])}{$dados['telefone']}{/if}" }
                <span class="erro">{if isset($validacao['telefone'])}{$validacao['telefone']}   {/if}</span>
            </div>

        </fieldset>
        
        <fieldset id="userWork">
            <legend>Where do you work?</legend>
            
            <div class="row" id="nome_ej">
                 {input name='nome_ej' label="JE's name" id='nome_ej' value="{if isset($retorno['nome_ej'])}{$retorno['nome_ej']}{/if}{if isset($dados['nome_ej'])}{$dados['nome_ej']}{/if}"}
                 <span class="erro">{if isset($validacao['nome_ej'])}{$validacao['nome_ej']}  {/if}</span>
            </div>

            <div class="row">
            <label for="confederacao">Confederation</label>
            <select class='selectGrande' id='confederacao' name="data[usuarios][confederacao]">
                <option selected="selected" value="" disabled="disabled">Choose One</option>
                <option value="JADE">JADE</option>
                <option value="Brasil Junior">Brasil Júnior</option>
                <option value="Nao Confederada JADE">JE not confederated JADE</option>
                <option value="Nao Confederada BJ">JE not confederated Brasil Júnior</option>
                <option value="Pos Junior JADE">Former Junior Entepreneur JADE</option>
                <option value="Pos Junior BJ">Former Junior Entepreneur Brasil Júnior</option>
            </select><span class='erro'>{if isset($validacao['confederacao'])}{$validacao['confederacao']}  {/if}</span>
            </div>
            <div class="row" id="federacao_ej">

                <label for="federacao" data-tipo='0'>Federação</label>
                <label for="federacao" data-tipo='1'>Federation</label>

                <select class='selectGrande' data-tipo='0' id='federacao' name="data[usuarios][federacao_ej]">
                   <option selected="selected" value='' disabled="disabled">Escolha Um</option>
                    <option value="Concentro">Concentro</option>
                    <option value="FEJEA">FEJEA</option>
                    <option value="FEJECE">FEJECE</option>
                    <option value="FEJEMG">FEJEMG</option>
                    <option value="FEJEPAR">FEJEPAR</option>
                    <option value="FEJEPE">FEJEPE</option>
                    <option value="FEJERS">FEJERS</option>
                    <option value="FEJESC">FEJESC</option>
                    <option value="FEJESP">FEJESP</option>
                    <option value="JuniorES">JuniorES</option>
                    <option value="PB Júnior">PB Júnior</option>
                    <option value="RioJunior">RioJunior</option>
                    <option value="RN Júnior">RN Júnior</option>
                    <option value="UNIJr-BA">UNIJr-BA</option>
                    <option value="other_outros_ej">Outra</option>
                </select>

                <select class='selectGrande' data-tipo='1' id='federacao' name="data[usuarios][federacao_ej]">
                    <option selected="selected" value='' disabled="disabled">Choose One</option>
                    <option value="Bundesverband Deutscher Studentischer Unternehmensberatungen" {if $retorno['federacao_ej'] eq "Bundesverband Deutscher Studentischer Unternehmensberatungen"} selected="selected" {/if} >Bundesverband Deutscher Studentischer Unternehmensberatungen</option>
                    <option value="Confederación Española de Junior Empresas" {if $retorno['federacao_ej'] eq "Confederación Española de Junior Empresas"} selected="selected" {/if}>Confederación Española de Junior Empresas</option>
                    <option value="Confédération Nationale des Junior-Entreprises" {if $retorno['federacao_ej'] eq "Confédération Nationale des Junior-Entreprises"} selected="selected" {/if} >Confédération Nationale des Junior-Entreprises</option>
                    <option value="JADE Austria" {if $retorno['federacao_ej'] eq "JADE Austria"} selected="selected" {/if} >JADE Austria</option>
                    <option value="JADE Belgium" {if $retorno['federacao_ej'] eq "JADE Belgium"} selected="selected" {/if} >JADE Belgium</option>
                    <option value="JADE Hellas" {if $retorno['federacao_ej'] eq "JADE Hellas"} selected="selected" {/if} >JADE Hellas</option>
                    <option value="JADE Italy" {if $retorno['federacao_ej'] eq "JADE Italy"} selected="selected" {/if} >JADE Italy</option>
                    <option value="JADE Poland" {if $retorno['federacao_ej'] eq "JADE Poland"} selected="selected" {/if} >JADE Poland</option>
                    <option value="JADE Portugal" {if $retorno['federacao_ej'] eq "JADE Portugal"} selected="selected" {/if}>JADE Portugal</option>
                    <option value="JADE Romania" {if $retorno['federacao_ej'] eq "JADE Romania"} selected="selected" {/if}>JADE Romania</option>
                    <option value="JADE Switzerland" {if $retorno['federacao_ej'] eq "JADE Switzerland"} selected="selected" {/if} >JADE Switzerland</option>
                    <option value="JADE UK" {if $retorno['federacao_ej'] eq "JADE UK"} selected="selected" {/if} >JADE UK</option>
                    <option value="UNIGroup - Kosovo" {if $retorno['federacao_ej'] eq "UNIGroup - Kosovo"} selected="selected" {/if} >UNIGroup - Kosovo</option>
                    <option value="UNIPartners - The Nederlands" {if $retorno['federacao_ej'] eq "UNIPartners - The Nederlands"} selected="selected" {/if} >UNIPartners - The Nederlands</option>
                    <option value="UniQue" {if $retorno['federacao_ej'] eq "UniQue"} selected="selected" {/if} >UniQue</option>
                    <option value="other_outros_ej" {if $retorno['federacao_ej'] eq "other_outros_ej"} selected="selected" {/if} >Other</option>
                 </select>       
                 <span class="erro">{if isset($validacao['federacao_ej'])}{$validacao['federacao_ej']}{/if}</span>
                 </div>
            <div class="row" id="outros_ej">
                {input name='outros_ej' label='Other' id='outros_ej' value="{if isset($dados['usuarios']['outros_ej'])}{$dados['usuarios']['outros_ej']}{/if}" }
            </div>
            <div class="row" id="cargo">
                {input name='cargo' id='cargo' label='Position' value="{if isset($retorno['cargo'])}{$retorno['cargo']}{/if}{if isset($dados['cargo'])}{$dados['cargo']}{/if}"}
                <span class="erro">{if isset($validacao['cargo'])}  {$validacao['cargo']} {/if} </span>
            </div>
            <div class="row" id="tempo">
                {input name='tempoMej' label='How long in the JE?' id='tempo' value="{if isset($retorno['tempoMej'])}{$retorno['tempoMej']}{/if}{if isset($dados['tempoMej'])}{$dados['tempoMej']}{/if}"}
                <span class="erro">{if isset($validacao['tempoMej'])} {$validacao['tempoMej']} {/if}</span>
            </div>
            <div class="row" id="instituicao">
                {input name='instituicao' label='Where do you study?' id='instituicao' value="{if isset($retorno['instituicao'])}{$retorno['instituicao']}{/if}{if isset($dados['instituicao'])}{$dados['instituicao']}{/if}"}
                <span class="erro">{if isset($validacao['instituicao'])} {$validacao['instituicao']}   {/if}</span>
            </div>
        </fieldset>

        <fieldset id="userAgreement">
            <legend>Agreement</legend>
        </fieldset>
    <br>
            <textarea rows="30" cols="90" readonly="readonly" class="termo scapeTranslation">
                {if isset($ptbr)}
                    {include file="termo_ptbr.html"}
                {else}
                     {include file="termo.html"}
                {/if}
            </textarea>
            <div class="row" id="agreeduihui">
                 {input type="checkbox"  name='agree' id='agree' }
                <label for="agree">I agree with all the terms and conditions above</label>
                
                
                <button id="done" type="submit">DONE!</button>
                <span class='termo erro'>{if isset($validacao['agree'])}{$validacao['agree']}{/if}</span>
            </div>
    <br><br>
    {/form}

{/block} {*Fecha a body*}
