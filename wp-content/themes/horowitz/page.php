<?php get_header(); ?>

			<div id="content">
				
				<div id="inner-content" class="container clearfix">
						
						<div id="main"  role="main">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<?php  
								$subtitle = get_field('sub_title');
								$intro_text = get_field('intro_text');
								if (!empty($subtitle)):?>
								<header class="article-header text-center">
									<h2 class="page-subtitle" itemprop="headline"><?php echo $subtitle ?></h2>
								<?php
								if (!empty($intro_text)){ 
									echo '<p>' .$intro_text. '</p>';
								}?>
							</header>
							<?php endif;
							if( have_rows('column_content') ): ?>
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
								<?php if (have_rows('testimonials')):?>
								<section class="main-testimonials clearfix" itemprop="articleBody">
									<div class="row">
									<?php while( have_rows('testimonials') ): the_row(); 
										$testimonial =  get_sub_field('testimonial');
										$testimonial_excerpt = get_sub_field('testimonial_excerpt');
										$testimonial_color =  get_sub_field('testimonial_color');
										$testimonial_person = get_sub_field('testimonial_person');
										if ($testimonial):?>
								        <div class="col-sm-6">
								        	<div class="testimonial" style="background-color:<?php echo $testimonial_color ?>">
									        	<blockquote>"<?php echo $testimonial ?>"</blockquote>
									        	<?php if ($testimonial_person) {?>
									        		<p class="person"><?php echo $testimonial_person;?></p>
									        	<?php 	}?>									        	
									        </div>
								        </div>
							   		 <?php endif;endwhile;?>
							      </div>
								</section>
							<?php endif; ?>
							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<?php if (is_tree(208)) {
						$children = get_pages( 
						    array(
						        'sort_column' => 'menu_order',
						        'sort_order' => 'ASC',
						        'hierarchical' => 0,
						        'parent' => 208,
						        'post_type' => 'page',
						));
						echo '<div class="pdf-litaf row">';
					   foreach ($children as $post) {
								setup_postdata( $post );
							?>
								<div class="pdf-item col-xs-6 col-md-3">
									<a href="<?php echo get_field('pdf')?>">
										<?php the_post_thumbnail('full');?>
										<h3><?php the_title();?></h3>
									</a>
						 		</div>	
						<?php }
						 echo '</div>';
					}?>

				</div>
			</div>

<?php get_footer(); ?>