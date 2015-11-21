<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="container clearfix">

					<div id="main" class="" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<section class="clearfix">
								<div class="row info">
									 <div class="col-sm-7 about-intro">
									 	<div class="row">
										 	<div class="col-sm-4 profile">
											 	<div class="row">
											 		<?php $about_image = get_field('about_pic');?>
											 		<div class="col-xs-4 col-sm-12"><img src="<?php echo $about_image['url']?>"></div>
											 		<div class="col-xs-8 col-sm-12">
											 			<figcaption>
											 			<?php echo get_field('about_caption');?>
											 		</figcaption>
											 		</div>
											 	</div>
											 </div>
											 <div class="col-sm-8">
										 		<h2 class="red"><?php echo get_field('about_title')?></h2>
										 		<p><?php echo get_field('about_text')?></p>
										 		<!--p class="buttons">
										 			<a href=""><span class="glyphicon"></span> המשך קריאה</a>
										 			<a href=""><span class="glyphicon glyphicon-film"></span> לצפיה בסרטון הדרכה</a>
										 		</p-->
											 </div>
										</div>
									</div>
									 <div class="col-sm-5">
									 	<?php if (have_rows('stats')):?>
									 	<div class="home-stats clearfix">
									 		<h3><?php echo get_field('stats_title')?></h3>
									 		<ul>
									 		<?php while( have_rows('stats') ): the_row(); ?>
									 		<li class="stat"><span><?php echo get_sub_field('stat_num')?></span> <?php echo get_sub_field('stat');?></li>
									 		 <?php endwhile;?>
									 		</ul>
									 		<a class="btn btn-default btn-large pull-left fancybox-pdf" href="http://litaf.co.il/wp-content/uploads/2015/09/1990-2.pdf">המשך קריאה</a>									 	</div>									 	
									 </div>
									  <?php endif;?>
								</div>
							</section>
							<?php if (have_rows('testimonials',11)):?>
							<section class="main-testimonials clearfix" itemprop="articleBody">
								<h2>משוב מהשטח</h2>
								<div class="row">
								<?php 
								$i = 0;
								while( have_rows('testimonials',11) ): the_row();
									$testimonial_excerpt = get_sub_field('testimonial_excerpt');
									$testimonial_color =  get_sub_field('testimonial_color');
									$i++;
									if( $i > 6 ){
											break;
										}
									?>
							        <div class="col-sm-4">
							        	<div class="testimonial" style="background-color:<?php echo $testimonial_color ?>">
								        	<blockquote>"<?php echo $testimonial_excerpt ?>"</blockquote>
								        	<a class="btn btn-default btn-small" href="<?php echo get_page_link(11); ?>"/>המשך קריאה</a>
								        </div>
							        </div>
						    <?php endwhile;?>
						      </div>
							</section>
							<?php endif; ?>
				
							<?php endwhile; endif; ?>

							<section class="home-bottom clearfix" role="complementary">
								<h2>קטלוג מוצרים</h2>
								<div class="row">
									<div class="col-sm-9 our-products">
									<?php ap_recent_products() ?>										
									</div>
									<div class="col-sm-3 pdf-banner pull-left"><a href="<?php echo get_page_link(208); ?>"><img class="pull-left" src="<?php echo get_stylesheet_directory_uri()?>/library/images/pdf_banner.png"/></a></div>
								</div>
							</section>
						</article>
					</div>
				</div>
			</div>

<?php get_footer(); ?>