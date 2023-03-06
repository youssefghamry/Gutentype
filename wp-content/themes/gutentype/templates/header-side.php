<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage GUTENTYPE
 * @since GUTENTYPE 1.0
 */

$gutentype_header_css   = '';
$gutentype_header_image = get_header_image();
$gutentype_header_background = gutentype_get_theme_option( 'header_background_color' );
if ( ! empty( $gutentype_header_image ) && gutentype_trx_addons_featured_image_override( is_singular() || gutentype_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$gutentype_header_image = gutentype_get_current_mode_image( $gutentype_header_image );
}

?><header class="top_panel top_panel_center top_panel_side header header_side
	<?php
	echo ! empty( $gutentype_header_image )  ? ' with_bg_image' : ' without_bg_image';

    if( !empty($gutentype_header_background) ){
    echo ' ' . esc_attr( gutentype_add_inline_css_class( 'background-color: ' . esc_url( $gutentype_header_background ) . ';' ) );
    }

	if ( '' != $gutentype_header_image ) {
		echo ' ' . esc_attr( gutentype_add_inline_css_class( 'background-image: url(' . esc_url( $gutentype_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( gutentype_is_on( gutentype_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight gutentype-full-height';
	}
	if ( ! gutentype_is_inherit( gutentype_get_theme_option( 'header_scheme' ) ) ) {
		echo ' scheme_' . esc_attr( gutentype_get_theme_option( 'header_scheme' ) );
	}
	?>
">
	<?php
    global $post;

	wp_enqueue_style( 'gutentype-header-side-css', gutentype_get_file_url( 'css/header-side.css' ), array(), null );
	wp_enqueue_script( 'classie-js', gutentype_get_file_url( 'js/theme-gallery/classie.js' ), array(), null, true );
	wp_enqueue_script( 'gutentype-header-side-js', gutentype_get_file_url( 'js/header-side.js' ), array(), null, true );

	get_template_part( apply_filters( 'gutentype_filter_get_template_part', 'templates/header-navi' ) );

	// Mobile header
	if ( gutentype_is_on( gutentype_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'gutentype_filter_get_template_part', 'templates/header-mobile' ) );
	}
	
	gutentype_sc_layouts_showed( 'title', true );
	gutentype_sc_layouts_showed( 'postmeta', true );
	?>
	<?php
	if ( get_query_var( 'gutentype_header_image' ) == '' && gutentype_trx_addons_featured_image_override( is_singular() && has_post_thumbnail() && in_array( get_post_type(), array( 'post', 'page' ) ) ) ) {
		$gutentype_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		if ( ! empty( $gutentype_src[0] ) ) {
			gutentype_sc_layouts_showed( 'featured', true );
			?>
			<div class="bg-img"><img src="<?php echo esc_url( $gutentype_src[0] );?>" alt="Background Image"></div>
			<?php
		}
	}
	?>
	<div class="title">
		<h1><?php echo get_the_title();?></h1>
        <p class="subline"><?php echo gutentype_get_theme_option( 'header_subtitle' )?></p>
		<?php
		gutentype_show_post_meta(
			apply_filters(
				'gutentype_filter_post_meta_args', array(
				'components' => gutentype_array_get_keys_by_value( gutentype_get_theme_option( 'meta_parts' ) ),
				'counters'   => gutentype_array_get_keys_by_value( gutentype_get_theme_option( 'counters' ) ),
				'seo'		=> gutentype_is_on( gutentype_get_theme_option( 'seo_snippets' ) ),
			), 'header', 1
			)
		);
		?>
	</div>
</header>