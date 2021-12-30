<?php
////////////////////////////////////////////////////////
//イメージURLから画像のIDを取得
////////////////////////////////////////////////////////
function fit_get_imageId($image_src){
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}
