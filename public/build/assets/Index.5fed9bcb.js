import{_}from"./AppLayout.e7334178.js";import{o as a,c as i,w as e,b as s,h as n,H as f,a as t,e as r,F as p,i as h,g as m,L as d,f as u,t as x}from"./app.b09017a7.js";import{_ as b}from"./SearchForm.fe5984a1.js";import{_ as g}from"./SecondaryButton.25628883.js";import{_ as j}from"./PrimaryButton.0a8a164e.js";import"./Banner.d0680729.js";const y=t("title",null,"Post a job",-1),w=t("meta",{name:"description",content:"Post a Golang job today."},null,-1),k={class:"max-w-3xl mx-auto pt-12 px-4"},N=t("h1",{class:"text-lg mb-4 text-center"},"Select A Company First",-1),C={key:0,class:"max-w-3xl mx-auto px-4 mt-5"},B={key:0,class:"text-center"},F=t("div",{class:"mb-2"},"Nothing Found!!!",-1),P={__name:"Index",props:{drafts:Object,companies:Object},setup(o){return(c,V)=>(a(),i(_,null,{default:e(()=>[s(n(f),null,{default:e(()=>[y,w]),_:1}),t("section",k,[N,s(b,{"route-name":"job-create"})]),o.companies?(a(),r("section",C,[(a(!0),r(p,null,h(o.companies.data,l=>(a(),i(n(d),{href:c.route("job-create.details",l.slug),class:"border rounded-lg py-2 px-4 bg-white flex justify-between items-center"},{default:e(()=>[t("span",null,x(l.name),1),s(g,null,{default:e(()=>[m("Select")]),_:1})]),_:2},1032,["href"]))),256)),o.companies.data.length?u("",!0):(a(),r("div",B,[F,s(n(d),{href:c.route("job-create.company.create")},{default:e(()=>[s(j,null,{default:e(()=>[m("Create New Company")]),_:1})]),_:1},8,["href"])]))])):u("",!0)]),_:1}))}};export{P as default};
