<?php
/**
 * 記事に表示するカテゴリーを取得するクラス
 * 記事に設定された最下層カテゴリーを名前の昇順でソートした配列にする
 * get_deisplay_the_category()により取得して利用する
 */
class FitDisplayTheCategory {

    private $cats = array();
    private $type = "";
    private $parent_ids = array();
    private $cat = "";
    private $bottom_cat_id = "";
    private $bottom_cat_level = "";
    private $bottom_cat_id_and_level = array();
    private $most_btm_cta_names = array();

    function __construct( $cats, $type ) {
        $this->set_categorys( $cats );
        $this->set_objtype( $type );
        $this->parent_ids = $this->get_parent_ids( $this->cats );
        $this->bottom_cat_id_and_level = $this->get_bottom_cat_id_and_level( $this->cats, $this->parent_ids, $this->type );
        $this->most_btm_cta_names = $this->get_most_btm_cat_names( $this->bottom_cat_id_and_level );
        asort( $this->most_btm_cta_names );
    }

    // カテゴリー一覧をセット
    function set_categorys( $cats ) {
        $this->cats = $cats;
    }

    // カテゴリー一覧をセット
    function set_objtype( $type ) {
        $this->type = $type;
    }

    // 親IDの配列を取得
    function get_parent_ids( $cats ) {
        foreach ( $cats as $cat) {
            $parent_ids[] = $cat->category_parent;
        }
        return $parent_ids;
    }

    // 最下層のカテゴリー名（key）と階層レベル(value)の連想配列を作成    
    function get_bottom_cat_id_and_level( $cats, $parent_ids, $type ) {
        $bottom_level = "";
        foreach ( $cats as $cat ) {
            if ( !in_array( $cat->term_id, $parent_ids ) ) {
                $bottom_cat_id = $cat->term_id;
                $bottom_cat_level = count( get_ancestors( $cat->term_id, $type ) ) + 1;
                $bottom_cat_id_and_level[$bottom_cat_id] =  $bottom_cat_level;
                if( $bottom_level < $bottom_cat_level ) {
                    $bottom_level = $bottom_cat_level;
                }
            }
        }
        $this->bottom_level = $bottom_level;
        return $bottom_cat_id_and_level;
    }

    // 最下層レベルのカテゴリー名リストを取得
    function get_most_btm_cat_names($bottom_cat_id_and_level) {
        foreach ($bottom_cat_id_and_level as $key => $value ) {
            if ( $value == $this->bottom_level ) {
            $most_btm_cta_names[] = get_the_category_by_ID( $key );
            }
        }
        
        return $most_btm_cta_names;
    }

    function get_deisplay_the_category() {
        return $this->most_btm_cta_names;
    }

}