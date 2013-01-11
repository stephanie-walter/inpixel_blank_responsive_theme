<?php
/**
 * Template Name: Left Sidebar
 * Description: A template with the sidebar on the left
 *
 *
 */

get_header(); ?>

<?php get_sidebar(); ?>

<?php the_post(); ?>
<section id="content" class="content mod item ">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php //comments_template( '', true ); ?>
			</section>

<?php get_footer(); ?>