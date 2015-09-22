<?php

if ( function_exists('register_sidebar') ) {
    
	// sidebar 1
    register_sidebar(array(
        'name'=>'sidebar1',
        'before_widget' => '<div class="titolomenu">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	// sidebar 2
	register_sidebar(array(
        'name'=>'sidebar-footer',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );


register_nav_menu( 'primary', __( 'Menù primario', 'twentytwelve' ) );

function get_comment_count_for_posts() {

	global $post;
	global $wpdb;
	
	$id = $post->ID;
	
	$comment_count = $wpdb->get_var("SELECT comment_count FROM $wpdb->posts WHERE post_status = 'publish' AND ID = $id");
	$comment_status = $wpdb->get_var("SELECT comment_status FROM $wpdb->posts WHERE ID = $id");
	
	$html = '<span>';
	$count = '';
	
	if($comment_status == 'open') {
	
		$count = $comment_count;
	
	
	} else {
	
		$count = 'Commenti chiusi';
	
	}
	
	if($count>1){
		$testocommento=" Commenti ";
	}else{
		$testocommento=" Commento ";
	}
	
	$html .= $count.$testocommento.'</span>';
	
	return $html;
	

}

/***** Pagination *****/

if (!function_exists('mh_pagination')) {
	function mh_pagination() {
		global $wp_query;
	    $big = 9999;
		echo paginate_links(array('base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), 'format' => '?paged=%#%', 'current' => max(1, get_query_var('paged')), 'prev_next' => true, 'prev_text' => __('&laquo;', 'mh'), 'next_text' => __('&raquo;', 'mh'), 'total' => $wp_query->max_num_pages));			
	}
}

if (!function_exists('mh_posts_pagination')) {
	function mh_posts_pagination($content) {
		if (is_singular() && is_main_query()) {
			$content .= wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before' => '<span class="pagelink">', 'link_after' => '</span>', 'nextpagelink' => __('&raquo;', 'mh'), 'previouspagelink' => __('&laquo;', 'mh'), 'pagelink' => '%', 'echo' => 0));
		}
		return $content;
	}
}
add_filter('the_content', 'mh_posts_pagination', 1);

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
}


if ( ! function_exists( 'twentythirteen_excerpt_more' ) && ! is_admin() ) :
function twentythirteen_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			sprintf( __( '[Continua a leggere...]', 'twentythirteen' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentythirteen_excerpt_more' );
endif;


if (!function_exists('mh_comments')) {
	function mh_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="vcard meta">	
					<?php echo get_avatar($comment->comment_author_email, 30); ?>			
					<?php echo get_comment_author_link() ?> <span>//</span> 
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s alle %2$s', 'mh'), get_comment_date(),  get_comment_time()) ?></a> <span>//</span>
					<?php if (comments_open() && $args['max_depth']!=$depth) { ?>		
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php } ?>
					<?php edit_comment_link(__('(Mod)', 'mh'),'  ','') ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="comment-info"><?php _e('Il tuo commento è in attesa di moderazione.', 'mh') ?></div>
				<?php endif; ?>
				<div class="comment-text">	
					<?php comment_text() ?>	
				</div>
			</div><?php
	}
}



?>
