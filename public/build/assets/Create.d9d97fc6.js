import{u as _,o as f,c as p,w as l,a as o,b as e,g as r,h as a,L as g,s as x,n as h}from"./app.1f95ca82.js";import{_ as b}from"./AdminLayout.4d644de5.js";import{_ as w}from"./PrimaryButton.55337225.js";import{_ as V}from"./SecondaryButton.33359170.js";import{_ as n}from"./TextInput.3fdcc3f4.js";import{_ as i}from"./InputError.f221ce54.js";import{_ as u}from"./InputLabel.80604526.js";import"./Banner.35efc64e.js";const v={class:"max-w-2xl mx-auto"},k={class:"max-w-2xl mx-auto"},y={class:"bg-white p-4 shadow rounded-lg mt-5"},$=["onSubmit"],C={class:"mt-4"},B={class:"mt-4"},M={__name:"Create",setup(N){const s=_({name:null,slug:null}),c=()=>{s.post(route("admin.category.store"))};return(d,t)=>(f(),p(b,{title:"Job Category Create Admin"},{default:l(()=>[o("section",v,[e(a(g),{href:d.route("admin.category.index")},{default:l(()=>[e(V,null,{default:l(()=>[r("Back")]),_:1})]),_:1},8,["href"])]),o("section",k,[o("section",y,[o("form",{onSubmit:x(c,["prevent"]),class:"mt-8",autocomplete:"off"},[o("div",null,[e(u,{for:"name",value:"Name"}),e(n,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:a(s).name,"onUpdate:modelValue":t[0]||(t[0]=m=>a(s).name=m),required:"",autofocus:""},null,8,["modelValue"]),e(i,{message:a(s).errors.name,class:"mt-2"},null,8,["message"])]),o("div",C,[e(u,{for:"slug",value:"Slug"}),e(n,{id:"slug",type:"text",class:"mt-1 block w-full",modelValue:a(s).slug,"onUpdate:modelValue":t[1]||(t[1]=m=>a(s).slug=m),required:""},null,8,["modelValue"]),e(i,{message:a(s).errors.slug,class:"mt-2"},null,8,["message"])]),o("div",B,[e(w,{class:h({"opacity-25":a(s).processing}),disabled:a(s).processing},{default:l(()=>[r(" Save ")]),_:1},8,["class","disabled"])])],40,$)])])]),_:1}))}};export{M as default};