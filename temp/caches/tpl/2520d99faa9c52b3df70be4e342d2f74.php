<?php exit;?>001479823305893711c9fd25c26d32b3d9c50f8c3c0es:6313:"a:2:{s:8:"template";s:6249:"<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="format-detection" content="telephone=no" />
		<meta charset="utf-8">
		<title>微筹订单</title>
		<!--字体图标库-->
		<link rel="stylesheet" href="<?php echo __TPL__;?>crowd/fonts/iconfont.css">
		<link rel="stylesheet" href="<?php echo __TPL__;?>crowd/css/swiper-3.2.5.min.css" />
		<!--主样式-->
		<link rel="stylesheet" href="<?php echo __TPL__;?>crowd/css/ectouch.css" />

	</head>

	<body>
		<div id="loading"><img src="<?php echo __TPL__;?>crowd/img/loading.gif" /></div>
		<div class="con m-b7">
			<div class="goods-info user-order of-hidden ect-tab j-ect-tab ts-3 p-t0">
				<nav class=" j-tab-title tab-title b-color-f of-hidden">
					<ul class="dis-box">
						<li class="box-flex <?php if($status == 1) { ?>active<?php } ?>">
							<a href="<?php echo U('user/crowd/order',array('status'=>''));?>">全部订单</a>
						</li>
						<li class="box-flex <?php if($status == 2) { ?>active<?php } ?>">
							<a href="<?php echo U('user/crowd/order',array('status'=>'2'));?>">待支付</a>
						</li>
						<li class="box-flex <?php if($status == 3) { ?>active<?php } ?>">
							<a href="<?php echo U('user/crowd/order',array('status'=>'3'));?>">待发货</a>
						</li>
						<li class="box-flex <?php if($status == 4) { ?>active<?php } ?>">
							<a href="<?php echo U('user/crowd/order',array('status'=>'4'));?>">待收货</a>
						</li>
						<li class="box-flex <?php if($status == 5) { ?>active<?php } ?>">
							<a href="<?php echo U('user/crowd/order',array('status'=>'5'));?>">已完结</a>
						</li>
					</ul>
				</nav>
				<div id="j-tab-con" class="tab-con">
					<div class="swiper-wrapper">
						<section class="swiper-slide store_info">

							<script id="j-product" type="text/html">
								<%if totalPage > 0 %>
								<%each list as order%>
								<section class="flow-checkout-pro m-top08">
									<header class="b-color-f dis-box padding-all">
										<span class=" box-flex">订单状态</span>
										<em class="j-goods-coupon t-first"><%order.order_status%></em>
									</header>
									<div class="product-list-small m-top1px b-color-f dis-box">
										<ul class="box-flex">
											<li>
												<div class="product-div">
													<a class="product-div-link" href="<%order.order_url%>"></a>
													<img class="product-list-img" src="<%order.title_img%>">
													<div class="product-text">
														<h4><%order.title%></h4>
														<h5 class="col-6 f-05 m-top02">支持<em class="color-red"><%#order.price%></em>元<em class="fr col-9 f-03"><em class="color-red"><!-- ×5 --></em></em></h5>
														<p class="col-7 f-03 m-top04 onelist-hidden">
															<%order.content%>
														</p>

													</div>

												</div>
											</li>
										</ul>
									</div>
									<footer class="padding-all b-color-f m-top1px of-hidden dis-box">
										<h4 class="t-remark2 box-flex"><label class="t-remark">合计：</label><span class="t-first"><%#order.total_fee%></span></h4>
										<p class="ect-button-more">
											<%if order.handler%>
											<%#order.handler%>
											<%else%>
											<a class="btn-default" href="<%order.order_url%>">查看订单</a>
											<%/if%>
										</p>
									</footer>
								</section>

								<%/each%>
								<% else %>
								<div class="no-div-message">
									<i class="iconfont icon-biaoqingleiben"></i>
									<p>亲，此处没有内容～！</p>
								</div>
								<% /if %>
							</script>

						</section>

					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="div-messages"></div>
		<!--悬浮菜单s-->
		<div class="filter-top" id="scrollUp">
			<i class="iconfont icon-jiantou"></i>
		</div>

		<footer class="footer-nav dis-box">
			<a href="<?php echo U('site/index/index');?>" class="box-flex nav-list">
				<i class="nav-box i-home"></i><span>首页</span>
			</a>
			<a href="<?php echo U('crowd_funding/index/index');?>" class="box-flex nav-list">
				<i class="nav-box i-zhongchou"></i><span>微筹广场</span>
			</a>
			<a href="<?php echo U('user/crowd/order');?>" class="box-flex position-rel nav-list active">
				<i class="nav-box i-zhongchou-order"></i><span>微筹订单</span>
			</a>

			<a href="<?php echo U('user/crowd/index');?>" class="box-flex nav-list">
				<i class="nav-box i-zhongchou_user"></i><span>微筹中心</span>
			</a>
		</footer>
		<!--悬浮菜单e-->
		<!--引用js-->
		<script type="text/javascript" src="<?php echo __TPL__;?>crowd/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo __TPL__;?>crowd/js/swiper-3.2.5.min.js"></script>
		<script type="text/javascript" src="<?php echo __TPL__;?>crowd/js/ectouch.js"></script>

		<!--异步引用js-->
		<script type="text/javascript" src="<?php echo __PUBLIC__;?>script/jquery.infinite.js"></script>
		<script type="text/javascript" src="<?php echo __PUBLIC__;?>script/template.js"></script>
		<script>
			/*切换*/
			/*var tabsSwiper = new Swiper('#j-tab-con', {
				speed: 100,
				noSwiping: true,
				autoHeight: true,
				onSlideChangeStart: function() {
					$(".j-tab-title .active").removeClass('active')
					$(".j-tab-title li").eq(tabsSwiper.activeIndex).addClass('active')
				}
			})
			$(".j-tab-title li").on('touchstart mousedown', function(e) {
				e.preventDefault()
				$(".j-tab-title .active").removeClass('active')
				$(this).addClass('active')
				tabsSwiper.slideTo($(this).index())
			})
			$(".j-tab-title li").click(function(e) {
				e.preventDefault()
			})*/

			//异步数据
			$(function() {
				var url = "<?php echo U('user/crowd/order', array('status'=>$status, 'page'=>$page));?>";
				$('.store_info').infinite({
					url: url,
					template: 'j-product'
				});
			})
		</script>
	</body>

</html>";s:12:"compile_time";i:1479736905;}";