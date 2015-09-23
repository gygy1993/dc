<?php
namespace Admin\Model;
use Common\Model\BaseModel;

class OrderModel extends BaseModel {
    /**
     * @var string ������
     */
    protected $_table = 'order';

    /**
     * @var string ������Ʒ��
     */
    protected $_table_order_goods = 'order_goods';

    /**
     * �����б�
     * @param int $shop_id
     * @return array
     */
    public function orderList($shop_id) {
        $M = M($this->_table);
        return $M->where(['shop_id' => $shop_id])->select();
    }

    /**
     * ��������
     * @param int $order_id
     * @return array
     */
    public function orderGoodsList($order_id) {
        $condition = ['a.order_id' => $order_id];
        $model = M($this->_table_order_goods)->alias('a');
        $data = $model->join('__GOODS__ b on a.goods_id = b.id')
            ->field([
                'a.goods_id',
                'a.price' => 'order_goods_price',
                'a.number',
                'a.mark',
                'b.name'
            ])->where($condition)->select();
        return $data;
    }

}