<?php

require_once 'boleto-lib/Boleto.class.php';
require_once CONFIG . 'boleto.php';

class GeraBoleto
{
	public $emiteBoleto;
	
	//Dados separados pela natureza deles
	public $cedente;	//agencia, agencia_dv, conta, conta_dv
	public $sacado;		//nome, endereço1, endereço2, 
	public $boleto;		//prazo, taxa, vencimento, valor, info123, instrucoes1234
    public $configs;
	public $nossoNumero;
	
	public function __construct()
	{
		
		
	}
	
	/**
	 * Configura o setup padrão para todos os boletos dessa aplicacção
	 * Regras de preenchimento das variáveis $cedente e $boleto
	 * 
	 * Altere aqui de acordo com o seu sistema / banco
	 */
	public function setup($nossoNumero, $valor, $vencimento, $parcelaNum, $numParcelas, $nome_cliente, $endereço_cliente, $cidade_uf_cliente, $emissao = null)
	{
		$cedente	= &$this->cedente;
		$sacado		= &$this->sacado;
		$boleto		= &$this->boleto;
        $configs	= &$this->configs;

		//Dados específicos de cada boleto emitido:
        $boleto['nosso_numero']				= $nossoNumero; //vary from bank to bank; so see readme file at boleto-lib/bancos/BANKCODE/readme.txt
        $boleto['valor_boleto']				= $valor; //No thousand separator. Full stop for decimal separator. This is the total amount before deductions/additions
        $boleto['data_vencimento']			= $vencimento; //'dd-mm-yyyy'; //This is the "Due to" date field. Default == 5 days from issuing. Set -1 to make it "Contra Apresentação" which means "cash against document"
        $boleto['numero_documento']			= $boleto['nosso_numero']; //Generally this is used for placing the order number

		if ( $emissao )
		{
			$boleto['data_documento'] 		= $emissao;
			$boleto['data_processamento'] 	= $emissao;
		}


        $sacado['nome']					= $nome_cliente; //Client's name (payer)
        $sacado['endereco']				= $endereço_cliente; //Client's address line 1, includes street name and number
        $sacado['cidade_uf']			= $cidade_uf_cliente; //Client's address line 2, includes city, state and zip code
		
		//check with your issuer bank for instructions on how to fill up the next lines
        $configs['demonstrativo1']	 	= 'Pagamento da entrada para o JEWC 2012 (Junior Enterprise World Conference)'; 
        $configs['demonstrativo2']	 	= "Mensalidade referente à parcela de número $parcelaNum de um total de $numParcelas parcelas";
        $configs['demonstrativo3']	 	= 'Taxa bancária embutida no preço.';
        $configs['instrucoes1']		   	= '- Sr. Caixa, cobrar multa de 1% por dia após o vencimento';
        $configs['instrucoes2']		   	= '- Receber até 15 dias após o vencimento';
        $configs['instrucoes3']		   	= '- Em caso de dúvidas entrar em contato conosco: financeiro@jewc2012.com';
        $configs['instrucoes4']		   	= '';

		$cedente['bank_code']		= 237;        		//Merchant's bank code (NO check digit). Note that this is not the same as the branch number
		$cedente['bank_code_dv']	= 2;
		$cedente['agencia']			= BANCO_AGENCIA;    //Merchant's branch number (NO check digit)
		$cedente['agencia_dv']      = BANCO_AGENCIA_DV;
		$cedente['conta']           = BANCO_CONTA;      //Merchant's account number (NO check digit)
		$cedente['conta_dv']        = BANCO_CONTA_DV;   //check digit of Merchant's account number

        $cedente['carteira']		= BANCO_CARTEIRA; //vary from bank to bank; so see readme file at boleto-lib/bancos/BANKCODE/readme.txt
        $cedente['carteira_nosso_numero'] 	= BANCO_CARTEIRA; //vary from bank to bank; so see readme file at boleto-lib/bancos/BANKCODE/readme.txt

        $cedente['nome']			= CEDENTE_NOME;
        $cedente['cpf_cnpj']		= CEDENTE_CNPJ;
        $cedente['endereco']		= CEDENTE_ENDERECO; //Merchant's address
        $cedente['cidade_uf']		= CEDENTE_CIDADE_UF; //Merchant's city and state


        $cedente['logo']			= CEDENTE_LOGO; //Image location of merchant's logo
	}

	/**
	 * Gera nosso número e cadastra no banco
	 */
	public function gera1Via()
	{

	}

	public function get2Via()
	{

	}

	public function emite()
	{
		$cedente	= &$this->cedente;
		$sacado		= &$this->sacado;
		$boleto		= &$this->boleto;
		$configs	= &$this->configs;
		$arguments 	= array();

        $arguments['library_location']		= LIB.'boleto-lib'; //adjust to the location where you have stored Boleto's library. If it is outside your current application folder you gotta use ../

        $arguments['bank_code']				= $cedente['bank_code'];
        $arguments['bank_code_cd']			= $cedente['bank_code_dv'];
        $arguments['agencia']				= $cedente['agencia'];
		$arguments['agencia_dv']			= $cedente['agencia_dv'];
        $arguments['conta']					= $cedente['conta'];
        $arguments['conta_dv']				= $cedente['conta_dv'];
        $arguments['merchant_logo']			= $cedente['logo']; //Image location of merchant's logo
        $arguments['cpf_cnpj']				= $cedente['cpf_cnpj'];
        $arguments['carteira']				= $cedente['carteira']; //vary from bank to bank, so see readme file at boleto-lib/bancos/BANKCODE/readme.txt

        $arguments['cedente']				= $cedente['nome'];
        $arguments['endereco']				= $cedente['endereco']; //Merchant's address
        $arguments['cidade_uf']				= $cedente['cidade_uf']; //Merchant's city and state

        $arguments['sacado']				= $sacado['nome'];	    //Client's name (payer)
        $arguments['endereco1']				= $sacado['endereco'];	//Client's address line 1, includes street name and number
        $arguments['endereco2']				= $sacado['cidade_uf']; //Client's address line 2, includes city; state and zip code

        $arguments['numero_documento']		= $boleto['numero_documento']; //Generally this is used for placing the order number
        $arguments['nosso_numero']			= $boleto['nosso_numero']; //vary from bank to bank, so see readme file at boleto-lib/bancos/BANKCODE/readme.txt
        $arguments['valor_boleto']			= $boleto['valor_boleto']; //No thousand separator. Full stop for decimal separator. This is the total amount before deductions/additions
        $arguments['data_vencimento']		= $boleto['data_vencimento']; //'dd-mm-yyyy', //This is the "Due to" date field. Default == 5 days from issuing. Set -1 to make it "Contra Apresentação" which means "cash against document"
		$arguments['carteira_nosso_numero']	= $cedente['carteira_nosso_numero']; //vary from bank to bank, so see readme file at boleto-lib/bancos/BANKCODE/readme.txt
    //	$arguments['quantidade']			= 'Your value here'; //Default == empty
    //	$arguments['valor_unitario']		= 'Your value here'; //default empty
    	$boleto['data_documento'] 		and $arguments['data_documento']		= $boleto['data_documento']; //Default == issueing date.
    	$boleto['data_processamento'] 	and $arguments['data_processamento']	= $boleto['data_processamento']; //Default == issueing date.
    
    //	$arguments['desconto_abatimento']	= '0.00'; //Comma as decimal separator. This is the discount field (-)
    //	$arguments['outras_deducoes']		= '0.00'; //Comma as decimal separator. Combined general deductions (-)
    //	$arguments['mora_multa']			= '0.00'; //Comma as decimal separator. Interest and overdue fees (+)
    //	$arguments['outros_acrescimos']		= '50.55'; //Comma as decimal separator. Combined general additions (+)

        $arguments['demonstrativo1']		= $configs['demonstrativo1'];
        $arguments['demonstrativo2']		= $configs['demonstrativo2'];
        $arguments['demonstrativo3']		= $configs['demonstrativo3'];
        $arguments['instrucoes1']			= $configs['instrucoes1'];
        $arguments['instrucoes2']			= $configs['instrucoes2'];
        $arguments['instrucoes3']			= $configs['instrucoes3'];
        $arguments['instrucoes4']			= $configs['instrucoes4'];
    //	$arguments['title']               	= 'My title'; //Default == Merchant's name (cedente), this is the value that goes in the html head <title>My title</title>
    	$arguments['local_pagamento']		= 'Pag&aacute;vel preferencialmente na Rede Bradesco ou Bradesco Expresso'; //Default == Pagável em qualquer Banco até o vencimento
    //	$arguments['especie']				= 'Your value here'; //Default == R$ for BRL currency dollar sign
    //	$arguments['especie_doc']			= 'Your value here'; //Default == empty
    //	$arguments['aceite']				= 'Your value here'; //Default == N (possible values are S for YES and N for NO)
    //	$arguments['avalista']				= 'Michael Jackson'; //guarantor's name. Default empty

		
		$boleto = new Boleto($arguments);
		$boleto->output(false);
		if ( $boleto->warnings )
		{
			foreach( $boleto->warnings as $warning)
			{
				trigger_error($warning, E_USER_WARNING);
			}
			
			trigger_error('Erro ao emitir boleto!', E_USER_ERROR);
		}
		else 
		{
			$boleto->output();
		}
		exit();
	}
}