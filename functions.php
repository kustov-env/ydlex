<?php
//SUPPORT
add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_theme_support( 'menus' );
//LOAD SCRIPTS
add_action( 'wp_enqueue_scripts', 'load_scripts');
function load_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery.min.js','','',true);
    wp_enqueue_script('boot_js', get_template_directory_uri() .'/js/bootstrap.min.js','','',true);
    if(is_home){
        wp_enqueue_script('owl_js', get_template_directory_uri() .'/js/owl.carousel.min.js','','',true);
        wp_enqueue_style('owl_css', get_template_directory_uri() .'/css/owl.carousel.min.css');
    }
    if(is_category()){
        wp_enqueue_script('masonry', get_template_directory_uri() .'/js/masonry.pkgd.min.js','','',true);
    }
    wp_enqueue_script('function', get_template_directory_uri() .'/js/function.js','','',true);
    wp_enqueue_style('bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() .'/style.css');
}
//MENU
register_nav_menus(array('top'=>'Верхнее меню','bottom'=>'Нижнее меню'));
//SIDEBARS
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
    register_sidebar( array('name'=> "Форма заказа курса",'id'=>"forma",'before_widget' => '','after_widget'  => '','before_title'=> '','after_title'   => '',));
    register_sidebar( array('name'=> "Сайдбар на главной странице",'id'=> "about",'before_widget' => '','after_widget'  => '','before_title'  => '','after_title'   => '',));
    register_sidebar( array('name'=> "Слайдер на главной странице",'id'=>"slider",'before_widget' =>'','after_widget'=>'','before_title'=>'','after_title'=>'',) );
}
//PAGINATION
function wp_corenavi() {global $wp_query, $wp_rewrite;$pages = '';$max = $wp_query->max_num_pages;if (!$current = get_query_var('paged')) $current = 1;$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));$a['total'] = $max;$a['current'] = $current;$a['type' ]='list';$total = 1;$a['mid_size'] = 5;$a['end_size'] = 1;$a['prev_text'] = '<span aria-label="Prev" class="link-pager"><i class="yd-icon icon-back"></i></span>';$a['next_text'] = '<span aria-label="Next" class="link-pager"><i class="yd-icon icon-next"></i></span>';if ($max > 1) echo '';if ($total == 1 && $max > 1) $pages = ''."\r\n";echo $pages . paginate_links($a);if ($max > 1) echo '';}
//BREADCRUMBS
function dimox_breadcrumbs() {$text['home'] = 'Главная';$text['category'] = '%s';$text['search'] = 'Результаты поиска по запросу "%s"';$text['tag'] = '%s';$text['author'] = 'Статьи автора %s';$text['404'] = 'Ошибка 404';$text['page'] = '%s';$text['cpage'] = 'Страница комментариев %s';$wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';$wrap_after = '</div>';$sep = '/';$sep_before = '<span class="sep">';$sep_after = '</span>';$show_home_link = 1;$show_on_home = 0;$show_current = 1;$before = '<span class="current">';$after = '</span>';global $post;$home_url = home_url('/');$link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';$link_after = '</span>';$link_attr = ' itemprop="item"';$link_in_before = '<span itemprop="name">';$link_in_after = '</span>';$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;$frontpage_id = get_option('page_on_front');$parent_id = ($post) ? $post->post_parent : '';$sep = ' ' . $sep_before . $sep . $sep_after . ' ';$home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;if (is_home() || is_front_page()) {if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;} else {echo $wrap_before;if ($show_home_link) echo $home_link;if ( is_category() ) {$cat = get_category(get_query_var('cat'), false);if ($cat->parent != 0) {$cats = get_category_parents($cat->parent, TRUE, $sep);$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);if ($show_home_link) echo $sep;echo $cats;}if ( get_query_var('paged') ) {$cat = $cat->cat_ID;echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;} else {if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;}} elseif ( is_search() ) {if (have_posts()) {if ($show_home_link && $show_current) echo $sep;if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;} else {if ($show_home_link) echo $sep;echo $before . sprintf($text['search'], get_search_query()) . $after;}} elseif ( is_day() ) {if ($show_home_link) echo $sep;echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));if ($show_current) echo $sep . $before . get_the_time('d') . $after;} elseif ( is_month() ) {if ($show_home_link) echo $sep;echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));if ($show_current) echo $sep . $before . get_the_time('F') . $after;} elseif ( is_year() ) {if ($show_home_link && $show_current) echo $sep;if ($show_current) echo $before . get_the_time('Y') . $after;} elseif ( is_single() && !is_attachment() ) {if ($show_home_link) echo $sep;if ( get_post_type() != 'post' ) {$post_type = get_post_type_object(get_post_type());$slug = $post_type->rewrite;printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);if ($show_current) echo $sep . $before . get_the_title() . $after;} else {$cat = get_the_category(); $cat = $cat[0];$cats = get_category_parents($cat, TRUE, $sep);if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);echo $cats;if ( get_query_var('cpage') ) {echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;} else {if ($show_current) echo $before . get_the_title() . $after;}}} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {$post_type = get_post_type_object(get_post_type());if ( get_query_var('paged') ) {echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;} else {if ($show_current) echo $sep . $before . $post_type->label . $after;}} elseif ( is_attachment() ) {if ($show_home_link) echo $sep;$parent = get_post($parent_id);$cat = get_the_category($parent->ID); $cat = $cat[0];if ($cat) {$cats = get_category_parents($cat, TRUE, $sep);$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);echo $cats;}printf($link, get_permalink($parent), $parent->post_title);if ($show_current) echo $sep . $before . get_the_title() . $after;} elseif ( is_page() && !$parent_id ) {if ($show_current) echo $sep . $before . get_the_title() . $after;} elseif ( is_page() && $parent_id ) {if ($show_home_link) echo $sep;if ($parent_id != $frontpage_id) {$breadcrumbs = array();while ($parent_id) {$page = get_page($parent_id);if ($parent_id != $frontpage_id) {$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));}$parent_id = $page->post_parent;}$breadcrumbs = array_reverse($breadcrumbs);for ($i = 0; $i < count($breadcrumbs); $i++) {echo $breadcrumbs[$i];if ($i != count($breadcrumbs)-1) echo $sep;}}if ($show_current) echo $sep . $before . get_the_title() . $after;} elseif ( is_tag() ) {if ( get_query_var('paged') ) {$tag_id = get_queried_object_id();$tag = get_tag($tag_id);echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;} else {if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;}} elseif ( is_author() ) {global $author;$author = get_userdata($author);if ( get_query_var('paged') ) {if ($show_home_link) echo $sep;echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;} else {if ($show_home_link && $show_current) echo $sep;if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;}} elseif ( is_404() ) {if ($show_home_link && $show_current) echo $sep;if ($show_current) echo $before . $text['404'] . $after;} elseif ( has_post_format() && !is_singular() ) {if ($show_home_link) echo $sep;echo get_post_format_string( get_post_format() );}echo $wrap_after;}}
//SEARCHING
function searchExcludePages($query){if($query->is_search){$query->set('post_type','post');}return $query;}add_filter('pre_get_posts','searchExcludePages');
//EXTENSION
require get_template_directory() . '/modules/modules.php';
//OPTION
require get_template_directory() . '/modules/options.php';
//PROTECT
require get_template_directory() . '/modules/protect.php';