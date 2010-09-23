<?php

if ( ! class_exists('DdRemTheme') ) {
    require_once('lib/DdRemTheme.php');
    DdRemTheme::SINGLETON(__FILE__);
    function ddrem_theme() {
        return DdRemTheme::SINGLETON(__FILE__, 'ddrem');
    }
}

// Get the theme object.
$ddrem = ddrem_theme();

if ( ! function_exists( 'ddrem_posted_on' ) ) :
function ddrem_posted_on() { return ddrem_theme()->postedOn(); }
endif;

if ( ! function_exists( 'ddrem_comment' ) ) :
function ddrem_comment($comment, $args, $depth) { return ddrem_theme()->comment($comment, $args, $depth); }
endif;


/*




function ddrem_body_class_filter($classes, $class = null) {
    
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

add_filter('body_class', 'ddrem_body_class_filter');

if ( ! function_exists( 'ddrem_posted_on' ) ) :
function ddrem_posted_on() {
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
endif;

if ( ! function_exists( 'ddrem_comment' ) ) :
function ddrem_comment( $comment, $args, $depth ) {
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
endif;

*/

?>