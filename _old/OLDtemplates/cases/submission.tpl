{extends file="jewc.tpl"}

{block "content"}

    <h1>CASE STUDIES</h1>
    <span id="langWarning">This page will only be displayed in English.</span>

    <h3>Before anything else, read this {a action="edital"}announcement{/a} </h3>

    

    {form id="submission"}

        {input type='hidden' name='idCases' value='DEFAULT' }

        <fieldset id="caseInfo">
            <legend>What is it about?</legend>

            <div class="row">
                <label for="titulo">Title</label>
                {input name='titulo' id="titulo"}
                <span class="erro">{if isset($validacao['titulo'])}{$validacao['titulo']}{/if}</span>
                <span class="erro">{if isset($duplo)}{$duplo}{/if}</span>
            </div>

            <div class="row" id="idiomas">
                <label for="idiomas">Preferencial language %br for presentation</label>
                <select class='selectGrande' name="data[cases][idiomas]">
                    <option selected="selected" value='' disabled="disabled">Choose One</option>
                    <option value="English" {if $dados['idiomas'] eq "English"} selected="selected" {/if} >English</option>
                    <option value="Portuguese" {if $dados['idiomas'] eq "Portuguese"} selected="selected" {/if} >Portuguese</option>
                    <option value="Indifferent" {if $dados['idiomas'] eq "Indifferent"} selected="selected" {/if} >Indifferent</option>
                </select>
                <span class="erro">{if isset($validacao['idiomas'])}{$validacao['idiomas']}  {/if}</span>
            </div>

            <div class="row" id="tema">
                <label for="tema">Theme</label>
                <select class='selectGrande' name="data[cases][tema]">
                    <option selected="selected" value='' disabled="disabled">Choose One</option>
                    <option value="Desenvolvimento Colaborativo" {if $dados['tema'] eq "Desenvolvimento Colaborativo"} selected="selected" {/if} >Collaborative Development</option>
                    <option value="Organizacao" {if $dados['tema'] eq "Organizacao"} selected="selected" {/if} >Management</option>
                    <option value="Negocios" {if $dados['tema'] eq "Negocios"} selected="selected" {/if} >Business</option>
                </select>
                <span class="erro">{if isset($validacao['tema'])}{$validacao['tema']}  {/if}</span>
            </div>

            <div class="row">
                <label for="assunto">Related Subject</label>
                {input class='inputAssunto' name='assunto' id='assunto'}
                <span class="erro">{if isset($validacao['assunto'])}{$validacao['assunto']}  {/if}</span>
            </div>


        </fieldset>

        <fieldset id="orgInfo">
            <legend>Responsible Organization</legend>

            <div class="row" id="org_name">
                <label for="org_name">Name</label>
                {input name='org_name' id='org_name'}
                <span class="erro">{if isset($validacao['org_name'])}{$validacao['org_name']}  {/if}</span>
            </div>

            <div class="row" id="pais">
                <label for="pais">Country</label>
                <select class='selectGrande' name="data[cases][pais]">
                <option value='' selected="selected" disabled="disabled">Choose One</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Barbuda">Antigua &amp; Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia">Bosnia &amp; Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curacao">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands (Holland, Europe)">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="North Korea">North Korea</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre">St Pierre &amp; Miquelon</option>
                <option value="St Vincent">St Vincent &amp; Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome">Sao Tome &amp; Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad">Trinidad &amp; Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks">Turks &amp; Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis">Wallis &amp; Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
                <span class="erro">{if isset($validacao['pais'])}{$validacao['pais']}  {/if}</span>
            </div>

            <div class="row" id="estado">
                <label for="org_estado">State or Province</label>
                {input class='org_estado' id='org_estado' name='org_estado'}
                <span class="erro">{if isset($validacao['org_estado'])} {$validacao['org_estado']} {/if}</span>
            </div>

            <div class="row" id="cidade">
                <label for="org_cidade">City</label>
                {input class='org_city' name='org_cidade' id='org_cidade'}
                <span class="erro">{if isset($validacao['org_cidade'])} {$validacao['org_cidade']} {/if}</span>
            </div>

            <div class="row" id="instituicao">
                <label for="instituicao">Educational Institution*</label>
                {input name='instituicao' id='instituicao'}
                <span class="footnote">*Only needed for JEs and nuclei</span>
            </div>

            <div class="row">
                <label for="org_phone">Phone Number</label>
                {input class='org_phone' name='org_phone' id='org_phone'}
                <span class="erro">{if isset($validacao['org_phone'])} {$validacao['org_phone']} {/if}</span>
            </div>

            <div class="row">
                <label for="org_mail">E-Mail</label>
                {input class='org_mail' name='org_mail' id='org_mail'}
                <span class="erro">{if isset($validacao['org_mail'])} {$validacao['org_mail']} {/if}</span>
            </div>

        </fieldset>

        <fieldset id="authorInfo">
            <legend>Author</legend>

            <div class="row">
                <label for="nome_autor">Name</label>
                {input name='nome_autor' id='nome_autor'}
                <span class="erro">{if isset($validacao['nome_autor'])}{$validacao['nome_autor']}  {/if}</span>
            </div>

            <div class="row">
                <label for="autor_phone">Phone Number</label>
                {input class='autor_phone' name='autor_phone' id='autor_phone'}
                <span class="erro">{if isset($validacao['autor_phone'])} {$validacao['autor_phone']} {/if}</span>
            </div>

            <div class="row">
                <label for="autor_mail">E-Mail</label>
                {input class='autor_mail' name='autor_mail' id='autor_mail'}
                <span class="erro">{if isset($validacao['autor_mail'])} {$validacao['autor_mail']} {/if}</span>
            </div>


        </fieldset>

        <fieldset id="presenterInfo">
            <legend>Presenters</legend>

            <fieldset id="firstPresenter">
                <legend class="sublegend">First Presenter
                <span class="footnote">(MANDATORY)</span>
                </legend>

                <div class="row">
                    <label for="nome_apresentador1">Name</label>
                    {input name='nome_apresentador1' id='nome_apresentador1'}
                    <span class="erro">{if isset($validacao['nome_apresentador1'])}{$validacao['nome_apresentador1']}  {/if}</span>
                </div>

                <div class="row">
                    <label for="apresentador1_phone">Phone Number</label>
                    {input class='apresentador1_phone' name='apresentador1_phone' id='apresentador1_phone'}
                    <span class="erro">{if isset($validacao['apresentador1_phone'])} {$validacao['apresentador1_phone']} {/if}</span>
                </div>

                <div class="row">
                    <label for="apresentador1_mail">E-Mail</label>
                    {input class='apresentador1_mail' name='apresentador1_mail' id='apresentador1_mail'}
                    <span class="erro">{if isset($validacao['apresentador1_mail'])} {$validacao['apresentador1_mail']} {/if}</span>
                </div>
            </fieldset>

            <fieldset id="secondPresenter">
                <legend class="sublegend">Second Presenter
                <span class="footnote">(Optional)</span>
                </legend>

                <div class="row">
                    <label for="nome_apresentador2">Name</label>
                    {input name='nome_apresentador2' id='nome_apresentador2'}
                    <span class="erro">{if isset($validacao['nome_apresentador2'])}{$validacao['nome_apresentador2']}  {/if}</span>
                </div>

                <div class="row">
                    <label for="apresentador2_phone">Phone Number</label>
                    {input class='apresentador2_phone' name='apresentador2_phone' id='apresentador2_phone'}
                    <span class="erro">{if isset($validacao['apresentador2_phone'])} {$validacao['apresentador2_phone']} {/if}</span>
                </div>

                <div class="row">
                    <label for="apresentador2_mail">E-Mail</label>
                    {input class='apresentador2_mail' name='apresentador2_mail' id='apresentador2_mail'}
                    <span class="erro">{if isset($validacao['apresentador2_mail'])} {$validacao['apresentador2_mail']} {/if}</span>
                </div>
            </fieldset>

        </fieldset>

        <fieldset id="uploader">
            <legend>UPLOAD YOUR FILE</legend>

            <fieldset id="firstUpload">
                <legend class="sublegend">Annex A
                    <span class="footnote">(Evaluation copy, must not have logo or letterhead - MANDATORY)</span>
                </legend>
            </fieldset>
            {input type='file' name='anexoA'}
            <fieldset id="secondUpload">
                <legend class="sublegend">Annex B
                    <span class="footnote">(Exposure copy, can have logo or letterhead - OPTIONAL)</span>
                </legend>
            </fieldset>
            {input type='file' name='anexoB'}

        </fieldset>

        <br/>
        <br/>
        <br/>
        <br/>

        <div class="row" id="agreeduihui">

            {input type="checkbox"  name='agree' id='agree' }
            <label for="agree">I have read and I understand the conditions to submit a case.</label>

            <button type="submit">DONE!</button>
            <br/>
            <span class='termo erro'>{if isset($validacao['agree'])}{$validacao['agree']}{/if}</span>

        </div>


    {/form}



{/block}