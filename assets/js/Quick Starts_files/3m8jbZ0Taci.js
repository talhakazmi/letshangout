/*!CK:171794123!*//*1421163921,*/

(self.TimeSlice ? self.TimeSlice.guard : function(f) { return f; })(function() {if (self.CavalryLogger) { CavalryLogger.start_js(["y5tIa"]); }

__d("DevsiteURLFragmentHandler",["Arbiter","HistoryManager","URI"],function(a,b,c,d,e,f,g,h,i){var j={registerTransitionHandler:function(){g.subscribe('page_fragment_transition',function(k,l){var m=i.getRequestURI().setFragment(l.fragment),n=h.lastURI&&m.toString()===h.lastURI.toString();h.go(m.toString(),false,n);});}};e.exports=j;},null);
__d("DevsiteLinkDialog",["AsyncRequest","Event","URI","$"],function(a,b,c,d,e,f,g,h,i,j){var k={showRegistered:function(l,m,n){h.listen(j(l),'click',function(){n.show();return false;});var o=l.match(RegExp('^'+m+'(.+)'));if(o&&o[1]===i.getRequestURI().getFragment())n.show();},showAsync:function(l,m){h.listen(j(l),'click',function(){new g().setURI(m).send();return false;});}};e.exports=k;},null);
__d("DevsiteNavColumnFixedScrolling",["CSS","DOM","Event","Vector","cx"],function(a,b,c,d,e,f,g,h,i,j,k){var l=12,m={registerListeners:function(n){i.listen(window,'scroll',o);i.listen(window,'resize',o);function o(){var p=j.getViewportDimensions().y,q=p+j.getScrollPosition().y,r=n.firstChild,s=r.offsetHeight+n.offsetTop+l,t=h.find(document,'div.'+"_53u7");if(t.offsetHeight>r.offsetHeight&&q>s){g.addClass(r,'fixed_elem');var u=r.offsetHeight-p+n.offsetTop;if(u>0)r.style.marginTop='-'+u+'px';}if(q<(s-l)){g.removeClass(r,'fixed_elem');r.style.marginTop='0px';}if(p>s)r.style.marginTop='0px';}}};e.exports=m;},null);
__d("XDeveloperDocumentationControllerURIBuilder",["XControllerURIBuilder"],function(a,b,c,d,e,f){e.exports=b("XControllerURIBuilder").create("\/docs\/{?path1}\/{?path2}\/{?path3}\/{?path4}\/{?path5}\/{?path6}\/",{path:{type:"String"},preview:{type:"Exists"},revisionid:{type:"Int"},locale:{type:"String"},path1:{type:"String"},path2:{type:"String"},path3:{type:"String"},path4:{type:"String"},path5:{type:"String"},path6:{type:"String"}});},null);
__d("DeveloperSiteDocumentationX",["Arbiter","DOMScroll","PageTransitions","UIPagelet","URI","XDeveloperDocumentationControllerURIBuilder"],function(a,b,c,d,e,f,g,h,i,j,k,l){function m(){"use strict";this.$DeveloperSiteDocumentationX0=null;var n=k.getRequestURI(),o=n.getFragment();if(o&&document.getElementById(o))setTimeout(function(){return n.go();},500);var p=new l().getURI();i.registerHandler(this.handleTransition.bind(this).bind(null,p.getPath()));g.subscribe('MarkdownWikiPageToolbar/edit',this.initializeLivePreview.bind(this));}m.prototype.handleTransition=function(n,o){"use strict";if(this.$DeveloperSiteDocumentationX0)return false;if(o.getFragment())return false;var p=o.getPath();if(p.indexOf(n)!=-1){this.redrawBody(o);this.redrawNav(o);this.redrawAuxiliaryNav(o);i.transitionComplete();return true;}return false;};m.prototype.initializeLivePreview=function(event,n){"use strict";this.$DeveloperSiteDocumentationX0=setInterval(this.handleLivePreviewUpdate.bind(this).bind(null,n),2000);};m.prototype.handleLivePreviewUpdate=function(n){"use strict";this.redrawBody(n,true);this.redrawAuxiliaryNav(n,true);};m.prototype.redrawNav=function(n){"use strict";var o=Object.assign({path:n.getPath()},n.getQueryData());j.loadFromEndpoint('DeveloperDocumentationPrimaryNavPagelet','documentation_primary_nav_pagelet',o,{subdomain:'developers',bundle:false});};m.prototype.redrawAuxiliaryNav=function(n,o){"use strict";var p=Object.assign({path:n.getPath(),preview:o},n.getQueryData());j.loadFromEndpoint('DeveloperDocumentationAuxiliaryNavPagelet','documentation_auxiliary_nav_pagelet',p,{subdomain:'developers',bundle:false});};m.prototype.redrawBody=function(n,o){"use strict";var p=Object.assign({path:n.getPath(),preview:o},n.getQueryData());j.loadFromEndpoint('DeveloperDocumentationBodyPagelet','documentation_body_pagelet',p,{bundle:false,subdomain:'developers',displayCallback:function(q){q();if(!o)h.scrollToTop(false);}});};e.exports=m;},null);

}, 'remote script ')();