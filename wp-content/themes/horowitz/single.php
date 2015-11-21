<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="container clearfix">
						
						<div id="main"  role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header text-center">

									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

								</header>

								<?php if( have_rows('column_content') ): ?>
								<section class="entry-content row clearfix" itemprop="articleBody">
								<?php while( have_rows('column_content') ): the_row(); 
									$column_text =  get_sub_field('column_text') ;	?>
									<div class="col-sm-6">
										<?php echo $column_text;?>
							   		</div>													
								<?php  endwhile;?>
								<?php else :?>
								<section class="entry-content  clearfix" itemprop="articleBody">
								<?php	the_content();
								 endif; 	?>
								</section>

								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>


							</article>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div>


				</div>

			</div>

<?php get_footer(); ?>
