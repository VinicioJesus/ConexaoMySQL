<?php 
 /******************************************************************************
 * Objetivo: Arquivo de rota, para segmentar as ações encaminhadas pela view
 *      (dados do form, listagem de dados, ação de excluir ou atualizar).
 *      Esse arquivo será responsável por encaminhar as solicitações para
 *      a Controller
 * Data: 04/03/2022
 * Autor: Vinicio
 * Versão: 1.0
 *******************************************************************************/
// O que chegar aqui a gente vai mandar pra controller
// O arquivo de rota é o maestro 
 $action = (string) null;
 $component = (string) null;
 
    
    //Validação para verificar se a requisição é um POST  de um formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        //Recebendo dados via URL para saber quem esta solicitando e qual ação será realizada
        $component = strtoupper($_GET['component']);
        $action = strtoupper ($_GET['action']);

        switch ($component) 
        {
            case 'CONTATOS':
                //Import do controllerContatos
                require_once('Controller/controllerContatos.php');
                
                if($action == 'INSERIR')
                inserirContato($_POST);

                elseif($action == 'EDITAR')
                atualizarContato($_POST);

            break;
        }

        
    }

?>