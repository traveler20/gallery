<?php
////////////////////////////////////////////////////////
//カスタムタクソノミーを追加
////////////////////////////////////////////////////////
//カスタム投稿タイプ(custom)にカテゴリを追加
if(get_option('fit_custBasis_category') == 'on'){
	function add_register_custom_category() {
		if(get_option('fit_custBasis_name')){
			$name =  get_option('fit_custBasis_name');
		}else{
			$name = 'お知らせ';
		}
		register_taxonomy(
			'custom_category',
			'custom', //投稿タイプ名
			array(
				'labels' => array(
					'name' => $name.'カテゴリー',
					'add_new_item' => '新規'.$name.'カテゴリーを追加',
					'search_items' => $name.'カテゴリーの検索',
					'parent_item' => '親'.$name.'カテゴリー',
          'edit_item' => $name.'カテゴリーの編集',
        ),
        'hierarchical' => true, //カテゴリータイプを指定
        'update_count_callback' => '_update_post_term_count',
        'public' => true,
        'show_in_nav_menus' => true,
        'rewrite' => array(
          'slug' => 'custom/category',
          'with_front' => true,
          'hierarchical' => true
        ),
   	  )
   	);
	}
	add_action('init', 'add_register_custom_category');
}

//カスタム投稿タイプ(custom)にタグを追加
if(get_option('fit_custBasis_tag') == 'on'){
	function add_register_custom_tag() {
		if(get_option('fit_custBasis_name')){
			$name =  get_option('fit_custBasis_name');
		}else{
			$name = 'お知らせ';
		}
		register_taxonomy(
			'custom_tag',
			'custom', //投稿タイプ名
			array(
				'labels' => array(
					'name' => $name.'タグ',
					'add_new_item' => '新規'.$name.'タグを追加',
					'search_items' => $name.'タグの検索',
					'parent_item' => '親'.$name.'タグ',
					'edit_item' => $name.'タグの編集',
			),
			'hierarchical' => false, //タグタイプを指定
			'update_count_callback' => '_update_post_term_count',
			'public' => true,
			'show_in_nav_menus' => false,
			'rewrite' => array(
				'slug' => 'custom/tag',
				'with_front' => true,
				'hierarchical' => true
			),
			)
		);
	}
	add_action('init', 'add_register_custom_tag');
}
