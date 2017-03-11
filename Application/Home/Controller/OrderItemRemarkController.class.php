<?php

namespace Home\Controller;

use Common\Controller\AuthController;

class OrderItemRemarkController extends AuthController {
	public function addRemark() {
		$m = M ( "OrderItemRemark" );
		$data ["order_uid"] = $_POST ["order_uid"];
		$data ["item_uid"] = $_POST ["item_uid"];
		$data ["remark"] = $_POST ["remark"];
		$data ["assignee"] = intval ( $_POST ["assignee"] );
		$data ["create_time"] = date ( "Y-m-d H:i:s", time () );
		$data ["update_time"] = $data ["create_time"];
		$data ["user_uid"] = session ( "user_auth" )["uid"];
		$data ["status"] = "未完成";
		$m->add ( $data );
		$this->redirect ( "Home/OrderItem/viewOrderItem/order_uid/" . $_POST ["order_uid"] . "/item_uid/" . $_POST ["item_uid"] );
	}
	public function updateRemark() {
		$m = M ( "OrderItemRemark" );
		$r = $m->where("uid=%d", $_POST ["uid"])->find();
		$r["remark"] = $_POST ["remark"];
		$r ["assignee"] = intval ( $_POST ["assignee"] );
		$r ["update_time"] = date ( "Y-m-d H:i:s", time () );
		$m->save($r);
		$this->redirect ( "Home/OrderItem/viewOrderItem/order_uid/" . $r["order_uid"] . "/item_uid/" . $r ["item_uid"] );
	}
	
	public function deleteRemark() {
		$uid = $_POST ["uid"];
		
		$m = M ( "OrderItemRemark" );
		$result = $m->where ( "uid=%d", $uid )->delete ();
		if ($result === 1) {
			$this->redirect ( "Home/OrderItem/viewOrderItem/order_uid/" . $_POST ["order_uid"] . "/item_uid/" . $_POST ["item_uid"] );
		} else {
			$this->error ( "删除失败！" );
		}
	}
// 	public function viewOrderItem($order_uid, $item_uid) {
// 		self::getOrderItem ( $order_uid, $item_uid );
// 		self::getOrderItemRemarks ( $order_uid, $item_uid );
// 		$this->display ();
// 	}
// 	private function getOrderItem($order_uid, $item_uid) {
// 		$m = M ( "OrderItem as oi" );
// 		$join = "armoire_order as o on o.uid=oi.order_uid";
// 		$field = "oi.*, o.order_no";
// 		$where = "order_uid=%d and oi.uid=%d";
// 		$r = $m->join ( $join )->field ( $field )->where ( $where, $order_uid, $item_uid )->find ();
// 		$this->assign ( "record", $r );
// 	}
// 	private function getOrderItemRemarks($order_uid, $item_uid) {
// 		$m = $M ( "OrderItemRemark as oir" );
// 		$join = "armoire_user as u on u.uid=oir.assignee";
// 		$field = "oir.*, u.display_name as user_name";
// 		$where = "order_uid=%d and item_uid.uid=%d";
// 		$r = $m->join ( $join )->field ( $field )->where ( $where, $order_uid, $item_uid )->select ();
// 		$this->assign ( "remarkList", $r );
// 	}
}