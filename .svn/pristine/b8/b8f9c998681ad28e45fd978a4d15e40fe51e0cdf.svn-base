{extends file="jewc.tpl"}

{title}JEWC 2012{/title}

{block "content"}

    <h1 class="pageHeader">WHAT'S GOING ON?</h1>
    <span class="postDate">The blog may contain posts in Portuguese.</span>

    <br/>
    <br/>

    <div id="newsBox">
    {foreach $news as $new}
        <div class="newsHeader">

            <h3 class="title"><a href="./visualizar/{$new['noticias']['idNoticia']}" class="newsTitle"> {$new['noticias']['Titulo']} </a></h3>
            <br/>
            <span class="postDate">Posted on {$new['noticias']['Data']}</span>   <br/>
        </div>

        <br/><br/>
    
        <div class="newsBody">
           {$new['noticias']['Resumo']}
        </div>

        <div class="redesSociais2">
            <h4 class="socialTitle">Share this</h4>
                <a class="facebook2 sharer" href="https://www.facebook.com/sharer.php?u=http://www.jewc2012.com/jewc2012/noticias/visualizar/{$new['noticias']['idNoticia']}&t='{$new['noticias']['Titulo']}'"  target="_blank"><span>Facebook</span></a>
                <a class="twitter2 sharer" href="https://twitter.com/share?url=https%3A%2F%2Fwww.jewc2012.com%2Fnoticias%2Fvisualizar%2F{$new['noticias']['idNoticia']}" target="_blank"><span>Twitter</span></a>
        </div>

        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

    {/foreach}
    </div>

   
{/block}
