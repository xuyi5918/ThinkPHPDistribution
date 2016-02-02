/**
 * @菜单栏JS
 * @author: rui <zer0131@hotmail.com>
 * @time: 2013/03/08
 * @Copyright: www.iqishe.com
*/

//显示选中一级菜单
var curitem = 1;
function ShowMainMenu(n)
{
	var curLink = $Id('link'+curitem);
	var targetLink = $Id('link'+n);
	var curCt = $Id('ct'+curitem);
	var targetCt = $Id('ct'+n);
	if(curitem==n) return false;
	if(targetCt.innerHTML!='')
	{
		curCt.style.display = 'none';
		targetCt.style.display = 'block';
		curLink.className = 'mm';
		targetLink.className = 'mmac';
		curitem = n;
	}
}

//显示或隐藏二级菜单
function showHide(objname)
{
	//只对主菜单设置cookie
	var obj = document.getElementById(objname);
	var objsun = document.getElementById('sun'+objname);
	if(objsun.className == "bitem")
	{
		obj.style.display = "none";
		objsun.className = "bitem2"
	}
	else
	{
		obj.style.display = "block";
		objsun.className = "bitem"
	}
}