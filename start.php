<?php
/*
 * zhaohu theme
 */

elgg_register_event_handler('init', 'system', 'zhaohu_theme_init');

function zhaohu_theme_init() {
	//elgg_extend_view('css/elgg', 'zhaohu_theme/css');	
	elgg_register_event_handler('pagesetup', 'system', 'prepare_zhaohu_topbar');
}

function prepare_zhaohu_topbar(){
	elgg_unregister_menu_item('topbar', 'elgg_logo');
	$site_url = elgg_get_site_url();
	$logo_url =  $site_url . "mod/zhaohu_theme/images/logo.png";
	elgg_register_menu_item('topbar', array(
	'name' => 'zhaohu_logo',
	'href' => "$site_url",
	'text' => "<img src=\"$logo_url\" alt=\"Zhaohu\" width=\"56\" height=\"44\" />",
	'priority' => 1,
	'title' => 'title',
	));
	
}