<?php
get_header(); ?>
<?php the_post(); ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: <span>%s</span>', 'themename' ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: <span>%s</span>', 'themename' ), get_the_date( 'F Y' ) ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: <span>%s</span>', 'themename' ), get_the_date( 'Y' ) ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'themename' ); ?>
						<?php endif; ?>
					</h1>
				</header>

				<?php rewind_posts(); ?>

				<?php get_template_part( 'loop', 'archive' ); ?>
			</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>