<link rel='stylesheet' type='text/css' href='/bootstrap/css/bootstrap.min.css' />
<link rel="stylesheet" type="text/css" href="/css/apply.css">
<div id="contain" class='form-control'>
	<div id="info">
		<ul style="margin-top:10px;">
			<li>
			部门(学院+班号)：<input class='form-control' type="text" id="department" style="width:200px;display:inline-block;"  />
			</li>
			<li>
			参观人数：<input class='form-control' type="text" id="number" style="width:200px;display:inline-block;" />
			</li>
			<li>
			申请人姓名：<input class='form-control' readonly="true" type="text" id="appliantname" style="width:200px;display:inline-block;" value="<?php echo $applyname; ?>" />
			</li>
			<li>
			申请人证件号：<input class='form-control' readonly="true" type="text" id="appliantid" style="width:200px;display:inline-block;" value="<?php echo $uid; ?>" />
			</li>
			<li>
			负责人：<input class='form-control' type="text" id="incharge" style="width:200px;display:inline-block;" />
			</li>
			<li>
			参观时段：<input class='form-control' type="text" id="time" readonly="true" style="width:250px;display:inline-block;" value="请点击右侧空白时段输入" />
			</li>
			<li>
			联系方式：<input class='form-control' type="text" id="telephone" style="width:200px;display:inline-block;" />
			</li>
			<li>
			申请备注及其他：<br/><textarea class='form-control' id="other" style="width:300px;height:100px;display:inline-block;max-width:300px;max-height:100px;"></textarea>
			</li>
			<div><span id='count'>0</span>/60</div>
			<div style="text-align:center;"><button id="submit" class='btn btn-warning'  onmouseover= "this.style.backgroundColor = 'rgba(229,100,25,0.5)';this.style.color='#FFF' ;" onmouseout  ="this.style.backgroundColor = 'rgba(229,100,25,0.7)' ;this.style.color='#000'" >提交</button></div>


		</ul>
	</div>

	<div id="agenda">
	<div style="height:10px;"></div>
		<div style="width:545px;height:430px;margin-top:5px;margin-left:5px;">
			<table border="1" class='form-control' id="table1">
				<tr><td style="width:89px;"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>8:00~10:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>10:00~12:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>14:00~16:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>16:00~18:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">

	var appoint = "";
	var appoints = new Array();
	var character="日一二三四五六";
	var characters=character.split("");
	$("document").ready(function() {
		$.post("/index/gettime",function(data){
			initTable(data);
		});
		$('#other').bind('input propertychange', function() {

			var va = $(this).val();
			var l = va.split("").length;

			if (l <= 60) {
				$("#count").html(l);
			} else {
				$("#count").html(60);
				$(this).prop("value", va.substr(0, 60));
			}

		});

		$("#submit").click(function(){
			Leo_submit();
		})

		
		

	});

function initTable(data){
	appoint=data.appoints;
	appoints=appoint.split("");
	for(var j=0;j<7;j++){
			// var dt=data.date[j].split("|");
			// var dt_str=dt[0]+"月"+dt[1]+"日"+"<br/>"+"周"+characters[parseInt(dt[2])];
			// $("#table1 tr:eq("+0+") td:eq("+(j+1)+")").html(dt_str);
			$("#table1 tr:eq("+0+") td:eq("+(j+1)+")").html(data.date[j]);
			for(var i=0;i<4;i++){

				//0:已预约 1:可预约 2：休息日
			switch (appoints[i + j*4]) {
				case '0': 
					var tdd = $("#table1 tr:eq(" + (i + 1) + ") td:eq(" + (j + 1) + ")");
					tdd.css('background-color', '#ff0000');
					tdd.html("已预约");
					tdd.css("color", "white");
					tdd.css("cursor", "default");
					break;
				case '1':
					var tdd = $("#table1 tr:eq(" + (i + 1) + ") td:eq(" + (j + 1) + ")");
					tdd.css('background-color', '#00ff00');
					tdd.html("可预约");
					tdd.css("color", "white");
					tdd.css("cursor", "pointer");
					tdd.prop("i",i);
					tdd.prop("j",j);
					tdd.unbind("click");
					tdd.bind("click",function(){
						// var dt=data.date[$(this).prop("j")].split("|");
						// var dt_str=dt[0]+"月"+dt[1]+"日"+"周"+characters[parseInt(dt[2])];
						$("#time").prop("i",$(this).prop("i"));
						$("#time").prop("j",$(this).prop("j"));
						$("#time").prop("value",data.date[$(this).prop('j')]+(2*$(this).prop("i")+8+2*($(this).prop("i")>1?1:0))+":00~"+(2*$(this).prop("i")+8+2*($(this).prop("i")>1?1:0)+2)+":00");
					});
					break;
				case '2':
					var tdd = $("#table1 tr:eq(" + (i + 1) + ") td:eq(" + (j + 1) + ")");
					tdd.css('background-color', 'yellow');
					tdd.html("休息");
					tdd.css("color", "black");
					tdd.css("cursor", "default");
					tdd.unbind("click");
					
					break;
			}
			}
		}
}

function Leo_submit(){
	if(Leo_checkinput()){


		var inputdata={
			"department":$("#department").val(),
			"number":$("#number").val(),
			"appliantname":$("#appliantname").val(),
			"appliantid":$("#appliantid").val(),
			"incharge":$("#incharge").val(),
			"time":$("#time").val(),
			"timeIndex":$("#time").prop("i")+"|"+$("#time").prop("j"),
			"other":$("#other").val(),
			"telephone":$("#telephone").val()
		};
		
		$.post("/index/postdata",inputdata,function(data){
				if(data.error){
					leomessage("提交失败,请刷新重试!");
				}else{
					leomessage("提交成功!<br/>请牢记您的查询码！！！<br/>"+data.applycode);
					$.post("/index/gettime",function(data){
						initTable(data);
						$("#time").prop("value","请点击右侧空白时段输入");
					});
				}
		});
	}else{
		leomessage("您有未(误)输入项，除备注外的所有项目都是必填的！");
	}
}
function Leo_checkinput(){
	var inputs=$("input");
	for(var i=0;i<inputs.length;i++){
		if(inputs[i].value=="" || inputs[i].value=="请点击右侧空白时段输入") return false;
	}
	if(isNaN($("#number").val())) return false;
	return true;
}
	
</script>
