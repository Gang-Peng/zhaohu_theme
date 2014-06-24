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
	unregister_default_menu_items();
	register_zhaohu_menu_items();
	
}

function unregister_default_menu_items()
{
	elgg_unregister_menu_item('topbar', 'elgg_logo');
	elgg_unregister_menu_item('topbar', 'profile');
	elgg_unregister_menu_item('topbar', 'friends');
	elgg_unregister_menu_item('topbar', 'usersettings');
	elgg_unregister_menu_item('topbar', 'messages');
}

function register_zhaohu_menu_items()
{
	$site_url = elgg_get_site_url();
	$logo_url =  $site_url . "mod/zhaohu_theme/images/logo.png";
	elgg_register_menu_item('topbar', array(
		'name' => 'zhaohu_logo',
		'href' => $site_url,
		'text' => "<img src=\"$logo_url\" alt=\"elgg_echo('zhaohu:home_page')\" width=\"56\" height=\"44\" />",
		'priority' => 1,
		'title' => elgg_echo('zhaohu:home_page'),
	));
	
	elgg_register_menu_item('topbar', array(
		'name' => 'find_zhaohu',
		'href' => $site_url,
		'text' => elgg_echo('zhaohu:find_zhaohu'),
		'priority' => 100,
	));

	if(elgg_is_logged_in())
	{
		$viewer = elgg_get_logged_in_user_entity();
		elgg_register_menu_item('topbar', array(
		'name' => 'create_group',
		'href' => $site_url,
		'text' => elgg_echo('zhaohu:create_group'),
		'priority' => 200,
		));

		elgg_register_menu_item('topbar', array(
			'name' => 'profile',
			'href' => $viewer->getURL(),
			'text' => elgg_view('output/img', array(
				'src' => $viewer->getIconURL('topbar'),
				'alt' => $viewer->name,
				'title' => elgg_echo('profile'),
				'class' => 'elgg-border-plain elgg-transition',
			)),
			'priority' => 900,
			'link_class' => 'elgg-topbar-avatar',
			'section' => 'alt',
		));
	}
	else 
	{
		elgg_register_menu_item('topbar', array(
			'name' => 'login',
			'href' => $site_url,
			'text' => elgg_echo('zhaohu:login'),
			'priority' => 900,
			'section' => 'alt',
		));
		elgg_register_menu_item('topbar', array(
			'name' => 'register',
			'href' => 'register',
			'text' => elgg_echo('zhaohu:register'),
			'priority' => 1000,
			'section' => 'alt',
		));
	}
}