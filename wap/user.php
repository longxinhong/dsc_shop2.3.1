<?php
//dezend by  QQ:2172298892
function show_user_center()
{
	$best_goods = get_recommend_goods('best');

	if (0 < count($best_goods)) {
		foreach ($best_goods as $key => $best_data) {
			$best_goods[$key]['shop_price'] = encode_output($best_data['shop_price']);
			$best_goods[$key]['name'] = encode_output($best_data['name']);
		}
	}

	$GLOBALS['smarty']->assign('best_goods', $best_goods);
	$GLOBALS['smarty']->display('user.wml');
}

define('IN_ECS', true);
require dirname(__FILE__) . '/includes/init.php';
$act = (!empty($_GET['act']) ? $_GET['act'] : 'login');
$smarty->assign('footer', get_footer());

if ($act == 'do_login') {
	$user_name = (!empty($_POST['username']) ? $_POST['username'] : '');
	$pwd = (!empty($_POST['pwd']) ? $_POST['pwd'] : '');
	if (empty($user_name) || empty($pwd)) {
		$login_faild = 1;
	}
	else if (0 < $user->check_user($user_name, $pwd)) {
		$user->set_session($user_name);
		show_user_center();
	}
	else {
		$login_faild = 1;
	}

	if (!empty($login_faild)) {
		$smarty->assign('login_faild', 1);
		$smarty->display('login.wml');
	}
}
else if ($act == 'order_list') {
	$record_count = $db->getOne('SELECT COUNT(*) FROM ' . $ecs->table('order_info') . ' WHERE user_id = ' . $_SESSION['user_id']);

	if (0 < $record_count) {
		include_once ROOT_PATH . 'includes/lib_transaction.php';
		$page_num = '10';
		$page = (!empty($_GET['page']) ? intval($_GET['page']) : 1);
		$pages = ceil($record_count / $page_num);

		if ($page <= 0) {
			$page = 1;
		}

		if ($pages == 0) {
			$pages = 1;
		}

		if ($pages < $page) {
			$page = $pages;
		}

		$pagebar = get_wap_pager($record_count, $page_num, $page, 'user.php?act=order_list', 'page');
		$smarty->assign('pagebar', $pagebar);
		$_LANG['os'][OS_UNCONFIRMED] = '未确认';
		$_LANG['os'][OS_CONFIRMED] = '已确认';
		$_LANG['os'][OS_CANCELED] = '已取消';
		$_LANG['os'][OS_INVALID] = '无效';
		$_LANG['os'][OS_RETURNED] = '退货';
		$_LANG['ss'][SS_UNSHIPPED] = '未发货';
		$_LANG['ss'][SS_SHIPPED] = '已发货';
		$_LANG['ss'][SS_RECEIVED] = '收货确认';
		$_LANG['ps'][PS_UNPAYED] = '未付款';
		$_LANG['ps'][PS_PAYING] = '付款中';
		$_LANG['ps'][PS_PAYED] = '已付款';
		$_LANG['confirm_cancel'] = '您确认要取消该订单吗？取消后此订单将视为无效订单';
		$_LANG['cancel'] = '取消订单';
		$orders = get_user_orders($_SESSION['user_id'], $page_num, $page_num * ($page - 1));

		if (!empty($orders)) {
			foreach ($orders as $key => $val) {
				$orders[$key]['total_fee'] = encode_output($val['total_fee']);
			}
		}

		$smarty->assign('orders', $orders);
	}

	$smarty->display('order_list.wml');
}
else if (0 < $_SESSION['user_id']) {
	show_user_center();
}
else {
	$smarty->display('login.wml');
}

?>