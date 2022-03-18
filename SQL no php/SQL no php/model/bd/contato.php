
<?php

     /********************************************************************************
     * Objetivo: Arquivo responsável por manipular os dados dentro do Banco de Dados
     *       (INSERT, UPDATE, DELETE e SELECT)
     * Autor: Vinicio
     * Data: 11/03/2022
     * Versão: 1.0 
     *************************************************/

    // import do arquivo que estabelece a conexão de dados
    require_once('conexaoMysql.php');
     // função para realizar o insert no BD 
    function insertContato($dadosContato)
    {   
        //Abre a conexão com o BD
        $conexao = conexaoMysql();
        
        //Monta o Script para enviar para o BD
        $sql = "insert into tblcontatos 
                            (nome,
                            telefone,
                            celular,
                            email,
                            obs)
	            values
                    ('".$dadosContato['nome']."',
                    '".$dadosContato['telefone']."',
                    '".$dadosContato['celular']."',
                    '".$dadosContato['email']."',
                    '".$dadosContato['obs']."');";
    
        //executa um script no BD
        //validação para verifiar se o script está correto
        if (mysqli_query($conexao, $sql))
        {    
            //para verificar se uma linha foi acrescentada no BD
            if(mysqli_affected_rows($conexao)){
                return true;
            }else{
                return false;
            }

        }else {
            return false;
        }
    }
    // função para realizar o update no BD 
    function updateContato()
    {

    }
    // função para excluuir no BD 
    function deleteContato()
    {
         
    }   
    // função para realizar o insert no BD 
    function selectAllContatos()
    {   
        //Abre a conexão com o BD
        $conexao = conexaoMysql();
        //script para listar todos os dados do banco de dados
        $sql = "select * from tblcontatos";        
        //executa o script sql no BD e guarda o retorno dos dados, se houver
        $result = mysqli_query($conexao, $sql);
        //Valida se o BD retornou registros
        if($result)
        {   
            // msqli_fetch_assoc() - permite converter os dados do BD
                // em um arrau para manipulação no PHP.
            // Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
            //o proprio while consegue gerenciar a qtde e vezes que o deverá ser feita a repetição
            $cont = 0;
            while ($rsDados = mysqli_fetch_assoc($result))
            {   
                //Cria um array com os dados do BD
                $arrayDados[$cont] = array (
                    "nome"      => $rsDados['nome'],
                    "telefone"  => $rsDados['telefone'],
                    "celular"   => $rsDados['celular'],
                    "email"     => $rsDados['email'],
                    "obs"       => $rsDados['obs']
                );
                $cont++;
            }
        }
        return $arrayDados;

    }

?>