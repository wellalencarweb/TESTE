<?php
/**********************************************
*       Resposta em PHP para a questão 1      *
* autor:        Wellington da Silva Alencar   *
* data:         15/06/2017                    *
* função:       multiplosTresCinco            *
* parâmetros:   $ini (valor inicial ex.: 1)   *
*               $fim (valor final   ex.: 100) *
* retorno:      $resposta (valores em forma   *
*                de texto)                    *
***********************************************/
function multiplosTresCinco($ini,$fim)
{
    $resposta = "";

    // Validação para Range Positivo e Numérico
    if ((is_numeric($ini) && $ini == 1) && (is_numeric($fim) && $fim == 100)) {

        
        for ($i=$ini; $i <= $fim ; $i++) { 

            // Modulo de 3 e 5 igual a zero
            if (($i%3 == 0) && ($i%5 == 0)) {

                $resposta .= "<p>FizzBuzz</p><br>";

            // Modulo de 3 igual a zero
            } else if ($i%3 == 0) {
            
                $resposta .= "<p>Fizz</p><br>";

            // Modulo de 5 igual a zero
            } else if ($i%5 == 0) {

                $resposta .= "<p>Buzz</p><br>";
            }
        }
        return $resposta;

    } else {

        return $resposta = "parâmetros inválidos!";
    }
}

echo multiplosTresCinco(1,100);

