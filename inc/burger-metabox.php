<?php
function burger_page_metabox( $meta_boxes ) {

	$burger_prefix = '_burger_';
	$meta_boxes[] = array(
		'id'        => 'burger_metaboxes',
		'title'     => esc_html__( 'Project Options', 'burger-companion' ),
		'post_types'=> array( 'project' ),
		'priority'  => 'high',
		'context'  => 'side',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'name'    => esc_html__( 'Gird Image Size', 'burger-companion' ),
				'id'      => $burger_prefix . 'portfolio-grid',
				'type'    => 'select',
				'options' => array(
					'0' => 'Select Size',
					'1' => 'Gird Size [445x394]',
					'2' => 'Grid Size [445x553]',
				),
				'inline' => true,
			),			
			array(
				'id'    => $burger_prefix . 'project_type',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Type', 'burger-companion' ),
				'placeholder' => esc_html__( 'Project Type', 'burger-companion' ),
			),			
			array(
				'id'    => $burger_prefix . 'project_url',
				'type'  => 'text',
				'name'  => esc_html__( 'Project URL', 'burger-companion' ),
				'placeholder' => esc_html__( 'Project URL', 'burger-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'burger_page_metabox' );
