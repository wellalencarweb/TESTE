<?php
	/**********************************************
	*       Resposta em PHP para a questão 2      *
	* autor:        Wellington da Silva Alencar   *
	* data:         15/06/2017                    *
	* resposta procedural                         *
	***********************************************/
	if (isset($_SESSION['loggedin']) || $_COOKIE['loggedin']) {
		
		if ($_SESSION['Loggedin'] == true || $_COOKIE['Loggedin'] == true) {
			
			header("Location: http://www.google.com");
			exit();
		}
	} 
