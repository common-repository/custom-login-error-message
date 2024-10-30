<?php
/**
 * Plugin Name: Custom Login Error Message
 * Description: This plugin shows a custom error message of your choice to users when they enter invalid username or password.
 * Version: 1.0.0
 * Author: Muhammad Umer
 * Author URI: http://facebook.com/sangherra1
 * License: GPL2
 */
 
add_action('admin_menu', 'clem_my_plugin_menu');

function clem_my_plugin_menu() {
	add_menu_page('Custom Login Error Message', 'Custom Login Error Message', 'administrator', 'clem_my-plugin-settings', 'clem_my_plugin_settings_page', 'dashicons-admin-generic');
}
add_action( 'admin_init', 'clem_my_plugin_settings' );

function clem_my_plugin_settings() {
	register_setting( 'my-plugin-settings-group', 'error_message12' );
}
function clem_my_plugin_settings_page() {
   ?>
    <div class="wrap">
<h2>Custom Login Error Message</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'my-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Your Error Message</th>
        <td><input type="text" name="error_message12" value="<?php echo esc_attr( get_option('error_message12') ); ?>" /></td>
        </tr>
         
        
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php 


}
add_filter('login_errors','clem_login_error_message');

function clem_login_error_message( $error ){
    $error = get_option('error_message12');
    return $error;
}