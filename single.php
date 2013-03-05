<?php

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<nav class="nav-single">
						<p class="assistive-text"><?php _e( 'Post navigation', 'themename' ); ?></p>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'themename' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></span>
				</nav><!-- #nav-single -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-meta entry-header">                            
				                <span class="published"><?php _e('Published on', 'themename') ?> <strong><?php the_time( get_option('date_format') ); ?></strong></span>
				                <span class="author"><?php _e('by', 'themename') ?> <?php the_author_posts_link(); ?></span>
								<span class="entry-categories"><?php _e('in', 'themename') ?> <?php the_category(', ') ?></span> -  <span class="comment-count"> <?php comments_popup_link(__('No Comments', 'themename'), __('1 Comment', 'themename'), __('% Comments', 'themename')); ?></span> - 
								<span class="permalink"><a title="<?php printf(__('Permanent Link to %s', 'themename'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php _e('Permalink', 'themename') ?></a></span>                   		
			          	</div>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>

						<?php 
							$branchembed = get_post_meta($post->ID, 'branchembed', true);
							// check if the custom field has a value
							if($branchembed != '') {
							  echo '<div class="branchembed">'.$branchembed.'</div>';
							} 
						?>
					</div><!-- .entry-content -->

				

					<footer class="entry-meta">			
						<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'themename' ) . '</span>', ', ', '<span class="meta-sep"> - </span>' ); ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'themename' ), __( '1 Comment', 'themename' ), __( '% Comments', 'themename' ) ); ?></span>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
					</footer><!-- #entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav class="nav-single">
						<p class="assistive-text"><?php _e( 'Post navigation', 'themename' ); ?></p>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'themename' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'themename') ); ?></span>
				</nav><!-- #nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>