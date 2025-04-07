<?php
///----Blog widgets---
//Popular Posts
class sopot_Popular_Post extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'sopot_Popular_Post', /* Name */esc_html__('sopot Popular Post', 'sopot'), array( 'description' => esc_html__('Show the Blog Popular Post', 'sopot')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

		<!--Start single sidebar-->
        <div class="post-widget popular-posts">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="post-inner">
                <?php $query_string = array('showposts'=>$instance['number']);
					if ($instance['cat']) {
						$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
					}
					$this->posts($query_string); 
				?>
            </div>
        </div>
        <!--End single sidebar-->
        
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Popular Post', 'sopot');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'sopot'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'sopot'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'sopot'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'sopot'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php
                global $post;
				while ($query->have_posts()): $query->the_post();
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
			?>
            <div class="sidebar__post-single">
                <?php if(has_post_thumbnail()){ ?>
                <div class="sidebar-post__img"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><img src="<?php echo esc_url($post_thumbnail_url); ?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>"></a></div> 
                <?php } ?>               
                <div class="sidebar__post-content-box"><h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3></div>
            </div>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}



