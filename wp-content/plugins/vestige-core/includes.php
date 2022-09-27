<?php
class Vestige_Core_Features
{
    public function __construct()
    {
        if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
            add_filter('mce_external_plugins', array($this, 'imic_add_tinymce_plugin'));
            add_filter('mce_buttons', array($this, 'imic_register_shortcode_button'));
        }
    }

    public function imic_register_shortcode_button($button)
    {
        array_push($button, 'separator', 'imicframework_shortcodes');
        return $button;
    }

    public function imic_add_tinymce_plugin($plugins)
    {
        $plugins['imicframework_shortcodes'] = VESTIGE_CORE__PLUGIN_URL . 'shortcodes/imic-shortcodes/tinymce.editor.plugin.js';
        return $plugins;
    }
}
function vestige_core_initialize_features()
{
    new Vestige_Core_Features;
}
add_action('init', 'vestige_core_initialize_features');
//Remove Redux Framework Notices
function imic_remove_redux_notices()
{ // Be sure to rename this function to something more unique
    if (class_exists('ReduxFrameworkPlugin')) {
        remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2);
    }
    if (class_exists('ReduxFrameworkPlugin')) {
        remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
    }
}
add_action('init', 'imic_remove_redux_notices');

if (is_admin()) {
    $plugin = 'wordpress-seo/wp-seo.php';
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    if (!is_plugin_active($plugin)) {
        $taxonomy = 'venue';
        add_action("{$taxonomy}_edit_form_fields", 'add_form_fields_venue', 10, 2);
        remove_filter('pre_term_description', 'wp_filter_kses');
        remove_filter('term_description', 'wp_kses_data');
        $taxonomy = 'artwork-artists';
        add_action("{$taxonomy}_edit_form_fields", 'add_form_fields_artist', 10, 2);
    }
}

if (!function_exists('imic_validate_payment')) {
    function imic_validate_payment($tx)
    {
        // Init cURL
        $request = curl_init();
        global $imic_options;
        $paypal_payment = $imic_options['paypal_site'];
        $paypal_payment = ($paypal_payment == "1") ? "https://www.paypal.com/cgi-bin/webscr" : "https://www.sandbox.paypal.com/cgi-bin/webscr";
        // Set request options
        curl_setopt_array($request, array(
            CURLOPT_URL => $paypal_payment,
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => http_build_query(array(
                'cmd' => '_notify-synch',
                'tx' => $tx,
                'at' => $imic_options['paypal_token'],
            )),
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HEADER => FALSE,
            // CURLOPT_SSL_VERIFYPEER => TRUE,
            // CURLOPT_CAINFO => 'cacert.pem',
        ));
        // Execute request and get response and status code
        $response = curl_exec($request);
        $status   = curl_getinfo($request, CURLINFO_HTTP_CODE);

        // Close connection
        curl_close($request);
        // Remove SUCCESS part (7 characters long)
        $response = substr($response, 7);

        // URL decode
        $response = urldecode($response);
        // Turn into associative array
        preg_match_all('/^([^=\s]++)=(.*+)/m', $response, $m, PREG_PATTERN_ORDER);
        $response = array_combine($m[1], $m[2]);

        // Fix character encoding if different from UTF-8 (in my case)
        if (isset($response['charset']) and strtoupper($response['charset']) !== 'UTF-8') {
            foreach ($response as $key => &$value) {
                $value = mb_convert_encoding($value, 'UTF-8', $response['charset']);
            }
            $response['charset_original'] = $response['charset'];
            $response['charset'] = 'UTF-8';
        }
        // Sort on keys for readability (handy when debugging)
        ksort($response);
        return $response;
    }
}

// Remove Woocommerce setup redirection on activation
if (class_exists('Woocommerce')) {
    if ( ! function_exists( 'remove_class_filters' ) ) {
		function remove_class_filters( $tag, $class, $method ) {
			$filters = $GLOBALS['wp_filter'][ $tag ];
			if ( empty ( $filters ) ) {
				return;
			}
			foreach ( $filters as $priority => $filter ) {
				foreach ( $filter as $identifier => $function ) {
					if ( is_array( $function )  ) {

						if ( is_array( $function['function'] ) || is_string( $function['function'] ) ) {

							if ( is_a( $function['function'][0], $class ) and $method === $function['function'][1] ) {

								remove_filter(
									$tag,
									array ( $function['function'][0], $method ),
									$priority
								);

							}

						}

					}

				}

			}

		}

	}

	add_action( 'admin_init', 'disable_shop_redirect', 0 );
	function disable_shop_redirect() {
		remove_class_filters(
			'admin_init',
			'WC_Admin',
			'admin_redirects'
		);
	}
}

//Add New Custom Menu Option
if (!class_exists('IMIC_Custom_Nav')) {
    class IMIC_Custom_Nav
    {
        public function imic_add_nav_menu_meta_boxes()
        {

            add_meta_box(
                'mega_nav_link',
                esc_html__('Mega Menu', 'vestige-core'),
                array($this, 'imic_nav_menu_link'),
                'nav-menus',
                'side',
                'low'
            );
        }
        public function imic_nav_menu_link()
        {

            global $_nav_menu_placeholder, $nav_menu_selected_id;
            $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;

            ?>
        <div id="posttype-wl-login" class="posttypediv">
            <div id="tabs-panel-wishlist-login" class="tabs-panel tabs-panel-active">
                <ul id="wishlist-login-checklist" class="categorychecklist form-no-clear">
                    <li>
                        <label class="menu-item-title">
                            <input type="checkbox" class="menu-item-object-id" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-object-id]" value="<?php echo '' . $_nav_menu_placeholder; ?>"> <?php esc_html_e('Create Column', 'vestige-core'); ?>
                        </label>
                        <input type="hidden" class="menu-item-db-id" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-db-id]" value="0">
                        <input type="hidden" class="menu-item-object" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-object]" value="page">
                        <input type="hidden" class="menu-item-parent-id" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-parent-id]" value="0">
                        <input type="hidden" class="menu-item-type" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-type]" value="">
                        <input type="hidden" class="menu-item-title" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-title]" value="<?php _e('Column', 'vestige-core'); ?>">
                        <input type="hidden" class="menu-item-classes" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-classes]" value="custom_mega_menu">
                    </li>
                </ul>
            </div>
            <p class="button-controls">
                <span class="add-to-menu">
                    <input type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_html_e('Add to Menu', 'vestige-core'); ?>" name="add-post-type-menu-item" id="submit-posttype-wl-login">
                    <span class="spinner"></span>
                </span>
            </p>
        </div>
    <?php }
}
}
$custom_nav = new IMIC_Custom_Nav;
add_action('admin_init', array($custom_nav, 'imic_add_nav_menu_meta_boxes'));


//Contact Event Manager
if (!function_exists('imic_contact_event_manager')) {
	function imic_contact_event_manager()
	{
		$event_id = $_POST['itemnumber'];
		$post_type = get_post_type($event_id);
		$event_date = $_POST['event_date'];
		$exhibition_time = (isset($_POST['exhibition_time'])) ? $_POST['exhibition_time'] : '';
		$cost = (isset($_POST['costs']) && $_POST['costs'] != 0) ? $_POST['costs'] : esc_html__('Free', 'vestige-core');
		$name = $_POST['name'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$notes = $_POST['notes'];
		$exhibition_date = (isset($_POST['exhibition_date'])) ? $_POST['exhibition_date'] : '';
		$ticket_details = (isset($_POST['ticket_details'])) ? $_POST['ticket_details'] : array();
		$event_title = get_the_title($event_id);
		$registration_number = get_post_meta($event_id, 'imic_event_registration_number', true);
		$registration_number = ($registration_number == '') ? 0 : $registration_number + 1;
		$reg_post_type = ($post_type == 'event') ? 'event_registrants' : 'exhibition_reg';
		$registrant = array(
			'post_title'    => $name . ' ' . $lname,
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type' => $reg_post_type
		);

		// Insert the registrant into the database
		$registrant_id = wp_insert_post($registrant);
		if ($post_type == 'event') {
			wp_set_object_terms($registrant_id, get_the_title($event_id), 'registrant-event');
		} elseif ($post_type == 'exhibition') {
			wp_set_object_terms($registrant_id, get_the_title($event_id), 'registrant-exhibition');
		}
		$ticket_registered = '';
		$tickets_type_event = get_post_meta($event_id, 'tickets_type', true);
		if (!empty($ticket_details)) {
			$ticket_info = array();
			foreach ($ticket_details as $key => $value) {
				$ticket_info[$key] = $value;
				if (!empty($tickets_type_event)) {
					$tickets_type_event = get_post_meta($event_id, 'tickets_type', true);
					$tickets_type = array();
					foreach ($tickets_type_event as $tickets) {
						if ($tickets[0] != $key) {
							$tickets_type[]  = array($tickets[0], $tickets[1], $tickets[2], $tickets[3]);
						} else {
							$available = $tickets[1];
							$booked_tickets = $tickets[2];
							$new_booked_updated = intval($booked_tickets) + intval($value);
							$new_available_updated = intval($available) - intval($value);
							$tickets_type[]  = array($tickets[0], $tickets[1], $new_booked_updated, $tickets[3]);
							$ticket_registered .= $key . ': ' . $value;
						}
					}
					delete_post_meta($event_id, 'tickets_type');
					update_post_meta($event_id, 'tickets_type', $tickets_type);
				}
			}
			update_post_meta($registrant_id, 'imic_registrant_ticket_type', $ticket_info);
		}
		update_post_meta($registrant_id, 'imic_registrant_email', esc_attr($email));
		update_post_meta($registrant_id, 'imic_registrant_phone', esc_attr($phone));
		update_post_meta($registrant_id, 'imic_registrant_address', esc_attr($address));
		update_post_meta($registrant_id, 'imic_registrant_additional_notes', esc_attr($notes));
		update_post_meta($registrant_id, 'imic_registrant_event_date', $exhibition_time);
		update_post_meta($registrant_id, 'imic_registrant_registration_number', esc_attr($event_id . '-' . $registration_number));
		update_post_meta($event_id, 'imic_event_registration_number', $registration_number);
		if ($post_type == "exhibition") {
			update_post_meta($registrant_id, 'imic_registrant_exhibition_time', $exhibition_time);
			update_post_meta($registrant_id, 'imic_registrant_event_date', $exhibition_date);
		}
		$event_manager_email = get_post_meta($event_id, 'imic_event_manager_email', true);
		$manager_email = esc_attr($event_manager_email);
		$manager_email = ($manager_email != '') ? $manager_email : get_option('admin_email');
		if ($post_type == "event") {
			$e_subject = esc_html__('Registration for Event', 'vestige-core');
		} else {
			$e_subject = esc_html__('Registration for Exhibition', 'vestige-core');
		}
		$result['regid'] = esc_attr($event_id . '-' . $registration_number);
		$result['reguser'] = esc_attr($name) . '<br/>' . esc_attr($lname);
		$result['cost'] = esc_attr($cost);
		$result['registrant'] = esc_attr($registrant_id);
		$result = json_encode($result);
		echo '' . $result;
		$e_body = $name . ' ' . esc_html__("has been registered for:", "vestige-core") . ' ' . $event_title . PHP_EOL . PHP_EOL;
		$body = esc_html__("Your information has been delivered to Manager for:", "vestige-core") . ' ' . $event_title . PHP_EOL . PHP_EOL;
		$e_content = '';
		$e_content .= esc_html__("Registration Number:", "vestige-core") . ' ' . $event_id . '-' . $registration_number . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Date:", "vestige-core") . ' ' . $event_date . PHP_EOL . PHP_EOL;
		if ($post_type != "event") {
			$e_content .= esc_html__("Time:", "vestige-core") . ' ' . $exhibition_time . PHP_EOL . PHP_EOL;
		}
		$e_content .= esc_html__("Name:", "vestige-core") . ' ' . esc_attr($name) . ' ' . esc_attr($lname) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Email:", "vestige-core") . ' ' . esc_attr($email) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Phone:", "vestige-core") . ' ' . esc_attr($phone) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Notes:", "vestige-core") . ' ' . esc_attr($notes) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Address:", "vestige-core") . ' ' . esc_attr($address) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Tickets:", "vestige-core") . ' ' . esc_attr($ticket_registered) . PHP_EOL . PHP_EOL;
		$e_reply = esc_html__("You can contact ", "vestige-core") . " " . esc_attr($name) . " " . esc_html__("via email", "vestige-core") . ', ' . esc_attr($email);
		$reply = esc_html__("You can contact manager via email", "vestige-core") . ', ' . $manager_email;
		$msg = wordwrap($e_body . $e_content . $e_reply, 70);
		$user_msg = wordwrap($body . $e_content . $reply, 70);
		$headers = "From: $email" . PHP_EOL;
		$headers .= "Reply-To: $email" . PHP_EOL;
		$headers .= "MIME-Version: 1.0" . PHP_EOL;
		$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
		$user_headers = "From: $manager_email" . PHP_EOL;
		$user_headers .= "Reply-To: $email" . PHP_EOL;
		$user_headers .= "MIME-Version: 1.0" . PHP_EOL;
		$user_headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$user_headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
		if (mail($manager_email, $e_subject, $msg, $headers) && mail($email, $e_subject, $user_msg, $user_headers)) {
			if ($post_type == "event") {
				//echo "<p>".esc_html__("An Email has been send to you with Event Registration Number", "vestige-core")."</p>";
			} else {
				//echo "<p>".esc_html__("An Email has been send to you with Exhibition Registration Number", "vestige-core")."</p>";
			}
		} else {
			echo '<div class="alert alert-error">ERROR!</div>';
		}
		die();
	}
	add_action('wp_ajax_nopriv_imic_contact_event_manager', 'imic_contact_event_manager');
	add_action('wp_ajax_imic_contact_event_manager', 'imic_contact_event_manager');
}


require_once VESTIGE_CORE__PLUGIN_PATH . 'shortcodes/shortcodes.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box/meta-box.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box-show-hide/meta-box-show-hide.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box-conditional-logic/meta-box-conditional-logic.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box-group/meta-box-group.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/mb-admin-columns/mb-admin-columns.php';
if (!class_exists('ReduxFramework')) {
    include_once VESTIGE_CORE__PLUGIN_PATH . 'imi-admin/theme-options/ReduxCore/framework.php';
}
if (is_admin()) {
    include_once VESTIGE_CORE__PLUGIN_PATH . 'imi-admin/admin.php';
}
//Meta Boxes
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/artist_picture_field.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/exhibition_meta.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/exhibition_tickets_clone_fields.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/extra_category_field.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/registrant_tickets_field.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/taxonomy_banner.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/term_color_picker.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/tickets_clone_fields.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/venue_address_field.php';
//Widgets
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/upcoming_events.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/selected_post.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/custom_category.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/upcoming_exhibitions.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/InstaGram/insta_gallery.php';
//Custom Post Types
$vestige_options = get_option('imic_options');
$event_switch = (isset($vestige_options['event_switch'])) ? $vestige_options['event_switch'] : '1';
require_once $path . '/custom-post-types/testimonial-type.php';
require_once $path . '/custom-post-types/gallery-type.php';
require_once $path . '/custom-post-types/exhibition-type.php';
if ($event_switch != '0') {
    require_once $path . '/custom-post-types/event-type.php';
}
require_once $path . '/custom-post-types/team-type.php';
require_once $path . '/custom-post-types/artwork-type.php';
