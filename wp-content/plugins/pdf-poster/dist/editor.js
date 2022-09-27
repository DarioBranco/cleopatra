(()=>{"use strict";var e="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\pdf-poster\\src\\blocks\\Components\\BMediaUpload.js",l=(wp.i18n.__,wp.element.Fragment),t=wp.blockEditor,r=t.MediaUpload,n=t.MediaUploadCheck,m=wp.components,o=m.Button,u=m.PanelRow,a=m.TextControl;const c=function(t){var m=this,c=t.value,i=t.type,s=void 0===i?[]:i,p=t.onSelect,_=t.placeholder;return wp.element.createElement("div",{className:"bMediaUpload",__self:this,__source:{fileName:e,lineNumber:7,columnNumber:5}},wp.element.createElement(l,{__self:this,__source:{fileName:e,lineNumber:8,columnNumber:7}},wp.element.createElement(n,{__self:this,__source:{fileName:e,lineNumber:9,columnNumber:9}},wp.element.createElement(r,{allowedTypes:s,onSelect:function(e){return p(e.url)},render:function(l){var t=l.open;return wp.element.createElement(o,{className:"button button-primary",onClick:t,icon:"upload",__self:m,__source:{fileName:e,lineNumber:13,columnNumber:35}})},__self:this,__source:{fileName:e,lineNumber:10,columnNumber:11}})),wp.element.createElement(u,{className:"width-100",__self:this,__source:{fileName:e,lineNumber:16,columnNumber:9}},wp.element.createElement(a,{value:c,onChange:function(e){return p(e)},placeholder:_,__self:this,__source:{fileName:e,lineNumber:17,columnNumber:11}}))))};var i="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\pdf-poster\\src\\blocks\\pdfposter\\Settings.js",s=void 0;function p(e,l){(null==l||l>e.length)&&(l=e.length);for(var t=0,r=new Array(l);t<l;t++)r[t]=e[t];return r}var _=wp.i18n.__,f=wp.element.useState,N=wp.components,b=N.Panel,d=N.PanelBody,w=N.PanelRow,h=N.FormToggle,E=N.__experimentalUnitControl,g=N.__experimentalNumberControl,y=N.Modal,v=wp.blockEditor.InspectorControls,P=wp.data.select("core/editor").getCurrentPostId;const S=function(e){var l,t,r=e.props,n=r.attributes,m=r.setAttributes,o=n.file,u=n.height,a=n.width,N=n.showName,S=n.print,k=(l=f(!1),t=2,function(e){if(Array.isArray(e))return e}(l)||function(e,l){var t=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=t){var r,n,m=[],o=!0,u=!1;try{for(t=t.call(e);!(o=(r=t.next()).done)&&(m.push(r.value),!l||m.length!==l);o=!0);}catch(e){u=!0,n=e}finally{try{o||null==t.return||t.return()}finally{if(u)throw n}}return m}}(l,t)||function(e,l){if(e){if("string"==typeof e)return p(e,l);var t=Object.prototype.toString.call(e).slice(8,-1);return"Object"===t&&e.constructor&&(t=e.constructor.name),"Map"===t||"Set"===t?Array.from(e):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?p(e,l):void 0}}(l,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),C=k[0],F=k[1],A=P();return wp.element.createElement(v,{style:{marginBottom:"40px"},__self:s,__source:{fileName:i,lineNumber:25,columnNumber:5}},C&&wp.element.createElement(y,{title:"Pro Feature",onRequestClose:function(){return F(!1)},__self:s,__source:{fileName:i,lineNumber:27,columnNumber:9}},wp.element.createElement("p",{__self:s,__source:{fileName:i,lineNumber:28,columnNumber:11}},_("Unlock PDF Poster Features","pdfp")," ",wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:29,columnNumber:56}},_("Pro","pdfp"))),wp.element.createElement("br",{__self:s,__source:{fileName:i,lineNumber:31,columnNumber:11}}),wp.element.createElement("a",{href:"https://pdfposter.com/",target:"_blank",className:"button button-primary",__self:s,__source:{fileName:i,lineNumber:32,columnNumber:11}},_("Learn More","pdfp"))),wp.element.createElement(b,{__self:s,__source:{fileName:i,lineNumber:37,columnNumber:7}},wp.element.createElement(d,{__self:s,__source:{fileName:i,lineNumber:38,columnNumber:9}},wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:39,columnNumber:11}},wp.element.createElement("div",{className:"pdfp_front_shortcode",__self:s,__source:{fileName:i,lineNumber:40,columnNumber:13}},wp.element.createElement("input",{value:"[pdf id=".concat(A,"]"),__self:s,__source:{fileName:i,lineNumber:41,columnNumber:15}}),wp.element.createElement("span",{className:"htooltip",__self:s,__source:{fileName:i,lineNumber:42,columnNumber:15}},_("Copy To Clipboard","pdfp"))))),wp.element.createElement(d,{__self:s,__source:{fileName:i,lineNumber:46,columnNumber:9}},wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:47,columnNumber:11}},wp.element.createElement("p",{style:{fontSize:"16px",lineHeight:"135%",color:"red"},__self:s,__source:{fileName:i,lineNumber:48,columnNumber:13}},wp.element.createElement("a",{target:"_blank",href:"edit.php?post_type=pdfposter&page=settings",__self:s,__source:{fileName:i,lineNumber:49,columnNumber:15}},_("Click Here","pdfp")),_(" to disable Gutenberg shortcode generator ( to back old generator)","pdfp")))),wp.element.createElement(d,{__self:s,__source:{fileName:i,lineNumber:56,columnNumber:9}},wp.element.createElement(c,{type:["application/pdf"],onSelect:function(e){return m({file:e})},value:o,placeholder:"PDF URL",__self:s,__source:{fileName:i,lineNumber:57,columnNumber:11}}),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:58,columnNumber:11}},wp.element.createElement("label",{htmlFor:"print",className:"label",__self:s,__source:{fileName:i,lineNumber:59,columnNumber:13}},_("allow print","pdfp")),wp.element.createElement(h,{id:"print",checked:S,onChange:function(){return m({print:!S})},__self:s,__source:{fileName:i,lineNumber:62,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:64,columnNumber:11}},wp.element.createElement("label",{htmlFor:"showName",className:"label",__self:s,__source:{fileName:i,lineNumber:65,columnNumber:13}},_("show name on top","pdfp")),wp.element.createElement(h,{id:"showName",checked:N,onChange:function(){return m({showName:!N})},__self:s,__source:{fileName:i,lineNumber:68,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:70,columnNumber:11}},wp.element.createElement("label",{htmlFor:"Height",className:"label",__self:s,__source:{fileName:i,lineNumber:71,columnNumber:13}},_("height","pdfp")),wp.element.createElement(E,{onChange:function(e){return m({height:e})},value:u,__self:s,__source:{fileName:i,lineNumber:74,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:76,columnNumber:11}},wp.element.createElement("label",{htmlFor:"width",className:"label",__self:s,__source:{fileName:i,lineNumber:77,columnNumber:13}},_("width","pdfp")),wp.element.createElement(E,{onChange:function(e){return m({width:e})},value:a,__self:s,__source:{fileName:i,lineNumber:80,columnNumber:13}}))),wp.element.createElement(d,{title:_("Settings","pdfp"),initialOpen:!1,__self:s,__source:{fileName:i,lineNumber:83,columnNumber:9}},wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:84,columnNumber:11}},wp.element.createElement("label",{htmlFor:"protect",className:"label",__self:s,__source:{fileName:i,lineNumber:85,columnNumber:13}},_("Protect my content","pdfp")," ",wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:86,columnNumber:50}},"Pro")),wp.element.createElement(h,{id:"protect",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:88,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:90,columnNumber:11}},wp.element.createElement("label",{htmlFor:"alert",className:"label",__self:s,__source:{fileName:i,lineNumber:91,columnNumber:13}},_("Enable Alert","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:93,columnNumber:15}},"Pro")),wp.element.createElement(h,{id:"alert",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:95,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:97,columnNumber:11}},wp.element.createElement("label",{htmlFor:"onlyPDF",className:"label",__self:s,__source:{fileName:i,lineNumber:98,columnNumber:13}},_("Raw PDF","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:100,columnNumber:15}},"Pro")),wp.element.createElement(h,{id:"onlyPDF",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:102,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:104,columnNumber:11}},wp.element.createElement("label",{htmlFor:"defaultBrowser",className:"label",__self:s,__source:{fileName:i,lineNumber:105,columnNumber:13}},_("Use browser pdf viewer","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:107,columnNumber:15}},"Pro")),wp.element.createElement(h,{id:"defaultBrowser",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:109,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:112,columnNumber:11}},wp.element.createElement("label",{htmlFor:"downloadButton",className:"label",__self:s,__source:{fileName:i,lineNumber:113,columnNumber:13}},_("Show download button","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:115,columnNumber:15}},"Pro")),wp.element.createElement(h,{id:"downloadButton",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:117,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:119,columnNumber:11}},wp.element.createElement("label",{htmlFor:"fullscreenButton",className:"label",__self:s,__source:{fileName:i,lineNumber:120,columnNumber:13}},_("Show fullscreen button","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:122,columnNumber:15}},"Pro")),wp.element.createElement(h,{id:"fullscreenButton",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:124,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:126,columnNumber:11}},wp.element.createElement("label",{htmlFor:"newWindow",className:"label",__self:s,__source:{fileName:i,lineNumber:127,columnNumber:13}},_("Open in new window","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:129,columnNumber:15}},"Pro")),wp.element.createElement(h,{id:"newWindow",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:131,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:133,columnNumber:11}},wp.element.createElement("label",{htmlFor:"thumbMenu",className:"label",__self:s,__source:{fileName:i,lineNumber:134,columnNumber:13}},_("Enable thumbnails toggle menu","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:136,columnNumber:15}},"Pro")),wp.element.createElement(h,{id:"thumbMenu",checked:!1,onChange:function(){return F(!0)},__self:s,__source:{fileName:i,lineNumber:138,columnNumber:13}})),wp.element.createElement(w,{__self:s,__source:{fileName:i,lineNumber:140,columnNumber:11}},wp.element.createElement("label",{className:"label",__self:s,__source:{fileName:i,lineNumber:141,columnNumber:13}},_("Initail page","pdfp"),wp.element.createElement("span",{className:"pdfp_pro_label",__self:s,__source:{fileName:i,lineNumber:143,columnNumber:15}},"Pro")),wp.element.createElement(g,{isShiftStepEnabled:!0,onChange:function(){return F(!0)},shiftStep:1,value:0,__self:s,__source:{fileName:i,lineNumber:145,columnNumber:13}})))))};var k="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\pdf-poster\\src\\blocks\\pdfposter\\Edit.js",C=wp.element,F=C.Fragment,A=C.useEffect,j=wp.i18n.__;var x=wp.i18n.__;(0,wp.blocks.registerBlockType)("pdfp/pdfposter",{title:x("PDF Poster","pdfp"),icon:"pdf",category:"design",keywords:[x("PDF Poster","pdfp"),x("PDF Viewer","pdfp")],supports:{html:!1},attributes:{file:{type:"string"},title:{type:"string"},height:{type:"string",default:"1122px"},width:{type:"string",default:"100%"},showName:{type:"boolean",default:!1},print:{type:"boolean",default:!1}},getEditWrapperProps:function(){},edit:function(e){var l,t,r=e.attributes,n=e.isSelected,m=r.file,o=void 0===m?null===(l=pdfp)||void 0===l?void 0:l.placeholder:m,u=r.height,a=r.width,c=r.showName,i=r.print;A((function(){n&&wp.data.dispatch("core/edit-post").openGeneralSidebar("edit-post/block")}),[n]);var s="".concat(null===(t=pdfp)||void 0===t?void 0:t.siteUrl,"/wp-content/plugins/pdf-poster/pdfjs/web/viewer.php?file=").concat(o,"&download=true&print=").concat(i,"&openfile=false");return wp.element.createElement(F,{__self:this,__source:{fileName:k,lineNumber:20,columnNumber:5}},wp.element.createElement(S,{props:e,__self:this,__source:{fileName:k,lineNumber:21,columnNumber:7}}),wp.element.createElement("div",{class:"pdfp_wrapper",style:{width:a},__self:this,__source:{fileName:k,lineNumber:22,columnNumber:7}},wp.element.createElement("div",{class:"cta_wrapper",__self:this,__source:{fileName:k,lineNumber:23,columnNumber:9}},c&&wp.element.createElement("p",{__self:this,__source:{fileName:k,lineNumber:25,columnNumber:13}},j("File name","pdfp")," : ",o.substring(o.lastIndexOf("/")+1)),wp.element.createElement("p",{__self:this,__source:{fileName:k,lineNumber:29,columnNumber:11}},wp.element.createElement("a",{href:s,__self:this,__source:{fileName:k,lineNumber:30,columnNumber:13}},wp.element.createElement("button",{__self:this,__source:{fileName:k,lineNumber:31,columnNumber:15}},j("View Fullscreen","pdfp"))))),wp.element.createElement("div",{class:"iframe_wrapper",__self:this,__source:{fileName:k,lineNumber:35,columnNumber:9}},wp.element.createElement("div",{className:"pdfp_frame_overlay",__self:this,__source:{fileName:k,lineNumber:36,columnNumber:11}}),wp.element.createElement("iframe",{loading:"lazy",height:u,src:s,style:{height:u},__self:this,__source:{fileName:k,lineNumber:37,columnNumber:11}}))))},save:function(){return null},example:{attributes:!0}});var U="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\pdf-poster\\src\\blocks\\selector\\Settings.js",D=void 0;function I(e,l){(null==l||l>e.length)&&(l=e.length);for(var t=0,r=new Array(l);t<l;t++)r[t]=e[t];return r}wp.i18n.__;var B=wp.components,M=B.Panel,O=B.PanelBody,T=B.SelectControl,R=wp.blockEditor.InspectorControls,z=wp.data.withSelect;const V=(0,wp.compose.compose)([z((function(e,l){return{docs:e("core").getEntityRecords("postType","pdfposter",{per_page:100})}}))])((function(e){var l,t,r=e.props,n=r.attributes,m=r.setAttributes,o=e.docs,u=n.data;return o&&(l=o.map((function(e,l){var t;return{label:null==e||null===(t=e.title)||void 0===t?void 0:t.rendered,value:null==e?void 0:e.id}})),l=[{label:"Select",value:null}].concat(function(e){if(Array.isArray(e))return I(e)}(t=l)||function(e){if("undefined"!=typeof Symbol&&null!=e[Symbol.iterator]||null!=e["@@iterator"])return Array.from(e)}(t)||function(e,l){if(e){if("string"==typeof e)return I(e,l);var t=Object.prototype.toString.call(e).slice(8,-1);return"Object"===t&&e.constructor&&(t=e.constructor.name),"Map"===t||"Set"===t?Array.from(e):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?I(e,l):void 0}}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}())),wp.element.createElement(R,{style:{marginBottom:"40px"},__self:D,__source:{fileName:U,lineNumber:22,columnNumber:5}},wp.element.createElement(M,{__self:D,__source:{fileName:U,lineNumber:23,columnNumber:7}},wp.element.createElement(O,{__self:D,__source:{fileName:U,lineNumber:24,columnNumber:9}},wp.element.createElement(T,{label:"Size",value:null==u?void 0:u.tringle_text,options:l,onChange:function(e){return m({data:{tringle_text:e}})},__self:D,__source:{fileName:U,lineNumber:25,columnNumber:11}}))))}));var W="D:\\Ampps\\www\\freemius\\wp-content\\plugins\\pdf-poster\\src\\blocks\\selector\\Edit.js";function H(e,l){(null==l||l>e.length)&&(l=e.length);for(var t=0,r=new Array(l);t<l;t++)r[t]=e[t];return r}var L=wp.element,$=L.Fragment,G=L.useEffect,q=L.useState,Q=(L.render,wp.i18n.__),J=wp.blockEditor,K=(J.MediaUpload,J.MediaUploadCheck,J.URLPopover,wp.components);K.Button,K.Placeholder;var X=wp.i18n.__;(0,wp.blocks.registerBlockType)("meta-box/document-embedder",{title:X("PDF Poster Selector","pdfp"),icon:"pdf",category:"design",keywords:[X("PDF Poster","pdfp"),X("PDF Viewer","pdfp")],supports:{html:!1},attributes:{data:{type:"object",default:{tringle_text:""}}},getEditWrapperProps:function(){},edit:function(e){var l,t,r,n=e.attributes,m=(e.clientId,n.data.tringle_text),o=(t=q({}),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,l){var t=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=t){var r,n,m=[],o=!0,u=!1;try{for(t=t.call(e);!(o=(r=t.next()).done)&&(m.push(r.value),!l||m.length!==l);o=!0);}catch(e){u=!0,n=e}finally{try{o||null==t.return||t.return()}finally{if(u)throw n}}return m}}(t,r)||function(e,l){if(e){if("string"==typeof e)return H(e,l);var t=Object.prototype.toString.call(e).slice(8,-1);return"Object"===t&&e.constructor&&(t=e.constructor.name),"Map"===t||"Set"===t?Array.from(e):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?H(e,l):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),u=o[0],a=o[1];G((function(){var e;jQuery.get((null===(e=pdfp)||void 0===e?void 0:e.siteUrl)+"/wp-json/pdfposter/v1/single/"+m,(function(e){a(e)}))}),[n]);var c=u.showName,i=u.file,s=u.height,p=u.width,_=u.print,f="".concat(null===(l=pdfp)||void 0===l?void 0:l.siteUrl,"/wp-content/plugins/pdf-poster/pdfjs/web/viewer.php?file=").concat(i,"&download=true&print=").concat(_,"&openfile=false");return wp.element.createElement($,{__self:this,__source:{fileName:W,lineNumber:26,columnNumber:5}},wp.element.createElement(V,{props:e,__self:this,__source:{fileName:W,lineNumber:27,columnNumber:7}}),wp.element.createElement("div",{class:"pdfp_wrapper",style:{width:p},__self:this,__source:{fileName:W,lineNumber:28,columnNumber:7}},wp.element.createElement("div",{class:"cta_wrapper",__self:this,__source:{fileName:W,lineNumber:29,columnNumber:9}},c&&wp.element.createElement("p",{__self:this,__source:{fileName:W,lineNumber:31,columnNumber:13}},Q("File name","pdfp")," : ",i.substring(i.lastIndexOf("/")+1)),wp.element.createElement("p",{__self:this,__source:{fileName:W,lineNumber:35,columnNumber:11}},wp.element.createElement("a",{href:f,__self:this,__source:{fileName:W,lineNumber:36,columnNumber:13}},wp.element.createElement("button",{__self:this,__source:{fileName:W,lineNumber:37,columnNumber:15}},Q("View Fullscreen","pdfp"))))),wp.element.createElement("div",{class:"iframe_wrapper",__self:this,__source:{fileName:W,lineNumber:41,columnNumber:9}},wp.element.createElement("div",{className:"pdfp_frame_overlay",__self:this,__source:{fileName:W,lineNumber:42,columnNumber:11}}),wp.element.createElement("iframe",{loading:"lazy",width:p,height:s,src:f,style:{width:p,height:s},__self:this,__source:{fileName:W,lineNumber:43,columnNumber:11}}))))},save:function(){return null},example:{attributes:!0}})})();