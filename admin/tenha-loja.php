<!DOCTYPE html>
<html>
    <?php include("inc/head.php"); ?>
    <body class="skin-blue">
        <?php include("inc/header.php"); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left austrini">
            <?php include("inc/menu.php"); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Tenha uma Loja
                        <small>Austrini</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Tenha uma Loja</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tenha uma Loja</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover table-austrini">
                                        <thead>
                                            <tr>
                                                <th class="th-id">ID</th>
                                                <th class="th-titulo">Nome</th>
                                                <th class="th-texto">E-mail</th>
                                                <th class="th-telefone">Telefone</th>
                                                <th class="th-data">Data</th>
                                                <th class="th-status">Status</th>
                                                <th class="bt-acoes">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sqlConsulta    = "SELECT *, date_format(data, '%d/%m/%Y') AS data FROM tenha_loja ORDER by data DESC";
                                                $resultConsulta = consulta_db($sqlConsulta);
                                                $num_rows       = mysql_num_rows($resultConsulta);
                                                while($consulta = mysql_fetch_object($resultConsulta)){
                                            ?>
                                            <tr>
                                                <td class="content-id"><?php echo $consulta->id; ?></td>
                                                <td class="content-nome"><?php echo $consulta->nome; ?></td>
                                                <td class="content-email"><?php echo $consulta->email; ?></td>
                                                <td class="content-telefone"><?php echo $consulta->telefone; ?></td>
                                                <td class="content-data"><?php echo $consulta->data; ?></td>
                                                <td class="content-status">
                                                    <?php 
                                                    if($consulta->status == 1){ ?>
                                                        <div class="alert alert-success alert-dismissable">
                                                            <b>Ativo</b>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <b>Inativo</b>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td class="content-botoes-acoes">
                                                    <a href="tenha-loja-acoes.php?id=<?php echo $consulta->id; ?>&acao=delete" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-times"></i> Excluir</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="th-id">ID</th>
                                                <th class="th-titulo">Nome</th>
                                                <th class="th-texto">E-mail</th>
                                                <th class="th-telefone">Telefone</th>
                                                <th class="th-data">Data</th>
                                                <th class="th-status">Status</th>
                                                <th class="bt-acoes">&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php include("inc/footer.php"); ?>

        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function(){
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });

                $(".btn-delete").on("click", function(){
                    var conf = confirm("Tem certeza que deseja excluir este registro?");
                    if(conf){
                        return true;
                    } else {
                        return false;
                    }
                });
            });
        </script>

    </body>
</html>
