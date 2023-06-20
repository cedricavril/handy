this.itsec=this.itsec||{},this.itsec["file-writing"]=this.itsec["file-writing"]||{},this.itsec["file-writing"].settings=(window.itsecWebpackJsonP=window.itsecWebpackJsonP||[]).push([[17],{"8CAU":function(e,t,n){},GRId:function(e,t){!function(){e.exports=this.wp.element}()},K9lf:function(e,t){!function(){e.exports=this.wp.compose}()},TvNi:function(e,t){!function(){e.exports=this.wp.plugins}()},YLtl:function(e,t){!function(){e.exports=this.lodash}()},l3Sj:function(e,t){!function(){e.exports=this.wp.i18n}()},on51:function(e,t){!function(){e.exports=this.itsec.pages.settings}()},pVnL:function(e,t){function n(){return e.exports=n=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},e.exports.__esModule=!0,e.exports.default=e.exports,n.apply(this,arguments)}e.exports=n,e.exports.__esModule=!0,e.exports.default=e.exports},ppSj:function(e,t,n){"use strict";n.d(t,"k",(function(){return i})),n.d(t,"g",(function(){return l})),n.d(t,"h",(function(){return a})),n.d(t,"j",(function(){return p})),n.d(t,"i",(function(){return h})),n.d(t,"f",(function(){return m})),n.d(t,"a",(function(){return O})),n.d(t,"b",(function(){return w})),n.d(t,"c",(function(){return v})),n.d(t,"d",(function(){return E})),n.d(t,"e",(function(){return y}));var r=n("pVnL"),o=n.n(r),s=n("GRId"),c=n("K9lf");function i(e){return Object(c.createHigherOrderComponent)(t=>class extends s.Component{render(){return Object(s.createElement)(t,o()({},this.props,e))}},"withProps")}var u=n("YLtl");
/**
 * Higher-order component that debounces an action.
 *
 * @license https://github.com/deepsweet/hocs/tree/master/packages/debounce-handler (MIT)
 *
 * @param {string}          handlerName
 * @param {number|Function} wait
 * @param {Object}          [options]
 * @return {WPComponent} Debounced component.
 */function l(e,t){let n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return Object(c.createHigherOrderComponent)(r=>class extends s.Component{constructor(){var r;super(...arguments),r=this,this.debouncedPropInvoke=Object(u.debounce)((function(){return r.props[e](...arguments)}),"function"==typeof t?t(this.props):t,n),this.handler=function(e){e&&"function"==typeof e.persist&&e.persist();for(var t=arguments.length,n=new Array(t>1?t-1:0),o=1;o<t;o++)n[o-1]=arguments[o];return r.debouncedPropInvoke(e,...n)}}componentWillUnmount(){this.debouncedPropInvoke.cancel()}render(){const t={...this.props,[e]:this.handler};return Object(s.createElement)(r,t)}},"withDebounceHandler")}function a(e,t){let n;return n=Object(u.isFunction)(t)?[{delay:e,cb:t}]:e,Object(c.createHigherOrderComponent)(e=>class extends s.Component{constructor(){super(...arguments),this.intervalIds=[]}componentDidMount(){for(const e of n)(t=>{this.intervalIds.push(setInterval(()=>t(this.props),e.delay))})(e.cb)}componentWillUnmount(){this.intervalIds.forEach(clearInterval)}render(){return Object(s.createElement)(e,this.props)}},"withInterval")}var d=n("lSNA"),f=n.n(d);Object(c.createHigherOrderComponent)(e=>{var t;return t=class extends s.Component{constructor(){super(...arguments),f()(this,"state",{width:1280}),f()(this,"mounted",!1),f()(this,"ref",null),f()(this,"onWindowResize",()=>{if(!this.mounted)return;const e=Object(s.findDOMNode)(this);if(e instanceof window.HTMLElement){const t=e.offsetWidth;this.setState({width:t})}})}componentDidMount(){this.mounted=!0,window.addEventListener("resize",this.onWindowResize),document.getElementById("collapse-button").addEventListener("click",this.onWindowResize),this.onWindowResize()}componentWillUnmount(){this.mounted=!1,window.removeEventListener("resize",this.onWindowResize),document.getElementById("collapse-button").removeEventListener("click",this.onWindowResize)}render(){const{measureBeforeMount:t,...n}=this.props;return t&&!this.mounted?Object(s.createElement)("div",{className:this.props.className,style:this.props.style}):Object(s.createElement)(e,o()({},n,{width:this.state.width+20}))}},f()(t,"defaultProps",{measureBeforeMount:!1}),t},"withWidth");var p=Object(c.createHigherOrderComponent)(e=>class extends s.Component{constructor(){super(...arguments),f()(this,"state",{pressed:{shift:!1,ctrl:!1,meta:!1,alt:!1}}),f()(this,"mounted",!1),this.listener=this.listener.bind(this),this.onBlur=this.onBlur.bind(this)}componentDidMount(){this.mounted=!0,window.addEventListener("keydown",this.listener),window.addEventListener("keyup",this.listener),window.addEventListener("click",this.listener),window.addEventListener("blur",this.onBlur)}componentWillUnmount(){this.mounted=!1,window.removeEventListener("keydown",this.listener),window.removeEventListener("keyup",this.listener),window.removeEventListener("click",this.listener),window.removeEventListener("blur",this.onBlur)}listener(e){this.mounted&&this.setState({pressed:{shift:e.shiftKey,ctrl:e.ctrlKey,meta:e.metaKey,alt:e.altKey}})}onBlur(){this.setState({pressed:{shift:!1,ctrl:!1,meta:!1,alt:!1}})}render(){return Object(s.createElement)(e,o()({pressedModifierKeys:this.state.pressed},this.props))}},"withPressedModifierKeys");var h=Object(c.createHigherOrderComponent)(e=>function(t){let{navigate:n,...r}=t;return Object(s.createElement)(e,o()({},r,{onClick:e=>{try{r.onClick&&r.onClick(e)}catch(t){throw e.preventDefault(),t}e.defaultPrevented||0!==e.button||r.target&&"_self"!==r.target||function(e){return!!(e.metaKey||e.altKey||e.ctrlKey||e.shiftKey)}(e)||(e.preventDefault(),n())}}))},"withNavigate");const b=new WeakMap;function m(e,t){Object(s.useLayoutEffect)(()=>{b.has(e)||(t(),b.set(e,!0))},[])}function O(e){let t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];const[n,r]=Object(s.useState)("idle"),[o,c]=Object(s.useState)(null),[i,u]=Object(s.useState)(null),l=Object(s.useCallback)((function(){return r("pending"),u(null),e(...arguments).then(e=>{c(e),r("success")}).catch(e=>{u(e),c(null),r("error")})}),[e]);return Object(s.useEffect)(()=>{t&&l()},[l,t]),{execute:l,status:n,value:o,error:i}}function w(e,t){let n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:window;const r=Object(s.useRef)();Object(s.useEffect)(()=>{r.current=t},[t]),Object(s.useEffect)(()=>{if(!n||!n.addEventListener)return;const t=e=>r.current(e);return n.addEventListener(e,t),()=>n.removeEventListener(e,t)},[e,n])}const j=["button","submit"];function v(e){const t=Object(s.useRef)(e);Object(s.useEffect)(()=>{t.current=e},[e]);const n=Object(s.useRef)(!1),r=Object(s.useRef)(),o=Object(s.useCallback)(()=>{clearTimeout(r.current)},[]);Object(s.useEffect)(()=>()=>o(),[]),Object(s.useEffect)(()=>{e||o()},[e,o]);const c=Object(s.useCallback)(e=>{const{type:t,target:r}=e;Object(u.includes)(["mouseup","touchend"],t)?n.current=!1:function(e){if(!(e instanceof window.HTMLElement))return!1;switch(e.nodeName){case"A":case"BUTTON":return!0;case"INPUT":return Object(u.includes)(j,e.type)}return!1}(r)&&(n.current=!0)},[]),i=Object(s.useCallback)(e=>{e.persist(),n.current||(r.current=setTimeout(()=>{document.hasFocus()?"function"==typeof t.current&&t.current(e):e.preventDefault()},0))},[]);return{onFocus:o,onMouseDown:c,onMouseUp:c,onTouchStart:c,onTouchEnd:c,onBlur:i}}function E(e,t){const[n,r]=Object(s.useState)(()=>{try{const n=window.localStorage.getItem(e);return n?JSON.parse(n):t}catch(e){return console.error(e),t}});return[n,t=>{try{const o=t instanceof Function?t(n):t;r(o),window.localStorage.setItem(e,JSON.stringify(o))}catch(e){console.error(e)}}]}function y(e){const t=Object(s.useRef)(null),n=Object(s.useRef)(!1),r=Object(s.useRef)(e),o=Object(s.useRef)(e);return o.current=e,Object(s.useLayoutEffect)(()=>{e.forEach((e,o)=>{const s=r.current[o];"function"==typeof e&&e!==s&&!1===n.current&&(s(null),e(t.current))}),r.current=e},e),Object(s.useLayoutEffect)(()=>{n.current=!1}),Object(s.useCallback)(e=>{t.current=e,n.current=!0;(e?o.current:r.current).forEach(t=>{"function"==typeof t?t(e):t&&t.hasOwnProperty("current")&&(t.current=e)})},[])}},"tI+e":function(e,t){!function(){e.exports=this.wp.components}()},ywyh:function(e,t){!function(){e.exports=this.wp.apiFetch}()},zRop:function(e,t,n){"use strict";n.r(t);var r=n("GRId"),o=n("l3Sj"),s=n("TvNi"),c=n("tI+e"),i=n("ywyh"),u=n.n(i),l=n("on51"),a=n("ppSj");n("8CAU");function d(){return u()({path:"/ithemes-security/rpc/file-writing/get-config-rules"})}function f(e){let{rules:t}=e;return t.length?Object(r.createElement)("pre",{className:"itsec-file-writing-config-rules"},t):Object(r.createElement)("p",null,Object(o.__)("There are no rules that need to be written.","better-wp-security"))}function p(e){let{rules:t}=e;const[n,s]=Object(r.useState)(!1);return t.length?Object(r.createElement)(c.ClipboardButton,{isSecondary:!0,text:t,onCopy:()=>s(!0),onFinishCopy:()=>s(!1)},n?Object(o.__)("Copied!","better-wp-security"):Object(o.__)("Copy Rules","better-wp-security")):null}function h(){const{status:e,value:t}=Object(a.a)(d);return"success"!==e?null:Object(r.createElement)(React.Fragment,null,Object(r.createElement)(l.ToolFill,{tool:"server-config-rules"},Object(r.createElement)(f,{rules:t.server})),Object(r.createElement)(l.ToolFill,{tool:"wp-config-rules"},Object(r.createElement)(f,{rules:t.wp})),Object(r.createElement)(l.ToolFill,{tool:"server-config-rules",area:"actions"},Object(r.createElement)(p,{rules:t.server})),Object(r.createElement)(l.ToolFill,{tool:"wp-config-rules",area:"actions"},Object(r.createElement)(p,{rules:t.wp})))}n.p=window.itsecWebpackPublicPath,Object(o.setLocaleData)({"":{}},"ithemes-security-pro"),Object(s.registerPlugin)("itsec-file-writing-settings",{render:()=>Object(r.createElement)(h,null)})}},[["zRop",0,1]]]);