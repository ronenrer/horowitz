			<div class="top-footer">
				<div class="container clearfix">
						<h2>רוצים למצוא את דירת החלומות שלכם?</h2>
						<p>מלאו את פרטיכם ונחזור אליכם בהקדם</p>
						<?php gravity_form(1, false, false, false, '', true);?>
				</div>
			</div>	
			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="container clearfix">	
					<div class="row">
						<div class="col-sm-6 col-md-3 tagline">
							<h2><?php bloginfo('name')?></h2>
							<p><?php bloginfo('description')?></p>
						</div>
						<div class="col-sm-6 col-md-3 contact-details">
							זבוטינסקי 7 רמת גן , מגדל אביב קומה 43
							<a class="footer-tel" href="tel:03-6843000">03-6843000</a>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="footer-links">
								<a class="share-button"><i class="fa fa-share-square"></i> שתפו ברשת</a>
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
						<div class="col-sm-6 col-md-3 subscribe">
							רוצים להתעדכן ראשונים אודות פרויקטים חדשים?
							<form>
								<input type="email" placeholder="אימייל:">
								<input class="btn btn-small red" type="submit"  value="הרשמה">
							</form>
						</div>
					</div>					
				</div>
				<div class="bottom-footer clearfix">
					<div class="container">
						<div class="source-org copyright pull-right">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></div>
						<div class="credits pull-left">עיצוב + פיתוח: <a href="http://aeroplane.co.il" target="_blank">Aeroplane</a></div>				
					</div>
				</div>
			</footer>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
