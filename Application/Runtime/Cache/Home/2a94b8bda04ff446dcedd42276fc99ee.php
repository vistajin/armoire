<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link href="/armoire/Public/images/band.jpg" rel="shortcut icon">
<title>优艺家具管理系统</title>
<link href="/armoire/Public/bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="/armoire/Public/bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="/armoire/Public/bui/assets/css/main-min.css" rel="stylesheet" type="text/css" />
<script src="/armoire/Public/bui/assets/js/jquery-1.8.1.min.js"></script>
<script src="/armoire/Public/bui/assets/js/bui-min.js"></script>
<script src="/armoire/Public/bui/assets/js/common/main-min.js"></script>
<script src="/armoire/Public/bui/assets/js/config-min.js"></script>
</head>
<body>
	<div class="header">
		<div class="dl-title">
			<span class="lp-title-port">优艺家具管理系统</span>
		</div>
		<div class="dl-log">
			<?php echo (date('Y年m月d日',(isset($data["time"]) && ($data["time"] !== ""))?($data["time"]):time())); ?> 欢迎您，<span class="dl-log-user"><?php echo ($_SESSION['user_auth']['display_name']); ?></span>
			<a href="/armoire/Home/Login/logout" title="退出系统" class="dl-log-quit">[退出]</a>
		</div>
	</div>
	<div class="content">
		<div class="dl-main-nav">
			<div class="dl-inform">
				<div class="dl-inform-title">
					<s class="dl-inform-icon dl-up"></s>
				</div>
			</div>
			<ul id="J_Nav" class="nav-list ks-clear">
				<li class="nav-item dl-selected">
					<div class="nav-item-inner nav-sample">我的任务</div>
				</li>				

				<li class="nav-item">
					<div class="nav-item-inner nav-order">近1月订单</div>
				</li>
				
				<li class="nav-item">
					<div class="nav-item-inner nav-order">近2月订单</div>
				</li>
				
				<li class="nav-item">
					<div class="nav-item-inner nav-order">近3月订单</div>
				</li>
				
				<li class="nav-item">
					<div class="nav-item-inner nav-order">近半年订单</div>
				</li>
								
<!--				<li class="nav-item">-->
<!--					<div class="nav-item-inner nav-register">订单查找</div>-->
<!--				</li>-->
				
				<?php if($_SESSION['user_auth']['user_group']== 1): ?><li class="nav-item">
						<div class="nav-item-inner nav-supplier">用户管理</div>
					</li><?php endif; ?>
				
			</ul>
		</div>

		<ul id="J_NavContent" class="dl-tab-content"></ul>
	</div>
	
	<script>
		BUI.use('common/main', function() {
			var config = [ {
				id : 'treeMyTasks',
				homePage : '<?php echo ($treeMyTasksHomePage); ?>',
				menu : <?php echo ($treeMyTasks); ?>
			},{
				id : 'order_1_month',
				homePage: '<?php echo ($order_1_monthHomePage); ?>',
				menu : <?php echo ($order_1_month); ?>
			},{
				id : 'order_2_month',
				homePage: '<?php echo ($order_2_monthHomePage); ?>',
				menu : <?php echo ($order_2_month); ?>
			},{
				id : 'order_3_month',
				homePage: '<?php echo ($order_3_monthHomePage); ?>',
				menu : <?php echo ($order_3_month); ?>
			},{
				id : 'order_6_month',
				homePage: '<?php echo ($order_6_monthHomePage); ?>',
				menu : <?php echo ($order_6_month); ?>
			},{
				id : 'user_maintain',
				homePage: 'userList',
				menu : [ {
					text : '用户管理',
					items : [
					  {
						id : 'userList',
						text : '用户列表',
						href : '/armoire/Home/User/userList'
					  },{
						id : 'addUser',
						text : '添加用户',
						href : '/armoire/Home/User/addUserIn'
					  }
					]
				}]
			}];
			new PageUtil.MainPage({
				modulesConfig : config
			});
		});
	</script>
</body>
</html>