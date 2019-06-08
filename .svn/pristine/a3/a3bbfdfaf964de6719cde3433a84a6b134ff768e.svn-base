<?php
	require('./include.php');
	
	
	if($_POST)
	{
		extract($_POST);
		
		$enviar = new MailSender();
		
		$enviar->enviar('hylsonk@gmail.com','Japa',  $email,'treinamento PHP', $convidado, $mensagem);
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<!-- Informações de SEO -->
		<meta http-equiv="content-language" content="pt-br" />
		<meta name="author" content="ejcm" />
		<meta name="keywords" content="ejcm" />
		
		<title>E-mail</title>
	</head>
	<body>
		<div>
			<h2>E-mail</h2>
			<form method="post" action="">
				<fieldset>
					<legend>Enviar E-mail</legend>
					<label>E-mail:</label>
					<input type="text" name="email" value="<?php echo $_POST['email'];?>"/>
					<label>Convidado:</label>
					<input type="text" name="convidado" value="<?php echo $_POST['convidado'];?>"/>
					<label>Mensagem:</label>
					<textarea name="mensagem"></textarea>
					<input type="submit" name="enviar" value="Enviar"/>
				</fieldset>
			</form>
			<a href="./index.php"><input type="button" id="voltar" name="voltar" value="Voltar"/></a>
		</div>	
	</body>
</html>