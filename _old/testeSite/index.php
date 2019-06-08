<?
	//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<?
			//require("engine/include.php");
		?>
		<link rel="stylesheet" type="text/css" href="./css/import.css" />
		<link rel="shortcut icon" href="./css/images/favicon.ico" type="image/x-icon">
		<script type="text/javascript" src="./engine/jquery.js"></script>
		<script type="text/javascript" src="./engine/jCycle.js"></script>

		<script type="text/javascript">
		<!--
		
			$('#slideshow').cycle({ 
				fx:    'fade', 
				speed:  2500 
			 });
				
		-->
		</script>
		
		<title>JEWC 2012</title>
	</head>
	<body>
		<div class="conteudo">
		<? $secaoAtual = "inicio";
		require("layoutUp.php"); 
		?>
			<div class="meio">
				<div class="esquerda">
					<div id="slideshow">
						<img src="./css/images/jewc1.png" width="620" height="250" /> 
						<img src="./css/images/jewc2.gif" width="620" height="250" /> 
						<img src="./css/images/jewc3.jpg" width="620" height="250" />
						<img src="./css/images/jewc3.jpg" width="620" height="250" /> 
					</div>
					<div class="meioHomeConteudo">
						<h3 class="tituloH3">JEWC 2012</h3>
						<p>Interaction South America 2011 is a design event that combines three days of inspiring conversations on activities presented by a set of regional and international experts.</p>
						<p>Our goal is to share knowledge on interaction design and its practice. Some of the most important global names in the area have already confirmed their presence in the 2011 edition.</p>
						<h3 class="tituloH3">O QUE HÁ DE NOVO?</h3>
						<p>Interaction South America 2011 is a design event that combines three days of inspiring conversations on activities presented by a set of regional and international experts.</p>
						<p>Our goal is to share knowledge on interaction design and its practice. Some of the most important global names in the area have already confirmed their presence in the 2011 edition.</p>
						<h3 class="tituloH3">PARATY</h3>
						<p>Interaction South America 2011 is a design event that combines three days of inspiring conversations on activities presented by a set of regional and international experts.</p>
						<p>Our goal is to share knowledge on interaction design and its practice. Some of the most important global names in the area have already confirmed their presence in the 2011 edition.</p>
					</div>
					<div class="parceirosHome">
						<h3 class="tituloH3">QUEM ESTÁ COM A GENTE</h3>
						<h4>PARCEIROS</h4>
					</div>
				</div>
				<div class="direita">
					<ul class="menuHome">
						<li class="menuHomePalestrantes"><a>Palestrantes <small>Conheça os nomes confirmados para o evento</small></a></li>
						<li class="menuHomeWorkshop"><a>Envio de Workshops <small>Envie seu workshop para ser apresentado no evento</small></a></li>
						<li class="menuHomeProgramacao"><a>Programação <small>Dia a dia, o que vai rolar</small></a></li>
						<li class="menuHomeCidade"><a>A Cidade <small>Conheça mais sobre Paraty e a JEWC City</small></a></li>
					</ul>
					<div class="direitaHomeNews">
						<h3 class="tituloH3">NEWSLETTER</h3>
						<p>Cadastre seu e-mail e receba atualizações sobre o evento</p>
					</div>
					<div class="direitaHomeFacebook">
						<h3 class="tituloH3">EU VOU COM CERTEZA</h3>
						<div class="fb-like-box" data-href="http://www.facebook.com/jewc2012" data-width="270" data-height="327" data-show-faces="true" data-border-color="#ffffff" data-stream="false" data-header="false"></div>
					</div>
					<div class="direitaHomeTwitter">
						<h3 class="tituloH3">O QUE ROLA DO TWITTER</h3>
						<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
						new TWTR.Widget({
						  version: 2,
						  type: 'profile',
						  rpp: 4,
						  interval: 30000,
						  width: 270,
						  height: 300,
						  theme: {
							shell: {
							  background: '#30302f',
							  color: '#ffffff'
							},
							tweets: {
							  background: '#ffffff',
							  color: '#30302f',
							  links: '#4aed05'
							}
						  },
						  features: {
							scrollbar: false,
							loop: false,
							live: true,
							behavior: 'all'
						  }
						}).render().setUser('jewc2012').start();
						</script>
					</div>
					<div class="direitaHomeContagem">
						<div class="direitaHomeContagemEsquerda">
							<h3 class="tituloH3">CONTAGEM REGRESSIVA</h3>
							<p class="contagemDias">200</p>
							<p>dias para o Maior Evento do Mundo! Ansiedade!</p>
						</div>
						<div class="direitaHomeContagemDireita">
							<img src="./css/images/biggestEventIcon.png" width="101" height="134" />
						</div>
						<br class="clear" />
					</div>
					<div class="direitaHomeClima">
						<h3 class="tituloH3">CLIMA JEWC</h3>
						<p>Faça o download exclusivo de material do JEWC para você entrar no clima do evento! Clique aqui e veja a barra à direita.</p>
						<a>ME PÕE NO CLIMA</a>
					</div>
				</div>
				<br class="clear" />
			</div>
		</div>
		<?
		//require("layoutDown.php"); 
		?>
	</body>
</html>
