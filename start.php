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
	elgg_register_menu_item('topbar', array(
	'name' => 'zhaohu_logo',
	'href' => 'messages/inbox/' . elgg_get_logged_in_user_entity()->username,
	'text' => 'zhaohu',
	'priority' => 1,
	'title' => 'title',
	));
	
}