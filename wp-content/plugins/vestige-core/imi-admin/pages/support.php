<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="wrap about-wrap imi-admin-wrap">

	<?php imi_get_admin_tabs('support'); ?>

	<div id="imi-dashboard" class="wrap about-wrap">
		<div class="welcome-content imi-clearfix extra">
			<div class="imi-row">
				<div class="imi-col-sm-6">
					<div class="imi-box doc">
						<div class="imi-box-head">
							<?php esc_html_e('Online Documentation','vestige-core'); ?>
						</div>
						<div class="imi-box-content">
							<p>
							<?php esc_html_e('Our online documentation covers every basic aspect of theme from installation to how to manage your website content. For more questions visit our forum or open a ticket.' , 'vestige-core'); ?>
							</p>
							<div class="imi-button">
								<a href="https://support.imithemes.com/manual/vestige-museum/" target="_blank"><?php esc_html_e('DOCUMENTATION','vestige-core'); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="imi-col-sm-6">
					<div class="imi-box support">
						<div class="imi-box-head">
							<?php esc_html_e('Help Center','vestige-core'); ?>
						</div>
						<div class="imi-box-content">
							<p>
							<?php esc_html_e('If you have any questions that documentation doesn\'t cover or any issue please open a support ticket at the help center and we will reply as soon as possible.' , 'vestige-core'); ?>
							</p>
							<div class="imi-button">
								<a href="https://support.imithemes.com/help/ticket/new/" target="_blank"><?php esc_html_e('OPEN A TICKET','vestige-core'); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="imi-row">
					<div class="imi-col-sm-6">
						<div class="imi-box support forum">
							<div class="imi-box-head">
								<?php esc_html_e('Knowledgebase','imithemes'); ?>
							</div>
							<div class="imi-box-content">
								<p>
								<?php esc_html_e('Our knowledgebase is the best place to get answers for the most common questions and problems.' , 'imithemes'); ?>
								</p>
								<div class="imi-button">
									<a href="https://support.imithemes.com/knowledge-base/" target="_blank"><?php esc_html_e('VISIT KB','imithemes'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end wrap -->