<?php

namespace Home\Controller;

use Common\Controller\AuthController;

class OrderTableController extends AuthController {
	public function addOrderIn() {
		$this->display ();
	}
	public function addOrder() {
		$m = M ( "Order" );
		$r = $m->where ( "order_no='%s'", $_POST ["order_no"] )->find ();
		if ($r != null) {
			$this->error ( "订单编号：" . $_POST ["order_no"] . "已存在！" );
		}
		
		$data ["order_no"] = $_POST ["order_no"];
		$data ["order_date"] = $_POST ["order_date"];
		$data ["due_date"] = $_POST ["due_date"];
		$data ["description"] = $_POST ["description"];
		$data ["create_time"] = date ( "Y-m-d H:i:s", time () );
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );
		$data ["user_uid"] = session ( "user_auth" )["uid"];
		$data ["status"] = "未完成";
		$m->add ( $data );
		$this->redirect ( "Home/Order/orderList" );
	}
	public function orderList() {
		$m = M ( "Order as o" );
		$where = null;
		$join = "armoire_user as u on u.uid=o.user_uid";
		$field = "o.*, u.display_name";
		$Page = getpage ( $m, $where, C ( "LIST_PAGE_SIZE" ) );
		
		$limit = $Page->firstRow . ',' . $Page->listRows;
		$msglist = $m->join ( $join )->where ( $where )->field ( $field )->order ( "order_date" )->limit ( $limit )->select ();
		$this->assign ( "list", $msglist );
		
		$show = $Page->show ();
		$this->assign ( "page", $show );
		$this->display ();
	}
	public function editOrderIn($uid) {
		self::getStatusList ();
		self::getOrder ( $uid );
		$this->display ();
	}
	private function getStatusList() {
		$status = array ();
		$status ["未完成"] = "未完成";
		$status ["已完成"] = "已完成";
		$this->assign ( "statusList", $status );
	}
	private function getOrder($uid) {
		$m = M ( "Order" );
		$r = $m->where ( "uid=%d", $uid )->find ();
		$this->assign ( "record", $r );
	}
	public function updateOrder() {
		$uid = $_POST ["uid"];
		$m = M ( "Order" );
		$r = $m->where ( "uid<>%d and order_no='%s'", $uid, $_POST ["order_no"] )->find ();
		if ($r != null) {
			$this->error ( "订单编号：" . $_POST ["order_no"] . "已存在！" );
		}
		
		$data ["order_no"] = $_POST ["order_no"];
		$data ["order_date"] = $_POST ["order_date"];
		$data ["due_date"] = $_POST ["due_date"];
		$data ["description"] = $_POST ["description"];
		$data ["create_time"] = date ( "Y-m-d H:i:s", time () );
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );
		$data ["user_uid"] = session ( "user_auth" )["uid"];
		$data ["status"] = $_POST ["status"];
		$m->where ( "uid=%d", $_POST ["uid"] )->save ( $data );
		$this->redirect ( "Home/Order/orderList" );
	}
	public function deleteOrder() {
		$uid = $_POST ["uid"];
		
		$m = M ( "Order" );
		// TODO: also delete item & remark
		$result = $m->where ( "uid=%d", $uid )->delete ();
		if ($result === 1) {
			$this->redirect ( "Home/Order/orderList" );
		} else {
			$this->error ( "删除失败！" );
		}
	}
	public function viewOrder($uid) {
		self::getOrder ( $uid );
		self::getOrderItems ( $uid );
		$this->display ();
	}
	private function getOrderItems($uid) {
		$m = M ( "OrderItem" );
		$r = $m->where ( "order_uid=%d", $uid )->select ();
		$this->assign ( "orderItemList", $r );
	}
}