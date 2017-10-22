<?php

	/**
	 * License page is a place where a user can check updated and manage the license.
	 *
	 * @author Webcraftic <wordpress.webraftic@gmail.com>
	 * @copyright (c) 2017, OnePress Ltd
	 *
	 * @since 1.0.0
	 * @package bizpand-popups-addon
	 */
	class BZDA_POPUPS_ADN_LicenseManagerPage extends OnpLicensing000_LicenseManagerPage {

		public $purchasePrice = '$25';

		public $internal = true;

		public function configure()
		{
			$config['faq'] = false;
			$config['trial'] = false;
			$config['premium'] = false;
			$config['purchasePrice'] = false;

			if( onp_build('ultimate') ) {
				$config['faq'] = false;
				$config['trial'] = false;
				$config['premium'] = false;
				$config['purchasePrice'] = '$59';
			} else {
				$config['purchasePrice'] = '$25';
			}

			if( get_locale() == 'ru_RU' ) {
				$config['faq'] = false;
				$config['trial'] = false;
				$config['premium'] = false;
				$config['purchasePrice'] = '990р';
			}

			if( onp_build('free') ) {
				$config['menuPostType'] = OPANDA_POST_TYPE;
			} else {
				if( onp_license('free') ) {
					$config['menuTitle'] = __('Social Locker', 'plugin-sociallocker');
					$config['menuIcon'] = SOCIALLOCKER_URL . '/plugin/admin/assets/img/menu-icon.png';
				} else {
					$config['menuPostType'] = OPANDA_POST_TYPE;
				}
			}

			$config = apply_filters('onp_sl_license_manager_config', $config);

			foreach($config as $key => $configValue) {
				$this->$key = $configValue;
			}
		}
	}

	FactoryPages000::register($bizpanda_popups_addon, 'BZDA_POPUPS_ADN_LicenseManagerPage');
	/*@mix:place*/

