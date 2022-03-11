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
    mysqli_query($conexao,$sql);

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

    }

?>
