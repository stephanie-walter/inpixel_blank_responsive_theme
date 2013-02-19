<?php
  
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-above" role="article">
		<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themename' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
	</nav><!-- #nav-above -->
<?php endif; ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>		           

            <div class="entry-meta entry-header">                            
	                <span class="published"><?php _e('Published on', 'themename') ?> <strong><?php the_time( get_option('date_format') ); ?></strong></span>
	                <span class="author"><?php _e('by', 'themename') ?> <?php the_author_posts_link(); ?></span>
					<span class="entry-categories"><?php _e('in', 'themename') ?> <?php the_category(', ') ?></span> -  <span class="comment-count"> <?php comments_popup_link(__('No Comments', 'themename'), __('1 Comment', 'themename'), __('% Comments', 'themename')); ?></span> - 
					<span class="permalink"><a title="<?php printf(__('Permanent Link to %s', 'themename'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php _e('Permalink', 'themename') ?></a></span>                    		
           </div>


		</header><!-- .entry-header -->

		<?php if ( is_home() || is_front_page() || is_archive() || is_search() )  { ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php }
		else { ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php } ?>

		<footer class="entry-meta">			
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'themename' ) . '</span>', ', ', '<span class="meta-sep"> - </span>' ); ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'themename' ), __( '1 Comment', 'themename' ), __( '% Comments', 'themename' ) ); ?></span>
			<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below" role="article">
		<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themename' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>
