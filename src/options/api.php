<?php

class GmOptions {

  function setting(string $group, string $name, array $args): void
  {
    register_setting($group, $name, $args);
  }

  function field(string $id, string $title, callable $callback, string $page): void
  {
    add_settings_field($id, $title, $callback, $page);
  }

}

add_action( 'admin_init', function(){
  $options = new GmOptions();
  $options->setting( 'general', 'wpgmcombr_integration_url',	['sanitize_callback' => 'esc_url_raw'] );
  $options->setting( 'general',	'wpgmcombr_integration_id',	['sanitize_callback' => 'sanitize_text_field'] );
  $options->field( 'wpgmcombr_integration_url', __( 'Url de integração', 'wpgmcombr' ), 'wpgmcombr_render_integration_url_field', 'general' );
  $options->field( 'wpgmcombr_integration_id', __( 'ID de integração', 'wpgmcombr' ), 'wpgmcombr_render_integration_id_field', 'general' );
} );


/**
 * Renders the integration URL field.
 *
 * @return void
 */
function wpgmcombr_render_integration_url_field() {
	$value = get_option( 'wpgmcombr_integration_url', '' );
	?>
	<input
		type="url"
		name="wpgmcombr_integration_url"
		value="<?php echo esc_attr( $value ); ?>"
		class="regular-text"
	/>
	<?php
}

/**
 * Renders the integration ID field.
 *
 * @return void
 */
function wpgmcombr_render_integration_id_field() {
	$value = get_option( 'wpgmcombr_integration_id', '' );
	?>
	<input
		type="text"
		name="wpgmcombr_integration_id"
		value="<?php echo esc_attr( $value ); ?>"
		class="regular-text"
	/>
	<?php
}
