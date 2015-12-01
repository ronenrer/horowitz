<?php 
get_header();
$project_url = get_field('project_url');
$plan_link = get_field('plan_link');
$specifications_link = get_field('specifications_link');
 ?>
			<div id="content">

				<div id="inner-content" class="container clearfix">
					<div class="project-links row">
						<?php if ( function_exists('yoast_breadcrumb') ) ?>
						<div class="col-sm-6">
						<?php 	{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
						</div>
						<?php if ($project_url){?>
						<div class="external-link col-sm-3 pull-left">
							<a href="<?php echo $project_url ?>" class="btn btn-large red pull-left">לאתר הפרוייקט <i class="fa  fa-external-link"></i></a>
						</div>
						<?php }?>						
					</div>
					<div class="row">
						<div id="main"  role="main" class="col-lg-10">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<div class="row">
								<?php 
								$images = get_field( 'project_gallery' );
								if( $images ): ?>
									<section class="project-right col-sm-5 clearfix" itemprop="articleBody">
										<?php $thumbs = '<ul id="gallery-pager" style="display:none;">';?>
										<div id="projectGallery" style="display:none">
											<?php 
											 foreach( $images as $image ): 
											 	$image_thb = wp_get_attachment_image_src($image['id'], 'bones-thumb-180');
												 $image_full = wp_get_attachment_image_src($image['id'], 'full'); ?>
												 <div><img src="<?php echo $image_full[0]; ?>" class="attachment-thumbnail" /></div>
											      <?php $thumbs = $thumbs.'<li><img src="'.$image_thb[0].'" class="attachment-thumbnail" /></li>';
											 endforeach; ?>
										</div>
										 <?php echo $thumbs.'</ul>';?>
										 <?php if ($plan_link || $specifications_link ){?>
										 <div class="modal-links clearfix">
										 	 <?php if ($plan_link){?><a href="" class="btn btn-default btn-large pull-right">תכניות הדירה <i class=" fa fa-pencil-square-o"></i></a><?php }  ?>
										 	<?php if ($specifications_link){?><a href="" class="btn btn-primary btn-large pull-left">מפרט טכני <i class=" fa fa-file-text"></i></a> <?php }  ?>
										 </div>
										 <?php }?>
									</section>
									<script>
										jQuery(document).ready(function($) {
											
											$('#projectGallery').slick({
										 	slidesToShow: 1,
										 	slidesToScroll: 1,
										 	arrows: false,
										 	fade: false,
										 	rtl: true,
										 	adaptiveHeight: true,
										 	asNavFor: '#gallery-pager',

										 });

										 $('#gallery-pager').slick({
										 	slidesToShow: 3,
										 	slidesToScroll: 1,
										 	arrows: false,
										 	asNavFor: '#projectGallery',
										 	dots: true,
										 	 rtl: true,
										 	//	centerMode: true,
										 	focusOnSelect: true
										 });
										 $('#projectGallery').show(); 
										  $('#gallery-pager').show(); 
									 });
									</script>
									<?php endif; ?>
								
									<section class="entry-content  col-sm-7 clearfix" itemprop="articleBody">
										<header class="article-header row">
											<div class="intro">
											<?php if (get_field('intro_title')){
											echo '<h2>'.get_field('intro_title').'</h2>';
											}?>
											<?php if (get_field('intro_text')){
											echo '<div class="desc">'.get_field('intro_text').'</div>';
											}?>
											</div>
											<div class="meta">
												<?php  $terms = get_the_terms( get_the_ID(), 'project_status');
												// we will use the first term to load ACF data from
												if( !empty($terms) ) {													
													$term = array_pop($terms);
													$status_icon = get_field('status_icon', $term);
													$status_img = '<img src="'.$status_icon['url'].'"/>';
												}			
										        echo '<span class="status">'.get_the_term_list( $post->ID, 'project_status',$status_img).'</span>';
										        ?>
											</div>
										</header>
										<?php the_content();?>
										<footer class="article-footer">
											<?php if (get_field('project_map')){
												echo '<h2>מיקום</h2>';
												echo '<div class="embed-responsive embed-responsive-16by9">' . get_field('project_map').'</div>';
											}?>
										</footer>									
									</section>
								</div>

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
						<?php get_sidebar('project'); ?>
					</div>
				</div>

			</div>

<?php get_footer(); ?>
