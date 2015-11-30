<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
require_once( 'library/translation/translation.php' ); // this comes turned off by default

require_once('wp_bootstrap_navwalker.php');

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-550', 550, 600, true );
add_image_size( 'bones-thumb-360', 360, 180, true );
add_image_size( 'bones-thumb-180', 180, 120, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	 ));
	register_sidebar(array(
		'id' => 'sidebar_project',
		'name' => __( 'Single Project Sidebar', 'bonestheme' ),
		'description' => __( '', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	 ));

} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!
if( function_exists('acf_add_options_page') ) {
   $theme_name = wp_get_theme();
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => $theme_name,
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_theme_options',
    'redirect'    => false
  ));
    
}

/* VIDEO CONTAINER*/
function div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="embed-responsive embed-responsive-16by9">' . $match . '</div>';

        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }

    return $content;    
}
add_filter('the_content', 'div_wrapper');
add_filter('the_excerpt', 'div_wrapper');

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .row-actions .clone{position:relative;}
  </style>';
}
//Recent Posts
function ap_recent_posts() {
global $post;
$args = array(
	'post__not_in' => array( $post->ID ),
	'posts_per_page' => 3,
	);
 $the_query = new WP_Query($args);
  if ($the_query -> have_posts()):
  	if (is_single()){
  		$more= ' נוספים';
  	}
	echo '<section class="recent-posts clearfix">';
	echo '<h2 class="fancy-header">מאמרים'.$more. ' בנושא קריאה</h2>';
	echo '<div class="row">';
	while ($the_query -> have_posts()) : $the_query -> the_post();
		$post_link = get_the_permalink();
		$post_title = get_the_title();
		$post_excerpt = get_the_excerpt();
		echo '<div class="col-sm-4">';
		echo '<div class="item clearfix">';
		echo '<h3><a href="'.$post_link.'">'.$post_title.'</a></h3>';
		echo '<p>'.$post_excerpt.' ...</p>';
		echo '<a class="btn btn-primary btn-small pull-left" href="'.$post_link.'"/>המשך קריאה</a>';
	   	echo '</div></div>';
	endwhile;
	echo '</div>';
	echo '<p class="text-center"><a class="btn btn-primary btn-large" href="'.home_url().'/מאמרים">המשך קריאה לכל המאמרים</a></p>';
	echo '</section>';
	 endif;
	wp_reset_postdata();	
}
function ap_recent_projects() {
		$args =   array(
			'post_type' => 'projects',
			'posts_per_page'=> 3,
			'meta_query' => array(
			array(
				'key' => 'home_display',
				'value' => '1',
				'compare' => '=='
				)
			)
			);
		$project_query = new WP_Query($args);
	  	if ($project_query-> have_posts()):
		echo '<section class="our-projects clearfix">';
		echo '<div class="container">';
		echo '<h2 class="fancy-header">פרוייקטים<span><i class="fa fa-angle-down"></i></span></h2>';
   		 echo '<div class="row">';									     
	      	$i = 1;
	      	while ($project_query -> have_posts()) : $project_query -> the_post(); 
	      	$postid = get_the_ID();
	      	$project_link = get_the_permalink();
			$project_title = get_the_title();
			$project_excerpt = get_the_excerpt();
			$project_logo = get_field('project_logo');
		   	echo '<div class="col-sm-4 item">';
		   	echo '<div class="item_container">';
		   	if($project_logo){
		   		echo '<div class="project-logo pull-right">';
		   		echo '<img src="'.$project_logo['url'].'">';
		   		echo '</div>';
		   	}
		   	echo '<h4>'. $project_title.'</h4>';
		   	echo '<div class="clearfix"></div>';
		   	echo '<p>'.$project_excerpt.'</p>';
	        echo '<div class="image-container">';
	        the_post_thumbnail('bones-thumb-360');
	        echo '</div>';
	        $terms = get_the_terms( get_the_ID(), 'project_status');
			// we will use the first term to load ACF data from
			if( !empty($terms) ) {
				
				$term = array_pop($terms);
				$status_icon = get_field('status_icon', $term);
				$status_img = '<img src="'.$status_icon['url'].'"/>';
			}	
			echo '<div class="meta">';	
	        echo '<span class="status">'.get_the_term_list( $post->ID, 'project_status',$status_img).'</span>';
	        echo '<a class="more pull-left" href="'.$project_link.'">לפרטים על הפרוייקט</a>';
	        echo '</div>';
	        echo '</div>';
			echo '</div>';									       	
		     $i++; endwhile;
		 echo '</div>';
		// echo '<p class="text-center"><a class="btn btn-primary btn-large" href="'.home_url().'/קטלוג-מוצרים/">לקטלוג המלא</a>';
		echo '</div>';
		echo '</section>';
	  	endif;
	wp_reset_postdata();
}	
  /* Custom Taxonomy list */

   add_action('aerop_termlist', 'list_terms' , 10);
  // creating the function
  function list_terms(){
    $terms = get_terms("project_status", $args = array('orderby' => 'menu_order','order' => 'ASC', "parent" => 0));
    $currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
    echo '<ul class="cat-list">';
	foreach ($terms as $key => $term) : 
		$term = sanitize_term( $term, 'project_status' );
		$term_link = get_term_link( $term, 'project_status' );
		 $class = $currentterm->slug == $term->slug ? 'current' : '' ;	
		if ($terms):
			echo '<li class="' .$class.'""><a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></li>';
		endif; endforeach;
		echo '</ul>';
  	} 
  	function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
//Custom Taxonomy Query
add_action( 'pre_get_posts', 'custom_query_vars' );
function custom_query_vars( $query ) {
  if ( !is_admin() && $query->is_main_query() && $query->is_tax( 'product_cat' ) ) {
    	$query->set( 'orderby', 'menu_order' );
     	$query->set( 'order' , 'ASC' );      

  }
  return $query;
}
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'מאמרים';
    $submenu['edit.php'][5][0] = 'מאמרים';
    $submenu['edit.php'][10][0] = 'הוסף מאמר';
    echo '';
}
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'מאמרים';
        $labels->singular_name = 'מאמר חדש';
        $labels->add_new = 'הוסף מאמר';
        $labels->add_new_item = 'הוסף מאמר חדש';
        $labels->edit_item = 'ערוך מאמר';
        $labels->new_item = 'מאמר חדש';
        $labels->view_item = 'צפה במאמר';
        $labels->search_items = 'חפש מאמרים';
        $labels->not_found = 'לא נמצאו מאמרים';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

function customize_customtaxonomy_archive_display ( $query ) {
    if (($query->is_main_query()) && (is_tax('project_status')))
         
    $query->set( 'orderby', 'menu_order' );
    $query->set( 'order', 'ASC' );
}
 
//Hook the function
 
add_action( 'pre_get_posts', 'customize_customtaxonomy_archive_display' );
?>