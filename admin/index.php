<!DOCTYPE html>
<html>
    <?php include("inc/head.php"); ?>
    <body class="skin-blue">
        <?php include("inc/header.php"); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include("inc/menu.php"); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Admin
                        <small>Austrini</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> Home</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaBanners     = "SELECT id FROM galerias";
                                            $resultConsultaBanners  = consulta_db($sqlConsultaBanners);
                                            $num_rows_banners       = mysql_num_rows($resultConsultaBanners);
                                            echo $num_rows_banners;
                                        ?>
                                    </h3>
                                    <p>
                                        Banners ativos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file-image-o"></i>
                                </div>
                                <a href="banners.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaEventos     = "SELECT id FROM eventos";
                                            $resultConsultaEventos  = consulta_db($sqlConsultaEventos);
                                            $num_rows_eventos       = mysql_num_rows($resultConsultaEventos);
                                            echo $num_rows_eventos;
                                        ?>
                                    </h3>
                                    <p>
                                        Eventos ativos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <a href="eventos.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaNoticias     = "SELECT id FROM noticias";
                                            $resultConsultaNoticias  = consulta_db($sqlConsultaNoticias);
                                            $num_rows_noticias       = mysql_num_rows($resultConsultaNoticias);
                                            echo $num_rows_noticias;
                                        ?>
                                    </h3>
                                    <p>
                                        Notícias ativas
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <a href="noticias.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaNotas     = "SELECT id FROM notas";
                                            $resultConsultaNotas  = consulta_db($sqlConsultaNotas);
                                            $num_rows_notas       = mysql_num_rows($resultConsultaNotas);
                                            echo $num_rows_notas;
                                        ?>
                                    </h3>
                                    <p>
                                        Notas dos arquitetos ativas
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <a href="notas.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaTrabalhe     = "SELECT id FROM trabalhe";
                                            $resultConsultaTrabalhe  = consulta_db($sqlConsultaTrabalhe);
                                            $num_rows_trabalhe       = mysql_num_rows($resultConsultaTrabalhe);
                                            echo $num_rows_trabalhe;
                                        ?>
                                    </h3>
                                    <p>
                                        Currículos não lidos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-building-o"></i>
                                </div>
                                <a href="trabalhe-conosco.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaAmbientes     = "SELECT id FROM ambientes";
                                            $resultConsultaAmbientes  = consulta_db($sqlConsultaAmbientes);
                                            $num_rows_ambientes       = mysql_num_rows($resultConsultaAmbientes);
                                            echo $num_rows_ambientes;
                                        ?>
                                    </h3>
                                    <p>
                                        Ambientes ativos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <a href="ambientes.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaTenhaLoja     = "SELECT id FROM ambientes";
                                            $resultConsultaTenhaLoja  = consulta_db($sqlConsultaTenhaLoja);
                                            $num_rows_tenha       = mysql_num_rows($resultConsultaTenhaLoja);
                                            echo $num_rows_tenha;
                                        ?>
                                    </h3>
                                    <p>
                                        Novos interessados ter uma loja
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-dollar"></i>
                                </div>
                                <a href="tenha-loja.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sqlConsultaContato     = "SELECT id FROM contatos";
                                            $resultConsultaContato  = consulta_db($sqlConsultaContato);
                                            $num_rows_contato       = mysql_num_rows($resultConsultaContato);
                                            echo $num_rows_contato;
                                        ?>
                                    </h3>
                                    <p>
                                        Contatos novos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <a href="fale-conosco.php" class="small-box-footer">
                                    Acessar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php include("inc/footer.php"); ?>

    </body>
</html>
