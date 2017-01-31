/*!CK:2318864798!*//*1416328940,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["0Qz\/x"]); }

/**
 * @providesModule prettify
 * @css prettify-css
 * @preserve-header
 * @nolint
 * @nopackage
 */__d("prettify",[],function(a,b,c,d,e,f){var g=true;window.PR_SHOULD_USE_CONTINUATION=true;var h,i;(function(){var j=window,k=["break,continue,do,else,for,if,return,while"],l=[k,"auto,case,char,const,default,"+"double,enum,extern,float,goto,inline,int,long,register,short,signed,"+"sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"],m=[l,"catch,class,delete,false,import,"+"new,operator,private,protected,public,this,throw,true,try,typeof"],n=[m,"alignof,align_union,asm,axiom,bool,"+"concept,concept_map,const_cast,constexpr,decltype,delegate,"+"dynamic_cast,explicit,export,friend,generic,late_check,"+"mutable,namespace,nullptr,property,reinterpret_cast,static_assert,"+"static_cast,template,typeid,typename,using,virtual,where"],o=[m,"abstract,assert,boolean,byte,extends,final,finally,implements,import,"+"instanceof,interface,null,native,package,strictfp,super,synchronized,"+"throws,transient"],p=[o,"as,base,by,checked,decimal,delegate,descending,dynamic,event,"+"fixed,foreach,from,group,implicit,in,internal,into,is,let,"+"lock,object,out,override,orderby,params,partial,readonly,ref,sbyte,"+"sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,"+"var,virtual,where"],q="all,and,by,catch,class,else,extends,false,finally,"+"for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,"+"throw,true,try,unless,until,when,while,yes",r=[m,"debugger,eval,export,function,get,null,set,undefined,var,with,"+"Infinity,NaN"],s="caller,delete,die,do,dump,elsif,eval,exit,foreach,for,"+"goto,if,import,last,local,my,next,no,our,print,package,redo,require,"+"sub,undef,unless,until,use,wantarray,while,BEGIN,END",t=[k,"and,as,assert,class,def,del,"+"elif,except,exec,finally,from,global,import,in,is,lambda,"+"nonlocal,not,or,pass,print,raise,try,with,yield,"+"False,True,None"],u=[k,"alias,and,begin,case,class,"+"def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,"+"rescue,retry,self,super,then,true,undef,unless,until,when,yield,"+"BEGIN,END"],v=[k,"as,assert,const,copy,drop,"+"enum,extern,fail,false,fn,impl,let,log,loop,match,mod,move,mut,priv,"+"pub,pure,ref,self,static,struct,true,trait,type,unsafe,use"],w=[k,"case,done,elif,esac,eval,fi,"+"function,in,local,set,then,until"],x=[n,p,r,s,t,u,w],y=/^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)\b/,z='str',aa='kwd',ba='com',ca='typ',da='lit',ea='pun',fa='pln',ga='tag',ha='dec',ia='src',ja='atn',ka='atv',la='nocode',ma='(?:^^\\.?|[+-]|[!=]=?=?|\\#|%=?|&&?=?|\\(|\\*=?|[+\\-]=|->|\\/=?|::?|<<?=?|>>?>?=?|,|;|\\?|@|\\[|~|{|\\^\\^?=?|\\|\\|?=?|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\\s*';function na(eb){var fb=0,gb=false,hb=false;for(var ib=0,jb=eb.length;ib<jb;++ib){var kb=eb[ib];if(kb.ignoreCase){hb=true;}else if(/[a-z]/i.test(kb.source.replace(/\\u[0-9a-f]{4}|\\x[0-9a-f]{2}|\\[^ux]/gi,''))){gb=true;hb=false;break;}}var lb={b:8,t:9,n:10,v:11,f:12,r:13};function mb(rb){var sb=rb.charCodeAt(0);if(sb!==92)return sb;var tb=rb.charAt(1);sb=lb[tb];if(sb){return sb;}else if('0'<=tb&&tb<='7'){return parseInt(rb.substring(1),8);}else if(tb==='u'||tb==='x'){return parseInt(rb.substring(2),16);}else return rb.charCodeAt(1);}function nb(rb){if(rb<32)return (rb<16?'\\x0':'\\x')+rb.toString(16);var sb=String.fromCharCode(rb);return (sb==='\\'||sb==='-'||sb===']'||sb==='^')?"\\"+sb:sb;}function ob(rb){var sb=rb.substring(1,rb.length-1).match(new RegExp('\\\\u[0-9A-Fa-f]{4}'+'|\\\\x[0-9A-Fa-f]{2}'+'|\\\\[0-3][0-7]{0,2}'+'|\\\\[0-7]{1,2}'+'|\\\\[\\s\\S]'+'|-'+'|[^-\\\\]','g')),tb=[],ub=sb[0]==='^',vb=['['];if(ub)vb.push('^');for(var wb=ub?1:0,xb=sb.length;wb<xb;++wb){var yb=sb[wb];if(/\\[bdsw]/i.test(yb)){vb.push(yb);}else{var zb=mb(yb),ac;if(wb+2<xb&&'-'===sb[wb+1]){ac=mb(sb[wb+2]);wb+=2;}else ac=zb;tb.push([zb,ac]);if(!(ac<65||zb>122)){if(!(ac<65||zb>90))tb.push([Math.max(65,zb)|32,Math.min(ac,90)|32]);if(!(ac<97||zb>122))tb.push([Math.max(97,zb)&~32,Math.min(ac,122)&~32]);}}}tb.sort(function(ec,fc){return (ec[0]-fc[0])||(fc[1]-ec[1]);});var bc=[],cc=[];for(var wb=0;wb<tb.length;++wb){var dc=tb[wb];if(dc[0]<=cc[1]+1){cc[1]=Math.max(cc[1],dc[1]);}else bc.push(cc=dc);}for(var wb=0;wb<bc.length;++wb){var dc=bc[wb];vb.push(nb(dc[0]));if(dc[1]>dc[0]){if(dc[1]+1>dc[0])vb.push('-');vb.push(nb(dc[1]));}}vb.push(']');return vb.join('');}function pb(rb){var sb=rb.source.match(new RegExp('(?:'+'\\[(?:[^\\x5C\\x5D]|\\\\[\\s\\S])*\\]'+'|\\\\u[A-Fa-f0-9]{4}'+'|\\\\x[A-Fa-f0-9]{2}'+'|\\\\[0-9]+'+'|\\\\[^ux0-9]'+'|\\(\\?[:!=]'+'|[\\(\\)\\^]'+'|[^\\x5B\\x5C\\(\\)\\^]+'+')','g')),tb=sb.length,ub=[];for(var vb=0,wb=0;vb<tb;++vb){var xb=sb[vb];if(xb==='('){++wb;}else if('\\'===xb.charAt(0)){var yb=+xb.substring(1);if(yb)if(yb<=wb){ub[yb]=-1;}else sb[vb]=nb(yb);}}for(var vb=1;vb<ub.length;++vb)if(-1===ub[vb])ub[vb]=++fb;for(var vb=0,wb=0;vb<tb;++vb){var xb=sb[vb];if(xb==='('){++wb;if(!ub[wb])sb[vb]='(?:';}else if('\\'===xb.charAt(0)){var yb=+xb.substring(1);if(yb&&yb<=wb)sb[vb]='\\'+ub[yb];}}for(var vb=0;vb<tb;++vb)if('^'===sb[vb]&&'^'!==sb[vb+1])sb[vb]='';if(rb.ignoreCase&&gb)for(var vb=0;vb<tb;++vb){var xb=sb[vb],zb=xb.charAt(0);if(xb.length>=2&&zb==='['){sb[vb]=ob(xb);}else if(zb!=='\\')sb[vb]=xb.replace(/[a-zA-Z]/g,function(ac){var bc=ac.charCodeAt(0);return '['+String.fromCharCode(bc&~32,bc|32)+']';});}return sb.join('');}var qb=[];for(var ib=0,jb=eb.length;ib<jb;++ib){var kb=eb[ib];if(kb.global||kb.multiline)throw new Error(''+kb);qb.push('(?:'+pb(kb)+')');}return new RegExp(qb.join('|'),hb?'gi':'g');}function oa(eb,fb){var gb=/(?:^|\s)nocode(?:\s|$)/,hb=[],ib=0,jb=[],kb=0;function lb(mb){var nb=mb.nodeType;if(nb==1){if(gb.test(mb.className))return;for(var ob=mb.firstChild;ob;ob=ob.nextSibling)lb(ob);var pb=mb.nodeName.toLowerCase();if('br'===pb||'li'===pb){hb[kb]='\n';jb[kb<<1]=ib++;jb[(kb++<<1)|1]=mb;}}else if(nb==3||nb==4){var qb=mb.nodeValue;if(qb.length){if(!fb){qb=qb.replace(/[ \t\r\n]+/g,' ');}else qb=qb.replace(/\r\n?/g,'\n');hb[kb]=qb;jb[kb<<1]=ib;ib+=qb.length;jb[(kb++<<1)|1]=mb;}}}lb(eb);return {sourceCode:hb.join('').replace(/\n$/,''),spans:jb};}function pa(eb,fb,gb,hb){if(!fb)return;var ib={sourceCode:fb,basePos:eb};gb(ib);hb.push.apply(hb,ib.decorations);}var qa=/\S/;function ra(eb){var fb=(void 0);for(var gb=eb.firstChild;gb;gb=gb.nextSibling){var hb=gb.nodeType;fb=(hb===1)?(fb?eb:gb):(hb===3)?(qa.test(gb.nodeValue)?eb:fb):fb;}return fb===eb?(void 0):fb;}function sa(eb,fb){var gb={},hb;(function(){var kb=eb.concat(fb),lb=[],mb={};for(var nb=0,ob=kb.length;nb<ob;++nb){var pb=kb[nb],qb=pb[3];if(qb)for(var rb=qb.length;--rb>=0;)gb[qb.charAt(rb)]=pb;var sb=pb[1],tb=''+sb;if(!mb.hasOwnProperty(tb)){lb.push(sb);mb[tb]=null;}}lb.push(/[\0-\uffff]/);hb=na(lb);})();var ib=fb.length,jb=function(kb){var lb=kb.sourceCode,mb=kb.basePos,nb=[mb,fa],ob=0,pb=lb.match(hb)||[],qb={};for(var rb=0,sb=pb.length;rb<sb;++rb){var tb=pb[rb],ub=qb[tb],vb=void 0,wb;if(typeof ub==='string'){wb=false;}else{var xb=gb[tb.charAt(0)];if(xb){vb=tb.match(xb[1]);ub=xb[0];}else{for(var yb=0;yb<ib;++yb){xb=fb[yb];vb=tb.match(xb[1]);if(vb){ub=xb[0];break;}}if(!vb)ub=fa;}wb=ub.length>=5&&'lang-'===ub.substring(0,5);if(wb&&!(vb&&typeof vb[1]==='string')){wb=false;ub=ia;}if(!wb)qb[tb]=ub;}var zb=ob;ob+=tb.length;if(!wb){nb.push(mb+zb,ub);}else{var ac=vb[1],bc=tb.indexOf(ac),cc=bc+ac.length;if(vb[2]){cc=tb.length-vb[2].length;bc=cc-ac.length;}var dc=ub.substring(5);pa(mb+zb,tb.substring(0,bc),jb,nb);pa(mb+zb+bc,ac,za(dc,ac),nb);pa(mb+zb+cc,tb.substring(cc),jb,nb);}}kb.decorations=nb;};return jb;}function ta(eb){var fb=[],gb=[];if(eb.tripleQuotedStrings){fb.push([z,/^(?:\'\'\'(?:[^\'\\]|\\[\s\S]|\'{1,2}(?=[^\']))*(?:\'\'\'|$)|\"\"\"(?:[^\"\\]|\\[\s\S]|\"{1,2}(?=[^\"]))*(?:\"\"\"|$)|\'(?:[^\\\']|\\[\s\S])*(?:\'|$)|\"(?:[^\\\"]|\\[\s\S])*(?:\"|$))/,null,'\'"']);}else if(eb.multiLineStrings){fb.push([z,/^(?:\'(?:[^\\\']|\\[\s\S])*(?:\'|$)|\"(?:[^\\\"]|\\[\s\S])*(?:\"|$)|\`(?:[^\\\`]|\\[\s\S])*(?:\`|$))/,null,'\'"`']);}else fb.push([z,/^(?:\'(?:[^\\\'\r\n]|\\.)*(?:\'|$)|\"(?:[^\\\"\r\n]|\\.)*(?:\"|$))/,null,'"\'']);if(eb.verbatimStrings)gb.push([z,/^@\"(?:[^\"]|\"\")*(?:\"|$)/,null]);var hb=eb.hashComments;if(hb)if(eb.cStyleComments){if(hb>1){fb.push([ba,/^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/,null,'#']);}else fb.push([ba,/^#(?:(?:define|e(?:l|nd)if|else|error|ifn?def|include|line|pragma|undef|warning)\b|[^\r\n]*)/,null,'#']);gb.push([z,/^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h(?:h|pp|\+\+)?|[a-z]\w*)>/,null]);}else fb.push([ba,/^#[^\r\n]*/,null,'#']);if(eb.cStyleComments){gb.push([ba,/^\/\/[^\r\n]*/,null]);gb.push([ba,/^\/\*[\s\S]*?(?:\*\/|$)/,null]);}var ib=eb.regexLiterals;if(ib){var jb=ib>1?'':'\n\r',kb=jb?'.':'[\\S\\s]',lb=('/(?=[^/*'+jb+'])'+'(?:[^/\\x5B\\x5C'+jb+']'+'|\\x5C'+kb+'|\\x5B(?:[^\\x5C\\x5D'+jb+']'+'|\\x5C'+kb+')*(?:\\x5D|$))+'+'/');gb.push(['lang-regex',RegExp('^'+ma+'('+lb+')')]);}var mb=eb.types;if(mb)gb.push([ca,mb]);var nb=(""+eb.keywords).replace(/^ | $/g,'');if(nb.length)gb.push([aa,new RegExp('^(?:'+nb.replace(/[\s,]+/g,'|')+')\\b'),null]);fb.push([fa,/^\s+/,null,' \r\n\t\xA0']);var ob='^.[^\\s\\w.$@\'"`/\\\\]*';if(eb.regexLiterals)ob+='(?!\s*\/)';gb.push([da,/^@[a-z_$][a-z_$@0-9]*/i,null],[ca,/^(?:[@_]?[A-Z]+[a-z][A-Za-z_$@0-9]*|\w+_t\b)/,null],[fa,/^[a-z_$][a-z_$@0-9]*/i,null],[da,new RegExp('^(?:'+'0x[a-f0-9]+'+'|(?:\\d(?:_\\d+)*\\d*(?:\\.\\d*)?|\\.\\d\\+)'+'(?:e[+\\-]?\\d+)?'+')'+'[a-z]*','i'),null,'0123456789'],[fa,/^\\[\s\S]?/,null],[ea,new RegExp(ob),null]);return sa(fb,gb);}var ua=ta({keywords:x,hashComments:true,cStyleComments:true,multiLineStrings:true,regexLiterals:true});function va(eb,fb,gb){var hb=/(?:^|\s)nocode(?:\s|$)/,ib=/\r\n?|\n/,jb=eb.ownerDocument,kb=jb.createElement('li');while(eb.firstChild)kb.appendChild(eb.firstChild);var lb=[kb];function mb(sb){var tb=sb.nodeType;if(tb==1&&!hb.test(sb.className)){if('br'===sb.nodeName){nb(sb);if(sb.parentNode)sb.parentNode.removeChild(sb);}else for(var ub=sb.firstChild;ub;ub=ub.nextSibling)mb(ub);}else if((tb==3||tb==4)&&gb){var vb=sb.nodeValue,wb=vb.match(ib);if(wb){var xb=vb.substring(0,wb.index);sb.nodeValue=xb;var yb=vb.substring(wb.index+wb[0].length);if(yb){var zb=sb.parentNode;zb.insertBefore(jb.createTextNode(yb),sb.nextSibling);}nb(sb);if(!xb)sb.parentNode.removeChild(sb);}}}function nb(sb){while(!sb.nextSibling){sb=sb.parentNode;if(!sb)return;}function tb(wb,xb){var yb=xb?wb.cloneNode(false):wb,zb=wb.parentNode;if(zb){var ac=tb(zb,1),bc=wb.nextSibling;ac.appendChild(yb);for(var cc=bc;cc;cc=bc){bc=cc.nextSibling;ac.appendChild(cc);}}return yb;}var ub=tb(sb.nextSibling,0);for(var vb;(vb=ub.parentNode)&&vb.nodeType===1;)ub=vb;lb.push(ub);}for(var ob=0;ob<lb.length;++ob)mb(lb[ob]);if(fb===(fb|0))lb[0].setAttribute('value',fb);var pb=jb.createElement('ol');pb.className='linenums';var qb=Math.max(0,((fb-1))|0)||0;for(var ob=0,rb=lb.length;ob<rb;++ob){kb=lb[ob];kb.className='L'+((ob+qb)%10);if(!kb.firstChild)kb.appendChild(jb.createTextNode('\xA0'));pb.appendChild(kb);}eb.appendChild(pb);}function wa(eb){var fb=/\bMSIE\s(\d+)/.exec(navigator.userAgent);fb=fb&&+fb[1]<=8;var gb=/\n/g,hb=eb.sourceCode,ib=hb.length,jb=0,kb=eb.spans,lb=kb.length,mb=0,nb=eb.decorations,ob=nb.length,pb=0;nb[ob]=ib;var qb,rb;for(rb=qb=0;rb<ob;)if(nb[rb]!==nb[rb+2]){nb[qb++]=nb[rb++];nb[qb++]=nb[rb++];}else rb+=2;ob=qb;for(rb=qb=0;rb<ob;){var sb=nb[rb],tb=nb[rb+1],ub=rb+2;while(ub+2<=ob&&nb[ub+1]===tb)ub+=2;nb[qb++]=sb;nb[qb++]=tb;rb=ub;}ob=nb.length=qb;var vb=eb.sourceNode,wb;if(vb){wb=vb.style.display;vb.style.display='none';}try{var xb=null;while(mb<lb){var yb=kb[mb],zb=kb[mb+2]||ib,ac=nb[pb+2]||ib,ub=Math.min(zb,ac),bc=kb[mb+1],cc;if(bc.nodeType!==1&&(cc=hb.substring(jb,ub))){if(fb)cc=cc.replace(gb,'\r');bc.nodeValue=cc;var dc=bc.ownerDocument,ec=dc.createElement('span');ec.className=nb[pb+1];var fc=bc.parentNode;fc.replaceChild(ec,bc);ec.appendChild(bc);if(jb<zb){kb[mb+1]=bc=dc.createTextNode(hb.substring(ub,zb));fc.insertBefore(bc,ec.nextSibling);}}jb=ub;if(jb>=zb)mb+=2;if(jb>=ac)pb+=2;}}finally{if(vb)vb.style.display=wb;}}var xa={};function ya(eb,fb){for(var gb=fb.length;--gb>=0;){var hb=fb[gb];if(!xa.hasOwnProperty(hb)){xa[hb]=eb;}else if(j.console)console.warn('cannot override language handler %s',hb);}}function za(eb,fb){if(!(eb&&xa.hasOwnProperty(eb)))eb=/^\s*</.test(fb)?'default-markup':'default-code';return xa[eb];}ya(ua,['default-code']);ya(sa([],[[fa,/^[^<?]+/],[ha,/^<!\w[^>]*(?:>|$)/],[ba,/^<\!--[\s\S]*?(?:-\->|$)/],['lang-',/^<\?([\s\S]+?)(?:\?>|$)/],['lang-',/^<%([\s\S]+?)(?:%>|$)/],[ea,/^(?:<[%?]|[%?]>)/],['lang-',/^<xmp\b[^>]*>([\s\S]+?)<\/xmp\b[^>]*>/i],['lang-js',/^<script\b[^>]*>([\s\S]*?)(<\/script\b[^>]*>)/i],['lang-css',/^<style\b[^>]*>([\s\S]*?)(<\/style\b[^>]*>)/i],['lang-in.tag',/^(<\/?[a-z][^<>]*>)/i]]),['default-markup','htm','html','mxml','xhtml','xml','xsl']);ya(sa([[fa,/^[\s]+/,null,' \t\r\n'],[ka,/^(?:\"[^\"]*\"?|\'[^\']*\'?)/,null,'\"\'']],[[ga,/^^<\/?[a-z](?:[\w.:-]*\w)?|\/?>$/i],[ja,/^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],['lang-uq.val',/^=\s*([^>\'\"\s]*(?:[^>\'\"\s\/]|\/(?=\s)))/],[ea,/^[=<>\/]+/],['lang-js',/^on\w+\s*=\s*\"([^\"]+)\"/i],['lang-js',/^on\w+\s*=\s*\'([^\']+)\'/i],['lang-js',/^on\w+\s*=\s*([^\"\'>\s]+)/i],['lang-css',/^style\s*=\s*\"([^\"]+)\"/i],['lang-css',/^style\s*=\s*\'([^\']+)\'/i],['lang-css',/^style\s*=\s*([^\"\'>\s]+)/i]]),['in.tag']);ya(sa([],[[ka,/^[\s\S]+/]]),['uq.val']);ya(ta({keywords:n,hashComments:true,cStyleComments:true,types:y}),['c','cc','cpp','cxx','cyc','m']);ya(ta({keywords:'null,true,false'}),['json']);ya(ta({keywords:p,hashComments:true,cStyleComments:true,verbatimStrings:true,types:y}),['cs']);ya(ta({keywords:o,cStyleComments:true}),['java']);ya(ta({keywords:w,hashComments:true,multiLineStrings:true}),['bash','bsh','csh','sh']);ya(ta({keywords:t,hashComments:true,multiLineStrings:true,tripleQuotedStrings:true}),['cv','py','python']);ya(ta({keywords:s,hashComments:true,multiLineStrings:true,regexLiterals:2}),['perl','pl','pm']);ya(ta({keywords:u,hashComments:true,multiLineStrings:true,regexLiterals:true}),['rb','ruby']);ya(ta({keywords:r,cStyleComments:true,regexLiterals:true}),['javascript','js']);ya(ta({keywords:q,hashComments:3,cStyleComments:true,multilineStrings:true,tripleQuotedStrings:true,regexLiterals:true}),['coffee']);ya(ta({keywords:v,cStyleComments:true,multilineStrings:true}),['rc','rs','rust']);ya(sa([],[[z,/^[\s\S]+/]]),['regex']);function ab(eb){var fb=eb.langExtension;try{var hb=oa(eb.sourceNode,eb.pre),ib=hb.sourceCode;eb.sourceCode=ib;eb.spans=hb.spans;eb.basePos=0;za(fb,ib)(eb);wa(eb);}catch(gb){if(j.console)console.log(gb&&gb.stack||gb);}}function bb(eb,fb,gb){var hb=document.createElement('div');hb.innerHTML='<pre>'+eb+'</pre>';hb=hb.firstChild;if(gb)va(hb,gb,true);var ib={langExtension:fb,numberLines:gb,sourceNode:hb,pre:1};ab(ib);return hb.innerHTML;}function cb(eb,fb){var gb=fb||document.body,hb=gb.ownerDocument||document;function ib(zb){return gb.getElementsByTagName(zb);}var jb=[ib('pre'),ib('code'),ib('xmp')],kb=[];for(var lb=0;lb<jb.length;++lb)for(var mb=0,nb=jb[lb].length;mb<nb;++mb)kb.push(jb[lb][mb]);jb=null;var ob=Date;if(!ob.now)ob={now:function(){return +(new Date());}};var pb=0,qb,rb=/\blang(?:uage)?-([\w.]+)(?!\S)/,sb=/\bprettyprint\b/,tb=/\bprettyprinted\b/,ub=/pre|xmp/i,vb=/^code$/i,wb=/^(?:pre|code|xmp)$/i,xb={};function yb(){var zb=(j.PR_SHOULD_USE_CONTINUATION?ob.now()+250:Infinity);for(;pb<kb.length&&ob.now()<zb;pb++){var ac=kb[pb],bc=xb;for(var cc=ac;(cc=cc.previousSibling);){var dc=cc.nodeType,ec=(dc===7||dc===8)&&cc.nodeValue;if(ec?!/^\??prettify\b/.test(ec):(dc!==3||/\S/.test(cc.nodeValue)))break;if(ec){bc={};ec.replace(/\b(\w+)=([\w:.%+-]+)/g,function(qc,rc,sc){bc[rc]=sc;});break;}}var fc=ac.className;if((bc!==xb||sb.test(fc))&&!tb.test(fc)){var gc=false;for(var hc=ac.parentNode;hc;hc=hc.parentNode){var ic=hc.tagName;if(wb.test(ic)&&hc.className&&sb.test(hc.className)){gc=true;break;}}if(!gc){ac.className+=' prettyprinted';var jc=bc.lang;if(!jc){jc=fc.match(rb);var kc;if(!jc&&(kc=ra(ac))&&vb.test(kc.tagName))jc=kc.className.match(rb);if(jc)jc=jc[1];}var lc;if(ub.test(ac.tagName)){lc=1;}else{var mc=ac.currentStyle,nc=hb.defaultView,oc=(mc?mc.whiteSpace:(nc&&nc.getComputedStyle)?nc.getComputedStyle(ac,null).getPropertyValue('white-space'):0);lc=oc&&'pre'===oc.substring(0,3);}var pc=bc.linenums;if(!(pc=pc==='true'||+pc)){pc=fc.match(/\blinenums\b(?::(\d+))?/);pc=pc?pc[1]&&pc[1].length?+pc[1]:true:false;}if(pc)va(ac,pc,lc);qb={langExtension:jc,sourceNode:ac,numberLines:pc,pre:lc};ab(qb);}}}if(pb<kb.length){setTimeout(yb,250);}else if('function'===typeof eb)eb();}yb();}var db=j.PR={createSimpleLexer:sa,registerLangHandler:ya,sourceDecorator:ta,PR_ATTRIB_NAME:ja,PR_ATTRIB_VALUE:ka,PR_COMMENT:ba,PR_DECLARATION:ha,PR_KEYWORD:aa,PR_LITERAL:da,PR_NOCODE:la,PR_PLAIN:fa,PR_PUNCTUATION:ea,PR_SOURCE:ia,PR_STRING:z,PR_TAG:ga,PR_TYPE:ca,prettyPrintOne:g?(j.prettyPrintOne=bb):(h=bb),prettyPrint:i=g?(j.prettyPrint=cb):(i=cb)};if(typeof define==="function"&&define.amd)define("google-code-prettify",[],function(){return db;});})();f.init=i;},null);