<?php

function fit_post_tag_admin_scripts() {

    wp_enqueue_script('jquery');
    
    wp_enqueue_script('jquery-ui-sortable');
    $to_jsfile = get_template_directory_uri().'/inc/taxonomy_order/js/taxonomy-order.js';
    wp_register_script('taxonomy-order', $to_jsfile);
    wp_enqueue_script( 'taxonomy-order');

}
add_action('admin_print_scripts', 'fit_post_tag_admin_scripts');

function fit_post_tag_admin_styles() {
    $to_stylefile = get_template_directory_uri().'/inc/taxonomy_order/css/taxonomy-order.css';
    wp_register_style('taxonomy-order.css', $to_stylefile);
    wp_enqueue_style( 'taxonomy-order.css');
}
add_action('admin_print_styles', 'fit_post_tag_admin_styles');

function fit_post_tag_menu() {

    $options = fit_post_tag_get_settings();

    if( isset( $options['capability']) && !empty($options['capability'] ) )
        $capability = $options['capability'];
    else if ( is_numeric($options['level']) ) {
        $capability = tto_userdata_get_user_level();
    } else {
        $capability = 'manage_options';  
    }

    $post_types = get_post_types();

    foreach( $post_types as $post_type ) {

        $post_type_taxonomies = get_object_taxonomies( $post_type );

        foreach ( $post_type_taxonomies as $key => $taxonomy_name ) {
            $taxonomy_info = get_taxonomy( $taxonomy_name );

            if ( empty( $taxonomy_info->hierarchical ) ||  $taxonomy_info->hierarchical !== TRUE ) 
                unset( $post_type_taxonomies[$key] );
        }

        if ( count( $post_type_taxonomies ) == 0 ) continue;                

    }
     //サブメニュー表示
     $post_type = 'post';
     add_submenu_page('edit.php', __('タグ順序', 'post_tag-tarm-order'), __('タグ順序', 'post_tag-tarm-order'), $capability, 'post_tag-to-interface-'.$post_type, 'fit_post_tag_interface' );
}
add_action( 'admin_menu', 'fit_post_tag_menu', 100 );

function fit_get_post_tag_term_orderby( $orderby, $args ) {

    if ( apply_filters( 'to/get_terms_orderby/ignore', FALSE, $orderby, $args ) )
        return $orderby;
        
    if ( isset($args['orderby']) && $args['orderby'] == "term_order" && $orderby != "term_order" )
        return "t.term_order";
        
    return $orderby;

}
add_filter( 'get_terms_orderby', 'fit_get_post_tag_term_orderby', 1, 2 );

// 更新処理
function fit_post_tag_save_ajax_order() {
    global $wpdb;

    if ( ! wp_verify_nonce( $_POST['nonce'], 'update-taxonomy-order' ) ) return;

    $data               = stripslashes( $_POST['order'] );
    $unserialised_data  = json_decode( $data, TRUE );

    if ( is_array( $unserialised_data ) ) {
        foreach( $unserialised_data as $key => $values ) {
            $items = explode( "&", $values );
            unset( $item );
            foreach ( $items as $item_key => $item_ ) {
                $items[$item_key] = trim( str_replace( "item[]=", "",$item_) );
            }
            
            if ( is_array($items) && count($items) > 0 )
            foreach( $items as $item_key => $term_id ) {
                $wpdb->update( $wpdb->terms, array('term_order' => ($item_key + 1)), array('term_id' => $term_id) );
            } 
        }
    }
}
add_action( 'wp_ajax_update-taxonomy-order', 'fit_post_tag_save_ajax_order' );

function fit_post_tag_get_settings() {

    $defaults   = array (
                            'capability'                =>  'manage_options',
                            'autosort'                  =>  '1',
                            'adminsort'                 =>  '1'
                        );
    return $defaults;
}

// タグ操作のインターンフェース
function fit_post_tag_interface() {

    global $wpdb, $wp_locale;
    
    $taxonomy = isset( $_GET['taxonomy']) ? sanitize_key($_GET['taxonomy'] ) : '';
    $post_type = isset( $_GET['post_type']) ? sanitize_key($_GET['post_type'] ) : '';

    if( empty($post_type) ) {
        $screen = get_current_screen();
        
        if( isset( $screen->post_type ) && ! empty( $screen->post_type ) ) {
            $post_type = $screen->post_type;
        } else {
            switch( $screen->parent_file ) {
                case "upload.php" :
                    $post_type  =   'attachment';
                    break;
                            
                default:
                    $post_type  =   'post';
            }
        }     
    }
    $post_type_data = get_post_type_object( $post_type );

    if ( ! taxonomy_exists( $taxonomy ) )
        $taxonomy = '';
    ?>

    <div class="wrap">
        <h2 id="top"><?php _e( "タグ順序", 'post_tag-tarm-order' ) ?></h2>
        
        <div id="ajax-response"></div>
        
        <noscript>
            <div class="error message">
                <p><?php _e( "この機能は使うにはJavascriptが動作可能である必要あります。", 'post_tag-tarm-order' ) ?></p>
            </div>
        </noscript>
        
        <?php
             $taxonomy = 'post_tag';
        ?>
        <div id="terms_order">
            <div id="post_body">             
                <ul class="sortable" id="to_sortable">
                    <?php 
                        fit_post_tag_terms( $taxonomy ); 
                    ?>
                </ul>
                
                <div class="clear"></div>
            </div>
            
            <div class="alignleft actions">
                <p class="submit">
                    <a href="javascript:;" class="save-order button-primary"><?php _e( "更新", 'taxonomy-terms-order' ) ?></a>
                </p>
            </div>
            
        </div> 

        <script type="text/javascript">
            jQuery(document).ready(function() {

                jQuery("ul.sortable").sortable({
                        'tolerance':'intersect',
                        'cursor':'pointer',
                        'items':'> li',
                        'axi': 'y',
                        'placeholder':'placeholder',
                        'nested': 'ul'
                });

                // 更新用データ取得
                jQuery(".save-order").on( "click", function() {

                    var mySortable = new Array();

                    jQuery(".sortable").each( function() {
                        
                        var serialized = jQuery(this).sortable("serialize");
                        var parent_tag = jQuery(this).parent().get(0).tagName;
                        parent_tag = parent_tag.toLowerCase()

                        if ( parent_tag == 'li' ) {

                            var tag_id = jQuery(this).parent().attr('id');
                            mySortable[tag_id] = serialized;

                        } else {
                            mySortable[0] = serialized;
                        }
                    });

                    var serialize_data = JSON.stringify( convert_taxonomy_obj( mySortable ));
                                    
                    jQuery.post( ajaxurl, { 
                        action:'update-taxonomy-order', order: serialize_data, nonce : '<?php echo wp_create_nonce( 'update-taxonomy-order' ); ?>' 
                    }, function() {
                        jQuery("#ajax-response").html('<div class="message updated fade"><p><?php _e( "並び替えを保存しました。", 'taxonomy-terms-order' ) ?></p></div>');
                        jQuery("#ajax-response div").delay(3000).hide("slow");
                    });
                });
            });

        </script>            
    </div>
    <?php
}

// リストするタームを取得
function fit_post_tag_terms( $taxonomy ) {
    // 取得するタームの種類
    $args = array(
                'orderby'       =>  'term_order',
                'depth'         =>  0,
                'child_of'      =>  0,
                'hide_empty'    =>  0
    );
    $taxonomy_terms = get_terms( $taxonomy, $args );

    $output = '';
    if ( count($taxonomy_terms) > 0 ) {
        $output = fit_post_tag_walk_tree( $taxonomy_terms, $args['depth'], $args );    
    }

    echo $output;        
}

function fit_post_tag_walk_tree( $taxonomy_terms, $depth, $r ) {
    $walker = new Fit_Pagetag_Terms_Walker; 
    $args = array( $taxonomy_terms, $depth, $r );
    return call_user_func_array(array(&$walker, 'walk'), $args);
}

// ツリー状のデータ構造の操作用クラス
class Fit_Pagetag_Terms_Walker extends Walker {

    var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

    function start_lvl(&$output, $depth = 0, $args = array() ) {
        extract($args, EXTR_SKIP);
        
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='children sortable'>\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        extract($args, EXTR_SKIP);
            
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el( &$output, $term, $depth = 0, $args = array(), $current_object_id = 0 ) {
       
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';
        $taxonomy = get_taxonomy( $term->term_taxonomy_id );
        $output .= $indent . '<li class="term_type_li" id="item_'.$term->term_id.'"><div class="item"><span>'.apply_filters( 'to/term_title', $term->name, $term ).' </span></div>';
    }

    function end_el(&$output, $object, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}

?>