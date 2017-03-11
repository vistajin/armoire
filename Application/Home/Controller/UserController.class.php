<?php

namespace Home\Controller;

use Common\Controller\AuthController;

class UserController extends AuthController {
	public function userList() {
		self::getUserGroup ();
		
		$m = M ( "User" );
		$where = null;
		$Page = getpage ( $m, $where, C ( "LIST_PAGE_SIZE" ) );
	
		$limit = $Page->firstRow . ',' . $Page->listRows;
		$list = $m->where ( $where )->order ( "user_name" )->limit ( $limit )->select ();
		$this->assign ( "list", $list );
	
		$show = $Page->show ();
		$this->assign ( "page", $show );
		$this->display ();
	}
	public function addUserIn() {
		self::getUserGroup ();
		$this->display ();
	}
	private function getUserGroup() {
		$m = M ( "UserGroup" );
		$r = $m->select ();
		$ary = array ();
		foreach ( $r as $entry ) {
			$ary [$entry ["type"]] = $entry ["description"];
		}
		$this->assign ( "userGroupList", $ary );
	}
	public function addUser() {
		$m = M ( "User" );
		$r = $m->where ( "user_name='%s'", $_POST ["user_name"] )->find ();
		if ($r != null) {
			$this->error ( "用户".$_POST ["user_name"]."已存在！" );
		}

		$data ["user_name"] = $_POST ["user_name"];
		$data ["display_name"] = $_POST ["display_name"];
		$data ["user_password"] = md5 ( $_POST ["user_password"] );
		$data ["user_group"] = intval ( $_POST ["user_group"] );
		$data ["create_time"] = date ( "Y-m-d H:i:s", time () );
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );
		$m->add ( $data );
		$this->redirect ( "Home/User/userList" );
	}
	public function editUserIn($uid) {
		self::getUserGroup ();
		self::getUser ( $uid );
		$this->display ();
	}
	private function getUser($uid) {
		$m = M ( "User" );
		$r = $m->where ( "uid=%d", $uid )->find ();
		$this->assign ( "record", $r );
	}
	public function updateUser() {
		$m = M ( "User" );
		$data ["user_name"] = $_POST ["user_name"];
		$data ["display_name"] = $_POST ["display_name"];
		if ($_POST ["user_password"] != null) {
			$data ["user_password"] = md5 ( $_POST ["user_password"] );
		}
		$data ["user_group"] = intval ( $_POST ["user_group"] );
		$data ["update_time"] = date ( "Y-m-d H:i:s", time () );

		$m->where ( "uid=%d", $_POST ["uid"] )->save ( $data );
		$this->redirect ( "Home/User/userList" );
	}
	public function deleteUser() {
		$uid = $_POST ["uid"];
	
		$m = M ( "User" );
		$result = $m->where ( "uid=%d", $uid )->delete ();
		if ($result === 1) {
			$this->redirect ( "Home/user/userList" );
		} else {
			$this->error ( "删除失败！" );
		}
	}
}