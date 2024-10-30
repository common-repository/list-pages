<?
/*
Plugin Name: List pages
Plugin URI: http://wordpress.org/extend/plugins/list-pages/
Description: Retreive pages, and children (optional), in a more sophisticated way and add the correct class to the current li-element.
Version: 0.2
Author: Anton Lindqvist
Author URI: http://qvister.se
*/
	function list_pages($child=NULL,$home=NULL,$echo=TRUE) {
		global $wpdb;
		global $wp_query;
		
		$i = 0;
		$child = (!$child) ? 0 : $child;
		$query = 'select ID, post_title, guid from '.$wpdb->posts.' where post_type=\'page\' and post_status=\'publish\' and post_parent='.$child.' order by menu_order';
		$result = $wpdb->get_results($query,ARRAY_A);
		
		foreach($result as $key => $val) {
			if($i == 0 && $home) {
				if(!is_page()) $items .= '<li class="page_item page-item-0 current_page_item"><a class="current_page_item" href="'.get_option('home').'" title="'.$home.'">'.$home.'</a></li>' . "\n";
				else $items .= '<li class="page_item page-item-0"><a href="'.get_option('home').'" title="'.$home.'">'.$home.'</a></li>' . "\n";
			}
			if(is_page($val['post_title']) or count($wpdb->get_row('select ID from '.$wpdb->posts.' where post_parent='.$val['ID'].' and ID='.$wp_query->get_queried_object_id().' and post_type=\'page\' and post_status=\'publish\' limit 1')) > 0) $items .= '<li class="page_item page-item-'.$val['ID'].' current_page_item"><a class="current_page_item" href="'.$val['guid'].'" title="'.$val['post_title'].'">'.$val['post_title'].'</a></li>' . "\n";
			else $items .= '<li class="page_item page-item-'.$val['ID'].'"><a href="'.$val['guid'].'" title="'.$val['post_title'].'">'.$val['post_title'].'</a></li>' . "\n";
			++$i;
		}
		if($echo) echo $items;
		else return $items;
	}
?>