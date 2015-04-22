<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
		    $thumb_id = get_post_thumbnail_id();
		    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-full', true);
		  ?>
		<div id="hero" class="single-blog">
			<div class="lock">
			</div>
		</div>
		<div id="hero-video" class="single-blog" style="background: url('<?php echo(types_render_field( 'hero-img', array('output'=>'raw') ) ); ?>'); background-size: cover; background-position:center center;">

		</div>
	</div>
	<!-- End Container -->
	<div class="single-blog-wrap">
		<div class="row">
			<section id="home">
				<div class="container">
					<div class="back"><p class="back-btn"><a href="/blog"><span></span>BACK</a></p></div>
				</div>
				<div class="content">
					<h1><?php the_title(); ?></h1>
					<span class="line"></span>
					<span class="author-date"><?php the_author(); ?>, <?php the_time('F j, Y') ?></span>
					<?php the_content(); ?>
				</div>
			</section>
		</div>
		<?php $next_post = get_adjacent_post(false, '', true);
	 		if($next_post): $next_post_url = get_permalink($next_post->ID); ?>
		<div class="blue next-post" data-url="<?php echo get_permalink($next_post->ID); ?>">
		    <div class="content">
		        <div class="col-md-12">
		            <h2 class="all-cases">
		                NEXT ARTICLE
		                <div class="chevron-img" alt=""></div>
		            </h2>
		        </div>
		    </div>
		</div>
		<?php else: ?>
			<div></div>
		<?php endif; ?>
	</div>
		<?php wp_reset_query(); ?>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>