!function(){var t={7678:function(t){t.exports=function(t){const e=window.pageXOffset||document.documentElement.scrollLeft,n=function(t){const e=document.body,n=document.documentElement,o=t.getBoundingClientRect(),r=n.clientHeight,i=Math.max(e.scrollHeight,e.offsetHeight,n.clientHeight,n.scrollHeight,n.offsetHeight),c=o.bottom-r/2-o.height/2,u=i-r;return Math.min(c+window.pageYOffset,u)}(t);window.scrollTo(e,n)}}},e={};function n(o){var r=e[o];if(void 0!==r)return r.exports;var i=e[o]={exports:{}};return t[o](i,i.exports,n),i.exports}n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,{a:e}),e},n.d=function(t,e){for(var o in e)n.o(e,o)&&!n.o(t,o)&&Object.defineProperty(t,o,{enumerable:!0,get:e[o]})},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},function(){"use strict";var t=n(7678),e=n.n(t);const o=window.mc4wp_submitted_form,r=window.mc4wp.forms;if(o){const t=document.getElementById(o.element_id);!function(t,n,i,c){const u=Date.now(),s=document.body.clientHeight;i&&t.setData(c),window.scrollY<=10&&o.auto_scroll&&e()(t.element),window.addEventListener("load",(function(){r.trigger("submitted",[t]),i?r.trigger("error",[t,i]):(r.trigger("success",[t,c]),r.trigger(n,[t,c]),"updated_subscriber"===n&&r.trigger("subscribed",[t,c,!0]));const d=Date.now()-u;o.auto_scroll&&d>1e3&&d<2e3&&document.body.clientHeight!==s&&e()(t.element)}))}(r.getByElement(t),o.event,o.errors,o.data)}}()}();