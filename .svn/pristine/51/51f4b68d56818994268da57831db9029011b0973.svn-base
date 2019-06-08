{extends file="jewc.tpl"}

{block "content"}

    <h1>Registration</h1>
    
    <h1 class="atention icon">You're all set?</h1>

    {if isset($erro)}
        <div class="erro row" id="errorBox">
            {foreach $erro as $mistake}
                <span class="errorSpan">{$mistake}</span> <br/>
            {/foreach}
        </div>
    {/if}

    <div class="pushLeft">

        <p class="titleCheck">Check if everything's is right: </p>
        
        <div id='dados'>
            <p> 
                <b>Email:</b> {$dados['usuarios']['email']}           <br>
                <b>First Name:</b> {$dados['usuarios']['primeiro_nome']}        <br>
                <b>Last Name:</b> {$dados['usuarios']['sobrenome']}          <br>
                <b>Login:</b> {$dados['usuarios']['login']}                 <br>
                <b>Estate or Province:</b> {$dados['usuarios']['estado']}      <br>
                <b>Country:</b> {$dados['usuarios']['pais']}                   <br>
                <b>City:</b> {$dados['usuarios']['cidade']}                    <br>
                <b>Telephone:</b> {$dados['usuarios']['telefone']}               <br>
                <b>Gender:</b> {$dados['usuarios']['sexo']}                      <br>
                <b>Passport:</b> {$dados['usuarios']['cpf_passaporte']}           <br>
                <b>Birth date:</b> {$dados['usuarios']['nascimento']}              <br>
                <b>Junior Enterprise:</b> {$dados['usuarios']['nome_ej']}         <br>
                <b>Institution:</b> {$dados['usuarios']['instituicao']}             <br>
                <b>Confederation:</b> {$dados['usuarios']['confederacao']}  <br>
                <b>Federation:</b> {if $dados['usuarios']['federacao_ej'] eq 'other_outros_ej' } {$dados['usuarios']['outros_ej']} {else} {$dados['usuarios']['federacao_ej']} {/if}  <br>
                <b>How long in the JE?:</b> {$dados['usuarios']['tempoMej']}   <br>
                <b>Languages:</b> {$dados['usuarios']['idioma']}               <br>
                <b>T-shirt size:</b> {$dados['usuarios']['tamanho']}           <br>
            </p>
        </div>
    
        <div id='botoes'>
        {form} <button type="submit" name='go' value='doit' id="confirm" >YEAH, THAT'S IT! </button> {/form}
        {form action="/jewc2012/usuarios/inscricao/i"} <button type="submit" name='notGo' value='just' id="back">GO BACK AND %br CORRECT A FEW THINGS...</button> {/form}
        </div>
    </div>
{/block}