jQuery(function($) {
	/*
		class 为 url  点击跳转到 attr url 
	*/
	jQuery(".url").click(function(){
		var url=jQuery(this).attr("url");
		if(url){
			window.location.href=url;
		}
	});
	/*
		a 标签 href 的事件
	*/
	jQuery(".no_a").click(function(){
		alert("禁止进行该操作！");
		return false;
	});	
});
