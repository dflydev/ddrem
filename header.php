<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php

    global $page, $paged;
    wp_title( '|', true, 'right' );
    bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'ddrem' ), max( $paged, $page ) );

?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>




<div id="header-container-wrapper">
<div id="header-container">
<div id="header">
    <div id="masthead">
        <div id="branding" role="banner">
            <?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
            <<?php echo $heading_tag; ?> id="site-title">
                <span>
                <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </span>
            </<?php echo $heading_tag; ?>>
            <div id="site-description"><?php bloginfo( 'description' ); ?></div>

            <?php if ( get_option('ddrem_layout_header_image_show') ) : ?>
            <?php endif; ?>
            
        </div><!-- #branding -->
        <div id="access" role="navigation">
            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'ddrem' ); ?>"><?php _e( 'Skip to content', 'ddrem' ); ?></a></div>
            <div id="primary-navigation-container">
            <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
            </div>
        </div>
    </div><!-- #masthead -->
</div><!-- #header -->
</div><!-- #header-container -->
</div><!-- #header-container-wrapper -->
    
<div id="shell-container">
<div id="shell">

    <div class="content-section-container">
    <div class="content-section">
    
        <div id="content-container">
        <div id="content">
        <div id="content-inner">
        