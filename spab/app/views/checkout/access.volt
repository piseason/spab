
<link rel="stylesheet" type="text/css" href="/css/apply.css">
<link rel="stylesheet" type="text/css" href="/css/checkout.css">
<div id="contain" class='form-control'>
	<div style="font-size:60px;color:green;margin:20px;float:left;width:45%;">{{state}}</div>
	<div style="font-size:60px;color:green;margin:20px;float:right;width:45%;">{{number}}人</div>
	<div style="width:100%;height:auto;margin-left:20px;float:left;">申请号:{{applycode}}</div>
	<div style="width:800px;height:250px;margin-left:70px;float:left;">
		<table class="table1" border="1">
		<tr><td>申请人:</td><td>{{appliantname}}</td><td>申请人证件号</td><td>{{appliantid}}</td><td rowspan="2" style="width:90px"><img src="/images/like.png" style="width:60px;"/>支持我们</td></tr>
		<tr><td>负责人:</td><td>{{incharge}}</td><td>部门</td><td>{{department}}</td></tr>
		<tr><td>申请时段:</td><td colspan="2">{{time}}</td><td>提交时间</td><td>{{signuptime}}</td></tr>
		</table>	
		<div id="sareply" style="width:100%;height:45px;background-color:white;overflow:hidden;">
			<div style="height:45px;font-size:20px;text-align:center;cursor:pointer;" id="reply"><font style="color:silver;font-size:12px;">管理员回复</font><br/>{{reply}}</div>
			<p>{{detail}}</p>
		</div>
	</div>

	
</div>

<script type="text/javascript">
	$("document").ready(function(){
		$("#reply").click(function(){
			var h=$("#sareply").css("height");
			if(h=="45px"){
				h=100;
			}else{
				h=45;
			}

			$("#sareply").animate({height:h},"fast");
		});
	});
</script>
