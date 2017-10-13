<?php

/**
	* Theme Header
	*
	* @package Brazil Financial
	* @author Sean Creagh
*/



?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php wp_head(); ?>
</head>

<body>

	<header id="Header">

		<div id="Top-bar" class="wrapper">

			<div class="container remove-spacing clearfix">

				<div id="Theme-identity">

					<?php theme_identity(); ?>

				</div>

				<div id="Header-widgets" class="clearfix">

					<?php

					if ( is_active_sidebar( 'header-widget-1' ) ) { ?>

					<div class="widgets remove-spacing">

						<?php dynamic_sidebar( 'header-widget-1' ); ?>

					</div>

					<?php }

					if ( is_active_sidebar( 'header-widget-2' ) ) { ?>

					<div class="widgets remove-spacing">

						<?php dynamic_sidebar( 'header-widget-2' ); ?>

					</div>
						
					<?php }

					if ( is_active_sidebar( 'header-widget-3' ) ) { ?>

					<div class="widgets remove-spacing">

						<?php dynamic_sidebar( 'header-widget-3' ); ?>

					</div>
						
					<?php } ?>

				</div>

			</div>

		</div>

		<div id="Navigation-bar" class="wrapper">

			<div class="container remove-spacing clearfix">

				<?php

				if ( has_nav_menu( 'primary' ) ) { ?>

				<nav id="Navigation" class="clearfix">

					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

				</nav>

				<nav id="Navimobile" class="clearfix">

					<button id="navicon">
						
						<?php for ($i = 0; $i < 3; $i++) echo '<span class="navicon-bar"></span>'; ?>

					</button>

					<div id="navimenu"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>

				</nav>

				<?php }

				?>

				<div id="Search-widget">

					<?php

					if ( is_active_sidebar( 'header-widget-s' ) ) { ?>

					<div>

						<?php dynamic_sidebar( 'header-widget-s' ); ?>

					</div>

					<?php }

					?>

				</div>

			</div>

		</div>

		<?php theme_breadcrumbs(); ?>

	</header>