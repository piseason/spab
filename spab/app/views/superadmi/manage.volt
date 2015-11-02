<link rel='stylesheet' type='text/css' href='/bootstrap/css/bootstrap.min.css' />
<link rel="stylesheet" type="text/css" href="/css/apply.css">
<link rel="stylesheet" type="text/css" href="/css/manage.css">
<div id="contain" class='form-control'>
	<div id='catalogue' class='form-control'>
		<div style="height:30px"></div>
		<div style="margin:0 auto;text-align:center;"><img src="/images/user2.png"></div>
		<div class="category" id='now'>正在申请</div>
		<div class="category" id='granted'>已通过申请</div>
		<div class="category" id='denied'>未通过申请</div>
		<div class="category" id="arrange">日程安排</div>
		<div style="width:90%;height:30px;margin:0 auto;margin-top:15px;text-align: center;font-size: 21px;background-color: lightblue;cursor: pointer;" onclick="$.post('/index/logout',function(){window.location.href='/index/index'})">退出</div>
		<a href='/index/apply'>添加一条预约</a>
	</div>
	<div id='content' class="form-control">
			<div id="now_cont" nowpage="0"  ontop='true' class="content_hid">
			<div id="now_meat" style="width:100%;height:400px;">
				<!--<div class="record"  class="form-control" >
				<table style="text-align:center;height:40px;width:100%;margin:0;">
					<tr>
					<td style="width:24%;font-size:33px;">123人</td>
					<td style="width:25%;font-size:15px;">9月18日周二(四)<br/>aerres</td>
					<td style="width:38%;font-size:16px;">宇航学院121512班</td>
					<td style="width:38%;font-size:16px;">吴晓杰</td>
					</tr>
				</table>
				<div style="text-align:center;">
					<table border="1" style="height:65px;text-align:center;font-size:14px;overflow:hidden;">
					<tr><td style="width:70px;">申请人</td><td style="width:140px">诸葛藏藏夫斯基</td><td style="60px" rowspan="3">其他</td><td colspan="2" rowspan="3" style="width:380px;"></td><td style="width:50px;"><button>同意</button></td></tr>
					<tr><td>申请人ID</td><td>ZXYY111111</td><td><button>驳回</button></td></tr>
					<tr><td>联系方式</td><td>ZXYY111111</td><td></td></tr>
					</table>
				</div>
					
				</div>-->
				
			</div>
			<div style="text-align:right;margin-top:5px;">
					<button class='last'>上一页</button>
					第<span class="pagecount"></span>页
					<input id='now_input' type="text" style="width:40px;" />
					<button class="jump">跳页</button>
					<button class='next'>下一页</button>
			</div>
			</div>
			<div id="granted_cont" nowpage="0" ontop='false' class="content_hid">
				<div id="granted_meat" style="width:100%;height:400px;">
				
				</div>
				<div style="text-align:right;margin-top:5px;">
					<button class='last'>上一页</button>
					第<span class="pagecount"></span>页
					<input id='granted_input' type="text" style="width:40px;" />
					<button class="jump">跳页</button>
					<button class='next'>下一页</button>
				</div>
			</div>
			<div id="denied_cont" nowpage="0" ontop='false' class="content_hid">
				<div id="denied_meat" style="width:100%;height:400px;">
				
				</div>
				<div style="text-align:right;margin-top:5px;">
					<button class='last'>上一页</button>
					第<span class="pagecount"></span>页
					<input id='denied_input' type="text" style="width:40px;" />
					<button class="jump">跳页</button>
					<button class='next'>下一页</button>
				</div>
			</div>
			<div id="arrange_cont" class="content_hid">

					<table border='1'  id='table1'>
					<tr><td style='width:89px;'></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					<tr><td>8:00~10:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					<tr><td>10:00~12:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					<tr><td>14:00~16:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					<tr><td>16:00~18:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					</table>
					<div id='panel'>
					<div id="pstate" class="pstate">
						<h1 id="ssss"></h1>
						<p id='detail'></p>
					</div>
					<div id='pcontrol' class="pcontrol">
						<table>
							<tr><td><button id="b1" class='btn btn-warning'>驳回</button></td><td><button id="b2" class='btn btn-warning'>通过</button></td></tr>
							<tr><td><button id="b3" class='btn btn-warning'>回复</button></td><td><button id="b4" class='btn btn-warning'>取消</button></td></tr>
						</table>
					</div>

				</div>
				<div id="replypanel" class="replypanel">
				<div style="width:100%;height:5px;"></div>
				<div style="float:left;">
					简要:<input id='replys' type="text" class='form-control' style="width:300px;height:30px;display:inline-block;" value='请您耐心等待' />
					<textarea id="replyd" class="form-control" style="width:400px;height:80px;margin-left:20px;margin-top:3px;">谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。</textarea>
				</div>
					
				<div style="float:left;text-align:center;width:200px;">
					<button id="confirm" class="btn btn-warning" style="width:50px">确定</button><br/>
					<button id="cancel" class="btn btn-warning" style="width:50px;">取消</button>
				</div>
				</div>
			</div>
	</div>
</div>

<script type="text/javascript">
var max=0;
var htmlset=new Array();
htmlset[0]="<div class='record'  ><table "; //插入applycode属性
htmlset[1]="'  style='text-align:center;height:40px;width:100%;margin:0;'><tr><td style='width:24%;font-size:33px;'>";//人数
htmlset[2]="人</td><td style='width:200px;font-size:15px;'>";//时间+<br/>+代号
htmlset[3]="</td><td style='width:140px;font-size:16px;'>";//部门
htmlset[4]="</td><td style='width:140px;font-size:16px;'>";//负责人
htmlset[5]="</td></tr></table><div style='text-align:center;margin:0px;'><table class='recordstable' border='1' style='height:65px;text-align:center;font-size:14px;overflow:hidden;'><tr><td style='width:70px;'>申请人</td><td style='width:140px'>";//申请人
htmlset[6]="</td><td style='width:60px' rowspan='3'>其他</td><td colspan='2' rowspan='3' style='width:380px;'>"//其他
htmlset[7]="</td><td style='width:50px;'>";//自定义按钮一
htmlset[8]="</td></tr><tr><td>申请人ID</td><td>";//申请人id
htmlset[9]="</td><td>";//自定义按钮二
htmlset[10]="</td></tr><tr><td>联系方式</td><td>";//telephone
htmlset[11]="</td><td>";//自定义按钮三
htmlset[12]="</td></tr></table></div></div>";

var buttondeny1="<button class='deny' id='";
var buttondeny2="'>驳回</button>";
var buttonallow1="<button class='allow' id='";
var buttonallow2="'>通过</button>";
var buttondel1="<button class='del' id='";
var buttondel2="'>删除</button>";

$("document").ready(function(){
		$(".category").click(function(){
			$(".content_hid").hide();
			Leo_switch($(this).prop('id'));
		});
		$(".last").click(function(){
			var nowpage=$("[ontop=true]").attr("nowpage");
			var newpage=parseInt(nowpage)-1;
			changepage(newpage);
			
		});

		$(".next").click(function(){
			var nowpage=$("[ontop=true]").attr("nowpage");
			var newpage=parseInt(nowpage)+1;
			changepage(newpage);
		});

		$(".jump").click(function(){
			var newpage=$("#"+Leo_search()+"_input").val();
			if(isNaN(newpage)){
				leomessage("您的输入不合法");
				return;
			}else{
				changepage(newpage);
			}
		})
		Leo_switch("now");
		


	});

function changepage(newpage){
	if(newpage<0||newpage>max/6){
		return;
	}else{
		$("[ontop=true]").attr("nowpage",newpage);
		initRecord(newpage,Leo_search());
	}
}

function Leo_search(){
	var id=$("[ontop='true']").prop("id");

	return id.substr(0,id.length-5);
}

function Leo_switch(category){
		$('#'+category+'_cont').show();
		$("[ontop='true']").attr("ontop","false");
		$("#"+category+"_cont").attr("ontop","true");
		switch(category){
			case "now": 
			case "granted":
			case "denied":initRecord($("[ontop=true]").attr("nowpage"),category);break;
			case "arrange":initArrange();break;
	}
}
function initRecord(page,cate){
	$.post("/superadmi/getrecords",{"code":cate,"page":page},function(data){
		if(data.error){
			leomessage(data.error);
		}else{
			var realhtml="";
			if(data.count2==0){
				$("#"+cate+"_meat").html("没有相关记录");
				$(".pagecount").html('0/0');
				return;
			}
			max=data.count2-1;
			$(".pagecount").html((parseInt($("[ontop=true]").attr("nowpage"))+1)+"/"+((data.count2-1-(data.count2-1)%6)/6+1));
			for(var i=0;i<data.records.length;i++){
				switch(cate){
					case "now":
						var button1=buttonallow1+data.records[i].applycode+buttonallow2;
						var button2=buttondeny1+data.records[i].applycode+buttondeny2;
						var button3="";
						break;
					case "denied":
						var button1=buttondel1+data.records[i].applycode+buttondel2;
						var button2="";
						var button3="";
						break;
					case "granted":
						var button1=buttondeny1+data.records[i].applycode+buttondeny2;
						var button2="";
						var button3="";
						break;
				}
				
				realhtml+=htmlset[0]+data.records[i].applycode+htmlset[1]+data.records[i].number+htmlset[2]+data.records[i].time+"<br/>"+data.records[i].applycode+htmlset[3]+data.records[i].department+htmlset[4]+data.records[i].incharge+htmlset[5]+data.records[i].appliantname+htmlset[6]+data.records[i].other+htmlset[7]+button1+htmlset[8]+data.records[i].appliantid+htmlset[9]+button2+htmlset[10]+data.records[i].telephone+htmlset[11]+button3+htmlset[12];
			}

			$("#"+cate+"_meat").html(realhtml);

			//响应展开
			$(".records").unbind("click");
			$(".record").click(function(){
			if($(this).css("height")=="40px"){
				//$(".record").animate({height:40},"fast");
				$(".record").css("height","40px");
			}

			//响应同意
			$(".allow").unbind("click");
			$(".allow").click(function(){
				$.post('/superadmi/updaterecord',{"code":'allow',"applycode":$(this).prop("id")},function(data){
					if(data.error){
						leomessage(data.error);
					}
					Leo_switch(cate);
				});
			});

			//响应驳回
			$(".deny").unbind("click");
			$(".deny").click(function(){
				$.post('/superadmi/updaterecord',{"code":'deny',"applycode":$(this).prop("id")},function(data){
					if(data.error){
						leomessage(data.error);
					}

					Leo_switch(cate);
				});
			});

			//响应删除
			$(".del").unbind("click");
			$(".del").click(function(){
				$.post('/superadmi/updaterecord',{"code":'del',"applycode":$(this).prop("id")},function(data){
					if(data.error){
						leomessage(data.error);
					}

					Leo_switch(cate);
				});
			});


			$(this).animate({height:($(this).css("height")=="40px"?120:40)},"fast");

		});
		}
	});
}

function initArrange(){
			//$("#content").html(html_set['arrange']);
			$("#panel").slideUp("fast");
			$("#b4").unbind("click");
			$("#b4").click(function(){
				$("#panel").slideUp("fast");
			});

			$("#b3").unbind("click");
			$("#b3").click(function(){
				var day=$(this).prop('day');
				$("#table1 td").animate({height:40},function(){
					$("#replypanel").slideDown('fast');

					$("#cancel").unbind("click");
					$("#cancel").click(function(){
						$("#replypanel").hide("fast");
						$("#table1 td").animate({height:70});
					});

					$("#confirm").unbind("click");
					$("#confirm").click(function(){
						$.post("/superadmi/updatereply",{'reply':$("#replys").val(),'detail':$("#replyd").val(),'day':day},function(data){
								if(data.error){
									leomessage(data.error);
								}else{
									leomessage("修改成功");
								}
						});
					});

				});
				
			});
			$("#table1 tr:gt(0)").find("td:gt(0)").addClass("tdable");
			$.post('/superadmi/getarrange/',function(data){
					initTable(data);
					$("#table1 tr:gt(0)").find("td:gt(0)").unbind("click");
					$("#table1 tr:gt(0)").find("td:gt(0)").click(function(){
						var color=$(this).css("background-color");
						var phtml=$(this).prop("state");
						var phtml2=$(this).prop('appliant');
						var timeprop=$(this).prop('time');
						$("#panel").slideUp("fast",function(){
							$("#panel").css("background-color",color);
							$("#ssss").html(phtml);
							if(phtml2){
								$("#detail").html(phtml2);
							}else{
								$("#detail").html("");
							}
							switch(phtml){
								case "休息日":
									 $("#b1").html("改为可预约");
									 $("#b1").unbind("click");
									 $("#b1").click(function(){
									 	postdata(0,timeprop);
									 });
									 $("#b2").hide();
									 $("#b3").hide();
									 break;
								case "可预约": 
									 $("#b1").html("改为休息日");
									 $("#b1").unbind("click");
									 $("#b1").click(function(){
									 	postdata(1,timeprop);
									 });
									 $("#b2").hide();
									 $("#b3").hide();
									 break;
								case "已通过":
									$("#b1").html("驳回");
									$("#b1").unbind("click");
									$("#b1").click(function(){
									 	postdata(2,timeprop);
									 });
									 $("#b2").hide();
									 $("#b3").show();
									 $("#b3").prop('day',timeprop);

									 break;

								case "审核中":
									 $("#b1").html("驳回");
									 $("#b1").unbind("click");
									 $("#b1").click(function(){
									 	postdata(2,timeprop);
									 });
									 $("#b2").html("通过");
									 $("#b2").unbind("click");
									 $("#b2").click(function(){
									 	postdata(3,timeprop);
									 });
									 $("#b2").show();
									 $("#b3").show();
									 $("#b3").prop('day',timeprop);
									 break;
							}
						});
						function postdata(code,day){

							//code 0-变为可预定 1-变为休息日 2-驳回 3-通过
							$.post('/superadmi/updatestate',{"code":code,"day":day},function(data){
									 		if(data.error){
									 			leomessage(data.error);
									 		}else{
									 			leomessage("修改成功");
									 		}
									 		initArrange()
									 	});
						}
						$("#panel").slideDown("fast");
					});
			});
		}

function initTable(data){
	appoint=data.appoints;
	appoints=appoint.split("");
	for(var j=0;j<7;j++){
			$("#table1 tr:eq("+0+") td:eq("+(j+1)+")").html(data.date[j]);
			for(var i=0;i<4;i++){
				var tdd = $("#table1 tr:eq(" + (i + 1) + ") td:eq(" + (j + 1) + ")");
				tdd.css("cursor", "pointer");
				tdd.prop("time",data.date[j]+(2*i+8+2*(i>1?1:0))+":00~"+(2*i+8+2*(i>1?1:0)+2)+":00");
				//0:已预约 1:可预约 2：休息日
			switch (appoints[i + j*4]) {
				case '3': 
					tdd.css('background-color', '#ff0000');
					tdd.html("已通过");
					tdd.css("color", "white");
					tdd.prop("appliant",data.appliant[i+4*j]);
					tdd.prop("state","已通过");
					break;
				case '1':
					var tdd = $("#table1 tr:eq(" + (i + 1) + ") td:eq(" + (j + 1) + ")");
					tdd.css('background-color', '#00ff00');
					tdd.html("可预约");
					tdd.css("color", "white");
					tdd.prop("state","可预约");
					break;
				case '2':
					var tdd = $("#table1 tr:eq(" + (i + 1) + ") td:eq(" + (j + 1) + ")");
					tdd.css('background-color', 'yellow');
					tdd.html("休息");
					tdd.css("color", "black");
					tdd.prop("state", "休息日");
					break;
				case '0':
					var tdd = $("#table1 tr:eq(" + (i + 1) + ") td:eq(" + (j + 1) + ")");
					tdd.css('background-color', 'skyblue');
					tdd.prop("appliant", data.appliant[i + 4 * j]);
					tdd.html("审核中");
					tdd.css("color", "black");
					tdd.prop("state", "审核中");
					break;

				}
			}
		}
}


// html_set['arrange']="<table border='1' class='form-control' id='table1'><tr><td style='width:89px;'></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td>8:00~10:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td>10:00~12:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td>14:00~16:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td>16:00~18:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></table><div id='panel'><div id='pstate' class='pstate'><h1 id='ssss'></h1><p id='detail'></p></div><div id='pcontrol' class='pcontrol'><table><tr><td><button id='b1' class='btn btn-warning'>驳回</button></td><td><button id='b2' class='btn btn-warning'>通过</button></td></tr><tr><td><button id='b3' class='btn btn-warning'>回复</button></td><td><button id='b4' class='btn btn-warning'>取消</button></td></tr></table></div></div><div id='replypanel' class='replypanel'><div style='width:100%;height:5px;'></div><div style='float:left;'>简要:<input id='replys' type='text' class='form-control' 'style=width:300px;height:30px;display:inline-block;' value='请您耐心等待' /><textarea id='replyd' class='form-control' style='width:400px;height:80px;margin-left:20px;margin-top:3px;'>谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。</textarea></div><div style='float:left;text-align:center;width:200px;'><button id='confirm' class='btn btn-warning' style='width:50px'>确定</button><br/><button id='cancel' class='btn btn-warning' style='width:50px;'>取消</button></div></div>"
</script>



