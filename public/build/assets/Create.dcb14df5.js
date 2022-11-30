import{D as B,j as q,u as M,d as x,o as f,c as C,w as u,a as t,b as s,g as c,h as l,L,s as h,e as b,n as r,f as V,p as _,v as A,R as z,A as H,F as U}from"./app.bad3d86e.js";import{_ as I}from"./AdminLayout.914542f1.js";import{_ as N}from"./PrimaryButton.176b394f.js";import{_ as k}from"./SecondaryButton.a009113b.js";import{_ as m}from"./TextInput.2ede73ce.js";import{_ as a}from"./InputError.188bbe4e.js";import{_ as d}from"./InputLabel.9512d25d.js";import{E as j,S as R,a as D}from"./tiptap-starter-kit.esm.d21bd80e.js";import{_ as E}from"./ActionMessage.0acb85a1.js";import"./Banner.371f7d42.js";const F={class:"max-w-4xl mx-auto"},O={class:"max-w-4xl mx-auto"},T={class:"bg-white p-4 shadow rounded-lg mt-5"},J=["onSubmit"],K={class:"grid md:grid-cols-2 gap-6"},Z={class:"grid md:grid-cols-2 gap-6 mt-4"},G={class:"grid md:grid-cols-2 gap-6 mt-4"},Q={class:"mt-4"},W={key:0,class:"flex items-center mt-4"},X=["disabled"],Y=t("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-5 h-5 cursor-pointer",viewBox:"0 0 512 512"},[t("title",null,"Arrow Undo"),t("path",{d:"M240 424v-96c116.4 0 159.39 33.76 208 96 0-119.23-39.57-240-208-240V88L64 256z",fill:"none",stroke:"currentColor","stroke-linejoin":"round","stroke-width":"32"})],-1),tt=[Y],et=["disabled"],ot=t("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-5 h-5 cursor-pointer",viewBox:"0 0 512 512"},[t("title",null,"Arrow Redo"),t("path",{d:"M448 256L272 88v96C103.57 184 64 304.77 64 424c48.61-62.24 91.6-96 208-96v96z",fill:"none",stroke:"currentColor","stroke-linejoin":"round","stroke-width":"32"})],-1),st=[ot],lt=["disabled"],nt=t("strong",null,"B",-1),it=[nt],rt=["disabled"],at=t("i",null,"I",-1),dt=[at],ut=["disabled"],ct=t("s",null,"S",-1),mt=[ct],pt=t("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"})],-1),gt=[pt],ft=t("svg",{class:"h-5 w-5",stroke:"currentColor",viewBox:"0 0 18 18"},[t("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"4",y2:"4"}),t("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"9",y2:"9"}),t("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"14",y2:"14"}),t("line",{class:"ql-stroke ql-thin",x1:"2.5",x2:"4.5",y1:"5.5",y2:"5.5"}),t("path",{class:"ql-fill",d:"M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"}),t("path",{class:"ql-stroke ql-thin",d:"M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"}),t("path",{class:"ql-stroke ql-thin",d:"M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"})],-1),vt=[ft],ht={class:"editable mt-3"},bt={class:"col-span-6 sm:col-span-4 mt-4"},_t={class:"mt-2"},kt=t("img",{src:"/files/icons/avatar.svg",class:"rounded-full h-20 w-20 object-cover"},null,-1),wt=[kt],yt={class:"mt-2"},xt={class:"mt-4"},Ct={class:"mt-6"},Vt={for:"default-toggle",class:"switch toggle-input inline-flex relative items-center cursor-pointer"},At=t("span",{class:"w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all duration-300 dark:border-gray-600 peer-checked:bg-blue-600"},null,-1),Ut={class:"ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"},$t={class:"flex items-center mt-4"},jt={__name:"Create",props:{company:Object},setup(w){const y=w,n=B({editor:null});q(()=>{n.editor=new j({extensions:[R]})});const o=M({name:y.company.name,slug:y.company.slug,url:null,location:null,description:null,twitter:null,status:!0,photo:null,importPhotoUrl:null}),v=x(null),p=x(null),$=()=>{p.value.click()},S=()=>{const g=p.value.files[0];if(!g)return;const e=new FileReader;e.onload=i=>{v.value=i.target.result},e.readAsDataURL(g)},P=()=>{p.value&&(o.photo=p.value.files[0]),o.description=n.editor.getJSON(),o.post(route("admin.company.store"))};return(g,e)=>(f(),C(I,{title:"Company Create Admin"},{default:u(()=>[t("section",F,[s(l(L),{href:g.route("admin.company.index")},{default:u(()=>[s(k,null,{default:u(()=>[c("Back")]),_:1})]),_:1},8,["href"])]),t("section",O,[t("section",T,[t("form",{onSubmit:h(P,["prevent"]),class:"mt-8"},[t("section",K,[t("div",null,[s(d,{for:"name",value:"Title"}),s(m,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:l(o).name,"onUpdate:modelValue":e[0]||(e[0]=i=>l(o).name=i),required:"",autofocus:""},null,8,["modelValue"]),s(a,{message:l(o).errors.name,class:"mt-2"},null,8,["message"])]),t("div",null,[s(d,{for:"slug",value:"Slug"}),s(m,{id:"slug",type:"text",class:"mt-1 block w-full",modelValue:l(o).slug,"onUpdate:modelValue":e[1]||(e[1]=i=>l(o).slug=i),required:""},null,8,["modelValue"]),s(a,{message:l(o).errors.slug,class:"mt-2"},null,8,["message"])])]),t("section",Z,[t("div",null,[s(d,{for:"url",value:"URL"}),s(m,{id:"url",type:"text",class:"mt-1 block w-full",modelValue:l(o).url,"onUpdate:modelValue":e[2]||(e[2]=i=>l(o).url=i)},null,8,["modelValue"]),s(a,{message:l(o).errors.url,class:"mt-2"},null,8,["message"])]),t("div",null,[s(d,{for:"location",value:"Location"}),s(m,{id:"location",type:"text",class:"mt-1 block w-full",modelValue:l(o).location,"onUpdate:modelValue":e[3]||(e[3]=i=>l(o).location=i)},null,8,["modelValue"]),s(a,{message:l(o).errors.location,class:"mt-2"},null,8,["message"])])]),t("section",G,[t("div",null,[s(d,{for:"twitter",value:"Twitter"}),s(m,{id:"twitter",type:"text",class:"mt-1 block w-full",modelValue:l(o).twitter,"onUpdate:modelValue":e[4]||(e[4]=i=>l(o).twitter=i)},null,8,["modelValue"]),s(a,{message:l(o).errors.twitter,class:"mt-2"},null,8,["message"])])]),t("section",Q,[s(d,{for:"body",value:"Description"}),t("section",null,[n.editor?(f(),b("div",W,[t("button",{type:"button",class:"prose-button",onClick:e[5]||(e[5]=i=>n.editor.chain().focus().undo().run()),disabled:!n.editor.can().chain().focus().undo().run()},tt,8,X),t("button",{type:"button",class:"prose-button mr-3",onClick:e[6]||(e[6]=i=>n.editor.chain().focus().redo().run()),disabled:!n.editor.can().chain().focus().redo().run()},st,8,et),t("button",{type:"button",class:r(["prose-button",{"prose-is-active":n.editor.isActive("bold")}]),onClick:e[7]||(e[7]=i=>n.editor.chain().focus().toggleBold().run()),disabled:!n.editor.can().chain().focus().toggleBold().run()},it,10,lt),t("button",{type:"button",class:r(["prose-button",{"prose-is-active":n.editor.isActive("italic")}]),onClick:e[8]||(e[8]=i=>n.editor.chain().focus().toggleItalic().run()),disabled:!n.editor.can().chain().focus().toggleItalic().run()},dt,10,rt),t("button",{type:"button",class:r(["prose-button mr-3",{"prose-is-active":n.editor.isActive("strike")}]),onClick:e[9]||(e[9]=i=>n.editor.chain().focus().toggleStrike().run()),disabled:!n.editor.can().chain().focus().toggleStrike().run()},mt,10,ut),t("button",{type:"button",class:r(["prose-button",{"prose-is-active":n.editor.isActive("heading",{level:1})}]),onClick:e[10]||(e[10]=i=>n.editor.chain().focus().toggleHeading({level:1}).run())}," H1 ",2),t("button",{type:"button",class:r(["prose-button",{"prose-is-active":n.editor.isActive("heading",{level:2})}]),onClick:e[11]||(e[11]=i=>n.editor.chain().focus().toggleHeading({level:2}).run())}," H2 ",2),t("button",{type:"button",class:r(["prose-button mr-3",{"prose-is-active":n.editor.isActive("heading",{level:3})}]),onClick:e[12]||(e[12]=i=>n.editor.chain().focus().toggleHeading({level:3}).run())}," H3 ",2),t("button",{type:"button",class:r(["prose-button",{"prose-is-active":n.editor.isActive("bulletList")}]),onClick:e[13]||(e[13]=i=>n.editor.chain().focus().toggleBulletList().run())},gt,2),t("button",{type:"button",onClick:e[14]||(e[14]=i=>n.editor.chain().focus().toggleOrderedList().run()),class:r({"prose-is-active":n.editor.isActive("orderedList")})},vt,2)])):V("",!0),t("div",ht,[s(l(D),{editor:n.editor},null,8,["editor"])])]),s(a,{message:l(o).errors.description,class:"mt-2"},null,8,["message"])]),t("section",bt,[t("input",{ref_key:"photoInput",ref:p,type:"file",class:"hidden",onChange:S},null,544),s(d,{for:"photo",value:"Photo"}),_(t("div",_t,wt,512),[[A,!v.value]]),_(t("div",yt,[t("span",{class:"block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center",style:z("background-image: url('"+v.value+"');")},null,4)],512),[[A,v.value]]),s(k,{class:"mt-2 mr-2",type:"button",onClick:h($,["prevent"])},{default:u(()=>[c(" Select A New Photo ")]),_:1},8,["onClick"]),w.company.photo?(f(),C(k,{key:0,type:"button",class:"mt-2",onClick:h(g.deletePhoto,["prevent"])},{default:u(()=>[c(" Remove Photo ")]),_:1},8,["onClick"])):V("",!0),s(a,{message:l(o).errors.photo,class:"mt-2"},null,8,["message"])]),t("section",xt,[t("div",null,[s(d,{for:"importPhotoUrl",value:"Import Url"}),s(m,{id:"importPhotoUrl",type:"text",class:"mt-1 block w-full",modelValue:l(o).importPhotoUrl,"onUpdate:modelValue":e[15]||(e[15]=i=>l(o).importPhotoUrl=i)},null,8,["modelValue"]),s(a,{message:l(o).errors.importPhotoUrl,class:"mt-2"},null,8,["message"])])]),t("section",Ct,[t("label",Vt,[_(t("input",{type:"checkbox",value:"",id:"default-toggle",class:"sr-only peer","onUpdate:modelValue":e[16]||(e[16]=i=>l(o).status=i)},null,512),[[H,l(o).status]]),At,t("span",Ut,[l(o).status?(f(),b(U,{key:0},[c("Active")],64)):(f(),b(U,{key:1},[c("Inactive")],64))])])]),t("section",$t,[s(N,{class:r({"opacity-25":l(o).processing}),disabled:l(o).processing},{default:u(()=>[c(" Save ")]),_:1},8,["class","disabled"]),s(E,{on:l(o).recentlySuccessful,class:"ml-3"},{default:u(()=>[c(" Saved. ")]),_:1},8,["on"])])],40,J)])])]),_:1}))}};export{jt as default};
