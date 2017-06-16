<?php
    /***************************************************
    *       Resposta em PHP para a questão 4           *
    * autor:        Wellington da Silva Alencar        *
    * data:         16/06/2017                         *
    * arquivo:      API REST                           *
    * Realiza: Listagem; Inserção; Alteração ;Exclusão *
    ****************************************************/
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    require_once("class.rest.php");

    class API extends REST {
        private $con;

        public function __construct() {
            parent::__construct();        
            $this->con = $this->dbConnect();
            mysqli_set_charset($this->con, 'utf8');
        }

        public function processApi() 
        {
            $func = strtolower(trim(str_replace("/", "", $_REQUEST['action'])));

            if ((int) method_exists($this, $func) > 0)
                $this->$func();
            else
                $this->response('', 404);
        }

        private function json($data) {
            if (is_array($data)) {
                return json_encode($data);
            }
        }

        /* Listar os Usuários*/
        private function listar() 
        {
            // Aceita apenas Requisições do tipo GET
            if ($this->get_request_method() != "GET") {
                $this->response($this->json(array('status' => 'false', 'message' => 'Método não pemitido.')), 405);
            } 

        
            if (isset($this->_request['token']) && !empty($this->_request['token'])) {  

                $token = $this->_request['token'];

                if($token == "wellteste") {
                    
                    $sql = "SELECT id,name FROM user";

                    $query = mysqli_query($this->con, $sql);
                    $rows  = mysqli_num_rows($query);

                    if ($rows > 0) {
                        $result = '';

                        while($dados = mysqli_fetch_assoc($query)) 
                            $result[] = $dados;                                                                    

                        $this->response($this->json($result), 200);                      

                    } else {
                        $res = array('status' => 'false', 'message' => '0');
                        $this->response($this->json($res), 200);                
                    }
                } else {
                    $error = array('status' => 'false', 'message' => 'Token inválido');
                    $this->response($this->json($error), 404);                
                }
            } else {
                $error = array('status' => 'false', 'message' => 'Token inválido');
                $this->response($this->json($error), 200);            
            } 
              
        }

        /* Incluir novo Usuário */
        private function inclusao() 
        {
            // Aceita apenas Requisições do tipo POST
            if ($this->get_request_method() != "POST") {
                $this->response($this->json(array('status' => 'false', 'message' => 'Método não pemitido.')), 405);
            } 

        
            if (isset($this->_request['token']) && !empty($this->_request['token'])) {  

                $token = $this->_request['token'];
                $name  = addslashes($_REQUEST['name']);

                if($token == "wellteste" &&  $name != "") {
                    
                    $sql       = "INSERT INTO user (name) VALUES ('".$name."')";
                    $query     = mysqli_query($this->con, $sql);
                    $result[0] = 'ok'; 
                    if (!$query) {

                        $result[0] = 'erro';
                    }
                    $this->response($this->json($result), 200); 

                } else {
                    $error = array('status' => 'false', 'message' => 'Parâmetros inválidos');
                    $this->response($this->json($error), 404);                
                }
            } else {
                $error = array('status' => 'false', 'message' => 'Token Inválido');
                $this->response($this->json($error), 200);            
            } 
              
        }


        /* Alterar o Usuário */
        private function alteracao() 
        {
            // Aceita apenas Requisições do tipo POST
            if ($this->get_request_method() != "POST") {
                $this->response($this->json(array('status' => 'false', 'message' => 'Método não pemitido.')), 405);
            } 

            
        
            if (isset($this->_request['token']) && !empty($this->_request['token'])) {  

                $token = $this->_request['token'];
                $name  = addslashes($_REQUEST['name']);
                $id    = addslashes($_REQUEST['id']);

                if($token == "wellteste" &&  $name != "" && $id !="") {
                    
                    $sql       = "UPDATE  user SET name ='".$name."' WHERE id ='".$id."' ";
                    $query     = mysqli_query($this->con, $sql);
                    $result[0] = 'ok'; 
                    if (!$query) {

                        $result[0] = 'error' ;
                    }

                    $this->response($this->json($result), 200); 

                } else {
                    $error = array('status' => 'false', 'message' => 'Parâmetros inválidos');
                    $this->response($this->json($error), 404);                
                }
            } else {
                $error = array('status' => 'false', 'message' => 'Token Inválido');
                $this->response($this->json($error), 200);            
            } 
              
        }

        /* Excluir o Usuário */
        private function exclusao() 
        {
            // Aceita apenas Requisições do tipo POST
            if ($this->get_request_method() != "POST") {
                $this->response($this->json(array('status' => 'false', 'message' => 'Método não pemitido.')), 405);
            } 

        
            if (isset($this->_request['token']) && !empty($this->_request['token'])) {  

                $token = $this->_request['token'];
                $id    = addslashes($_REQUEST['id']);

                if($token == "wellteste" &&  $id != "") {
                    
                    $sql       = "DELETE  FROM user WHERE id ='".$id."'";
                    $query     = mysqli_query($this->con, $sql);
                    $result[0] = 'ok'; 
                    if (!$query) {

                        $result[0] = 'erro';
                    }
                    $this->response($this->json($result), 200); 

                } else {
                    $error = array('status' => 'false', 'message' => 'Parâmetros inválidos');
                    $this->response($this->json($error), 404);                
                }
            } else {
                $error = array('status' => 'false', 'message' => 'Token Inválido');
                $this->response($this->json($error), 200);            
            } 
              
        }
    }

    $api = new API;
    $api->processApi();
?>