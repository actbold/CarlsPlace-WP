!function(e){e.extend({browserSelector:function(){var e=navigator.userAgent,t=e.toLowerCase(),o=function(e){return t.indexOf(e)>-1},r="gecko",n="webkit",a="safari",i="opera",l=document.documentElement,u=[!/opera|webtv/i.test(t)&&/msie\s(\d)/.test(t)?"ie ie"+parseFloat(navigator.appVersion.split("MSIE")[1]):o("firefox/2")?r+" ff2":o("firefox/3.5")?r+" ff3 ff3_5":o("firefox/3")?r+" ff3":o("gecko/")?r:o("opera")?i+(/version\/(\d+)/.test(t)?" "+i+RegExp.jQuery1:/opera(\s|\/)(\d+)/.test(t)?" "+i+RegExp.jQuery2:""):o("konqueror")?"konqueror":o("chrome")?n+" chrome":o("iron")?n+" iron":o("applewebkit/")?n+" "+a+(/version\/(\d+)/.test(t)?" "+a+RegExp.jQuery1:""):o("mozilla/")?r:"",o("j2me")?"mobile":o("iphone")?"iphone":o("ipod")?"ipod":o("mac")?"mac":o("darwin")?"mac":o("webtv")?"webtv":o("win")?"win":o("freebsd")?"freebsd":o("x11")||o("linux")?"linux":"","js"];c=u.join(" "),l.className+=" "+c}})}(jQuery),function(e){e.extend({smoothScroll:function(){function e(){var e=!1;if(document.URL.indexOf("google.com/reader/view")>-1&&(e=!0),g.excluded){var t=g.excluded.split(/[,\n] ?/);t.push("mail.google.com");for(var o=t.length;o--;)if(document.URL.indexOf(t[o])>-1){M&&M.disconnect(),u("mousewheel",r),e=!0,v=!0;break}}e&&u("keydown",n),g.keyboardSupport&&!e&&c("keydown",n)}function t(){if(document.body){var t=document.body,o=document.documentElement,r=window.innerHeight,n=t.scrollHeight;if(k=document.compatMode.indexOf("CSS")>=0?o:t,S=t,e(),x=!0,top!=self)b=!0;else if(n>r&&(t.offsetHeight<=r||o.offsetHeight<=r)){var a=!1,i=function(){a||o.scrollHeight==document.height||(a=!0,setTimeout(function(){o.style.height=document.height+"px",a=!1},500))};o.style.height="auto",setTimeout(i,10);var l={attributes:!0,childList:!0,characterData:!1};if(M=new z(i),M.observe(t,l),k.offsetHeight<=r){var c=document.createElement("div");c.style.clear="both",t.appendChild(c)}}if(document.URL.indexOf("mail.google.com")>-1){var u=document.createElement("style");u.innerHTML=".iu { visibility: hidden }",(document.getElementsByTagName("head")[0]||o).appendChild(u)}else if(document.URL.indexOf("www.facebook.com")>-1){var s=document.getElementById("home_stream");s&&(s.style.webkitTransform="translateZ(0)")}g.fixedBackground||v||(t.style.backgroundAttachment="scroll",o.style.backgroundAttachment="scroll")}}function o(e,t,o,r){if(r||(r=1e3),d(t,o),1!=g.accelerationMax){var n=+new Date,a=n-L;if(a<g.accelerationDelta){var i=(1+30/a)/2;i>1&&(i=Math.min(i,g.accelerationMax),t*=i,o*=i)}L=+new Date}if(E.push({x:t,y:o,lastX:t<0?.99:-.99,lastY:o<0?.99:-.99,start:+new Date}),!T){var l=e===document.body,c=function(n){for(var a=+new Date,i=0,u=0,s=0;s<E.length;s++){var d=E[s],f=a-d.start,m=f>=g.animationTime,p=m?1:f/g.animationTime;g.pulseAlgorithm&&(p=h(p));var w=d.x*p-d.lastX>>0,v=d.y*p-d.lastY>>0;i+=w,u+=v,d.lastX+=w,d.lastY+=v,m&&(E.splice(s,1),s--)}l?window.scrollBy(i,u):(i&&(e.scrollLeft+=i),u&&(e.scrollTop+=u)),t||o||(E=[]),E.length?j(c,e,r/g.frameRate+1):T=!1};j(c,e,0),T=!0}}function r(e){x||t();var r=e.target,n=l(r);if(!n||e.defaultPrevented||s(S,"embed")||s(r,"embed")&&/\.pdf/i.test(r.src))return!0;var a=e.wheelDeltaX||0,i=e.wheelDeltaY||0;if(a||i||(i=e.wheelDelta||0),!g.touchpadSupport&&f(i))return!0;Math.abs(a)>1.2&&(a*=g.stepSize/120),Math.abs(i)>1.2&&(i*=g.stepSize/120),o(n,-a,-i),e.preventDefault()}function n(e){var t=e.target,r=e.ctrlKey||e.altKey||e.metaKey||e.shiftKey&&e.keyCode!==H.spacebar;if(/input|textarea|select|embed/i.test(t.nodeName)||t.isContentEditable||e.defaultPrevented||r)return!0;if(s(t,"button")&&e.keyCode===H.spacebar)return!0;var n,a=0,i=0,c=l(S),u=c.clientHeight;switch(c==document.body&&(u=window.innerHeight),e.keyCode){case H.up:i=-g.arrowScroll;break;case H.down:i=g.arrowScroll;break;case H.spacebar:n=e.shiftKey?1:-1,i=-n*u*.9;break;case H.pageup:i=.9*-u;break;case H.pagedown:i=.9*u;break;case H.home:i=-c.scrollTop;break;case H.end:var d=c.scrollHeight-c.scrollTop-u;i=d>0?d+10:0;break;case H.left:a=-g.arrowScroll;break;case H.right:a=g.arrowScroll;break;default:return!0}o(c,a,i),e.preventDefault()}function a(e){S=e.target}function i(e,t){for(var o=e.length;o--;)C[R(e[o])]=t;return t}function l(e){var t=[],o=k.scrollHeight;do{var r=C[R(e)];if(r)return i(t,r);if(t.push(e),o===e.scrollHeight){if(!b||k.clientHeight+10<o)return i(t,document.body)}else if(e.clientHeight+10<e.scrollHeight&&(overflow=getComputedStyle(e,"").getPropertyValue("overflow-y"),"scroll"===overflow||"auto"===overflow))return i(t,e)}while(e=e.parentNode)}function c(e,t,o){window.addEventListener(e,t,o||!1)}function u(e,t,o){window.removeEventListener(e,t,o||!1)}function s(e,t){return(e.nodeName||"").toLowerCase()===t.toLowerCase()}function d(e,t){e=e>0?1:-1,t=t>0?1:-1,y.x===e&&y.y===t||(y.x=e,y.y=t,E=[],L=0)}function f(e){if(e){e=Math.abs(e),D.push(e),D.shift(),clearTimeout(N);var t=D[0]==D[1]&&D[1]==D[2],o=m(D[0],120)&&m(D[1],120)&&m(D[2],120);return!(t||o)}}function m(e,t){return Math.floor(e/t)==e/t}function p(e){var t,o,r;return e*=g.pulseScale,e<1?t=e-(1-Math.exp(-e)):(o=Math.exp(-1),e-=1,r=1-Math.exp(-e),t=o+r*(1-o)),t*g.pulseNormalize}function h(e){return e>=1?1:e<=0?0:(1==g.pulseNormalize&&(g.pulseNormalize/=p(1)),p(e))}var w={frameRate:150,animationTime:700,stepSize:80,pulseAlgorithm:!0,pulseScale:8,pulseNormalize:1,accelerationDelta:20,accelerationMax:1,keyboardSupport:!0,arrowScroll:50,touchpadSupport:!0,fixedBackground:!0,excluded:""},g=w,v=!1,b=!1,y={x:0,y:0},x=!1,k=document.documentElement,S,M,D=[120,120,120],H={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36},E=[],T=!1,L=+new Date,C={};setInterval(function(){C={}},1e4);var R=function(){var e=0;return function(t){return t.uniqueID||(t.uniqueID=e++)}}(),N,j=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||function(e,t,o){window.setTimeout(e,o||1e3/60)}}(),z=window.MutationObserver||window.WebKitMutationObserver;c("mousedown",a),c("mousewheel",r),c("load",t)}})}(jQuery);