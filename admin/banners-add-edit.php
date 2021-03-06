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
                        Banners
                        <small>Adicionar/Editar</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="banners.php"><i class="fa fa-file-image-o"></i> Banners</a></li>
                        <li class="active">Adicionar/Editar</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <?php if($id != "" && $acao != ""){ ?>
                                        <h3 class="box-title">Editar Banner</h3>
                                    <?php } else { ?>
                                        <h3 class="box-title">Adicionar Banner</h3>
                                    <?php } ?>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="banners-acoes.php" method="post" enctype="multipart/form-data" validate>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <?php if($id != "" && $acao != ""){
                                                    $sqlConsulta    = "SELECT * FROM galerias WHERE id = $id AND status = 1";
                                                    $resultConsulta = consulta_db($sqlConsulta);
                                                    $num_rows       = mysql_num_rows($resultConsulta);
                                                    while($consulta = mysql_fetch_object($resultConsulta)){
                                            ?>
                                                        <div class="img-edit">
                                                            <img src="../uploads/<?php echo $consulta->imagem; ?>" />
                                                        </div>
                                                        <input type="hidden" id="id" name="id" value="<?php echo $consulta->id; ?>" required />
                                                        <input type="hidden" id="acao" name="acao" value="edit" required />
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <?php if($id != "" && $acao != ""){ ?>
                                                <label for="imagem">Altere a imagem</label>
                                            <?php } else { ?>
                                                <label for="imagem">Adicione a imagem</label>
                                            <?php } ?>
                                            <input type="file" id="imagem" name="imagem" required /><br />
                                            <div class="callout callout-danger">
                                                <h4>A imagem deve ter o tamanho exato de 1920 x 880 pixels e ter menos de 2MB.</h4>
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
