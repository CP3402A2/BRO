<?php
/**
 * The template used for displaying page content in page-nosidebar.php
 *
 * @package bro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if (has_post_thumbnail()) {
		echo '<div class="single-post-thumbnail clear">';
		echo '<div class="image-shifter">';
		echo the_post_thumbnail('large-thumb');
		echo '</div>';
		echo '</div>';
	}
	?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content entry-content-2">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'bro' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
