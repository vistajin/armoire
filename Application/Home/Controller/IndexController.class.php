<?php
namespace Home\Controller;
use Common\Controller\AuthController;

// 继承了AuthController，需要登陆才能访问
class IndexController extends AuthController {
	public function index(){
		// ======== 我的任务 ========
		$myTask = A("MyTask");
		$myTask->initMyTasksTree();

		// ======== 最近订单========
		$orderItem = A("OrderItem");
		$orderItem->buildTree("date_sub(curdate(), INTERVAL 1 MONTH) <= date(`create_time`)", "order_1_month", "近1月订单");
		$orderItem->buildTree("date_sub(curdate(), INTERVAL 2 MONTH) <= date(`create_time`) and date_sub(curdate(), INTERVAL 1 MONTH) > date(`create_time`)", "order_2_month", "近2月订单");
		$orderItem->buildTree("date_sub(curdate(), INTERVAL 3 MONTH) <= date(`create_time`) and date_sub(curdate(), INTERVAL 2 MONTH) > date(`create_time`)", "order_3_month", "近3月订单");
		$orderItem->buildTree("date_sub(curdate(), INTERVAL 6 MONTH) <= date(`create_time`) and date_sub(curdate(), INTERVAL 3 MONTH) > date(`create_time`)", "order_6_month", "近6月订单");
		//$orderItem->buildTree("date_sub(curdate(), INTERVAL 12 MONTH) <= date(`create_time`) and date_sub(curdate(), INTERVAL 6 MONTH) > date(`create_time`)", "order_12_month", "近1年订单");

		$this->display ();
	}

}