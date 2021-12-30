<?php
////////////////////////////////////////////////////////
//カテゴリ指定ランキング記事一覧ショートコード
////////////////////////////////////////////////////////

/*
記事のランキングを表示するショートコード
使い方: [ranklist num="5" cat="1,7" tag="-1" writer="1" period="a"]
属性:
	num:    記事の表示件数
			省略時や0以下の数字の場合は5件
	cat:    絞り込むカテゴリーのID 複数指定する場合はカンマ区切り
			正の整数: 指定したカテゴリーに属する投稿を表示する
			負の整数: 指定したカテゴリーに属する投稿を除外する
			省略した場合 カテゴリーでの絞り込みは行わない
	tag:    絞り込むタグのID 複数指定する場合はカンマ区切り
			正の整数: 指定したタグに関連付けられた投稿を表示する
			負の整数: 指定したタグに関連付けられた投稿を除外する
			省略した場合 タグでの絞り込みは行わない
	writer: 絞り込む投稿者のID 複数指定する場合はカンマ区切り
			正の整数: 指定した投稿者の投稿を表示する
			負の整数: 指定した投稿者の投稿を除外する
			省略した場合 投稿者での絞り込みは行わない
	period: ランキングを集計する期間
			a: 全期間ランキング
			m: 月ランキング
			w: 週ランキング
			d: 日ランキング
			省略した場合 全期間ランキング
*/

function fit_get_catlistRank( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'num'    => '5',
			'cat'    => '',
			'tag'    => '',
			'writer' => '',
			'period' => 'a',
		),
		$atts,
		'ranklist'
	);

	// フッターにランキング取得用のスクリプト追加
	$id = fit_ranklist_id_hash();
	$get_rank_action = new Fit_Get_Rank_Action( $id, Fit_Get_Rank_Action::TYPE_SCODE, array( 'atts' => $atts ) );
	$get_rank_action->add_wp_footer();

	$retHtml = '<div class="archiveScode archiveScode-rank" id="ranklist-' . $id . '">';
	$retHtml .= '</div>';

	return $retHtml;
}
add_shortcode( 'ranklist', 'fit_get_catlistRank' );
