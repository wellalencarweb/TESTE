<?php 
/**********************************************
*       Resposta em PHP para a questão 2      *
* autor:        Wellington da Silva Alencar   *
* data:         15/06/2017                    *
* função:       Refatoração                   *
* descrição:    Passando a SESSION para a     *
* função validSession e o COOKIE para a       *
* função validCookie temos o encapsulamento   *
* dos dados e com apenas duas linhas          *
* verifica-se a necessidade de LOCATION       *
***********************************************/

// Validação de Session
function validSession($session)
{

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		return header("Location: http://www.google.com");

	} else {

		return 0;
	}

}

// Validação de Cookie
function validCookie($cookie)
{

	if (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {

		return header("Location: http://www.google.com");

	} else {

		return 0;
	}

}

// Setando Valores nas Globais
$_SESSION['Loggedin'] = 'logado';
$_COOKIE['Loggedin']  = 'logado';

/*Este Trecho Realiza a tarefa dos "IF's antigos antes de refatorar"*/
echo validSession($_SESSION);
echo validCookie($_COOKIE);
