<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/armoire/Public/images/band.jpg" rel="shortcut icon">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/armoire/Public/bootstrap/css/bootstrap.css?v=201611195">
<link rel="stylesheet" href="/armoire/Public/css/my-admin.css?v=20161031">

<!-- Optional theme -->
<link rel="stylesheet" href="/armoire/Public/bootstrap/css/bootstrap-theme.min.css">

<!-- jquery must before bootstrap js -->
<script src="/armoire/Public/jquery/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="/armoire/Public/bootstrap/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="/armoire/Public/bootstrap-select/js/bootstrap-select.min.css"> -->
<!-- <script src="/armoire/Public/bootstrap-select/js/bootstrap-select.min.js"></script> -->


<meta name="description" content="衣柜专业定制系统" />
<meta name="author" content="Vista JIN" />
<meta name="keywords" CONTENT="衣柜专业定制系统" />
<title>优艺家具管理系统</title>
</head>

<body>
	<div class="container" style="margin-left: 20px">
		<div class="page-header">
			<h4>
				<strong>添加用户</strong>
			</h4>
		</div>
		<form action="/armoire/Home/User/addUser" method="post">
			<div class="form-group">
				<label for="display_name">真实姓名</label> 
				<input type="text" class="form-control" style="width: 300px" name="display_name" id="display_name"
					placeholder="请输入用户真实姓名">
			</div>
			<div class="form-group">
				<label for="user_name">登录名称</label> 
				<input type="text" class="form-control" style="width: 300px" name="user_name" id="user_name"
					placeholder="请输入用户登录名称">
			</div>			
			<div class="form-group">
				<label for="name">初始密码</label> 
				<input type="password" class="form-control" style="width: 300px" name="user_password" id="user_password"
					placeholder="请输入初始密码">
			</div>
			<div class="form-group">
				<label for="user_group">用户组别</label> 
				<select class="form-control" required style="width: 300px"
					name="user_group" id="user_group">
					<option value="">请选择</option>
					<?php if(is_array($userGroupList)): $i = 0; $__LIST__ = $userGroupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div align="center">
				<button type="submit" class="btn btn-info">确定</button>
			</div>
		</form>
		<br />
		<br />
	</div>
</body>
<script>
$(document).ready(function() {
	$("#user_password").val("");
});
</script>
</html>