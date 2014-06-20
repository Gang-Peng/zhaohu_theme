<?php
/*
 * zhaohu theme
 */

elgg_register_event_handler('init', 'system', 'zhaohu_theme_init');

function zhaohu_theme_init() {
	elgg_extend_view('css/elgg', 'zhaohu_theme/css');	
	
}