<?php include("./includes/header.php");?>

    <body>

        <div id="wrapper">

        <?php include("./includes/menu.php");?>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header">QUESTÃO <strong>4</strong></h3>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <p>Desenvolva uma API Rest para um sistema gerenciador de tarefas
                                        (inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por
                                        prioridade.</p>
                                    <p>Desenvolver utilizando: Linguagem PHP (ou framework CakePHP);Banco de dados MySQL;</p>
                                    <p>Diferenciais: Criação de interface para visualização da lista de tarefas; Interface com drag and drop;Interface responsiva (desktop e mobile);</p>
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
                                    <th class="alignText">ID</th>
                                    <th class="alignText">NOMES</th>
                                    <th class="alignText" width="20%">AÇÃO</th>
                                  </tr>
                                </thead>
                                <tbody class="alignText" id="listauser"></tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>API REST PHP</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?php htmlentities(highlight_string(file_get_contents('./apiRestTESTE/api.php')));?></td>
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
                                    <th>CLASSE REST PHP</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?php htmlentities(highlight_string(file_get_contents('./apiRestTESTE/class.rest.php')));?></td>
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
                                    <th>JAVASCRIPT PARA OS EVENTOS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?php htmlentities(highlight_string(file_get_contents('./js/consome_rest.js')));?></td>
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
