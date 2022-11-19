import{o as n,e as u,r as x,u as w,a as t,b as s,F as m,i as S,h as l,w as p,n as b,s as v,c as y,g as k,t as h}from"./app.7d75fb4d.js";import{_ as V}from"./PrimaryButton.8a2e74ae.js";import{_,a as f}from"./TextInput.8809062d.js";import{_ as i}from"./InputLabel.504814dc.js";const B=["type"],$={__name:"OutlineButton",props:{type:{type:String,default:"button"}},setup(a){return(e,c)=>(n(),u("button",{type:a.type,class:"border inline-flex items-center text-sm rounded mr-2 p-1.5 hover:border-black transition ease-in-out duration-300 no-underline"},[x(e.$slots,"default")],8,B))}},C=t("svg",{xmlns:"http://www.w3.org/2000/svg",class:"h-4 w-4 ml-1 text-red-500",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor","stroke-width":"2"},[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"})],-1),q=["onSubmit"],N={class:"grid md:grid-cols-2 gap-6"},F={class:"mt-4"},M={__name:"UpdateSkills",props:{skills:Object},setup(a){const e=w({skill:null,experience:null}),c=()=>{e.post(route("account.worker-skill.store"),{errorBag:"storeSkill",preserveScroll:!0,onSuccess:()=>e.reset()})},g=d=>{e.delete(route("account.worker-skill.destroy",d),{errorBag:"destroySkill",preserveScroll:!0})};return(d,o)=>(n(),u(m,null,[t("section",null,[s(i,{value:"Current Skills",class:"mb-1"}),(n(!0),u(m,null,S(a.skills,r=>(n(),y($,{onClick:U=>g(r.uuid)},{default:p(()=>[k(h(r.name)+" ",1),C]),_:2},1032,["onClick"]))),256))]),t("form",{onSubmit:v(c,["prevent"]),autocomplete:"off",class:"mt-5"},[t("section",N,[t("div",null,[s(i,{for:"skill",value:"Add New Skill",required:!0}),s(_,{id:"skill",type:"text",class:"mt-1 block w-full",modelValue:l(e).skill,"onUpdate:modelValue":o[0]||(o[0]=r=>l(e).skill=r),required:""},null,8,["modelValue"]),s(f,{message:l(e).errors.skill,class:"mt-2"},null,8,["message"])]),t("div",null,[s(i,{for:"experience",value:"Years Experience",required:!0}),s(_,{id:"experience",type:"text",class:"mt-1 block w-full",modelValue:l(e).experience,"onUpdate:modelValue":o[1]||(o[1]=r=>l(e).experience=r),required:""},null,8,["modelValue"]),s(f,{message:l(e).errors.experience,class:"mt-2"},null,8,["message"])])]),t("div",F,[s(V,{class:b({"opacity-25":l(e).processing}),disabled:l(e).processing},{default:p(()=>[k(" Add ")]),_:1},8,["class","disabled"])])],40,q)],64))}};export{M as default};
