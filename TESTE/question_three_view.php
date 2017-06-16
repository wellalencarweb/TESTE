<?php
/**********************************************
*       Resposta em PHP para a questão 3      *
* autor:        Wellington da Silva Alencar   *
* data:         15/06/2017                    *
* adaptação da Classe DatabaseConnection com  *
*novo método querysort() que retorna resultado*
*da função SORT() sobre o retorno  da QUERY   *
***********************************************/
	include_once "./class.conexao.php";
	class MyUserClass
	{
		public function getUserList()
		{
			$dbconn         = new DatabaseConnection();
			return $results = $dbconn->querysort("SELECT name FROM user");
	 	}
	}
