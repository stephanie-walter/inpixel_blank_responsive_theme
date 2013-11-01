<?php

get_header(); ?>

<?php the_post(); ?>
<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'themename' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>
				</header>

				<?php rewind_posts(); ?>

				<?php get_template_part( 'loop', 'tag' ); ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>