
        </div><!-- #content-inner -->
        </div><!-- #content -->
        </div><!-- #content-container -->

        <?php if ( get_option('ddrem_layout_sidebar_location') != 'none' ): ?>
        <div id="sidebar-container">
        <div id="sidebar">
            <?php get_sidebar(); ?>
        </div><!-- #sidebar -->
        </div><!-- #sidebar-container -->
        <?php endif; ?>

    </div><!-- .content-section -->
    </div><!-- .content-section-container -->

    <div id="footer-container" role="contentinfo">
    <div id="footer">
        <div id="access-footer" role="navigation">
            <?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer', 'depth' => 1, ) ); ?>
        </div>
        <div id="colophon">
            <div id="site-info">
                <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </div><!-- #site-info -->
            <div id="site-copyright">
                    Copyright <?php echo get_option('ddrem_site_copyright_date'); ?> - <a href="<?php echo esc_attr( get_option('ddrem_site_copyright_url') ); ?>"><?php echo get_option('ddrem_site_copyright_name'); ?></a>
            </div>
        </div><!-- #colophon -->
    </div><!-- #footer -->
    </div><!-- #footer-container -->
    
</div><!-- #shell -->
</div><!-- #shell-container -->

<?php wp_footer(); ?>
</body>
</html>