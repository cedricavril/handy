<?php

namespace FINBANKPLUGIN\Inc;


use FINBANKPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpfinbank' ),
			'singular_name'     => _x( 'Project Category', 'wpfinbank' ),
			'search_items'      => __( 'Search Category', 'wpfinbank' ),
			'all_items'         => __( 'All Categories', 'wpfinbank' ),
			'parent_item'       => __( 'Parent Category', 'wpfinbank' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinbank' ),
			'edit_item'         => __( 'Edit Category', 'wpfinbank' ),
			'update_item'       => __( 'Update Category', 'wpfinbank' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinbank' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinbank' ),
			'menu_name'         => __( 'Project Category', 'wpfinbank' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpfinbank' ),
			'singular_name'     => _x( 'Service Category', 'wpfinbank' ),
			'search_items'      => __( 'Search Category', 'wpfinbank' ),
			'all_items'         => __( 'All Categories', 'wpfinbank' ),
			'parent_item'       => __( 'Parent Category', 'wpfinbank' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinbank' ),
			'edit_item'         => __( 'Edit Category', 'wpfinbank' ),
			'update_item'       => __( 'Update Category', 'wpfinbank' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinbank' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinbank' ),
			'menu_name'         => __( 'Service Category', 'wpfinbank' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpfinbank' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpfinbank' ),
			'search_items'      => __( 'Search Category', 'wpfinbank' ),
			'all_items'         => __( 'All Categories', 'wpfinbank' ),
			'parent_item'       => __( 'Parent Category', 'wpfinbank' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinbank' ),
			'edit_item'         => __( 'Edit Category', 'wpfinbank' ),
			'update_item'       => __( 'Update Category', 'wpfinbank' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinbank' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinbank' ),
			'menu_name'         => __( 'Testimonials Category', 'wpfinbank' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpfinbank' ),
			'singular_name'     => _x( 'Team Category', 'wpfinbank' ),
			'search_items'      => __( 'Search Category', 'wpfinbank' ),
			'all_items'         => __( 'All Categories', 'wpfinbank' ),
			'parent_item'       => __( 'Parent Category', 'wpfinbank' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinbank' ),
			'edit_item'         => __( 'Edit Category', 'wpfinbank' ),
			'update_item'       => __( 'Update Category', 'wpfinbank' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinbank' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinbank' ),
			'menu_name'         => __( 'Team Category', 'wpfinbank' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpfinbank' ),
			'singular_name'     => _x( 'Faqs Category', 'wpfinbank' ),
			'search_items'      => __( 'Search Category', 'wpfinbank' ),
			'all_items'         => __( 'All Categories', 'wpfinbank' ),
			'parent_item'       => __( 'Parent Category', 'wpfinbank' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpfinbank' ),
			'edit_item'         => __( 'Edit Category', 'wpfinbank' ),
			'update_item'       => __( 'Update Category', 'wpfinbank' ),
			'add_new_item'      => __( 'Add New Category', 'wpfinbank' ),
			'new_item_name'     => __( 'New Category Name', 'wpfinbank' ),
			'menu_name'         => __( 'Faqs Category', 'wpfinbank' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'faqs', $args );
		
		
	}
	
}
