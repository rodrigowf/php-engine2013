{extends file="jewc.tpl"}

{block "content"}
    
    <h1 class="icone">TALK TO US</h1>
    
    {form}
      <fieldset>
        <legend>GO AHEAD, TALK TO US</legend>
        <div class="row">
            {input name="nome" label="Full name"}
        </div>
        <div class="row">
            {input name="email" label="Email"}
        </div>
        <div class="row texto">
            <label for="texto">Message</label>
            <textarea id="texto" rows="10" name="data[texto]"></textarea>
        </div>
        
      </fieldset>
    
      <button type="submit">DONE!</button>
    {/form}
    

    <h3 id="team">OUR TEAM</h3>

    <div id="contatos">
        <div class="contatosEsquerda">

            <div class="row">

                <div class="contato">
                    <h4>Marcus Barão</h4>
                    <p class="subtitle">General %br Manager</p>
                </div>
                <p class="contatoMail">geral@jewc2012.com</p>

            </div>

            <div class="row">

                <div class="contato">
                    <h4>Lívia Barbosa</h4>
                    <p class="subtitle">Financial %br Manager</p>
                </div>
                <p class="contatoMail">financeiro@jewc2012.com</p>

            </div>

            <div class="row">

                <div class="contato" >
                    <h4>João Paulo Raia</h4>
                    <p class="subtitle">Communication %br Manager</p>
                </div>
                <p class="contatoMail">comunicacao@jewc2012.com</p>

            </div>


        </div>


        <div class="contatosDireita">

            <div class="row">
                <div class="contato">
                    <h4>Gustavo Valverde</h4>
                    <p class="subtitle">Partnerships %br Manager</p>
                </div>
                <p class="contatoMail">parcerias@jewc2012.com</p>

            </div>

            <div class="row">
                <div class="contato">
                    <h4>Ryoichi Oka</h4>
                    <p class="subtitle">Schedule %br Manager</p>
                </div>
                <p class="contatoMail">conteudo@jewc2012.com</p>

            </div>

            <div class="row">
                <div class="contato">
                    <h4 class="algo">Yaro Carvalho</h4>
                    <p class="subtitle">Infrastruture %br Manager</p>
                </div>
                <p class="contatoMail">infra@jewc2012.com</p>

            </div>


        </div>
    </div>
    
{/block}