<?php
/**
 * The "Portfolio" template to show post's content
 *
 * Used in the widget Recent News.
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.0
 */
 
$widget_args = get_query_var('trx_addons_args_recent_news');
$style = $widget_args['style'];
$number = $widget_args['number'];
$count = $widget_args['count'];
$columns = $widget_args['columns'];
$post_format = get_post_format();
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$animation = apply_filters('trx_addons_blog_animation', '');

if ((int)$columns > 1) {
	?><div class="<?php echo esc_attr(trx_addons_get_column_class(1, $columns)); ?>"><?php
}
?><article 
	<?php post_class( 'post_item post_layout_'.esc_attr($style).' post_format_'.esc_attr($post_format) ); ?>
	<?php echo (!empty($animation) ? ' data-animation="'.esc_attr($animation).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

$title = '<div class="post_meta">';
    // Post author
    $met_post = get_post(get_the_id(), 'ARRAY_A');
    $author_id = $met_post['post_author'];
    if ((int)$author_id > 0) {
        $author_link = get_author_posts_url($author_id);
        $author_name = get_the_author_meta('display_name', $author_id);
        $gutentype_mult = gutentype_get_retina_multiplier();
        $title .=
            '<a class="post_meta_item post_author" rel="author" href="' . esc_url($author_link) . '"><span class="author_avatar_meta">'
            . get_avatar(get_the_author_meta('user_email', $author_id), 35 * $gutentype_mult)
            . '</span>' . esc_html__('By ', 'gutentype') . esc_html($author_name) . '</a>';
    }
$title .= '<span class="post_meta_item post_date"><a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_date()).'</a></span>';
$title .= '</div>';

	
	trx_addons_get_template_part('templates/tpl.featured.php',
								'trx_addons_args_featured',
								apply_filters('trx_addons_filter_args_featured', array(
												'post_info' => '<div class="post_info">'
																. '<span class="post_categories post_meta_item">'.trx_addons_get_post_categories().'</span>'
																. '<h5 class="post_title entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">'.wp_kses( get_the_title(), 'gutentype_kses_content' ).'</a></h5>'
																. ( in_array( get_post_type(), array( 'post', 'attachment' ) ) 
																		? $title
																		: '')
																. '</div>',
												'thumb_size' => gutentype_get_thumb_size((int)$columns == 1 ? 'huge' : 'plain'),
                                                'thumb_bg' => ((int)$columns == 1 ? false : true)
												), 'recent_news-portfolio')
							);
?>
</article><?php

if ((int)$columns > 1) {
	?></div><?php
}
?>