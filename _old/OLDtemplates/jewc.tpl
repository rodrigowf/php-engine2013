{extends file="htmlJewc.tpl"}

{block "head"}
    {js file="libs/navMenu"}
    {js file="site"}    
{/block}

{block "css"}{css_autoload default="jewc.less"}{/block}

{block "body"}

{translatePage} {*Traduz a página inteira!*}

    <div id="layoutUp">

        <div class="topo">
            <div class="titulo">
                {a class="logo" action="index" controller="index"}<span>JEWC 2012</span>{/a}
                <div class="subtitulo">
                    <p class="big">Junior Enterprise World Conference</p>
                    <p>Paraty, Rio de Janeiro - Brazil</p>
                    <p>August 6-10, 2012</p>
                </div>
            </div>
            <div class="redesSociais">
                    <h4>SPREAD THE WORD</h4>
                    <a class="facebook" href="http://www.facebook.com/pages/JEWC-2012/249307708415706" target="_blank"><span>Facebook</span></a>
                    <a class="twitter" href="http://twitter.com/jewc2012" target="_blank"><span>Twitter</span></a>
            </div>

        </div>

        <div class="barraMenu">
            <div class="menu">
                <ul>
                    <li class="home">{a action="index" controller="index"}Home{/a}</li>
                    <li class="inscricao">{a action="inscricao" controller="usuarios"}Registration{/a}</li>
                    <li class="conferencia dropdown">{a action="conference" controller="index"}The Conference{/a}
                        <ul class="dropdown">
                            <li class='jewc2012'>{a action="conference" controller="index"}JEWC 2012{/a}</li>
                            <li class='speakers'>{a action="speakers" controller="index"}Speakers{/a}</li>
                            <li class='submission'>{a action="submission" controller="cases"}Case Studies{/a}</li>
                            <li class='schedule'>{a action="schedule" controller="index"}Schedule{/a}</li>
                            <li class='city'>{a action="city" controller="index"}The City{/a}</li>
                        </ul>
                    </li>
                    <li class="noticias">{a controller="noticias" action="index"}Blog{/a}</li>
                    <li class="fale">{a action="index" controller="fale_conosco"}Talk to Us{/a}</li>
                    <li class='login'>{a action="login" controller="usuarios"}Login{/a}</li>
                </ul>
            </div>
            <div class="idioma">
                {switchLocale}
            </div>
        </div>
    </div>

    <div id="bodyContent">
        {block "content"}
        {/block}
    </div>
    
    <div id="rodape">
        <div id="organizacao">
    <h4>BROUGHT TO YOU BY</h4>
            <a id="jade" href="http://www.jadenet.org/" target="_blank"><span>Jade</span></a>
            <a id="brasiljunior" href="http://www.brasiljunior.com.br" target="_blank"><span>Brasil Júnior</span></a>
        </div>
    
        <div id="apoio">
    <h4>SUPPORTED BY</h4>       
            <a id="fejemg" href="http://www.fejemg.org.br" target="_blank"><span>FEJEMG</span></a>
            <a id="riojunior" href="http://www.riojunior.com.br" target="_blank"><span>RioJunior</span></a>
        </div>
    </div>

{/translatePage}
{/block}
