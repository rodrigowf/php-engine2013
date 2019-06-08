{extends file="jewc.tpl"}

{block "content"}

{*  PARA acessar a URL atual vc pode usar a variável smarty que eu criei: {$_URL}
Acho que a url que vc tem que passar para esse atributo é essa!! (a url atual) *}

<div id="newsBox">
    <div class="newsHeader">
        <h1><a href="./visualizar/{$noticia['noticias']['idNoticia']}" class="newsTitle"> {$noticia['noticias']['Titulo']} </a></h1>
        <span class="postDate">Postado em {$noticia['noticias']['Data']}</span> <br/>
    </div>

    <br/><br/>

    <div class="newsBody">

                    {$noticia['noticias']['Texto']}


    </div>




    <div id="fb-root"></div>
    <div class="fb-comments" data-href="http://www.jewc2012.com/noticias/visualizar/{$noticia['noticias']['idNoticia']}" data-num-posts="5" data-width="470"></div>

</div>



{/block}
