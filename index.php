<?php include_once("inc/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Austrini Móveis Planejados - Seu lugar. Seu estilo.</title>

    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/favicon.ico" />

    <link rel="stylesheet" href="css/bootstrap.min.css"><!-- Bootstrap -->
	<link rel="stylesheet" href="css/nivo-slider.css"><!-- Include slider stylesheet -->
	<link rel="stylesheet" href="css/menu.css"><!-- Include menu stylesheet -->
	<link rel="stylesheet" href="css/lightbox.css" /><!-- Lightbox -->
	<link rel="stylesheet" href="css/dtpicker.css" /><!-- Datepicker -->
    <link rel="stylesheet" href="css/ui-spinner.css" /><!-- Spinner -->
	<link rel="stylesheet" href="css/animate.css"><!-- Aimation WOW -->
	<link rel="stylesheet" href="css/custom.css"><!-- Include Custom stylesheet -->
	<link rel="stylesheet" href="css/color.css"><!-- Include Color Basic stylesheet -->
	<link rel="stylesheet" href="css/media-query.css"><!-- Include Media querys stylesheet -->
    <link rel="stylesheet" href="css/austrini.css"><!-- Austrini stylesheet -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
	<nav id="menu-nav" class="menu-nav">
		 <div class="logo-container hidden-xs">
			<img src="img/logo_topo.jpg" alt="Logo" />
		 </div>
		 <div id="menu-responsive">
			<span class="logo"><img src="img/mini_logo_topo.jpg" alt="Logo" /></span>
			<span class="button">
				<span></span>
				<span></span>
				<span></span>
			</span>
		 </div>
		 <ul>
		   <li><a data-link="#empresa" href="#">Empresa</a></li>
		   <li><a data-link="#gestao" href="#">Gestão de Pessoas</a></li>
		   <li><a data-link="#work" href="#">Trabalhe Conosco</a></li>
		   <li><a data-link="#ambientes" href="#">Ambientes</a></li>
		   <li><a data-link="#noticias" href="#">Notícias</a></li>
		   <li><a data-link="#sustentabilidade" href="#">Sustentabilidade</a></li>
		   <li><a data-link="#tenha-uma-loja" href="#">Tenha uma loja Austrini</a></li>
		   <li><a data-link="#contact" href="#">Fale Conosco</a></li>
		   <li><a href="#" class="top-button" data-link="#"><span class="icon-top glyphicon glyphicon-chevron-up"></span></a></li>
		</ul>
	</nav>
	<section id="slider">
		<div class="slider nivoSlider" id="top">
			<?php
                $sqlConsultaBanners		= "SELECT imagem FROM galerias WHERE status = 1";
                $resultConsultaBanners 	= consulta_db($sqlConsultaBanners);
                while($consultaBanners 	= mysql_fetch_object($resultConsultaBanners)){
            ?>
		    		<img src="uploads/<?php echo $consultaBanners->imagem; ?>" />
		    <?php } ?>
		</div> 
	</slider> <!-- /.slider -->
	<section id="destaques">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3 class="section-title title-pad-top">EVENTOS</h3>
					<article class="post item wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
						<!-- carousel-eventos -->
						<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
							<!-- Carousel items -->
							<div class="carousel-inner">
								<?php
									$countEventos = 1;
					                $sqlConsultaEventos		= "SELECT imagem FROM eventos WHERE status = 1";
					                $resultConsultaEventos 	= consulta_db($sqlConsultaEventos);
					                while($consultaEventos 	= mysql_fetch_object($resultConsultaEventos)){
					            ?>
										<div class="item <?php if($countEventos == 1) echo active; ?>">
											<a href="uploads/<?php echo $consultaEventos->imagem; ?>" data-lightbox="eventos">
												<img src="uploads/<?php echo $consultaEventos->imagem; ?>" />
											</a>
										</div>
								<?php
										$countEventos++;
									}
								?>
							</div>
						</div>
					</article>
				</div>
            	<div class="col-md-3">
                	<h3 class="section-title title-pad-top">NOTÍCIAS</h3>
                    <article class="post item wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                    	<?php
			                $sqlConsultaNoticias	= "SELECT *, date_format(data, '%d/%m') AS data FROM noticias WHERE status = 1 ORDER by id DESC LIMIT 1";
			                $resultConsultaNoticias	= consulta_db($sqlConsultaNoticias);
			                while($consultaNoticias	= mysql_fetch_object($resultConsultaNoticias)){
			            ?>
		                        <header>
		                            <img src="uploads/<?php echo $consultaNoticias->imagem; ?>" class="img-responsive" alt="<?php echo $consultaNoticias->titulo; ?>" />
		                            <span class="post-date"><?php echo formata_data_austrini($consultaNoticias->data); ?></span>
		                            <h2 class="post-title"><?php echo $consultaNoticias->titulo; ?></h2>
		                        </header>
		                        <span class="post-container"><?php echo $consultaNoticias->texto; ?></span>
		                        <footer class="text-center">
		                            <a href="#noticias" class="btn btn-default">Ver mais</a>
		                        </footer>
		                <?php } ?>
                    </article>
                </div>
				<div class="col-md-3"><!-- Feedback Block -->
					<h3 class="section-title">NOTA DOS ARQUITETOS</h3>
					<!-- Feedback Block -->
					<div id="carousel-feedback" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
						<li data-target="#carousel-feedback" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-feedback" data-slide-to="1"></li>
					  </ol>
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">

						<?php
					  		$countNotas = 1;
			                $sqlConsultaNotas		= "SELECT *, date_format(data, '%d/%m') AS data FROM notas WHERE status = 1 ORDER by id DESC";
			                $resultConsultaNotas 	= consulta_db($sqlConsultaNotas);
			                while($consultaNotas	= mysql_fetch_object($resultConsultaNotas)){
			            ?>
								<div class="item <?php if($countNotas == 1) echo "active"; ?>"> <!-- Row 1 -->
									<div class="row">
									   <div class="col-lg-12">
										  <div class="feedback-user <?php if($countNotas == 1) echo "wow fadeInDown"; ?>" <?php if($countNotas == 1) { ?> data-wow-duration="1s" data-wow-delay="0.7s" <?php } ?>>
											 <img src="uploads/<?php echo $consultaNotas->imagem; ?>" class="img-circle" alt="<?php echo $consultaNotas->nome; ?>" />
											 <span class="name"><?php echo $consultaNotas->nome; ?></span>
											 <span class="text"><?php echo $consultaNotas->nota; ?></span>
										  </div>
									   </div>
									</div>
								</div>
						<?php
								$countNotas++;
							}
						?>
					  </div>
						<!-- Controls -->
						<div class="carousel-control-container">
						  <a class="left carousel-control" href="#carousel-feedback" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carousel-feedback" role="button" data-slide="next">
							<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
					<!-- end Feedback Block -->
			 	</div><!-- end Feedback Block -->
			</div>
		</div>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
						<span class="title">RESUMO SOBRE NÓS</span>
						<span class="text">
						    <span class="logo"><img src="img/mini-logo-austrini.png" alt="logo" /></span>
							A AUSTRINI é uma empresa que desenvolve soluções diferenciadas e inovadoras, voltadas ao bem estar.
						</span>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
						<span class="title">JUNTE-SE A NÓS</span>
						<ul class="social-icons">
							<li><a class="facebook-icon" href="#"><span>facebook</span></a></li>
							<li><a class="linkedin-icon" href="#"><span>instagran</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</section>
	<section id="empresa" class="section-empresa">
		<div class="container">
			<h2 class="section-title">EMPRESA</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
					<div class="box-empresa opacity box-shadow"></div>
					<div class="text-empresa">
						<p>
							A AUSTRINI é uma empresa que desenvolve soluções diferenciadas e inovadoras, voltadas ao bem estar.<br /><br />
							O núcleo do negócio é o desenvolvimento do design dos nossos produtos e projetos estruturais, com soluções técnicas diferenciadas e venda especializada.<br /><br />
							<b>Missão</b><br /><br />
							Ser uma marca reconhecida com a preferência dos clientes.<br /><br />
							Criar e desenvolver novos processos e metodologias utilizando tecnologia de ponta visando oferecer excelentes produtos e serviços.<br /><br />
							Buscar resultados para a organização através da produtividade e meritocracia.
							Fazer dos pequenos detalhes um diferencial competitivo.<br /><br />
							Visão de Futuro<br /><br />
							Ser uma grande organização de móveis planejados, criando diferenciais competitivos e soluções que facilitem a vida das pessoas, com um time de alta performance, proporcionando retorno aos acionistas de forma sustentável garantido sua longevidade.<br /><br />
							Valores<br />
							Honestidade<br />
							Ética
						</p>
					</div>
				</div>
				<div class="col-md-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
					<div class="figure">
						<img src="img/img_empresa.jpg" alt="empresa" class="box-shadow">
						<div class="figcaption box-shadow">
							Area Total : 50 mil metros quadrados | Area Construida : 30 mil metros quadrados<br />
							Refeitório | Grêmio recreativo | Sala para motoristas
						<div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="gestao">
		<div class="container">
			<h2 class="section-title">GESTÃO DE PESSOAS</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="box wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
						<span class="circular-image">
							<img  class="img-circle" src="img/img-meritocracia.jpg" alt="img sample" />
						</span>
						<span class="title">
							<span>MERITOCRACIA</span>
						</span>
						<span class="text">
							É um sistema de gestão que considera o mérito dos  envolvidos para que possam alcançar posições de  maior destaque.
							Ao tomar a decisão de implantar um programa dessa natureza, a Empresa visa buscar caminhos para:<br /><br />
							- Melhorar seus resultados.<br /><br />
							- Estimular o aumento da produtividade e da eficiência.<br /><br />
							- Aperfeiçoar seus métodos de administrar seus recursos humanos.<br /><br />
							- Somar forças para atingir objetivos comuns.<br /><br />
							- Manter um ambiente saudável num clima de harmonia, cooperação e comprometimento de todos.
						</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
						<span class="circular-image">
							<img  class="img-circle" src="img/img-alimentacao.jpg" alt="img sample" />
						</span>
						<span class="title">
							<span>ALIMENTAÇÃO</span>
						</span>
						<span class="text">
							A Austrini oferece a todos os colaboradores, visitantes, fornecedores, etc. Um restaurante com acompanhamento de nutricionista para elaboração dos pratos e cardápios para uma dieta balanceada.
						</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.7s">
						<span class="circular-image">
							<img  class="img-circle" src="img/img-convenio.jpg" alt="img sample" />
						</span>
						<span class="title">
							<span>CONVÊNIO MÉDICO</span>
						</span>
						<span class="text">
							Convênio médico individual, extensivo aos familiares.<br /><br/ >
							A AUSTRINI permite aos colaboradores incluirem os  familiares no convenio médico.
						</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.9s">
						<span class="circular-image">
							<img  class="img-circle" src="img/img-ticket.jpg" alt="img sample" />
						</span>
						<span class="title">
							<span>TICKET ALIMENTAÇÃO</span>
						</span>
						<span class="text">
							É outro beneficio que a AUSTRINI oferece aos seus colaboradores, deixando ele livre para consumo onde seja de sua preferência.
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="work">
		<div class="container">
			<h2 class="section-title">TRABALHE CONOSCO</h2>
		</div>
		<div class="row form-container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
			<div class="container">
				<div class="col-md-8 col-md-offset-2">
					<form data-toggle="validator" data-wow-delay="0.5s" data-wow-duration="1s" class="wow fadeInDown animated" action="trabalhe-conosco-envia.php" method="post" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInDown;" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<input type="text" required="" placeholder="Nome" id="nome" name="nome" class="form-control">
								<input type="email" required="" placeholder="E-mail" id="email" name="email" class="form-control">
								<input type="file" required="" placeholder="Selecione um arquivo" id="arquivo" name="arquivo" class="form-control">
							</div>
							<div class="col-md-12">
								<button class="btn btn-default btn-lg pull-right" type="submit">Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</section>
	<section id="ambientes" class="section-ambientes">
		<div class="container">
			<h2 class="section-title">AMBIENTES</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 linha-1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
					<?php
		                $sqlConsultaAmbientes		= "SELECT *, date_format(data, '%d/%m') AS data FROM ambientes WHERE status = 1 ORDER by id DESC";
		                $resultConsultaAmbientes	= consulta_db($sqlConsultaAmbientes);
		                while($consultaAmbientes	= mysql_fetch_object($resultConsultaAmbientes)){
		            ?>
							<div class="col-md-3 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
							<?php
								$countAmbientesImagens = 1;
				                $sqlConsultaAmbientesImagens		= "SELECT * FROM ambientes_imagens WHERE status = 1 AND id_ambiente = $consultaAmbientes->id ORDER by id DESC";
				               	$resultConsultaAmbientesImagens		= consulta_db($sqlConsultaAmbientesImagens);
				               	$numRowsAmbientesImagens       		= mysql_num_rows($resultConsultaAmbientesImagens);
				               	if($numRowsAmbientesImagens >= 1){
				               		while($consultaAmbientesImagens	= mysql_fetch_object($resultConsultaAmbientesImagens)){
				            ?>
										<a href="uploads/<?php echo $consultaAmbientesImagens->imagem; ?>" title="<?php echo $consultaAmbientes->nome; ?>" data-lightbox="box-<?php echo strtolower($consultaAmbientes->nome); ?>" data-title="<?php echo $consultaAmbientes->nome; ?>" class="box-salas <?php if($countAmbientesImagens > 1) echo "link-oculto"; ?>">
											<?php
												if($countAmbientesImagens == 1){
											?>
													<img src="uploads/<?php echo $consultaAmbientes->imagem; ?>" alt="<?php echo $consultaAmbientes->nome; ?>">
													<span class="titulo-ambiente"><?php echo strtoupper($consultaAmbientes->nome); ?></span>
											<?php } ?>
										</a>
							<?php
										$countAmbientesImagens++;
									}
								} else {
							?>
									<a href="#" title="<?php echo $consultaAmbientes->nome; ?>" data-lightbox="box-<?php echo strtolower($consultaAmbientes->nome); ?>" data-title="<?php echo $consultaAmbientes->nome; ?>" class="box-salas">
										<img src="uploads/<?php echo $consultaAmbientes->imagem; ?>" alt="<?php echo $consultaAmbientes->nome; ?>">
										<span class="titulo-ambiente"><?php echo strtoupper($consultaAmbientes->nome); ?></span>
									</a>
							<?php
								}
							?>
							</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section id="noticias" class="section-grey">
		<div class="container">
			<h2 class="section-title">NOTÍCIAS</h2>
		</div>
		<div class="container" id="article-list">
			<?php
                $sqlConsultaNoticias2		= "SELECT *, date_format(data, '%d/%m') AS data FROM noticias WHERE status = 1 ORDER by data DESC";
                $resultConsultaNoticias2	= consulta_db($sqlConsultaNoticias2);
                while($consultaNoticias2	= mysql_fetch_object($resultConsultaNoticias2)){
            ?>
					<article class="post item wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
		                <header>
		                    <img src="uploads/<?php echo $consultaNoticias2->imagem; ?>" class="img-responsive" alt="<?php echo $consultaNoticias2->titulo; ?>" />
		                    <span class="post-date"><?php echo formata_data_austrini($consultaNoticias2->data); ?></span>
		                    <h2 class="post-title"><?php echo $consultaNoticias2->titulo; ?></h2>
		                </header>
		                <span class="post-container"><?php echo $consultaNoticias2->texto; ?></span>
		            </article>
		    <?php } ?>
		</div>
	</section>
	<section id="sustentabilidade">
		<div class="container">
			<h2 class="section-title">SUSTENTABILIDADE</h2>
			<h3 class="section-sub-title wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
				Os móveis da AUSTRINI são fabricados apenas com madeiras de reflorestamento, não causando nenhum tipo de dano ao meio ambiente. Sendo fabricado 100% em MDF, (Medium Density Fiberboard) considerada madeira ecologicamente correta.<br /><br />
				Com o reaproveitamento de água e reciclagem de resíduos plásticos e de madeira, a empresa garante um fim ecológico às sobras dos materiais utilizados no processo produtivo. Além da questão ecológica os recursos desse projeto vai para o RH e se transforma em beneficios para os colaboradores.
			</h3>
		</div>
	</section>
	<section id="tenha-uma-loja">
		<div class="container">
			<h2 class="section-title">TENHA UMA LOJA AUSTRINI</h2>
		</div>
		<div class="row form-container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
			<div class="container">
				<div class="col-md-8 col-md-offset-2">
					<form data-toggle="validator" data-wow-delay="0.5s" data-wow-duration="1s" class="wow fadeInDown animated" action="tenha-loja-envia.php" method="post" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInDown;" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<input type="text" required="" placeholder="Nome" id="nome" name="nome" class="form-control">
								<input type="email" required="" placeholder="E-mail" id="email" name="email" class="form-control">
								<input type="tel" required="" placeholder="Telefone" id="telefone" name="telefone" class="form-control">
							</div>
							<div class="col-md-12">
								<button class="btn btn-default btn-lg pull-right" type="submit">Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</section>
	<section id="contact">
		<div class="container-text">
			<h2 class="section-title">FALE CONOSCO</h2>
		</div>
		<div class="block-container">
			<div class="box-header wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<a href="#" class="icon-container col-md-offset-2">
								<span class="icon glyphicon glyphicon-earphone"></span>
								(17) 3253-9400
							</a>
							<a href="#" class="icon-container col-md-offset-2">
								<span class="icon glyphicon glyphicon-send"></span>
								contato@austrini.com.br
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="maps-container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s" id="map-canvas"></div>
			<div class="form-container">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<form method="post" action="contacts.php" class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s" data-toggle="validator">
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" required>
									</div>
									<div class="col-md-6">
										<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
									</div>
									<div class="col-md-6">
										<input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Telefone" required>
									</div>
									<div class="col-md-12">
										<textarea class="form-control" name="mensagem" id="mensagem" rows="3" placeholder="Mensagem" required></textarea>
										<button type="submit" class="btn btn-default btn-lg">Enviar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
					<span class="text pull-right">
					    <a href="http://www.phormadesign.com.br" target="_blanck" class="logo">
					    	<img src="img/logo_phorma.jpg" alt="logo" />
					   	</a>
					</span>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="script/jquery.min.js"></script>
	<script src="script/jquery-migrate-1.2.1.min.js"></script>
	<script src="script/jquery-ui.min.js"></script>

	<script src="script/bootstrap.min.js"></script><!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="script/jquery.menu.min.js"></script><!-- Include the menu scripts -->
	<script src="script/jquery.dtpicker.min.js"></script><!-- Datepicker -->
	<script src="script/lightbox.min.js"></script><!-- Lightbox -->
    <script src="script/jquery.grid-a-licious.min.js"></script><!-- Block list -->
	<script src="script/wow.min.js"></script><!-- Animate script -->
	
	<script src="script/jquery.nivo.slider.js"></script><!-- Include the slider scripts -->

	<script src="script/jquery.scrollTopAll.min.js"></script><!-- ScrolloTop -->
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script><!-- Google Maps-->
	<script src="script/gmaps.js"></script><!-- Google Maps-->
	<script src="script/custom.js"></script><!-- Include Custom scripts -->

	</body>
</html>