<?php
/**
 * Single Post Content Template
 *
 * @package    WordPress
 * @subpackage sopot
 * @author     thememx
 * @version    1.0
 */
?>
<?php global $wp_query;

$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();

$gallery = get_post_meta( $page_id, 'sopot_gallery_images', true );

$video = get_post_meta( $page_id, 'sopot_video_url', true );


$audio_type = get_post_meta( $page_id, 'sopot_audio_type', true );

?>


<div class="blog-detail-page">



    <div class="blog-page__single">
		<div class="blog-sidebar__single">
			<?php if(has_post_thumbnail()){ ?>
			<div class="blog-sidebar__img">
				<?php the_post_thumbnail('sopot_770x415'); ?>
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
				<h3 class="blog-sidebar__title"><?php the_title(); ?></h3>
				<div class="blog-sidebar__text">
					<div class="text1">
					<?php the_content(); ?>
						<div class="clearfix"></div>
					<?php wp_link_pages(array('before'=>'<div class="paginate_links">'.esc_html__('Pages: ', 'sopot'), 'after' => '</div>', 'link_before'=>'', 'link_after'=>'')); ?>
					</div>
				</div>
			</div>
		</div>
    </div>
	<div class="blog-details__bottom">

		<?php if ( $options->get( 'single_post_tag' ) ) : ?>
			<?php $title = '<span>' . esc_html__( 'Tags:', 'sopot' ) . '</span>'; ?>
			<?php the_tags( '<div class="blog-details__tags">' . $title . ' ', '  ', '</div>' ); ?>

		<?php endif; ?>


		<?php if ( $options->get( 'single_social_share' ) && $options->get( 'single_post_share' ) ) : ?>
			<ul class="blog-details__social-list">
				<?php foreach ( $options->get( 'single_social_share' ) as $k => $v ) {
					if ( $v == '' ) {
						continue;
					} ?>
					<?php do_action('sopot_social_share_output', $k ); ?>
				<?php } ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php if ( $options->get( 'single_post_author_box' ) ) : ?>
		<?php sopot_template_load( 'templates/blog-single/author_box.php', compact( 'options', 'data' ) ); ?>
	<?php endif; ?>
	<?php comments_template(); ?>
</div>













