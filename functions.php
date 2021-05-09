<?php

/* ---------------------------------------
*   基本機能
* -------------------------------------- */
function my_setup()
{
    // アイキャッチ
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}

add_action( 'after_setup_theme', 'my_setup' );


/* ---------------------------------------
*   CSS / JavaScriptの読み込み
* -------------------------------------- */
function my_script_init()
{
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	  wp_enqueue_script( 'script-jquery', get_template_directory_uri() . '/lib/jquery.js' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js' );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );

/* ---------------------------------------
*   メニュー設定
*   管理画面から「メニューの位置」を選択できるようにする
* -------------------------------------- */
function my_menu_init()
{
    register_nav_menus( array(
        'global'  => 'global',
        'utility' => 'utility',
        'drawer'  => 'drawer',
    ) );
}
add_action( 'init', 'my_menu_init' );


/* ---------------------------------------
*   ウィジェット設定
* -------------------------------------- */
function my_widget_init()
{
    register_sidebar( array(
        'name'          => 'sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array (
        'name' => 'footer',
        'id' => 'footerwidget' ,
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>'
   ) );
}
add_action( 'widgets_init', 'my_widget_init' );

function breadcrumb()
{
    $home = '<li><a href="'.get_bloginfo('url').'">トップ</a></li>';

    echo '<ul class="breadcrumb">';

    // カテゴリー
    if ( is_front_page() ) {
        // トップページの場合
    } else if ( is_category() ) {
        $cat = get_queried_object();
        $cat_id = $cat->parent;
        $cat_list = array();
        while($cat_id != 0) {
            $cat = get_category( $cat_id );
            $cat_link = get_category_link( $cat_id );
            array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach ($cat_list as $value) {
            echo $value;
        }
        the_archive_title('<li>', '</li>');
    // アーカイブ
    } else if ( is_archive() ) {
        echo $home;
        the_archive_title('<li>', '</li>');
    // 投稿
    } else if ( is_single() ) {
        $cat = get_the_category();
        if( isset( $cat[0]->cat_ID ) ) $cat_id = $cat[0]->cat_ID;
        $cat_list = array();
        while( $cat_id != 0 ) {
            $cat = get_category( $cat_id );
            $cat_link = get_category_link( $cat_id );
            array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach($cat_list as $value) {
            echo $value;
        }
        the_title('<li>', '</li>');
    // 固定ページ
    } else if ( is_page() ) {
        echo $home;
        the_title('<li>', '</li>');
    // 検索結果
    } else if ( is_search() ) {
        echo $home;
        echo '<li>「'.get_search_query().'」の検索結果</li>';
    // 404ページ
    } else if ( is_404() ) {
        echo $home;
        echo '<li>ページが見つかりません</li>';
    }
    echo '</ul>';
}

?>