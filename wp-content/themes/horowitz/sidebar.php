				<div id="sidebar1" class="sidebar col-sm-3 clearfix" role="complementary">
					<h4 class="widgettitle">היום בפארק</h4>
					<div class="row nomargin">
						<div class="col-xs-6 current-info">
							<?php dynamic_sidebar( 'events' ); ?>
						</div>
						<div class="col-xs-6 weather">
						</div>
					</div>
				
					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>