<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="container clearfix">
						
						<div id="main"  role="main" class="project-container">
							<?php  
							if (have_posts()) :
							echo '<div class="row">';
							 while (have_posts()) : the_post(); ?>
	       					<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-md-4 clearfix' ); ?> role="article">
								<section class="entry-content">
									<h3><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>									
								</section>
								<?php if (has_post_thumbnail()) {?>
								<div class="image-container">
							        <?php the_post_thumbnail('bones-thumb-360');?>
							     </div>
								<?php }?>
						     <footer class="article-footer">
						    	 <?php $terms = get_the_terms( get_the_ID(), 'project_status');
									if( !empty($terms) ) {										
										$term = array_pop($terms);
										$status_icon = get_field('status_icon', $term);
										$status_img = '<img src="'.$status_icon['url'].'"/>';
									}			
							        echo '<span class="status">'.get_the_term_list( $post->ID, 'project_status',$status_img).'</span>';
							        echo '<a class="more pull-left" href="'.get_the_permalink().'">לפרטים על הפרוייקט</a>';?>
							</footer>
							</article>
	
    						<?php  endwhile; ?>
    					</div>
									<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
											<?php bones_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

					</div>

			</div>

<?php get_footer(); ?>
