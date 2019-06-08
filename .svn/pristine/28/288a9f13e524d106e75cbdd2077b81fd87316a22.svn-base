{extends file="adm.tpl"}

{block "content"}

<script type="text/javascript" src="{$_scripts}/libs/tiny_mce/tiny_mce.js" ></script >
<script type="text/javascript" src="{$_scripts}/noticias/inserir.js"></script>


<form method='post' id="publish">
    <p>
        <label for="titulo">Título</label><br/>
        <input type="text" name="data[noticias][Titulo]" class="titulo" id="titulo" />
    </p>

    <br/>
    <br/>

    <p>
        <label for="resumo">Resumo</label><br/>
        <textarea name="data[noticias][Resumo]" class="resumo" id="resumo" cols="30" rows="10">
            Write your summary here.
        </textarea>
    </p>

    <br/>
    <br/>

    <p>
        <label for="texto">Texto Completo</label><br/>
        <textarea name="data[noticias][Texto]" class="texto" id="texto" cols="70" rows="30" >
            Write your text here.
        </textarea>
    </p>


    <p>

        <input type='hidden' name='data[noticias][Data]' value='NOW()' />
        <button type="submit">Postar!</button>
    </p>
</form>


{/block}
