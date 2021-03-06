<?php
/**
 * ブロックセッティングデータ migration
 *
 * @author Mitsuru Mutaguchi <mutaguchi@opensource-workshop.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BlockSettingMigration', 'Blocks.Config/Migration');
App::uses('BlockSettingBehavior', 'Blocks.Model/Behavior');

/**
 * ブロックセッティングデータ migration
 *
 * @author Mitsuru Mutaguchi <mutaguchi@opensource-workshop.jp>
 * @package NetCommons\Faqs\Config\Migration
 */
class FaqBlockSettingRecords extends BlockSettingMigration {

/**
 * プラグインキー
 *
 * @var string
 */
	const PLUGIN_KEY = 'faqs';

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'block_setting_records';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(),
		'down' => array(),
	);

/**
 * plugin data
 *
 * @var array $migration
 * @see BlockSettingMigration::updateAndDelete() recordsの注意点あり
 */
	public $records = array(
		'BlockSetting' => array(
			array(
				'plugin_key' => self::PLUGIN_KEY,
				'room_id' => null,
				'block_key' => null,
				'field_name' => BlockSettingBehavior::FIELD_USE_LIKE,
				'value' => '0',
				'type' => BlockSettingBehavior::TYPE_BOOLEAN,
			),
			array(
				'plugin_key' => self::PLUGIN_KEY,
				'room_id' => null,
				'block_key' => null,
				'field_name' => BlockSettingBehavior::FIELD_USE_UNLIKE,
				'value' => '0',
				'type' => BlockSettingBehavior::TYPE_BOOLEAN,
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return parent::updateAndDelete($direction, self::PLUGIN_KEY);
	}
}
