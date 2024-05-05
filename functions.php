<?php
//style.css読み込み
function your_theme_enqueue_styles() {
    wp_enqueue_style( 'your-theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'your_theme_enqueue_styles' );

// クラシックエディタを使用するように指示する
//add_filter( 'use_block_editor_for_post', '__return_false' );

// ウィジェットエリアを追加する
function your_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Header Widget Area', 'your-theme-text-domain' ),
        'id'            => 'header-widget-area',
        'description'   => __( 'Add widgets here to appear in the header.', 'your-theme-text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Main Widget Area', 'your-theme-text-domain' ),
        'id'            => 'main-widget-area',
        'description'   => __( 'Add widgets here to appear in the main content area.', 'your-theme-text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'your-theme-text-domain' ),
        'id'            => 'footer-widget-area',
        'description'   => __( 'Add widgets here to appear in the footer.', 'your-theme-text-domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'your_theme_widgets_init' );


//構造化データ追加 excerpt()の指示が必要
function add_structured_data_to_head() {
    if ( is_single() ) {
        global $post;
        setup_postdata( $post );
        
        $data = array(
            '@context' => 'http://schema.org',
            '@type' => 'BlogPosting',
            'headline' => get_the_title(),
            'datePublished' => get_the_date( 'c' ),
            'dateModified' => get_the_modified_date( 'c' ),
            'description' => get_the_excerpt(),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author_meta( 'display_name' ),
            ),
            'keywords' => wp_get_post_tags( get_the_ID(), array( 'fields' => 'names' ) ), // タグを追加
            'articleSection' => wp_get_post_categories( get_the_ID(), array( 'fields' => 'names' ) ), // カテゴリを追加
        );

        echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>';
        wp_reset_postdata();
    }
}
add_action( 'wp_head', 'add_structured_data_to_head' );






