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
<link rel="stylesheet" href="/armoire/Public/css/my-admin.css?v=20170224-3">

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
<link href="/armoire/Public/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script charset="utf-8" src="/armoire/Public/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script charset="utf-8" src="/armoire/Public/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
</head>

<body>
	<div class="container" style="margin-left: 2px; margin-top:10px">
<!--		<div class="page-header">-->
<!--			<h4><strong>添加订单</strong></h4>-->
<!--		</div>-->
		<form action="/armoire/Home/Order/addOrder" method="post">
			<div class="form-group">
				<label for="order_no">订单编号</label>
				<input type="text" class="form-control" name="order_no" id="order_no" required style="width: 230px;"
					placeholder="请输入订单编号">
			</div>
			<div class="form-group">
				<label for="order_date">订单日期</label>
				<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd"
					data-link-field="order_date" data-link-format="yyyy-mm-dd" style="width: 230px;">
					<input class="form-control" size="16" type="text" required readonly placeholder="请选择订单日期">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				</div>
				<input type="hidden" id="order_date" name="order_date" required/>
			</div>
			<div class="form-group">
				<label for="due_date">交货日期</label>
				<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd"
					data-link-field="due_date" data-link-format="yyyy-mm-dd" style="width: 230px;">
					<input class="form-control" size="16" type="text" required readonly placeholder="请选择交货日期">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				</div>
				<input type="hidden" id="due_date" name="due_date" required/>
			</div>
			<div class="form-group">
				<label for="description">订单详情</label>
				<textarea id="editor_id" name="description" style="width: 100%; height: 120px;"></textarea>
			</div>
			<div align="center">
				<button type="submit" class="btn btn-info">确定</button>
			</div>
		</form>
		<br/><br/>
	</div>

</body>
<script>
$('.form_date').datetimepicker({
    language:  'zh-CN',
    minView: "month", //选择日期后，不会再跳转去选择时分秒
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	forceParse: 1,
    showMeridian: 1
});
</script>
</html>