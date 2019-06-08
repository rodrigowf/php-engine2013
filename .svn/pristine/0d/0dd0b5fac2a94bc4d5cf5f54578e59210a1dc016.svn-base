<?php
	require_once('phpmailer/class.phpmailer.php');
	class MailSender
	{
		private $from;
		private $fromName;
		private $endSMTP;
		private $userSMTP;
		private $senhaSMTP;
		private $port;
		
		public $mail;
		public $msgSucesso;
		public $msgErro;
		public $erros;
		
		public function __construct($from_val = null, $fromName_val = null, $endSMTP_val = null,$userSMTP_val = null,$senhaSMTP_val = null, $port_val = null, $msg_sucesso = 'O email foi enviado com sucesso', $msg_erro = 'Erro ao enviar o email')
		{
			require(dirname(__FILE__).'/include.php');
			$this->from = ($from_val != null) ? $from_val : $from;
			$this->fromName = ($fromName_val != null) ? $fromName_val : $fromName;
			$this->endSMTP = ($endSMTP_val != null) ? $endSMTP_val : $endSMTP;
			$this->userSMTP = ($userSMTP_val != null) ? $userSMTP_val : $userSMTP;
			$this->senhaSMTP = ($senhaSMTP_val != null) ? $senhaSMTP_val : $senhaSMTP;
			$this->port = ($port_val != null) ? $port_val : $port;
			$this->msgSucesso = $msg_sucesso;
			$this->msgErro = $msg_erro;
			$this->mail = null;
		}
		
		private function mandaEmail(&$mail, $msg_erro = null, $msg_sucesso = null)
		{
			if($mail->Send()) 
			{
				return true;
			}
			else
			{
				$this->erros['erro'] = $this->msgErro.': '.$mail->ErrorInfo;
				return false;
			}
		}
		
		public function enviar($emailFrom, $nomeFrom, $emailTo, $nomeTo, $assunto, $mensagem, $msg_erro = null, $msg_sucesso = null)
		{
			// Colocando os valores das mensagens de sucesso e de erro
			$this->msgErro =  isset($msg_erro) ?  $msg_erro : $this->msgErro;
			$this->msgSucesso =  isset($msg_sucesso) ?  $msg_sucesso : $this->msgSucesso;
			
			//Variavel do envio de e-mail
			$this->mail = new PHPMailer();
			$this->mail->SetLanguage("br", './language/');
			
			$this->mail->IsSMTP();
			$this->mail->SMTPSecure = "ssl"; 
			$this->mail->Host = $this->endSMTP;
			$this->mail->SMTPAuth = true;
			$this->mail->Username = $this->userSMTP;
			$this->mail->Password = $this->senhaSMTP;
			
			$this->mail->From = $this->from;
			$this->mail->FromName = $this->fromName;
			if(isset($this->port)) $this->mail->Port = $this->port;
			
			require_once(dirname(__FILE__).'/funcoes.php');
			
			// Se forem emails válidos
			if( email($emailFrom))
			{	
				if(is_array($emailTo))
				{
					foreach($emailTo as $index => $email)
					{
						if(email($email))
						{ 
							$this->mail->AddAddress($email, $nomeTo[$index]);
						}
						else
						{
							$this->erros['erro'] = 'O e-mail '.$email.' é inválido';
						}
					}
				}
				else
				{
					if(email($emailTo))
					{ 
						$this->mail->AddAddress($emailTo, $nomeTo);
					}
					else
					{
						$this->erros['erro'] = 'O e-mail '.$emailTo.' é inválido';
					}
				}
				$this->mail->AddReplyTo($emailFrom,$nomeFrom);
				
				$this->mail->Subject = $assunto;
				$this->mail->Body = $mensagem;
				
				if($this->mandaEmail($this->mail, $msg_erro, $msg_sucesso)){
				
					return true;
				}
				
				echo $this->erros['erro'];
				return false;
			}
			else
			{
				$this->erros['erro'] = 'O e-mail para resposta é inválido';
				return false;
			}
		}
	}	
?>