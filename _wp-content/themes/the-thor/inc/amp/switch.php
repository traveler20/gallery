<?php
////////////////////////////////////////////////////////
// AMP用テンプレートへの切り替え
////////////////////////////////////////////////////////
function fit_amp_template_switch($template) {
    $new_template = $template;
    if (isset($_GET["type"]) && $_GET['type'] == 'AMP' && is_single() && get_option('fit_ampFunction_switch') == 'on' && get_post_meta(get_the_ID(), 'amp_hide', true) != '1') {
        $new_template = locate_template( "single-amp.php" );
    }
    return $new_template;
}
add_filter('single_template', 'fit_amp_template_switch');
