<?php include("./includes/header.php");?>

<body>

    <div id="wrapper">

    <?php include("./includes/menu.php");?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">QUESTÃO <strong>2</strong></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <p>Refatore o código abaixo, fazendo as alterações que julgar necessário:</p>
                                <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código Exercício 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php htmlentities(highlight_string(file_get_contents('question_two_exercice.php')));?></td>
                                        </tr>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Código Refatorado de Forma Procedural</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php htmlentities(highlight_string(file_get_contents('question_two_view2.php')));?></td>
                             
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Código Refatorado de Forma Estruturada</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php htmlentities(highlight_string(file_get_contents('question_two_view.php')));?></td>
                             
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
