<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="container clearfix">
						
						<div id="main"  role="main" class="product-container">
							<?php
							$hiterms = get_terms("project_status", $args = array('orderby' => 'menu_order','order' => 'ASC', "parent" => 0));
							foreach ($hiterms as $key => $hiterm) : 
								$hiterm = sanitize_term( $hiterm, 'project_status' );
								$hiterm_link = get_term_link( $hiterm, 'project_status' );
								if ($hiterms)
								$hiterm_image = get_field('status_icon', 'project_status_'.$hiterm->term_id);
								echo '<div class="col-sm-4 cat-item">';
									echo '<figure class="img-wrap">';
										echo '<img src="'.$hiterm_image['url'].'" />';
										echo '<figcaption>';
											echo '<h2>' . $hiterm->name .'</h2>';
											echo term_description( $term_id, 'project_status' );
											echo '<a class="status-link" href="' . esc_url( $hiterm_link ) . '">לצפייה בפרויקטים</a>';										
										echo '<a class="view" href="' . esc_url( $hiterm_link ) . '">View More</a>';
										echo '</figcaption>';
									echo '</figure>';
								echo '</div>';
							endforeach;?>
						</div>

					</div>

			</div>

<?php get_footer(); ?>
