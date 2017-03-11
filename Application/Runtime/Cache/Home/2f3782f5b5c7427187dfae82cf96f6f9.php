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
<link href="/armoire/Public/fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="/armoire/Public/fileinput-master/js/fileinput.js"></script>
<link href="/armoire/Public/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script charset="utf-8" src="/armoire/Public/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script charset="utf-8" src="/armoire/Public/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
</head>

<body>
	<div class="container" style="margin-left: 2px; width: 100%">
		<h5 class="page-header"><strong>订单 - <?php echo ($recordOrder["order_no"]); ?></strong></h5>
		<div class="row">
			<div class="col-md-2"><label>订单编号</label></div>
			<div class="col-md-4"><span><?php echo ($recordOrder["order_no"]); ?></span></div>
			<div class="col-md-2"><label for="status">订单状态</label></div>
			<div class="col-md-4"><?php echo ($recordOrder["status"]); ?></div>
		</div>
		<div class="row">
			<div class="col-md-2"><label for="order_date">订单日期</label></div>
			<div class="col-md-4"><?php echo ($recordOrder["order_date"]); ?></div>
			<div class="col-md-2"><label for="due_date">交货日期</label></div>
			<div class="col-md-4"><?php echo ($recordOrder["due_date"]); ?></div>
		</div>
		<div class="row">
			<div class="col-md-2"><label for="order_date">创建时间</label></div>
			<div class="col-md-4"><?php echo ($recordOrder["create_time"]); ?></div>
			<div class="col-md-2"><label for="due_date">更新时间</label></div>
			<div class="col-md-4"><?php echo ($recordOrder["update_time"]); ?></div>
		</div>
		<div class="row">
			<div class="col-md-2"><label>订单详情</label></div>
			<div class="col-md-10"><?php echo ($recordOrder["description"]); ?></div>
		</div>
		<?php if($_SESSION['user_auth']['user_group']< 3 and $fromTask != 1): ?><div class="row">
				<div class="col-md-12" align="right">
					<button class="btn btn-info" data-toggle="modal" data-target="#myModalAddOrderItem" title="添加图纸">
						<span>添加图纸</span>
					</button>
					<button class="btn btn-info" data-toggle="modal" data-target="#myModalEditOrder" title="编辑订单">
						<span>编辑订单</span>
					</button>
					<button class="btn btn-danger" data-toggle="modal" data-target="#myModalDeleteOrder" title="删除订单">
						<span>删除订单</span>
					</button>
				</div>
			</div><?php endif; ?>
		

		<?php if($record == null): ?><div align="center">***暂无图纸***</div>
		<?php else: ?>
		<h5 class="page-header"><strong>图纸 - <?php echo ($record["item_no"]); ?></strong></h5>
		<img class="carousel-inner img-responsive" src="/armoire/Uploads/<?php echo ($record["photo_url"]); ?>" >
		<div class="row" style="padding-top: 15px">
			<div class="col-md-2"><label>上传时间</label></div>
			<div class="col-md-4"><?php echo ($record["create_time"]); ?></div>
			<div class="col-md-2"><label>更新时间</label></div>
			<div class="col-md-4"><?php echo ($record["update_time"]); ?></div>
		</div>
		<div class="row">
			<div class="col-md-2" style="margin-bottom: 10px"><label>图纸说明</label></div>
			<div class="col-md-10"><?php echo ($record["description"]); ?></div>
		</div>
		<?php if($_SESSION['user_auth']['user_group']< 3 and $fromTask != 1): ?><div class="row">
				<div class="col-md-12" align="right">
					<button class="btn btn-info" data-toggle="modal" data-target="#myModalEditOrderItem" title="编辑图纸">
						<span>编辑图纸</span>
					</button>
				</div>
			</div><br><?php endif; ?>
		
		<div class="panel panel-default" style="margin-bottom: 0">
			<div class="panel-heading" style="padding-top: 5px; padding-bottom: 22px">
				<span class="pull-left"><strong>工作任务</strong></span>
				<span class="pull-right">
					<?php if($_SESSION['user_auth']['user_group']< 4 and $fromTask != 1): ?><a href="javascript:togglePostRemarkArea()">指派任务</a><?php endif; ?>
				</span>
			</div>
							
			<div class="panel-body"  style="padding: 0px">							
				<table class="table table-striped table-hover"  style="margin: 0;">
					<?php if($_SESSION['user_auth']['user_group']< 4 and $fromTask != 1): ?><thead id="postRemarkInputArea" style="display:none">
						<td style="border-bottom: 1px solid #ddd">
							<form class="inline-form" action="/armoire/Home/OrderItemRemark/addRemark" method="post">
								<input type="hidden" name="order_uid" id="order_uid" value="<?php echo ($record["order_uid"]); ?>" />
								<input type="hidden" name="item_uid" id="item_uid" value="<?php echo ($record["uid"]); ?>" />
								<div class="form-group" style="margin:0; margin-bottom:10px">
									<label for="remark" class="control-label">指派任务</label>
									<textarea class="form-control" name="remark"
										id="remark" placeholder="请输入任务内容" rows="5" required></textarea>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
									<select class="form-control" required style="width: 200px"
										name="assignee" id="assignee">
										<option value="">请选择负责人</option>
										<?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
								<div class="form-group col-md-6" align="right">
									<button type="submit" class="btn btn-info">提交任务</button>
									<button type="button" onclick="togglePostRemarkArea()" class="btn btn-default">取消</button>
								</div>
								</div>
							</form>
						</td>
					</thead><?php endif; ?>
					<?php if(empty($remarkList)): ?><tr><td><div align="center">***该图纸还没有工作任务***</div></td></tr>
					<?php else: ?>
					<?php if(is_array($remarkList)): $i = 0; $__LIST__ = $remarkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<?php if($key == 0): ?><td style="padding-top:12px;padding-bottom:12px;border-top: 0">
							<?php else: ?>
							<td style="padding-top:12px;padding-bottom:12px;"><?php endif; ?>
								<div style="margin-bottom:12px">									
									负责人：<?php echo ($vo["user_name"]); ?>
									<span class="pull-right graytext">
										<?php echo ($vo["update_time"]); ?>
									</span>
								</div>
								<span class="message-content">
									<?php $remark = $vo["remark"]; $remark = str_replace("<", "&lt;", $remark); $remark = str_replace(">", "&gt;", $remark); $remark = str_replace("\n", "<br>", $remark); echo $remark; ?>
								</span>
								<?php if($vo["status"] == '已完成'): ?><div style="margin-bottom:12px">
										<span class="pull-right">											
											<span class="glyphicon glyphicon-ok">已完成</span>
										</span>
									</div>
								<?php else: ?>
									<?php if($_SESSION['user_auth']['user_group']< 4 and $fromTask != 1): ?><div style="margin-bottom:12px">
											<span class="pull-right graytext">
												<button class="btn btn-info" data-toggle="modal" data-target="#myModalEditTask" onclick="setRemark(<?php echo ($vo["uid"]); ?>, '<?php echo ($vo["remark"]); ?>', '<?php echo ($vo["assignee"]); ?>')" title="修改任务">
													<span class="glyphicon glyphicon-pencil"></span>
												</button>
												<button class="btn btn-danger" data-toggle="modal" data-target="#myModalDeleteTask" onclick="setUid(<?php echo ($vo["uid"]); ?>)" title="删除任务">
													<span class="glyphicon glyphicon-remove"></span>
												</button>
											</span>
										</div>
									<?php else: ?>
										<?php if($vo["assignee"] == $_SESSION['user_auth']['uid']and $fromTask == 1): ?><div style="margin-bottom:12px">
											<span class="pull-right graytext">
												<button class="btn btn-info" data-toggle="modal" data-target="#myModalDone" onclick="setUid(<?php echo ($vo["uid"]); ?>)" title="点击完成任务">
													<span>确定完成</span>
												</button>
											</span>
										</div><?php endif; endif; endif; ?>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>								
			</div>
		</div><?php endif; ?>
		<br/>
<!--		<div align="center" style="margin-top:15px">-->
<!--			<button type="button" class="btn btn-default" onclick="history.go(-1)">返回</button>-->
<!--		</div>-->
	</div>
	
	<!-- 编辑订单 -->
	<div class="modal fade" id="myModalEditOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEditOrder" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabelEditOrder">编辑订单</h4>
				</div>
				<form class="inline-form" id="theformEditOrder" action="/armoire/Home/Order/updateOrder" method="post">
					<input type="hidden" name="uid" value="<?php echo ($recordOrder["uid"]); ?>">
					<div class="modal-body">
						<div class="form-group" style="margin:0; margin-bottom:10px">
							<label for="order_no">订单编号</label>
							<input type="text" class="form-control" name="order_no" id="order_no" required style="width: 230px;"
								value="<?php echo ($recordOrder["order_no"]); ?>">
						</div>
						<div class="form-group">
							<label for="order_date">订单日期</label>
							<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd"
								data-link-field="order_date" data-link-format="yyyy-mm-dd" style="width: 230px;">
								<input class="form-control" size="16" type="text" value="<?php echo ($recordOrder["order_date"]); ?>" readonly placeholder="请选择订单日期">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="order_date" name="order_date" value="<?php echo ($recordOrder["order_date"]); ?>" />
						</div>
						<div class="form-group">
							<label for="due_date">交货日期</label>
							<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd"
								data-link-field="due_date" data-link-format="yyyy-mm-dd" style="width: 230px;">
								<input class="form-control" size="16" type="text" value="<?php echo ($recordOrder["due_date"]); ?>" readonly placeholder="请选择交货日期">
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>
							<input type="hidden" id="due_date" name="due_date" value="<?php echo ($recordOrder["due_date"]); ?>"/>
						</div>
						<div class="form-group">
							<label for="status">订单状态</label> 
							<select class="form-control" required style="width: 230px"
								name="status" id="status">					
								<option value="">请选择</option>
								<?php if(is_array($statusList)): $i = 0; $__LIST__ = $statusList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == $recordOrder['status']): ?><option value="<?php echo ($key); ?>" selected><?php echo ($vo); ?></option>
								<?php else: ?>
								<option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="description">订单详情</label>
							<textarea id="editor_id" name="description" style="width: 100%; height: 60px;"><?php echo ($recordOrder["description"]); ?></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-info">确定</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- 添加图纸 -->
	<div class="modal fade" id="myModalAddOrderItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAddOrderItem" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabelAddOrderItem">添加图纸</h4>
				</div>
				<form class="inline-form" id="theformAddOrderItem" enctype="multipart/form-data" action="/armoire/Home/OrderItem/addOrderItem" method="post">
					<input type="hidden" name="order_uid" value="<?php echo ($recordOrder["uid"]); ?>">
					<input type="hidden" name="uid" value="<?php echo ($record["uid"]); ?>">
					<div class="modal-body">
						<div class="form-group">
							<label for="photo">图纸 (jpg, png, gif, jpeg)</label>
							<input name="photo" id="photo" class="file form-control" type="file" data-min-file-count="1">
						</div>
						<div class="form-group">
							<label for="description">图纸说明</label>
							<textarea id="editor_id" name="description" style="width: 100%; height: 60px;"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-info">确定</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- 删除订单 -->
	<div class="modal fade" id="myModalDeleteOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDeleteOrder" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabelDeleteOrder">警告</h4>
				</div>
				<div class="modal-body">删除订单将同时删除该订单下的所有图纸和任务，确定要删除该订单吗？</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-danger" onclick="deleteOrder()">确定删除</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- 编辑图纸 -->
	<div class="modal fade" id="myModalEditOrderItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEditOrderItem" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabelEditOrderItem">编辑图纸</h4>
				</div>
				<form class="inline-form" id="theformEditOrderItem" enctype="multipart/form-data" action="/armoire/Home/OrderItem/updateOrderItem" method="post">
					<input type="hidden" name="uid" value="<?php echo ($record["uid"]); ?>">
					<div class="modal-body">
						<div class="form-group">
							<label for="photo">图纸 (jpg, png, gif, jpeg)</label>
							<input name="photo" id="photo" class="file form-control" type="file" data-min-file-count="0">
						</div>
						<div class="form-group">
							<label for="description">图纸说明</label>
							<textarea id="editor_id" name="description" style="width: 100%; height: 60px;"><?php echo ($record["description"]); ?></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-info">确定</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- 编辑任务 -->
	<div class="modal fade" id="myModalEditTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabelEdit">修改任务</h4>
				</div>
				<form class="inline-form" id="theformEdit" action="/armoire/Home/OrderItemRemark/updateRemark" method="post">
					<div class="modal-body">
							<input type="hidden" name="uid" id="uid_edit" />
							<div class="form-group" style="margin:0; margin-bottom:10px">
								<label for="remark" class="control-label">任务内容</label>
								<textarea class="form-control" name="remark"
									id="remarkEdit" rows="5" required></textarea>
							</div>
							<div class="form-group">
								<select class="form-control" required style="width: 200px"
									name="assignee" id="assigneeEdit">
									<option value="">请选择负责人</option>
									<?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-info">确定</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- 完成任务 -->
	<div class="modal fade" id="myModalDone" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDone" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabelDone">确定</h4>
				</div>
				<div class="modal-body">您确定已完成该任务吗？</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">还没有</button>
					<button type="button" class="btn btn-info" onclick="completeTask()">已完成</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- 删除任务 -->
	<div class="modal fade" id="myModalDeleteTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDeleteTask" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabelDeleteTask">警告</h4>
				</div>
				<div class="modal-body">确定要删除该任务吗？</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-danger" onclick="deleteRemark()">确定删除</button>
				</div>
			</div>
		</div>
	</div>
	
	<form id="theform" method="post">
		<input type="hidden" id="uid" name="uid">
		<input type="hidden" id="item_uid" name="item_uid" value="<?php echo ($record["uid"]); ?>">
		<input type="hidden" id="order_uid" name="order_uid" value="<?php echo ($recordOrder["uid"]); ?>">
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

function deleteRemark() {
	submitForm("/armoire/Home/OrderItemRemark/deleteRemark");
}

function deleteOrder() {
	submitForm("/armoire/Home/Order/deleteOrder");
}

function completeTask() {
	submitForm("/armoire/Home/MyTask/completeTask");
}

function setRemark(uid, remark, userId) {
	$("#uid_edit").val(uid);
	$("#remarkEdit").val(remark);
	$("#assigneeEdit").val(userId);
}

var isPostRemarkAreaDisplay = false;
function togglePostRemarkArea() {
	if (isPostRemarkAreaDisplay == true) {
		$('#postRemarkInputArea').fadeOut();
		isPostRemarkAreaDisplay = false;
	} else {
		$('#postRemarkInputArea').fadeIn();
		isPostRemarkAreaDisplay = true;
	}
}
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

$("#photo").fileinput({
    'allowedFileExtensions' : ['jpg', 'png','gif', 'jpeg'],
});
</script>
</html>