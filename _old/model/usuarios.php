<?php

class Usuarios extends appModel 
{
	public function validaSenha(&$data)
	{
		if ( !empty($data['usuarios']['password']) && ($data['usuarios']['password'] == $data['usuarios']['chk_password']) )
		{
			unset($data['usuarios']['chk_password']);
			return true;
		}
		else 
		{
			return false;
		}
	}
	
    public function ExportExcel($cond = NULL){

        $excel = new ExcelWriter("compilacao.xls");

        if($excel==false){
            echo $excel->error;
        }

        $campos=array('EMAIL','NOME','SOBRENOME','ESTADO','LOGIN','PAIS','TELEFONE','SEXO','PASSAPORTE','NASCIMENTO','NOME DA EJ','INSTITUCAO DE ENSINO',
               'FEDERADA?','CONFEDERACAO','FEDERACAO','TEMPO MEJ','IDIOMAS','TAMANHO CAMISA','NIVEL','DATA DE REGISTRO','PAGOU?','PARCELAS','PACOTE?','LOCOMO��O?','CARGO','SE NAO FOR FEDERADA PRENCHE OUTROS');
        $excel->writeLine($campos);

        $conn = mysql_connect("108.167.157.168", "jewc201_jewc201", "Ejcm_2012@") or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysql_error());
        if($conn)
        {
            mysql_select_db("jewc201_jewc2012", $conn);
        }

        if(is_null($cond)) $consulta = "select * from usuarios";
        else $consulta = "select * from usuarios $cond";

        $resultado = mysql_query($consulta);

        if($resultado==true){
            while($linha = mysql_fetch_array($resultado)){
                $campos=array($linha['email'],$linha['primeiro_nome'],$linha['sobrenome'],$linha['estado'],$linha['login'],$linha['pais'],$linha['telefone'],$linha['sexo']
                ,$linha['cpf_passaporte'],$linha['nascimento'],$linha['nome_ej'],$linha['instituicao'],$linha['blFederada'],$linha['confederacao'],$linha['federacao_ej']
                ,$linha['tempoMej'],$linha['idioma'],$linha['tamanho'],$linha['nivel'],$linha['registro'],$linha['intPagou'],$linha['parcelas'],$linha['pacote']
                ,$linha['locomocao'],$linha['cargo'],$linha['outros_ej']);
                $excel->writeLine($campos);
            }

            $excel->close();
        }
    }

    public function SearchAlgorithim($k){
       $db = Database::singleton();
       $i = 0;
       $keyword = "'%$k%'";
       $query = "Select DISTINCT * from usuarios where primeiro_nome like $keyword or sobrenome like $keyword or pais like $keyword or nome_ej = $keyword
       or confederacao like $keyword or federacao_ej like $keyword or outros_ej like $keyword";
       $result = mysql_query($query);
       if($result){
           if(mysql_num_rows($result)!=0){
               while($row1 = mysql_fetch_assoc($result)){
                   //echo '';
                   echo "<a href=../visualizar/".$row1['id'].">";
                   echo '<b>';
                   echo $row1['primeiro_nome'].' '.$row1['sobrenome'];
                   echo '</b></a> <br />';
                   $i++;
               }
           }
       }

       if($i==0){
           echo "Nenhum resultado para: $k";
       }

   }

   public function getTableHeaders($a){
       $db = Database::singleton();
       $query = "select COLUMN_NAME as Info from information_schema.columns where table_name = '$a'";
       $r = mysql_query($query);
       if($r){

           $tmp = array();

           while($f = mysql_fetch_assoc($r)){
               $tmp[] = $f['Info'];
           }
           return $tmp;

       }else trigger_error("Deu ruim no SQL");
   }

   public function advancedSearch($a,$b){
       $db = Database::singleton();
       $tmp = array();
	   if(is_array($a)){
		   foreach($a as $d){
			 $query = "SELECT DISTINCT id,primeiro_nome,sobrenome FROM usuarios WHERE  $d like '%$b%' ";
             $result = mysql_query($query);
			 while($a = mysql_fetch_assoc($result)){
             $tmp[] = $a;
             };
		   }
		}elseif(is_string($a)){
			$query = "SELECT DISTINCT id,primeiro_nome,sobrenome FROM usuarios WHERE  $a like '%$b%' ";
			$result = mysql_query($query);
			$tmp[] = mysql_fetch_assoc($result);	
		}

       return $tmp;
   }


   public function checkVagas($a){
       $db = Database::singleton();
       $query = "SELECT count(*) as Vagas FROM usuarios where confederacao='$a'";
       $result = mysql_query($query);
       $assoc = mysql_fetch_assoc($result);
       return $assoc['Vagas'];
   }

    public function SetPaypalPayed($id){
     $db = Database::singleton();
     if(is_object($db))
     {
        return $db->execute("UPDATE usuarios SET intPagou = 0.5 where id = $id");
     } else trigger_error('Não instanciou o objeto');
   }

    public function setPaymentType($a,$b){
        $db = Database::singleton();
        if(is_object($db)){
            if($b == 0)return $db->execute("UPDATE usuarios SET intPagou = 0.5 where id = $a");
            if($b == 0.5)return $db->execute("UPDATE usuarios SET intPagou = 1 where id = $a");
            if($b == 1)return $db->execute("UPDATE usuarios SET intPagou = 0 where id = $a");
        } else trigger_error('Não instanciou o objeto');
    }

    public function setPaymentTypeBJ($a,$b,$c){
        $db = Database::singleton();
        if(is_object($db)){
            if($b == 0)return $db->execute("UPDATE pagamentos SET pago = 0.5 where idUsuario = $a and parcelaNum = $c");
            if($b == 0.5)return $db->execute("UPDATE pagamentos SET pago = 1 where idUsuario = $a and parcelaNum = $c");
            if($b == 1)return $db->execute("UPDATE pagamentos SET pago = 0 where idUsuario = $a and parcelaNum = $c");
        } else trigger_error('Não instanciou o objeto');
    }

    public function getBoletosNumber($count = 'notCount'){
        try{
            $db = Database::singleton();
            if(is_object($db)){
                if($count == 'notCount') $q = $db->query
                ("SELECT DISTINCT * FROM usuarios LEFT JOIN pagamentos ON usuarios.id = pagamentos.idUsuario
                WHERE Confederacao = 'Brasil Junior' OR Confederacao = 'Nao Confederada BJ' OR Confederacao = 'Pos Junior BJ'
                group by email order by numParcelas DESC, primeiro_nome ASC;");


                if(!$q) throw new Exception ("Não conseguiu fazer a query!");
                $a = $db->getResult();
                $tmp = array();
                while($b = mysql_fetch_assoc($a)) $tmp[] = $b;

                return ($tmp);
                }else throw new Exception("Não instanciou o objeto!");

        }catch(Exception $e){
                trigger_error($e->getMessage(), E_USER_ERROR);
            }

    }

    public function getStatusPagamento($idUsuario){
        $db = Database::singleton();
        if(is_object($db)){
            $q =  $db->query("SELECT parcelaNum,pago,numParcelas FROM pagamentos where idUsuario = $idUsuario");
            if(!$q) trigger_error("Nao rodou a query");
            $a = $db->getResult();
            $tmp = array();

            while($b = mysql_fetch_assoc($a)) $tmp[] = $b;


            return $tmp;

        }  else trigger_error("Não instanciou o objeto!");

    }


    public function validaEditar($user){

        $validacao = array(
            "primeiro_nome" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "sobrenome" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "niver_mes" => array("rule" => "is_numeric", "msg" => "Invalid Date"),
            "niver_dia" => array("rule" => "is_numeric", "msg" => "Invalid Date"),
            "niver_ano" => array("rule" => "is_numeric", "msg" => "Invalid Date"),
            "idioma" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "estado" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "cidade" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "telefone" => array("rule" => "is_numeric", "msg" => "Just Numbers and not empty"),
            "nome_ej" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "cargo" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "tempoMej" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "instituicao" => array("rule" => "not_empty", "msg" => "Can't be empty"),
            "sexo" => array("rule" => "is_checked", "msg" => "What is your sex?"),
        );

        $a = parent::valida($validacao, $user);

        return $a;

    }

    public function verificaFila($user){

        debug($user);

        switch($user['usuarios']['pacote']){

            case('1'):    $fila = "You're registered as a confederated member of JADE";
                            break;
            case('3'):    if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como membro confederado à Brasil Junior";
                          else $fila = "Você está inscrito como membro confederado à Brasil Junior";
                            break;
            case('4'):    if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como membro não-confederado à Brasil Junior";
                          else $fila = "Você está inscrito como membro não-confederado à Brasil Junior";
                            break;
            case('5'):    if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como pós-júnior brasileira";
                          else $fila = "Você está inscrito como pós-júnior brasileiro";
                            break;
            case('6'):    if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como membro da equipe da Brasil Junior";
                          else $fila = "Você está inscrito como membro da equipe da Brasil Junior";
                            break;
            case('7'):    if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como Conselheira da FEJEMG";
                          else $fila = "Você está inscrito como Conselheiro da FEJEMG";
                            break;
            case('8'):    if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como Conselheira da RioJunior";
                          else $fila = "Você está inscrito como Conselheiro da RioJunior";
                            break;
            case('9'):    if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como Presidente de uma EJ federada a Brasil Junior";
                          else $fila = "Você está inscrito como Presidente de uma EJ federada a Brasil Junior";
                            break;
            case('10'):   if($user['usuarios']['sexo'] === "F") $fila = "Você está inscrita como Conselheira da Brasil Junior";
                          else $fila = "Você está inscrito como Conselheiro da Brasil Junior";
                            break;
            case('11'):   $fila = "You're registered as a Confederation's Director";
                            break;
            case('66'):   $fila = "Você está na fila de espera para membros confederados à Brasil Junior";
                            break;
            case('67'):   $fila = "Você está na fila de espera para membros não-confederados à Brasil Junior";
                            break;
            case('68'):   $fila = "Você está na fila de espera para pós-juniores da Brasil Junior";
                            break;
            default: $fila = "There is something wrong with your register. Please make contact so we can solve it.";

        }

        return $fila;
    }

}