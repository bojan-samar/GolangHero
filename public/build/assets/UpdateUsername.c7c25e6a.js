import{u,o as c,e as i,a as r,b as a,h as s,w as t,n as d,s as p,g as _}from"./app.1f95ca82.js";import{_ as f}from"./PrimaryButton.55337225.js";import{_ as U}from"./TextInput.3fdcc3f4.js";import{_ as b}from"./InputError.f221ce54.js";import{_ as g}from"./InputLabel.80604526.js";import{_ as x}from"./ActionMessage.58401ce8.js";const h=["onSubmit"],v={class:"mt-4 flex items-center"},V=r("span",{class:"text-green-600 font-bold"},"Username Updated",-1),T={__name:"UpdateUsername",props:{user:Object},setup(m){const e=u({_method:"PUT",username:m.user.username}),n=()=>{e.post(route("account.username.update"),{errorBag:"updateUsername",preserveScroll:!0})};return($,o)=>(c(),i("form",{onSubmit:p(n,["prevent"]),autocomplete:"off"},[r("div",null,[a(g,{for:"username",value:"Username"}),a(U,{id:"username",type:"text",class:"mt-1 block w-full",modelValue:s(e).username,"onUpdate:modelValue":o[0]||(o[0]=l=>s(e).username=l),required:""},null,8,["modelValue"]),a(b,{message:s(e).errors.username,class:"mt-2"},null,8,["message"])]),r("div",v,[a(f,{class:d({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:t(()=>[_(" Save ")]),_:1},8,["class","disabled"]),a(x,{on:s(e).recentlySuccessful,class:"ml-3"},{default:t(()=>[V]),_:1},8,["on"])])],40,h))}};export{T as default};