<?php


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">
	<title>Jennifer Sanz - Portfolio </title>
	<meta name="description" content="Explorez mon portfolio créatif: Découvrez mon travail passionné et innovant dans le développement web sur WordPress. Explorez une collection de sites web dynamiques, d'interfaces utilisateur élégantes et de solutions technologiques novatrices. Plongez dans mon monde de création numérique et découvrez comment je transforme des idées en expériences en ligne exceptionnelles.">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<header id="top" class="header">
		<!-- container background animé -->
		<?php if (is_front_page()) : ?>
			<div class="container-background">
				<img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/lines.svg" alt="Image SVG animée">
			</div>
		<?php endif; ?>
		<!-- navigation -->
		<nav id="site-navigation" class="nav " role="navigation">
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.webp" alt="Logo">
				</a>
			</div>

			<!-- menu mobile -->
			<div class="btn-menu">
				<img width="34" height="34" src="https://img.icons8.com/material/24/f6f6f6/squared-menu--v2.png" alt="squared-menu--v2" />
			</div>

			<div class="navigation">
				<?php
				/* affichage du menu récupéré dans wordpress */
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'container' => '', // afin d'éviter d'avoir une div autour 
						'menu_class' => 'navigation--menu', // ma classe personnalisée 
					)
				);
				?>
				<div class="sociaux">
					<a href="https://www.linkedin.com/in/jennifer-sanz/" target="_blank" aria-label="linkedin">
						<i class="fa-brands fa-linkedin fa-2xl"></i>
					</a>
					<a href="https://github.com/jenny-sanz?tab=repositories" target="_blank" aria-label="github">
						<i class="fa-brands fa-github fa-2xl"></i>
					</a>

				</div>
			</div>
			<div class="navigation-mobile">
				<div class="wrapper">
					<div>
						<a class="mobile-link" href="<?php echo home_url('/'); ?>">
							<i class="fa-sharp fa-solid fa-house fa-2xl"></i>
							<p>Accueil</p>
						</a>
					</div>
					<div>
						<a class="mobile-link" href="<?php echo home_url('/#profil'); ?>">
							<i class="fa-solid fa-address-card fa-2xl"></i>
							<p>À propos</p>
						</a>
					</div>
					<div>
						<a class="mobile-link" href="<?php echo home_url('/#competences'); ?>">
							<i class="fa-solid fa-code fa-2xl"></i>
							<p>Compétences</p>
						</a>
					</div>

					<div>
						<a class="mobile-link" href="<?php echo home_url('/#projets'); ?>">
							<i class="fa-solid fa-desktop fa-2xl"></i>
							<p>Projets</p>
						</a>
					</div>

					<div>
						<a class="mobile-link contact" href="#contact" aria-label="contact">
							<i class="fa-solid fa-envelope fa-2xl"></i>
							<p>contact</p>
						</a>
					</div>
					<div>
						<a class="mobile-link" href="https://www.linkedin.com/in/jennifer-sanz/" target="_blank" aria-label="linkedin">
							<i class="fa-brands fa-linkedin fa-2xl"></i>
							<p>Linkedin</p>
						</a>
					</div>
					<div>
						<a class="mobile-link" href="https://github.com/jenny-sanz?tab=repositories" target="_blank" aria-label="github">
							<i class="fa-brands fa-github fa-2xl"></i>
							<p>Github</p>
						</a>
					</div>

				</div>

			</div>

		</nav>

		<!-- HERO HEADER -->
		<?php if (is_front_page()) : ?>
			<div class="banner">
				<div class="content">
					<!-- bloc text -->
					<div class="text-banner">
						<h1>
							<div class="title-1"><span>Hello </span>je suis <span>Jennifer Sanz</span></div>
							<div class="title-2">
								<div>Web</div>
								<div class="flip-words">
									<div>
										<span>Designer </span>
									</div>
									<div>
										<span>Developer</span>
									</div>
								</div>
							</div>
						</h1>
						<h2> Prête à donner vie à vos idées en ligne !</h2>
						<div class="buttons">
							<button class="button-contact">Contactez-moi !</button>
							<div class="button-cv">
								<img class="icon-dll" width="32" height="32" src="https://img.icons8.com/windows/32/download--v1.png" alt="download--v1" />
								<a class="link-cv" href="<?php echo get_template_directory_uri(); ?>/assets/img/cv.pdf" download="Jennifer_Sanz_CV.pdf"> mon CV

								</a>

							</div>

						</div>

					</div>

					<!-- bloc photo -->
					<div class="bloc-photo">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo/jenny_hero_header.webp" alt="photo de profil">
					</div>
				</div>

			</div>
		<?php endif; ?>
	</header>