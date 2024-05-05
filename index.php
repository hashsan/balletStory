<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '|', true, 'left' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header id="header">
        <div class="header-widget-area">
            <?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
                <div class="header-widget">
                    <?php dynamic_sidebar( 'header-widget-area' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <main id="main">
        <div class="main-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </div>
        <div class="main-widget-area">
            <?php if ( is_active_sidebar( 'main-widget-area' ) ) : ?>
                <div class="main-widget">
                    <?php dynamic_sidebar( 'main-widget-area' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer id="footer">
        <div class="footer-widget-area">
            <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
                <div class="footer-widget">
                    <?php dynamic_sidebar( 'footer-widget-area' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
