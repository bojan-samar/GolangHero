import{o as l,c as r,w as a,a as n,b as e,g as t,e as c,i as d,h as f,L as p,t as i,F as x}from"./app.99f256f9.js";import{_ as h}from"./AdminLayout.dd5b1ce8.js";import{_ as m,T as b,a as _,b as k}from"./Cell.059b34eb.js";import{P as g}from"./Paginator.cbccf9a8.js";import{_ as w}from"./SearchForm.bd981262.js";import"./Banner.976058cc.js";import"./_plugin-vue_export-helper.cdc0426e.js";const T={class:"max-w-4xl mx-auto"},B={class:"max-w-4xl mx-auto mt-5"},j={class:"mt-8"},F={__name:"Index",props:{alerts:Object},setup(o){return(u,A)=>(l(),r(h,{title:"Alerts Admin"},{default:a(()=>[n("section",T,[e(w,{"route-name":"admin.job-alert.index"})]),n("section",B,[e(k,null,{heading:a(()=>[e(m,null,{default:a(()=>[t("Email")]),_:1}),e(m,null,{default:a(()=>[t("Created At")]),_:1})]),body:a(()=>[(l(!0),c(x,null,d(o.alerts.data,s=>(l(),r(b,null,{default:a(()=>[e(_,null,{default:a(()=>[e(f(p),{href:u.route("admin.job-alert.show",s.uuid)},{default:a(()=>[t(i(s.email),1)]),_:2},1032,["href"])]),_:2},1024),e(_,null,{default:a(()=>[t(i(s.created_at_date_string),1)]),_:2},1024)]),_:2},1024))),256))]),_:1})]),n("section",j,[e(g,{links:o.alerts.links},null,8,["links"])])]),_:1}))}};export{F as default};
