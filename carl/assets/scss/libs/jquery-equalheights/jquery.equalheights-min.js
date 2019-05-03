/**
 * Equal heights little jQuery plugin by Status201
 * @version 1.0.4
 * @requires jQuery 1.7+
 * @author Gijs Oliemans <gijs[at]status201.nl>
 * @license MIT
 */
!function($){$.fn.equalHeights=function(i){var n={onResize:!0,onLoad:!0},e=$.extend({},n,i),o={},t=0,h=[],s=0,u=0,a,d=$(this);return d.length<2?this:(e.onResize&&$(window).resize(function(){a&&window.clearTimeout(a),a=window.setTimeout(function(){d.equalHeights({onResize:!1,onLoad:!1})},100)}),e.onLoad&&$(window).load(function(){d.equalHeights({onResize:!1,onLoad:!1})}),d.each(function(){h=$(this),h.height("auto"),(s=h.height())>0&&(u=h.position().top,t=u in o,t?s>o[u]?(o[u]=s,$(d).filter(function(){return $(this).position().top==u}).height(s)):h.height(o[u]):(o[u]=s,h.height(o[u])))}),this)}}(jQuery);