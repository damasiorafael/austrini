<!DOCTYPE html>
<html>
    <?php
        include("inc/head.php");
        $id = $_REQUEST["id"];
        $acao = $_REQUEST["acao"];

    ?>
    <body class="skin-blue">
        <?php include("inc/header.php"); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left austrini">
            <?php include("inc/menu.php"); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Imagens de Ambientes
                        <small>Adicionar/Editar</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="ambientes-imagens.php"><i class="fa fa-home"></i>Imagens de Ambientes</a></li>
                        <li class="active">Adicionar/Editar</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Adicionar Imagens de Ambientes</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="ambientes-imagens-acoes.php" method="post" enctype="multipart/form-data" validate>
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="nome">Ambiente</label>
                                                <select class="form-control" id="id_ambiente" name="id_ambiente" required>
                                                    <option value=""> -- Selecione um ambiente -- </option>
                                                <?php
                                                    $sqlConsulta    = "SELECT nome, id FROM ambientes ORDER by id ASC";
                                                    $resultConsulta = consulta_db($sqlConsulta);
                                                    $num_rows       = mysql_num_rows($resultConsulta);
                                                    while($consulta = mysql_fetch_object($resultConsulta)){
                                                ?>
                                                        <option value="<?php echo $consulta->id; ?>"><?php echo $consulta->nome; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="imagem">Adicione a imagem</label>
                                            <input type="file" id="imagem" name="imagem" required /><br />
                                            <div class="callout callout-danger">
                                                <h4>A imagem deve ter o tamanho mínimo de 800 x 600 pixels e ter menos de 2MB.</h4>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button class="btn btn-primary btn-success" type="submit"><i class="fa fa-check"></i> Salvar</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php include("inc/footer.php"); ?>

    </body>
</html>
