import{o as i,c as _,w as s,a as t,b as l,g as o,h as m,L as u,t as a,e as n,F as p,i as b,f as c,x as k}from"./app.09a69c39.js";import{_ as x}from"./AdminLayout.e6fca88b.js";import{_ as g}from"./SecondaryButton.9ca7458b.js";import{_ as v}from"./DangerButton.040b2904.js";import"./Banner.f420c5f0.js";const y={class:"max-w-xl mx-auto flex justify-between"},w={class:"max-w-xl mx-auto mt-5 card bg-white"},j=t("b",null,"Applicant Name:",-1),B={class:"mt-1"},N=t("b",null,"Email:",-1),C={class:"mt-1"},V=t("b",null,"Phone:",-1),A={class:"mt-1"},L=t("b",null,"Job Title: ",-1),T={class:"mt-1"},$=t("b",null,"Company:",-1),D={key:0,class:"max-w-xl mx-auto mt-10 card bg-white"},E={key:0},F=t("h2",{class:"font-bold mb-1"},"UTM Params",-1),P=["value"],R={key:1,class:"mt-5"},S=t("h2",{class:"font-bold"},"Referer",-1),I={key:2,class:"mt-5"},J=t("h2",{class:"font-bold"},"Referral",-1),Q={__name:"Show",props:{application:Object},setup(e){const h=e,f=()=>{k.Inertia.delete(route("admin.application.destroy",h.application.uuid))};return(d,M)=>(i(),_(x,{title:"Applications Admin"},{default:s(()=>[t("section",y,[l(m(u),{href:d.route("admin.application.index")},{default:s(()=>[l(g,null,{default:s(()=>[o("Back")]),_:1})]),_:1},8,["href"]),t("div",null,[l(v,{onClick:f},{default:s(()=>[o("Delete")]),_:1})])]),t("section",w,[t("div",null,[j,o(" "+a(e.application.name),1)]),t("div",B,[N,o(" "+a(e.application.email),1)]),t("div",C,[V,o(" "+a(e.application.phone),1)]),t("div",A,[L,l(m(u),{class:"link",href:d.route("job.show",e.application.job.slug)},{default:s(()=>[o(a(e.application.job.title),1)]),_:1},8,["href"])]),t("div",T,[$,o(" "+a(e.application.job.company.name),1)])]),e.application.tracking?(i(),n("section",D,[e.application.tracking.utm?(i(),n("div",E,[F,(i(!0),n(p,null,b(e.application.tracking.utm,(r,O,U)=>(i(),n("div",{value:r},a(r),9,P))),256))])):c("",!0),e.application.tracking.referer?(i(),n("div",R,[S,t("div",null,a(e.application.tracking.referer),1)])):c("",!0),e.application.tracking.referral?(i(),n("div",I,[J,t("div",null,a(e.application.tracking.referral),1)])):c("",!0)])):c("",!0)]),_:1}))}};export{Q as default};
