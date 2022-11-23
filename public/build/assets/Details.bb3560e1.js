import{D as w,j as V,u as C,o as u,c as A,w as c,a as e,b as i,g as m,h as l,L as $,t as y,s as M,p as v,C as q,e as p,i as S,F as g,n as r,f as B,A as L}from"./app.ed1ffc73.js";import{_ as j}from"./AppLayout.023d6bb3.js";import{_ as z}from"./PrimaryButton.e5b210ed.js";import{_ as H}from"./SecondaryButton.dccb6fc7.js";import{_ as f}from"./TextInput.68f7447a.js";import{_ as d}from"./InputError.a2313e48.js";import{_ as a}from"./InputLabel.2f658727.js";import{E as U,S as N,a as D}from"./tiptap-starter-kit.esm.ea9ea10c.js";import{_ as E}from"./ActionMessage.9f9850b1.js";import"./Banner.151ce998.js";const I={class:"max-w-4xl mx-auto px-4 pt-12"},F={class:"mt-5 mb-12 max-w-4xl mx-auto px-4"},O={class:"bg-white p-4 shadow rounded-lg"},R={class:"text-center mb-4 text-xl"},T=["onSubmit"],J={class:"mt-4"},K=e("div",{class:"text-sm mt-0.5"},"If you don't have a link where they can apply, they will apply on our website and we will send you an alert.",-1),Z={class:"grid md:grid-cols-3 gap-6 mt-4"},G={class:"grid md:grid-cols-2 gap-6 mt-4"},P=["value"],Q={class:"mt-4"},W={key:0,class:"flex items-center mt-4"},X=["disabled"],Y=e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-5 h-5 cursor-pointer",viewBox:"0 0 512 512"},[e("title",null,"Arrow Undo"),e("path",{d:"M240 424v-96c116.4 0 159.39 33.76 208 96 0-119.23-39.57-240-208-240V88L64 256z",fill:"none",stroke:"currentColor","stroke-linejoin":"round","stroke-width":"32"})],-1),ee=[Y],te=["disabled"],oe=e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-5 h-5 cursor-pointer",viewBox:"0 0 512 512"},[e("title",null,"Arrow Redo"),e("path",{d:"M448 256L272 88v96C103.57 184 64 304.77 64 424c48.61-62.24 91.6-96 208-96v96z",fill:"none",stroke:"currentColor","stroke-linejoin":"round","stroke-width":"32"})],-1),se=[oe],le=["disabled"],ne=e("strong",null,"B",-1),ie=[ne],re=["disabled"],ae=e("i",null,"I",-1),de=[ae],ue=["disabled"],ce=e("s",null,"S",-1),me=[ce],pe=e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"})],-1),fe=[pe],_e=e("svg",{class:"h-5 w-5",stroke:"currentColor",viewBox:"0 0 18 18"},[e("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"4",y2:"4"}),e("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"9",y2:"9"}),e("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"14",y2:"14"}),e("line",{class:"ql-stroke ql-thin",x1:"2.5",x2:"4.5",y1:"5.5",y2:"5.5"}),e("path",{class:"ql-fill",d:"M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"}),e("path",{class:"ql-stroke ql-thin",d:"M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"}),e("path",{class:"ql-stroke ql-thin",d:"M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"})],-1),ge=[_e],ye={class:"mt-3 editable"},ve={class:"mt-6"},be={for:"default-toggle",class:"switch toggle-input inline-flex relative items-center cursor-pointer mt-2"},he=e("span",{class:"w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all duration-300 dark:border-gray-600 peer-checked:bg-blue-600"},null,-1),xe={class:"ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"},ke={class:"flex items-center mt-4"},ze={__name:"Details",props:{company:Object,types:Object},setup(_){const b=_,o=w({editor:null});V(()=>{o.editor=new U({extensions:[N]})});const s=C({company_slug:b.company.slug,title:null,apply_url:null,description:null,location:null,salary_min:null,salary_max:null,type:"FULL_TIME",remote:!1}),h=()=>{s.description=o.editor.getJSON(),s.post(route("job-create"))};return(x,t)=>(u(),A(j,{title:"Create New Job"},{default:c(()=>[e("section",I,[i(l($),{href:x.route("job-create")},{default:c(()=>[i(H,null,{default:c(()=>[m("Back")]),_:1})]),_:1},8,["href"])]),e("section",F,[e("div",O,[e("h1",R,"Creating a job for "+y(_.company.name),1),e("form",{onSubmit:M(h,["prevent"]),class:"mt-8"},[e("section",null,[i(a,{for:"title",value:"Title",required:!0}),i(f,{id:"title",type:"text",class:"mt-1 block w-full",modelValue:l(s).title,"onUpdate:modelValue":t[0]||(t[0]=n=>l(s).title=n),required:"",autofocus:""},null,8,["modelValue"]),i(d,{message:l(s).errors.title,class:"mt-2"},null,8,["message"])]),e("section",J,[i(a,{for:"apply_url",value:"Apply Link"}),i(f,{id:"apply_url",type:"text",class:"mt-1 block w-full",modelValue:l(s).apply_url,"onUpdate:modelValue":t[1]||(t[1]=n=>l(s).apply_url=n)},null,8,["modelValue"]),K,i(d,{message:l(s).errors.apply_url,class:"mt-2"},null,8,["message"])]),e("section",Z,[e("div",null,[i(a,{for:"location",value:"Location"}),i(f,{id:"location",type:"text",class:"mt-1 block w-full",modelValue:l(s).location,"onUpdate:modelValue":t[2]||(t[2]=n=>l(s).location=n)},null,8,["modelValue"]),i(d,{message:l(s).errors.location,class:"mt-2"},null,8,["message"])]),e("div",null,[i(a,{for:"salary_min",value:"Salary Min"}),i(f,{id:"salary_min",type:"text",class:"mt-1 block w-full",modelValue:l(s).salary_min,"onUpdate:modelValue":t[3]||(t[3]=n=>l(s).salary_min=n)},null,8,["modelValue"]),i(d,{message:l(s).errors.salary_min,class:"mt-2"},null,8,["message"])]),e("div",null,[i(a,{for:"salary_max",value:"Salary Max"}),i(f,{id:"salary_max",type:"text",class:"mt-1 block w-full",modelValue:l(s).salary_max,"onUpdate:modelValue":t[4]||(t[4]=n=>l(s).salary_max=n)},null,8,["modelValue"]),i(d,{message:l(s).errors.salary_max,class:"mt-2"},null,8,["message"])])]),e("section",G,[e("div",null,[i(a,{for:"type",value:"Job Type",required:!0}),v(e("select",{name:"type",class:"form-input pr-6",style:{"min-width":"150px"},"onUpdate:modelValue":t[5]||(t[5]=n=>l(s).type=n)},[(u(!0),p(g,null,S(_.types,(n,k,we)=>(u(),p("option",{value:k},y(n),9,P))),256))],512),[[q,l(s).type]]),i(d,{message:l(s).errors.type,class:"mt-2"},null,8,["message"])])]),e("section",Q,[i(a,{for:"body",value:"Description",required:!0}),e("section",null,[o.editor?(u(),p("div",W,[e("button",{type:"button",class:"prose-button",onClick:t[6]||(t[6]=n=>o.editor.chain().focus().undo().run()),disabled:!o.editor.can().chain().focus().undo().run()},ee,8,X),e("button",{type:"button",class:"prose-button mr-3",onClick:t[7]||(t[7]=n=>o.editor.chain().focus().redo().run()),disabled:!o.editor.can().chain().focus().redo().run()},se,8,te),e("button",{type:"button",class:r(["prose-button",{"prose-is-active":o.editor.isActive("bold")}]),onClick:t[8]||(t[8]=n=>o.editor.chain().focus().toggleBold().run()),disabled:!o.editor.can().chain().focus().toggleBold().run()},ie,10,le),e("button",{type:"button",class:r(["prose-button",{"prose-is-active":o.editor.isActive("italic")}]),onClick:t[9]||(t[9]=n=>o.editor.chain().focus().toggleItalic().run()),disabled:!o.editor.can().chain().focus().toggleItalic().run()},de,10,re),e("button",{type:"button",class:r(["prose-button mr-3",{"prose-is-active":o.editor.isActive("strike")}]),onClick:t[10]||(t[10]=n=>o.editor.chain().focus().toggleStrike().run()),disabled:!o.editor.can().chain().focus().toggleStrike().run()},me,10,ue),e("button",{type:"button",class:r(["prose-button",{"prose-is-active":o.editor.isActive("heading",{level:1})}]),onClick:t[11]||(t[11]=n=>o.editor.chain().focus().toggleHeading({level:1}).run())}," H1 ",2),e("button",{type:"button",class:r(["prose-button",{"prose-is-active":o.editor.isActive("heading",{level:2})}]),onClick:t[12]||(t[12]=n=>o.editor.chain().focus().toggleHeading({level:2}).run())}," H2 ",2),e("button",{type:"button",class:r(["prose-button mr-3",{"prose-is-active":o.editor.isActive("heading",{level:3})}]),onClick:t[13]||(t[13]=n=>o.editor.chain().focus().toggleHeading({level:3}).run())}," H3 ",2),e("button",{type:"button",class:r(["prose-button",{"prose-is-active":o.editor.isActive("bulletList")}]),onClick:t[14]||(t[14]=n=>o.editor.chain().focus().toggleBulletList().run())},fe,2),e("button",{type:"button",onClick:t[15]||(t[15]=n=>o.editor.chain().focus().toggleOrderedList().run()),class:r({"prose-is-active":o.editor.isActive("orderedList")})},ge,2)])):B("",!0),e("div",ye,[i(l(D),{editor:o.editor},null,8,["editor"])])]),i(d,{message:l(s).errors.description,class:"mt-2"},null,8,["message"])]),e("section",ve,[i(a,{for:"body",value:"Remote?",required:!0}),e("label",be,[v(e("input",{type:"checkbox",value:"",id:"default-toggle",class:"sr-only peer","onUpdate:modelValue":t[16]||(t[16]=n=>l(s).remote=n)},null,512),[[L,l(s).remote]]),he,e("span",xe,[l(s).remote?(u(),p(g,{key:0},[m("Remote")],64)):(u(),p(g,{key:1},[m("Not Remote")],64))])])]),e("section",ke,[i(z,{class:r({"opacity-25":l(s).processing}),disabled:l(s).processing},{default:c(()=>[m(" Save ")]),_:1},8,["class","disabled"]),i(E,{on:l(s).recentlySuccessful,class:"ml-3"},{default:c(()=>[m(" Saved. ")]),_:1},8,["on"])])],40,T)])])]),_:1}))}};export{ze as default};
