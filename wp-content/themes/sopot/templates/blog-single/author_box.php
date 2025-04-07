
<?php if($options->get('single_post_author' ) ): ?>
<div class="author-one">
	<div class="inner">
		<div class="author-one__image">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
		</div>
		<div class="author-one__content">
			<h3><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h3>
			<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
		</div>
	</div>
</div>
<?php endif; ?>