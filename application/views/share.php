<!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>分享财富---我是中国首富</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<meta name="format-detection" content="telephone=no">
	<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/main.js"></script>
	<script src="<?=base_url()?>js/jquery-1.10.0.js"></script>
	<!-- bootstrap插件 -->
	<link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
	<script src="<?=base_url()?>js/bootstrap.min.js"></script>
	<link href="<?=base_url()?>css/companystyle.css" rel="stylesheet">

<style>
.indfocusbox { clear:both; width:100%; height:160px; position:relative; overflow:hidden; margin:0 auto; }
.indfocusbox img { width:100%; height:160px; }
.indfocusbox .thumbbox { position:absolute; font-size:12px; bottom:3px; right:5px; }
.indfocusbox .thumbbox span { color:#fff; width:5px; height:5px; display:inline-block; border-radius:4px; margin-right:5px; background-color:#000; }
.indfocusbox .thumbbox span.cur {background-color:#fff;}
</style>
<style>
#articleintro img{
	width:100%;
}
img{
	width:100%;
}
</style>
<style type="text/css">
#mess_share{margin:15px 0; display: block}
#share_1{float:left;width:49%; display: block}
#share_2{float:right;width:49%; display: block}
#mess_share img{width:22px;height:22px;vertical-align: top;border: 0;}
.button1{font-size:18px;padding:10px 0;border:1px solid #5a5a59;color:#ffffff;background-color:#0e9e1a;background-image:linear-gradient(to top, #02a038, #02a138 18%, #02c244);box-shadow: 0 1px 1px rgba(7, 56, 28, 0.61), 0 1px 1px rgba(255, 255, 255, 0.51) inset;text-shadow: 0.5px 0.5px 1px rgba(15, 114, 57, 0.75);}
.button1:active{background-color: #007e2b;background-image: linear-gradient(to top, #016423, #007629 24%, #00a137);}
.button2{font-size:16px;padding:8px 0;border:1px solid #adadab;color:#000000;background-color: #e8e8e8;background-image: linear-gradient(to top, #dbdbdb, #f4f4f4);box-shadow: 0 1px 1px rgba(0, 0, 0, 0.45), inset 0 1px 1px #efefef; text-shadow: 0.5px 0.5px 1px #fff;text-align:center;border-radius:3px;width:100%;}
.button2:active{background-color: #dedede;background-image: linear-gradient(to top, #cacaca, #e0e0e0);}
#mcover{ position: fixed;	top:0;	left:0;	width:100%;	height:100%;background:rgba(0, 0, 0, 0.7);	display:none;z-index:20000;}
#mcover img {position: fixed;right: 18px;top:5px;width: 260px;height: 180px;z-index:20001;}
</style>
</head>

<body screen_capture_injected="true">
<div class="indfocusbox" id="indfocusbox">
					<ul class="imgs" style="list-style: none; transition: 300ms; -webkit-transition: 300ms;">
							<li style=""><a href="javascript:;"><img src="<?=base_url()?>images/alibaba.jpg"></a></li>					
					</ul>
														
</div>
<div style="width:100%;height:3px;"></div>
<div class="main">
	<div class="p_mod p_seller_info">
		<a href="javascript:;">
		<?php if($my_userid):?>
			<h1 style="text-align:center;">亲，中国首富</h1>
		<?php else:?>
			<h1 style="text-align:center;"><?php echo $truename;?>,中国首富</h1>
		<?php endif;?>
			
		</a>
	</div>
	<div class="p_mod p_seller_info">
		<a href="javascript:;" style="text-align:center;">
			<h5>你出售了<?=$sale?>股份</h5>
		</a>
	</div>
	<div class="p_mod p_seller_info">
		<a href="javascript:;" style="text-align:center;"> 
			套现：<?=$sale_check?>
		</a>
	</div>
	<div class="p_mod p_seller_info">
		<a href="javascript:;" style="text-align:center;"> 
			点击<?=$times?>次
		</a>
	</div>
	<div id="mcover" onclick="document.getElementById('mcover').style.display='';" style=""><img src="<?=base_url()?>images/tishi.png"></div>
	<div style="margin:0px auto;text-align:center;margin:10px 10px;">
		<?php if($my_userid):?>
		<button type="button" onclick="document.getElementById('mcover').style.display='block';" class="btn btn-success btn-lg btn-block">分享给朋友</button>
		<?php else:?>
		<button type="button" onclick="window.location.href='<?=site_url("richest")?>'" class="btn btn-success btn-lg btn-block">我也要参加</button>
		<?php endif;?>
	</div>
	<div class="p_mod">
		<h2 class="p_mod_title">使用说明</h2>
		<ul>
			
			<li class="p_phone">
				<a href="">
					<strong>NO1：</strong>
					<font>只有出售股份才可以获取人民币</font>
				</a>
			</li>
			<li class="p_phone">
				<a href="">
					<strong>NO2：</strong>
					<font>出售股份越多兑换人民币越多</font>
				</a>
			</li>
			<li class="p_phone">
				<a href="">
					<strong>NO3：</strong>
					<font>想成为中国首富就开动你的手指</font>
				</a>
			</li>
		</ul>
	</div>
	<style type="text/css">
		.bottom_css{
			margin: 0px auto;
			margin: 10px 10px;
			font-size: 10px;
			color:#999;
			text-align: center;
		}
	</style>
	<div class="bottom_css">纯属娱乐，如有雷同，纯属巧合<br>预祝阿里巴巴上市成功<br>@腾信通</div>
	</div>

</body></html>