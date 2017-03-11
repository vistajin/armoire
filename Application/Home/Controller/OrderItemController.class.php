<?php

namespace Home\Controller;

use Common\Controller\AuthController;

class OrderItemController extends AuthController {
	public function buildTree($where, $key, $text) {
		$viewOrderItemLink = "/armoire/Home/OrderItem/viewOrderItem/order_uid/";
		$m = M ( "Order as o" );
		$field = "o.uid, o.order_no";
		$firstLvls = $m->where ( $where )->field ( $field )->order ( "order_no" )->select ();

		if ($firstLvls != null) {
			$m2 = M ( "OrderItem" );
			foreach ( $firstLvls as &$firstLvl ) {
				$firstLvl ["text"] = "订单".$firstLvl ["order_no"];
				$secondLvls = $m2->where ( "order_uid=%d", $firstLvl ["uid"] )->field("item_no,uid")->order ( "item_no" )->select ();
				if ($secondLvls != null) {
					foreach ( $secondLvls as &$secondLvl) {
						$secondLvl["id"] = "orderItem".$secondLvl["item_no"];
						$secondLvl["text"] = "图纸：".$secondLvl["item_no"];
						$secondLvl["href"] = $viewOrderItemLink.$firstLvl ["uid"]."/item_uid/".$secondLvl ["uid"];
					}
				} else {
					$secondLvls[0]["id"] = "noItem".$secondLvl["item_no"];
					$secondLvls[0]["text"] = "<<无图纸>>";
					$secondLvls[0]["href"] = $viewOrderItemLink.$firstLvl ["uid"];
				}
				$firstLvl ["items"] = $secondLvls;
			}
		} else {
			$firstLvls[0]["text"] = $text;
			$firstLvls[0]["items"][0]["id"] = "noRecord".$key;
			$firstLvls[0]["items"][0]["text"] = "无记录";
			$firstLvls[0]["items"][0]["href"] = "/armoire/Home/OrderItem/noOrder";
		}
		$this->assign ( $key."HomePage", $firstLvls[0]["items"][0]["id"] );
		if (session ( "user_auth" )["user_group"] <= 2) { // admin or client support and add order
			$addOrderMenu = array();
			$addOrderMenu["text"] = "订单管理";
			$addOrderMenu["items"][0]["id"] = "addOrderIn";
			$addOrderMenu["items"][0]["text"] = "添加订单";
			$addOrderMenu["items"][0]["href"] = "/armoire/Home/Order/addOrderIn";
			array_unshift($firstLvls, $addOrderMenu);
		}
		$this->assign ( $key, json_encode ( $firstLvls ) );
	}

	public function addOrderItemIn($order_uid) {
		$m = M ( "Order" );
		$order = $m->where ( "uid='%s'", $order_uid )->find ();
		$this->assign ( "order", $order );

		$m = M ( "OrderItem" );
		$r = $m->where ( "order_uid=%d", $order_uid )->select ();
		$this->assign ( "orderItemList", $r );

		$this->display ();
	}
	public function addOrderItem() {
		$m = M ( "OrderItem" );
		$r = $m->where ( "order_uid=%d", $_POST ["order_uid"])->field("max(item_no) as item_no")->find ();
		if ($r == null) {
			$item_no = 0;
		} else {
			$item_no = $r["item_no"] + 1;
		}

		$info = upload ();
		if ($info [0] == true) {
			foreach ( $info [1] as $file ) {
				$data ["order_uid"] = $_POST ["order_uid"];
				$data ["item_no"] = $item_no;
				$data ["photo_url"] = $file ["savepath"] . $file ["savename"];
				$data ["description"] = $_POST ["description"];
				$data ["create_time"] = date ( "Y-m-d H:i:s", time () );
				$data ["update_time"] = $data ["create_time"];
				$data ["user_uid"] = session ( "user_auth" )["uid"];
				$data ["status"] = "未完成";
				$m->add ( $data );
			}
			$this->redirect ( "Home/Order/refreshTop" );
		} else {
			$this->error ( $info [1] );
		}
	}
	public function deleteOrderItem() {
		$uid = $_POST ["uid"];

		$m = M ( "OrderItem" );
		// TODO: also delete remark
		$result = $m->where ( "uid=%d", $uid )->delete ();
		if ($result === 1) {
			$this->redirect ( "Home/Order/viewOrder/uid/" . $_POST ["order_uid"] );
		} else {
			$this->error ( "删除失败！" );
		}
	}
	public function viewOrderItem($order_uid, $item_uid = null, $fromTask = null) {
		$m = M ( "Order" );
		$r = $m->where ( "uid=%d", $order_uid )->find ();
		$this->assign ( "recordOrder", $r );

		if ($item_uid != null) {
			self::getOrderItem ( $order_uid, $item_uid );
			self::getOrderItemRemarks ( $order_uid, $item_uid );
		}

		self::getUsers();
		self::getStatusList ();
		$this->assign("fromTask", $fromTask);
		$this->display ();
	}
	private function getOrderItem($order_uid, $item_uid) {
		$m = M ( "OrderItem as oi" );
		$join = "armoire_order as o on o.uid=oi.order_uid";
		$field = "oi.*, o.order_no";
		$where = "order_uid=%d and oi.uid=%d";
		$r = $m->join ( $join )->field ( $field )->where ( $where, $order_uid, $item_uid )->find ();
		$this->assign ( "record", $r );
	}
	private function getOrderItemRemarks($order_uid, $item_uid) {
		$m = M ( "OrderItemRemark as oir" );
		$join = "armoire_user as u on u.uid=oir.assignee";
		$field = "oir.*, u.display_name as user_name";
		//		if (session ( "user_auth" )["user_group"] == 1) {
		$where = "order_uid=%d and item_uid=%d";
		$r = $m->join ( $join )->field ( $field )->where ( $where, $order_uid, $item_uid )->select ();
		//		} else {
		//			$where = "order_uid=%d and item_uid=%d and assignee=%d";
		//			$r = $m->join ( $join )->field ( $field )->where ( $where, $order_uid, $item_uid, session ( "user_auth" )["uid"] )->select ();
		//		}

		$this->assign ( "remarkList", $r );
	}
	private function getStatusList() {
		$status = array ();
		$status ["未完成"] = "未完成";
		$status ["已完成"] = "已完成";
		$this->assign ( "statusList", $status );
	}
	// TODO: common it
	private function getUsers() {
		$m = M ( "User" );
		$r = $m->field ( "uid, display_name" )->order("display_name")->select ();
		$list = array ();
		foreach ( $r as $v ) {
			$list [$v ["uid"]] = $v ["display_name"];
		}
		$this->assign("userList", $list);
	}

	public function updateOrderItem() {
		$uid = $_POST["uid"];
		$m = M ( "OrderItem" );

		// 更新图纸除图片的字段
		$data ["description"] = $_POST ["description"];
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );
		$data ["user_uid"] = session ( "user_auth" )["uid"];
		//$data ["status"] = "未完成"; //状态暂时不利用不修改

		// 看是否更新图片
		if ($_FILES ["photo"] ["name"] != "") {
			$info = upload ();
			if ($info [0] == true) {
				foreach ( $info [1] as $file ) {						
					$data ["photo_url"] = $file ["savepath"] . $file ["savename"];
				}
				// 删除之前旧的图片
				$r = $m->where ( "uid=%d", $uid )->find();
				unlink($_SERVER['DOCUMENT_ROOT'].__ROOT__."/Uploads/".$r["photo_url"]);
			} else {
				$this->error ( $info [1] );
			}
		}
		$m->where ( "uid = %d", $uid )->save ( $data );
		$this->redirect ( "Home/Order/refreshCurrent" );
	}
}