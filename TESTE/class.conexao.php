<?php
class DatabaseConnection 
{
    
    public  $sql;
    public  $resultado;
    public  $query;
    private $idConexao;
    //Contrutor irá receber os dados para conexão
    public function __construct($semUso="") 
    {
        // Dados
    	$host       = "localhost";
        $user       = "user";
        $password   = "password";
        $banco      = "test";
        
		
        $this->idConexao = mysqli_connect($host, $user, $password, $banco);

		//Falha na conexão
        if (!$this->idConexao) {
            //Informando erro
            die('Não foi possível conectar: ' . mysqli_error()."<br><br>");		
        }
	}

    public function querysort($sql)
    {
        /* carrega a propriedade sql com o sql solicitado */
        $this->sql = $sql;
        /* executa a query e salva na propriedade recordset */
        $this->query = mysqli_query($this->idConexao,$this->sql) or ("Erro na Execucao QUERY: ".mysqli_error($this->idConexao));
        /* gera array associativo */
        $this->resultado = mysqli_fetch_assoc($this->query);
        /* retorna com a ordenação SORT()*/
        return sort($this->resultado);
    }
}
?>