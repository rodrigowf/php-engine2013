{extends file="jewc.tpl"}

{block "head" append}
    {js file="libs/jCycle"}
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=279276958788704";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
    {* js file="lib/navMenu" *}
{/block}

{title}JEWC 2012{/title}

{block "content"}
    <div id="fb-root"></div>

    <div class="esquerda">
        {*
        <div id="slideshow">
            {a action="inscricao" controller="usuarios"}{svg file="Register-01.svg" class="bannerImage" width='620' height='250'}{/a}
            {a action="inscricao" controller="usuarios" style="display:none"}{svg file="Register-02.svg" class="bannerImage" width='620' height='250'}{/a}
            {a action="inscricao" controller="usuarios" style="display:none"}{svg file="Register-03.svg" class="bannerImage" width='620' height='250'}{/a}
        </div>
        *}
        <div id="slideshow">
            {a action="city" controller="index"}<img src="{$_images}Banner_site-01.png" width="620" height="250" />{/a}
            {a action="speakers" controller="index" style="display:none"}<img src="{$_images}Banner_site-02.png" width="620" height="250" />{/a}
            {a action="schedule" controller="index" style="display:none"}<img src="{$_images}Banner_site-03.png" width="620" height="250" />{/a}
            {* a action="inscricao" controller="usuarios" style="display:none"}<img src="{$_images}Banner_site-04.png" width="620" height="250" />{/a *}
        </div>
        
        <div class="conteudo">
            <h3>JEWC 2012</h3>
            <p>Junior Enterprise World Conference (JEWC) is the biggest event of the planet for the Junior Entrepreneurs (or ever for the ones that want to become). From 6th to 10th of August, participants will be invited to increase their experience and get to know different cultures from the enterpreneurial world, gathering senior and young entrepreneurs - people who, despite their cultural distance, have the same thoughts and the same ambitions.</p>
            <p>We want to spread the word, put all the junior entrepreneurs together to share knowledge and experiences. For the main workshops, important names of the global entrepreneurial scenario have already confirmed their presence.</p>

            <div class="blog">

                <h3>WHAT'S NEW?</h3>
                <p class="blogTitle">{$noticia[0]['noticias']['Titulo']}</p>
                <p class="blogSummary">{$noticia[0]['noticias']['Resumo']}</p>
            </div>
            <a href="./noticias/visualizar/{$noticia[0]['noticias']['idNoticia']}" id="blogLink" class="button small goBlog">READ MORE</a>


            <div class="paraty">

                <h3>PARATY, RJ - BRAZIL</h3>
                <p>For the first time, JEWC 2012 will have a Host City, instead of a host hotel: JEWC City! We’ll have a whole city envolved and mobilized to host the biggest event of the world.</p>
                <p>The choice of Paraty in the Rio de Janeiro State was not hard at all. Its consolidated touristic structure, allied to its architectural and natural attractions wouldn’t give room to any doubt. Besides, it is already the city where the biggest literary encounter of the country, Paraty’s International Literay Fair (FLIP) takes place.</p>
            </div>
            {a action="city" id="cityLink" class="button small goCity"}GET TO KNOW{/a}
        </div>
        

        <div class="parceiros">
            <h3>WHO'S WITH US</h3>
            <h5>PARTNERS</h5>
            <div class="lista">

                   <div class="vde"></div>
                   <div class="paratyPref"></div>
                   <div class="paratyConv"></div>
                   <div class="sagre"></div>
                   <div class="estudar"></div>
                   <div class="brava"></div>
                   <div class="republica"></div>
                   <div class="artemisia"></div>

            </div>
        </div>

        
    </div>
    <div class="direita">
        
        <ul class="menuHome">
            {a action="speakers"}<li class="palestrantes"><span>SPEAKERS</span> <small>Check out the confirmed names to speak on the event</small></li>{/a}
            {a action="submission" controller="cases"}<li class="submission"><span>CASE STUDIES</span>  <small>Submit your cases to be presented on the event</small></li>{/a}
            {a action="schedule"}<li class="programacao"><span>SCHEDULE</span> <small>Day by day, what is gonna happen</small></li>{/a}
            {a action="city"}<li class="cidade"><span>THE CITY</span> <small>Get to know a bit more about Paraty and JEWC City</small></li>{/a}
        </ul>
        

        <div class="newsletter">
            <h3 class="newsletterTitle subsectionTitle">NEWSLETTER</h3>
            <p class="newsletterSubtitle">Register your e-mail and get heads up %br about the event</p>
            {form id="newsForm"}
                <input name="data[index][email]" class="email" value="{$errorMsg}"/> <br/>
                <button type="submit" class="mailSubmit">GET ME UPDATED!</button>
            {/form}
        </div>

        
        <div class="facebookBox">
            <h3 class="tituloH3 subsectionTitle">I'M DEFINITELY GOING</h3>
            <div class="fb-like-box" data-href="http://www.facebook.com/jewc2012" data-width="270" data-height="327" data-show-faces="true" data-border-color="#ffffff" data-stream="false" data-header="false"></div>
        </div>
        
        <div class="twitterBox">
            <h3 class="tituloH3 subsectionTitle">WHAT'S ON TWITTER</h3>
            <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
            <script>
            new TWTR.Widget({
              version: 2,
              type: 'profile',
              rpp: 4,
              interval: 30000,
              width: 270,
              height: 300,
              theme: {
                shell: {
                  background: '#ffffff',
                  color: '#000000'
                },
                tweets: {
                  background: '#ffffff',
                  color: '#30302f',
                  links: '#949494'
                }
              },
              features: {
                scrollbar: false,
                loop: false,
                live: true,
                behavior: 'all'
              }
            }).render().setUser('jewc2012').start();
            </script>
        </div>
        

        <div class="row">
            <div id="contagem">
                <h3 id="countTitle" class="subsectionTitle">COUNTDOWN</h3>
                <h1 class="dias"> {$countdown}</h1>
                <p id="countSubtitle">days to the Biggest Event %br of the World! Can't wait!</p>
            </div>
            <div id="biggestEvent">
                <img src="{$_styles}/images/home_the_biggest_event.png" width="101" height="134" />
            </div>
        </div>
        {*
        <div class="climaJewc">
            <h3>CLIMA JEWC</h3>
            <p>Faça o download exclusivo de material do JEWC para você entrar no clima do evento! Clique aqui e veja a barra à direita.</p>
            <a>ME PÕE NO CLIMA</a>
        </div>
        *}
    </div>
    
{/block}
