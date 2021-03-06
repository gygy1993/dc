<?php
/**
 * 用户信息控制器
 * User: hgh
 * Date: 2015/10/9
 * Time: 9:16
 */

namespace Site\Common;

use Common\Controller\BaseController;
use Site\Model\MemberModel;
use Site\Model\ShopTableModel as ShopTable;
class MemberController extends BaseController {
	protected $_config = [
		'member_table_lifetime' => 3600,//用户桌号信息保存时间
		'cookie_prefix' => 'qulian_'
	];

	/**
	 * @var int 店铺ID
	 */
	protected $_shop_id;

	/**
	 * 初始化用户信息
	 */
	public function _init() {
		self::_assert($this->_shop_id and true);
		$hasHandled = false;
		$mid = I('get.mid');
		if(!empty($mid) && ctype_digit($mid)) {
			$member = MemberModel::instance()->memberInfo($mid, $this->_shop_id);
			if(!empty($member) and $member['shop_id'] == $this->_shop_id) {
				$hasHandled = true;
				cookie('mid', $mid, ['expire' => NOW_TIME + 31536000, 'prefix' => $this->_config['cookie_prefix']]);
				cookie('username', $member['username'], ['expire' => NOW_TIME + 31536000, 'prefix' => $this->_config['cookie_prefix']]);
				cookie('avatar', $member['avatar'], ['expire' => NOW_TIME + 31536000, 'prefix' => $this->_config['cookie_prefix']]);
			}
		}

		$time = I('get.time');
		if(!empty($time) && ctype_digit($time)) {
			if(NOW_TIME - $time < $this->_config['member_table_lifetime']) {
				$table = I('get.table');
				if (!empty($table) and ctype_digit($table)) {
					$hasHandled = true;
					$tid = intval($table);

					if ($tid) {
						$table = ShopTable::instance()->get($tid,$this->_shop_id);
						if ($table and $table['shop_id'] == $this->_shop_id) {
							cookie('table_id', $table['id'], ['expire' => intval($time) + $this->_config['member_table_lifetime'], 'prefix' => $this->_config['cookie_prefix']]);
							cookie('table_name', $table['name'], ['expire' => intval($time) + $this->_config['member_table_lifetime'], 'prefix' => $this->_config['cookie_prefix']]);
						}
					}
				}
			}
		}

		return $hasHandled;
	}

	/**
	 * @param int $shop_id
	 */
	public function setShopId($shop_id) {
		$this->_shop_id = $shop_id;
	}

	private function _assert($condition, $error = null) {
		if (APP_DEBUG and $condition === false) {
			$error = $error ? $error : 'Assert failed.';
			E($error);
		}
	}
}