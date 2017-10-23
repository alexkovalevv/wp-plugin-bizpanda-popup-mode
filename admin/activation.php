<?php
	/**
	 * Contains functions, hooks and classes required for activating the plugin.
	 *
	 * @author Webcraftic <wordpress.webraftic@gmail.com>
	 * @copyright (c) 2017, OnePress Ltd
	 *
	 * @since 1.0.0
	 * @package bizpand-popups-addon
	 */

	/**
	 * The activator class performing all the required actions on activation.
	 *
	 * @see Factory000_Activator
	 * @since 1.0.0
	 */
	class BZDA_POPUPS_ADN_Activation extends Factory000_Activator {

		/**
		 * Runs activation actions.
		 *
		 * @since 1.0.1
		 */
		public function activate()
		{
			$this->setupLicense();

			// Redirect to help page
			factory_000_set_lazy_redirect(opanda_get_admin_url('how-to-use', array('opanda_page' => 'bizpanda-popups-addon')));
		}

		/**
		 * Setups the license.
		 *
		 * @since 1.0.0
		 */
		protected function setupLicense()
		{
			$this->plugin->license->setDefaultLicense(array(
				'Category' => 'free',
				'Build' => 'premium',
				'Title' => 'OnePress Zero License',
				'Description' => __('Please, activate the plugin to get started. Enter a key
                                    you received with the plugin into the form below.', 'plugin-sociallocker')
			));
		}
	}

	$bizpanda_popups_addon->registerActivation('BZDA_POPUPS_ADN_Activation');

