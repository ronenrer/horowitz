<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post() { 
	// creating (registering) the custom type 
	register_post_type( 'projects', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'פרוייקטים', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'פרוייקט', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'כל הפרוייקטים', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'הוסף חדש', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'הוסף פרוייקט חדש', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'ערוך', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'ערוך פרוייקט', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'פרוייקט חדש', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'צפה בפרוייקט', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'חפש פרוייקטים', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'פרוייקטים', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'פרוייקטים', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	register_post_type( 'press', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'מן התקשורת', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'פרסום', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'כל הפרסומים', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'הוסף חדש', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'הוסף פרסום חדש', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'ערוך', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'ערוך פרסום', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'פרסום חדש', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'צפה בפרסום', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'חפש פרסומים', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'מן התקשורת', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'מן-התקשורת', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'project_status', 
		array('projects'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'סטטוס פרוייקט', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'סטטוס', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search סטטוסים', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'כל הסטטוסים', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'סטטוס אב', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'סטטוס אב:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'ערוך סטטוס', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'עדכן ססטוס', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'הוסף סטטוס חדש', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'שם סטטוס חדש', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'סטטוס-פרוייקט' ),
		)
	);
	register_taxonomy( 'press_project', 
		array('press'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'פרוייקטים', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'פרוייקט', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search פרוייקטים', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'כל הפרוייקטים', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'פרוייקט אב', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'פרוייקט אב:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'ערוך פרוייקט', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'עדכן פרוייקט', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'הוסף פרוייקט חדש', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'שם פרוייקט חדש', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'שם-פרוייקט' ),
		)
	);
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
