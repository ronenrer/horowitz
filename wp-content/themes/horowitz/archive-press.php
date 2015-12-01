<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="container clearfix">

						<div id="main" class="clearfix" role="main">
							<?php
							$terms = get_terms("press_project", $args = array('orderby' => 'menu_order','order' => 'ASC', "parent" => 0));
							foreach ($terms as $key => $term) : 
								$term = sanitize_term( $term, 'press_project' );
								$term_link = get_term_link( $term, 'press_project' );
								if ($terms):
										$args = array(
									        'post_type' => 'press',
									        'press_project' => $term->slug
									    );
									    $query = new WP_Query( $args );
									             
									    // output the term name in a heading tag  
									    echo '<div class="press-group">';              
									    echo'<h2><a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></h2>';
									     
									    // output the post titles in a list
									    echo '<div class="row">';
									     
									        // Start the Loop
									        while ( $query->have_posts() ) : $query->the_post();
									        	$press_source = get_field('press_source');
									        	$press_year = get_field('press_year');
									        	$press_excerpt = get_field('press_excerpt');
									         ?>
											<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6  clearfix' ); ?> role="article">
												<div class="item row clearfix">
													<?php if (has_post_thumbnail()) {?>
													<div class="image-container col-sm-4">
												        <?php the_post_thumbnail('bones-thumb-360');?>
												     </div>
													<?php }?>
													<section class="entry-content col-sm-8 clearfix">
														<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														<?php echo '<h5>'.$press_excerpt.'</h5>' ?>
														<?php echo '<p>'.$press_source.' | '.$press_year.'</p>'
														?>
														
														<a class="btn btn-primary btn-small pull-left" href="<?php the_permalink() ?>" target="<?php echo $target ?>"  rel="bookmark" title="<?php the_title_attribute(); ?>">המשך קריאה</a>
													</section>
												</div>
											</article>
									         
									        <?php endwhile;
									     
									    echo '</div>';
									     
									    // use reset postdata to restore orginal query
									    wp_reset_postdata();
								endif; 
								endforeach;
								echo '</div>';
							?>
							

						</div>
				</div>

			</div>

<?php get_footer(); ?>