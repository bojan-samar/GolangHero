import{D as z,j as I,u as H,d as C,o as h,c as V,w as c,a as t,b as s,g as u,h as l,L as N,s as _,p as y,v as A,R as j,f as S,e as k,n as d,y as E,F as U,x as $}from"./app.7e8f5cb0.js";import{_ as R}from"./AdminLayout.72036bad.js";import{_ as D}from"./PrimaryButton.98e76dd6.js";import{_ as w}from"./SecondaryButton.9c5d0041.js";import{_ as g}from"./TextInput.bffe2202.js";import{_ as m}from"./InputError.73e0de82.js";import{_ as p}from"./InputLabel.7629c5d4.js";import{E as F,S as O,a as T}from"./tiptap-starter-kit.esm.5e8e557c.js";import{_ as J}from"./ActionMessage.56a0012f.js";import{_ as K}from"./DangerButton.852cb6a2.js";import"./Banner.62e13415.js";const Z={class:"max-w-4xl mx-auto flex justify-between"},G={class:"max-w-4xl mx-auto"},Q={class:"bg-white p-4 shadow rounded-lg mt-5"},W=["onSubmit"],X={class:"grid md:grid-cols-2 gap-6"},Y={class:"grid md:grid-cols-2 gap-6 mt-4"},tt={class:"grid md:grid-cols-2 gap-6 mt-4"},et={class:"col-span-6 sm:col-span-4 mt-4"},ot={class:"mt-2"},st=["src","alt"],lt={class:"mt-2"},nt={class:"mt-4"},it={class:"mt-4"},rt={key:0,class:"flex items-center mt-4"},at=["disabled"],dt=t("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-5 h-5 cursor-pointer",viewBox:"0 0 512 512"},[t("title",null,"Arrow Undo"),t("path",{d:"M240 424v-96c116.4 0 159.39 33.76 208 96 0-119.23-39.57-240-208-240V88L64 256z",fill:"none",stroke:"currentColor","stroke-linejoin":"round","stroke-width":"32"})],-1),ct=[dt],ut=["disabled"],mt=t("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-5 h-5 cursor-pointer",viewBox:"0 0 512 512"},[t("title",null,"Arrow Redo"),t("path",{d:"M448 256L272 88v96C103.57 184 64 304.77 64 424c48.61-62.24 91.6-96 208-96v96z",fill:"none",stroke:"currentColor","stroke-linejoin":"round","stroke-width":"32"})],-1),pt=[mt],ft=["disabled"],gt=t("strong",null,"B",-1),vt=[gt],ht=["disabled"],bt=t("i",null,"I",-1),_t=[bt],yt=["disabled"],kt=t("s",null,"S",-1),wt=[kt],xt=t("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"})],-1),Ct=[xt],Vt=t("svg",{class:"h-5 w-5",stroke:"currentColor",viewBox:"0 0 18 18"},[t("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"4",y2:"4"}),t("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"9",y2:"9"}),t("line",{class:"ql-stroke",x1:"7",x2:"15",y1:"14",y2:"14"}),t("line",{class:"ql-stroke ql-thin",x1:"2.5",x2:"4.5",y1:"5.5",y2:"5.5"}),t("path",{class:"ql-fill",d:"M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"}),t("path",{class:"ql-stroke ql-thin",d:"M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"}),t("path",{class:"ql-stroke ql-thin",d:"M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"})],-1),At=[Vt],St={class:"editable mt-3"},Ut={class:"mt-4"},$t={for:"default-toggle",class:"switch toggle-input inline-flex relative items-center cursor-pointer"},Pt=t("span",{class:"w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all duration-300 dark:border-gray-600 peer-checked:bg-blue-600"},null,-1),Bt={class:"ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"},qt={class:"flex items-center mt-4"},Ot={__name:"Edit",props:{company:Object},setup(b){const r=b,n=z({editor:null});I(()=>{let a;try{a=JSON.parse(r.company.description)}catch{a=r.company.description}n.editor=new F({extensions:[O],content:a})});const o=H({_method:"PUT",name:r.company.name,slug:r.company.slug,url:r.company.url,location:r.company.location,description:r.company.description,twitter:r.company.twitter,photo:null,importPhotoUrl:null,status:!!r.company.status}),v=C(null),f=C(null),P=()=>{f.value.click()},B=()=>{const a=f.value.files[0];if(!a)return;const e=new FileReader;e.onload=i=>{v.value=i.target.result},e.readAsDataURL(a)},x=()=>{var a;(a=f.value)!=null&&a.value&&(f.value.value=null)},q=()=>{$.Inertia.delete(route("admin.company-photo.destroy",r.company.id),{preserveScroll:!0,onSuccess:()=>{v.value=null,x()}})},M=()=>{f.value&&(o.photo=f.value.files[0]),o.description=n.editor.getJSON(),o.post(route("admin.company.update",r.company.id),{onSuccess:()=>{x(),o.importPhotoUrl=null}})},L=()=>{$.Inertia.delete(route("admin.company.destroy",r.company.id))};return(a,e)=>(h(),V(R,{title:"Company Edit"},{default:c(()=>[t("section",Z,[s(l(N),{href:a.route("admin.company.index")},{default:c(()=>[s(w,null,{default:c(()=>[u("Back")]),_:1})]),_:1},8,["href"]),t("div",null,[s(K,{onClick:L},{default:c(()=>[u("Delete")]),_:1})])]),t("section",G,[t("section",Q,[t("form",{onSubmit:_(M,["prevent"]),class:"mt-8"},[t("section",X,[t("div",null,[s(p,{for:"name",value:"Title"}),s(g,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:l(o).name,"onUpdate:modelValue":e[0]||(e[0]=i=>l(o).name=i),required:"",autofocus:""},null,8,["modelValue"]),s(m,{message:l(o).errors.name,class:"mt-2"},null,8,["message"])]),t("div",null,[s(p,{for:"slug",value:"Slug"}),s(g,{id:"slug",type:"text",class:"mt-1 block w-full",modelValue:l(o).slug,"onUpdate:modelValue":e[1]||(e[1]=i=>l(o).slug=i),required:""},null,8,["modelValue"]),s(m,{message:l(o).errors.slug,class:"mt-2"},null,8,["message"])])]),t("section",Y,[t("div",null,[s(p,{for:"url",value:"URL"}),s(g,{id:"url",type:"text",class:"mt-1 block w-full",modelValue:l(o).url,"onUpdate:modelValue":e[2]||(e[2]=i=>l(o).url=i)},null,8,["modelValue"]),s(m,{message:l(o).errors.url,class:"mt-2"},null,8,["message"])]),t("div",null,[s(p,{for:"location",value:"Location"}),s(g,{id:"location",type:"text",class:"mt-1 block w-full",modelValue:l(o).location,"onUpdate:modelValue":e[3]||(e[3]=i=>l(o).location=i)},null,8,["modelValue"]),s(m,{message:l(o).errors.location,class:"mt-2"},null,8,["message"])])]),t("section",tt,[t("div",null,[s(p,{for:"twitter",value:"Twitter"}),s(g,{id:"twitter",type:"text",class:"mt-1 block w-full",modelValue:l(o).twitter,"onUpdate:modelValue":e[4]||(e[4]=i=>l(o).twitter=i)},null,8,["modelValue"]),s(m,{message:l(o).errors.twitter,class:"mt-2"},null,8,["message"])])]),t("section",et,[t("input",{ref_key:"photoInput",ref:f,type:"file",class:"hidden",onChange:B},null,544),s(p,{for:"photo",value:"Photo"}),y(t("div",ot,[t("img",{src:b.company.photo_url,alt:b.company.name,class:"rounded-full h-20 w-20 object-cover"},null,8,st)],512),[[A,!v.value]]),y(t("div",lt,[t("span",{class:"block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center",style:j("background-image: url('"+v.value+"');")},null,4)],512),[[A,v.value]]),s(w,{class:"mt-2 mr-2",type:"button",onClick:_(P,["prevent"])},{default:c(()=>[u(" Select A New Photo ")]),_:1},8,["onClick"]),b.company.photo?(h(),V(w,{key:0,type:"button",class:"mt-2",onClick:_(q,["prevent"])},{default:c(()=>[u(" Remove Photo ")]),_:1},8,["onClick"])):S("",!0),s(m,{message:l(o).errors.photo,class:"mt-2"},null,8,["message"])]),t("section",nt,[t("div",null,[s(p,{for:"importPhotoUrl",value:"Import Url"}),s(g,{id:"importPhotoUrl",type:"text",class:"mt-1 block w-full",modelValue:l(o).importPhotoUrl,"onUpdate:modelValue":e[5]||(e[5]=i=>l(o).importPhotoUrl=i)},null,8,["modelValue"]),s(m,{message:l(o).errors.importPhotoUrl,class:"mt-2"},null,8,["message"])])]),t("section",it,[s(p,{for:"body",value:"Description"}),t("section",null,[n.editor?(h(),k("div",rt,[t("button",{type:"button",class:"prose-button",onClick:e[6]||(e[6]=i=>n.editor.chain().focus().undo().run()),disabled:!n.editor.can().chain().focus().undo().run()},ct,8,at),t("button",{type:"button",class:"prose-button mr-3",onClick:e[7]||(e[7]=i=>n.editor.chain().focus().redo().run()),disabled:!n.editor.can().chain().focus().redo().run()},pt,8,ut),t("button",{type:"button",class:d(["prose-button",{"prose-is-active":n.editor.isActive("bold")}]),onClick:e[8]||(e[8]=i=>n.editor.chain().focus().toggleBold().run()),disabled:!n.editor.can().chain().focus().toggleBold().run()},vt,10,ft),t("button",{type:"button",class:d(["prose-button",{"prose-is-active":n.editor.isActive("italic")}]),onClick:e[9]||(e[9]=i=>n.editor.chain().focus().toggleItalic().run()),disabled:!n.editor.can().chain().focus().toggleItalic().run()},_t,10,ht),t("button",{type:"button",class:d(["prose-button mr-3",{"prose-is-active":n.editor.isActive("strike")}]),onClick:e[10]||(e[10]=i=>n.editor.chain().focus().toggleStrike().run()),disabled:!n.editor.can().chain().focus().toggleStrike().run()},wt,10,yt),t("button",{type:"button",class:d(["prose-button",{"prose-is-active":n.editor.isActive("heading",{level:1})}]),onClick:e[11]||(e[11]=i=>n.editor.chain().focus().toggleHeading({level:1}).run())}," H1 ",2),t("button",{type:"button",class:d(["prose-button",{"prose-is-active":n.editor.isActive("heading",{level:2})}]),onClick:e[12]||(e[12]=i=>n.editor.chain().focus().toggleHeading({level:2}).run())}," H2 ",2),t("button",{type:"button",class:d(["prose-button mr-3",{"prose-is-active":n.editor.isActive("heading",{level:3})}]),onClick:e[13]||(e[13]=i=>n.editor.chain().focus().toggleHeading({level:3}).run())}," H3 ",2),t("button",{type:"button",class:d(["prose-button",{"prose-is-active":n.editor.isActive("bulletList")}]),onClick:e[14]||(e[14]=i=>n.editor.chain().focus().toggleBulletList().run())},Ct,2),t("button",{type:"button",onClick:e[15]||(e[15]=i=>n.editor.chain().focus().toggleOrderedList().run()),class:d({"prose-is-active":n.editor.isActive("orderedList")})},At,2)])):S("",!0),t("div",St,[s(l(T),{editor:n.editor},null,8,["editor"])])]),s(m,{message:l(o).errors.description,class:"mt-2"},null,8,["message"])]),t("section",Ut,[t("label",$t,[y(t("input",{type:"checkbox",value:"",id:"default-toggle",class:"sr-only peer","onUpdate:modelValue":e[16]||(e[16]=i=>l(o).status=i)},null,512),[[E,l(o).status]]),Pt,t("span",Bt,[l(o).status?(h(),k(U,{key:0},[u("Active")],64)):(h(),k(U,{key:1},[u("Inactive")],64))])])]),t("section",qt,[s(D,{class:d({"opacity-25":l(o).processing}),disabled:l(o).processing},{default:c(()=>[u(" Save ")]),_:1},8,["class","disabled"]),s(J,{on:l(o).recentlySuccessful,class:"ml-3"},{default:c(()=>[u(" Saved. ")]),_:1},8,["on"])])],40,W)])])]),_:1}))}};export{Ot as default};