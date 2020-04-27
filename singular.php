<?php

get_header();

if ( have_posts() )  :

	while ( have_posts() ) : the_post(); ?>

		<div <?php post_class( 'section-inner' ); ?>>

			<header class="page-header section-inner thin<?php if ( has_post_thumbnail() ) echo ' fade-block'; ?>">

				<div>

					<?php
					the_title( '<h1 class="title">', '</h1>' );

					// Make sure we have a custom excerpt
					if ( has_excerpt() ) echo '<p class="excerpt">' . get_the_excerpt() . '</p>';

					// Only output post meta data on single
					if ( is_single() ) : ?>

						<div class="meta">

							<?php
							echo __( '', 'hamilton' ) . ' '; the_category( ', ' );

							if ( comments_open() ) : ?>
								<span>&bull;</span>
								<?php comments_popup_link(
									__( 'Add Comment', 'hamilton' ),
									__( '1 Comment', 'hamilton' ),
									sprintf( __('%s Comments', 'hamilton' ), '%' ),
									''
								); ?>
							<?php endif; ?>

						</div>

					<?php endif; ?>

				</div>

			</header><!-- .page-header -->



			<!-- Display posts if page name is "Featured Work" -->
			<?php if ( is_page( "Featured Work" ) ) : ?>

				<div class="posts" id="posts">

				<?php $postslist = get_posts( array(
			    'order'          => 'ASC',
			    'orderby'        => 'rand',
					// Display posts only in certain category option:
					// 'category_name'  =>	'category-slug'
				) );

				if ( $postslist ) {
				    foreach ( $postslist as $post ) :
				        setup_postdata( $post );

								get_template_part( 'content' );

							endforeach;
				    wp_reset_postdata();
					} ?>

				<?php endif; ?>

			</div> <!-- .posts -->




			<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>

				<div class="featured-image">
					<?php the_post_thumbnail( 'hamilton_fullscreen-image' ); ?>
				</div>

			<?php endif; ?>

			<div class="entry-content section-inner thin">

				<?php the_content(); ?>

			</div> <!-- .content -->

			<?php

			wp_link_pages( array(
				'before' => '<p class="section-inner thin linked-pages">' . __( 'Pages:', 'hamilton' ),
			) );

			if ( get_post_type() == 'post' ) : ?>

				<div class="meta bottom section-inner thin group">

					<?php if ( get_the_tags() ) : ?>

						<p class="tags"><?php the_tags( ' #', ' #', ' ' ); ?></p>

					<?php endif; ?>

					<!--
					<p><a href="<?php the_permalink(); ?>" title="<?php the_time( get_option( 'date_format' ) ); ?> <?php the_time( get_option( 'time_format' ) ); ?>"><?php the_date( get_option( 'date_format' ) ); ?></a>
					-->

				</div> <!-- .meta -->

			<?php endif; ?>

			<?php

			// Output comments wrapper if it's a post, or if comments are open, or if there's a comment number – and check for password
			if ( ( $post_type == 'post' || comments_open() || get_comments_number() ) && ! post_password_required() ) : ?>

				<div class="section-inner thin">
					<?php comments_template(); ?>
				</div>

			<?php endif; ?>

		</div> <!-- .post -->

		<?php

		if ( get_post_type() == 'post' ) get_template_part( 'related-posts' );

	endwhile;

endif;

get_footer(); ?>
