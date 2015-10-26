<link rel='stylesheet' type='text/css' href='/bootstrap/css/bootstrap.min.css' />
<link rel="stylesheet" type="text/css" href="/css/apply.css">
<link rel="stylesheet" type="text/css" href="/css/checkout.css">
<div id="contain" class='form-control'>
	<h1>请输入您的查询码:</h1>
	<div style="width:100%;text-align:center;">
	<input id="applycode" class="form-control" style="width:40%;margin:0 auto;" type="text" />
	<button id="inquery" class='btn btn-warning' style="width:30%;margin-top:20px;"  onmouseover= "this.style.backgroundColor = 'rgba(229,100,25,0.5)' ;this.style.color='#FFF' ;" onmouseout  ="this.style.backgroundColor = 'rgba(229,100,25,0.7)' ;this.style.color='#000'">查询</button>
	</div>
	<p id="hit"></p>
</div>

<script type="text/javascript">
	$("document").ready(function(){
		$("#inquery").click(function(){
			if($("#applycode").val()){
				$.post("/checkout/inquery",{"applycode":$("#applycode").val()},function(data){
					if(!data.error){
						window.location=data.url;
					}else{
						$("#hit").html(data.error);
					}
				});
			}else{
				$("#hit").html("申请码不能为空");
			}
		});
	});
</script>