<?php

class GmThemeUpdater {

	private const UPDATE_URL = 'http://update.gustavomathias.dev.br/api/themes/wpgmcombr.json';

	public function __construct() {
		$this->register();
	}

	public function register(): void {
		$hostname = wp_parse_url( self::UPDATE_URL, PHP_URL_HOST );
		if ( ! is_string( $hostname ) )  return;
		add_filter("update_themes_{$hostname}", [$this, 'get_update'], 10, 4);
	}

	public function get_update( array|false $update, array $theme_data, string $theme_stylesheet, array $locales ) {
		$response = wp_remote_get( self::UPDATE_URL, ['timeout' => 10] );
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) return $update;
		$metadata = json_decode( wp_remote_retrieve_body( $response ), true );
		if ( ! is_array( $metadata ) || empty( $metadata['version'] ) ) return $update;
		$metadata['id']      = $theme_data['UpdateURI'] ?? self::UPDATE_URL;
		$metadata['theme']   = $theme_stylesheet;
		$metadata['url']     = $metadata['url'] ?? $metadata['details_url'] ?? self::UPDATE_URL;
		$metadata['package'] = $metadata['package'] ?? $metadata['download_url'] ?? '';
		return $metadata;
	}
}

new GmThemeUpdater();
