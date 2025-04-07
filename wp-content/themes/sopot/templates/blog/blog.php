<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage sopot
 * @author     thememx
 * @version    1.0
 */

if ( class_exists( 'sopot_Resizer' ) ) {
	$img_obj = new sopot_Resizer();
} else {
	$img_obj = array();
}

$options = sopot_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>
    <div class="blog-sidebar__single">
        <?php if(has_post_thumbnail()){ ?>
        <div class="blog-sidebar__img">
            <?php the_post_thumbnail('sopot_770x415'); ?>
            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                <span class="blog-one__plus"></span>
            </a>
        </div>
        <?php } ?>
        <div class="blog-sidebar__content">
            <div class="blog-sidebar__meta">
                <div class="blog-sidebar__cat">
                    <p><?php the_category(); ?></p>
                </div>
                <div class="blog-sidebar__date">
                    <p> <span class="icon-calendar"></span> <?php echo get_the_date('M'); ?> <?php echo get_the_date('d'); ?>  <?php echo get_the_date('Y'); ?></p>
                </div>
            </div>
            <h3 class="blog-sidebar__title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                <?php the_title(); ?>
                </a></h3>
            <p class="blog-sidebar__text"><?php echo the_excerpt();?></p>
        </div>
    </div>
	

        
</div>