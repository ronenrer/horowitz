<!doctype html>
<html <?php language_attributes(); ?>><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		 <!--[if !IE]><!-->
    		 <style type="text/css">@import url(https://fonts.googleapis.com/earlyaccess/opensanshebrew.css);</style>
   		 <!--<![endif]--> 
    	<!--[if (IE)|(gte IE 9)]><!--><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/ie-only.css" /><![endif]-->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>
		<div class="row-offcanvas row-offcanvas-left">
			<header class="header">
				<div class="top-header">
					 <div class="container">
						<div class="row">
						 	<div class="col-sm-6 toolbar-right">
						 		<div class="search pull-right">
						 			<a class="top-search" href=""><i class="fa fa-search"></i></a>
						 		</div>
						 		<div class="personal pull-right">
						 			<a href=""><span class="icon-login"></span> כניסת לקוחות</a>					 			
						 		</div>
						 	</div>
							<div class="col-sm-6 toolbar-left">
								<div class="social pull-left">
									<li><a href="https://www.facebook.com/%D7%A7%D7%91%D7%95%D7%A6%D7%AA-%D7%94%D7%95%D7%A8%D7%95%D7%91%D7%99%D7%A5-Horowitz-group-725586730889156/" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<!--<li><a href="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="" target="_blank"><i class="fa fa-instagram"></i></a></li>
									<li><a href="" target="_blank"><i class="fa fa-youtube"></i></a></li>-->
								</div>
								<div class="top-phone pull-left">
									<a href="tel:03-6843000">03-6843000 <i class="fa fa-phone"></i></a>
								</div>
							</div>
						</div>
					 </div>
					 <div class="navbar-form" style="display:none;">
				 		<form  id="search-form"  role="search" method="get" action="<?php echo home_url(); ?>">
							<input type="text" value="<?php echo  get_search_query()?>" name="s" id="s" placeholder="<?php echo  esc_attr__( 'Search the Site...', 'bonestheme' ); ?>" />
							<button type="submit" class="btn"><i class="fa fa-search"></i></button>
						</form><!-- .navbar-form -->
					</div>
				</div>
				<nav>
      			  <div class="container">
        			  <div class="navbar-header">
			            <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas"  aria-expanded="false" aria-controls="navbar">
			              <span class="sr-only">Toggle navigation</span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			            </button>
			              <a class="navbar-brand" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-big.png"/></a>
			          </div>
			          <div class="sidebar-offcanvas clearfix">
			          	<?php bones_main_nav_right();?>
						<?php bones_main_nav_left();?>
						</div>
					</div><!--/.container-fluid -->
      			</nav>
			</header>
			<div class="page-title">
				<div class="container wide">
					<?php 
					$default_header_img = get_field('default_header_image',option);
					$overlay_color = get_field('header_overlay_color',option);
					$overlay_opacity = get_field('header_opacity',option);
					$header_img = get_field('header_image');
					global $wp_query;
						$cat = $wp_query->get_queried_object();
						$status_header_img = get_field('status_header_img', 'project_status_' . $cat->term_id);
					
					if ($header_img) {
						echo '<img src="'.$header_img['url'].'"/>';					
					}
					elseif($status_header_img){						
						echo '<img src="'.$status_header_img['url'].'"/>';
					}else{
						echo '<img src="'.$default_header_img['url'].'"/>';	
					}
					if (!is_front_page() && !is_singular('projects')) {
						echo '<div class="section-overlay" style="background:'.$overlay_color.';opacity:'.$overlay_opacity.'"></div>';
					}
					
				if (is_front_page()):?>
					<div class="hero-text">
						<h1>
							<span>תנו לנו לבנות</span>
							את החלום שלכם
						</h1>
					</div>
				<?php elseif (is_singular('projects')): 
					$project_logo = get_field('project_logo');?>
					<div class="hero-text">
						<?php if ($project_logo) {
							echo '<img src="'.$project_logo['url'].'"/>';
						}?>
						<h1><?php the_title();?></h1>
					</div>	
				<?php else:
					echo'<div class="hero-text">';
					if (is_home()):?>
						<h1>מאמרים</h1>
					<?php elseif (is_post_type_archive()):?>
						<h1><?php post_type_archive_title(); ?></h1>
					<?php elseif (is_tax()):?>
						<h1><?php single_cat_title(); ?></h1>
								
					<?php elseif (is_404()):?>
						<h1><?php _e( 'Epic 404 - Article Not Found', 'bonestheme' ); ?></h1>					
					<?php elseif(is_search()):?>
						<h1><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
					<?php else:?>
						<h1><?php the_title();?></h1>
					<?php endif;?>
					<?php 
						if (!is_archive() && !is_search()):
						$intro_title = get_field('intro_title');
						$intro_text = get_field('intro_text');
						if ($intro_title){
							echo '<h2>'.$intro_title.'</h2>';
						}?>
						<?php if ($intro_text){
							echo '<div class="desc">'.$intro_text.'</div>';
						}
						endif;
					echo '</div>';
					endif;?>
				</div>  			
			</div>
			<?php if (is_front_page()):?>	
			<div class="top-cta">
				<div class="container">
					<h2 class="pull-right">מתעניינים באחד הפרויקטים או רוצים להיות חלק ממשפחת הלקוחות האקסקלוסיבית שלנו?</h2>
					<a href="<?php echo get_page_link(28); ?>" class="btn btn-large red rounded pull-left">צרו קשר<i class="fa fa-angle-left"></i></a>
				</div>
			</div>	
			<?php endif;?>	