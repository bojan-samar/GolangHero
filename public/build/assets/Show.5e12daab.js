import{o,c as p,w as s,a as t,b as n,g as e,h as m,L as r,t as i,e as c,F as f,i as b,f as u,x}from"./app.94a9d194.js";import{_ as k}from"./AdminLayout.d4efa737.js";import{_ as w}from"./SecondaryButton.18b83dce.js";import{_ as g}from"./DangerButton.7e41925d.js";import"./Banner.d9db3160.js";const v={class:"max-w-xl mx-auto flex justify-between"},y={class:"max-w-xl mx-auto mt-5 card bg-white"},j=t("b",null,"Applicant Name:",-1),B={class:"mt-1"},N=t("b",null,"Email:",-1),C={class:"mt-1"},V=t("b",null,"Phone:",-1),A={class:"mt-1"},L=t("b",null,"Job Title: ",-1),T={class:"mt-1"},$=t("b",null,"Company:",-1),D={key:0,class:"max-w-xl mx-auto mt-10 card bg-white"},E={key:0},F=t("h2",{class:"font-bold mb-2"},"UTM Params",-1),P=["value"],G={__name:"Show",props:{application:Object},setup(a){const _=a,h=()=>{x.Inertia.delete(route("admin.application.destroy",_.application.uuid))};return(l,S)=>(o(),p(k,{title:"Applications Admin"},{default:s(()=>[t("section",v,[n(m(r),{href:l.route("admin.application.index")},{default:s(()=>[n(w,null,{default:s(()=>[e("Back")]),_:1})]),_:1},8,["href"]),t("div",null,[n(g,{onClick:h},{default:s(()=>[e("Delete")]),_:1})])]),t("section",y,[t("div",null,[j,e(" "+i(a.application.name),1)]),t("div",B,[N,e(" "+i(a.application.email),1)]),t("div",C,[V,e(" "+i(a.application.phone),1)]),t("div",A,[L,n(m(r),{class:"link",href:l.route("job.show",a.application.job.slug)},{default:s(()=>[e(i(a.application.job.title),1)]),_:1},8,["href"])]),t("div",T,[$,e(" "+i(a.application.job.company.name),1)])]),a.application.tracking?(o(),c("section",D,[a.application.tracking.utm?(o(),c("div",E,[F,(o(!0),c(f,null,b(a.application.tracking.utm,(d,I,J)=>(o(),c("div",{value:d},i(d),9,P))),256))])):u("",!0)])):u("",!0)]),_:1}))}};export{G as default};
