<?php
namespace Admin\Model;
use Common\Model\BaseModel;

class OrderModel extends BaseModel {
    /**
     * @var string ������
     */
    protected $_table = "order";

    /**
     * �����б�
     * @param int $shop_id
     * @return array
     */
    public function orderList($shop_id) {

    }
}