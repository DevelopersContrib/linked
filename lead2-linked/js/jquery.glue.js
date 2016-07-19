/*!
 * jQuery Glue plugin
 *
 * @version: 2.1 (14.01.2015)
 * @requires jQuery 1.6.1 or later 
 *
 */

(function ( $ ) {

	$.glue = function( options ) {
		
		var defaults = {
	
			layer : 			"",
			fadespeed : 		400,
			trigger :			[
									'top',
									//'left',
									//'right',
									//'bottom',
									//'all'
								],
			delay : 0,
			interval : 0,
			mintime : 0,
			maxtime : 0,
			maxamount : 0,
			cookie : false,
			bgclickclose : true,
			escclose : true,
			once:false,
			showCount:0,
			onleave : function (e) {},
			disableleftscroll : true	// chrome disable
			
		};
		var settings = $.extend( {}, defaults, options );
		$(settings.layer).hide();
		var startuptime = new Date().getTime();
		var windowHeight = $(window).height();
		var windowWidth = $(window).width();
		var offsetbind = false;
		var howmanytimes = 0;
		var lasttime = 0;
		var chromealert = true;
		var lastx, lasty = 0;
		
		if (/Chrome/.test(navigator.userAgent))
		{
			var chrome = true;
			if ($(document).width() > windowWidth && settings.disableleftscroll == true)
			{
				chromealert = false;
			}
		}
			var conth = parseFloat($(settings.layer).css("height"));
			var contw = parseFloat($(settings.layer).css("width"));
			var reqsettings = {		
				backgroundcss: {'z-index':'1000','display':'none'},
				boxcss: {'z-index':'1000','position':'fixed','left':'50%','top':'50%','height': (conth) + 'px','width': (contw ) + 'px', 'margin-left':(-contw/2)+'px', 'margin-top':(-conth/2) + 'px'}
			};
			$.extend(true, settings, reqsettings);
				$(document).bind('mousemove',function(e)
				{
					lastx = e.pageX;
					lasty = e.pageY;
				});
				$(document).bind('mouseleave', function(e) { setTimeout(function(){ontheleave(e);}, settings.delay); });
				if (chrome)
				{
					$(document).unbind("mouseleave");
					chromefix();
				}
				function chromefix()
				{
					offsetbind = false;
					$(document).bind('mousemove.bindoffset',function(e)
					{
						if (offsetbind)
						{				
							$(document).bind('mouseleave', function(e) { setTimeout(function(){ontheleave(e);}, settings.delay); });
							$(document).unbind("mousemove.bindoffset");
						}
						offsetbind = true;
					});
				}

		$(window).resize(function(e)
		{
			windowHeight = $(window).height();
			windowWidth = $(window).width();
		});
				
		function ontheleave(e)
		{
			
			var scrolltop = document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop;
			var scrollleft = document.documentElement ? document.documentElement.scrollLeft : document.body.scrollLeft;
			scrolltop = ($(document).scrollTop() > scrolltop) ? $(document).scrollTop() : scrolltop;
			scrollleft = ($(document).scrollLeft() > scrollleft) ? $(document).scrollLeft() : scrollleft;
			
			if ((Math.round(e.pageX) == -1 || Math.round(e.pageY) == -1) || (e.pageX == -3 || e.pageY == -3))
			{
				var clienty = -lasty + scrolltop;
				var clientx = lastx - scrollleft;
			} else {
				var clienty = -e.pageY + scrolltop;
				var clientx = e.pageX - scrollleft;
			}

			var ey1 = (-windowHeight / windowWidth) * clientx;
			var ey2 = ((windowHeight / windowWidth) * clientx) - windowHeight;

			var leaveside;
			if (clienty >= ey1)
			{
				if (clienty >= ey2)
				{
					leaveside = "top";
					
				} else {
					leaveside = "right";
				}
			} else {
				if (clienty >= ey2)
				{
					leaveside = "left";
				} else {
					leaveside = "bottom";
				}
			}				

			if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent))
			{
				if (clienty < 0 && clienty > -windowHeight && clientx > 0 && clientx < windowWidth)
				{
					return;
				}
			}
			if ($.inArray(leaveside, settings.trigger) != -1 || $.inArray('all', settings.trigger) != -1)
			{
				var recenttime = new Date().getTime();
				if ((recenttime-startuptime) >= settings.mintime)
				{
					if ((recenttime-startuptime) <= settings.maxtime || settings.maxtime == 0)
					{
						if (howmanytimes < settings.maxamount || settings.maxamount == 0)
						{
							if ((recenttime-lasttime) >= settings.interval || settings.interval == 0)
							{
								if (chromealert)
								{
									var cookiehowm = getamount("ck_glue_visit");
									if (settings.cookie == false || (settings.cookie == true && (cookiehowm < settings.maxamount || settings.maxamount == 0)))
									{
										settings.onleave.call(this, leaveside);
										
										if (settings.layer != "")
										{
											showbox();
										}
										howmanytimes++;
										if (settings.cookie == true)
										{
											cookiehowm++;
											document.cookie="ck_glue_visit="+cookiehowm+"; path=/";
										}
										lasttime = new Date().getTime();
									}
								}
							}
						}
					}
				}
			}
			if (chrome)
			{
				$(document).unbind("mouseleave");
				chromefix();
			}
			
		}

		function showbox()
		{
			if(settings.once){
				if(settings.showCount>0){
					return false;
				}else{
					settings.showCount++;
				}
			}
			if ($.data(document.body, "glue_var") != 1)
			{
				$.data(document.body, "glue_var", 1);
				$('<div class="glue_block_layer"></div>').appendTo('body').css(settings.backgroundcss).fadeIn(settings.fadespeed);
				$('<div class="glue_container"></div>').appendTo('body');
				$(settings.layer).clone().show().css(settings.boxcss).appendTo(".glue_container");
				if (settings.bgclickclose)
				{
					$('.glue_block_layer').click(function(){
						gl_cl();
					});	
				}
				if (settings.escclose)
				{
					$("body").keyup(function(e){
						if(e.which == 27){
							gl_cl();
						}
					});
				}
			}
		}
	};
	
	function getamount(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
		}
		return 0;
	} 
	
	function gl_cl()
	{
		$('.glue_container').fadeOut(function() { $(this).remove(); });	
		$('.glue_block_layer').fadeOut(function() { $(this).remove(); });	
		$.removeData( document.body, "glue_var" );
	}
	
	$.glue_close = function()
	{
		gl_cl();
	}

}( jQuery ));