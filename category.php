<?php
  

get_header(); ?>

<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( 'Category Archives: %s', 'themename' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
				</header>

				<?php get_template_part( 'loop', 'category' ); ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>