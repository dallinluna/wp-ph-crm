<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'ph_flush_rewrite_rules' );

// Flush your rewrite rules
function ph_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function ph_custom_post() { 
	// creating (registering) the custom type 
	register_post_type( 'components', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Components', 'uncompromising' ), /* This is the Title of the Group */
			'singular_name' => __( 'Components', 'uncompromising' ), /* This is the individual type */
			'all_items' => __( 'All Components', 'uncompromising' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'uncompromising' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Custom Type', 'uncompromising' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'uncompromising' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'uncompromising' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'uncompromising' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'uncompromising' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'uncompromising' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'uncompromising' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'uncompromising' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type', 'uncompromising' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'components', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'components', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	register_post_type( 'playground', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Playground', 'uncompromising' ), /* This is the Title of the Group */
			'singular_name' => __( 'Playground', 'uncompromising' ), /* This is the individual type */
			'all_items' => __( 'All', 'uncompromising' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'uncompromising' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Playground Item', 'uncompromising' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'uncompromising' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'uncompromising' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'uncompromising' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'uncompromising' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'uncompromising' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'uncompromising' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'uncompromising' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a custom post for the playground', 'uncompromising' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'playground', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'playground', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'components' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'components' );
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'playground' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'playground' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'ph_custom_post');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat', 
		array('components'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Custom Categories', 'uncompromising' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Category', 'uncompromising' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Categories', 'uncompromising' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Categories', 'uncompromising' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Category', 'uncompromising' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Category:', 'uncompromising' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Category', 'uncompromising' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Category', 'uncompromising' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Category', 'uncompromising' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name', 'uncompromising' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag', 
		array('components'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Custom Tags', 'uncompromising' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Tag', 'uncompromising' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Tags', 'uncompromising' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Tags', 'uncompromising' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Tag', 'uncompromising' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Tag:', 'uncompromising' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Tag', 'uncompromising' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Tag', 'uncompromising' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Tag', 'uncompromising' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Tag Name', 'uncompromising' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat', 
		array('playground'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Playground Categories', 'uncompromising' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Playground Category', 'uncompromising' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Playground Categories', 'uncompromising' ), /* search title for taxomony */
				'all_items' => __( 'All Playground Categories', 'uncompromising' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Playground Category', 'uncompromising' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Playground Category:', 'uncompromising' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Playground Category', 'uncompromising' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Playground Category', 'uncompromising' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Playground Category', 'uncompromising' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Playground Category Name', 'uncompromising' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'playground-slug' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag', 
		array('playground'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Playground Tags', 'uncompromising' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Playground Tag', 'uncompromising' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Playground Tags', 'uncompromising' ), /* search title for taxomony */
				'all_items' => __( 'All Playground Tags', 'uncompromising' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Playground Tag', 'uncompromising' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Playground Tag:', 'uncompromising' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Playground Tag', 'uncompromising' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Playground Tag', 'uncompromising' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Playground Tag', 'uncompromising' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Playground Tag Name', 'uncompromising' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
