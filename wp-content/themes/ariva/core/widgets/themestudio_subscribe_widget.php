<?php
/**
 * @author James Lafferty
 * @since 0.1
 */

class Themestudio_subcribe_widget extends WP_Widget {
	private $default_failure_message;
	private $default_loader_graphic = '/wp-content/plugins/mailchimp-widget/images/ajax-loader.gif';
	private $default_signup_text;
	private $default_success_message;
	private $default_title;
	private $successful_signup = false;
	private $subscribe_errors;
	private $ns_mc_plugin;

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */
	public function Themestudio_subcribe_widget () {
		$this->default_failure_message = __('There was a problem processing your submission.','themestudio');
		$this->default_phone_text = '+84 0123 456 789';
		$this->default_website_text = 'http://www.themestudio.net';
		$this->default_success_message = __('Thank you for joining our mailing list. Please check your email for a confirmation link.','themestudio');
		$this->default_title = __('SUBSCIRBE','themestudio');
		$widget_options = array('classname' => 'widget_ns_mailchimp', 'description' => __( "Displays a sign-up form for a MailChimp mailing list.", 'mailchimp-widget'));
		$this->WP_Widget('Themestudio_subcribe_widget', __('Themestudio SUBSCIRBE', 'mailchimp-widget'), $widget_options);
		$this->ns_mc_plugin = NS_MC_Plugin::get_instance();
		$this->default_loader_graphic = site_url(). $this->default_loader_graphic;
		add_action('init', array(&$this, 'add_scripts'));
		add_action('parse_request', array(&$this, 'process_submission'));
	}

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */

	public function add_scripts () {
		wp_enqueue_script('ns-mc-widget', site_url(). '/wp-content/plugins/mailchimp-widget/js/mailchimp-widget-min.js', array('jquery'), false);
	}

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */
	public function form ($instance) {
		$mcapi = $this->ns_mc_plugin->get_mcapi();
		if (false == $mcapi) {
			echo $this->ns_mc_plugin->get_admin_notices();
		} else {
			$this->lists = $mcapi->lists();
			$defaults = array(
				'failure_message' => $this->default_failure_message,
				'title' => $this->default_title,
				'phone_text' => $this->default_phone_text,
				'website_text' => $this->default_website_text,
				'success_message' => $this->default_success_message,
				'collect_first' => false,
				'collect_last' => false,
				'old_markup' => false
			);
			$vars = wp_parse_args($instance, $defaults);
			extract($vars);
			?>
					<h3><?php echo  __('General Settings', 'mailchimp-widget'); ?></h3>
					<p>
						<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo  __('Title :', 'mailchimp-widget'); ?></label>
						<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('current_mailing_list'); ?>"><?php echo __('Select a Mailing List :', 'mailchimp-widget'); ?></label>
						<select class="widefat" id="<?php echo $this->get_field_id('current_mailing_list');?>" name="<?php echo $this->get_field_name('current_mailing_list'); ?>">
			<?php
			foreach ($this->lists['data'] as $key => $value) {
				$selected = (isset($current_mailing_list) && $current_mailing_list == $value['id']) ? ' selected="selected" ' : '';
				?>
						<option <?php echo $selected; ?>value="<?php echo $value['id']; ?>"><?php echo __($value['name'], 'mailchimp-widget'); ?></option>
				<?php
			}
			?>
						</select>
					</p>
					<p><strong>N.B.</strong><?php echo  __('This is the list your users will be signing up for in your sidebar.', 'mailchimp-widget'); ?></p>

					<p>
						<label for="<?php echo $this->get_field_id('phone_text'); ?>"><?php echo __('Number phone :', 'mailchimp-widget'); ?></label>
						<input class="widefat" id="<?php echo $this->get_field_id('phone_text'); ?>" name="<?php echo $this->get_field_name('phone_text'); ?>" value="<?php echo $phone_text; ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('website_text'); ?>"><?php echo __('Your website :', 'mailchimp-widget'); ?></label>
						<input class="widefat" id="<?php echo $this->get_field_id('website_text'); ?>" name="<?php echo $this->get_field_name('website_text'); ?>" value="<?php echo $website_text; ?>" />
					</p>
					<h3><?php echo __('Notifications', 'mailchimp-widget'); ?></h3>
					<p><?php echo  __('Use these fields to customize what your visitors see after they submit the form', 'mailchimp-widget'); ?></p>
					<p>
						<label for="<?php echo $this->get_field_id('success_message'); ?>"><?php echo __('Success :', 'mailchimp-widget'); ?></label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('success_message'); ?>" name="<?php echo $this->get_field_name('success_message'); ?>"><?php echo $success_message; ?></textarea>
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('failure_message'); ?>"><?php echo __('Failure :', 'mailchimp-widget'); ?></label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('failure_message'); ?>" name="<?php echo $this->get_field_name('failure_message'); ?>"><?php echo $failure_message; ?></textarea>
					</p>
			<?php

		}
	}

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */

	public function process_submission () {

		if (isset($_GET[$this->id_base . '_email'])) {

			header("Content-Type: application/json");

			//Assume the worst.
			$response = '';
			$result = array('success' => false, 'error' => $this->get_failure_message($_GET['ns_mc_number']));

			$merge_vars = array();

			if (! is_email($_GET[$this->id_base . '_email'])) { //Use WordPress's built-in is_email function to validate input.

				$response = json_encode($result); //If it's not a valid email address, just encode the defaults.

			} else {

				$mcapi = $this->ns_mc_plugin->get_mcapi();

				if (false == $this->ns_mc_plugin) {

					$response = json_encode($result);

				} else {

					if (isset($_GET[$this->id_base . '_first_name']) && is_string($_GET[$this->id_base . '_first_name'])) {

						$merge_vars['FNAME'] = $_GET[$this->id_base . '_first_name'];

					}

					if (isset($_GET[$this->id_base . '_last_name']) && is_string($_GET[$this->id_base . '_last_name'])) {

						$merge_vars['LNAME'] = $_GET[$this->id_base . '_last_name'];

					}

					$subscribed = $mcapi->listSubscribe($this->get_current_mailing_list_id($_GET['ns_mc_number']), $_GET[$this->id_base . '_email'], $merge_vars);

					if (false == $subscribed) {

						$response = json_encode($result);

					} else {

						$result['success'] = true;
						$result['error'] = '';
						$result['success_message'] =  $this->get_success_message($_GET['ns_mc_number']);
						$response = json_encode($result);

					}

				}

			}

			exit($response);

		} elseif (isset($_POST[$this->id_base . '_email'])) {

			$this->subscribe_errors = '<div class="error">'  . $this->get_failure_message($_POST['ns_mc_number']) .  '</div>';

			if (! is_email($_POST[$this->id_base . '_email'])) {

				return false;

			}

			$mcapi = $this->ns_mc_plugin->get_mcapi();

			if (false == $mcapi) {

				return false;

			}

			if (is_string($_POST[$this->id_base . '_first_name'])  && '' != $_POST[$this->id_base . '_first_name']) {

				$merge_vars['FNAME'] = strip_tags($_POST[$this->id_base . '_first_name']);

			}

			if (is_string($_POST[$this->id_base . '_last_name']) && '' != $_POST[$this->id_base . '_last_name']) {

				$merge_vars['LNAME'] = strip_tags($_POST[$this->id_base . '_last_name']);

			}

			$subscribed = $mcapi->listSubscribe($this->get_current_mailing_list_id($_POST['ns_mc_number']), $_POST[$this->id_base . '_email'], $merge_vars);

			if (false == $subscribed) {

				return false;

			} else {

				$this->subscribe_errors = '';

				setcookie($this->id_base . '-' . $this->number, $this->hash_mailing_list_id(), time() + 31556926);

				$this->successful_signup = true;

				$this->signup_success_message = '<p>' . $this->get_success_message($_POST['ns_mc_number']) . '</p>';

				return true;

			}

		}

	}

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */

	public function update ($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['collect_first'] = ! empty($new_instance['collect_first']);

		$instance['collect_last'] = ! empty($new_instance['collect_last']);

		$instance['current_mailing_list'] = esc_attr($new_instance['current_mailing_list']);

		$instance['failure_message'] = esc_attr($new_instance['failure_message']);

		$instance['phone_text'] = esc_attr($new_instance['phone_text']);

		$instance['website_text'] = esc_attr($new_instance['website_text']);

		$instance['success_message'] = esc_attr($new_instance['success_message']);

		$instance['title'] = esc_attr($new_instance['title']);

		return $instance;

	}

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */

	public function widget ($args, $instance) {

		extract($args);
	 	$title = $instance['title'];
		$phone_text=$instance['phone_text'];
		$website_text=$instance['website_text'];
		if ((isset($_COOKIE[$this->id_base . '-' . $this->number]) && $this->hash_mailing_list_id($this->number) == $_COOKIE[$this->id_base . '-' . $this->number]) || false == $this->ns_mc_plugin->get_mcapi()) {
			?>
			<div class="ts-subscibe">
				<div class="top-info">
	    	        <span><?php echo $phone_text ;?></span>
		            <span><a href="<?php echo esc_url($website_text);?>" target="_blank"><?php echo $website_text; ?></a></span>
				</div>
			</div>

		<?php
		} else {

			echo $before_widget;

			if ($this->successful_signup) {
				echo $this->signup_success_message;
			} else {
				?>
			<div class="ts-subscibe">
	            <h3><?php echo $title ;?></h3>
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="<?php echo $this->id_base . '_form-' . $this->number; ?>" method="post">
					<?php echo $this->subscribe_errors;?>
					<?php
						if ($instance['collect_first']) {
					?>
					<label><?php echo __('First Name :', 'mailchimp-widget'); ?><input type="text" name="<?php echo $this->id_base . '_first_name'; ?>" /></label>
					<br />
					<?php
						}
						if ($instance['collect_last']) {
					?>
					<label><?php echo __('Last Name :', 'mailchimp-widget'); ?><input type="text" name="<?php echo $this->id_base . '_last_name'; ?>" /></label>
					<br />
					<?php
						}
					?>
						<input type="hidden" name="ns_mc_number" value="<?php echo $this->number; ?>" />
						<input id="<?php echo $this->id_base; ?>-email-<?php echo $this->number; ?>" type="text" name="<?php echo $this->id_base; ?>_email"  placeholder="your email + enter" />
					</form>
						<script>jQuery('#<?php echo $this->id_base; ?>_form-<?php echo $this->number; ?>').ns_mc_widget({"url" : "<?php echo $_SERVER['PHP_SELF']; ?>", "cookie_id" : "<?php echo $this->id_base; ?>-<?php echo $this->number; ?>", "cookie_value" : "<?php echo $this->hash_mailing_list_id(); ?>", "loader_graphic" : "<?php echo $this->default_loader_graphic; ?>"}); </script>

				        <div class="top-info">
				            <span><?php echo $phone_text ;?></span>
				            <span><a href="<?php echo esc_url($website_text);?>" target="_blank"><?php echo $website_text; ?></a></span>
						</div>
	        </div>
				<?php
			}
			echo $after_widget;
		}

	}

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */

	private function hash_mailing_list_id () {

		$options = get_option($this->option_name);

		$hash = md5($options[$this->number]['current_mailing_list']);

		return $hash;

	}

	/**
	 * @author James Lafferty
	 * @since 0.1
	 */

	private function get_current_mailing_list_id ($number = null) {

		$options = get_option($this->option_name);

		return $options[$number]['current_mailing_list'];

	}

	/**
	 * @author James Lafferty
	 * @since 0.5
	 */

	private function get_failure_message ($number = null) {

		$options = get_option($this->option_name);

		return $options[$number]['failure_message'];

	}

	/**
	 * @author James Lafferty
	 * @since 0.5
	 */

	private function get_success_message ($number = null) {

		$options = get_option($this->option_name);

		return $options[$number]['success_message'];

	}
}
?>
