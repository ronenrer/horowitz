<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="container clearfix">

						<div id="main" class="eightcol first clearfix" role="main">
							<div class="row">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-md-4 clearfix' ); ?> role="article">
									<div class="item clearfix">
										<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
										<?php if (has_post_thumbnail()) {?>
										<div class="image-container">
									        <?php the_post_thumbnail('bones-thumb-360');?>
									     </div>
										<?php }?>
										<section class="entry-content clearfix">
											<?php the_excerpt(); ?>
											<?php $external_link = get_field('external_link');
											if ($external_link){
												$continue = $external_link;
												$target = '_blank';
											}else{
												$continue = get_the_permalink();
												$target = '_self';
											}?>
											<a class="btn btn-primary btn-small pull-left" href="<?php echo $continue ?>" target="<?php echo $target ?>"  rel="bookmark" title="<?php the_title_attribute(); ?>">המשך קריאה</a>
										</section>
									</div>
								</article>

								<?php endwhile; ?>
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
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>
				</div>

			</div>

<?php get_footer(); ?>
