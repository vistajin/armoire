<?php

namespace Common\Controller;

use Think\Controller;

class AdminAuthController extends AuthController {
	protected function _initialize() {
		// 获取当前用户ID
		$userAuth = session ( "user_auth" );
		if ($userAuth == false) {
			$this->error ( "您尚未登录！正在跳转到登录页面", U ( "Login/index" ) );
		}
		
		$user_group = $userAuth["user_group"];

		if(($user_group == 1)) {
			return true;
		} else {
			$this->error ( "没有权限访问本页面!", U ( "Login/index" ) );
		}
	}
}