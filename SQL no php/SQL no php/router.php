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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) 
    {
        //Recebendo dados via URL para saber quem esta solicitando e qual ação será realizada
        $component = strtoupper($_GET['component']);
        $action = strtoupper ($_GET['action']);

        

        switch ($component) 
        {
            case 'CONTATOS':
                //Import do controllerContatos
                require_once('Controller/controllerContatos.php');
                
                //Validação para identificar o tipo de ação que será realizada
                if($action == 'INSERIR'){                    
                    //Chama a função de inserir no controller 
                    $resposta = inserirContato($_POST);
                    //Valida o tipo de dados que a controller retornou
                    if(is_bool($resposta))//Se for boleano 
                    {   
                        //Verificar se i retorno foi verdadeiro
                        if($resposta)
                        echo ("<script>
                              alert('Registro inserido com suceso!');
                              window.location.href = 'index.php';
                              </script> ");
                    //Se o retorno for um array significa houve erro no processo de inserção
                    }elseif (is_array($resposta)){
                        echo ("<script>
                              alert('".$resposta['message']."');
                              window.history.back();
                              </script> "); // window.location.hfef = 'index.php';
                    }
                }elseif ($action == 'DELETAR') {
                    //recebe o id do registro que deverá ser excluido, que foi enviado 
                    //pela URL no link da imagem do excluir que foi acionado na index
                    $idContato = $_GET['id'];                     

                    $resposta = excluirContato($idContato);

                    if(is_bool($resposta))
                    {
                        if ($resposta) {
                            echo("<script>
                                    alert('Registro excluido com suceso!');
                                    window.location.href = 'index.php';
                                  </script> ");
                        }
                    }elseif (is_array($resposta)) 
                    {
                        echo ("<script>
                        
                                alert('".$resposta['message']."');
                                window.history.back();
                              </script> ");
                    }
                }
                

            break;
        }
        
    }

?>