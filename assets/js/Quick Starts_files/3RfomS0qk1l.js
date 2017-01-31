/*!CK:3418188467!*//*1421172828,*/

(self.TimeSlice ? self.TimeSlice.guard : function(f) { return f; })(function() {if (self.CavalryLogger) { CavalryLogger.start_js(["azqHs"]); }

__d("XUITokenizerEvents",["keyMirror"],function(a,b,c,d,e,f,g){var h=g({ON_ADD:true,ON_REMOVE:true,ON_INPUT_BLUR:true});e.exports=h;},null);
__d("XUITokenizerWrapper.react",["React","XUITokenizer.react","createObjectFrom"],function(a,b,c,d,e,f,g,h,i){var j=g.PropTypes,k=g.createClass({displayName:"XUITokenizerWrapper",propTypes:{name:j.string.isRequired,className:j.string,placeholder:j.string,initialEntries:j.array,viewStyle:j.oneOf(['textonly','rich']).isRequired,tokenStyle:j.oneOf(['textonly','rich']),selectOnBlur:j.bool,searchSource:j.object.isRequired,excludedEntries:j.array,limit:j.number,testID:j.string,onAddEntry:j.func,onRemoveEntry:j.func,onInputBlur:j.func},getInitialState:function(){return {entries:this.props.initialEntries||[],queryString:''};},reset:function(){this.setState(this.getInitialState());},setQueryString:function(l){this.setState({queryString:l});},_getQueryString:function(){return this.state.queryString||this.props.queryString||'';},_renderHiddenInput:function(l){var m=l.getUniqueID();return (g.createElement("input",{key:m,type:"hidden",name:this.props.name+'[]',value:m}));},_onAddEntry:function(l){var m=this.state.entries.slice();m.push(l);this.setState({entries:m,queryString:''});this.props.onAddEntry&&this.props.onAddEntry({entry:l});},_onRemoveEntry:function(l){var m=this.state.entries.slice(),n=m.indexOf(l);m.splice(n,1);this.setState({entries:m});this.props.onRemoveEntry&&this.props.onRemoveEntry({entry:l});},_onQueryStringChange:function(event){this.setState({queryString:event.target.value});},render:function(){return (g.createElement("div",null,this.state.entries.map(this._renderHiddenInput),g.createElement(h,{key:"tokenizer",className:this.props.className,placeholder:this.props.placeholder,searchSource:this.props.searchSource,entries:this.state.entries,excludedEntries:i(this.props.excludedEntries,true),focusedOnInit:this.props.focusedOnInit,viewStyle:this.props.viewStyle,tokenStyle:this.props.tokenStyle,onAddEntryAttempt:this._onAddEntry,onRemoveEntryAttempt:this._onRemoveEntry,onQueryStringChange:this._onQueryStringChange,onInputBlur:this.props.onInputBlur,queryString:this._getQueryString(),selectOnBlur:this.props.selectOnBlur,limit:this.props.limit,testID:this.props.testID})));}});e.exports=k;},null);
__d("XUITokenizerWrapper",["ArbiterMixin","React","XUITokenizerEvents","XUITokenizerWrapper.react","mixin"],function(a,b,c,d,e,f,g,h,i,j,k){var l=k(g);for(var m in l)if(l.hasOwnProperty(m))o[m]=l[m];var n=l===null?null:l.prototype;o.prototype=Object.create(n);o.prototype.constructor=o;o.__superConstructor__=l;function o(p,q){"use strict";this.$XUITokenizerWrapper0=p;this.$XUITokenizerWrapper1=q;this.$XUITokenizerWrapper2();}o.prototype.setSearchSource=function(p){"use strict";this.$XUITokenizerWrapper1=Object.assign({},this.$XUITokenizerWrapper1,{searchSource:p});this.$XUITokenizerWrapper2();};o.prototype.reset=function(){"use strict";this.$XUITokenizerWrapper3.reset();};o.prototype.setQueryString=function(p){"use strict";this.$XUITokenizerWrapper3.setQueryString(p);};o.prototype.$XUITokenizerWrapper2=function(){"use strict";this.$XUITokenizerWrapper3=h.render(h.createElement(j,h.__spread({},this.$XUITokenizerWrapper1,{onAddEntry:this.$XUITokenizerWrapper4.bind(this),onRemoveEntry:this.$XUITokenizerWrapper5.bind(this),onInputBlur:this.$XUITokenizerWrapper6.bind(this)})),this.$XUITokenizerWrapper0);};o.prototype.$XUITokenizerWrapper4=function(p){"use strict";this.inform(i.ON_ADD,p);};o.prototype.$XUITokenizerWrapper5=function(p){"use strict";this.inform(i.ON_REMOVE,p);};o.prototype.$XUITokenizerWrapper6=function(){"use strict";this.inform(i.ON_INPUT_BLUR,null);};e.exports=o;},null);
__d("DeveloperAppColorPicker",["Event","Style"],function(a,b,c,d,e,f,g,h){function i(j,k){if(k.trim()===''){h.set(j,'backgroundColor','transparent');return;}h.set(j,'backgroundColor','#'+k);}e.exports={bindColorPickerInputAndPreview:function(j,k){var l=j.getAttribute('value');i(k,l);g.listen(j,'input',function(event){var m=new RegExp(("^[0-9a-fA-F]{"+j.value.length+"}$"));if(m.test(j.value)){l=j.value;i(k,j.value);}else{j.value=l;i(k,'');}});}};},null);
__d("DeveloperAppDisableInstaller",["Event","DOM"],function(a,b,c,d,e,f,g,h){var i={init:function(j,k){var l=h.find(j,'input'),m=h.find(k,'input');this.updateEnable(l,m);g.listen(j,'click',function(){i.updateEnable(l,m);});},updateEnable:function(j,k){k.disabled=j.checked;if(j.checked)k.checked=true;}};e.exports=i;},null);
__d("DeveloperAppOptionalField",["CSS","cx","DOM","Event"],function(a,b,c,d,e,f,g,h,i,j){var k={init:function(l,m,n){n=n||[];var o=i.find(l,'input');this.updateVisibility(o,m,n);m.concat(n).forEach(function(p){return g.addClass(p,"_5tcg");});j.listen(o,'click',function(){k.updateVisibility(o,m,n);});},_updateVisibilityElems:function(l,m){m.forEach(function(n){return g.conditionClass(n,"_5q5h",l);});},updateVisibility:function(l,m,n){this._updateVisibilityElems(!l.checked,m);this._updateVisibilityElems(l.checked,n);}};e.exports=k;},null);
__d("DeveloperAppInlineValidation",["CSS","DOM","Event","Parent","Vector","DOMScroll","cx"],function(a,b,c,d,e,f,g,h,i,j,k,l,m){var n=150,o={registerPopup:function(p,q){i.listen(p,'mouseenter',function(event){var r=j.byClass(p,"_5b_j");if(g.hasClass(r,'valid')||!r.hasOwnProperty('_errors'))return;var s=h.find(q.getContent(),'div.'+"_5p3t");h.setContent(s,h.create('ul',{},r._errors.map(function(t){return h.create('li',{},t);})));});},isInvalid:function(p){return g.hasClass(p,'validated')&&!g.hasClass(p,'valid');},isValid:function(p){return g.hasClass(p,'validated')&&g.hasClass(p,'valid');},setValid:function(p){g.addClass(p,'validated');g.addClass(p,'valid');},setInvalid:function(p,q){p._errors=q;g.addClass(p,'validated');g.removeClass(p,'valid');},clearFlags:function(p){g.removeClass(p,'validated');g.removeClass(p,'valid');},show:function(p,q){if(!q)q=document;var r=null;h.scry(q,'div.'+"_5b_j").forEach(function(s){var t=s.firstChild.firstChild,u=t.getAttribute('class');if(u&&u.indexOf("_59fh")!==-1)t=t.firstChild;var v=t.getAttribute('name');if(!v)v=t.getAttribute('id');if(p.hasOwnProperty(v)){this.setInvalid(s,p[v]);var w=k.getElementPosition(s);if(!r||w<r)r=w;return;}this.clearFlags(s);}.bind(this));if(r){r.y-=n;l.scrollTo(r);}},updateValidations:function(p,q){if(!q)q=document;var r=h.scry(q,'div.'+"_5b_j").some(function(s){return g.hasClass(s,'validated');});if(!r)return;this.show(p,q);},clearAllValidations:function(p){if(!p)p=document;h.scry(p,'div.'+"_5b_j").forEach(function(q){return this.clearFlags(q);}.bind(this));}};e.exports=o;},null);
__d("DevsiteAppUpgradeBanner",["AsyncRequest","DOMEventListener","XDeveloperUpgradeBannerHideAsyncControllerURIBuilder"],function(a,b,c,d,e,f,g,h,i){var j={init:function(k){h.add(k,'click',function(){new g().setMethod('POST').setURI(new i().getURI()).send();});}};e.exports=j;},null);
__d("DevsiteHeaderFixedElement",["CSS","DOM","DOMEventListener","cx"],function(a,b,c,d,e,f,g,h,i,j){var k={initClose:function(l,m){i.add(m,'click',function(){g.addClass(l.parentNode,"_4h2v");setTimeout(function(){return h.remove(l.parentNode);},1000);});}};e.exports=k;},null);
__d("DevsiteVitalsConstants",[],function(a,b,c,d,e,f){var g={CARD_LINK:'From card',ADD_PLATFORM:'Add platform',CANCEL_ADD:'Cancel add platform'};e.exports=g;},null);
__d("DeveloperAppPlatformSelector",["React","Animation","CSS","DeveloperAppPlatform","Grid.react","XUIText.react","cx","cssVar","DevsiteVitalsConstants"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){var p=g.PropTypes,q=k.GridItem,r=g.createClass({displayName:"DeveloperAppPlatformSelector",propTypes:{onSelect:p.func.isRequired,animateOnSelect:p.bool,visiblePlatforms:p.array.isRequired,disabledPlatforms:p.array},_onClick:function(s){if(this._platformDisabled(s))return;if(this.props.animateOnSelect===false)return this.props.onSelect(s);var t=this.refs[(s+"-image")].getDOMNode();i.toggle(this.refs[(s+"-selected-image")].getDOMNode());i.toggleClass(t,'active');new h(t).to('opacity',0).duration(600).ondone(function(){return this.props.onSelect(s);}.bind(this)).go();new h(this.refs[(s+"-label")].getDOMNode()).to('color',"#5890ff").duration(600).go();},_platformDisabled:function(s){return (this.props.disabledPlatforms&&this.props.disabledPlatforms.indexOf(s)!=-1);},render:function(){var s=this.props.visiblePlatforms.map(function(t){return (g.createElement(q,{className:(("_5s9l")+(this._platformDisabled(t)?' '+"disabled":'')),"data-vitals":o.CARD_LINK+' , '+j.labels[t],onClick:this._onClick.bind(this,t),key:t},g.createElement("div",{className:"_5uuz"},g.createElement("div",{"data-platform":t,className:"_5s9m selected active hidden_elem",ref:(t+"-selected-image")}),g.createElement("div",{"data-platform":t,className:"_5s9m",ref:(t+"-image")})),g.createElement(l,{weight:"bold",size:"medium",display:"block",className:"mtm",ref:(t+"-label")},j.labels[t])));}.bind(this));return (g.createElement(k,{cols:4,fixed:true,className:"_5s9o"},s));}});e.exports=r;},null);
__d("DevsiteBasicSettings",["CSS","DOM","DOMScroll","Vector","$","cx"],function(a,b,c,d,e,f,g,h,i,j,k,l){var m={updateAddPlatformButton:function(){g.conditionShow(k('add-platform-button'),m.getHiddenPlatformCards().length);},getAddedPlatformCards:function(){return h.scry(document,'div.'+"_5t1j"+':not(.hidden_elem)');},getHiddenPlatformCards:function(){return h.scry(document,'div.'+"_5t1j"+'.hidden_elem');},removePlatform:function(n){g.hide(n);m.getPlatformCheckbox(n).checked=false;m.updateAddPlatformButton();},addPlatform:function(n){var o=h.find(document,'div.'+m.getPlatformCardClass(n));g.show(o);m.getPlatformCheckbox(o).checked=true;m.updateAddPlatformButton();var p=j.getScrollPosition(),q=j.getElementPosition(o),r=new j(p.x,q.y-100,'document');i.scrollTo(r);g.addClass(o,"_5tqe");g.addClass(o,"_5tqf");setTimeout(function(){g.removeClass(o,"_5tqf");},4000);},getPlatformCheckbox:function(n){return h.find(n,'input[type="checkbox"][name="platforms[]"]');},getPlatformCardClass:function(n){switch(n){case 'android':return "_59f_";case 'ios':return "_59g1";case 'playstation':return "_59g5";case 'xbox':return "_59g6";case 'web':return "_59g7";case 'canvas':return "_59g9";case 'windows':return "_59gt";case 'page_tab':return "_59g-";}}};e.exports=m;},null);
__d("DeveloperAppPlatformSelectorDialog",["React","ReactLayeredComponentMixin","DeveloperAppPlatformSelector","DevsiteBasicSettings","Image.react","ReactPropTypes","XUIButton.react","XUIDialog.react","XUIDialogBody.react","XUIDialogCancelButton.react","XUIDialogFooter.react","XUIDialogTitle.react","fbt","cx","ix","DevsiteVitalsConstants"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v){var w=g.createClass({displayName:"DeveloperAppPlatformSelectorDialog",mixins:[h],getInitialState:function(){return {dialogShown:false,disabledPlatforms:[]};},propTypes:{visiblePlatforms:l.array.isRequired},render:function(){return (g.createElement(m,{type:"button",size:"xxlarge",rel:"async","data-vitals":v.CARD_LINK+' , '+v.ADD_PLATFORM,image:g.createElement(k,{src:u('/images/ui/x/image/plus.png')}),label:"Add Platform",onClick:function(event){return this.show();}.bind(this)}));},_onSelect:function(x){this.hide();setTimeout(function(){j.addPlatform(x);},450);},renderLayers:function(){return {dialog:g.createElement(n,{shown:this.state.dialogShown,width:680,modal:true,layerHideOnBlur:false},g.createElement(r,{showCloseButton:false},"Select Platform"),g.createElement(o,{className:"_5t1i"},g.createElement("img",{height:"1",width:"1",src:"https://sact.atdmt.com/action/fuspmg_GamesCanvasSettings"+"Page_1"}),g.createElement(i,{onSelect:this._onSelect,visiblePlatforms:this.props.visiblePlatforms,disabledPlatforms:this.state.disabledPlatforms,animateOnSelect:false})),g.createElement(q,null,g.createElement(p,{"data-vitals":v.CARD_LINK+' , '+v.CANCEL_ADD})))};},show:function(){var x=[];j.getAddedPlatformCards().forEach(function(y){return x.push(j.getPlatformCheckbox(y).getAttribute('value'));});this.setState({dialogShown:true,disabledPlatforms:x});},hide:function(){this.setState({dialogShown:false});}});e.exports=w;},null);
__d("DevsiteExternalPlatformCard",["DevsiteBasicSettings","Event"],function(a,b,c,d,e,f,g,h){function i(j,k){"use strict";h.listen(k,'click',function(event){g.removePlatform(j);return false;});}e.exports=i;},null);
__d("DevsiteNullSearchSource",["AbstractSearchSource","SearchableEntry"],function(a,b,c,d,e,f,g,h){for(var i in g)if(g.hasOwnProperty(i))k[i]=g[i];var j=g===null?null:g.prototype;k.prototype=Object.create(j);k.prototype.constructor=k;k.__superConstructor__=g;function k(){"use strict";if(g!==null)g.apply(this,arguments);}k.prototype.searchImpl=function(l,m,n){"use strict";l=l.trim();if(l==='')return;var o=new h({uniqueID:l,title:l});m([o],l);};e.exports=k;},null);

}, 'remote script ')();