<?php
class usuariosController extends AppController {

	// A variável $data já é herdada.
	
	// Não tem index.

	public function local() //mapa com a opção de escolher de que continente voce é
	{
		
	}
	
	public function inscricao() //formulario de inscricao
	{

        //$this->loadScript('lib/jmask.js');

		$conf_options = array(
            'JADE' => 'JADE',
            'BrasilJunior' => 'Brasil Junior');
        $this->set("conf_options", $conf_options);
		
		
		if(isset($_SESSION['returnDados'])){

            $this->set("retorno",$_SESSION['returnDados']['usuarios']);
		    unset($_SESSION['returnDados']['usuarios']);
        }
		

		if($this->data) {

            
		

				 if($this->data['usuarios']['password'] = $this->usuarios->encrypt($this->data['usuarios']['password'])){
					 $_SESSION['registro'] = &$this->data;
					 sleep(2);
					 $this->go("confirmacao");
				}
			}
		}
	}

	public function confirmacao() //confirmar dados
	{

        if(!$_SESSION['registro']) error404();

        unset($_SESSION['usuarios']['outros_ej']);
		$dados = $_SESSION['registro'];
		$this->set("dados", $dados);

        if($_POST['go']){

			if($this->usuarios->insert($dados)){
                sleep(2);
                $_SESSION['3pagina'] = 'canGo';
                $this->go("sucesso");
            } else trigger_error("Não conseguiu inserir");
        }
		
		if($_POST['notGo']){
			$_SESSION['returnDados'] = &$dados;
			$this->go("inscricao");
		}
		
		
	}
	
	public function sucesso() //pagina avisando que o cadastro foi realizado com sucesso
	{
       if(!$_SESSION['3pagina']) error404();
       unset($_SESSION['3pagina']);
       unset($_SESSION['registro']);
    }


    public function visualizar()
	{
        $lista = $this->usuarios->find('all');
        $lista2 = $this->usuarios->recursiveDecode($lista);
        $this->set("dados",$lista2);
    }
};