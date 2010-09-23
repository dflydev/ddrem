<?php if ( ( ! is_home() or $paged) and $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-above" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'ddrem' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'ddrem' ) ); ?></div>
</div><!-- #nav-above -->
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'post', 'loop' ); ?>
<?php endwhile; ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-below" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'ddrem' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'ddrem' ) ); ?></div>
</div><!-- #nav-below -->
<?php endif; ?>