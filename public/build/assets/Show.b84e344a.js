import{D as _,j as b,o as i,c as k,w as n,a as t,b as l,g as o,h as r,L as f,t as a,e as s,F as x,i as v,f as c,x as g}from"./app.3247dd9a.js";import{_ as w}from"./AdminLayout.bfb16930.js";import{_ as y}from"./SecondaryButton.319dd5ce.js";import{_ as j}from"./DangerButton.e55d865e.js";import{E as N,a as B}from"./tiptap-vue-3.esm.87a1a393.js";import{S as C}from"./tiptap-starter-kit.esm.27a94095.js";import"./Banner.fd5761c9.js";const E={class:"max-w-xl mx-auto flex justify-between"},S={class:"max-w-xl mx-auto mt-5 card bg-white"},D=t("b",null,"Applicant Name:",-1),V={class:"mt-1"},A=t("b",null,"Email:",-1),L={class:"mt-1"},T=t("b",null,"Phone:",-1),$={class:"mt-1"},F=t("b",null,"Job Title: ",-1),J={class:"mt-1"},M=t("b",null,"Company:",-1),O={id:"resume",class:"mt-4"},P=t("h3",{class:"font-bold"},"Description",-1),R={key:0,class:"max-w-xl mx-auto mt-10 card bg-white"},I={key:0},K=t("h2",{class:"font-bold mb-1"},"UTM Params",-1),U=["value"],q={key:1,class:"mt-5"},z=t("h2",{class:"font-bold"},"Referer",-1),G={key:2,class:"mt-5"},H=t("h2",{class:"font-bold"},"Referral",-1),st={__name:"Show",props:{application:Object},setup(e){const d=e,m=_({editor:null});b(()=>{m.editor=new N({editable:!1,extensions:[C],content:JSON.parse(d.application.resume)})});const p=()=>{g.Inertia.delete(route("admin.application.destroy",d.application.uuid))};return(u,Q)=>(i(),k(w,{title:"Applications Admin"},{default:n(()=>[t("section",E,[l(r(f),{href:u.route("admin.application.index")},{default:n(()=>[l(y,null,{default:n(()=>[o("Back")]),_:1})]),_:1},8,["href"]),t("div",null,[l(j,{onClick:p},{default:n(()=>[o("Delete")]),_:1})])]),t("section",S,[t("div",null,[D,o(" "+a(e.application.name),1)]),t("div",V,[A,o(" "+a(e.application.email),1)]),t("div",L,[T,o(" "+a(e.application.phone),1)]),t("div",$,[F,l(r(f),{class:"link",href:u.route("job.show",e.application.job.slug)},{default:n(()=>[o(a(e.application.job.title),1)]),_:1},8,["href"])]),t("div",J,[M,o(" "+a(e.application.job.company.name),1)]),t("div",O,[P,l(r(B),{editor:m.editor},null,8,["editor"])])]),e.application.tracking?(i(),s("section",R,[e.application.tracking.utm?(i(),s("div",I,[K,(i(!0),s(x,null,v(e.application.tracking.utm,(h,W,X)=>(i(),s("div",{value:h},a(h),9,U))),256))])):c("",!0),e.application.tracking.referer?(i(),s("div",q,[z,t("div",null,a(e.application.tracking.referer),1)])):c("",!0),e.application.tracking.referral?(i(),s("div",G,[H,t("div",null,a(e.application.tracking.referral),1)])):c("",!0)])):c("",!0)]),_:1}))}};export{st as default};
