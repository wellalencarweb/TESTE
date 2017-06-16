<?php include("./includes/header.php");

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


?>

<body>

    <div id="wrapper">

    <?php include("./includes/menu.php");?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">QUESTÃO <strong>1</strong></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <p>Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
                                    “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
                                    de ambos (3 e 5), imprima “FizzBuzz”.</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Código</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php htmlentities(highlight_string(file_get_contents('./question_one_view.php')));?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Resultado</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo multiplosTresCinco(1,100);?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("./includes/footer.php");?>
</body>

</html>
