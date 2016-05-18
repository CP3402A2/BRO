<?php

get_header(); ?>
	<main id="main" class="site-main" role="main">

		<div id="primary" class="content-area">


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php bro_post_nav(); ?>

			<?php
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
		</div><!-- #primary -->
	</main><!-- #main -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>