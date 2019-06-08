<?php
	require_once('./interna/engine/include.php');

	if ($_POST)
	{ 
		if ($_POST['faleconosco'])
		{
			$emailTo = 'admwebmail@qaconsultoria.com.br';
			$subject = "Site - Fale Conosco - ".$_POST["subject"]." - ".$_POST["name"];
			$email = new MailSender();
			//Estou a receber o formulário, componho o corpo
			$corpo .= "Nome: " . utf8_decode($_POST["name"]) . "\n";
			$corpo .= "Empresa: " . utf8_decode($_POST["company"]) . "\n";
			$corpo .= "E-mail: " . utf8_decode($_POST["email"]) . "\n";
			$corpo .= "Telefone: ". $_POST["ddd"]." ".$_POST["phone"] . "\n\n";
			$corpo .= "Mensagem: " . utf8_decode($_POST["mensagem"]) . "\n";
		}
		else if($_POST['trabalheconosco'])
		{
			$emailTo = 'admwebmail@qaconsultoria.com.br';
			$subject = "Site - Trabalhe Conosco"." - ".$_POST["name"];
			$email = new MailSender();
			$corpo .= "Nome: " . utf8_decode($_POST["name"]) . "\n";
			$corpo .= "Telefone: ". $_POST["ddd"]." ".$_POST["phone"] . "\n\n";
			$corpo .= "E-mail: " . utf8_decode($_POST["email"]) . "\n";
			$corpo .= "Por quê deseja trabalhar na QUALITY: " . utf8_decode($_POST["mensagem"]) . "\n";
		}

		// Envia um email com a mensagem do usuário para o email de contato
		if($email->enviar($_POST["email"], utf8_decode($_POST["name"]), $emailTo, "Contato Site - Quality", utf8_decode($subject), $corpo)){
				$enviado = true;
				
		}
		
		//colocaMensagemSession('sucesso', 'Email enviado com sucesso');
		//imprimeSession();
		//header('Location: ./fale.php');
	}
	include('includes/top.php'); 
 
//linha?

?>
   <!-- Menu local (de cada página) -->
   <div id="menu_page">
    <div class="item">
	  <img src="images/menu_contact_us.png" name="link1" class="link_selecionado" id="link1" hspace="60" onmouseover="window.document['link1'].src = link_contact_us_over.src" onmouseout="window.document['link1'].src = link_contact_us.src" onclick="javascript: show_content('<?php echo $name_page; ?>','link1');" style="display: none;" />
	  <img src="images/menu_contact_us_over.png" hspace="60" class="link_over_selecionado" id="link1_over" style="display: block;cursor: text;" />
	</div>
	<div class="item">
	 <img src="images/menu_careers.png" name="link2" id="link2" hspace="60" onmouseover="window.document['link2'].src = link_careers_over.src" onmouseout="window.document['link2'].src = link_careers.src" onclick="javascript: show_content('<?php echo $name_page; ?>','link2');" />
	 <img src="images/menu_careers_over.png" hspace="60" id="link2_over" />
	</div>
	<div class="item">
	 <img src="images/menu_how_to_arrive.png" name="link3" id="link3" hspace="60" onmouseover="window.document['link3'].src = link_how_to_arrive_over.src" onmouseout="window.document['link3'].src = link_how_to_arrive.src" onclick="javascript: show_content('<?php echo $name_page; ?>','link3');" />
	 <img src="images/menu_how_to_arrive_over.png" hspace="60" id="link3_over" />
	</div>
    <div style="clear: both;"></div>
   </div>
   <br />
   <script language="JavaScript" type="text/javascript">
   <!--
   /*
      function submitForm() {
	    //make sure hidden and iframe values are in sync for all rtes before submitting form
	    updateRTEs();
	
	    //change the following line to true to submit form
	    alert("O campo mensagem é de preenchimento obrigatório!");
	    //+ (document.f_contact_us.rte1.value));
	    return false;
      }

      //Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
      initRTE("includes/scripts/lib_js/rte/images/", "includes/scripts/lib_js/rte/", "", true);*/
   //-->
   </script>
   <noscript>
    <p>
	 <b>Javascript não está habilitado em seu browser, para enviar este formulário habilite por favor.</b>
	</p>
   </noscript>
   <div class="main_content_border" style="height: auto;">
	<div class="main_content">
  	 <div class="content" id="fale_conosco_link1" style="display: block;">
		<?php include('includes/content/fale_conosco_link1.php'); ?>
	 </div>
	</div>
   </div>
   <br /><br />	  
<?php 

   include('includes/content_footer.php');   
   include('includes/footer.php'); 
?>