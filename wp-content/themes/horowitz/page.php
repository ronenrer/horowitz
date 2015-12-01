<?php get_header(); ?>

			<div id="content">
				
				<div id="inner-content" class="container clearfix">
					<div id="main"  role="main" <?php if (is_tree(4)){ echo 'class="col-md-9 pull-left"'; } ?>>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<section class="entry-content  clearfix" itemprop="articleBody">
							<?php the_content();?>
							</section>
							<?php if (have_rows('team')):?>
							<section class="team clearfix" itemprop="articleBody">
								<div class="row">
								<?php 
								$i = 1;
								while( have_rows('team') ): the_row(); 
									$employee_photo = get_sub_field('employee_photo');
									$employee_name =  get_sub_field('employee_name');
									$employee_bio = get_sub_field('employee_bio');
									$employee_position =  get_sub_field('employee_position');
									$employee_mail = get_sub_field('employee_mail');
									$employee_facebook = get_sub_field('employee_facebook');
									$employee_linkedin = get_sub_field('employee_linkedin');
									if ($employee_name):?>

							        <?php if ($i > 1){ 
							        	echo '<div class="col-sm-4 col-lg-3">';
							        }?>
							        	<div class="employee<?php if ($i == 1){ echo ' row ceo';} ?>">
								        	<?php if ($employee_photo) {?>
								        	<div class="image-container<?php if ($i == 1) { echo ' col-sm-4';}?>">
								        		<img src="<?php echo $employee_photo['url']?>"/>
								        	</div>
								        	<?php }?>	
								        	<div class="bio <?php if ($i == 1) { echo ' col-sm-8';}?>">
									        	<h3><?php echo $employee_name ?></h3>
									        	<?php 
									        	if ($employee_position) {
									        		echo '<h5>'.$employee_position.'</h5>';
									        	}
									        	if ($employee_bio) {
									        		echo '<p>'.$employee_bio.'</p>';
									        	}
									        	if ($employee_mail || $employee_facebook || $employee_linkedin) {
									        		echo '<div class="employee-contact">';
										        	if ($employee_mail) {
										        		echo '<a href="mailto:'.$employee_mail.'"><i class="fa fa-envelope"></i>'.$employee_mail.'</a>';
										        	}
										        	if ($employee_facebook) {
										        		echo '<a href="'.$employee_facebook.'"><i class="fa fa-facebook"></i></a>';
										        	}
										        	if ($employee_linkedin) {
										        		echo '<a href="'.$employee_linkedin.'"><i class="fa fa-linkedin"></i></a>';
										        	}
										        	echo '</div>';
									        	}?>
									        </div>
								        </div>
							         <?php if ($i > 1){ echo '</div>';}?>
						   		 <?php endif;
						   		 $i++; endwhile;?>
						      </div>
							</section>
						<?php endif; ?>
						<?php
							$images = get_field( 'logo_gallery' );
							if( $images ): ?>
							<section class="community clearfix" itemprop="articleBody">
									<div class="logos row">
									<?php foreach( $images as $image ): 
										 $image_thb = wp_get_attachment_image_src($image['id'], 'thumbnail'); ?>
									    <div class="col-sm-2"><img src="<?php echo $image_thb[0]; ?>" class="attachment-thumbnail" /></div>
									<?php endforeach; ?>
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
					<?php 
					$children = get_pages('child_of='.$post->ID);
					$ancestors = get_post_ancestors($post->ID);

					//Check if the page has children or ancestors if yes, output pages menu.
					if(!empty($children) or !empty($ancestors)){
					        global $post;
					        $parents = get_post_ancestors( $post->ID );
					        $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
					        $parent = get_page( $id );
					        //Variables for adding ancestor page to the menu
					        $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					        $parentUrl = get_permalink($id);
					        $parentTitle = get_the_title($id);
					    
					    $args = array('child_of' => $id, 'title_li'=> '','sort_column' =>'menu_order'); 
					?>
					<aside class="col-md-3 pull-right">
						<ul class="siblings">
					    
						    <?php /*List subpages*/ wp_list_pages( $args ); ?>
						    
						</ul>
					</aside>
					<?php } ?>		
				</div>
				
			</div>

<?php get_footer(); ?>