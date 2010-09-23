<?php
/**
 * ddRem WordPress Theme
 */

/**
 * ddRem WordPress Theme
 */
class DdRemTheme {
    
    /**
     * Our instance.
     * @var DdRemTheme
     */
    static private $INSTANCE = null;
    
    /**
     * Theme directory.
     * @var string
     */
    private $themeDir = null;
    
    /**
     * Theme name
     * @var string
     */
    private $themeName = null;
        
    /**
     * Constructor
     * @param string $themeFile
     */
    private function __construct($themeFile, $themeName = null) {
        $this->themeDir = dirname($themeFile);
        $this->themeName = $themeName ? $themeName : basename($this->themeDir);
        add_action('after_setup_theme', array($this, 'handleWpAction_after_setup_theme'));
        add_action('widgets_init', array($this, 'handleWpAction_widgets_init'));
        add_action('wp_head', array($this, 'handleWpAction_wp_head'));
        add_action('body_class', array($this, 'handleWpAction_body_class'));
        add_action('admin_menu', array($this, 'handleWpAction_admin_menu'));
    }
    
    /**
     * Handle after_setup_theme WordPress Action
     */
    public function handleWpAction_after_setup_theme() {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_custom_background();
        register_nav_menus( array(
            'primary' => __( 'Primary Navigation', 'ddrem' ),
            'footer' => __( 'Footer Navigation', 'ddrem' ),
        ) );

        add_option('ddrem_layout_global_width', '900px');
        add_option('ddrem_layout_sidebar_location', 'right');
        add_option('ddrem_layout_sidebar_width', '250px');
        
        add_option('ddrem_layout_header_image_show', false);
        add_option('ddrem_layout_header_image_width', (int)get_option('ddrem_layout_global_width'));
        add_option('ddrem_layout_header_image_height', '100');
        
        add_option('ddrem_layout_css_theme', 'template|css/theme/iaous.css');
        add_option('ddrem_layout_css_navigation', '');
        add_option('ddrem_layout_css_comments', 'template|css/comments/twentyten.css');
        
        add_option('ddrem_site_copyright_name', get_option('blogname'));
        add_option('ddrem_site_copyright_url', home_url('/'));
        add_option('ddrem_site_copyright_date', date('Y'));
        
        //if ( get_option('ddrem_layout_header_image_show') ) {
        //    add_custom_image_header( '', '' );
        //}
    
        //define( 'HEADER_IMAGE_WIDTH', apply_filters( 'ddrem_header_image_width', get_option('ddrem_layout_header_image_width') ) );
        //define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'ddrem_header_image_height', get_option('ddrem_layout_header_image_height') ) );
        
        //set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
        //define( 'NO_HEADER_TEXT', true );
    
        if ( ! is_admin() ) {
            
            wp_enqueue_style('ddrem_core', get_bloginfo('template_directory').'/core.css');
    
            if ( get_option('ddrem_layout_css_navigation') ) {
                list($type, $file) = explode('|', get_option('ddrem_layout_css_navigation'));
                if ( $type == 'template' ) {
                    wp_enqueue_style('ddrem_navigation', get_bloginfo('template_directory').'/' . $file);
                } else {
                    wp_enqueue_style('ddrem_navigation', get_bloginfo('stylesheet_directory').'/' . $file);
                }
            }
            if ( get_option('ddrem_layout_css_comments') ) {
                list($type, $file) = explode('|', get_option('ddrem_layout_css_comments'));
                if ( $type == 'template' ) {
                    wp_enqueue_style('ddrem_navigation', get_bloginfo('template_directory').'/' . $file);
                } else {
                    wp_enqueue_style('ddrem_navigation', get_bloginfo('stylesheet_directory').'/' . $file);
                }
            }        
            if ( get_option('ddrem_layout_css_theme') ) {
                list($type, $file) = explode('|', get_option('ddrem_layout_css_theme'));
                if ( $type == 'template' ) {
                    wp_enqueue_style('ddrem_theme', get_bloginfo('template_directory').'/' . $file);
                } else {
                    wp_enqueue_style('ddrem_theme', get_bloginfo('stylesheet_directory').'/' . $file);
                }
            }
            
            wp_enqueue_style('ddrem', get_bloginfo('stylesheet_directory').'/style.css');
                    
        }

    }
    
    public function handleWpAction_widgets_init() {
        register_sidebar( array(
            'name' => __( 'Primary Widget Area', 'ddrem' ),
            'id' => 'primary-widget-area',
            'description' => __( 'The primary widget area', 'ddrem' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
        
        register_sidebar( array(
            'name' => __( 'Secondary Widget Area', 'ddrem' ),
            'id' => 'secondary-widget-area',
            'description' => __( 'The secondary widget area', 'ddrem' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );
    }
    
    public function handleWpAction_wp_head() {
        
        $header_width = '950px';
        $global_width = get_option('ddrem_layout_global_width');
        $sidebar_width = get_option('ddrem_layout_sidebar_location') == 'none' ?
            0 : get_option('ddrem_layout_sidebar_width');
            
        $content_width = preg_match('/%/', $global_width) ?
            null : ((int)$global_width - (int)$sidebar_width) . 'px';
    
        if ( defined('DDVASH_NO_SIDEBAR_PAGE_TEMPLATE') ) {
            $sidebar_width = null;
        }
        
    ?>
<style type="text/css">
#header-container { width: <?php echo $header_width; ?>; }
#shell-container { width: <?php echo $global_width; ?>; }
<?php if ( $content_width ): ?>
#content img { max-width: <?php echo $content_width; ?>; }
<?php endif; ?>
<?php if ( $sidebar_width ): ?>
#content-container { margin-right: -<?php echo $sidebar_width; ?>; }
#content { margin-right: <?php echo $sidebar_width; ?>; }
#sidebar-container { width: <?php echo $sidebar_width; ?>; }
<?php endif; ?>
</style>
    <?php
    }
    public function handleWpAction_body_class($classes, $class = null) {
    
        switch(get_option('ddrem_layout_sidebar_location')) {
            case 'right':
                $classes[] = ' sidebar-right ';
                break;
            case 'left':
                $classes[] = ' sidebar-left ';
                break;
            case 'none':
                $classes[] = ' sidebar-none ';
                break;
        }
        
        $classes[] = $class;
        
        return $classes;
        
    }
    
    public function handleWpAction_admin_menu() {
    
        add_menu_page(__('ddRem Theme','ddrem'), __('ddRem Theme','ddrem'), 'manage_options', 'ddrem', array($this, 'handleWpAdminPage_home_page') );
        add_submenu_page('ddrem', __('ddRem Theme - About','ddrem'), __('About','ddrem'), 'manage_options', 'ddrem', array($this, 'handleWpAdminPage_home_page'));
        add_submenu_page('ddrem', __('ddRem Theme - Site','ddrem'), __('Site','ddrem'), 'manage_options', 'ddrem-site', array($this, 'handleWpAdminPage_site_page'));
        add_submenu_page('ddrem', __('ddRem Theme - Layout','ddrem'), __('Layout','ddrem'), 'manage_options', 'ddrem-layout', array($this, 'handleWpAdminPage_layout_page'));
        
        register_setting( 'ddrem-layout-group', 'ddrem_layout_global_width' );
        register_setting( 'ddrem-layout-group', 'ddrem_layout_header_image_width' );
        register_setting( 'ddrem-layout-group', 'ddrem_layout_header_image_height' );
        register_setting( 'ddrem-layout-group', 'ddrem_layout_header_image_show' );
        register_setting( 'ddrem-layout-group', 'ddrem_layout_sidebar_location' );
        register_setting( 'ddrem-layout-group', 'ddrem_layout_sidebar_width' );
    
        register_setting( 'ddrem-layout-group', 'ddrem_layout_css_theme' );
        register_setting( 'ddrem-layout-group', 'ddrem_layout_css_navigation' );
        register_setting( 'ddrem-layout-group', 'ddrem_layout_css_comments' );
    
        register_setting( 'ddrem-site-group', 'ddrem_site_copyright_name' );
        register_setting( 'ddrem-site-group', 'ddrem_site_copyright_url' );
        register_setting( 'ddrem-site-group', 'ddrem_site_copyright_date' );
        
    }
    
    function handleWpAdminPage_home_page() {
        get_template_part('admin-templates/home');
    }
    
    function handleWpAdminPage_layout_page() {
        get_template_part('admin-templates/layout');
    }
    
    function handleWpAdminPage_site_page() {
        get_template_part('admin-templates/site');
    }

    /**
     * Posted on.
     */
    public function postedOn() {
        printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'ddrem' ),
            'meta-prep meta-prep-author',
            sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
                get_permalink(),
                esc_attr( get_the_time() ),
                get_the_date()
            ),
            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ),
                sprintf( esc_attr__( 'View all posts by %s', 'ddrem' ), get_the_author() ),
                get_the_author()
            )
        );
    }
    
    /**
     * Comment
     */
    function comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment;
            switch ( $comment->comment_type ) :
                    case '' :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <div id="comment-<?php comment_ID(); ?>">
                    <div class="comment-author vcard">
                            <?php echo get_avatar( $comment, 40 ); ?>
                            <?php printf( __( '%s <span class="says">says:</span>', 'ddrem' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </div><!-- .comment-author .vcard -->
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                            <em><?php _e( 'Your comment is awaiting moderation.', 'ddrem' ); ?></em>
                            <br />
                    <?php endif; ?>
    
                    <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php
                                    // translators: 1: date, 2: time
                                    printf( __( '%1$s at %2$s', 'ddrem' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'ddrem' ), ' ' );
                            ?>
                    </div><!-- .comment-meta .commentmetadata -->
    
                    <div class="comment-body"><?php comment_text(); ?></div>
    
                    <div class="reply">
                            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div><!-- .reply -->
            </div><!-- #comment-##  -->
    
            <?php
                            break;
                    case 'pingback'  :
                    case 'trackback' :
            ?>
            <li class="post pingback">
                    <p><?php _e( 'Pingback:', 'ddrem' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'ddrem'), ' ' ); ?></p>
            <?php
                            break;
            endswitch;
    }
    
    /**
     * We only ever want one instance of our plugin loaded.
     */
    static public function SINGLETON($themeFile) {
        if ( self::$INSTANCE === null ) {
            self::$INSTANCE = new DdRemTheme($themeFile);
        }
        return self::$INSTANCE;
    }

}

?>
