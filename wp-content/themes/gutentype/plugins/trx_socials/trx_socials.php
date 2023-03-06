<?php
/* ThemeREX Socials support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'gutentype_trx_socials_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'gutentype_trx_socials_theme_setup9', 9 );
	function gutentype_trx_socials_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'gutentype_filter_tgmpa_required_plugins', 'gutentype_trx_socials_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'gutentype_trx_socials_tgmpa_required_plugins' ) ) {
	function gutentype_trx_socials_tgmpa_required_plugins( $list = array() ) {
		if ( gutentype_storage_isset( 'required_plugins', 'trx_socials' ) ) {
			$path = gutentype_get_plugin_source_path( 'plugins/trx_socials/trx_socials.zip' );
			if ( ! empty( $path ) || gutentype_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
				  'name'     => gutentype_storage_get_array( 'required_plugins', 'trx_socials' ),
				  'slug'     => 'trx_socials',
				  'version'  => '1.4.3',
				  'source'   => ! empty( $path ) ? $path : 'upload://trx_socials.zip',
				  'required' => true,
				);
			}
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'gutentype_exists_trx_socials' ) ) {
	function gutentype_exists_trx_socials() {
		return defined( 'TRX_UPDATER_VERSION' );
	}
}