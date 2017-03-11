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
			<h4><strong>编辑用户</strong></strong></h4>
		</div>
		<form action="/armoire/Home/User/updateUser" method="post" autocomplete="off">
			<input type="hidden" name="uid" value="<?php echo ($record["uid"]); ?>">
			<div class="form-group">
				<label for="display_name">真实姓名</label> 
				<input type="text" class="form-control" style="width: 300px" name="display_name" id="display_name"
					value="<?php echo ($record["display_name"]); ?>">
			</div>
			<div class="form-group">
				<label for="user_name">登录名称</label> 
				<input type="text" class="form-control" style="width: 300px" name="user_name" id="user_name"
					value="<?php echo ($record["user_name"]); ?>">
			</div>
			<div class="form-group">
				<label for="user_password">修改密码</label>
				<input type="checkbox" id="changePassword">
				<input type="password" class="form-control" style="width: 300px" name="user_password" id="user_password"
					disabled>
			</div>
			<div class="form-group">
				<label for="user_group">用户组别</label> 
				<select class="form-control" required style="width: 300px"
					name="user_group" id="user_group">
					<option value="">请选择</option>
					<?php if(is_array($userGroupList)): $i = 0; $__LIST__ = $userGroupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == $record['user_group']): ?><option value="<?php echo ($key); ?>" selected><?php echo ($vo); ?></option>
					<?php else: ?>
					<option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div align="center">
				<button type="submit" class="btn btn-info">确定</button>
				<button type="button" class="btn btn-default" onclick="history.go(-1)">取消</button>
			</div>
		</form>
		<br/><br/>
	</div>
</body>
<script>
var changePasswordEnabled = true;
$("#changePassword").click(function() {
	changePasswordEnabled = !changePasswordEnabled;
	$("#user_password").attr("disabled",changePasswordEnabled);	
});
</script>
</html>