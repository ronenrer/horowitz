				<div id="sidebar1" class="sidebar col-sm-3 clearfix" role="complementary">
					
					<?php 
					if (is_singular('press')):
						list_terms();
					 else :	
					 	if ( is_active_sidebar( 'sidebar1' ) ) : dynamic_sidebar( 'sidebar1' ); endif;
					 endif;?>
				</div>