			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="container clearfix">	
					<?php if (!is_front_page() && !is_tree(208) && !is_singular('post')){
						ap_recent_products();
					}else if(is_singular('post')){
						ap_recent_posts();
					}
						?>
					<div class="top-footer">
						לתיאום פגישת היכרות עם  ליט"ף:  טל'  03-7512370  /   מייל  litaf@zahav.net.il
					</div>				
					<div class="bottom-footer clearfix">
						<div class="source-org copyright pull-right">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></div>
						<div class="credits pull-left">עיצוב + פיתוח: <a href="http://aeroplane.co.il" target="_blank">Aeroplane</a></div>
						<div class="footer-links pull-left">
							<nav role="navigation">
								<?php 
								wp_nav_menu( array(
									'menu'              => 'footer-nav',
									'theme_location'    => 'footer-links',
									'depth'             => 2,
									'container'         => 'div',
									'container_id'   	=>	'navbar' ,
									'container_class'   => '',
									'menu_class'        => 'nav nav-navbar',
									'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
									'walker'            => new wp_bootstrap_navwalker())
								);
							?>
							</nav>
						</div>						
					</div>
				</div>
			</footer>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php if (is_front_page()) {
		    $slidesToShow = '4';
		  }else{
		    $slidesToShow = '6';
		  }?>
			<script>
			jQuery(document).ready(function($) {
				
				$('#productSlider').slick({
				    infinite: true,
				    adaptiveHeight: true,
				    speed: 300,
				    slidesToShow: <?php echo $slidesToShow ?>,
				    slidesToScroll: 1, 
				    rtl: true,
				    responsive: [
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 3,
		      }
		    },
		    {
		      breakpoint: 400,
		      settings: {
		        slidesToShow: 2
		      }
		    }
	    ]
				});
				  $('#productSlider').show(); 
			 });
			</script>
		<?php wp_footer(); ?>

	</body>

</html>
