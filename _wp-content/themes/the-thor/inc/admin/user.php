<?php
////////////////////////////////////////////////////////
//プロフィール項目追加
////////////////////////////////////////////////////////
function fit_user_contact( $user_contact ) {
	$user_contact['facebook'] = __( 'Facebook URL', 'default' );
	$user_contact['twitter'] = __( 'Twitter URL', 'default' );
	$user_contact['instagram'] = __( 'Instagram URL', 'default' );
	$user_contact['gplus'] = __( 'Google+ URL', 'default' );
	$user_contact['youtube'] = __( 'YouTube URL', 'default' );
	$user_contact['linkedin'] = __( 'LinkedIn URL', 'default' );
	$user_contact['pinterest'] = __( 'Pinterest URL', 'default' );
	return $user_contact;
}
add_filter( 'user_contactmethods', 'fit_user_contact' );


function fit_add_user_group_form( $bool ) {
    global $profileuser;
    if ( preg_match( '/^(profile\.php|user-edit\.php)/', basename( $_SERVER['REQUEST_URI'] ) ) ) { ?>
    <tr>
      <th scope="row">役職 / 所属</th>
      <td>
        <input type="text" name="user_group" id="user_group" value="<?php echo esc_html( $profileuser->user_group ); ?>" class="regular-text" />
      </td>
    </tr>
<?php }
    return $bool;
}
add_action( 'show_password_fields', 'fit_add_user_group_form' );


function fit_update_user_group( $user_id, $old_user_data ) {
	if ( isset( $_POST['user_group'] ) && $old_user_data->user_group != $_POST['user_group'] ) {
        $user_group = sanitize_text_field( $_POST['user_group'] );
        $user_group = wp_filter_kses( $user_group );
        $user_group = _wp_specialchars( $user_group );
        update_user_meta( $user_id, 'user_group', $user_group );
    }
}
add_action( 'profile_update', 'fit_update_user_group', 10, 2 );
