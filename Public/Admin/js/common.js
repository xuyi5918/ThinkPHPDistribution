//根据Id获取元素
function $Id(id)
{
	return document.getElementById(id);
}

//根据Name获取元素
function $Name(name)
{
	return document.getElementsByName(name);
}

//根据Tag获取元素
function $Tag(tag)
{
	return document.getElementsByTagName(tag);
}

//获取浏览器信息
function $Nav()
{
	if(window.navigator.userAgent.indexOf("MSIE")>=1)
	{
		return 'IE';
	}
	else if(window.navigator.userAgent.indexOf("Firefox")>=1)
	{
		return 'FF';
	}
	else 
	{
		return "OT";
	}
}

//全选or反选
function selOrNoSel(name)
{
	var checkboxs = $Name(name);
	for (var i=0;i<checkboxs.length;i++) 
	{
		var e = checkboxs[i];
		e.checked = !e.checked;
	}
}

//显示or隐藏table
function ShowHideT(objid)
{
	var obj = $Id(objid);
	if(obj.style.display != "none" )
	{
		obj.style.display = "none";
	}
	else
	{
		obj.style.display = ($Nav()=="IE" ? "block" : "table");
	}
}

//删除确认
function del(url,myform)
{
	if(confirm("确定删除记录吗?")){
		return $Id(myform).action = url;
	}
	else{
		return false;
	}
} 

//系统参数配置Tab切换
function ShowConfig(em,allgr)
{
	for(var i=1;i<=allgr;i++)
	{
		if(i==em) $Id('td'+i).style.display = ($Nav()=='IE' ? 'block' : 'table');
		else $Id('td'+i).style.display = 'none';
	}
	$Id('addvar').style.display = 'none';
}

function getCurDate()
{
	 var d = new Date();
	 var week;
	 switch (d.getDay()){
	 case 1: week="一"; break;
	 case 2: week="二"; break;
	 case 3: week=""; break;
	 case 4: week="四"; break;
	 case 5: week="五"; break;
	 case 6: week="六"; break;
	 default: week="天";
	 }
	 var years = add_zero(d.getFullYear());
	 var month = add_zero(d.getMonth()+1);
	 var days = add_zero(d.getDate());
	 var hours = add_zero(d.getHours());
	 var minutes = add_zero(d.getMinutes());
	 var seconds=add_zero(d.getSeconds());
	 $("#years").val(years);
	 $("#month").val(month);
	 $("#days").val(days);
	 $("#hours").val(hours);
	 $("#minutes").val(minutes);
	 $("#seconds").val(seconds);
	 $("#week").val(week);
}
function add_zero(temp)
{
	 if(temp<10) return "0"+temp;
	 else return temp;
}
setInterval("getCurDate()",100);