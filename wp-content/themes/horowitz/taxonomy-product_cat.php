<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="container clearfix">
						
						<div id="main"  role="main" class="product-container">
							<header class="article-header text-center">
								<h2>קטגוריות מוצרים</h2>
								<?php list_terms();?>
							</header>
							<?php  
							if (have_posts()) :
							echo '<div class="row">';
							 while (have_posts()) : the_post(); ?>
							 <?php $imageid = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
							 $featimage = $imageid['0'];?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
								<section class="article-pic  col-sm-3 col-lg-2">
									<a class="thumbnail" data-imgpath="<?php echo $featimage ?>" data-toggle="modal" href="#photo-modal"><?php the_post_thumbnail('bones-thumb-167'); ?></a>
									<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									    <div class="modal-dialog">
									            <img src="" />
									    </div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
								</section>
								<section class="entry-content  col-sm-9 col-lg-10">
									<h3><?php the_title(); ?></h3>
									<?php the_content(); ?>
									<p class="actions pull-left">
										<span class="price"><?php echo get_field('price');?> <span>₪</span></span><span class="order"><a href="<?php echo get_page_link(147); ?>">לטופס הזמנה</a></span>
									</p>
								</section>
							</article>
	
    						<?php  endwhile; ?>
    					</div class="row">
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
