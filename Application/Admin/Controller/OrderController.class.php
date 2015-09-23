<?php
namespace Admin\Controller;
use Common\Controller\VerifyController;

use Admin\Model\OrderModel;
class OrderController extends VerifyController {
    /**
     * @var int ƽ̨ID
     */
    protected $platform_id;

    /**
     * @var int ����ID
     */
    protected $shop_id;

    public function _before_order() {
        $this->shop_id = $this->user->getShopId();
    }

    public function index(){
        $this->display();
    }

    /**
     * �̼ҹ���ƽ̨ -> ��ǰ����
     */
    public function order() {
        $data = OrderModel::instance()->orderList($this->shop_id);
        $this->assign('data',$data);
        $this->display();
    }

}