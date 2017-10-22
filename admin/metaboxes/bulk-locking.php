<?php
	/**
	 * Добавлет новый способ блокировки в окно массового блокировщика
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 22.11.2016
	 * @version 1.0
	 */

	/**
	 * Переопределяет статический клас для визуальной подсказки
	 * @param $options
	 * @param $wayStateClass
	 * @return string
	 */
	function onp_bzda_popups_adn_bulk_locking_way_state_class($wayStateClass, $options)
	{
		if( isset($options['way']) && $options['way'] == 'fullscreen-lock' ) {
			$wayStateClass = 'onp-sl-fullscreen-lock-state';
		}
		
		return $wayStateClass;
	}

	add_filter('bizpanda_bulk_locking_way_state_class', 'onp_bzda_popups_adn_bulk_locking_way_state_class', 10, 2);

	/**
	 * Добавляет fullscreen-lock путь в список разрешенных для сохранения и очистки данных
	 * @param $ways
	 * @return array
	 */
	function onp_bzda_popups_adn_bulk_locking_allow_save_ways($ways)
	{
		$ways[] = 'fullscreen-lock';

		return $ways;
	}

	add_filter('bizpanda_bulk_locking_allow_save_ways', 'onp_bzda_popups_adn_bulk_locking_allow_save_ways');
	add_filter('bizpanda_bulk_locking_allow_clear_ways', 'onp_bzda_popups_adn_bulk_locking_allow_save_ways');

	/**
	 * Добавляет новую закладку в массов блокировщике
	 * @param $defaultWay
	 */
	function onp_bzda_popups_adn_bulk_locking_add_tab_before($defaultWay)
	{
		?>
		<button data-target="#onp-sl-fullscreen-lock-options" type="button" class="btn btn-default value fullscreen-lock <?php if( $defaultWay == 'fullscreen-lock' ) {
			echo 'active';
		} ?>" data-name="fullscreen-lock">
			<i class="fa fa-arrows-alt" aria-hidden="true"></i><?php _e('Fullscreen Lock', 'bizpanda-popups-addon'); ?>
		</button>
	<?php
	}

	add_action('bizpanda_bulk_locking_add_tab_before', 'onp_bzda_popups_adn_bulk_locking_add_tab_before');

	/**
	 * Добавляет контент для закладки в fullscreen-lock в массовом блокировщике
	 * @param $options
	 * @param $defaultWay
	 * @param $types
	 */
	function onp_bzda_popups_adn_bulk_locking_add_tab_content($options, $defaultWay, $types)
	{
		global $bizpanda_popups_addon;

		$selectPosts = array();
		if( !empty($options) && !empty($options['select_posts']) ) {
			$selectPosts = $options['select_posts'];
			//$ruleStateClass .= ' onp-sl-select-post-ids-rule-state';
		}

		$excludePosts = array();
		if( !empty($options) && !empty($options['exclude_posts']) ) {
			$excludePosts = implode(', ', $options['exclude_posts']);
			//$ruleStateClass .= ' onp-sl-exclude-post-ids-rule-state';
		}

		$excludeCategories = array();
		if( !empty($options) && !empty($options['exclude_categories']) ) {
			$excludeCategories = implode(', ', $options['exclude_categories']);
			//$ruleStateClass .= ' onp-sl-exclude-categories-ids-rule-state';
		}

		$postTypes = array();
		if( !empty($options) && !empty($options['post_types']) ) {
			$postTypes = implode(', ', $options['post_types']);
			//$ruleStateClass .= ' onp-sl-post-types-rule-state';
		}

		$checkedPostTypes = ['post', 'page'];
		if( !empty($options) && !empty($options['post_types']) ) {
			$checkedPostTypes = $options['post_types'];
		}

		$protectedSaveAttr = '';
		if( !$bizpanda_popups_addon->isPluginLoaded() ) {
			$protectedSaveAttr = ' disabled';
		}

		?>
		<div id="onp-sl-fullscreen-lock-options" class="onp-sl-bulk-locking-options <?php if( $defaultWay !== 'fullscreen-lock' ) {
			echo 'hide';
		} ?>">
			<div class="onp-sl-description">
				<?php _e('Every page will be full hidden under locker, with the background.', 'bizpanda-popups-addon') ?>
			</div>
			<div class="onp-sl-content">
				<div class="onp-sl-form">
					<div class='onp-sl-row' style="margin-bottom: 30px;">
						<label><?php _e('Only selected Posts', 'bizpanda-popups-addon') ?></label>
						<select class="form-control onp-sl-select-lock-posts" multiple="multiple"<?= $protectedSaveAttr ?>>
							<?php foreach($selectPosts as $selectPost): ?>
								<option value="<?= $selectPost; ?>" title="<?= get_the_title($selectPost); ?>" selected><?= $selectPost; ?></option>
							<?php endforeach; ?>
						</select>

						<div class="help-block">
							<?php _e('(Optional) Enter posts IDs comma separated, for example, "19,25,33".', 'bizpanda-popups-addon') ?>
						</div>
					</div>
					<div class="onp-sl-limits">
						<div class='onp-sl-exclude'>
							<div class='onp-sl-row'>
								<label><?php _e('Exclude Posts', 'bizpanda-popups-addon') ?></label>
								<select class="form-control onp-sl-exclude-posts onp-sl-search-posts-field" multiple="multiple"<?= $protectedSaveAttr ?>>
									<?php foreach($excludePosts as $excludePostId): ?>
										<option value="<?= $excludePostId; ?>" title="<?= get_the_title($excludePostId); ?>" selected><?= $excludePostId; ?></option>
									<?php endforeach; ?>
								</select>

								<div class="help-block">
									<?php _e('(Optional) Enter posts IDs comma separated, for example, "19,25,33".', 'bizpanda-popups-addon') ?>
								</div>
							</div>
							<div class='onp-sl-row'>
								<label><?php _e('Exclude Categories', 'bizpanda-popups-addon') ?></label>
								<select class="form-control onp-sl-exclude-categories onp-sl-search-posts-cats" multiple="multiple"<?= $protectedSaveAttr ?>>
									<?php foreach($excludeCategories as $excludeCatId): ?>
										<option value="<?= $excludeCatId; ?>" title="<?= get_the_title($excludeCatId); ?>" selected><?= $excludeCatId; ?></option>
									<?php endforeach; ?>
								</select>

								<div class="help-block">
									<?php _e('(Optional) Enter categories IDs comma separated, for example, "4,7".', 'bizpanda-popups-addon') ?>
								</div>
							</div>
						</div>
						<div class='onp-sl-post-types'>
							<strong><?php _e('Posts types to lock', 'bizpanda-popups-addon') ?></strong>

							<div class="help-block">
								<?php _e('Choose post types for batch locking.', 'bizpanda-popups-addon') ?>
							</div>
							<ul>
								<?php foreach($types as $type) { ?>
									<li>
										<label for='onp-sl-post-type-<?php echo $type->name ?>-lock-skip'>
											<input type='checkbox' class='onp-sl-post-type onp-sl-<?php echo $type->name ?>' id='onp-sl-post-type-<?php echo $type->name ?>-lock-skip' value='<?php echo $type->name ?>' <?php if( in_array($type->name, $checkedPostTypes) ) {
												echo 'checked="checked"';
											} ?><?= $protectedSaveAttr ?>/>
											<?php echo $type->label ?>
										</label>
									</li>
								<?php } ?>
							</ul>
							<div class="help-block help-block-error">
								<?php _e('Please choose at least one post type to lock. Otherwise, nothing to lock.', 'bizpanda-popups-addon') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	add_action('bizpanda_bulk_locking_add_tab_content', 'onp_bzda_popups_adn_bulk_locking_add_tab_content', 10, 3);

	function onp_bzda_popups_adn_bulk_locking_add_way_description()
	{
		?>
		<div class="onp-sl-way-description onp-sl-fullscreen-lock-content">
			<?php _e('Every page will be full hidden under locker, with the background.', 'bizpanda-popups-addon'); ?>
		</div>
	<?php
	}

	add_action('bizpanda_bulk_locking_add_way_description', 'onp_bzda_popups_adn_bulk_locking_add_way_description');
