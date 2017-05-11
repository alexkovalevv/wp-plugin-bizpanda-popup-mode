<?php
	/**
	 * Returns CSS generating rules for the Download theme.
	 *
	 * @see OnpSL_ThemeManager::getRulesToGenerateCSS
	 *
	 * @since 3.3.3
	 * @return mixed[]
	 */
	function bizpanda_get_download_theme_css_rules()
	{
		$cssRulesPath = dirname(__FILE__) . '/css-rules';
		$cssRules = array();

		$general = require($cssRulesPath . '/general.php');
		$socialButtons = require($cssRulesPath . '/social-buttons.php');
		$actionButtons = require($cssRulesPath . '/action-buttons.php');
		$stepToStep = require($cssRulesPath . '/step-to-step.php');

		$cssRules = array_merge($general, $socialButtons, $actionButtons, $stepToStep);

		return $cssRules;
	}
