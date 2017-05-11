<?php
	/**
	 * Returns editable options for the Glasscase theme.
	 *
	 * @see OnpSL_ThemeManager::getEditableOptions
	 *
	 * @since 3.3.3
	 * @return mixed[]
	 */
	function bizpanda_get_glasscase_theme_editable_options()
	{

		$editableOptionsPath = dirname(__FILE__) . '/editable-options';
		$editableOptions = array();

		$editableOptions[] = require($editableOptionsPath . '/general.php');
		$editableOptions[] = require($editableOptionsPath . '/social-buttons.php');
		$editableOptions[] = require($editableOptionsPath . '/action-buttons.php');
		$editableOptions[] = require($editableOptionsPath . '/step-to-step.php');

		return $editableOptions;
	}