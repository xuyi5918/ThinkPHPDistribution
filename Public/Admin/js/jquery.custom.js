/*-----------------------------------------------------------------------------------*/
/*	superfish.js
/*-----------------------------------------------------------------------------------*/

(function($){
    $.fn.superfish=function(op){
        var sf=$.fn.superfish,c=sf.c,$arrow=$(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),over=function(){
            var $$=$(this),menu=getMenu($$);
            clearTimeout(menu.sfTimer);
            $$.showSuperfishUl().siblings().hideSuperfishUl()
        }
        ,out=function(){
            var $$=$(this),menu=getMenu($$),o=sf.op;
            clearTimeout(menu.sfTimer);
            menu.sfTimer=setTimeout(function(){
                o.retainPath=($.inArray($$[0],o.$path)>-1);
                $$.hideSuperfishUl();
                if(o.$path.length&&$$.parents(['li.',o.hoverClass].join('')).length<1){
                    over.call(o.$path)
                }
                
            }
            ,o.delay)
        }
        ,getMenu=function($menu){
            var menu=$menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
            sf.op=sf.o[menu.serial];
            return menu
        }
        ,addArrow=function($a){
            $a.addClass(c.anchorClass).append($arrow.clone())
        };
        return this.each(function(){
            var s=this.serial=sf.o.length;
            var o=$.extend({},sf.defaults,op);
            o.$path=$('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
                $(this).addClass([o.hoverClass,c.bcClass].join(' ')).filter('li:has(ul)').removeClass(o.pathClass)
            });
            sf.o[s]=sf.op=o;
            $('li:has(ul)',this)[($.fn.hoverIntent&&!o.disableHI)?'hoverIntent':'hover'](over,out).each(function(){
                if(o.autoArrows)addArrow($('>a:first-child',this))
            }).not('.'+c.bcClass).hideSuperfishUl();
            var $a=$('a',this);
            $a.each(function(i){
                var $li=$a.eq(i).parents('li');
                $a.eq(i).focus(function(){
                    over.call($li)
                }).blur(function(){
                    out.call($li)
                })
            });
            o.onInit.call(this)
        }).each(function(){
            var menuClasses=[c.menuClass];
            if(sf.op.dropShadows&&!($.browser.msie&&$.browser.version<7))menuClasses.push(c.shadowClass);
            $(this).addClass(menuClasses.join(' '))
        })
    };
    var sf=$.fn.superfish;
    sf.o=[];
    sf.op={};
    sf.IE7fix=function(){
        var o=sf.op;
        if($.browser.msie&&$.browser.version>6&&o.dropShadows&&o.animation.opacity!=undefined)this.toggleClass(sf.c.shadowClass+'-off')
    };
    sf.c={
        bcClass:'sf-breadcrumb',menuClass:'sf-js-enabled',anchorClass:'sf-with-ul',arrowClass:'sf-sub-indicator',shadowClass:'sf-shadow'
    };
    sf.defaults={
        hoverClass:'sfHover',pathClass:'overideThisToUse',pathLevels:1,delay:800,animation:{
            opacity:'show'
        }
        ,speed:'normal',autoArrows:true,dropShadows:true,disableHI:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}
    };
    $.fn.extend({
        hideSuperfishUl:function(){
            var o=sf.op,not=(o.retainPath===true)?o.$path:'';
            o.retainPath=false;
            var $ul=$(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass).find('>ul').hide().css('visibility','hidden');
            o.onHide.call($ul);
            return this
        }
        ,showSuperfishUl:function(){
            var o=sf.op,sh=sf.c.shadowClass+'-off',$ul=this.addClass(o.hoverClass).find('>ul:hidden').css('visibility','visible');
            sf.IE7fix.call($ul);
            o.onBeforeShow.call($ul);
            $ul.animate(o.animation,o.speed,function(){
                sf.IE7fix.call($ul);
                o.onShow.call($ul)
            });
            return this
        }
        
    })
})(jQuery);

/*-----------------------------------------------------------------------------------*/
/*	Tabbed Widget JS (if active)
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function() {

	jQuery("#tabs").tabs({ fx: { opacity: 'show' } });
	jQuery(".tabs").tabs({ fx: { opacity: 'show' } });
	
	
	jQuery(".toggle").each( function () {
		if(jQuery(this).attr('data-id') == 'closed') {
			jQuery(this).accordion({ header: 'h4', collapsible: true, active: false  });
		} else {
			jQuery(this).accordion({ header: 'h4', collapsible: true});
		}
	});
	
	
});

/*-----------------------------------------------------------------------------------*/
/*	Load
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function() {
	
	
/*-----------------------------------------------------------------------------------*/
/*	Tabbed Widget
/*-----------------------------------------------------------------------------------*/
	
	jQuery("#tabs").tabs({ fx: { opacity: 'show' } });
	
	jQuery(".tz_tab_widget .tab-tags a").css({
		backgroundColor: "#333333",
		color: "#E2E2E1"
	});
	
	jQuery(".tz_tab_widget .tab-tags a").hover(function() {
		jQuery(this).stop().animate({
			backgroundColor: "#A0410D",
			color: "#ffffff"
		}, 200);
	},function() {
		jQuery(this).stop().animate({
			backgroundColor: "#333333",
			color: "#E2E2E1"
		}, 500);
	});
	
/*-----------------------------------------------------------------------------------*/
/*	sidebar Thumbs
/*-----------------------------------------------------------------------------------*/
/*
	jQuery("#tabs img").css({
		backgroundColor: "#F9F8F8",
		borderColor: "#AFAEA6"
	});
	
	jQuery("#tabs img").hover(function() {
		jQuery(this).stop().animate({
			backgroundColor: "#9cd1e1",
			borderColor: "#38a1e5"
		}, 300);
	},function() {
		jQuery(this).stop().animate({
			backgroundColor: "#F9F8F8",
			borderColor: "#AFAEA6"
		}, 300);
	});

*/
	// Content Thumbs
	jQuery(".post-lead img, a.fancybox img").css({
		backgroundColor: "#FCFCFC",
		borderColor: "#C8C8C2"
	});
	
	jQuery(".post-lead img, a.fancybox img").hover(function() {
		jQuery(this).stop().animate({
			backgroundColor: "#9cd1e1",
			borderColor: "#38a1e5"
		}, 500);
		},function() {
		jQuery(this).stop().animate({
			backgroundColor: "#FCFCFC",
			borderColor: "#C8C8C2"
		}, 500);
	});

/*-----------------------------------------------------------------------------------*/
/*	Content Thumb Corrections
/*-----------------------------------------------------------------------------------*/

	jQuery(".single .post-lead img").css({
		backgroundColor: "#FCFCFC",
		borderColor: "#C8C8C2"
	});
	jQuery(".single .post-lead img").hover(function() {
		jQuery(this).stop().animate({
			backgroundColor: "#FCFCFC",
			borderColor: "#C8C8C2"
		}, 500);
		},function() {
		jQuery(this).stop().animate({
			backgroundColor: "#FCFCFC",
			borderColor: "#C8C8C2"
		}, 500);
	});
	
/*-----------------------------------------------------------------------------------*/
/*	flickr Thumbs
/*-----------------------------------------------------------------------------------*/

	jQuery("#flickr .flickr_badge_image img").css({
		backgroundColor: "#C5C5C5",
		borderColor: "#111111"
	});
	jQuery("#flickr .flickr_badge_image img").hover(function() {
		jQuery(this).stop().animate({
			backgroundColor: "#222222",
			borderColor: "#111111"
		}, 100);
		},function() {
		jQuery(this).stop().animate({
			backgroundColor: "#C5C5C5",
			borderColor: "#111111"
		}, 300);
	});
	
	jQuery("#sidebar #flickr .flickr_badge_image img").css({
		backgroundColor: "#FCFCFC",
		borderColor: "#AFAEA6"
	});
	jQuery("#sidebar #flickr .flickr_badge_image img").hover(function() {
		jQuery(this).stop().animate({
			backgroundColor: "#222222",
			borderColor: "#AFAEA6"
		}, 100);
		},function() {
		jQuery(this).stop().animate({
			backgroundColor: "#FCFCFC",
			borderColor: "#AFAEA6"
		}, 300);
	});
	
/*-----------------------------------------------------------------------------------*/
/*	Main Entry Titles
/*-----------------------------------------------------------------------------------*/

	jQuery("#primary .entry-title a").css({
		color: "#444444"
	});
	jQuery("#primary .entry-title a").hover(function() {
		jQuery(this).stop().animate({
			color: "#A0410D"
		}, 500);
		},function() {
			jQuery(this).stop().animate({
			color: "#444444"
		}, 500);
	});
	
/*-----------------------------------------------------------------------------------*/
/*	Superfish Menu
/*-----------------------------------------------------------------------------------*/
	
	jQuery('#top-nav ul').superfish({
		delay: 200,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		autoArrows: false,
		dropShadows: false
	}); 
	
});

/*-----------------------------------------------------------------------------------*/
/*	LOGO
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
			jQuery('.logo-link').wrapInner('<span class="hover"></span>').css('textIndent','0').each(function () {
				jQuery('span.hover').css('opacity', 0).hover(function () {
					jQuery(this).stop().fadeTo(600, 1);
				}, function () {
					jQuery(this).stop().fadeTo(600, 0);
				});
			});
});



/*-----------------------------------------------------------------------------------*/
/*	sidebar
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){
$.fn.smartFloat = function() {
    var position = function(element) {
        var top = element.position().top, pos = element.css("position");
        $(window).scroll(function() {
            var scrolls = $(this).scrollTop();
            if (scrolls > top) {
                if (window.XMLHttpRequest) {
                    element.css({
                        position: "fixed",
                        top: 0
                    });    
                } else {
                    element.css({
                        top: scrolls
                    });    
                }
            }else {
                element.css({
                    position: "relative",
                    top: 0
                });    
            }
        });
    };
    return $(this).each(function() {
        position($(this));                         
    });
};

//绑定
//$(".widget_bd_random_post_widget").smartFloat();

});


/*-----------------------------------------------------------------------------------*/
/*	link move
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){ 
	$('#menu-menu a').hover(function() { 
		$(this).stop().animate({
			top: '3px'}, 150); 
		}, function() { 
		$(this).stop().animate({
			top: '0px'}, 300); 
	}); 
}); 

jQuery(document).ready(function($){ 
$('.entry-title a,.sub-menu a,.more-link').hover(function() { 
$(this).stop().animate({'marginLeft': '10px'}, 200); 
}, function() { 
$(this).stop().animate({'marginLeft': '0px'}, 400); 
}); 
}); 
/*-----------------------------------------------------------------------------------*/
/*	little loading
/*-----------------------------------------------------------------------------------*/

$(function() {
	$('.entry-title a').click(function(e) {
		e.preventDefault();
		var htm = 'Loading',
		i = 4,
		t = $(this).html(htm).unbind('click'); (function ct() {
			i < 0 ? (i = 4, t.html(htm), ct()) : (t[0].innerHTML += '.', i--, setTimeout(ct, 150))
		})();
		window.location = this.href
	});
});
		
		
/*-----------------------------------------------------------------------------------*/
/*	返回顶部
/*-----------------------------------------------------------------------------------*/
	(function($){
    var h=$.scrollTo=function(a,b,c){
        $(window).scrollTo(a,b,c)
    };
    h.defaults={
        axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true
    };
    h.window=function(a){
        return $(window)._scrollable()
    };
    $.fn._scrollable=function(){
        return this.map(function(){
            var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;
            if(!isWin)return a;
            var b=(a.contentWindow||a).document||a.ownerDocument||a;
            return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement
        })
    };
    $.fn.scrollTo=function(e,f,g){
        if(typeof f=='object'){
            g=f;
            f=0
        }
        if(typeof g=='function')g={
            onAfter:g
        };
        if(e=='max')e=9e9;
        g=$.extend({},h.defaults,g);
        f=f||g.duration;
        g.queue=g.queue&&g.axis.length>1;
        if(g.queue)f/=2;
        g.offset=both(g.offset);
        g.over=both(g.over);
        return this._scrollable().each(function(){
            if(!e)return;
            var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');
            switch(typeof targ){
                case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){
                    targ=both(targ);
                    break
                }
                targ=$(targ,this);
                if(!targ.length)return;
                case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()
            }
            $.each(g.axis.split(''),function(i,a){
                var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);
                if(toff){
                    attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);
                    if(g.margin){
                        attr[key]-=parseInt(targ.css('margin'+b))||0;
                        attr[key]-=parseInt(targ.css('border'+b+'Width'))||0
                    }
                    attr[key]+=g.offset[pos]||0;
                    if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]
                }
                else{
                    var c=targ[pos];
                    attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c
                }
                if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);
                if(!i&&g.queue){
                    if(old!=attr[key])animate(g.onAfterFirst);
                    delete attr[key]
                }
                
            });
            animate(g.onAfter);
            function animate(a){
                $elem.animate(attr,f,g.easing,a&&function(){
                    a.call(this,e,g)
                })
            }
            
        }).end()
    };
    h.max=function(a,b){
        var c=b=='x'?'Width':'Height',scroll='scroll'+c;
        if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();
        var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;
        return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])
    };
    function both(a){
        return typeof a=='object'?a:{
            top:a,left:a
        }
        
    }
    
})(jQuery);

	(function($) {
   var isTransitioned = true,
       transparent = 0,
       translucent = 0.3,
       opaque = 1;

   var fade = function() {
      if(isTransitioned) {
         isTransitioned = false;
         if(600 < $(document).scrollTop()) {
            $("#stt-gototop-0").show().fadeTo("slow", translucent, function() {
               isTransitioned = true;
            });
         } else {
            $("#stt-gototop-0").fadeTo("slow", transparent, function() {
               isTransitioned = true;
               $(this).hide();
            });
         }
      }
   }

   $(function() {
      $("body").each(function(i) {
         $(this).prepend('<a id="stt-top-' + i + '" class="stt-top">Top</a>\n<a href="#stt-top-' + i + '" id="stt-gototop-' + i + '" class="stt-gototop">Top of page</a>');
      });

      $(".stt-gototop").click(function() {
         $.scrollTo($($(this).attr('href')), 300);

         $(this).fadeOut();

         return false;
      });

      fade();
      $(document).scroll(fade);

      $(".stt-gototop").fadeTo(0, translucent);

      $(".stt-gototop").mouseover(function() {
         if(isTransitioned) {
            $(this).fadeTo("slow", opaque);
         }
      }).mouseout(function() {
         if(isTransitioned) {
            $(this).fadeTo("slow", translucent);
         }
      });
   });
})(jQuery);


$(document).ready(function(){
	/*留言和评论验证*/
	$('form[name=myform]').submit(function(){
		if($('#writer').val() == ''){
			alert('昵称不能为空！');
			$('#writer').focus();
			return false;
		}
		if($('#email').val() == ''){
			alert('邮箱不能为空！');
			$('#email').focus();
			return false;
		}
		var reg = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
		var result = reg.test($('#email').val());
		if(result !== true){
			alert('邮件格式不正确！');
			$('#email').focus();
			return false;
		}
		if($('#msg').val() == ''){
			alert('内容不能为空！');
			$('#msg').focus();
			return false;
		}
		if($('#verify').val() == ''){
			alert('验证码不能为空！');
			$('#verify').focus();
			return false;
		}
	});

	
});

/*加载评论或留言*/
function loadContent(url,id,num){
	$.ajax({
		type:'post',
		url:url,
		data:{arcid:id,offset:num},
		dataType:'json',
		success:function(data){
			if(data == ''){
				$('#rui-prompt').text("暂无更多内容").fadeIn();
				setTimeout(function(){$('#rui-prompt').fadeOut();},5000);
			}
			else{
				$.each(data,function(k,v){
					$item = $("<li class='ds-post'><div class='ds-post-self'><div class='ds-avatar'><img src='/Home/Tpl/default/Public/images/logo_03.jpg'></div><div class='ds-comment-body'><div class='ds-comment-header'><span class='ds-user-name'>"+v.writer+"</span></div><div class='rui-conmment-body'>"+v.content+"</div><div class='ds-comment-footer ds-comment-actions'><span class='ds-time'>"+v.time+"</span><a href='#comments' target='_self' class='ds-post-reply'><span class='ds-ui-icon'></span>我也来说</a></div></div></div><ul class='ds-children' id='rui-reply'>"+replyContent(v.reply)+"</ul></li>").hide();
					$('#rui-comments').append($item);
					$item.fadeIn();
				});
			}
		}
	});
}
function replyContent(data){
	var str = '';
	if(data != ''){
		$.each(data,function(k,v){
			str += "<li class='ds-post'><div class='ds-post-self'><div class='ds-avatar'><img src='/Home/Tpl/default/Public/images/reply.png'></div><div class='ds-comment-body'><div class='ds-comment-header'><span class='ds-user-name' style='color:red'>"+v.writer+"</span></div><div class='rui-conmment-body'>"+v.content+"</div><div class='ds-comment-footer ds-comment-actions'><span class='ds-time'>"+v.time+"</span><a href='#comments' target='_self' class='ds-post-reply'><span class='ds-ui-icon'></span>我也来说</a></div></div></div></li>";
		});
	}
	return str;
}

/*加载更多文章*/
function loadArticle(url,flag,num){
	$.ajax({
		type:'post',
		url:url,
		data:{flag:flag,offset:num},
		dataType:'json',
		success:function(data){
			if(data == ''){
				$('#rui-prompt').text("暂无更多内容").fadeIn();
				setTimeout(function(){$('#rui-prompt').fadeOut();},5000);
			}
			else{
				$.each(data,function(k,v){
					$item = $("<div><h2 class='entry-title'><a href='"+v.arcurl+"' title='"+v.title+"'>"+v.title+"</a></h2><div class='entry-meta entry-header'><span class='contentinfo_time'>"+v.createtime+"</span><span class='contentinfo_category'><a href='"+v.colurl+"' title='查看 "+v.colname+" 中的全部文章'>"+v.colname+"</a></span><span class='contentinfo_view'>"+v.click+"次点击</span><span class='contentinfo_comment'>"+v.commentnum+"条评论</span></div><div class='post-thumb post-lead'>"+getPic(v)+"</div><div class='entry-content'><p>"+v.description+"...</p><p><a href='"+v.arcurl+"' class='more-link'>阅读全文 »</a></p></div></div>").hide();
					$('#primary').append($item);
					$item.fadeIn();
				});
				//重新绑定事件
				$('.entry-title a,.more-link').hover(function() { 
					$(this).stop().animate({'marginLeft': '10px'}, 200); 
					}, function() { 
					$(this).stop().animate({'marginLeft': '0px'}, 400); 
				}); 
				$('.entry-title a').click(function(e) {
					e.preventDefault();
					var htm = 'Loading',
					i = 4,
					t = $(this).html(htm).unbind('click'); (function ct() {
						i < 0 ? (i = 4, t.html(htm), ct()) : (t[0].innerHTML += '.', i--, setTimeout(ct, 150))
					})();
					window.location = this.href
				});
			}
		}
	});
}
function getPic(v){
	if(v.pic == ''){
		return '';
	}
	else{
		var pic = "<a href='"+v.arcurl+"' title='"+v.title+"'><img width='570' height='140' src='"+v.pic+"' class='attachment-archive-thumb wp-post-image' alt='"+v.title+"' /></a>";
		return pic;
	}
}
