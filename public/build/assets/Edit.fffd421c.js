import{u as g,o as d,c as b,w as u,a,b as l,g as c,h as s,L as w,s as x,p as V,C as h,e as _,i as k,t as y,F as S,n as $}from"./app.2841f7de.js";import{_ as B}from"./AdminLayout.dba62df1.js";import{_ as N}from"./PrimaryButton.7126c1f0.js";import{_ as U}from"./SecondaryButton.cc79638d.js";import{_ as f}from"./TextInput.fe7f2631.js";import{_ as n}from"./InputError.25458e34.js";import{_ as i}from"./InputLabel.0ed7a6d0.js";import{_ as j}from"./ActionMessage.8b7536d4.js";import"./Banner.31b6544d.js";const q={class:"max-w-2xl mx-auto flex justify-between"},C={class:"max-w-2xl mx-auto card bg-white mt-5"},E={class:"mb-4"},F=["src","alt"],L=["onSubmit"],D={class:"grid md:grid-cols-2 gap-6"},I=["selected","value"],M={class:"flex items-center mt-4"},P={__name:"Edit",props:{user:Object,userId:Number,roles:Object},setup(o){const m=o,e=g({name:m.user.name,email:m.user.email,username:m.user.username,role:m.user.role}),p=()=>{e.put(route("admin.user.update",m.userId))};return(v,r)=>(d(),b(B,{title:o.user.name},{default:u(()=>[a("section",q,[l(s(w),{href:v.route("admin.user.show",o.user.username)},{default:u(()=>[l(U,null,{default:u(()=>[c("Back")]),_:1})]),_:1},8,["href"])]),a("section",C,[a("div",E,[a("img",{src:o.user.profile_photo_url,alt:o.user.name,class:"rounded-full h-20 w-20 object-cover"},null,8,F)]),a("form",{onSubmit:x(p,["prevent"])},[a("div",D,[a("div",null,[l(i,{for:"name",value:"Name",required:!0}),l(f,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:s(e).name,"onUpdate:modelValue":r[0]||(r[0]=t=>s(e).name=t)},null,8,["modelValue"]),l(n,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),a("div",null,[l(i,{for:"email",value:"Email",required:!0}),l(f,{id:"email",type:"text",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":r[1]||(r[1]=t=>s(e).email=t)},null,8,["modelValue"]),l(n,{message:s(e).errors.email,class:"mt-2"},null,8,["message"])]),a("div",null,[l(i,{for:"username",value:"Username",required:!0}),l(f,{id:"username",type:"text",class:"mt-1 block w-full",modelValue:s(e).username,"onUpdate:modelValue":r[2]||(r[2]=t=>s(e).username=t)},null,8,["modelValue"]),l(n,{message:s(e).errors.username,class:"mt-2"},null,8,["message"])]),a("div",null,[l(i,{for:"role",value:"Role",required:!0}),V(a("select",{class:"form-input w-full mt-1","onUpdate:modelValue":r[3]||(r[3]=t=>s(e).role=t),name:"role",id:"role"},[(d(!0),_(S,null,k(o.roles,t=>(d(),_("option",{selected:s(e).role==t,value:t},y(t),9,I))),256))],512),[[h,s(e).role]]),l(n,{message:s(e).errors.role,class:"mt-2"},null,8,["message"])])]),a("div",M,[l(N,{class:$({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:u(()=>[c(" Save ")]),_:1},8,["class","disabled"]),l(j,{on:s(e).recentlySuccessful,class:"ml-3"},{default:u(()=>[c(" Saved. ")]),_:1},8,["on"])])],40,L)])]),_:1},8,["title"]))}};export{P as default};
