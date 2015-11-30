<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="clearfix">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<?php ap_recent_projects();?>
							<section class="intro-text">
								<div class="container">
								<?php if (get_field('intro_title')){
									echo '<h2 class="fancy-header">'.get_field('intro_title');
									echo '<span><i class="fa fa-angle-down"></i></span>';
									echo '</h2>';
								}?>
								<?php if (get_field('intro_text')){
									echo '<div class="desc">'.get_field('intro_text').'</div>';
								}?>
							</div>
							</section>
							<?php if (have_rows('benefits_right')):?>
							<section class="benefits clearfix" itemprop="articleBody">
								<div class="container">
									<h2 class="fancy-header">יתרונות החברה
										<span><i class="fa fa-angle-down"></i></span>
									</h2>
									<div class="row">
										<div class="col-sm-4 benefits-right">
											<?php 
											while( have_rows('benefits_right') ): the_row();
												$benefits_title = get_sub_field('benefits_item_title');
												$benefits_text =  get_sub_field('benefits_item_text');
												?>								       
									        	<div class="benefits-item">
										       		<h4><?php echo $benefits_title ?></h4>
										       		<p><?php echo $benefits_text ?></p>
										        </div>	
									   		 <?php endwhile;?>
								    	</div>
								    	<?php $benefits_img = get_field('benefits_img');?>
								    	<div class="col-sm-4 benefits-image">
								    	 	<?php if ($benefits_img) {
								    	 		echo  '<img src="'.$benefits_img['url'].'">';
								    	 	}?>
								    	</div>
								    	<?php if (have_rows('benefits_left')):?>
									    <div class="col-sm-4 benefits-left">
											<?php 
											while( have_rows('benefits_left') ): the_row();
												$benefits_title = get_sub_field('benefits_item_title');
												$benefits_text =  get_sub_field('benefits_item_text');
												?>								       
									        	<div class="benefits-item">
										       		<h4><?php echo $benefits_title ?></h4>
										       		<p><?php echo $benefits_text ?></p>
										        </div>	
									   		 <?php endwhile;?>
									    </div>
									    <?php endif;?>
							      	</div>
							 	 </div>
							</section>
							<?php endif; ?>
							<?php
							$images = get_field( 'logo_gallery' );

							if( $images ): ?>
							<section class="clients clearfix" itemprop="articleBody">
								<div class="container">
									<h2 class="fancy-header light">עובדים איתנו
										<span><i class="fa fa-angle-down"></i></span>
									</h2>
									<div id="logoSlider" style="display:none">
									<?php foreach( $images as $image ): 
										 $image_thb = wp_get_attachment_image_src($image['id'], 'thumbnail'); ?>
									    <div><img src="<?php echo $image_thb[0]; ?>" class="attachment-thumbnail" /></div>
									<?php endforeach; ?>
									</div>
								</div>
							</section>
							<?php endif; ?>
							<?php endwhile; endif; ?>
						</article>
					</div>
				</div>
			</div>
			<?php $slidesToShow = '10';?>
			<script>
			jQuery(document).ready(function($) {
				
				$('#logoSlider').slick({
				    infinite: true,
				    adaptiveHeight: true,
				    speed: 300,
				    rows:2,
				    slidesPerRow: <?php echo $slidesToShow ?>,
				    slidesToScroll: 1, 
				    rtl: true,
				    responsive: [
		    {
		      breakpoint: 767,
		      settings: {
		        slidesPerRow: 3,
		      }
		    },
		    {
		      breakpoint: 400,
		      settings: {
		        slidesPerRow: 2
		      }
		    }
	    ]
				});
				  $('#logoSlider').show(); 
			 });
			</script>
<?php get_footer(); ?>