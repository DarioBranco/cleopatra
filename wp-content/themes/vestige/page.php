<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
if (is_home()) {
	$id = get_option('page_for_posts');
} else {
	$id = get_the_ID();
}
$page_header = get_post_meta($id, 'imic_pages_Choose_slider_display', true);
if ($page_header == 3) {
	get_template_part('pages', 'flex');
} elseif ($page_header == 4) {
	get_template_part('pages', 'nivo');
} elseif ($page_header == 5) {
	get_template_part('pages', 'revolution');
} else {
	get_template_part('pages', 'banner');
}
$pageSidebarGet = get_post_meta(get_the_ID(), 'imic_select_sidebar_from_list', true);
$pageSidebarStrictNo = get_post_meta(get_the_ID(), 'imic_strict_no_sidebar', true);
$pageSidebarOpt = (isset($imic_options['pages_sidebar'])) ? $imic_options['pages_sidebar'] : '';
if ($pageSidebarGet != '') {
	$pageSidebar = $pageSidebarGet;
} elseif ($pageSidebarOpt != '') {
	$pageSidebar = $pageSidebarOpt;
} else {
	$pageSidebar = '';
}
if ($pageSidebarStrictNo == 1) {
	$pageSidebar = '';
}
$sidebar_column = get_post_meta(get_the_ID(), 'imic_sidebar_columns_layout', true);
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
	$left_col = 12 - intval($sidebar_column);
	$class = $left_col;
} else {
	$class = 12;
}
?>
<!-- Start Body Content -->
<div class="main" role="main">
	<div id="content" class="content full">
		<div class="container">
			<div class="row">
				<div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
					<div class="post-content">
						<?php if (have_posts()) : while (have_posts()) : the_post();
								the_content();
								echo '<div class="clearfix"></div>';
								// Page Links
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'vestige' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => ' </span>',
									'separator'    => '/ ',
								) );
							endwhile;
						endif; ?>
					</div>
					<?php if (isset($imic_options['switch_sharing'])){
						if($imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['2'] == '1') {
							imic_share_buttons();
						}
					}
					if (comments_open()) {
						comments_template('', true);
					} ?>
				</div>
				<?php if (is_active_sidebar($pageSidebar)) { ?>
					<!-- Sidebar -->
					<div class="sidebar col-md-<?php echo esc_attr($sidebar_column); ?>" id="sidebar-col">
						<?php dynamic_sidebar($pageSidebar); ?>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
	<?php get_footer(); ?>