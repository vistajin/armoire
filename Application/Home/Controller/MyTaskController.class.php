<?php

namespace Home\Controller;

use Common\Controller\AuthController;

class MyTaskController extends AuthController {
	protected $PENDING_TASK = "待处理任务";
	protected $COMPLETED_TASK = "已完成任务";
	protected $STATUS_PENDING = "未完成";
	protected $STATUS_COMPLETED = "已完成";
	
	public function initMyTasksTree() {
		$treeMyTasks = array();		
		$treeMyTasks[0] = $this->buildTree($this->PENDING_TASK, $this->STATUS_PENDING, "noPendingTask", false);
		$treeMyTasks[1] = $this->buildTree($this->COMPLETED_TASK, $this->STATUS_COMPLETED, "noCompletedTask", true);
		$this->assign ( "treeMyTasks", json_encode ( $treeMyTasks ) );
		$this->assign ( "treeMyTasksHomePage", $treeMyTasks[0]["items"][0]["id"] );
	}

	private function buildTree($treeText, $status, $noId, $collapsed=true) {
		$viewOrderItemLink = "/armoire/Home/OrderItem/viewOrderItem/order_uid/";
		$treeItem = array();
		$treeItem["text"] = $treeText;
		$tasks = $this->getTasks ( $status );
		if ($tasks != null) {
			foreach ( $tasks as &$task ) {
				$task ["text"] = "订单".$task ["order_no"]."图纸".$task["item_no"];
				$task ["id"] = "myTasks".$task ["order_no"]."-".$task["item_no"];
				$task ["href"] = $viewOrderItemLink.$task ["order_uid"]."/item_uid/".$task ["item_uid"]."/fromTask/1";
			}
			$treeItem["items"] = $tasks;
			$treeItem["collapsed"] = $collapsed;
		} else {
			$treeItem["items"][0]["id"] = $noId;
			$treeItem["items"][0]["text"] = "无".$treeText;
			$treeItem["items"][0]["href"] = "/armoire/Home/MyTask/".$noId;
		}
		return $treeItem;
	}

	private function getTasks($status) {
		$m = M ( "OrderItemRemark as oir" );
		$join1 = "armoire_order_item as oi on oi.uid=oir.item_uid";
		$join2 = "armoire_order as o on o.uid=oir.order_uid";
		$field = "oir.order_uid, oir.item_uid, o.order_no, oi.item_no";
		$where = "assignee=%d and oir.status='".$status."'";
		if ($status == $this->STATUS_COMPLETED) {
			$where = $where . " and date_sub(curdate(), INTERVAL 60 DAY) <= date(o.create_time)";
		}
		$uid = session ( "user_auth" )["uid"];
		return $m->join ( $join1 )->join ( $join2 )->field ( $field )->where ( $where, $uid, $status )->order("order_no, item_no")->select ();
	}

	public function completeTask() {
		$m = M ( "OrderItemRemark" );
		$r = $m->where("uid=%d", $_POST ["uid"])->find();
//		$r["remark"] = $_POST ["remark"];
		$r ["status"] = $this->STATUS_COMPLETED;
		$r ["update_time"] = date ( "Y-m-d H:i:s", time () );
		$m->save($r);
		$this->display();
	}
}