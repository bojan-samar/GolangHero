import{o as i,c as d,w as t,a as l,b as e,g as n,e as u,i as _,F as f,h as b,L as h,t as o}from"./app.94a9d194.js";import{_ as g}from"./AdminLayout.d4efa737.js";import{_ as r,T as x,a as k,b as c}from"./Cell.ec4753ed.js";import{P as p}from"./Paginator.c77e9d65.js";import"./Banner.d9db3160.js";import"./_plugin-vue_export-helper.cdc0426e.js";const w={class:"max-w-4xl mx-auto mt-8"},T={class:"text-sm"},B={class:"mt-8"},V={__name:"Index",props:{applications:Object,sort:String,direction:String},setup(a){return(m,N)=>(i(),d(g,{title:"Applications Admin"},{default:t(()=>[l("section",w,[e(x,null,{heading:t(()=>[e(r,{sort:a.sort,direction:a.direction,column:"name"},{default:t(()=>[n("Name")]),_:1},8,["sort","direction"]),e(r,null,{default:t(()=>[n("Job")]),_:1}),e(r,{sort:a.sort,direction:a.direction,column:"created_at"},{default:t(()=>[n("Created At")]),_:1},8,["sort","direction"])]),body:t(()=>[(i(!0),u(f,null,_(a.applications.data,s=>(i(),d(k,null,{default:t(()=>[e(c,null,{default:t(()=>[e(b(h),{href:m.route("admin.application.show",s.uuid)},{default:t(()=>[n(o(s.name),1)]),_:2},1032,["href"])]),_:2},1024),e(c,null,{default:t(()=>[n(o(s.job.title)+" ",1),l("div",T,o(s.job.company.name),1)]),_:2},1024),e(c,null,{default:t(()=>[n(o(s.created_at_date_string),1)]),_:2},1024)]),_:2},1024))),256))]),_:1})]),l("section",B,[e(p,{links:a.applications.links},null,8,["links"])])]),_:1}))}};export{V as default};
