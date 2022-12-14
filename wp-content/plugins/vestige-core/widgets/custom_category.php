<?php
/*** Widget code for Selected Post ***/
class vestige_custom_category extends WP_Widget
{
	public function __construct()
	{
		$widget_ops = array('description' => esc_html__("Display latest and selected post categories of different post type.", 'vestige-core'));
		parent::__construct('name', esc_html__('(N) Custom Categories', 'vestige-core'), $widget_ops);
	}
	// widget form creation
	public function form($instance)
	{

		// Check values
		if ($instance) {
			$title = esc_attr($instance['title']);
			$type = esc_attr($instance['type']);
			$show = $instance['show'] ? 'checked="checked"' : '';
		} else {
			$title = '';
			$type = '';
			$show = '';
		}
		?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'vestige-core'); ?></label>
		<input class="spTitle" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_html_e('Select Post Type', 'vestige-core'); ?></label>
		<select class="spType" id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>">
			<?php
			$post_types = imic_get_all_types();
			if (($key = array_search('attachment', $post_types)) !== false) {
				unset($post_types[$key]);
			}
			if (($key = array_search('page', $post_types)) !== false) {
				unset($post_types[$key]);
			}
			if (!empty($post_types)) {
				foreach ($post_types as $post_type) {
					$activePost = ($type == $post_type) ? 'selected' : '';
					echo '<option value="' . $post_type . '" ' . $activePost . '>' . $post_type . '</p>';
				}
			} else {
				echo '<option value="no">' . esc_html__('No Post Type Found.', 'vestige-core') . '</option>';
			}
			?>
		</select>
	</p>
	<p>
		<input class="checkbox" type="checkbox" <?php echo esc_attr($show); ?> id="<?php echo esc_attr($this->get_field_id('show')); ?>" name="<?php echo esc_attr($this->get_field_name('show')); ?>" /> <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html__('Display as dropdown', 'vestige-core'); ?></label></p>
<?php
}
// update widget
public function update($new_instance, $old_instance)
{
	$instance = $old_instance;
	// Fields
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['type'] = strip_tags($new_instance['type']);
	$instance['show'] = $new_instance['show'] ? 1 : 0;
	return $instance;
}
// display widget
public function widget($args, $instance)
{
	extract($args);
	// these are the widget options
	$post_title = apply_filters('widget_title', $instance['title']);
	$type = apply_filters('widget_type', $instance['type']);
	$d = !empty($instance['show']) ? '1' : '0';

	$numberPost = (!empty($number)) ? $number : 3;
	echo '' . $args['before_widget'];
	if (!empty($instance['title'])) {
		echo '' . $args['before_title'];
		echo apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		echo '' . $args['after_title'];
	}
	if ($type == 'event') {
		$pages_e = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => 'template-event-category.php'
		));

		$imic_event_category_page_url = !empty($pages_e[0]->ID) ? get_permalink($pages_e[0]->ID) : '';
	}
	if ($type == 'product') {
		$post_terms = get_terms('product_cat');
	} else if ($type == 'post') {
		$post_terms = get_terms('category');
	} else {
		$post_terms = get_terms($type . '-category');
	}
	if ($d == '1') {
		echo '<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" style="font-family:sans-serif; color:#777" data-toggle="dropdown" aria-expanded="false">
    ' . $type . ' ' . esc_html__('Categories', 'vestige-core') . ' <span class="caret"></span>
  </button><ul class="dropdown-menu" role="menu">';
	} else {
		echo '<ul>';
	}
	foreach ($post_terms as $term) {
		$term_name = $term->name;
		$term_link = get_term_link($term, $type . '-category');
		$count = $term->count;
		if ($type == 'event') {
			$count = 0;
			$events = imic_recur_events('future', '', $term->slug, '', '');
			$count = count($events);
		}
		if ((!empty($term_link)) && ($count > 0)) {
			echo '<li><a href="' . $term_link . '">' . $term_name . '</a> (' . $count . ')</li>';
		}
	}
	echo '</ul>';
	if ($d == '1') {
		echo '</div>';
	}
	echo '' . $args['after_widget'];
}
}
// register widget
add_action('widgets_init', function () {
	register_widget('vestige_custom_category');
});
?>