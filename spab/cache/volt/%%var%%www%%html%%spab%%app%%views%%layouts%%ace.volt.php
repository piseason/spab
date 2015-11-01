<html>
	<head>
		<meta charset="utf-8" />
		<title>北航安全体验馆预约</title>
		<link rel="stylesheet" type="text/css" href="/css/global.css">
		<link rel="stylesheet" type="text/css" href="/css/index.css">
		<link rel='stylesheet' type='text/css' href='/bootstrap/css/bootstrap.min.css' />
		<script type="text/javascript" src="/lib/jquery.js"></script>
	</head>
	<body style="background-image:url('/images/bg_images.jpg')">
	<div id='messagecarrier' class='messagecarrier'>
		<div id='message' class="message">
			<div style="width:100%;height:20%"></div>
			<div id="message_str" style="width:100%;height:55%;"></div>
			
			<button class='btn btn-warning'>确定</button>
		</div>
	</div>
	<div style="height:39px;"></div>
	<div id="logo">
	<div style="width:950px;height:60px"></div>
	<p class="TEL">
		<font>体验中心:</font>3 号公寓东侧地下一层
		<font>联系电话:</font>82317766
	</p>
	</div>
		<?php echo $this->getContent(); ?>
	</body>
	<script type="text/javascript">

	$("document").ready(function(){
		$("#message").children("button").click(function(){
			$("#messagecarrier").slideUp();
		});
	});
	function leomessage(str){
		if(str||str==""){
			$("#message_str").html(str);
		}else{
			$("#message_str").html("undefined");
		}
		
		$("#messagecarrier").show('normal');
	}
	</script>
</html>
