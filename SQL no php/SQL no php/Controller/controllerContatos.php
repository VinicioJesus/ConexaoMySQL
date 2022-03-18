<?php

    /**************************************************
     * Objetivo: Arquivo responsável pela manipulação de dados de contatos
     * Obs( Este arquivo fará a ponte entre a View e a Model)
     * Autor: Vinicio
     * Data: 04/03/2022
     * Versão: 1.0 
     *************************************************/
    
     //função para receber dados da View e encaminhar para a model (inserir)
    function inserirContato($dadosContato)
    
    {   
        //Validação para verificar se o objeto está vazio
        if(!empty($dadosContato))
        {
            //Validação de caixa vazia dos elementos nome, celular e email, pois são campos de preenchimento 
            //Obrigatórios no Banco de Dados 
            //Se o nome não estiver vazio
            if(!empty($dadosContato['txtNome']) && !empty($dadosContato['txtCelular']) && !empty($dadosContato['txtEmail']))
            {
                //Criação de um array de dados que será encaminhado a model
                    // para inserir no BD, é importante criar este array conforme
                    // as necessidades de manipulação do BD.
                // OBS: criar as chaves do aray conforme os nomes dos atributos
                // do BD
                $arrayDados = array (
                    "nome"      => $dadosContato['txtNome'],
                    "telefone"  => $dadosContato['txtTelefone'],
                    "celular"   => $dadosContato['txtCelular'],
                    "email"     => $dadosContato['txtEmail'],
                    "obs"       => $dadosContato['txtObs']
                );
                
                //import do arquivo de modelagem para manipular o BD
                require_once('model/bd/contato.php');
                //Chama a função que fara o insert no BD 
                if(insertContato($arrayDados)){
                    return true;
                
                }else{
                    return array('idErro' => 1,
                                 'message' => 'não foi possivel inserir os dados no Banco de Dados' );
                }

            }else {
                echo('Dados incompletos');
                return array('idErro'   => 2,
                             'message' => 'Existem campos obrigatórios que não foram preenchidos'  );
            }   
        }
    }

    //função para receber dados da View e encaminhar para a model (atualizar)
    function atualizarContato()
    {

    }

    //função para realizar a exclusão de um contato
    function excluirContato()
    {

    }

    //função para solicitar os dados da model e encaminhar a lista 
    //de contatos para a View
    function listarContato()
    {   
        //importa do arquivo que vai buscar os dados no BD
        require_once('model/bd/contato.php');
        //Chama a função que vai buscar os dados no BD
        $dados = selectAllContatos();

        if (!empty($dados)) {
            return $dados;
        }else{
            return false;
        }
    }


?>