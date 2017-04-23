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
function onp_sl_addon_bp_bulk_locking_way_state_class_098($wayStateClass, $options) {
	if($options['way'] == 'fullscreen-lock') {
		$wayStateClass = 'onp-sl-fullscreen-lock-state';
	}

	return $wayStateClass;
}

add_filter('onp_bp_bulk_locking_way_state_class', 'onp_sl_addon_bp_bulk_locking_way_state_class_098', 10, 2);

/**
 * Добавляет fullscreen-lock путь в список разрешенных для сохранения и очистки данных
 * @param $ways
 * @return array
 */
function onp_sl_addon_bp_bulk_locking_allow_save_ways_098($ways) {
	$ways[] = 'fullscreen-lock';
	return $ways;
}

add_filter('onp_bp_bulk_locking_allow_save_ways', 'onp_sl_addon_bp_bulk_locking_allow_save_ways_098');
add_filter('onp_bp_bulk_locking_allow_clear_ways', 'onp_sl_addon_bp_bulk_locking_allow_save_ways_098');

/**
 * Добавляет новую закладку в массов блокировщике
 * @param $defaultWay
 */
function onp_sl_addon_bp_bulk_locking_add_tab_before_098($defaultWay){
	?>
	<button data-target="#onp-sl-fullscreen-lock-options" type="button" class="btn btn-default value fullscreen-lock <?php if ( $defaultWay == 'fullscreen-lock') echo 'active'; ?>" data-name="fullscreen-lock">
		<i class="fa fa-arrows-alt" aria-hidden="true"></i><?php _e('Fullscreen Lock', 'bizpanda'); ?>
	</button>
<?php
}

add_action('onp_bp_bulk_locking_add_tab_before', 'onp_sl_addon_bp_bulk_locking_add_tab_before_098');

/**
 * Добавляет контент для закладки в fullscreen-lock в массовом блокировщике
 * @param $options
 * @param $defaultWay
 * @param $types
 */
function onp_sl_addon_bp_bulk_locking_add_tab_content_098($options, $defaultWay, $types) {

	$selectPosts = [];
	if( !empty($options) && !empty($options['select_posts']) ) {
		$selectPosts = $options['select_posts'];
		//$ruleStateClass .= ' onp-sl-select-post-ids-rule-state';
	}

	$excludePosts = '';
	if ( !empty($options) && !empty( $options['exclude_posts'] ) ) {
		$excludePosts = implode(', ', $options['exclude_posts']);
		//$ruleStateClass .= ' onp-sl-exclude-post-ids-rule-state';
	}

	$excludeCategories = '';
	if ( !empty($options) && !empty( $options['exclude_categories'] ) ) {
		$excludeCategories = implode(', ', $options['exclude_categories']);
		//$ruleStateClass .= ' onp-sl-exclude-categories-ids-rule-state';
	}

	$postTypes = '';
	if ( !empty($options) && !empty( $options['post_types'] ) ) {
		$postTypes = implode(', ', $options['post_types'] );
		//$ruleStateClass .= ' onp-sl-post-types-rule-state';
	}

	$checkedPostTypes = ['post', 'page'];
	if ( !empty($options) && !empty( $options['post_types'] ) ) {
		$checkedPostTypes = $options['post_types'];
	}

	?>
	<div id="onp-sl-fullscreen-lock-options" class="onp-sl-bulk-locking-options <?php if( $defaultWay !== 'fullscreen-lock' ) echo 'hide'; ?>">
		<div class="onp-sl-description">
			<?php //_e('Enter the number of paragraphs which will be visible for users at the beginning of your posts and which will be free from locking. The remaining paragraphs will be locked.', 'bizpanda') ?>
		</div>

		<div class="onp-sl-content">
			<div class="onp-sl-form">

				<div class="onp-sl-limits">
					<div class='onp-sl-exclude'>
						<div class='onp-sl-row'>
							<label><?php _e('Only selected Posts', 'bizpanda') ?></label>
							<select class="form-control onp-sl-select-lock-posts" multiple="multiple">
								<?php foreach($selectPosts as $selectPost): ?>
									<option value="<?= $selectPost; ?>" title="<?= get_the_title($selectPost); ?>" selected><?= $selectPost; ?></option>
								<?php endforeach; ?>
							</select>
							<div class="help-block">
								<?php _e('(Optional) Enter posts IDs comma separated, for example, "19,25,33".', 'bizpanda') ?>
							</div>
						</div>
						<div class='onp-sl-row'>
							<label><?php _e('Exclude Posts', 'bizpanda') ?></label>
							<select class="form-control onp-sl-exclude-posts onp-sl-search-posts-field" multiple="multiple">
								<?php foreach($excludePosts as $excludePostId): ?>
									<option value="<?= $excludePostId; ?>" title="<?= get_the_title($excludePostId); ?>" selected><?= $excludePostId; ?></option>
								<?php endforeach; ?>
							</select>
							<div class="help-block">
								<?php _e('(Optional) Enter posts IDs comma separated, for example, "19,25,33".', 'bizpanda') ?>
							</div>
						</div>
						<div class='onp-sl-row'>
							<label><?php _e('Exclude Categories', 'bizpanda') ?></label>
							<select class="form-control onp-sl-exclude-categories onp-sl-search-posts-cats" multiple="multiple">
								<?php foreach($excludeCategories as $excludeCatId): ?>
									<option value="<?= $excludeCatId; ?>" title="<?= get_the_title($excludeCatId); ?>" selected><?= $excludeCatId; ?></option>
								<?php endforeach; ?>
							</select>
							<div class="help-block">
								<?php _e('(Optional) Enter categories IDs comma separated, for example, "4,7".', 'bizpanda') ?>
							</div>
						</div>
					</div>

					<div class='onp-sl-post-types'>
						<strong><?php _e('Posts types to lock', 'bizpanda') ?></strong>
						<div class="help-block">
							<?php _e('Choose post types for batch locking.', 'bizpanda') ?>
						</div>
						<ul>
							<?php foreach($types as $type) {?>
								<li>
									<label for='onp-sl-post-type-<?php echo $type->name ?>-lock-skip'>
										<input type='checkbox' class='onp-sl-post-type onp-sl-<?php echo $type->name ?>' id='onp-sl-post-type-<?php echo $type->name ?>-lock-skip' value='<?php echo $type->name ?>' <?php if ( in_array($type->name, $checkedPostTypes ) ) { echo 'checked="checked"'; } ?> />
										<?php echo $type->label ?>
									</label>
								</li>
							<?php } ?>
						</ul>
						<div class="help-block help-block-error">
							<?php _e('Please choose at least one post type to lock. Otherwise, nothing to lock.', 'bizpanda') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}

add_action('onp_bp_bulk_locking_add_tab_content', 'onp_sl_addon_bp_bulk_locking_add_tab_content_098', 10, 3);
