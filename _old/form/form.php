<?php
session_start();
session_name("formulario");

function escape_string($q) {
     if(is_array($q)) 
         foreach($q as $k => $v) 
             $q[$k] = escape_string($v);
     elseif(is_string($q))
         $q = mysql_real_escape_string($q);
     return $q;
	}

function echoArray($a){
  echo '<pre>';
  print_r($a);
  echo '</pre>';
}
include('class/database.class.php');
include('class/hashcrypter.class.php');
include('class/validacao.class.php');
if($_POST){
  if($_POST['agree'] == 'on'){
	  $db = new Database;
	  usleep(10);
	  if($db->connect()){
		  
		  $form = escape_string($_POST);  
		 
		  $insert = array( 
		  "id" => "DEFAULT", 
		  "strEmail" => "'".$form['email']."'",
		  "strNome" => "'".$form['primeiro_Nome'] . ' ' . $form['sobrenome']."'", //Só O NOME
		  "strNomeCracha" => "'".$form['primeiro_Nome'] . ' ' . $form['sobrenome']."'", // SÒ O SOBRENOME
		  "strEstado"  => "'".$form['estado']."'",
		  "strPais" => "'".$form['Pais']."'",
		  "strCEP" => "'NULL'", //CIDADE DO CARA
		  "strTelefone" => "'NULL'", //TELEFONE ADICIONA NO FORMULARIO
		  "strSexo" => "'N'", //PERGUNTAR NO FORM
		  "strCPF" => "'NULL'", //PERGUNTAR CPF OU PASSAPORT NO FORM
		  "dtNascimento" => "'".$form['data_ano'] . '-' . $form['data_mes'] . '-' . $form['data_dia']."'",
		  "strSenha" => "'".Crypter::hash($form['password'])."'",
		  "strEmpresa" => "'".$form['nome_ej']."'", //EMPRESA JUNIOR
		  "strInstituicao" => "'".$form['federacao_ej']."'", //UNIVERSIDADE
		  "blFederada" => 1, //Tem que mecher no formulario botando um select com todas as federadas afim de ter um if para determinar se é 1 ou 0
		  "strConfederacao" => "'Brasil Junior'", // 2 opcoes só brasil junior ou jade
		  "strFederacao" => "'".$form['federacao_ej']."'", //de acordo com o confederacao mostra a lista de federacoes
		  "strCargo" => "'".$form['cargo']."'",
		  "strTempoMej" => "'4 anos'", //adicionar no form
		  "strLinguas" => "'".$form['idioma']."'",  //FAZER O CARA SEPARAR POR VIRGULAS
		  "strTamanho" => "'M'", //ADICIONAR NO FORM
		  "strNivel" => "'usuario'", //PARTICIPANTE, DESATIVADO, ADMINISTRADOR
		  "intLote" => 1, //me digam a utilidade que lhes direi o que fazer.
		  "dtRegistro" => "NOW()",
		  "intPagou" => 0, //Precisamos discutir a utilidade disso, o cara nao só paga depois dessa pagina??
		  "intParcelas" => 1, //Um if de acordo com o roll la do pagamento (vista ou 4 vezes); PESSOAL DA EUROPA SÓ PAGA EM 1 VEZ
		  "intPacote" => 1, //tb nao sei ninguem sabe
		  "bLocomocao" => 1, //ADICIONAR NO FORM PARA SE O CARA PRECISAR DE COISAS TIPO CADEIRA DE RODAS E AFIM (DIFICULDADES DE LOCOMOCAO)
		  );
		  
	  
		  //echo Crypter::check_password(trim($insert['strSenha'],"'"), $form['password']);
		  
		  $valida = new validacao();
		  	
		  /* Alguem algum dia precisa me falar quais as validações que tem que ter */
		  /* E aplicar o layout é importante */
		 	
		  $valida->validarCampo("Nome" , trim($insert['strNome'],"'"), "100", "5");
		  $valida->validarEmail(trim($insert['strEmail'],"'"));
		  $valida->validarData(trim($insert['dtNascimento'],"'"));
		  
		  if($valida->verifica()){
			  $_SESSION['registro'] = &$insert;
			  sleep(2);
			  header("Location: form2.php");
		  }else{
			echo 'Validação fail';  
		  }
		  
			  
	 	  /* $db->insert("usuario",$insert);	*/
	  }	
  } 
  
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">	
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Registro Jewc 2012 1/3</title>
<link href="css/formEstilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<span id='regTitulo'>Registration</span><br /><span id='regTituloPtbr' class='ptbr'>Inscrições</span><br /><br /><br />	
    
    <form method='post' id="cadastro">
    	<fieldset id="userInfo">
        <legend>
          		<h2>Who are you?</h2>
                <h4>Quem é você?</h4>
        </legend>
		
		<div class='label'>        	
			<span>First Name</span><br /><span class='ptbr'>Nome</span>
		</div>
            <input type="text" class='inputGrande' name='primeiro_Nome' />
            <br />
        <div class='label'><span>Last Name</span><br /><span class='ptbr'>Sobrenome</span></div>
            <input type="text" class='inputGrande' name='sobrenome' /><br />
            <div class="label"><span>Login</span></div>
            <input type="text" class='inputGrande' name='login' /><br />
            <div class="label"><span>Password</span><br /><span class="ptbr">Senha</span></div>
            <input type="password" class='inputGrande' name='password' /><br />
        	<div><span>Type the <br /> password <br />again</span><span class='ptbr'>Redigite a <br />senha</span></div>
        	<input type="password" class='passwordAgain' name='repete_password' /><br />
        	<div class="label"><span>E-mail</span></div>
        	<input type="text" class='inputGrande' name='email' /><br />
           	
            <div class="label"><span>Birth date</span><span class="ptbr">Aniversário</span></div>
            <input type="text" class='inputData' name='data_mes' /> 
            <span class='barra'>/</span> 
            <input type="text" class='inputData' name='data_dia' /> 
            <span class='barra'>/</span>
            <input type="text" class='inputData ultimoData' name='data_ano' />
            <div class="label2"><span>Language</span><span class="ptbr">Idioma</span></div>
            <input type="text" class='inputLanguage' name='idioma' />
            </p>
</fieldset>
    	
        <fieldset id="userPlace">
        	<legend><h2>Where are you from?</h2><h4>De onde é?</h4></legend>
        	
            <span id='textPais'>Chose your country from list below</span><span class="ptbr">Escolha seu país na lista abaixo</span><br />
              <select name='Pais' class='selectGrande'>
                <option value="África do Sul">África do Sul</option>
                <option value="Albânia">Albânia</option>
                <option value="Alemanha">Alemanha</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua">Antigua</option>
                <option value="Arábia Saudita">Arábia Saudita</option>
                <option value="Argentina">Argentina</option>
                <option value="Armênia">Armênia</option>
                <option value="Aruba">Aruba</option>
                <option value="Austrália">Austrália</option>
                <option value="Áustria">Áustria</option>
                <option value="Azerbaijão">Azerbaijão</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrein">Bahrein</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Bélgica">Bélgica</option>
                <option value="Benin">Benin</option>
                <option value="Bermudas">Bermudas</option>
                <option value="Botsuana">Botsuana</option>
                <option value="Brasil" selected=selected>Brasil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgária">Bulgária</option>
                <option value="Burkina Fasso">Burkina Fasso</option>
                <option value="botão">botão</option>
                <option value="Cabo Verde">Cabo Verde</option>
                <option value="Camarões">Camarões</option>
                <option value="Camboja">Camboja</option>
                <option value="Canadá">Canadá</option>
                <option value="Cazaquistão">Cazaquistão</option>
                <option value="Chade">Chade</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Cidade do Vaticano">Cidade do Vaticano</option>
                <option value="Colômbia">Colômbia</option>
                <option value="Congo">Congo</option>
                <option value="Coréia do Sul">Coréia do Sul</option>
                <option value="Costa do Marfim">Costa do Marfim</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Croácia">Croácia</option>
                <option value="Dinamarca">Dinamarca</option>
                <option value="Djibuti">Djibuti</option>
                <option value="Dominica">Dominica</option>
                <option value="EUA">EUA</option>
                <option value="Egito">Egito</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Emirados Árabes">Emirados Árabes</option>
                <option value="Equador">Equador</option>
                <option value="Eritréia">Eritréia</option>
                <option value="Escócia">Escócia</option>
                <option value="Eslováquia">Eslováquia</option>
                <option value="Eslovênia">Eslovênia</option>
                <option value="Espanha">Espanha</option>
                <option value="Estônia">Estônia</option>
                <option value="Etiópia">Etiópia</option>
                <option value="Fiji">Fiji</option>
                <option value="Filipinas">Filipinas</option>
                <option value="Finlândia">Finlândia</option>
                <option value="França">França</option>
                <option value="Gabão">Gabão</option>
                <option value="Gâmbia">Gâmbia</option>
                <option value="Gana">Gana</option>
                <option value="Geórgia">Geórgia</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Granada">Granada</option>
                <option value="Grécia">Grécia</option>
                <option value="Guadalupe">Guadalupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guiana">Guiana</option>
                <option value="Guiana Francesa">Guiana Francesa</option>
                <option value="Guiné-bissau">Guiné-bissau</option>
                <option value="Haiti">Haiti</option>
                <option value="Holanda">Holanda</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungria">Hungria</option>
                <option value="Iêmen">Iêmen</option>
                <option value="Ilhas Cayman">Ilhas Cayman</option>
                <option value="Ilhas Cook">Ilhas Cook</option>
                <option value="Ilhas Curaçao">Ilhas Curaçao</option>
                <option value="Ilhas Marshall">Ilhas Marshall</option>
                <option value="Ilhas Turks & Caicos">Ilhas Turks & Caicos</option>
                <option value="Ilhas Virgens (brit.)">Ilhas Virgens (brit.)</option>
                <option value="Ilhas Virgens(amer.)">Ilhas Virgens(amer.)</option>
                <option value="Ilhas Wallis e Futuna">Ilhas Wallis e Futuna</option>
                <option value="Índia">Índia</option>
                <option value="Indonésia">Indonésia</option>
                <option value="Inglaterra">Inglaterra</option>
                <option value="Irlanda">Irlanda</option>
                <option value="Islândia">Islândia</option>
                <option value="Israel">Israel</option>
                <option value="Itália">Itália</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japão">Japão</option>
                <option value="Jordânia">Jordânia</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Latvia">Latvia</option>
                <option value="Líbano">Líbano</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lituânia">Lituânia</option>
                <option value="Luxemburgo">Luxemburgo</option>
                <option value="Macau">Macau</option>
                <option value="Macedônia">Macedônia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malásia">Malásia</option>
                <option value="Malaui">Malaui</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marrocos">Marrocos</option>
                <option value="Martinica">Martinica</option>
                <option value="Mauritânia">Mauritânia</option>
                <option value="Mauritius">Mauritius</option>
                <option value="México">México</option>
                <option value="Moldova">Moldova</option>
                <option value="Mônaco">Mônaco</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Nepal">Nepal</option>
                <option value="Nicarágua">Nicarágua</option>
                <option value="Niger">Niger</option>
                <option value="Nigéria">Nigéria</option>
                <option value="Noruega">Noruega</option>
                <option value="Nova Caledônia">Nova Caledônia</option>
                <option value="Nova Zelândia">Nova Zelândia</option>
                <option value="Omã">Omã</option>
                <option value="Palau">Palau</option>
                <option value="Panamá">Panamá</option>
                <option value="Papua-nova Guiné">Papua-nova Guiné</option>
                <option value="Paquistão">Paquistão</option>
                <option value="Peru">Peru</option>
                <option value="Polinésia Francesa">Polinésia Francesa</option>
                <option value="Polônia">Polônia</option>
                <option value="Porto Rico">Porto Rico</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Quênia">Quênia</option>
                <option value="Rep. Dominicana">Rep. Dominicana</option>
                <option value="Rep. Tcheca">Rep. Tcheca</option>
                <option value="Reunion">Reunion</option>
                <option value="Romênia">Romênia</option>
                <option value="Ruanda">Ruanda</option>
                <option value="Rússia">Rússia</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa Americana">Samoa Americana</option>
                <option value="Senegal">Senegal</option>
                <option value="Serra Leone">Serra Leone</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Singapura">Singapura</option>
                <option value="Síria">Síria</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="St. Kitts & Nevis">St. Kitts & Nevis</option>
                <option value="St. Lúcia">St. Lúcia</option>
                <option value="St. Vincent">St. Vincent</option>
                <option value="Sudão">Sudão</option>
                <option value="Suécia">Suécia</option>
                <option value="Suiça">Suiça</option>
                <option value="Suriname">Suriname</option>
                <option value="Tailândia">Tailândia</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tanzânia">Tanzânia</option>
                <option value="Togo">Togo</option>
                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                <option value="Tunísia">Tunísia</option>
                <option value="Turquia">Turquia</option>
                <option value="Ucrânia">Ucrânia</option>
                <option value="Uganda">Uganda</option>
                <option value="Uruguai">Uruguai</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnã">Vietnã</option>
                <option value="Zaire">Zaire</option>
                <option value="Zâmbia">Zâmbia</option>
                <option value="Zimbábue">Zimbábue</option>
              </select><br />
              <div class='labelEstate'><span>State or <br />Province</span><span class="ptbr">Estado <br />ou Província</span></div>
              <input type="text" class='stateProvince' name='estado' />
              <div class='label3'><span>City</span><span class="ptbr">Cidade</span></div>
              <input type="text" class='city' name='cidade' /><br />
              <div class="label"><span>Adress</span><span class="ptbr">Endereço</span></div>
              <input type="text" class='inputGrande'  name='endereco' /><br />
              <div class="label"><span>Complement</span><span class="ptbr">Complemento</span></div>
              <input type="text" class='inputGrande' name='complemento' />

        </fieldset>
    	
        <fieldset id="userWork">
        	<legend><h2>Where do you work?</h2><h4>Onde trabalha?</h4></legend>
     		
            <div class="label"><span>JE's name</span><span class="ptbr">Nome da EJ</span></div><input type="text" class='inputGrande' name='nome_ej' /><br />
            <div class="label"><span>Federation</span><span class="ptbr">Federação</span></div><input type="text" class='inputEJ' name='federacao_ej' />
            <div class="label3"><span>Other</span><span class="ptbr">Outros</span></div><input type="text" class='inputOthers' name='outros_ej' /><br />
            <div class="label"><span>Position</span><span class="ptbr">Cargo</span></div><input type="text" class='inputGrande' name='cargo'  />
        </fieldset>
        
    	<fieldset id="userPayment">
        	<legend><h2>How would you like to pay?</h2><h4>Como gostaria de pagar?</h4></legend>
        	<div class="labelRadio"><input name='tipo_pagamento' type="radio" name="payment" value="1" /><span>Pay it all at once</span><br /><span class="ptbr">Pagar tudo de uma vez</span></div>
 			<div class="labelRadio"><input name='tipo_pagamento' type="radio" name="payment" value="2" ><span>Pay it in 4(four) enrollments</span><br /><span class="ptbr">Pagar em 4 vezes</span></div></input>
        </fieldset>
        
        <fieldset id="userAgreement">
        	<legend><h2>Agreement</h2><h4>Termo de compromisso</h4></legend>
	            <textarea rows="30" cols="90" readonly=readonly ><?php include_once('termo.html'); ?>
            	</textarea> <br />
                <input type="checkbox"  name='agree' /> I agree with all the terms and conditions above 
               <button type="submit" name="" value="" class="css3buttonF1">DONE!</button>
        </fieldset>
    </form>
    
</body>
</html>