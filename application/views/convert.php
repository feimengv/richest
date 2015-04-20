<!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>兑换财富---我是中国首富</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<meta name="format-detection" content="telephone=no">
	<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/main.js"></script>
	<script src="<?=base_url()?>js/jquery-1.10.0.js"></script>
	<!-- bootstrap插件 -->
	<link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
	<script src="<?=base_url()?>js/bootstrap.min.js"></script>
	<link href="<?=base_url()?>css/info.css" rel="stylesheet">
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
</head>

<body screen_capture_injected="true">
<div style="width:100%;height:3px;"></div>
<div class="main">
	<div class="p_mod p_seller_info">
		<a href="javascript:;">
			<h1 style="text-align:center;">出售现有股份</h1>
		</a>
	</div>
	<div class="form-group">
    <input type="text" name="sale" id="sale" class="form-control" style="margin:10px 0px;border:0px;" value="0.01"  placeholder="请点击按钮出售股份" readonly>
    <input type="hidden" name="times" id="times"  value="1">
	</div>
	<div style="margin:0px auto;text-align:center;margin:10px 10px;">
		<button type="button" id="sale_button" class="btn btn-danger btn-lg btn-block" data-toggle="popover" data-placement="top" 
       data-delay="hide: 100">我要出售</button>
	</div>
	<div id="submit_my_sale" style="margin:0px auto;text-align:center;margin:10px 10px;display:none;">
		<button type="button" id="submit_sale" class="btn btn-default btn-lg btn-block">确认提交</button>
		<div class="bottom_css">不是每个人都能看到"确认提交"按钮，提交你的成绩吧！</div>
	</div>
	<div class="window" id="windowcenter">
	<div id="title" class="wtitle">排名信息<span class="close" id="alertclose"></span></div>
		<input type="hidden" id="action" name="action" value="update_sale">
		<div class="content">
		<div id="txt">填写真实的姓名</div>
		<p>
		<input name="truename" value="" class="px" id="truename" type="text" placeholder="请输入您的真实姓名">
		</p>
		<p>
		<input name="tel" class="px" id="tel" value="" type="text" placeholder="请输入您的电话(有机会获奖品)">
		</p>
		<input type="button" value="确 定" name="确 定" class="txtbtn" id="windowclosebutton">
		</div>
	</div>
<script type="text/javascript">
$(document).ready(function (){
	$("#sale_button").click(function(){
		var times = $("#times").val();
		times = parseInt(times)+1;
		$("#times").val(times);

		var sale = $("#sale").val();
		if(sale>=0.21 && sale<5.21)
		{
			var sale = toDecimal(parseFloat(sale)+1);
			$("#submit_my_sale").show();
		}else if(sale>=5.21 && sale<7)
		{
			var sale = toDecimal(parseFloat(sale)+0.01);
		}else if(sale>=7 && sale<10)
		{
			var sale = toDecimal(parseFloat(sale)+0.5);
		}
		else if(sale>=10 && sale<15){
			var sale = toDecimal(parseFloat(sale)+5);
		}else if(sale>=15)
		{
			var sale = toDecimal(parseFloat(sale)+8);
			$("#submit_my_sale").show();
		}
		else{
			var sale = toDecimal(parseFloat(sale)+0.01);
		}
		
		$("#sale").val(sale);
		// if(sale==0.03 || sale==0.04)
		// {
		// 	$("#sale_button").attr("data-content","朋友，你可以兑换3万元了");
		// 	$('#sale_button').popover();
		// }
		// if(sale==0.1 || sale==0.11)
		// {
		// 	$("#sale_button").attr("data-content","哇塞，你可以兑换10万元了");
		// 	$('#sale_button').popover('toggle');
		// }
		// if(sale==0.2 || sale==0.21)
		// {
		// 	$("#sale_button").attr("data-content","哇塞，你可以兑换20万元了，准备好了吗？加速了");
		// 	$('#sale_button').popover('toggle');	
		// }
		// if(sale==5.21 || sale==5.22)
		// {
		// 	$("#sale_button").attr("data-content","不错，你可以兑换52.1万元了，加油好吗？想当首富也需要付出很多的！");
		// 	$('#sale_button').popover('toggle');
		// }
		// if(sale==10 || sale==15)
		// {
		// 	$("#sale_button").attr("data-content","马云：'今天很残酷，明天更残酷，后天很美好，但大部分人都死在明天晚上，看不到后天的太阳！' 你就是看到太阳的那个人！继续加油");
		// 	$('#sale_button').popover('toggle');
		// }
	});
		$("#windowclosebutton").bind("click",
				function() {
					var btn = $(this);
					var action = $("#action").val();
	                var sale = $("#sale").val();
	                var truename = $('#truename').val();
	                var tel = $('#tel').val();
	                var times = $("#times").val();
					var patrn = /(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
					if (truename == '' || "请输入名字!" == truename) {
						$("#truename").val("请输入名字!");
						return;
					}
					if (tel == '' || "手机号不对或为空!" == tel) {
						$("#tel").val("手机号不对或为空!");
						return;
					}
					if (!patrn.exec(tel)){
						$("#tel").val("手机号不正确!");
						return
					}
					var submitData = {
	                        sale:sale,
	                        truename: truename,
	                        tel:tel,
	                        times:times,
					};
					$.post('<?=site_url("richest/update_sale")?>', submitData,
						function(data) {
							if(data.errno == 200) {
								$("#windowcenter").slideUp(500);
								$("#notice").css("display","");
								$("#powerandgift").css("display","");
		                        window.location.href=data.url;
		                    }else{
		                    	 $("#txt").html('<span style="color:red;">'+data.error+'</span>');
		                    }
						},
						"json");
	});
	$("#submit_sale").click(function(){
		alerts("填写真实的姓名");
	});
	$("#alertclose").click(function () {
		$("#windowcenter").slideUp(500);
		$("#overlay").css("display","none");
	});

	function alerts(title){
		$("#windowcenter").slideToggle("slow");
		$("#txt").html(title);
	}
});
</script>
	<div class="p_mod">
		<h2 class="p_mod_title">使用说明</h2>
		<ul>
			
			<li class="p_phone">
				<a href="">
					<strong>NO1：</strong>
					<font>点击次数越多出售股份越多</font>
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