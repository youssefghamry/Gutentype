<?php
/**
 * The style "default divided" of the Blogger
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

$args = get_query_var('trx_addons_args_sc_blogger');

if ($args['slider']) {
	?><div class="slider-slide swiper-slide"><?php
} else if ((int)$args['columns'] > 1) {
	?><div class="<?php echo esc_attr(trx_addons_get_column_class(1, $args['columns'])); ?>"><?php
}

$post_format = get_post_format();
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$post_link = empty($args['no_links']) ? get_permalink() : '';
$post_title = get_the_title();

// Post meta categories
$post_meta = trx_addons_sc_show_post_meta('sc_blogger', apply_filters('trx_addons_filter_show_post_meta', array(
	'components' => 'categories',
	'echo' => false
	), 'sc_blogger_default_divided', 1)
);

// Post meta author and date
$post_meta2 = trx_addons_sc_show_post_meta('sc_blogger', apply_filters('trx_addons_filter_show_post_meta', array(
	'components' => 'author,date',
	'echo' => false
	), 'sc_blogger_default_divided', 1)
);

// Post meta vives comments
$post_meta3 = trx_addons_sc_show_post_meta('sc_blogger', apply_filters('trx_addons_filter_show_post_meta', array(
	'components' => 'counters',
	'counters' => 'views,comments',
	'echo' => false
	), 'sc_blogger_default_divided', 1)
);


?><div <?php post_class( 'sc_blogger_item post_format_'.esc_attr($post_format) . (empty($post_link) ? ' no_links' : '') ); ?>><?php

	// Featured image
	trx_addons_get_template_part('templates/tpl.featured.php',
									'trx_addons_args_featured',
									apply_filters('trx_addons_filter_args_featured', array(
														'class' => 'sc_blogger_item_featured',
														'hover' => 'zoomin',
														'no_links' => true,
														'thumb_size' => 'full',
														'post_info' =>	'<div class="post_info_mc">
																			<! -- Post Meta Categories -->
																			<div class="category_wrapper">'.wp_kses($post_meta, 'gutentype_kses_content').'</div>
																			<! -- Post Title -->
																			<h1 class="sc_blogger_item_title"> <a href="'. esc_url( $post_link ).'">'.esc_html( $post_title ).'</a></h1>
																			<! -- Post Meta Author and Date -->
																			<div class="author_wrapper">'.wp_kses($post_meta2, 'gutentype_kses_content').'</div>
																		</div>'
														), 'blogger-default_divided')
								);

	// Post content
	?><div class="sc_blogger_item_content entry-content"><?php
		if ( !in_array($post_format, array('link', 'aside', 'status', 'quote')) ) {
			?><div class="sc_blogger_item_header entry-header">
				<div class="author_wrapper"><?php echo wp_kses($post_meta2, 'gutentype_kses_content') ?></div>
				<div class="counter_wrapper"><?php echo wp_kses($post_meta3, 'gutentype_kses_content') ?></div>
			</div><!-- .entry-header --><?php
		}		

		// Post content
		?>
		<div class="post_content">
			<?php // Content
			 	echo apply_filters( 'the_content', get_the_content() ); 
				do_action( 'gutentype_action_after_post_content' );
			?>
			<div class="post_meta post_meta_single">
				<?php
					// Post taxonomies
					the_tags( '<span class="post_meta_item post_tags">', '', '</span>' );
					// Share
					if ( gutentype_is_on( gutentype_get_theme_option( 'show_share_links' ) ) ) {
						gutentype_show_share_links(
							array(
								'type'    => 'block',
								'caption' => '',
								'before'  => '<span class="post_meta_item post_share">',
								'after'   => '</span>',
							)
						);
					}
				?>
			</div>
			<?php // Author bio
				if ( (int)gutentype_get_theme_option( 'show_author_info' ) == 1  && ! is_attachment() && get_the_author_meta( 'description' ) ) {
					do_action( 'gutentype_action_before_post_author' );
					get_template_part( apply_filters( 'gutentype_filter_get_template_part', 'templates/author-bio' ) );
					do_action( 'gutentype_action_after_post_author' );
				}
			?>
		</div>
		<div class="comments_single_wrap">
		<?php // Comment
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			} 
		?>
		</div><!-- comments_single_wrap -->

		<?php 
			// Footer
			get_template_part( apply_filters( 'gutentype_filter_get_template_part', 'templates/footer-copyright-simple' ) );
		?>
		
	</div><!-- .entry-content --><?php
	
?></div><!-- .sc_blogger_item --><?php

if ($args['slider'] || (int)$args['columns'] > 1) {
	?></div><?php
}
?>