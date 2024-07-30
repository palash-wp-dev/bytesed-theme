<?php

/*
 * Theme Customize Options
 * @package bytesed
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if (class_exists('CSF') ){
	$prefix = 'bytesed';

	CSF::createCustomizeOptions($prefix.'_customize_options');
	/*-------------------------------------
	** Theme Main panel
-------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('Bytesed Options','bytesed'),
		'id' => 'bytesed_main_panel',
		'priority' => 11,
	));


	/*-------------------------------------
		** Theme Main Color
	-------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('01. Main Color','bytesed'),
		'priority' => 10,
		'parent' => 'bytesed_main_panel',
		'fields' => array(
			array(
				'id'    => 'main_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Main Color One','bytesed'),
				'default' => '#3A9C48',
				'desc' => esc_html__('This is theme primary color, means it\'ll affect most of elements that have default color of our theme primary color','bytesed')
			),
			array(
				'id'    => 'main_color_two',
				'type'  => 'color',
				'title' => esc_html__('Theme Main Color Two','bytesed'),
				'default' => '#EA6228',
				'desc' => esc_html__('This is theme primary color two, means it\'ll affect most of elements that have default color of our theme primary color','bytesed')
			),
			array(
				'id'    => 'secondary_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Secondary Color','bytesed'),
				'default' => '#30373f',
				'desc' => esc_html__('This is theme secondary color, means it\'ll affect most of elements that have default color of our theme secondary color','bytesed')
			),
			array(
				'id'    => 'heading_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Heading Color','bytesed'),
				'default' => '#243E63',
				'desc' => esc_html__('This is theme heading color, means it\'ll affect all of heading tag like, h1,h2,h3,h4,h5,h6','bytesed')
			),
			array(
				'id'    => 'paragraph_color',
				'type'  => 'color',
				'title' => esc_html__('Theme Paragraph Color','bytesed'),
				'default' => '#2B2B2B',
				'desc' => esc_html__('This is theme paragraph color, means it\'ll affect all of body/paragraph tag like, p,li,a etc','bytesed')
			),
		)
	));
	/*-------------------------------------
		** Theme Header Options
	-------------------------------------*/

	CSF::createSection( $prefix.'_customize_options', array(
		'title'  => esc_html__('02. Header One Options','bytesed'),
		'parent' => 'bytesed_main_panel',
		'priority' => 11,
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Nav Bar Options','bytesed').'</h3>'
			),
			array(
				'id' => 'header_01_nav_bar_bg_color',
				'type' => 'color',
				'title' => esc_html__('Nav Bar Background Color','bytesed'),
				'default' => '#30373f'
			),
			array(
				'id' => 'header_01_nav_bar_color',
				'type' => 'color',
				'title' => esc_html__('Nav Bar Text Color','bytesed'),
				'default' => 'rgba(255, 255, 255, 0.8)'
			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Dropdown Options','bytesed').'</h3>'
			),
			array(
				'id' => 'header_01_dropdown_bg_color',
				'type' => 'color',
				'title' => esc_html__('Dropdown Background Color','bytesed'),
				'default' => '#ffffff'
			),
			array(
				'id' => 'header_01_dropdown_color',
				'type' => 'color',
				'title' => esc_html__('Dropdown Text Color','bytesed'),
				'default' => '#878a95'
			)
		)
	));
	
	/*-------------------------------------
	  ** Theme Sidebar Options
  -------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('07. Sidebar','bytesed'),
		'priority' => 13,
		'parent' => 'bytesed_main_panel',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Sidebar Options','bytesed').'</h3>'
			),
			array(
				'id' => 'sidebar_widget_border_color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Border Color','bytesed'),
				'default' => '#fafafa'
			),
			array(
				'id' => 'sidebar_widget_title_color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Title Color','bytesed'),
				'default' => '#242424'
			),
			array(
				'id' => 'sidebar_widget_text_color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Text Color','bytesed'),
				'default' => '#777777'
			),
		)
	));
	/*-------------------------------------
		** Theme Footer Options
	-------------------------------------*/
	CSF::createSection($prefix.'_customize_options',array(
		'title' => esc_html__('08. Footer','bytesed'),
		'priority' => 14,
		'parent' => 'bytesed_main_panel',
		'fields' => array(
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Footer Options','bytesed').'</h3>'
			),
			array(
				'id' => 'footer_area_bg_color',
				'type' => 'color',
				'title' => esc_html__('Footer Background Color','bytesed'),
				'default' => '#F8F8F9',

			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Footer Widget Options','bytesed').'</h3>'
			),
			array(
				'id' => 'footer_widget_title_color',
				'type' => 'color',
				'title' => esc_html__('Footer Widget Title Color','bytesed'),
				'default' => '#383838'
			),
			array(
				'id' => 'footer_widget_text_color',
				'type' => 'color',
				'title' => esc_html__('Footer Widget Text Color','bytesed'),
				'default' => '#383838'
			),
			array(
				'type' => 'subheading',
				'content' =>'<h3>'.esc_html__('Copyright Area Options','bytesed').'</h3>'
			),
			array(
				'id' => 'copyright_area_bg_color',
				'type' => 'color',
				'title' => esc_html__('Copyright Area Background Color','bytesed'),
				'default' => '#F8F8F9'
			),
			array(
				'id' => 'copyright_area_text_color',
				'type' => 'color',
				'title' => esc_html__('Copyright Area Text Color','bytesed'),
				'default' => '#383838'
			),
		)
	));

}//endif