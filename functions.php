<?php
// クラシックエディタを使用するように指示する
add_filter( 'use_block_editor_for_post', '__return_false' );

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
