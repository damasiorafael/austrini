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
                        Banners
                        <small>Adicionar</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="banners.php"><i class="fa fa-file-image-o"></i> Banner</a></li>
                        <li class="active">Adicionar/Editar</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Adicionar Banner</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="banners-acoes.php" method="post" enctype="multipart/form-data" validate>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Adicione a imagem</label>
                                            <input type="file" id="imagem" name="imagem" required><br />
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
