<?php
/**
 * Comments Main File.
 *
 * @package sopot
 * @author  thememx
 * @version 1.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>

<?php if ( have_comments() ) : ?>
	
<div class="">
    <h3 class="comment-one__title"><?php $comments_number = get_comments_number();
        if ( '1' === $comments_number ) {
            /* translators: %s: post title */
            printf( _x( 'Comment (1)', 'comments title', 'sopot' ), get_the_title() );
        } else {
            printf(
                /* translators: 1: number of comments, 2: post title */
                _nx(
                    '%1$s Comments',
                    'Comments (%1$s)',
                    $comments_number,
                    'comments title',
                    'sopot'
                ),
                number_format_i18n( $comments_number ),
                get_the_title()
            );
        } ?>
    </h3>
</div>
<div class="blog-comment-box post-comments" id="comments">
    <?php
        wp_list_comments( array(
            'style'       => 'div',
            'short_ping'  => true,
            'avatar_size' => 140,
            'callback'    => 'sopot_list_comments',
        ) );
    ?>
    
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading">
            <?php esc_html_e( 'Comment navigation', 'sopot' ); ?>
        </h1>
        <div class="nav-previous">
            <?php previous_comments_link( esc_html__( '&larr; Older Comments', 'sopot' ) ); ?>
        </div>
        <div class="nav-next">
            <?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'sopot' ) ); ?>
        </div>
    </nav><!-- .comment-navigation -->
    <?php endif; ?>
    
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments">
        <?php esc_html_e( 'Comments are closed.', 'sopot' ); ?>
    </p>
	<?php endif; ?>

</div>
<?php endif; ?>

<?php if(sopot_comment_form()): ?>
	<?php sopot_comment_form(); ?>
<?php endif; ?>