import{_ as r}from"./AppLayout.06783d59.js";import{o as e,c as i,w as n,b as a,a as o,h as c,H as m,e as s,i as d,F as _}from"./app.56894289.js";import{P as u}from"./Paginator.911c1725.js";import{_ as f}from"./JobCard.f69c36f0.js";import{_ as h}from"./SearchForm.f855eaf4.js";import"./Banner.8b7eaae7.js";import"./_plugin-vue_export-helper.cdc0426e.js";const p=o("title",null,"Golang Jobs. Find A Jobs Today",-1),x=o("meta",{name:"description",content:"Browse through hundreds of good paying Golang jobs and start your career today."},null,-1),b=["href"],g={class:"max-w-3xl mx-auto py-12 px-8"},j={class:"my-8 px-4 max-w-3xl mx-auto"},k={class:"pb-8"},P={__name:"Index",props:{jobs:Object,canonicalUrl:String},setup(t){return(y,w)=>(e(),i(r,null,{default:n(()=>[a(c(m),null,{default:n(()=>[p,x,o("link",{rel:"canonical",href:t.canonicalUrl},null,8,b)]),_:1}),o("section",g,[a(h,{"route-name":"job.index"})]),o("section",j,[(e(!0),s(_,null,d(t.jobs.data,l=>(e(),s("div",null,[a(f,{job:l},null,8,["job"])]))),256))]),o("section",k,[a(u,{links:t.jobs.meta.links},null,8,["links"])])]),_:1}))}};export{P as default};