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


</head>

<body>
	<div class="container">
		<div class="page-header" align="center" style="margin-top: 20px">
			<h4>
				<strong>用户列表</strong>
			</h4>
		</div>
	</div>
	<?php if(empty($list)): ?><div class="container">
		<div class="page-header" align="center" style="margin-top: 20px">
			<h4>***还没有用户***</h4>
		</div>
	</div>
	<?php else: ?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th align="center">序号</th>
					<th>真实姓名</th>
					<th>登录名称</th>
					<th>用户组别</th>
					<th>创建时间</th>
					<th>最后登录时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td align="center"><?php echo ($key+1); ?></td>
				<td><?php echo ($vo["display_name"]); ?></td>
				<td><?php echo ($vo["user_name"]); ?></td>
				<td><?php echo ($userGroupList[$vo[user_group]]); ?></td>
				<td><?php echo ($vo["create_time"]); ?></td>
				<td><?php echo ($vo["last_logon_time"]); ?></td>
				<td><a href="/armoire/index.php/Home/User/editUserIn/uid/<?php echo ($vo["uid"]); ?>" class="btn btn-info">&nbsp; <span
						class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;
				</a>
					<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="setUid(<?php echo ($vo["uid"]); ?>)">
						<span class="glyphicon glyphicon-remove"></span>
					</button></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div><?php endif; ?>
	<div class="container" align="center" style="margin-top: 0">
		<ul class="pagination nomargin"><?php echo ($page); ?>
		</ul>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">警告</h4>
				</div>
				<div class="modal-body">确定要删除该用户吗？</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-danger" onclick="deleteSeller()">确定删除</button>
				</div>
			</div>
		</div>
	</div>

	<form id="theform" method="post">
		<input type="hidden" id="uid" name="uid">
	</form>
</body>

<script>
function submitForm(url) {
    $("#theform").attr("action", url);
    $("#theform").submit();
}

function setUid(uid) {
    $("#uid").val(uid);
}

function deleteSeller() {
	submitForm("/armoire/index.php/Home/User/deleteUser");
}
</script>
</html>