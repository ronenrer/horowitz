				<div id="sidebar-project" class="sidebar col-lg-2 clearfix" role="complementary">
					<div class="project-contact">
						<h2 class="fancy-header red">דברו איתנו על הפרוייקט
								<span><i class="fa fa-angle-down"></i></span>
							</h2>
							<?php gravity_form(2, false, false, false, '', true);?>
					</div>
					<?php if ( is_active_sidebar( 'sidebar_project' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar_project' ); ?>

					<?php endif; ?>

				</div>