<?php
////////////////////////////////////////////////////////
//カスタム投稿タイプ追加
////////////////////////////////////////////////////////
function create_posttype() {
	$name = 'CTA管理';
	register_post_type(
		'cta', //投稿タイプ名
		array(
			'labels' => array(
				'name'               => $name, //管理画面などで表示する名前
				'singular_name'      => $name, //管理画面などで表示する名前（単数形）
				'menu_name'          => $name, //管理画面メニューで表示する名前（nameより優先される）
				'all_items'          => $name.'一覧', //管理画面メニューの一覧リンクの文字
				'add_new_item'       => '新規'.$name.'を追加', //新規作成ページのタイトルに表示される名前
				'add_new'            => '新規追加', //メニューの新規追加ボタンのラベル
				'new_item'           => '新規'.$name, //一覧ページの「新規追加」ボタンのラベル
				'edit_item'          => $name.'の編集', //編集ページのタイトルに表示される名前
				'view_item'          => '投稿を表示', //編集ページの「投稿を表示」ボタンのラベル
				'search_items'       => $name.'を検索', //一覧ページの検索ボタンのラベル
				'not_found'          => $name.'が見つかりませんでした。', //一覧ページに投稿が見つからなかったときに表示
				'not_found_in_trash' => 'ゴミ箱内に'.$name.'が見つかりませんでした。' //ゴミ箱に何も入っていないときに表示
			),

			'public'        => false, //管理画面の表示・フロント画面での表示・検索結果の表示・カスタムメニューでの表示
			'show_ui'       => true, //管理画面の表示
			'has_archive'   => false, //アーカイブページの作成
			'menu_position' => 20, //管理画面メニュー位置
			'menu_icon'     => 'dashicons-lightbulb', //管理画面メニューアイコン
			'hierarchical'  => false, //階層構造(固定ページのような)
			'supports' => array( //利用パーツ
				'title',
				'editor',
				'revisions',
			),
		)
	);

	$name = 'タグ管理';
	register_post_type(
		'afTag', //投稿タイプ名
		array(
			'labels' => array(
				'name'               => $name, //管理画面などで表示する名前
				'singular_name'      => $name, //管理画面などで表示する名前（単数形）
				'menu_name'          => $name, //管理画面メニューで表示する名前（nameより優先される）
				'all_items'          => $name.'一覧', //管理画面メニューの一覧リンクの文字
				'add_new_item'       => '新規'.$name.'を追加', //新規作成ページのタイトルに表示される名前
				'add_new'            => '新規追加', //メニューの新規追加ボタンのラベル
				'new_item'           => '新規'.$name, //一覧ページの「新規追加」ボタンのラベル
				'edit_item'          => $name.'の編集', //編集ページのタイトルに表示される名前
				'view_item'          => '投稿を表示', //編集ページの「投稿を表示」ボタンのラベル
				'search_items'       => $name.'を検索', //一覧ページの検索ボタンのラベル
				'not_found'          => $name.'が見つかりませんでした。', //一覧ページに投稿が見つからなかったときに表示
				'not_found_in_trash' => 'ゴミ箱内に'.$name.'が見つかりませんでした。' //ゴミ箱に何も入っていないときに表示
			),

			'public'        => false, //管理画面の表示・フロント画面での表示・検索結果の表示・カスタムメニューでの表示
			'show_ui'       => true, //管理画面の表示
			'has_archive'   => false, //アーカイブページの作成
			'menu_position' => 20, //管理画面メニュー位置
			'menu_icon'     => 'dashicons-exerpt-view', //管理画面メニューアイコン
			'hierarchical'  => false, //階層構造(固定ページのような)
			'supports' => array( //利用パーツ
				'title',
				'editor',
				'custom-fields',
				'revisions',
			),
		)
	);

	$name = 'タグランキング';
	register_post_type(
		'afRanking', //投稿タイプ名
		array(
			'labels' => array(
				'name'               => $name, //管理画面などで表示する名前
				'singular_name'      => $name, //管理画面などで表示する名前（単数形）
				'menu_name'          => $name, //管理画面メニューで表示する名前（nameより優先される）
				'all_items'          => $name.'一覧', //管理画面メニューの一覧リンクの文字
				'add_new_item'       => '新規'.$name.'を追加', //新規作成ページのタイトルに表示される名前
				'add_new'            => '新規追加', //メニューの新規追加ボタンのラベル
				'new_item'           => '新規'.$name, //一覧ページの「新規追加」ボタンのラベル
				'edit_item'          => $name.'の編集', //編集ページのタイトルに表示される名前
				'view_item'          => '投稿を表示', //編集ページの「投稿を表示」ボタンのラベル
				'search_items'       => $name.'を検索', //一覧ページの検索ボタンのラベル
				'not_found'          => $name.'が見つかりませんでした。', //一覧ページに投稿が見つからなかったときに表示
				'not_found_in_trash' => 'ゴミ箱内に'.$name.'が見つかりませんでした。' //ゴミ箱に何も入っていないときに表示
			),

			'public'        => false, //管理画面の表示・フロント画面での表示・検索結果の表示・カスタムメニューでの表示
			'show_ui'       => true, //管理画面の表示
			'has_archive'   => false, //アーカイブページの作成
			'menu_position' => 20, //管理画面メニュー位置
			'menu_icon'     => 'dashicons-awards', //管理画面メニューアイコン
			'hierarchical'  => false, //階層構造(固定ページのような)
			'supports' => array( //利用パーツ
				'title',
				'revisions',
			),
		)
	);

	if(get_option('fit_custBasis_setting') == 'on'){
		if(get_option('fit_custBasis_name')){
			$name =  get_option('fit_custBasis_name');
		}else{
			$name = 'お知らせ';
		}
		register_post_type(
			'custom', //投稿タイプ名
			array(
				'labels' => array(
					'name'               => $name, //管理画面などで表示する名前
					'singular_name'      => $name, //管理画面などで表示する名前（単数形）
					'menu_name'          => $name, //管理画面メニューで表示する名前（nameより優先される）
					'all_items'          => $name.'一覧', //管理画面メニューの一覧リンクの文字
					'add_new_item'       => '新規'.$name.'を追加', //新規作成ページのタイトルに表示される名前
					'add_new'            => '新規追加', //メニューの新規追加ボタンのラベル
					'new_item'           => '新規'.$name, //一覧ページの「新規追加」ボタンのラベル
					'edit_item'          => $name.'の編集', //編集ページのタイトルに表示される名前
					'view_item'          => '投稿を表示', //編集ページの「投稿を表示」ボタンのラベル
					'search_items'       => $name.'を検索', //一覧ページの検索ボタンのラベル
					'not_found'          => $name.'が見つかりませんでした。', //一覧ページに投稿が見つからなかったときに表示
					'not_found_in_trash' => 'ゴミ箱内に'.$name.'が見つかりませんでした。' //ゴミ箱に何も入っていないときに表示
				),

				'public'        => true, //管理画面の表示・フロント画面での表示・検索結果の表示・カスタムメニューでの表示
				'show_ui'       => true, //管理画面の表示
				'has_archive'   => true, //アーカイブページの作成
				'menu_position' => 20, //管理画面メニュー位置
				'menu_icon'     => 'dashicons-book-alt', //管理画面メニューアイコン
				'hierarchical'  => false, //階層構造(固定ページのような)
				'supports' => array( //利用パーツ
					'title',
					'editor',
					'author',
					'thumbnail',
					'revisions',
					'comments',
					'trackbacks',
					'excerpt',
					'custom-fields',
				),
			)
		);
	}
}
add_action('init', 'create_posttype');
